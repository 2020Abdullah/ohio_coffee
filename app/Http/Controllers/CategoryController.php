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

        $desiredOrder = $request->input('order');

        Category::where('order', '>=', $desiredOrder)->increment('order');

        Category::create([
            'name' => $request->name,
            'order' => $request->order
        ]);

        toast('تم إضافة التصنيف بنجاح', 'success');
        return back();
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ], ['name.required' => 'يجب إدخال اسم التصنيف !']);

        $desiredOrder = $request->input('order');

        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->order = $desiredOrder;
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
