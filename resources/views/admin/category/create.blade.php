@extends('admin.layouts.main')

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Category</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </div>

        <div class="row justify-content-center">

            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{Session::get('message')}}
                </div>
            @endif
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName">Category Name</label>
                                <input type="text" name="category-name"
                                       class="form-control @error('category-name') is-invalid @enderror"
                                       id="exampleInputName" aria-describedby="emailHelp"
                                       value="{{old('category-name')}}"
                                       placeholder="Category name">
                                @error('category-name')
                                <small id="emailHelp" class="form-text text-danger">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">Description</label>
                                <textarea name="description"
                                          class="form-control @error('description') is-invalid @enderror"
                                          id="exampleInputName" aria-describedby="emailHelp"
                                          placeholder="Description">{{old('description')}}</textarea>
                                @error('description')
                                <small id="emailHelp" class="form-text text-danger">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">Image</label>
                                <input type="file" name="image"
                                       class="form-control @error('image') is-invalid @enderror"
                                       id="exampleInputName" aria-describedby="emailHelp"
                                       placeholder="Image">
                                @error('image')
                                <small id="emailHelp" class="form-text text-danger">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
