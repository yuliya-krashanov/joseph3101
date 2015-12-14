@extends('app')

@section('page-title', 'Cart')

@section('header')
    <body class="menu_payment">
    @parent
@endsection


@section('content')

<section class="payment-menu">
  <div class="container">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-8"></div>
      <div class="col-m d-3">
      <div class="right-menu">
      	<h2 class="pizza_menu_payment">Payment Option</h2>
      </div>
      </div>
    </div>
  </div>
</section>
<section class="menu-bg">
<div class="payment_footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
      	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
      	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        <div class="payment_bg" dir="ltr">
        	<h3 class="payment-title">Ordered items</h3>
        		<div class="payment-table">
                  <div class="table-responsive payment">
                      <table class="table payment">
                        <tr>
                            <th> Subtotal</th>
                            <th> QTY</th>
                            <th> Price</th>
                            <th> Product</th>
                        </tr>
                        <tr>
                        	<td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>                        
                      </table>                      
					        </div>
                  <ul class="list-inline total">
                      <li>$50</li>
                      <li>Grand Total</li>
                  </ul>
            </div>
            <p>
              <input type="submit" name="submit" id="submit" value="Pay by Cash to the delivery guy" class="sm_button_menu payment">
            </p>
            <br>
            <p>
              <input type="submit" name="submit" id="submit" value="Pay by Credit card" class="sm_button_menu payment">
            </p>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
       </div>
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