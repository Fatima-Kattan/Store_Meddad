<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/* use Illuminate\Http\Request; */

class TwoFactorAuthenticationController extends Controller
{
    public function index()
    {
        /* $user= Auth::guard('user')->user(); */
        $user= Auth::user();
        return view('user.pages.two-factor-auth', compact('user'));
    }

}
