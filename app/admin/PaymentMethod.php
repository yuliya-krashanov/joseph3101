<?php

Admin::model(App\PaymentMethod::class)->title('')->with()->filters(function ()
{

})->columns(function ()
{
	Column::string('id', 'Id');
	Column::string('name', 'Name');
})->form(function ()
{

});