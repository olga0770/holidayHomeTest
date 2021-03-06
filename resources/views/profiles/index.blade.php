@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-3 p-5">
{{--
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
--}}
                <img src="/svg/user_profile.jpg" class="rounded-circle w-100">

            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h3 pt-1">{{ $user->name }}</div>
                    </div>

                    @can('update', $user->profile)
                        <a href="/p/create">Add New Post</a>
                    @endcan

                </div>

                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan

                <div class="font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
            </div>
        </div>

        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-sm-12 col-md-4 pb-4">
                    <a href="/p/{{ $post->id }}">

                        @if (!empty($base_64_array[$post->id]))
                            <img src="data:image/png;base64, {{$base_64_array[$post->id]}}" class="w-100" alt="a picture of the holiday home"/>
                        @else
                            <img src="/storage/{{ $post->image }}" class="w-100" alt="a picture of the holiday home">
                        @endif

                    </a>
                    <p class="small">{{ $post->title }}</p>
                </div>
            @endforeach
        </div>

    </div>
@endsection
