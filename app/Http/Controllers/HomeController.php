<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{

    public function index(Post $post)
    {

        $posts = Post::orderBy('created_at', 'desc')->paginate(3);

        $base_64_array = [];

        if (env('APP_ENV') != 'local') {

            foreach ($posts as $post) {
                $contents = Storage::disk('s3')->get($post->image);
                $base_64_img = base64_encode($contents);
                $base_64_array[$post->id] = $base_64_img;
            }
        }

        return view('welcome', compact('posts'))->with('base_64_array', $base_64_array);
    }
}
