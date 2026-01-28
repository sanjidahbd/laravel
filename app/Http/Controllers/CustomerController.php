<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;


use Illuminate\Http\Request;

class CustomerController extends Controller
{
  
    public function index()
    {
       
        $fooditems = FoodItem::with(['category', 'subcategory'])->get();
        return view('backend.menu.menu', compact('fooditems'));
    }
   
}
  
   