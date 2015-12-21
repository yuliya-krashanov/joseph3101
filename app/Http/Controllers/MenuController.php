<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Response;
use App\User;
use App\Product;
use App\Category;
use App\Ingredient;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

    	$pizzas = Category::where('slug','pizzas')->first()->products()->orderEnable()->get();
        $other_categories['salads'] = Category::where('slug','salads')->first()->products()->orderEnable()->get();
        $other_categories['pastas'] = Category::where('slug','pastas')->first()->products()->orderEnable()->get();
        $other_categories['pastries'] = Category::where('slug','pastries')->first()->products()->orderEnable()->get();
        $other_categories['drinks'] = Category::where('slug','drinks')->first()->products()->orderEnable()->get();


        //Product::with('categories')->join('categories','categories.id', '=', 'products.id')->enable()->where('categories.slug', 'pizzas')->orderBy('price_s')->get();
//    	$salads = Product::with('categories')->where('categories.slug', 'salads');
//    	$pastas = Product::with('categories')->where('categories.slug', 'pastas');
//    	$pastries = Product::with('categories')->where('categories.slug', 'pastries');
//    	$drinks = Product::with('categories')->where('categories.slug', 'drinks');
//    	$lunch_deals = Product::with('additional_categories')->where('additional_categories.slug', 'lunch_deals');

    	$add_to_go = Product::find(1);/*Product::with('additional_categories')->where('additional_categories.slug', 'add-to-go')->first()*/;

        $cart = Cart::content();
        return view('pages.menu', compact('cart', 'pizzas', 'other_categories', 'lunch_deals', 'add_to_go'));
    }

    public function singleProduct(Request $request){
    	if ($request->ajax()){
    		$product = Product::find($request->id);
    		$category = $request->category;
    		$ingredients = '';
    		if ($category == 'pizzas'){
    			$ingredients = Ingredient::all();
    		}
    		$price = 'price_'.$request->price;
    		return view('popups.add_to_cart', compact('product', 'price', 'ingredients'))
    	}
    }

    public function addToCart(Request $request){
    	if ($request->ajax()){

    		Cart::add();
    		Cart::content();
    		return view('menu.cart', compact('cart'));
    	}
    	
    }
}
