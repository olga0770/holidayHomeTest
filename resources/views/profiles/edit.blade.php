@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <label for="heading" class="col-md-4 col-form-label text-md-right"></label>
                    <h2 class="col-md-6">Update Profile:</h2>
                </div><hr>

                <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('title') is-invalid @enderror"
                                   name="title"
                                   value="{{ old('title') ?? $user->profile->title }}"
                                   autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <input id="description"
                                   type="text"
                                   class="form-control @error('description') is-invalid @enderror"
                                   name="description"
                                   value="{{ old('description') ?? $user->profile->description }}"
                                   autocomplete="description" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">Profile Image</label>
                        <div class="col-md-6">
                            <input type="file" id="image" name="image">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection
