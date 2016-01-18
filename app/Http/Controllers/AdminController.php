<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $orders = Order::where('status', 1)->get();
        return view('admin.dashboard', compact('orders'));
    }

    public function get_product_price(Request $request)
    {
        if ($request->ajax()){
            $product = Product::find($request->product_id);
            return \Response::json(['price' => $product->price_s ]);
        }
    }
}
