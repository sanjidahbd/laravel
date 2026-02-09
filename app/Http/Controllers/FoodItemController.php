<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\FoodItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FoodItemController extends Controller
{
    
    public function index()
    {
       
        $fooditems = FoodItem::with(['category', 'subcategory'])->latest()->get();
        return view('backend.fooditems.index', compact('fooditems'));
    }

    
     
    public function create()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('backend.fooditems.create', compact('categories', 'subcategories'));
    }

    
     
    public function store(Request $request)
    {
       
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'item_name' => 'required|unique:food_items,item_name',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

     
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload/food_items/'), $name_gen);
        $save_url = 'upload/food_items/' . $name_gen;

        
        FoodItem::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'item_name' => $request->item_name,
            'item_slug' => Str::slug($request->item_name), 
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('fooditems.index')->with('success', 'Food Item Added Successfully!');
    }

    

    
    public function edit($id)
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $fooditem = FoodItem::findOrFail($id);
        return view('backend.fooditems.edit', compact('categories', 'subcategories', 'fooditem'));
    }


     
    
    public function update(Request $request, $id)
    {
        $fooditem = FoodItem::findOrFail($id);
        $old_img = $fooditem->image;

        if ($request->file('image')) {
        
            if (file_exists(public_path($old_img))) {
                unlink(public_path($old_img));
            }

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/food_items/'), $name_gen);
            $save_url = 'upload/food_items/' . $name_gen;
        } else {
            $save_url = $old_img;
        }

        
        $fooditem->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'item_name' => $request->item_name,
            'item_slug' => Str::slug($request->item_name),
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $save_url,
        ]);

        return redirect()->route('fooditems.index')->with('success', 'Food Item Updated Successfully!');
    }

  
    public function destroy($id)
    {
        $item = FoodItem::findOrFail($id);
        
      
        if (file_exists(public_path($item->image))) {
            unlink(public_path($item->image));
        }
        
        $item->delete();
        return redirect()->back()->with('success', 'Food Item Deleted!');
    }
}