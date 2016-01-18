<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Product;
use Cart;
use Response;
//use Gloudemans\Shoppingcart\CartRowCollection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        if ($request->ajax()){

            $product = Product::find($request->row['id']);
            $options = (isset($request->row['options'])) ? $request->row['options'] : [];
            $size = (isset($request->row['options']['size'])) ? $request->row['options']['size'] : 's';
            $ingredients = (isset($request->row['options']['ingredients'])) ? $request->row['options']['ingredients'] : null;
            $price = $product->{'price_'.$size};

            if ($ingredients) {
                foreach ($ingredients as $key => $ingredient) {
                    $ingredientDB = Ingredient::find($ingredient['id']);
                    $priceDB = ($ingredient['side'] == 'full') ? $ingredientDB->price : $ingredientDB->price / 2;
                    $options['ingredients'][$key]['price'] = $priceDB;
                    $price += $priceDB;
                }
            } else {
                $sales = $product->sales();
            }

            Cart::associate('Product', 'App')->add($product->id, $product->title, $request->row['quantity'], $price, $options);

            return Response::json(['success' => true]);

        }
    }

}
