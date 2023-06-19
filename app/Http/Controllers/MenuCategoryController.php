<?php

namespace App\Http\Controllers;

use App\Helper\ImageManager;
use App\Http\Requests\StoreMenuCategoryRequest;
use App\Http\Requests\UpdateMenuCategoryRequest;
use App\Models\MenuCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Str;

class MenuCategoryController extends Controller
{
    use ImageManager;

    public function index(): View
    {
        $categories = MenuCategory::all();
        $cols = ['title', 'image', 'state', 'created_at'];
        return view('menu-category.index', compact('categories', 'cols'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('menu-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuCategoryRequest $request)
    {
        $filename = null;
        if ($request->hasFile('image')) {
            $path = 'images/menu-categories/';

            $filename = $this->fileUpload($request->file('image'), $path);
        }
        $request->merge([
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title, '-'),
        ]);
        $category = MenuCategory::create($request->except('image'));
        $category->image = $filename;
        $category->save();
        Session::flash('success', 'Menu Category Created !');
        return redirect('menu-categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuCategory $menuCategory): View
    {
        return view('menu-category.show', compact('menuCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuCategory $menuCategory)
    {
        return view('menu-category.edit', compact('menuCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuCategoryRequest $request, MenuCategory $menuCategory)
    {
        $filename = null;

        if ($request->hasFile('image')) {
            $path = 'images/menu-categories/';

            $filename = $this->fileUpload($request->file('image'), $path, $menuCategory->image);
        }

        $request->merge([
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title, '-')
        ]);


        if ($menuCategory->user_id === Auth::id()) {
            $menuCategory->update($request->except('image'));
            if ($filename) {
                $menuCategory->image = $filename;
                $menuCategory->save();
            }

            Session::flash('success', 'Menu Category Updated !');
            return redirect('menu-categories');
        }
        Session::flash('error', 'Unauthorized !');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuCategory $menuCategory)
    {
        $menuCategory->delete();
        Session::flash('success', 'Menu Category Deleted !');
        return back();
    }
}
