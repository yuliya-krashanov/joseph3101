<?php

// Create admin model from Category class with title and url alias
Admin::model(\App\AdditionalCategory::class)
    ->title('Additional Categories')
    ->as('additional-categories')
    ->denyCreating(function ()
    {

    })->denyEditingAndDeleting(function ($instance)
    {

    })->columns(function ()
    {
        // Describing columns for table view
        Column::string('id', 'ID');
        Column::string('title', 'Title');
        Column::string('slug', 'Slug');

    })->form(function ()
    {
        // Describing elements in create and editing forms
        FormItem::text('title', 'Title')->required();
    });