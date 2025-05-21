<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',  // Примечание к платежу
        // Добавьте сюда другие поля, если они есть в таблице
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'payment_user')
            ->using(PaymentUser::class)
            ->withPivot('amount', 'status', 'note', 'image_path')
            ->withTimestamps();
    }
    // Связь многие-ко-многим с моделью Stage через промежуточную таблицу payment_stage
    public function stages()
    {
        return $this->belongsToMany(Stage::class, 'payment_stage', 'payment_id', 'stage_id')->using(PaymentStage::class)->withTimestamps();
    }

    // Связь многие-ко-многим с моделью Field через промежуточную таблицу payment_stage
    public function fields()
    {
        return $this->belongsToMany(Field::class, 'payment_stage', 'payment_id', 'field_id')->using(PaymentStage::class)->withTimestamps();
    }

}
