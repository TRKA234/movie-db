<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function getRouteKeyName()
    {
        return 'id';
    }
    use HasFactory;

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'title',
        'slug',
        'synopsis',
        'category_id',
        'year',
        'actors',
        'cover_image'
    ];
}