<?php

Admin::model('App\Category')
    ->title('Categories')
    ->alias('categories')
    ->display(function ()
    {
        $display = AdminDisplay::datatables();
        $display->columns([

            Column::string('id')->label('ID'),
            Column::string('title')->label('Title'),
            Column::string('slug')->label('Slug')
        ]);

        return $display;
    })->createAndEdit(function ()
    {
        $form = AdminForm::form();
        $form->items([

            FormItem::text('title', 'Title')->required(),
            FormItem::hidden('slug'),
        ]);
        return $form;
    });