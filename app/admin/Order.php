<?php

use App\Order;

use SleepingOwl\Admin\Models\ModelItem;
//
//Admin::model(App\Order::class)->title('Orders')->with('user', 'status')->filters(function ()
//{
//
////\SleepingOwl\Admin\Controllers\AdminController
//})
//    ->columns(function ()
//{
//    Column::string('id', 'ID');
//    Column::string('user.first_name', 'First Name');
//    Column::string('user.last_name', 'First Name');
//    //Column::string('user_id', 'First Name');
//
//    Column::action('close', 'Close')->callback(function ($instance)
//    {
//        $order = Order::find($instance->id);
//        $order->status = 2;
//        $order->save();
//        return redirect()->back();
//    });
//
//    Column::action('details', 'Details')->callback(function ($instance)
//    {
//        $order = Order::find($instance->id);
//        $order->status = 2;
//        $order->save();
//        return redirect()->back();
//    });
//
////    Column::action('show', 'Label')->callback(function ($instance)
////    {
////        # Any code you want
////    });
//
//})->form(function ()
//{
//
//});