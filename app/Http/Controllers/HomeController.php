<?php

namespace App\Http\Controllers;

use App\AdditionalCategory;
use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.home');
    }

    public function checkPopup(Request $request)
    {
        if ($request->ajax()){
            $showed = $request->session()->has('home_popup');
            if (!$showed) {
                $home_product = AdditionalCategory::where('slug', 'special-homepage')->first()->products()->first();
                $popup = view('popups.home', compact('home_product'))->render();
                return Response::json(['popup' => $popup, 'product' => $home_product, 'showed' => $showed]);
            }
            else{
                return Response::json(['showed' => $showed]);
            }
        }
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approvePopup(Request $request){
        if ($request->ajax()){
            $request->session()->put('home_popup', true);
            return Response::json(['success' => true]);
        }

    }



}
