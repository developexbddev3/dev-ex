<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuBuilderController extends Controller
{
    public function order(Request $request,$id){
        $menuItemOrder = json_decode($request->get('order'));
        $this->ordermenu($menuItemOrder,null);

    }
    private function ordermenu(array $menuItems, $parentId){
        foreach ($menuItems as $index => $item){
            $menuItem = MenuItem::findOrFail($item->id);
            $menuItem->update([
               'order' => $index+1,
               'parent_id' => $parentId
            ]);
            if(isset($item->children)){
                $this->ordermenu($item->children,$menuItem->id);
            }
        }
    }

    public function index($id){

        $menu = Menu::find($id);
        return view('backend.menu.builder',compact('menu'));
    }



    public function create($id)
    {
        $menu = Menu::find($id);
        return view('backend.menu.item.create',compact('menu'));
    }

    public function store(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string',
            'url' => 'nullable|string',
            'target' => 'nullable|string',
        ]);
        $menu = Menu::find($id);

        $menu->menuItems()->create([
            'type'=> $request->type,
            'divider_title'=> $request->divider_title,
            'title'=> $request->title,
            'url'=> $request->url,
            'target'=> $request->target,
            'icon_class'=> $request->icon_class,
        ]);
        //notification
        $notification = array(
            'message' =>'Menu Item Added',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.menus.builder',$menu->id)->with($notification);
    }

    public function itemEdit($id,$itemId){

        $menu = Menu::find($id);
        $menuItem = MenuItem::where('menu_id',$menu->id)->findOrFail($itemId);
        return view('backend.menu.item.create',compact('menu','menuItem'));
    }


    public function itemUpdate(Request $request,$id,$itemId){
 
        $this->validate($request,[
         
            'title' => 'nullable|string',
            'url' => 'nullable|string',
            'target' => 'nullable|string',
      
        ]);

        $menu = Menu::find($id);

        MenuItem::where('menu_id',$menu->id)->findOrfail($itemId)->update([
            'type'=> $request->type,
            'divider_title'=> $request->divider_title,
            'title'=> $request->title,
            'url'=> $request->url,
            'target'=> $request->target,
            'icon_class'=> $request->icon_class,
        ]);
        //notification
        $notification = array(
            'message' =>'Menu Item Updated',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.menus.builder',$menu->id)->with($notification);
    }


    public function itemDelete($id,$itemId){
        MenuItem::where('menu_id',$id)->findOrfail($itemId)->delete();
        //notification
        $notification = array(
            'message' =>'Menu Item Deleted',
            'alert-type' =>'success'
        );
        return back()->with($notification);
    }

    
}
