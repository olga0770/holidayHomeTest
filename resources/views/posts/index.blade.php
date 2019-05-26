@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        @foreach($posts as $post)

                <div class="col-sm-12 col-md-4">
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

        <div class="row">
            <div class="col-12 d-flex justify-content-center">{{ $posts->links() }}</div>
        </div>

    </div>
@endsection



