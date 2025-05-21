<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name',
        'content',
        'short_content',
        'image_path',
        'video_link',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'position',
    ];
    public function getRuCreatedAtAttribute()
    {
        // Возвращаем дату в нужном формате
        return $this->created_at->translatedFormat('d F в H:i');
    }
}
