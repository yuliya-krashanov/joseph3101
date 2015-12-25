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
                            {!! Form::open(['route' => 'checkout_card']) !!}

                                {{--<p>--}}
                                    {{--{!! Form::text('identity_id', null, ['class' => 'aqua_input_menu', 'id' => 'identity_id', 'required' => 'required']) !!}--}}
                                    {{--{!! Form::label('identity_id', 'Identity ID', ['class' => 'input_name required_label']) !!}--}}
                                {{--</p>--}}
                                <p id="email-group">

                                    {!! Form::email('email', null, [
                                    'class' => 'aqua_input_menu',
                                    'placeholder'                   => 'email@example.com',
                                    'required'                      => 'required',
                                    'data-parsley-required-message' => 'Email name is required',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'data-parsley-class-handler'    => '#email-group'
                                    ]) !!}
                                    {!! Form::label('email', 'Email', ['class' => 'input_name required_label']) !!}
                                </p>
                                <p id="cc-group">
                                    {!! Form::text('credit_card', null, ['class' => 'aqua_input_menu', 'id' => 'credit_card', 'required' => 'required',
                                    'data-parsley-type'             => 'number',
                                    'maxlength'                     => '16',
                                    'data-stripe'                   => 'number',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'data-parsley-class-handler'    => '#cc-group']) !!}
                                    {!! Form::label('credit_card', 'Credit Card Number', ['class' => 'input_name required_label']) !!}
                                </p>
                                <p>
                                    {!! Form::selectMonth('exp_month',  null, ['class' => 'selectbox', 'id' => 'exp_month', 'required' => 'required', 'data-stripe'  => 'exp-month' ], '%m' ) !!}
                                    {!! Form::selectYear('exp_year', date('Y'), date('Y') + 25, null,  ['class' => 'selectbox', 'id' => 'exp_year', 'required' => 'required', 'data-stripe' => 'exp-year'] ) !!}
                                    {!! Form::label('exp_year', 'Valid until', ['class' => 'input_name required_label']) !!}
                                </p>
                                <p id="ccv-group">
                                    {!! Form::text('ccv', null, ['class' => 'aqua_input_menu_ccv', 'id' => 'ccv', 'required' => 'required',
                                    'data-parsley-type'             => 'number',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'data-stripe'                   => 'cvc',
                                    'maxlength'                     => '4',
                                    'data-parsley-class-handler'    => '#ccv-group']) !!}
                                    {!! Form::label('ccv', 'CCV', ['class' => 'input_name required_label']) !!}
                                </p>
                                <p>
                                    {!! Form::submit('Complete Payment', ['class' => 'sm_button_menu', 'id' => 'submitBtn']) !!}
                                </p>
                                <p>
                                    <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                                </p>
                            {!! Form::close() !!}
                        </div>

                        {{-- Show $request errors after back-end validation --}}
                        <div class="col-md-6 col-md-offset-3" style="margin-top: 38px;">
                            @if($errors->has())
                                <div class="alert alert-danger fade in">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4>The following errors occurred</h4>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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