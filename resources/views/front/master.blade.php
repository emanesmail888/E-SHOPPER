<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Album example · Bootstrap</title>

    <!-- Bootstrap core CSS -->

    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
      <!-- jquery -->

      <!-- Price nouislider-filter cdn -->

     <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/bootstrap.css')}}" rel="stylesheet">

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
    <link href="{{asset('dist/css/album.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/owl.theme.default.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/owl.theme.green.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/owl.theme.green.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('dist/css/nouislider.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('dist/css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/bootstrap.min.css.map')}}" rel="stylesheet">
    <link href="{{asset('dist/css/bootstrap.css.map')}}" rel="stylesheet">
    <link href="{{asset('dist/css/bootstrap-grid.min.css.map')}}" rel="stylesheet">
    <link href="{{asset('dist/css/bootstrap-reboot.min.css.map')}}" rel="stylesheet">
    {{-- <link href="{{asset('dist/css/swiper-bundle.min.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('dist/css/slick.css')}}" rel="stylesheet">
  </head>
  <body>
    @include('front.top_header')

    @include('front.menu')





@yield('content')


    <footer class="mt-5 pb-0 mb-0 ">

        <div class="container">
            <div class="row">

                <div class="col-md-5 pt-3">
                    <ul class="footer-nav">

                        <li><a href="#">Back to top</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Shop </a></li>
                        <li><a href="#">Menu </a></li>
                        <li><a href="#">Wish List </a></li>
                    </ul>
                </div><!-- footer-nav -->
                <div class="col-md-3 pt-3">
                        <p>Copyright &copy by eman esmail</p>

                </div>
                <div class="col-md-4 pt-2">
                    <ul class="social-nav">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter "></i></a></li>
                        <li><a href="#"><i class="fab fa-google"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>

            </div><!-- row -->

        </div><!-- container -->

    </footer>



{{-- <script src="{{asset('dist/js/vendor/jquery.min.js')}}"></script> --}}




   <!-- JS From Vivid -->

  <script src="{{asset('dist/js/jquery.js')}}"></script>


<script src="{{asset('dist/js/jquery.validate.js')}}"></script>
{{-- <script src="{{asset('dist/js/bootstrap.min.js.map')}}"></script> --}}
<script src="{{asset('dist/js/jquery-3.6.0.min.js')}}"></script>
{{-- <script src="{{asset('dist/js/nouislider.min.js')}}"></script> --}}
 <script src="{{asset('dist/js/jquery-ui.js')}}"></script>


 <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>




{{-- <script src="{{asset('dist/js/jquery-3.3.1.min.js')}}"></script> --}}
<script src="{{asset('dist/js/bootstrap.js')}}"></script>
{{-- <script src="{{asset('dist/js/jquery.js')}}"></script> --}}
<script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>

{{-- <script src="{{asset('dist/js/bootstrap.esm.min.js')}}"></script> --}}
{{-- <script src="{{asset('dist/js/bootstrap.bundle.js')}}"></scrip> --}}
<script src="{{asset('dist/js/owl.carousel.js')}}"></script>

<script src="{{asset('dist/js/owl.carousel.min.js')}}"></script>
{{-- <script src="{{asset('dist/js/swiper-bundle.min.js')}}"></script> --}}
<script src="{{asset('dist/js/slick.min.js')}}"></script>



@yield('scripts')


{{-- <link type="text/css" rel="stylesheet" href="{{ mix('js/app.js') }}"> --}}


 {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
      {{-- <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script> --}}
</html>
