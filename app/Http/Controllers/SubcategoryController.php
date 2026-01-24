<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    
    public function index()
    {
       
        $subcategories = Subcategory::with('category')->latest()->get();
        return view('backend.subcategories.index', compact('subcategories'));
    }

    
    public function create()
    {
      
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('backend.subcategories.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories|max:255',
        ], [
            'category_id.required' => 'Please select a main category',
            'subcategory_name.required' => 'Subcategory name is required',
        ]);

        Subcategory::create([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name),
        ]);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory Created Successfully!');
    }

    
    public function show(Subcategory $subcategory)
    {
        //
    }

    
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('backend.subcategories.edit', compact('categories', 'subcategory'));
    }

    
     
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|max:255|unique:subcategories,subcategory_name,' . $subcategory->id,
        ]);

        $subcategory->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name),
        ]);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory Updated Successfully!');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'Subcategory Deleted Successfully!');
    }
}