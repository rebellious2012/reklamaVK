<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Stage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_title = "Модерация";
        $page_route = route('home');
        $user = Auth::user();

        $stages = Stage::where('status', 'published')
            ->with(['users' => function($query) use ($user) {
                $query->where('user_id', $user->id);
            }])
            ->get();

        $groupedStages = $stages->groupBy(function($stage) {
            return $stage->group_name ?? $stage->name;
        });

        $stagesForDisplay = [];

        foreach ($groupedStages as $groupName => $stagesGroup) {
            $activeStage = $stagesGroup->first(function ($stage) use ($user) {
                return $stage->users->isNotEmpty() &&
                    $stage->users->first()->pivot->status === 'active';
            });

            $stageToShow = $activeStage ?: $stagesGroup->sortBy('position')->first();

            $key = $stageToShow->name;

            $stagesForDisplay[$key]['group_name'][$groupName] = $stageToShow;

            if ($activeStage) {
                $stagesForDisplay[$key]['main'][$groupName] = $stageToShow;
            } else {
                $stagesForDisplay[$key]['next'][$groupName] = $stageToShow;
            }
        }

        return view('home.1_moderation.index', [
            'page_title' => $page_title,
            //  'stages' => $stages,
             'stages_groups' => $stagesForDisplay,

             'paymentsHeader' => $user->userPaymentsTotalAmount(),
        ]);

    }

    public function stages()
    {
        $user = Auth::user();
        if ($user->userIntroForm == null) {
            return redirect()->route('intro.form');
        }
        $assignedStages = $user->stages()->wherePivot('status', 'active')->get();
        $assignedStageActive = $assignedStages->first();
        $stages_view = '';

        $paymentsHeader = $user->userPaymentsTotalAmount();
        $userForms = $user->forms;
        $stepUser = $user->stepUsers->whereNotIn('status', 'completed')->first();
        $lastStage = $user->stages()->wherePivot('status', 'completed')->get()->last();

        if( $stepUser !==null ){
            if ($lastStage !== null && $stepUser->isFirstStepInStage() && !session()->has('started_stage_' . $assignedStageActive?->id)) {
                $next_stage = Stage::where('position', ($assignedStageActive?->position))->first();
                $stages_view = view('home.stages.next_stage.index', ['stage' => $lastStage, 'next_stage' => $next_stage])->render();
            } else {
                if ($stepUser !== null) {
                    $step = $stepUser->step;
                    if ($step !== null) {
                        $fields = $step->fields()->orderBy('position', 'asc')->get();
                        if ($fields !== null) {
                                $stages_view = view('home.stages.steps.index', ['stepUser' => $stepUser, 'fields' => $fields, "step" => $step, 'userForms' => $userForms, 'assignedStages' => $assignedStages])->render();
                        }
                    }
                }
            }
        }else{
            $stages_view = view('home.stages.no_steps.index')->render();
        }
        $page_title = $assignedStageActive?->name ?? 'page';
        $page_route = route('home.security');
        $breadcrumbs_one = $page_title;

        return view('home.2_security.index', compact('paymentsHeader', 'page_title', 'stages_view','breadcrumbs_one'));
    }

    public function userStartStage(Request $request)
    {
        // Сохраняем в сессию, что этап начат для пользователя
        $stageId = $request->input('next_stage_id');
        session()->put('started_stage_' . $stageId, true);

        // Перенаправляем на страницу с этапом или шагами
        return redirect()->back();
    }


    public function stageUpdate(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'stage_id'      => 'required',
            'next_stage_id' => 'required',
        ]);

        if ($request->filled('next_stage_id') && $request->filled('stage_id')) {

            // Получаем идентификаторы этапов
            $currentStageId = $request->input('stage_id');
            $nextStageId = $request->input('next_stage_id');

            try {
                // Проверяем, если этапы существуют у пользователя
                $hasCurrentStage = $user->stages()->where('stage_id', $currentStageId)->exists();
                $hasNextStage = $user->stages()->where('stage_id', $nextStageId)->exists();

                // Сохраняем статус текущего этапа
                if ($hasCurrentStage) {
                    $user->stages()->syncWithoutDetaching([$currentStageId => ['status' => 'completed']]);
                } else {
                    // Можно добавить логику, если этап не найден
                }

                // Сохраняем статус следующего этапа
                if ($hasNextStage) {
                    $user->stages()->syncWithoutDetaching([$nextStageId => ['status' => 'active']]);
                } else {
                    // Логика для обработки отсутствующего этапа
                }

                return redirect()->back()->with([
                    'success' => 'Данные успешно сохранены.',
                ]);
            } catch (\Exception $e) {
                // Обработка ошибок
                return redirect()->back()->with('error', 'Произошла ошибка при обновлении этапов: ' . $e->getMessage());
            }
        }
    }
}
