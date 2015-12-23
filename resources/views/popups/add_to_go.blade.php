<div class="add_to_go_popup show">
    <div class="small_popup">
        <img src="{{ asset('images/products/'.$product->image) }}"/>
        <h1 class="doller_price">${{ $product->price_s }}</h1>
        <span class="deal">Spacial deal</span>
        <h2 class="greek">{{ $product->title }}</h2>
        <small class="pop-small"> {{ $product->description }}</small>
        <p class="no-yes-btn">
            <button class="sm_button yes-add">Yes, Add</button>
            <button class="sm_button no-thank">No, Thanks</button>
        </p>
    </div>
</div>
