<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_name',
        'description',
    ];

    // Relasi ke Movie
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
