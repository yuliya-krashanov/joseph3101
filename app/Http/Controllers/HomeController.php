<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request){
        $popup = ( $request->session()->has('home_popup') ) ? '' : 'show';
        return view('pages.home', compact('popup'));
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approvePopup(Request $request){
        if ($request->ajax()){
            if ($request->todo == 'no'){
                $request->session()->put('home_popup', true);
                return Response::json(['todo' => 'no']);
            }
            else if($request->todo == 'yes'){

            }

        }

    }

}
