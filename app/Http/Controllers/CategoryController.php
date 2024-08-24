<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $list_category = Category::paginate(50);
        return view('dashboard.category.index', compact('list_category'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ], ['name.required' => 'يجب إدخال اسم التصنيف !']);

        Category::create([
            'name' => $request->name
        ]);

        toast('تم إضافة التصنيف بنجاح', 'success');
        return back();
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ], ['name.required' => 'يجب إدخال اسم التصنيف !']);

        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->save();
        toast('تم تحديث التصنيف بنجاح', 'success');
        return back();
    }

    public function delete(Request $request){
        $category = Category::findOrFail($request->id);
        $category->delete();
        return back();
    }
    
}
