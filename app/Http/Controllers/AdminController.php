<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard(){
        $orders = Order::where('status', 1)->get();
        return view('admin.dashboard', compact('orders'));
    }
}
