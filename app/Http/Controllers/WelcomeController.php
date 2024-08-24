<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Image;
use App\Models\Menu;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class WelcomeController extends Controller
{
    public function index(){
        $qrCode = QrCode::size(300)->generate(route('menu'));
        return view('qrCode', compact('qrCode'));
    }

    public function getMenu(){
        $data['list_category'] = Category::all();
        $data['list_menu'] = Menu::with('category')->where('status', 1)->get();
        $data['contact'] = Contact::latest()->first();
        $data['images'] = Image::all();
        return view('welcome', $data);
    }
}
