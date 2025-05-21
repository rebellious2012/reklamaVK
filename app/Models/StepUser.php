<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepUser extends Model
{
    use HasFactory;

    protected $table = 'step_user'; // Указываем название таблицы, если оно не соответствует стандарту

    protected $fillable = ['user_id', 'step_id', 'status'];

    public $with = ['user', 'step', 'forms'];

    public function user()
    {
        return $this->belongsTo(User::class); // Предполагается, что у вас есть модель User
    }

    public function step()
    {
        return $this->belongsTo(Step::class); // Предполагается, что у вас есть модель Step
    }

    // Связь с формами (если шаги содержат формы)
    public function forms()
    {
        return $this->hasMany(Form::class, 'step_user_id');
    }

    public function isFirstStepInStage()
    {
        $step = $this->step;

        // Получаем этапы, к которым принадлежит шаг
        $stages = $step->stages;

        foreach ($stages as $stage) {
            // Получаем все шаги для этапа, отсортированные по позиции
            $firstStep = $stage->steps()->orderBy('position')->first();

            // Проверяем, является ли текущий шаг первым
            if ($firstStep && $firstStep->id == $this->step_id) {
                return true;
            }
        }

        return false;
    }
}
