<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Ei field gulo database-e store korar permission deya holo
    protected $fillable = ['name', 'slug'];
}