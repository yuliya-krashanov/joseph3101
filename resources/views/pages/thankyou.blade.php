@extends('app')

@section('page-title', 'Thank you!')

@section('header')
    <body class="thank_you_page">
    @parent
@endsection  
	
@section('content')    
    <section class="titlearea">
    	<div class="container">
        	<div class="row">
            	<h3>&nbsp;</h3><br><br>
            </div>
        </div>
    </section>
    
    <section class="contentarea">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                	<div class="joseph">
                        <!------>
                    <div class="visible-xs">
                        	<div class="comment">
                    			<h3 class="thank">Thank you<br>for your order,<br>your order number is</h3>
                        		<h2>{{ $id }}</h2>
                        		<h3>Joseph will be<br>happy to meet<br>you soon...</h3>
                            </div>
                        </div>
                        <!------>
            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        	<div class="joseph-img">
                            	<img src="{{ asset('images/joseph-1.png') }}" class="img-responsive">
                            </div>
                        </div>
                        <!------>
            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mobile-invisible">
                        	<div class="comment">
                    			<h3 class="thank">Thank you<br>for your order,<br>your order number is</h3>
                        		<h2>{{ $id }}</h2>
                        		<h3>Joseph will be<br>happy to meet<br>you soon...</h3>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('footer')
  <footer class="thank_you_page">    
      @parent    
  </footer>
@endsection 