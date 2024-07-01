<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category', 'featured', 'homepage', 'rating',
        'price', 'picture', 'picture_resized']; // Colonnes remplissables
}
