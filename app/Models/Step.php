<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Scopes\OrderByPositionScope;

class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'note',      // примечание для админа
    ];
    public  $with = ['fields'];

    // Метод boot для каскадного удаления связанных записей
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($step) {
            // Удаляем связи с полями (field_step)
            $step->fields()->detach();

            // Удаляем связи с этапами (stage_step)
            $step->stages()->detach();

            // Удаляем связи с пользователями (step_user)
            $step->users()->detach();

            // Удаляем связанные записи в step_users
            $step->stepUsers()->delete();

            // Удаление всех "висячих" записей из stage_step при удалении Step
            DB::table('stage_step')
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('steps')
                        ->whereRaw('steps.id = stage_step.step_id');
                })
                ->orWhereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('stages')
                        ->whereRaw('stages.id = stage_step.stage_id');
                })
                ->delete();
        });
    }

       // ordering
       protected static function booted()
       {
           static::addGlobalScope(new OrderByPositionScope());
       }

    // Связь many-to-many с моделью Field
    public function fields()
    {
        return $this->belongsToMany(Field::class, 'field_step', 'step_id', 'field_id')
            ->withPivot('position') // Позиция поля в шаге
            ->withTimestamps();
    }
    public function stages()
    {
        return $this->belongsToMany(Stage::class, 'stage_step', 'step_id', 'stage_id')->withPivot('position')->withTimestamps();
    }
    // Связь с пользователями через step_user без дополнительных полей в pivot-таблице
    public function users()
    {
        return $this->belongsToMany(User::class, 'step_user')
            ->withPivot('created_at', 'updated_at'); // Используем только стандартные pivot-поля, если они есть
    }
    public function stepUsers()
    {
        return $this->hasMany(StepUser::class);
    }
}
