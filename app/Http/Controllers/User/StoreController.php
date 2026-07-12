<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        if ($user->hasStore()) {
            return redirect()->route('user.store.edit');
        }
        return view('user.pages.store.create');
    }
}
