<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::all();
        return view('backend.menu.index',compact('menus'));
    }

    public function Getmenus(){
        $menus = Menu::all();
        return response()->json($menus);
    }

    public function store(Request $request){

        $request->validate([
            'name'        => 'required|unique:menus',
            'description' => 'required',
        ]);

        Menu::create([
            'name'        => Str::slug($request->name),
            'description' => $request->description,
        ]);
    }

    public function update(Request $request){
        $menu = Menu::find($request->id);
        
        $request->validate([
            'name'        => 'required|unique:menus,name,'.$request->id,
            'description' => 'required',
        ]);

        $menu->update([
            'name'        => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return $response =['message' => 'Menu Update Successfully'];
    }

    public function delete($id){
        $menu = Menu::find($id);
        if($menu->deleteable === 0){
            return $response=['error' => 'You cannot delete this'];
        }
        $menu->delete();
        return $response =['message' => 'Menu Delete Successfully'];
    }
}
