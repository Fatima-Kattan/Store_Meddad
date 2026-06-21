<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function index()
    {
        $request = request();
        $query = Store::query();
        $name = $request->input('name');
        $status = $request->input('status');
        if ($name) {
            $query->where('name', 'Like', "%$name%");
        }
        if ($status) {
            $query->where('status', '=', $status);
        }
        return view('dashboard.pages.stores.index', [
            'stores' => $query->withCount('users')->paginate(10),
        ]);
    }

    public function create()
    {
        $store = new Store();
        return view('dashboard.pages.stores.create', [
            'store' => $store,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo'=> 'nullable|image',
            'status' => 'required|in:active,inactive',
        ]);

        Store::create($data);

    return redirect()->route('dashboard.stores.index')->with('success', 'Store created successfully.');
    }

    public function show(Store $store)
    {
        return view('dashboard.pages.stores.show', [
            'store' => $store,
        ]);
    }   

    public function edit(Store $store)
    {
        return view('dashboard.pages.stores.edit', [
            'store' => $store,
        ]);
    }

    public function update(Request $request, Store $store)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo'=> 'nullable|image',
            'status' => 'required|in:active,inactive',
        ]);

        $store->update($data);

        return redirect()->route('dashboard.stores.index')->with('success', 'Store updated successfully.');
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('dashboard.stores.index')->with('success', 'Store deleted successfully.');
    }
}
