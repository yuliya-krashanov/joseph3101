<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::actual()->get();

        return view('pages.sales', compact('sales'));
    }
}
