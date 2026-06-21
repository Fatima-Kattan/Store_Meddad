<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.products.index',[
            'products' => Product::with(['category', 'store'])->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        /*    $product = new Product();
        $categories = Category::orderby('name')->get();
        $stores = Store::orderby('name')->get(); */
        return view('dashboard.pages.products.create', [
            'product' => new Product(),
            'categories' => Category::pluck('name', 'id'),
            'stores' => Store::pluck('name', 'id'),
        ]);
    }

        public function store(Request $request){
            $request->validate([
                'name' => 'required',
                'category_id' => 'required|exists:categories,id',
                'store_id' => 'required|exists:stores,id',
                'status' => 'required|in:active,inactive',
                'description' => 'nullable|string',
            ]);
    
            Product::create($request->all());
    
            return redirect()->route('dashboard.products.index')->with('success', 'Product created successfully.');
        }

        public function edit(Product $product)
        {
            return view('dashboard.pages.products.edit', [
                'product' => $product,
                'categories' => Category::pluck('name', 'id'),
                'stores' => Store::pluck('name', 'id'),
            ]);
        }

        public function update(Request $request, Product $product)
        {
            $request->validate([
                'name' => 'required',
                'category_id' => 'required|exists:categories,id',
                'store_id' => 'required|exists:stores,id',
                'status' => 'required|in:active,inactive',
                'description' => 'nullable|string',
            ]);
    
            $product->update($request->all());
    
            return redirect()->route('dashboard.products.index')->with('success', 'Product updated successfully.');
        }

        public function destroy(Product $product)
        {
            $product->delete();
    
            return redirect()->route('dashboard.products.index')->with('success', 'Product deleted successfully.');
        }
}
