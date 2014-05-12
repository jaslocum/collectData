<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 4/25/14
 * Time: 8:49 AM
 */

//nav-tab tags and associated requests
global $request;
$request = array(
    "volts" => "volts*",
    "amps" => "amps*",
    "home" => "/",
);

Form::macro('activeNavTab',function($tag)
{
    global $request;
    $x = Request::is( $request[$tag] ) ? 'active' : '';
    return Request::is( $request[$tag] ) ? 'active' : '';
});


Form::macro('orgActiveNavTab',function()
{
    global $request;
    foreach ($request as $tag => $regEx){
        if (Request::is($regEx)){
            return "#".$tag;
        }
    }
    return "";
});

Form::macro('onClickDatePicker',function($tag)
{
    return "onclick=".'"'."$('$tag').datepicker('show')".'"';
});