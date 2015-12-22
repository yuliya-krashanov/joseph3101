@extends('app')

@section('page-title', 'Menu')

@section('header')
    <body class="menu_page_color">
        {{--<div class="add_to_go_popup">--}}
            {{--<div class="small_popup">--}}
                {{--<img src="{{ $add_to_go->image }}"/>--}}
                {{--<h1 class="doller_price">${{ $add_to_go->price_s }}</h1>--}}
              {{--<span class="deal">Spacial deal</span>--}}
              {{--<h2 class="greek">{{ $add_to_go->title }}</h2>--}}
                {{--<small class="pop-small"> {{ $add_to_go->description }}</small>--}}
                {{--<p class="no-yes-btn">--}}
                    {{--<input type="submit" class="sm_button yes-add" value="Yes, Add">--}}
                    {{--<input type="submit" class="sm_button no-thank" value="No, Thanks">                --}}
                {{--</p>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="comments_popup">
            <div class="small_popup">
                <form action="{{ route('toCartComment') }}" method="POST">
                    <span class="deal">Any comment?</span>
                    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                    <p class="no-yes-btn">
                        <input type="submit" class="sm_button yes-add" value="Continue">                                
                    </p>
                </form>
            </div>
        </div>
        
    @parent
@endsection

@section('content')

<section class="titlearea">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-2 col-md-2"></div>
            <div class="col-lg-8 col-sm-8 col-md-8">
                <ul class="sub_menu">
                    <li class="active"><a href="#" id="pizzas">Pizzas</a></li>
                    @if (Carbon::now()->between(Carbon::now()->setTime(11, 0, 0), Carbon::now()->setTime(15, 0, 0)))
                        <li><a href="#" id="lunch">Lunch Deals</a></li>
                    @endif
                    <li><a href="#" id="salads">Salads</a></li>
                    <li><a href="#" id="pastas">Pastas</a></li>
                    <li><a href="#" id="pastries">Pastries</a></li>
                    <li><a href="#" id="drinks">Drinks</a></li>
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
                
                <div class="col-lg-12 col-sm-12 col-md-12 ">
                    <!-------------->
                    @if (Auth::check())
                        <div class="col-lg-2 col-sm-2 col-md-2 pad-zero">
                            <div class="ordered_item" dir="ltr">
                                <h4 class="left_heading_text">Ordered Items</h4>
                                <ul class="list">
                                    @foreach($cart as $item)
                                        {{--<li><span>{{ $cart->product->title }}</span>{{ $cart->price }}$</li>--}}
                                    @endforeach
                                    <li class="last">&nbsp;<span>&nbsp;</span></li>
                                </ul>
                                <!-------sub------>
                                <ul class="list subtotal">
                                    <li>{{  Cart::total() }}$<span>Total</span></li>
                                </ul>
                                <div style="text-align:center;">
                                    @if ( Cart::total() >= 40 )
                                        <button class="place_my_order">Place my Order</button>
                                    @else
                                        <p class="place_my_order">Minimum order 40NIS</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-8 col-md-8 main-menu-page cart">
                    @else
                        <div class="col-lg-2 col-sm-2 col-md-2"></div>
                        <div class="col-lg-8 col-sm-8 col-md-8 main-menu-page">
                    @endif
                    <!-------------->                    
                        <div class="top_red"> 
                            <img src="{{ asset('images/red-image.png') }}" class="img-responsive"/> 
                            <h3>Pizzas</h3> 
                        </div>
                        <!-----1---->
                        <div id="pizzas-tab" class="pizza-box menu-tab active" dir="ltr">
                            <!--<img src="img/scroll.png" class="img-responsive" />-->
                            @for ($i = 0; $i < count($pizzas); $i++)
                                <div class="item" data-id="{{ $pizzas[$i]->id }}">
                                @if ($i % 2 == 0)
                                    <div class="col-lg-5 col-sm-5 col-md-5">
                                        <div class="pizza"> <img src="{{ asset('images/products/'.$pizzas[$i]->image) }}" class="img-responsive"/> </div>
                                    </div>
                                    <!-----2---->
                                    <div class="col-lg-7 col-sm-7 col-md-7 pad-0">
                                        <div class="content" dir="ltr">
                                            <h4>{{ $pizzas[$i]->title }}</h4>
                                            <small class="small_title">{{ $pizzas[$i]->description }}</small>
                                            <div style="width:200px; margin:0 auto; margin-top:10px;">
                                                <!------>
                                                <div class="small_box order_button orange_box" data-size="xl">
                                                    <p>XL<br>
                                                        ${{ $pizzas[$i]->price_xl }}</p>
                                                    <small>Order</small> 
                                                </div>
                                                <!------>
                                                <div class="small_box order_button orange_box" data-size="l">
                                                    <p>L<br>
                                                        ${{ $pizzas[$i]->price_l }}</p>
                                                    <small>Order</small> </div>
                                                <!------>
                                                <div class="small_box order_button orange_box" data-size="s">
                                                    <p>S<br>
                                                        ${{ $pizzas[$i]->price_s }}</p>
                                                    <small>Order</small>
                                                </div>
                                                <!------>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                       <!-----3---->
                                    <div class="col-lg-7 col-sm-7 col-md-7">
                                        <div class="content1 right">
                                            <h4>{{ $pizzas[$i]->title }}</h4>
                                            <small class="small_title">{{ $pizzas[$i]->description }}</small>
                                            <div style="width:200px; margin:0 auto; margin-top:10px;">
                                                <!------>
                                                <div class="small_box order_button orange_box" data-size="xl">
                                                    <p>XL<br>
                                                        ${{ $pizzas[$i]->price_xl }}</p>
                                                    <small>Order</small> </div>
                                                <!------>
                                                <div class="small_box order_button orange_box" data-size="l">
                                                    <p>L<br>
                                                        ${{ $pizzas[$i]->price_l }}</p>
                                                    <small>Order</small> </div>
                                                <!------>
                                                <div class="small_box order_button orange_box" data-size="s">
                                                    <p>S<br>
                                                        ${{ $pizzas[$i]->price_s }}</p>
                                                    <small>Order</small> </div>
                                                <!------>
                                            </div>
                                        </div>
                                    </div>
                                    <!-----4---->
                                    <div class="col-lg-5 col-sm-5 col-md-5">
                                        <div class="pizza1"> <img src="{{ asset('images/products/'.$pizzas[$i]->image) }}" class="img-responsive"/> </div>
                                    </div>  
                                @endif
                            </div>
                            
                            <div class="clearfix"></div>                           
                            @endfor
                        </div>
                        @if (Carbon::now()->between(Carbon::now()->setTime(11, 0, 0), Carbon::now()->setTime(15, 0, 0)))
                            <div id="lunch-tab" class="lunch-box menu-tab" dir="ltr"></div>
                        @endif
                        @foreach ($other_categories as $title => $category)
                            <div id="{{ $title }}-tab" class="{{ $title }}-box menu-tab" dir="ltr">
                                @for($i = 0; $i < count($category); $i++)
                                    <div class="item" data-id="{{ $category[$i]->id }}">
                                        @if ($i % 2 !== 0)
                                            <div class="col-lg-5 col-sm-5 col-md-5">
                                                <div class="pizza"> <img src="{{ asset('images/products/'.$category[$i]->image) }}" class="img-responsive"/> </div>
                                            </div>
                                            <!-----2---->
                                            <div class="col-lg-7 col-sm-7 col-md-7 pad-0">
                                                <div class="content" dir="ltr">
                                                    <h4>{{ $category[$i]->title }}</h4>
                                                    <small class="small_title">{{ $category[$i]->description }}</small>
                                                    <div style="width:200px; margin:0 auto; margin-top:10px;">
                                                        <!------>
                                                        <div class="small_box order_button orange_box"  data-size="s">
                                                            <p><br>
                                                                ${{ $category[$i]->price_s }}</p>
                                                            <small>Order</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                                    <!-----3---->
                                            <div class="col-lg-7 col-sm-7 col-md-7">
                                                <div class="content1 right">
                                                    <h4>{{ $category[$i]->title }}</h4>
                                                    <small class="small_title">{{ $category[$i]->description }}</small>
                                                    <div style="width:200px; margin:0 auto; margin-top:10px;">
                                                        <!------>
                                                        <div class="small_box order_button orange_box" data-size="s">
                                                            <p><br>
                                                                ${{ $category[$i]->price_s }}</p>
                                                            <small>Order</small> </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-----4---->
                                            <div class="col-lg-5 col-sm-5 col-md-5">
                                                <div class="pizza1"> <img src="{{ asset('images/products/'.$category[$i]->image) }}" class="img-responsive"/> </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="clearfix"></div>
                                @endfor
                            </div>
                        @endforeach
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
    </div>
</section>
<!--======================================-->

@endsection

@section('footer')

    <footer class="menu_page_color">
        @parent
    </footer>

@endsection
