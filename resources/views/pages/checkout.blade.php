@extends('app')

@section('page-title', 'Credit Card Checkout')

@section('header')
    <body class="menu">
    @parent
@endsection


@section('content')


<section class="titlearea-menu">
    <div class="container">
        <div class="row">

        </div>
    </div>
</section>
<section class="menu-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="menu_from">
                        <h3 class="menu-title">Credit Card</h3>
                        <div class="card-from">
                            {!! Form::open(['route' => 'checkoutCard']) !!}
                                <p>
                                    {!! Form::text('first_name', null, ['class' => 'aqua_input_menu', 'id' => 'first_name', 'required' => 'required']) !!}
                                    {!! Form::label('first_name', 'First Name', ['class' => 'input_name required_label']) !!}
                                </p>
                                <p>
                                    {!! Form::text('last_name', null, ['class' => 'aqua_input_menu', 'id' => 'last_name', 'required' => 'required']) !!}
                                    {!! Form::label('last_name', 'Last Name', ['class' => 'input_name required_label']) !!}
                                </p>
                                <p>
                                    {!! Form::text('identity_id', null, ['class' => 'aqua_input_menu', 'id' => 'identity_id', 'required' => 'required']) !!}
                                    {!! Form::label('identity_id', 'Identity ID', ['class' => 'input_name required_label']) !!}
                                </p>
                                <p>
                                    {!! Form::text('credit_card', null, ['class' => 'aqua_input_menu', 'id' => 'credit_card', 'required' => 'required']) !!}
                                    {!! Form::label('credit_card', 'Credit Card Number', ['class' => 'input_name required_label']) !!}
                                </p>
                                <p>
                                    {!! Form::selectRange('exp_month', 01, 12, null, ['class' => 'selectbox', 'id' => 'exp_month'] ) !!}
                                    {!! Form::selectRange('exp_year', 2015, 2060, null, ['class' => 'selectbox', 'id' => 'exp_year'] ) !!}
                                    {!! Form::label('exp_year', 'Valid until', ['class' => 'input_name required_label']) !!}
                                </p>
                                <p>
                                    {!! Form::text('ccv', null, ['class' => 'aqua_input_menu_ccv', 'id' => 'ccv', 'required' => 'required']) !!}
                                    {!! Form::label('ccv', 'CCV', ['class' => 'input_name required_label']) !!}
                                </p>
                                <p>
                                    {!! Form::submit('Complete Payment', ['class' => 'sm_button_menu', 'id' => 'submit']) !!}
                                </p>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
            </div>
        </div>
    </div>
</section>


@endsection


@section('footer')

<footer class="payment-footer">
    <div class="contact-footer">
        <div class="footimgpayment">
            <!--<img src="img/menu-pay-josheph.png" class="img-responsive" />-->
        </div>
        @parent
    </div>
</footer>

@endsection