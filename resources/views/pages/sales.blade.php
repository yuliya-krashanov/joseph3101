@extends('app')

@section('page-title', 'Sales/Coupons')

@section('header')
    <body class="sales_page_color">
    @parent
@endsection

@section('content')
    <section class="titlearea">
        <div class="container">
            <div class="row">
                <h2>Sales / Coupons</h2>
            </div>
        </div>
    </section>

    <section class="contentarea">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($sales as $sale)
                        <div class="item">
                            <h3>$sale->title</h3>

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endsection

@section('footer')

    <footer class="sales_page_color">
        @parent
    </footer>

@endsection