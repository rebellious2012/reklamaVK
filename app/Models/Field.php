<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Field extends Model
{
    use HasFactory;

    // Разрешенные для массового заполнения поля
    protected $fillable = [
        'label',     // название поля
        'type',      // тип поля
        'placeholder',
        'position',  // позиция поля в шаге
        'slug',      // системное имя (slug)
        'options',   // дополнительные параметры (в формате JSON)
        'note',      // примечание для админа
        'parent_id',
    ];
    public $with = ["payments"];

    //    public $with = ["steps", 'steps.stages', 'stages'];

    public static function boot()
    {
        parent::boot();

        // Логика создания
        static::creating(function ($field) {
            self::generateUniqueSlug($field);
        });
    }

    // Метод для генерации уникального slug
    protected static function generateUniqueSlug($field)
    {
        // Генерируем slug и ограничиваем его длину до 50 символов
        $slug = Str::limit(Str::slug($field->label, '_'), 50, '');
        $slug = Str::slug($field->label, '_');
        $originalSlug = $slug;
        $count = 1;

        while (self::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '_' . $count++;
        }

        $field->slug = $slug;
    }

    // Связь many-to-many с моделью Step
    public function steps()
    {
        return $this->belongsToMany(Step::class, 'field_step', 'field_id', 'step_id')
            ->withPivot('position') // Позиция поля в шаге
            ->withTimestamps();
    }

    public function stages()
    {
        return $this->hasManyThrough(Stage::class, Step::class, 'field_step', 'stage_step', 'id', 'id');
    }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    // Связь с родительским полем
    public function parent()
    {
        return $this->belongsTo(Field::class, 'parent_id');
    }

    // Связь с дочерними полями
    public function children()
    {
        return $this->hasMany(Field::class, 'parent_id');
    }

    public function getParentParentFieldValueForCurrentUser()
    {
        return $this->parent?->parent?->forms
            ?->where('stepUser.user.id', Auth::user()?->id)
            ->first()?->field_value;
        // В вашем коде
        //$fieldValue = $field->getParentParentFieldValueForCurrentUser();

        //dd($field->getParentParentFieldValueForCurrentUser());
        //dd($field->parent?->parent?->forms?->where('stepUser.user.id', Auth::user()?->id)->first()?->field_value);
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'payment_stage', 'field_id', 'payment_id')->using(PaymentStage::class)->withTimestamps();
    }

    // Связь с PaymentStage
    public function paymentStages()
    {
        return $this->belongsToMany(PaymentStage::class, 'payment_stage', 'field_id', 'payment_id')
            ->withTimestamps();
    }

    // Связь с Stage через PaymentStage
    public function stagesPaymentStage()
    {
        return $this->belongsToMany(Stage::class, 'payment_stage', 'field_id', 'stage_id')->using(PaymentStage::class)
            ->withTimestamps();
    }

    public function getFirstPaymentIdFromParent(): ?int
    {
        // Проверяем наличие родительских полей
        if ($this->parent && $this->parent->parent) {
            // Получаем первый платеж у родителя родительского поля
            return $this->parent->parent->payments->first()?->id;
        }

        // Если родителя или родителя родителя нет, возвращаем null
        return null;
    }


}
