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

    @if (Auth::guest())
        <div class="auth_popup">
            <div class="big_popup">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="left-image">
                            <h2>Delivery Details</h2>
                            <img src="{{ asset('images/pizza-pack.png') }}" class="img-responsive"/>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        {!! Form::open(['route' => 'authUser']) !!}
                            <div class="mobile_number_box">
                                {!! Form::text('phone', null, ['class' => 'popup_input',  'placeholder' => 'Mobile/Phone Number', 'required' => 'required', 'id' => 'auth_mobile_phone',]) !!}
                                <p class="answer">We know you! We already friends. Please check your details and click Continue</p>
                            </div>
                            <div class="first_last">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('last_name', null, ['class' => 'name_input', 'placeholder' => 'Last Name', 'id' => 'auth_first_name', 'required' => 'required']) !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('first_name', null, ['class' => 'name_input', 'placeholder' => 'First Name', 'id' => 'auth_last_name', 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="contineue">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                                    {!! Form::text('street', null, ['class' => 'name_input', 'placeholder' => 'Street', 'id' => 'auth_street', 'required' => 'required']) !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                                    {!! Form::text('city', null, ['class' => 'name_input', 'placeholder' => 'City', 'id' => 'auth_city', 'required' => 'required']) !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                                    {!! Form::text('home_number', null, ['class' => 'name_input', 'placeholder' => 'Home Number', 'id' => 'auth_home_number', 'required' => 'required']) !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                                    {!! Form::text('street_number', null, ['class' => 'name_input', 'placeholder' => 'Street Number', 'id' => 'auth_street_number', 'required' => 'required']) !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                                    {!! Form::text('floor', null, ['class' => 'name_input', 'placeholder' => 'Floor', 'id' => 'auth_floor', 'required' => 'required']) !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                                    <input class="name_input" name="entrance" type="text" placeholder="Entrance"/>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea id="comment" rows="8" class="aqua_input_comments" name="message" placeholder="Comments"></textarea>
                                    <div style="text-align:center">
                                        {!! Form::submit('Continue', ['class' => 'contineue_btn']) !!}
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-md-3 logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('images/top-logo.png')  }}"></a>
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
                                <li class="sales"><a href="{{ url('sales') }}">Sales/Coupon</a></li>
                                <li class="order"><a href="javascript:void(0)">Order Now</a></li>
                                <li class="menu"><a href="{{ url('menu') }}">Menu</a></li>
                                <li class="friends"><a href="{{ url('friends-club') }}">Friends Club</a></li>
                                <li class="about"><a href="{{ url('about') }}">About Us</a></li>
                                <li class="home"><a href="{{ url('/') }}">Home</a></li>
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
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVt4mD9oqVr7M3RGtx2X5a-JgOgpiy1E8&libraries=places"></script>
        {{--<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>--}}
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <!-- PARSLEY -->
        <script>
            window.ParsleyConfig = {
                errorsWrapper: '<div></div>',
                errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
                errorClass: 'has-error',
                successClass: 'has-success'
            };
        </script>
        <script src="http://parsleyjs.org/dist/parsley.js"></script>
        <script>
            // This identifies your website in the createToken call below
            Stripe.setPublishableKey('{!! env('STRIPE_PK') !!}')
        </script>


        <script src="{{ elixir('js/all.js') }}"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
        </script>
    </body>
</html>