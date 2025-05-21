<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PaymentUser extends Pivot
{
    use HasFactory;

    protected $table = 'payment_user'; // Указываем таблицу, если она не соответствует стандартному названию

    protected $fillable = [
        'payment_id',
        'user_id',
        'stage_id',
        'stage',
        'form_id',
        'amount',
        'status',
        'note',
        'image_path',
    ];

    public $with = ['stage'];

    // Связь с моделью Payment
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    // Связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Связь с моделью Stage
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    // Связь с моделью Form
    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}

