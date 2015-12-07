@extends('app')

@section('page-title', 'About Us')

@section('header')
    <body class="about">
        @parent
@endsection


@section('content')

    <section class="titlearea">
        <div class="container">
            <div class="row">
                <h2>About Us</h2>
            </div>
        </div>
    </section>

    <section class="contentarea">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contentcon">
                        <!--p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut <br>
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <br>
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in <br>
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat <br>
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p-->
                        <p>לימון (שם מדעי: Citrus × limon) הוא מין של עץ ממשפחת ההדרים, שמגדלים באופן חקלאי בעבור פריו הקרוי באותו שם. הלימונים מבויתים בעיקר לשם הפקת מיץ, אך גם החרצנים, הציפה והקליפה משמשים בבישול, באפייה ובשימורים. מיץ הלימון מכיל כחמישה אחוזים חומצה ציטרית, ועל כן טעמו של פרי הלימון חמוץ.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection


@section('footer')

    <footer>
        <div class="footimgabout">
            <img src="{{ asset('images/aboutfootimg.png')  }}">
        </div>
        @parent
    </footer>

@endsection


