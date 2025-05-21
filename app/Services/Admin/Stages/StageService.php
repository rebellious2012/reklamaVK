<?php

namespace App\Services\Admin\Stages;
use App\Models\StepUser;
use App\Models\Step;
use Illuminate\Support\Facades\DB;

class StageService
{
    public function completeCurrentStepAndMoveToNext($stepUserId)
    {
        $stepUser = StepUser::find($stepUserId);

        if (!$stepUser) {
            return false; // или выбросить исключение
        }

        // Обновляем статус текущего шага на "completed"
        $stepUser->status = 'completed';
        $stepUser->save();

        // Поиск активного этапа пользователя
        $activeStageUser = DB::table('stage_user')
            ->where('user_id', $stepUser->user_id)
            ->where('status', 'active')
            ->first();

        if ($activeStageUser) {
            $currentStage = $activeStageUser->stage_id;

            // Найдем текущий шаг в этом этапе
            $currentStep = Step::find($stepUser->step_id);

            // Ищем текущую позицию шага в таблице stage_step
            $currentStageStep = DB::table('stage_step')
                ->where('stage_id', $currentStage)
                ->where('step_id', $currentStep->id)
                ->first();

            if ($currentStageStep) {
                // Ищем следующий шаг по позиции в текущем этапе
                $nextStageStep = DB::table('stage_step')
                    ->where('stage_id', $currentStage)
                    ->where('position', '>', $currentStageStep->position)
                    ->orderBy('position')
                    ->first();

                if ($nextStageStep) {
                    // Назначаем следующий шаг с активным статусом
                    StepUser::create([
                        'user_id' => $stepUser->user_id,
                        'step_id' => $nextStageStep->step_id,
                        'status'  => 'active',
                    ]);
                } else {
                    // Завершаем текущий этап
                    DB::table('stage_user')
                        ->where('id', $activeStageUser->id)
                        ->update(['status' => 'completed']);

                    // Переходим к следующему этапу
                    $this->moveToNextStage($stepUser->user_id);
                }
            }
        }
    }

    private function moveToNextStage($userId)
    {
        $nextStageUser = DB::table('stage_user')
            ->where('user_id', $userId)
            ->where('status', 'pending')
            ->orderBy('created_at')
            ->first();

        if ($nextStageUser) {
            DB::table('stage_user')
                ->where('id', $nextStageUser->id)
                ->update(['status' => 'active']);

            // Назначаем первый шаг следующего этапа
            $firstStepInNextStage = DB::table('stage_step')
                ->where('stage_id', $nextStageUser->stage_id)
                ->orderBy('position')
                ->first();

            if ($firstStepInNextStage) {
                StepUser::create([
                    'user_id' => $userId,
                    'step_id' => $firstStepInNextStage->step_id,
                    'status'  => 'active',
                ]);
            }
        }
    }
}