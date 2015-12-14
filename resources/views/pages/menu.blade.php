@extends('app')

@section('page-title', 'Menu')

@section('header')
    <body class="menu_page_color">
    @parent
@endsection

@section('content')

<section class="titlearea">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-2 col-md-2"></div>
            <div class="col-lg-8 col-sm-8 col-md-8">
                <ul class="sub_menu">
                    <li class="orange_clr"><a href="#">Pizzas</a></li>
                    <li><a href="#">Salads</a></li>
                    <li><a href="#">Pastas</a></li>
                    <li><a href="#">Pastries</a></li>
                    <li><a href="#">Drinks</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 logo">
                <div class="right-menu">
                    <h2 class="pizza_menu">Menu</h2>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<!-------------------------------->
<section class="menu_bck">
    <div class="menu-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <!-------------->
                    <div class="col-lg-2 col-sm-2 col-md-2"></div>
                    <!-------------->
                    <div class="col-lg-8 col-sm-8 col-md-8 main-menu-page">
                        <div class="top_red"> <img src="{{ asset('images/red-image.png') }}" class="img-responsive"/> <h3>Pizzas</h3> </div>
                        <!-----1----->
                        <div class="pizza-box" dir="ltr">
                            <!--<img src="img/scroll.png" class="img-responsive" />-->
                            <div class="col-lg-5 col-sm-5 col-md-5">
                                <div class="pizza"> <img src="{{ asset('images/pizza-1.png') }}" class="img-responsive"/> </div>
                            </div>
                            <!-----2----->
                            <div class="col-lg-7 col-sm-7 col-md-7 pad-0">
                                <div class="content" dir="ltr">
                                    <h4>MARGHERITA</h4>
                                    <small class="small_title">Pizza dough with tomato sauce and Gouda cheese</small>
                                    <div style="width:200px; margin:0 auto; margin-top:10px;">
                                        <!------->
                                        <div class="small_box orange_box">
                                            <p>XL<br>
                                                $20</p>
                                            <small>Order</small> </div>
                                        <!------->
                                        <div class="small_box orange_box">
                                            <p>L<br>
                                                $15</p>
                                            <small>Order</small> </div>
                                        <!------->
                                        <div class="small_box orange_box">
                                            <p>S<br>
                                                $10</p>
                                            <small>Order</small> </div>
                                        <!------->
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <!-----3----->
                            <div class="col-lg-7 col-sm-7 col-md-7">
                                <div class="content1 right">
                                    <h4>FOUR SEASONS</h4>
                                    <small class="small_title">Vegetarian - pizza dough with tomato sauce, fresh red onions, spinach, fresh mushrooms, fresh peppers and gouda cheese</small>
                                    <div style="width:200px; margin:0 auto; margin-top:10px;">
                                        <!------->
                                        <div class="small_box orange_box">
                                            <p>XL<br>
                                                $20</p>
                                            <small>Order</small> </div>
                                        <!------->
                                        <div class="small_box orange_box">
                                            <p>L<br>
                                                $15</p>
                                            <small>Order</small> </div>
                                        <!------->
                                        <div class="small_box orange_box">
                                            <p>S<br>
                                                $10</p>
                                            <small>Order</small> </div>
                                        <!------->
                                    </div>
                                </div>
                            </div>
                            <!-----4----->
                            <div class="col-lg-5 col-sm-5 col-md-5">
                                <div class="pizza1"> <img src="{{ asset('images/pizza-2.png') }}" class="img-responsive"/> </div>
                            </div>
                            <div class="clearfix"></div>
                            <!-----5----->
                            <div class="col-lg-5 col-sm-5 col-md-5">
                                <div class="pizza"> <img src="{{ asset('images/pizza-3.png') }}" class="img-responsive"/> </div>
                            </div>
                            <!-----6----->
                            <div class="col-lg-7 col-sm-7 col-md-7 pad-0">
                                <div class="content" dir="ltr">
                                    <h4>ITALIANA</h4>
                                    <small class="small_title">Vegetarian - pizza dough with tomato sauce, fresh tomatoes, mozzarella, fresh arugula and Gouda cheese </small>
                                    <div style="width:200px; margin:0 auto; margin-top:10px;">
                                        <!------->
                                        <div class="small_box orange_box">
                                            <p>XL<br>
                                                $20</p>
                                            <small>Order</small> </div>
                                        <!------->
                                        <div class="small_box orange_box">
                                            <p>L<br>
                                                $15</p>
                                            <small>Order</small> </div>
                                        <!------->
                                        <div class="small_box orange_box">
                                            <p>S<br>
                                                $10</p>
                                            <small>Order</small> </div>
                                        <!------->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="pad-20"></div>
                        <!-------------->
                    </div>
                    <!-------------->
                    <div class="col-lg-2 col-sm-2 col-md-2">
                        <div class="scooter">
                            <img src="{{ asset('images/scooter.png') }}" class="img-responsive"/>
                        </div>
                    </div>
                    <!-------------->
                </div>
            </div>
        </div>
    </div>
</section>
<!--======================================-->

@endsection

@section('footer')

    <footer class="menu_page_color">
        @parent
    </footer>

@endsection
