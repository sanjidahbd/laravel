<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];

    
    public function foodItem()
    {
        
        return $this->belongsTo(FoodItem::class, 'food_item_id');
    }

    
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}