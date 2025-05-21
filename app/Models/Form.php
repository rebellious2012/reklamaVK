<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = ['step_user_id', 'field_id', 'field_name', 'field_value'];

    public function stepUser()
    {
        return $this->belongsTo(StepUser::class, 'step_user_id'); // Указываем связь с StepUser
    }
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
