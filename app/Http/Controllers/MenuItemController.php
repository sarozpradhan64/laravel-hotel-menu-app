<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Helper\ImageManager;
use App\Http\Requests\StoreMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Models\MenuCategory;

class MenuItemController extends Controller
{
    use ImageManager;

    public function index()
    {
        $items = MenuItem::all();
        $cols = ['title', 'image', 'price', 'state', 'created_at'];
        return view('menu-item.index', compact('items', 'cols'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = MenuCategory::select('id', 'title')->orderBy('title', 'ASC')->get();
        return view('menu-item.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuItemRequest $request)
    {
        $filename = null;
        if ($request->hasFile('image')) {
            $path = 'images/menu-items/';

            $filename = $this->fileUpload($request->file('image'), $path);
        }
        $request->merge([
            'slug' => Str::slug($request->title, '-'),
        ]);
        $category = MenuItem::create($request->except('image'));
        $category->image = $filename;
        $category->save();
        Session::flash('success', 'Menu Item Created !');
        return redirect(redirect('menu-item.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menuItem)
    {
        $categories = MenuCategory::select('id', 'title')->orderBy('title', 'ASC')->get();
        return view('menu-item.edit', compact('menuItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuItemRequest $request, MenuItem $menuItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
