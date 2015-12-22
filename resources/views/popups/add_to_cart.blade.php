<div class="add_to_cart_popup show" dir="ltr">
    <div class="menu-order">               
        <div class="row">
            <!------------>            
            <div class="order_box">
                <div class="price_menu">
                    <ul>
                        <li class="first_price">${{ $product->{$price} }} <span>{{ $product->title }}</span><small>{{ $product->description }}</small></li>
                        @if ($ingredients)
                            <li class="extra">Extra Ingredients:</li>
                        @endif
                    </ul>
                </div>
                <!-------->
                <div class="select_pizza">
                    <img src="{{ asset('images/products/'.$product->image) }}" class="img-responsive"/>
                </div>
                <!-------->
                <div class="add_to_cart">
                    <ul>
                        <li class="total">$<span class="number">{{ $product->{$price} }}</span><span>Total</span></li>
                        <li class="cart_btn"><button>Add to Cart</button></li>
                    </ul>
                </div>
                <!-------->

                <!------------------>
                @if ($ingredients)
                    <div class="ingredient">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                            <h4>Ingredients</h4>
                            <ul class="item_list">
                                @foreach($ingredients as $ingredient)
                                    <li data-id="{{ $ingredient->id  }}">
                                        <button data-side="right">Add on Right ${{  $ingredient->price / 2  }}</button>
                                        <button data-side="left">Add on Left ${{  $ingredient->price / 2  }}</button>
                                        <button data-side="full">Add on Full ${{  $ingredient->price  }}</button>
                                        <p><span>{{  $ingredient->title  }}</span></p>
                                    </li>
                                @endforeach
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