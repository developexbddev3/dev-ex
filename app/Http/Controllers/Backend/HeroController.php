<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    
    public function index() {
        $this->data['hero'] = HeroSection::first();
        return view('backend.hero.create', $this->data);
    }

    public function create(Request $request) {
        $hero = HeroSection::first();

        if (!$hero) {
            $this->store($request);
        } else {
            $this->update($request, $hero);
        }
        return redirect()->route('admin.hero.index')->with('success', 'Hero Section Information Saved Successfylly');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            // 'buttons' => 'array|nullable',
        ]);

        HeroSection::create([
            'title' => $request->title,
            'description' => $request->description,
            // 'buttons' => $request->buttons,
        ]);
    }
    public function update($request, $hero) {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            // 'buttons' => 'array|nullable',
        ]);

        $hero->update([
            'title' => $request->title,
            'description' => $request->description,
            // 'buttons' => $request->buttons,
        ]);
    }
    
    // public function edit(Category $category) {
    //     return view('backend.category.edit', compact('category'));
    // }
    
    // public function update(Request $request, Category $category) {
    //     $request->validate([
    //         'name' => 'required|unique:categories,name,'.$category->id,
    //     ]);

    //     $category->update([
    //         'name' => $request->name,
    //         'slug' => Str::slug($request->name),
    //         'status' => ($request->status) ? true : false,
    //     ]);
    //     return redirect()->route('admin.category.index')->with('success', 'Category Created Successfylly');
    // }
    
    // public function delete(Category $category) {
    //     $category->delete();
    //     return redirect()->route('admin.category.index')->with('success', 'Category Deleted Successfylly');
    // }
}
