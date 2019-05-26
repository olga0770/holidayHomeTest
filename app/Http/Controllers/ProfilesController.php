<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Utils\RemoteImageUtil;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
        });

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });

        if (env('APP_ENV') != 'local') { // use remote storage
            $contents = Storage::disk('s3')->get($user->profile->image);
            $base_64_img = base64_encode($contents);
        }
        else {
            $base_64_img = '';
        }

        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('profiles.index', compact('user','follows', 'postCount', 'followersCount', 'followingCount'))
            ->with('base_64_array', RemoteImageUtil::get_image_array($posts))
            ->with('base_64_img', $base_64_img);
    }

    public function edit(User $user){
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));

    }

    public function update(User $user){
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:3'],
            'image' => ['image', 'max:500'],
        ]);


        if(request('image')){

            if (env('APP_ENV')=='local') {
                $imagePath = request('image')->store('profile', 'public');
                $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1000, 1000);
                $image->save();
            } else {
                $imagePath = request('image_file')->store('holidayHomeTest/profiles', 's3');
            }

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
