<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PaymentStage extends Pivot
{
    // Указываем таблицу, если она отличается от стандартного соглашения об именах
    protected $table = 'payment_stage';

    // Массив заполняемых полей
    protected $fillable = ['payment_id', 'stage_id', 'field_id'];

    // Метод boot для обработки события "updating"
    protected static function boot()
    {
        parent::boot();

        // Обрабатываем событие "updating"
        static::updating(function ($paymentStage) {
            // Если оба поля stage_id и field_id равны null, удаляем запись
            if (is_null($paymentStage->stage_id) && is_null($paymentStage->field_id)) {
                $paymentStage->delete();
            }
        });
    }

    // Описание отношений с другими моделями через связи many-to-many

    // Связь many-to-many с моделью Payment
    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'payment_stage', 'stage_id', 'payment_id');
    }

    // Связь many-to-many с моделью Stage
    public function stages()
    {
        return $this->belongsToMany(Stage::class, 'payment_stage', 'payment_id', 'stage_id');
    }

    // Связь many-to-many с моделью Field
    public function fields()
    {
        return $this->belongsToMany(Field::class, 'payment_stage', 'payment_id', 'field_id');
    }

}

