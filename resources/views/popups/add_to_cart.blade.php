<div class="add_to_cart_popup">
    <div class="menu-order">               
        <div class="row">
            <!------------>            
            <div class="order_box">
                <div class="price_menu">
                    <ul>
                        <li class="first_price">$20 <span>{{ $product->title }}</span><small>{{ $product->description }}</small></li>
                        @if ($ingredients)
                            <li class="extra">Extra Ingredients:</li>
                            <li class="other_price">$ <small></small> <span></span></li>                       
                            <li class="other_price">&nbsp;</li>
                            <li class="other_price">&nbsp;</li>
                        @endif
                    </ul>
                </div>
                <!-------->
                <div class="select_pizza">
                    <img src="{{ asset('images/products'.$product->image) }}" class="img-responsive"/>
                </div>
                <!-------->
                <div class="add_to_cart">
                    <ul>
                        <li class="total">{{ $product->price_s }}<span>Total</span></li>
                        <li class="cart_btn"><a href="#">Add to Cart</a></li>
                    </ul>
                </div>
                <!-------->

                <!------------------>
                @if ($ingredients)
                    <div class="ingredient">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <h4>Ingredients</h4>
                            <ul class="small_btn half_section">
                                <li><a href="#">Add on Half $5</a></li>
                                <li><a href="#">Add on Half $5</a></li>
                                <li><a href="#">Add on Half $5</a></li>
                                <li><a href="#">Add on Half $5</a></li>
                                <li><a href="#">Add on Half $5</a></li>
                                <li><a href="#">Add on Half $5</a></li>
                                <li><a href="#">Add on Half $5</a></li>
                                <li><a href="#">Add on Half $5</a></li>
                                <li><a href="#">Add on Half $5</a></li>
                            </ul>
                            <ul class="small_btn">
                                <li><a href="#">Add on Full $5</a></li>
                                <li><a href="#">Add on Full $5</a></li>
                                <li><a href="#">Add on Full $5</a></li>
                                <li><a href="#">Add on Full $5</a></li>
                                <li><a href="#">Add on Full $5</a></li>
                                <li><a href="#">Add on Full $5</a></li>
                                <li><a href="#">Add on Full $5</a></li>
                                <li><a href="#">Add on Full $5</a></li>
                                <li><a href="#">Add on Full $5</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <ul class="item_list">
                                <li>Pineapple</li>
                                <li>Bacon</li>
                                <li>Bolognese</li>
                                <li>Egg</li>
                                <li>Mushrooms</li>
                                <li>Mozzarella</li>
                                <li>Peppers</li>
                                <li>Parmesan flakes</li>
                                <li>Ham</li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                    </div>
                @endif
                <!------------------>

            </div>
        </div>
        <!------------>


    </div>
</div>