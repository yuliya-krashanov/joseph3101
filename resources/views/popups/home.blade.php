<div class="deal popup show">

    <div class="small_popup_home">
        <img src="{{ asset('images/products/'.$home_product->image) }}" alt="">
        <h1 class="doller_price home">${{ $home_product->price_s }}</h1>
        <span class="deal_home" dir="ltr">Big deal!</span>
        <h2 class="greek_home">"{{ $home_product->title }}"</h2>
        <small class="pop-small_home">{{ $home_product->description }}</small>
        <p class="no-yes-btn_home">
            <button class="sm_button yes-add_home home-popup-button" data-value="get">Get Deal</button>
            <button class="sm_button no-thank_home home-popup-button" data-value="no">No, Thanks</button>
        </p>
    </div>

</div>