<?php

Admin::model(App\DeliveryMethod::class)->title('')->with()->filters(function ()
{

})->columns(function ()
{
	Column::string('id', 'Id');
	Column::string('name', 'Name');
})->form(function ()
{

});