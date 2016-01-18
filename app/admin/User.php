<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

// Create admin model from User class with title and url alias
//Admin::model(\App\User::class)
//    ->title('Users')
//    ->as('users')
//->denyCreating(function ()
//{
//	// Deny creating on thursday
//	return date('w') == 4;
//})->denyEditingAndDeleting(function ($instance)
//{
//	// deny editing and deleting rows when this is true
//	return ($instance->id <= 2) || ($instance->email == 'admin');
//})->columns(function ()
//{
//	// Describing columns for table view
//	Column::string('first_name', 'First Name');
//    Column::string('last_name', 'Last Name');
//    Column::string('phone', 'Phone');
//    Column::string('address_city', 'City');
//    Column::string('address_street', 'Street');
//    Column::string('address_street_number', 'Street Number');
//    Column::string('address_home_number', 'Home Number');
//    Column::string('address_floor', 'Floor');
//
//})->form(function ()
//{
//	// Describing elements in create and editing forms
//	FormItem::text('name', 'Name');
//	FormItem::text('email', 'Email');
//});




Admin::model('App\User')
    ->title('Users')
    ->alias('users')
    ->display(function ()
    {
        $display = AdminDisplay::datatables();
        $display->with('product');
        $display->filters([
            Filter::related('product_id')->model('App\Product'),
        ]);
        $display->columns([

            Column::string('first_name')->label('First Name'),
            Column::string('last_name')->label('Last Name'),
            Column::string('address_city' )->label('City'),
            Column::string('address_street')->label('Street'),
            Column::string('address_street_number')->label('Street Number'),
            Column::string('address_home_number')->label('Home Number'),
            Column::string('address_floor')->label('Floor')
        ]);

        return $display;
    });
   /* ->create(function ()
    {
        $form = AdminForm::form();
        $form->items([
            FormItem::text('title', 'Title')->required(),
            FormItem::checkbox('enable', 'Enable'),
            FormItem::textarea('description', 'Description'),
            FormItem::date('start_date', 'Start Date')->required(),
            FormItem::date('end_date', 'End Date')->required(),
            FormItem::select('product_id', 'Product')->model(App\Product::class)->display('title')->required(),
            FormItem::textaddon('product.price', 'Price')->addon('$')->placement('after'),
            FormItem::textaddon('sale_price', 'Sale Price')->addon('$')->placement('after')->required(),
            FormItem::text('sale_percent', 'Sale Percent'),
            FormItem::select('image', 'Coupon Theme')->enum([1,2,3,4,5,6])->required()


        ]);
        return $form;
    })->edit(function(){
        $form = AdminForm::form();
        $form->items([
            FormItem::text('title', 'Title')->required(),
            FormItem::checkbox('enable', 'Enable'),
            FormItem::textarea('description', 'Description'),
            FormItem::date('start_date', 'Start Date')->required(),
            FormItem::date('end_date', 'End Date')->required(),
            FormItem::select('product_id', 'Product')->model(App\Product::class)->display('title')->required(),
            FormItem::textaddon('sale_price', 'Sale Price')->addon('$')->placement('after')->required(),
            FormItem::text('sale_percent', 'Sale Percent'),

        ]);
        return $form;
    });*/