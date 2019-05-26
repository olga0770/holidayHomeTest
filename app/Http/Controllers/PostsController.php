<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function store(Request $request){
        $data = $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'city' => ['required', 'string', 'min:3'],
            'country' => ['required', 'string', 'min:3'],
            'postcode' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:3'],
            'image_file' => ['image', 'max:500'],
        ]);


        if(!empty($data['image_file'])) {

            if (env('APP_ENV')=='local') {
                $imagePath = $request->image_file->store('uploads', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
                $image->save();
            }
            else { // remote
                $imagePath = $request->file('image_file')->store('holidayHomeTest/posts', 's3');

                $image = Image::make(Storage::disk('s3')->get($imagePath))->fit(1200, 1200);

                Storage::disk('s3')->put($imagePath, $image);
            }

        }
        else {
            $imagePath = '';
        }

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


    public function show(Post $post){

        if (env('APP_ENV') != 'local') { // use remote storage
            $contents = Storage::disk('s3')->get($post->image);
            $base_64_img = base64_encode($contents);
        }
        else {
            $base_64_img = '';
        }

        return view('posts.show', compact('post'))->with('base_64_img', $base_64_img);
    }

}
