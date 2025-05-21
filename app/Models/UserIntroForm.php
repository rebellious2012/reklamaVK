<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserIntroForm extends Model
{
    protected $fillable = [
        'user_id',
        'account_type',
        'link_page',
        'link_group',
        'country',
        'currency',
        'inn',
        'fio',
        'legal_type',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
