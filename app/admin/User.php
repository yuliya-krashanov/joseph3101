<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

// Create admin model from User class with title and url alias
Admin::model(\App\User::class)
    ->title('Users')
    ->as('users')
->denyCreating(function ()
{
	// Deny creating on thursday
	return date('w') == 4;
})->denyEditingAndDeleting(function ($instance)
{
	// deny editing and deleting rows when this is true
	return ($instance->id <= 2) || ($instance->email == 'admin');
})->columns(function ()
{
	// Describing columns for table view
	Column::string('first_name', 'First Name');
    Column::string('last_name', 'Last Name');
    Column::string('phone', 'Phone');
    Column::string('address_city', 'City');
    Column::string('address_street', 'Street');
    Column::string('address_street_number', 'Street Number');
    Column::string('address_home_number', 'Home Number');
    Column::string('address_floor', 'Floor');

})->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('name', 'Name');
	FormItem::text('email', 'Email');
});