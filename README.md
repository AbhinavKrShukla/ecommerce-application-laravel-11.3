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























