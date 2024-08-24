<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::latest()->first();
        return view('dashboard.contact', compact('contact'));
    }

    public function update(ContactRequest $request){
        $contact = Contact::latest()->first();
        $logo = $contact->logo;
        $logo_path = '';

        if ($request->hasFile('logo')) {
            // delete old image 
            if($logo != null){
                $file_path = public_path($logo);
                if($file_path){
                    unlink($file_path);
                }
            }

            // upload New Image
            $generateFile = time() . '.' . $request->logo->extension();
            $folder = public_path('images/');
            $request->logo->move($folder, $generateFile);
            $logo_path = 'images/' . $generateFile;
        }



        Contact::updateOrCreate([
            'is_active' => 1
        ],[
            'title' => $request->title,
            'info' => $request->info,
            'address' => $request->address,
            'phone' => $request->phone,
            'facebook_link' => $request->facebook_link,
            'instgram_link' => $request->instgram_link,
            'logo'         => $logo_path
        ]);

        toast('تم تحديث معلومات الإتصال بنجاح', 'success');
        return back();
    }

    public function slider(){
        $images = Image::all();
        return view('dashboard.slider', compact('images'));
    }

    public function sliderUpdate(Request $request){
        // تأكد من أن الحقل 'images' موجود وأنه يحتوي على ملفات
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('images')) {
            DB::table('images')->truncate();
            foreach ($request->file('images') as $image) {
                $timestamp = time(); // أو يمكنك استخدام `now()->timestamp` للحصول على الطابع الزمني
                $filename = $timestamp . '_' . $image->getClientOriginalName();
                $path = $image->move(public_path('images/slider/'), $filename); // تخزين الصورة في مجلد 'images' داخل مجلد 'storage/app/public'

                Image::create([
                    'image_path' => 'images/slider/' . $filename,
                ]);
            }
        }

        toast('تم إضافة الصور بنجاح', 'success');
        return back();
    }

    public function profile(){
        return view('dashboard.profile');
    }

    public function profileUpdate(Request $request){
        $user = User::where('id', auth('web')->user()->id)->first();
        if($request->new_password !== null){
            $user->password = Hash::make($request->new_password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        toast('تم تحديث البيانات بنجاح', 'success');
        return back();
    }
}
