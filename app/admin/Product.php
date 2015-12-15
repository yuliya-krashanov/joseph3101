<?php

// Create admin model from Product class with title and url alias
Admin::model(\App\Product::class)
    ->title('Products')
    ->as('products')
    ->denyCreating(function ()
    {

    })->denyEditingAndDeleting(function ($instance)
    {

    })->columns(function ()
    {
        // Describing columns for table view
        Column::string('title', 'Title');
        Column::string('description', 'Description');
        Column::string('price_s', 'Price S');
        Column::string('price_l', 'Price L');
        Column::string('price_xl', 'Price XL');
        Column::image('image', 'Image');
        Column::lists('categories.title', 'Categories');
        Column::lists('additional_categories.title', 'Additional Categories');
        Column::boolean('enable', 'Enable');

    })->form(function ()
    {
        // Describing elements in create and editing forms
        FormItem::text('title', 'Title');
        FormItem::textarea('description', 'Description');

        FormItem::textAddon('price_s', 'Price S')->addon('$')->placement('after');
        FormItem::textAddon('price_l', 'Price L')->addon('$')->placement('after');
        FormItem::textAddon('price_xl', 'Price XL')->addon('$')->placement('after');
        FormItem::image('image', 'Image');

        FormItem::multiSelect('categories', 'Categories')->list(\App\Category::class)->value('categories.product_id');
        FormItem::multiSelect('additional_categories', 'Additional Categories')->list(\App\AdditionalCategory::class)->value('additional_categories.product_id');

        FormItem::checkbox('enable', 'Enable');
    });