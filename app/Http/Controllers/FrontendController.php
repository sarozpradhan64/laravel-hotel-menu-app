<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.index');
    }
    public function Menu($user_id): View
    {
        $user_id = $user_id;
        $menuCategories = MenuCategory::where(['user_id' => $user_id, 'state' => true])->has('menuItems')->with('menuItems')->get();
        return view('frontend.pages.menu', compact('menuCategories'));
    }
}
