<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('welcome', compact('posts'));
    }
}
