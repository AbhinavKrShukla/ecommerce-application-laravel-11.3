<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<center><h1>Ecommerce Application</h1></center>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Documentation of Project

# Laravel Scaffolding

Install these packages:
- `composer require laravel/ui`
- `php artisan ui vue --auth`
- `npm install`

# Integrating Admin Template

Get the `Ruang-Admin` template from this url https://themewagon.com/themes/free-bootstrap-4-html-5-admin-dashboard-website-template-ruang/.

Extract it and save it at `public/ruang-admin/*`.

## Link Css and Js Properly

- Create `views/admin/dashboard.blade.php`
- Copy everything from `ruang-admin/index.html` and paste it in 
`dashboard.blade.php`.
- In `dashboard.blade.php`, modify all the links in this way:

`<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">`
 to 
`<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">`


## Split pages

Let's split the pages for different sections of page into different files.
These are navbar, header, sidebar, container, main and footer. This will allow us 
to just write the main section of pages, and the other copied stuff such as
navbar, footer, etc. will be automatically imported.

- Create `views/admin/layouts/`:
  - navbar.blade.php
  - header.blade.php
  - sidebar.blade.php
  - container.blade.php
  - main.blade.php
  - footer.blade.php

    
- Split each section from `dashboard.blade.php` and paste it in
respective files in `layouts/`.

- Copy the contents of `dashboard.blade.php` to `layotus/main.blade.php`.

- Modify it such that it yields 'content':

```bladehtml
<!--views/admin/layout/main.blade.php-->
@include('admin.layouts.header')

<div id="wrapper">
    <!-- Sidebar -->

    @include('admin.layouts.sidebar')

    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            @include('admin.layouts.navbar')
            <!-- Topbar -->

            <!-- Container Fluid-->
            @yield('content')
            <!---Container Fluid-->
        </div>
        <!-- Footer -->
        @include('admin.layouts.footer')
        <!-- Footer -->

    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
``` 

<hr>


# Category

`php artisan make:model Category -m`

`php artisan make:controller CategoryController -r`

```php
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('image');
            $table->timestamps();
        });
```

```php
class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'image'];
}
```

```php
Route::resource('category', 'App\Http\Controllers\CategoryController');
```

- views/admin
  - category
    - create.blade.php
    - index.blade.php
    - edit.blade.php


## CRUD

### Create

#### CategoryController@create

```php
    public function create()
    {
        return view('admin.category.create');
    }
```

#### create.blade.php

```bladehtml
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

```


#### CategoryController@update

```php
    public function store(Request $request)
    {
        $request->validate([
            'category-name' => 'required|unique:categories|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image')->store('public/files');
        Category::create([
            'name' => $request->get('category-name'),
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->back()->with('message', 'Category added successfully');
    }
```


### Get all Categories






















