@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <label for="heading" class="col-md-4 col-form-label text-md-right"></label>
                <h2 class="col-md-6">Add New Post:</h2>
                </div><hr>


                <form action="/p" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Post Title</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('title') is-invalid @enderror"
                                   name="title"
                                   value="{{ old('title') }}"
                                   autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                        <div class="col-md-6">
                            <input id="city"
                                   type="text"
                                   class="form-control @error('city') is-invalid @enderror"
                                   name="city"
                                   value="{{ old('city') }}"
                                   autocomplete="city" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                        <div class="col-md-6">
                            <input id="country"
                                   type="text"
                                   class="form-control @error('country') is-invalid @enderror"
                                   name="country"
                                   value="{{ old('country') }}"
                                   autocomplete="country" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="postcode" class="col-md-4 col-form-label text-md-right">Postcode</label>
                        <div class="col-md-6">
                            <input id="postcode"
                                   type="text"
                                   class="form-control @error('postcode') is-invalid @enderror"
                                   name="postcode"
                                   value="{{ old('postcode') }}"
                                   autocomplete="postcode" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <input id="description"
                                   type="text"
                                   class="form-control @error('description') is-invalid @enderror"
                                   name="description"
                                   value="{{ old('description') }}"
                                   autocomplete="description" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image_file" class="col-md-4 col-form-label text-md-right">Upload Image</label>
                        <div class="col-md-6">
                            <input type="file"
                                   id="image_file"
                                   name="image_file"
                                   class="@error('image_file') is-invalid @enderror">
                        </div>
                    </div>


                    <div class="form-group row">
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


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Add New Post</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection

