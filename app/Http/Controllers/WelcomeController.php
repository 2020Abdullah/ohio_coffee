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
        $data['list_category'] = Category::orderBy('order', 'asc')->get();
        $data['list_menu'] = Menu::orderBy('order', 'asc')->with('category')->where('status', 1)->get();
        $data['contact'] = Contact::latest()->first();
        $data['images'] = Image::orderBy('order', 'asc')->get();
        return view('welcome', $data);
    }
}
