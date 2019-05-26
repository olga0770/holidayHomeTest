@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-6">
                @include('layouts.holiday-home-image')
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="d-flex align-items-center">

                    @if (!empty($post->user->profile->profileImage()))
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 50px; max-height: 50px;" alt="profile">
                    @endif

                    <h3 class="pl-3"><a href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></h3>
{{--
                    <a href="#" class="pl-3">Follow</a>
--}}
                </div>
                <hr>
                <h2>{{ $post->title }}</h2>
                <div class="d-flex">
                    <h5 class="pr-3" style="height: 25px; border-right: 1px solid #333333">{{ $post->city }}</h5>
                    <h5 class="pr-3 pl-3" style="height: 25px; border-right: 1px solid #333333">{{ $post->postcode }}</h5>
                    <h5 class="pr-3 pl-3">{{ $post->country }}</h5>
                </div>
                <p>{{ $post->description }}</p>
            </div>

        </div>

    </div>
@endsection


