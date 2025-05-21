<?php

namespace App\Http\Controllers\Admin\Stages;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\StepUser;
use App\Models\Step;
use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\UpdateFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\Admin\Stages\FormService;
use App\Services\Admin\Stages\PaymentService;
use App\Services\Admin\Stages\FileService;
use App\Services\Admin\Stages\StageService;

// Импорт фасада DB

class FormController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
           //    dd($request);
        // Получаем все данные из запроса
        $validated = $request->validate([
            'step_user_id' => 'required|exists:step_user,id',
            'file.*'       => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5048',
            // Другие правила валидации для динамических полей можно добавлять позже
        ]);

        // Инстанцирование FormService через app()
        $formService = app(FormService::class);

        // 1. Сохранение обычных полей
        // Исключаем файлы из запроса, оставляем только динамические поля
        $dynamicFields = array_filter($request->except(['file']), function ($key) {
            return $key !== 'step_user_id'; // Исключаем step_user_id
        }, ARRAY_FILTER_USE_KEY);

        // Проходим по динамическим полям
        $formService->storeFormData($validated, $dynamicFields, $request);

        // Если файлы были загружены, передаем их в FileService
        if ($request->hasFile('file')) {
            $fileService = app(FileService::class);
            $fileService->storeFiles($request->file('file'), $validated['step_user_id']);
        }
        // Инстанцирование PaymentService через app()
        $paymentService = app(PaymentService::class);
        // 2. Сохранение платежных данных, если они присутствуют
        $paymentProcessed = false;
        $paymentSuccessButton = '';
        $showModal = false;
        if ($request->has('amount') && $request->has('image_path') ) {
            $paymentService->storePaymentData($request);
            $paymentProcessed = true;  // Платеж был обработан
            $paymentSuccessButton = 'success';
            $showModal = true;
        }
        if(!$request->has('amount')){
            // Используем сервис для работы с этапами и шагами
            $stageService = app(StageService::class);
            $stageService->completeCurrentStepAndMoveToNext($validated['step_user_id']);
        }
        //dd($showModal);
        // Возвращаем redirect с переменной для показа модального окна
        return redirect()->back()->with([
            'success' => 'Данные успешно сохранены.',
            'success_button' => $paymentSuccessButton,
            'paymentProcessed' => $paymentProcessed,  // Передаем переменную для модального окна
            'showModal' => $showModal,  // Передаем флаг для открытия модального окна
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormRequest $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        //
    }
}
