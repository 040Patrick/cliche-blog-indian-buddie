<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        if(Auth::user()->usertype === 'admin')
        {
            return view('admin.dashboard');
        }

        return view('dashboard');
    }
}
