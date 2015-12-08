<!DOCTYPE html>
<html lang="he-IL" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="icon" href="../../favicon.ico">
    <title> @yield('page-title') </title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{--<script src="{{ asset('js/ie-emulation-modes-warning.js')   }}"></script>--}}
    <link href='http://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="{{  elixir('css/all.css')  }}" rel="stylesheet">
    <!---------------->
</head>


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-md-3 logo">
                    <a href="#"><img src="{{ asset('images/top-logo.png')  }}"></a>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 count">
                    <h3>3101*</h3>
                </div>
                <div class="col-lg-7 col-sm-7 col-md-7 mainmenu">
                    <nav class="navbar navbar-default navbar-right">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Project name</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="contact"><a href="{{ url('contact') }}">Contact Us</a></li>
                                <li class="sales"><a href="#">Sales/Coupon</a></li>
                                <li class="order"><a href="#">Order Now</a></li>
                                <li class="menu"><a href="#">Menu</a></li>
                                <li class="friends"><a href="#">Friends Club</a></li>
                                <li class="about"><a href="{{ url('about') }}">About Us</a></li>
                                <li class="home act"><a href="{{ url('/') }}">Home</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
@show

@yield('content')

@section('footer')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6"></div>
            <div class="col-lg-3 col-sm-3 col-md-3 facebook">
                <h2><a href="#">Join Us on Facebook</a></h2>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 instagram">
                <h2><a href="#">Follow Us on Instagram</a></h2>
            </div>
        </div>
    </div>
@show


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
{{--<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>--}}
<script src="{{ elixir('js/all.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>
</body>
</html>