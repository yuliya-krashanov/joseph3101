@extends('app')

@section('page-title', 'Home')

@section('header')
    <body>
        <div class="deal popup {{ $popup }}">

            <div class="small_popup_home">
                <img src="{{ asset('images/home--pizza.png') }}" alt="">
                <h1 class="doller_price home">$10</h1>
                <span class="deal_home" dir="ltr">Big deal!</span>
                <h2 class="greek_home">"hawaii"</h2>
                <small class="pop-small_home"> Pizza dough with tomato sauce, ham Pure nature, pineapple and Gouda cheese</small>
                <p class="no-yes-btn_home">
                    <button class="sm_button yes-add_home home-popup-button" data-value="get">Get Deal</button>
                    <button class="sm_button no-thank_home home-popup-button" data-value="no">No, Thanks</button>
                </p>
            </div>

        </div>
        <div id="bck2">
            @parent
        </div>
@endsection

@section('content')
    <div id="bck">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 main-page">
                        <!---------->
                        <div class="first position1">
                            <img src="{{ asset('images/bike.png')  }}" class=""/>
                            <p>Fast</p>
                            <h3>Delivery</h3>
                        </div>
                        <!---------->
                        <div class="second position2">
                            <img src="{{ asset('images/pizza.png')  }}" class=""/>
                            <p>Check Out Our</p>
                            <h3>Sales</h3>
                        </div>
                        <!---------->
                        <div class="third position3">
                            <img src="{{ asset('images/fb.png')  }}" class=""/>
                            <p>Join us on</p>
                            <h4>Facebook</h4>
                        </div>
                        <!---------->
                        <div class="four position4">
                            <img src="{{ asset('images/mobile.png')  }}" class=""/>
                            <p>New mobile</p>
                            <h3>App</h3>
                        </div>
                        <!---------->
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 right-section">
                        <div class="lets">
                            <img src="{{ asset('images/lets.png')  }}" class="img-responsive"/>
                        </div>
                        <!---------->
                        <div class="circle">
                            <img src="{{ asset('images/circle.png')  }}" class=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')

    <footer class="blue">
        <div class="footimgabout">
            <img class="foot-org" src="{{ asset('images/home-footer.png')  }}">
            <img class="foot-small-image" src="{{ asset('images/small-footer.png')  }}">
        </div>
        @parent
    </footer>

@endsection