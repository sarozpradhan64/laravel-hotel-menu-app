<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function Menu($user_id)
    {
        $user_id = $user_id;
        $menuCategories = MenuCategory::where(['user_id' => $user_id, 'state' => true])->has('menuItems')->with('menuItems')->get();
        return view('frontend.menu', compact('menuCategories'));
    }
}
