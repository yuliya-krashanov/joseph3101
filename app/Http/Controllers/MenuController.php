<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Response;
use App\User;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

    	$pizzas = Product::with('categories')->where('categories.slug', 'pizzas');
    	$salads = Product::with('categories')->where('categories.slug', 'salads');
    	$pastas = Product::with('categories')->where('categories.slug', 'pastas');
    	$pastries = Product::with('categories')->where('categories.slug', 'pastries');
    	$drinks = Product::with('categories')->where('categories.slug', 'drinks');
    	$lunch_deals = Product::with('additional_categories')->where('additional_categories.slug', 'lunch_deals');

    	$add_to_go = Product::with('additional_categories')->where('additional_categories.slug', 'add-to-go')->first();

        $cart = Cart::content();
        return view('pages.menu', compact('cart', 'pizzas', 'salads', 'pastas', 'pastries', 'drinks', 'lunch_deals', 'add_to_go'));
    }

    public function addToCart(Request $request){
    	if ($request->ajax()){

    		Cart::add();
    		Cart::content();
    		return view('menu.cart', compact('cart'));
    	}
    	
    }
}
