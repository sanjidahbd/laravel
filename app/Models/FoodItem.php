<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    // --- Notun Review Relationship ---
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    // Average rating ber korar helper function
    public function averageRating() {
        // Jodi kono review na thake tobe 0 dekhabe
        return $this->reviews()->avg('rating') ?: 0;
    }
}