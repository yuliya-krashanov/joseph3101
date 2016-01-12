@extends('app')

@section('page-title', 'Contact')


@section('header')
    <body class="contact">
    <style type="text/css">
        body,td,th {
            font-size: 36px;
        }
    </style>
    <div class="deal popup">

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
    @parent
@endsection

@section('content')

    <section class="titlearea">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h2 class="contacttitle">Contact Us</h2>
                    <h4 class="sub-heading">18th Keren-Hayesod St. &nbsp;&nbsp;&nbsp;&nbsp; Kiryat-Biyalik &nbsp;&nbsp;&nbsp;&nbsp; 04-87654321 </h4>
                    <!--<ul class="list-inline contect-address">
                        <li>18th Keren-Hayesod St. </li>
                        <li>Kiryat-Biyalik </li>
                        <li>04-87654321 </li>
                    </ul>-->
                </div>
            </div>
        </div>
    </section>
    <section class="contentarea-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="content_from">
                            <div class="from-area">

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                {!! Form::open(['route' => 'contactCreate']) !!}
                                    <p>
                                        {!! Form::text('name', null, ['class' => 'aqua_input', 'id' => 'author', 'placeholder' => 'Full Name*' ]) !!}
                                    </p>
                                    <p>
                                        {!! Form::email('email', null, ['class' => 'aqua_input', 'id' => 'email', 'placeholder' => 'Email*']) !!}
                                    </p>
                                    <p>
                                        {!! Form::text('phone', null, ['class' => 'aqua_input', 'id' => 'contact_number', 'placeholder' => 'Phone Number*']) !!}
                                    </p>
                                    <p>
                                        {!! Form::textarea('message', null, ['class' => 'aqua_input_msg', 'id' => 'comment', 'placeholder' => 'Message*', 'rows' => 8]) !!}
                                    </p>
                                    <p>
                                        {!! Form::submit('Send', ['class' => 'sm_button', 'id' => 'submit']) !!}
                                    </p>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

<footer class="yellow">
    <div class="contact_footer">
        <div class="footimgcontact">
            <img src="{{  asset('images/contact-footer.png') }}"  class="img-responsive">
        </div>
       @parent
    </div>
</footer>

@endsection

