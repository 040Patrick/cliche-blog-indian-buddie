<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ServerController extends Controller
{
    public function home(): View
    {
        $posts = Post::with('user')->paginate(10);

        return view('home', compact('posts'));
    }
}
