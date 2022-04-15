<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
{{-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="style.css">
    <link href="{{asset('dist/css/dashboard.css')}}" rel="stylesheet">
  </head>
  <body>
    @include('Admin.admin_header')


<div class="container-fluid">
  <div class="row">
    <div class="col-md-2  d-sm-block bg-light pt-5  ">
@include('Admin.includes.sidenav')
<div class=" ml-sm-auto col-md-10 mt-5 pt-4" >

    @yield('content')

  </div>
</div>
<script src="{{asset('dist/js/jquery.js')}}"></script>

<script src="{{asset('dist/js/jquery-3.6.0.min.js')}}"></script>

 <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>




{{-- <script src="{{asset('dist/js/jquery-3.3.1.min.js')}}"></script> --}}
{{-- <script src="{{asset('dist/js/bootstrap.min.js')}}"></script> --}}
<script src="{{asset('dist/js/bootstrap.js')}}"></script>
{{-- <script src="{{asset('dist/js/jquery.js')}}"></script> --}}
<script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>
{{-- <script src="{{asset('dist/js/jquery.min.js')}}"></script> --}}
{{-- <script src="{{asset('dist/js/jquery-ui.js')}}"></script> --}}
{{-- <script src="{{asset('dist/js/bootstrap.esm.min.js')}}"></script> --}}
<script src="{{asset('dist/js/bootstrap.bundle.js')}}"></script>

    </body>
</html>
