<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancel extends Model
{
    protected $fillable = [
        'reason',
        'details',
        'file_path',
        'user_id',
        'is_read',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
