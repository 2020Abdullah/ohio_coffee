<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function slider(){
        $images = Image::all();
        return view('dashboard.slider', compact('images'));
    }

    public function sliderAdd(Request $request){
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            // upload image
            $timestamp = time(); // أو يمكنك استخدام `now()->timestamp` للحصول على الطابع الزمني
            $filename = $timestamp . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/slider/'), $filename); // تخزين الصورة في مجلد 'images' داخل مجلد 'storage/app/public'

            // order image
            $desiredOrder = $request->input('order');

            Image::where('order', '>=', $desiredOrder)->increment('order');

            Image::create([
                'image_path' => 'images/slider/' . $filename,
                'order' => $desiredOrder,
            ]);
        }

        toast('تم إضافة الصور بنجاح', 'success');
        return back();
    }

    public function sliderUpdate(Request $request){
        // تأكد من أن الحقل 'images' موجود وأنه يحتوي على ملفات
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $updateImg = Image::where('id', $request->id)->first();

        if ($request->hasFile('image')) {
            // delete old image
            $file_path = public_path($updateImg->image_path);
            if($file_path){
                unlink($file_path);
            }

            // upload New Image

            $timestamp = time(); // أو يمكنك استخدام `now()->timestamp` للحصول على الطابع الزمني
            $filename = $timestamp . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/slider/'), $filename); // تخزين الصورة في مجلد 'images' داخل مجلد 'storage/app/public'
            $updateImg->image_path = 'images/slider/' . $filename;
        }

        // update order image
        $updateImg->order = $request->order;
        $updateImg->save();

        toast('تم تعديل الصورة بنجاح', 'success');
        return back();
    }

    public function sliderDelete(Request $request){
        $image = Image::findOrFail($request->id);
        // delete image file 
        $file_path = public_path($image->image_path);
        if($file_path){
            unlink($file_path);
        }
        $image->delete();
        toast('تم حذف الصورة بنجاح', 'success');
        return back();
    }
}
