@extends('app')

@section('page-title', 'Mobile')

@section('header')
    <body>
        <div id="bck2">
            @parent
        </div>
@endsection

@section('content')
    <div id="bck">
        <div class="main">
            <div class="container">
               <div class="apps button"><a href="{{ url('/') }}">Download Our Apps</a></div>
               <div class="home button"><a href="{{ url('/') }}">Continue to Website</a></div>
            </div>
        </div>
    </div>
@endsection


@section('footer')

    <footer class="blue">        

        @parent
    </footer>

@endsection