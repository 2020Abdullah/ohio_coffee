<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $category_count = Category::count();
        $menu_count = Menu::count();
        return view('dashboard.index', compact('category_count', 'menu_count'));
    }
}
