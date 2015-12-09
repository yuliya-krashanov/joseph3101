@extends('app')

@section('page-title', 'Friends Club')

@section('header')
    <body class="friendclub">
    @parent
@endsection


@section('content')
    <section class="payment-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="cloud-frnd">
                        <img src="{{ asset('images/menu/friend-c1.png') }}" class="img-responsive" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-menu">
                        <h2 class="pizza_friend">Friends Club</h2>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </section>
    <section class="friend-bg">
        <div class="friend-footer-img">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <div class="friend_bg" dir="ltr">
                                <h3 class="payment-title"></h3>
                                <div class="friend-content">
                                    <p class="friend-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor<br>
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis <br>
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br>
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu <br>
                                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in <br>
                                        culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <p>
                                    <div class="sm_button friend"><a href="{{ route('friends_club_register')  }}">Register Here</a></div>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="cloud-small">
                                <img src="{{ asset('images/menu/friend-c2.png') }}" class="img-responsive" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

    <footer class="friend-footer">
        <div class="contact-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-sm-7 col-md-7"></div>
                    <div class="col-lg-5 col-sm-5 col-md-5">
                        <div class="footimgpayment">
                            <p class="joseph-hi" dir="ltr">Hi!</p>
                            <img src="{{ asset('images/menu/friend_joshep.png') }}" class="img-responsive" />
                            <p>
                                <div class="sm_button friend-footbtn"><a href="{{ route('friends_club_register')  }}">Register Here</a></div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @parent
        </div>
    </footer>

@endsection

