@extends('app')

@section('page-title', 'Dashboard')

@section('content')

    <section class="titlearea">
        <div class="container">
            <div class="row">
                <h2>Dashboard</h2>
            </div>
        </div>
    </section>

    <section class="contentarea">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($orders as $order)
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
    <footer class="dashboard_page">
        @parent
    </footer>
@endsection