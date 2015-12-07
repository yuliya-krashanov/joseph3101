@extends('app')

@section('page-title', 'Contact')


@section('header')
    <body class="contact">
    <style type="text/css">
        body,td,th {
            font-size: 36px;
        }
    </style>
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
                                <form method="post" action="contact-form-handler.php">
                                    <p>
                                        <input type="text" value="" name="name" class="aqua_input" id="author" placeholder="Full Name*">
                                    </p>
                                    <p>

                                        <input type="email" value="" name="email" class="aqua_input" id="email" placeholder="Phone Number*">
                                    </p>
                                    <p>
                                        <input type="text" value="" name="contact_number" class="aqua_input" id="contact_number" placeholder="Issue*">
                                    </p>
                                    <p>
                                        <textarea name="message" class="aqua_input_msg" rows="8" id="comment" placeholder="Message*"></textarea>
                                    </p>
                                    <p>
                                        <input type="submit" class="sm_button" value="Send" id="submit" name="submit">
                                    </p>
                                </form>
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

