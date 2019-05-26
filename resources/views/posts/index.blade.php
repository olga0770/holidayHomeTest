@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        @foreach($posts as $post)

                <div class="col-sm-12 col-md-4">
                    <a href="/p/{{ $post->id }}">



{{--                        {{$base_64_array[$post->id]}}--}}

{{--                        @include('layouts.holiday-home-image')--}}
                    </a>
                    <p class="small">{{ $post->title }}</p>
                </div>

            @endforeach
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center">{{ $posts->links() }}</div>
        </div>

    </div>
@endsection



