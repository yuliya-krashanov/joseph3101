<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * @param Request $request
     */
    public function create(Request $request)
    {
    	$order = new Order(Auth::user()->id, $request->);
    }

    protected function findLastId($from)
    {
    	Order::where('id', 'like', "$from%");
    }
}
