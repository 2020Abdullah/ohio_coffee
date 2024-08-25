<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuEditRequest;
use App\Http\Requests\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $list_menu = Menu::latest()->paginate(50);
        return view('dashboard.menu.list', compact('list_menu'));
    }

    public function add(){
        $list_category = Category::all();
        return view('dashboard.menu.add', compact('list_category'));
    }

    public function store(MenuRequest $request){
        $menu = new Menu();
        // upload file image 
        if($request->hasFile('image')){
            $generateFile = time() . '.' . $request->image->extension();
            $folder = public_path('images/menu/');
            $request->image->move($folder, $generateFile);
            $menuImgPath = 'images/menu/' . $generateFile;
            $menu->image = $menuImgPath;
        }

        $desiredOrder = $request->input('order');

        Menu::where('order', '>=', $desiredOrder)->increment('order');

        $menu->name_ar = $request->name_ar;
        $menu->name_en = $request->name_en;
        $menu->desc = $request->desc;
        $menu->price = $request->price;
        $menu->category_id  = $request->category_id;
        $menu->status  = $request->status;
        $menu->order  = $request->order;
        $menu->save();

        toast('تم إضافة المنيو بنجاح', 'success');
        return redirect()->route('menu.list');
    }

    public function edit($id){
        $menu = Menu::findOrFail($id);
        $list_category = Category::all();
        return view('dashboard.menu.edit', compact('menu', 'list_category'));
    }

    public function update(MenuEditRequest $request){
        $menu = Menu::findOrFail($request->id);

        // upload file image 
        if($request->hasFile('image')){
            // delete old image 
            if($menu->image !== null){
                $file_path = public_path($menu->image);
                if($file_path){
                    unlink($file_path);
                }
            }

            // upload New Image
            $generateFile = time() . '.' . $request->image->extension();
            $folder = public_path('images/menu/');
            $request->image->move($folder, $generateFile);
            $menuImgPath = 'images/menu/' . $generateFile;
            $menu->image = $menuImgPath;
        }

        $menu->name_ar = $request->name_ar;
        $menu->name_en = $request->name_en;
        $menu->desc = $request->desc;
        $menu->price = $request->price;
        $menu->category_id  = $request->category_id;
        $menu->status  = $request->status;
        $menu->order  = $request->order;
        $menu->save();

        toast('تم تحديث المنيو بنجاح', 'success');
        return redirect()->route('menu.list');
    }

    public function delete(Request $request){
        $menu = Menu::findOrFail($request->id);
        $menu->delete();
        return back();
    }
}
