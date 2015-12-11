@extends('app')

@section('page-title', 'Friends Club Form')

@section('header')
    <body class="friendclub_from">
    @parent
@endsection

@section('content')
    <section class="friend-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="cloud-two">
                        <img src="{{ asset('images/menu/cloud-two.png') }}" class="img-responsive" />
                    </div>
                </div>
                <div class="col-md-7"></div>
                <div class="col-md-2">
                    <div class="cloud-single">
                        <img src="{{ asset('images/menu/singl-clolud.png') }}" class="img-responsive" />
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="friend-bg">
        <div class="friend-from-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="friend_from" dir="ltr">

                                {!! Form::open(['route' => 'member_create']) !!}
                                    <!-- -->
                                    <div class="friend-register">
                                        <div class="col-md-10">
                                            <h3 class="from-title">Personal Information</h3>
                                            <!-- First -->
                                            <div class="col-md-4">
                                                {!! Form::text('last_name', null, ['class' => 'aqua_input_friend', 'id' => 'last_name', 'required' => 'required']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('last_name', 'Last Name', ['class' => 'input_name_friend required_label']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-4">
                                                {!! Form::text('first_name', null, ['class' => 'aqua_input_friend', 'id' => 'first_name', 'required' => 'required']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('first_name', 'First Name', ['class' => 'input_name_friend required_label', ]) !!}
                                            </div>
                                            <!-- Second -->
                                            <div class="col-md-4">
                                                {!! Form::email('email', null, ['class' => 'aqua_input_friend', 'id' => 'email', 'required' => 'required']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('email', 'Email Address', ['class' => 'input_name_friend required_label']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-4 no-padding2">
                                                {!! Form::selectRange('day', 1, 31, null, ['class' => 'selectbox_friend']) !!}
                                                {!! Form::selectMonth('month', null, ['class' => 'selectbox_friend' ]) !!}
                                                {!! Form::selectRange('year', 2005, 1900, null, ['class' => 'selectbox_friend', 'id' => 'birth_date'] ) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('birth_date', 'Date of Birth', ['class' => 'input_name_friend required_label']) !!}
                                            </div>
                                            <!-- Thired -->

                                            <div class="col-md-4">
                                                {!! Form::text('additional_phone', null, ['class' => 'aqua_input_friend', 'id' => 'additional_phone']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('additional_phone', 'Additional Phone', ['class' => 'input_name_friend']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-4">
                                                {!! Form::text('mobile_phone', null, ['class' => 'aqua_input_friend', 'id' => 'mobile_phone', 'required' => 'required']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('mobile_phone', 'Mobile Phone', ['class' => 'input_name_friend required_label']) !!}
                                            </div>
                                            <!-- -->
                                        </div>
                                        <!-- -->
                                        <div class="col-md-2"> </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="friend-register address">
                                        <div class="col-md-10">
                                            <h3 class="from-title">Address</h3>
                                            <!-- -->
                                            <div class="col-md-4">
                                                {!! Form::text('address_street', null, ['class' => 'aqua_input_friend', 'id' => 'address_street', 'dir' => 'rtl', 'required' => 'required']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('address_street', 'Street', ['class' => 'input_name_friend required_label']) !!}
                                            </div>
                                            <div class="col-md-4">
                                                {{--<input id="address_city" name="address_city" />--}}
                                                {!! Form::text('address_city', null, ['class' => 'aqua_input_friend', 'id' => 'address_city', 'dir' => 'rtl', 'required' => 'required']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('address_city', 'City', ['class' => 'input_name_friend required_label']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-4">
                                                {!! Form::text('address_home_number', null, ['class' => 'aqua_input_friend', 'id' => 'address_home_number', 'required' => 'required']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('address_home_number', 'Home number', ['class' => 'input_name_friend required_label']) !!}
                                            </div>
                                            <!-- First -->
                                            <div class="col-md-4">
                                                {!! Form::text('address_street_number', null, ['class' => 'aqua_input_friend', 'id' => 'address_street_number', 'required' => 'required']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('address_street_number', 'Street number', ['class' => 'input_name_friend required_label']) !!}
                                            </div>

                                            <!-- -->
                                        </div>
                                        <!-- -->
                                        <div class="col-md-2"></div>
                                    </div>
                                    <!--Address End-->
                                    <div class="friend-register address">
                                        <div class="col-md-10">
                                            <h3 class="from-title"></h3>
                                            <!-- First -->
                                            <div class="col-md-4"> </div>
                                            <div class="col-md-2 no-padding"> </div>
                                            <!-- -->
                                            <!-- second -->
                                            <div class="col-md-4">
                                                {!! Form::select('status', ['married' => 'Married', 'engaged' => 'Engaged', 'relation' => 'In a relationship', 'single' => 'Single'], null, ['class' => 'selectbox_city', 'id' => 'status']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('status', 'Relationship', ['class' => 'input_name_relation required_label']) !!}
                                            </div>
                                            <!-- -->

                                        </div>
                                        <div class="col-md-2"> </div>
                                    </div>
                                    <!-- Partnet Information -->
                                    <div class="friend-register partner">
                                        <div class="col-md-10">
                                            <h3 class="from-title">My Partner's Information</h3>
                                            <!-- First -->
                                            <div class="col-md-4">
                                                {!! Form::text('partner_last_name', null, ['class' => 'aqua_input_friend', 'id' => 'partner_last_name']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('partner_last_name', 'Last Name', ['class' => 'input_name_friend']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-4">
                                                {!! Form::text('partner_first_name', null, ['class' => 'aqua_input_friend', 'id' => 'partner_first_name']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('partner_first_name', 'First Name', ['class' => 'input_name_friend']) !!}
                                            </div>
                                            <!-- Second -->
                                            <div class="col-md-4">
                                                {!! Form::email('partner_email', null, ['class' => 'aqua_input_friend', 'id' => 'partner_email' ]) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('partner_email', 'Email Address', ['class' => 'input_name_friend']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-4 no-padding2">
                                                {!! Form::selectRange('partner_day', 1, 31, null, ['class' => 'selectbox_friend']) !!}
                                                {!! Form::selectMonth('partner_month', null, ['class' => 'selectbox_friend' ]) !!}
                                                {!! Form::selectRange('partner_year', 2005, 1900, null, ['class' => 'selectbox_friend', 'id' => 'partner_birth_date'] ) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('partner_birth_date', 'Date of Birth', ['class' => 'input_name_friend']) !!}
                                            </div>

                                            <div class="col-md-4">

                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">

                                            </div>
                                            <!-- -->
                                            <div class="col-md-4">
                                                {!! Form::text('partner_mobile_phone', null, ['class' => 'aqua_input_friend', 'id' => 'partner_mobile_phone']) !!}
                                            </div>
                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                                {!! Form::label('partner_mobile_phone', 'Partner Mobile Phone', ['class' => 'input_name_friend']) !!}
                                            </div>

                                        </div>
                                        <!-- -->
                                        <div class="col-md-2"> </div>
                                    </div>
                                    <!--  -->
                                    <div class="friend-register address">
                                        <div class="col-md-10">
                                            <h3 class="from-title"></h3>
                                            <!-- First -->
                                            <div class="col-md-6 no-padding">
                                                <p class="allow">
                                                    {!! Form::checkbox('send_to_mail', 1, true, ['id' => 'send_to_mail']); !!}
                                                    {!! Form::label('send_to_mail', 'Allow Joseph to send me sale deals and updates by email') !!}
                                                </p>
                                            </div>
                                            <div class="col-md-1"> </div>
                                            <!-- -->
                                            <div class="col-md-4">
                                                <p class="allow">
                                                    {!! Form::checkbox('agree_policy', null, true, ['id' => 'agree_policy']); !!}
                                                    {!! Form::label('agree_policy', 'I agree to the terms & policy') !!}
                                                </p>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <!-- second -->
                                            <div class="col-md-12">
                                                <p class="allow">
                                                    {!! Form::checkbox('send_to_mobile', 1, true, ['id' => 'send_to_mobile']); !!}
                                                    {!! Form::label('send_to_mobile', 'Allow Joseph to send me sale deals and updates by mobile') !!}
                                                </p>
                                            </div>

                                            <!-- -->
                                            <div class="col-md-2 no-padding">
                                            </div>

                                        </div>
                                        <div class="col-md-2"> </div>
                                    </div>
                                    <p>
                                        {!! Form::submit('Send', ['class' => 'sm_button friend_send', 'id' => 'submit']) !!}
                                    </p>

                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!--<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                        <div class="joseph-from"> <img src="img/menu/from_joseph.png" class="img-responsive" /> </div>
                      </div>-->
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

    <footer class="friend-footer">
        <div class="contact-footer">
            @parent
        </div>
    </footer>

@endsection
