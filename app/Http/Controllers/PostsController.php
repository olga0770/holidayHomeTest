<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postcode' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);

        $image->save();

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'city' => $data['city'],
            'country' => $data['country'],
            'postcode' => $data['postcode'],
            'description' => $data['description'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post){
        return view('posts.show', compact('post'));
    }

}
