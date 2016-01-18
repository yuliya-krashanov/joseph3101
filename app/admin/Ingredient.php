<?php

//Admin::model(App\Ingredient::class)->title('Ingredients')->with()->filters(function ()
//{
//
//})->columns(function ()
//{
//	Column::string('id', 'Id');
//	Column::string('title', 'Title');
//	Column::string('price', 'Price');
//})->form(function ()
//{
//	FormItem::text('title', 'Title')->required();
//	FormItem::textAddon('price', 'Price')->addon('$')->placement('after')->required();
//});

Admin::model('App\Ingredient')
    ->title('Ingredients')
    ->alias('ingredients')
    ->display(function ()
    {
        $display = AdminDisplay::datatables();
        $display->columns([

            Column::string('title')->label('Title'),
            Column::string('description' )->label('Description'),
            Column::string('product.title')->label('Product')
                ->append(Column::filter('product_id')),
            Column::datetime('start_date')->label('Start Date')->format('d.m.Y'),
            Column::datetime('end_date')->label('End Date')->format('d.m.Y'),
            Column::image('image')->label('Image')
        ]);

        return $display;
    })->create(function ()
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
    });