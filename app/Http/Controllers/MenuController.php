<?php

namespace App\Http\Controllers;

use App\AdditionalCategory;
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
    public function index()
    {
    	$pizzas = Category::where('slug','pizzas')->first()->products()->orderEnable()->get();
        $other_categories['salads'] = Category::where('slug','salads')->first()->products()->orderEnable()->get();
        $other_categories['pastas'] = Category::where('slug','pastas')->first()->products()->orderEnable()->get();
        $other_categories['pastries'] = Category::where('slug','pastries')->first()->products()->orderEnable()->get();
        $other_categories['drinks'] = Category::where('slug','drinks')->first()->products()->orderEnable()->get();

//    	$lunch_deals = Product::with('additional_categories')->where('additional_categories.slug', 'lunch_deals');

    	$add_to_go = Product::find(1);/*Product::with('additional_categories')->where('additional_categories.slug', 'add-to-go')->first()*/;
        $cart = Cart::content();
       // Cart::remove('bd2f7a70385762cc1403be34dd6491b0');

        return view('pages.menu', compact('cart', 'pizzas', 'other_categories', 'lunch_deals', 'add_to_go'));
    }

    public function singleProduct(Request $request){
    	if ($request->ajax()){
    		$product = Product::find($request->id);
    		$category = $request->category;
    		$ingredients = '';
    		if ($category == 'pizzas'){
    			$ingredients = Ingredient::all()->sortBy('price');
    		}
    		$price = 'price_'.$request->price;
            $popup = view('popups.add_to_cart', compact('product', 'price', 'ingredients'))->render();
    		return Response::json(['popup' => $popup, 'product' => $product]);
    	}
    }

    public function singleIngredient(Request $request){
        if ($request->ajax()){
            $ingredient = Ingredient::find($request->id);
            return Response::json(compact('ingredient'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToGoPopup(Request $request){
        if ($request->ajax()){
            $product = AdditionalCategory::where('slug', 'add-to-go')->first()->products()->first();
            $popup = view('popups.add_to_go', compact('product'))->render();
            return Response::json(['popup' => $popup, 'product' => $product]);
        }
    }

    public function commentPopup(Request $request){
        if ($request->ajax()){
            $popup = view('popups.comment')->render();
            return Response::json(['popup' => $popup]);
        }
    }

    public function saveComment(Request $request){
        if ($request->ajax()){
            $request->session()->put('order_comment', $request->comment);
            return Response::json(['success' => true]);
        }
    }

}
