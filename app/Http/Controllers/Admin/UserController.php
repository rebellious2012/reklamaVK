<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Stage;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $users = User::with(['roles','userIntroForm','cancels', 'stages' => function ($query) {
            $query->wherePivot('status', 'active'); // Только этапы со статусом "active"
        }, 'stages.steps'])->get(); // Подгружаем роли, этапы и шаги
        $roles = Role::all();
        $clientCount = \App\Models\User::whereHas('roles', function ($query) {
            $query->where('name', 'Client');
        })->count();
        $supportCount = \App\Models\User::whereHas('roles', function ($query) {
            $query->where('name', 'Support');
        })->count();
        $adminCount = \App\Models\User::whereHas('roles', function ($query) {
            $query->where('name', 'Admin');
        })->count();

        return view('admin/users/index', compact('users', 'roles', 'clientCount', 'supportCount', 'adminCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        //dd($request->all());
        // Если роль не указана в запросе, добавляем роль 'User' по умолчанию
        if (!$request->has('roles')) {
            // dd($request->all());
            $request->merge([
                'roles' => [Role::where('name', 'Client')->first()->id],
            ]);
        }
        // Валидируем данные из запроса
        $validatedData = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|string|email|max:255|unique:users',
            'password'        => 'required|string|min:8|confirmed',
            'fio'             => 'required|string|max:255',
            'phone'           => 'nullable|string|max:20',
            'notes'           => 'nullable',
            'additional_info' => 'nullable',
            'roles'           => 'required|array',  // Обновляем валидацию для массива ролей
            'roles.*'         => 'exists:roles,id',  // Валидация каждого ID роли
        ]);

        // Создаем нового пользователя
        $user = User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Присваиваем роли пользователю
        $user->roles()->sync($validatedData['roles']);

        // Создание записи в таблице accounts
        $user->account()->create([
            'fio'             => $request->input('fio'),
            'phone'           => $request->input('phone'),
            'notes'           => $request->input('notes'),
            'additional_info' => $request->input('additional_info') ?? '',
        ]);

        // Перенаправляем на список пользователей с успешным сообщением
        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {

        // Получаем все роли
        $roles = Role::all();
        $account = $user->account;

        // Получаем все доступные этапы без завершенных
        $availableStages = Stage::with('steps')
            ->whereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->where('status', 'completed');
            })
        ->get();

        // Получаем этапы, которые уже назначены пользователю
        // $assignedStages = $user->stages()->with('steps')->get();
        $assignedStages = $user->stages()
        ->with('steps')
        ->withPivot(['account_number', 'payment_purpose', 'bank_name'])
        ->get();

        $assignedSteps = Step::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        $hasActiveStage = $assignedStages->contains(function ($stage) {
            return $stage->pivot->status === 'active';
        });

        $pendingStages = Stage::with('steps')
            // Исключаем этапы со статусом `completed` для текущего пользователя
            ->whereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->where('status', 'completed');
            })
            // Получаем этапы, которые имеют статус `pending` для текущего пользователя
            ->whereHas('users', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->where('status', 'pending');
            })
            // Или этапы, которые не связаны с текущим пользователем
            ->orWhereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

        // Проверяем, есть ли завершённые этапы
        $hasCompletedStages = $assignedStages->contains(function ($stage) {
            return $stage->pivot->status === "completed";
        });

        // Получаем завершенные шаги, кроме последнего
        $completedSteps = $assignedSteps->slice(0, $assignedSteps->count() - 1);

        // Получаем текущий шаг (последний)
        $currentStep = $assignedSteps->last(); // Последний шаг пользователя

        return view('admin.users.edit', compact('user', 'roles', 'account', 'availableStages', 'assignedStages', 'hasActiveStage', 'pendingStages', 'hasCompletedStages', 'completedSteps', 'currentStep', ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role'            => 'required',
            'fio'             => 'required|string|max:255',
            'phone'           => 'nullable|string|max:20',
            'notes'           => 'nullable',
            'additional_info' => 'nullable',
            'stage_prices'    => 'nullable|array',
            'stage_prices.*'  => 'nullable|numeric|min:0',
            'stage_account_numbers' => 'nullable',
            'stage_bank_names' => 'nullable',
            'stage_payment_purpose' => 'nullable|string|max:255',
            'steps.*'         => 'nullable|array',
            'steps.*.*'       => 'nullable|integer|exists:steps,id',
            'stages.*.status' => 'nullable|string|in:active,completed,pending',  // Валидация статусов
        ]);
        $user->update($validatedData);
        // Обновляем роли пользователя
        $user->roles()->sync($validatedData['role']);
        // Обновляем или создаем запись в таблице accounts
        $user->account()->updateOrCreate(
            ['user_id' => $user->id],  // Условие для поиска или создания записи
            [
                'fio'             => $validatedData['fio'],
                'phone'           => $validatedData['phone'],
                'notes'           => $validatedData['notes'],
                'additional_info' => $validatedData['additional_info'] ?? '',
            ]
        );
        if ($request->has('stage_prices')) {
            foreach ($request->input('stage_prices') as $stageId => $price) {
                // Получаем статус для этапа
                $status = $request->input("stages.{$stageId}.status", 'pending');  // Значение по умолчанию 'pending'
                $bank_name = $request->input('stage_bank_names');
                $account_number = $request->input('stage_account_numbers');
                $payment_purpose = $request->input('stage_payment_purpose');
                // Сохраняем стоимость этапа, шаги и статус
                $user->stages()->syncWithoutDetaching([$stageId => ['price' => $price, 'status' => $status, 'bank_name' => $bank_name, 'account_number' => $account_number, 'payment_purpose' => $payment_purpose]]);
                if ($request->has("steps.{$stageId}")) {
                    $steps = $request->input("steps.{$stageId}");
                    // Найдем текущий активный шаг пользователя
                    $activeStep = $user->steps()->wherePivot('status', 'active')->first();
                    if ($activeStep) {
                        // Обновим его статус на 'completed'
                        $user->steps()->updateExistingPivot($activeStep->id, ['status' => 'completed']);
                    }
                    // Теперь добавляем новый шаг с активным статусом
                    foreach ($steps as $stepId) {
                        $user->steps()->syncWithoutDetaching([
                            $stepId => ['status' => 'active']
                        ]);
                    }
                }
            }
        }
        return redirect()->back()->with('success', 'Користувач успішно оновлений');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Користувач успішно видалений');
    }

    public function fetch_info(User $user)
    {
        //$user = User::findOrFail($id);
        $account = $user->account;

        // Получаем динамические поля из таблицы forms, связанные с пользователем, и загружаем связанные поля через 'field'
        $dynamicForms = $user->forms()->with('field')->get();

        // Подготовка динамических полей с их описанием
        $dynamicFields = $dynamicForms->map(function ($form) {
            return [
                'field_name' => $form->field_name,  // Название поля из модели Form (slug)
                'field_value' => $form->field_value,  // Значение поля из модели Form
                'field_label' => $form->field->label,  // Метка поля из модели Field
            ];
        });


        return response()->json([
            'id'    => $user->id,
            'fio'   => $account->fio,
            'phone' => $account->phone,
            'email' => $user->email,
            'notes' => $account->notes,
            // Динамические поля передаем как массив с полями name, description и value
            'fields' => $dynamicFields,
            // Добавьте другие поля, если они есть в вашей модели User
        ]);
    }
    public function showUserSteps(User $user)
    {
        // Получаем все шаги пользователя в хронологическом порядке
        $userSteps = $user->steps()->orderBy('step_user.created_at')->get();

        // Определяем завершённые шаги, исключая последний
        $completedSteps = $userSteps->slice(0, -1); // Все кроме последнего

        // Определяем текущий шаг (последний)
        $currentStep = $userSteps->last();

        return view('user.steps', compact('completedSteps', 'currentStep'));
    }
}
