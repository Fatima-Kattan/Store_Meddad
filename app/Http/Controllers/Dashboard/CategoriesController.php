<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Rules\FilterRule;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $request = request();
        $query = category::query('query');
        $name = $request->query('name');
        $status = $request->query('status');
        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        if ($status) {
            $query->where('status', $status);
        }
        /*  $categories = Category::all();
        return view('dashboard.pages.categories.index', compact('categories')); */
        return view('dashboard.pages.categories.index', [
            'categories' => $query->withCount('products')->paginate(4),
        ]);
    }
    public function create()
    {
        $category = new Category();
        return view('dashboard.pages.categories.create', compact('category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            /* 'name' => 'required|max:50|min:3', */
            // 'name' => 'required|between:3,50',
            'name'=>[
                'required',
                'between:3,20',
                'unique:categories,name',
                'filter',
                // function ($attribute, $value, $fail) {
                //     if ($value === 'bar') {
                //         $fail('bar is not allowed as a category name.');
                //     }
                // },
                new FilterRule(),
            ],
            'description' => [
                'required',
                'min:10',
                'max:255',
                ],
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->name;
        $category->status = $request->status;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('dashboard.categories.index')->with('success', 'Category created successfully.');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.pages.categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('dashboard.pages.categories.index')->with('success', 'Category updated successfully.');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('dashboard.pages.categories.index')->with('success', 'Category deleted successfully.');
    }
}
