<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
    public function index() {
        $this->data['categories'] = Category::all();
        return view('backend.category.index', $this->data);
    }

    public function create() {
        return view('backend.category.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => ($request->status) ? true : false,
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Category Created Successfylly');
    }
    
    public function edit(Category $category) {
        return view('backend.category.edit', compact('category'));
    }
    
    public function update(Request $request, Category $category) {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => ($request->status) ? true : false,
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Category Created Successfylly');
    }
    
    public function delete(Category $category) {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category Deleted Successfylly');
    }
}
