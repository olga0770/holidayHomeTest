<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Utils\RemoteImageUtil;
use App\Post;


class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);

        return view('welcome', compact('posts'))->with('base_64_array', RemoteImageUtil::get_image_array($posts));
    }

}
