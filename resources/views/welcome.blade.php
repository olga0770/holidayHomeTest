@extends('layouts.app')

@section('content')

    {{--<div class="container mb-5">
        <div class="row">

            <form>
                <div class="d-flex justify-content-between align-items-center">

                    <div class="col-sm-12 col-md-4">
                        <input id="country"
                               type="text"
                               class="form-control mr-5 p-4"
                               name="country"
                               value=""
                               required autocomplete="country" autofocus
                               placeholder="Country">
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <input id="arriveDate"
                               type="date"
                               class="form-control mr-5 p-4"
                               name="arriveDate"
                               value=""
                               required autocomplete="arriveDate" autofocus
                               placeholder="Arrive">
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <input id="departDate"
                               type="date"
                               class="form-control mr-5 p-4"
                               name="departDate"
                               value=""
                               required autocomplete="departDate" autofocus
                               placeholder="Depart">
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <input id="guests"
                               type="number"
                               class="form-control mr-5 p-4"
                               name="guests"
                               value=""
                               required autocomplete="guests" autofocus
                               placeholder="Guests">
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <button type="submit" class="btn btn-primary btn-block p-3">Search</button>
                    </div>

                </div>
            </form>

        </div>
        <hr>
    </div>--}}

    <div class="container">
        @foreach($posts as $post)
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <a href="/p/{{ $post->id }}">
                        <img src="/storage/{{ $post->image }}" class="w-100">
                    </a>
                </div>

                <div class="col-sm-12 col-md-8">
                    <h2>{{ $post->title }}</h2>
                    <div class="d-flex">
                        <h5 class="pr-3" style="height: 25px; border-right: 1px solid #333333">{{ $post->city }}</h5>
                        <h5 class="pr-3 pl-3"
                            style="height: 25px; border-right: 1px solid #333333">{{ $post->postcode }}</h5>
                        <h5 class="pr-3 pl-3">{{ $post->country }}</h5>
                    </div>
                    <p>{{ $post->description }}</p>
                </div>
            </div>
            <hr>
        @endforeach
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">{{ $posts->links() }}</div>
    </div>

@endsection
