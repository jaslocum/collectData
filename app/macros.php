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
    "units" => "units*",
    "loggers" => "loggers*",
    "loggerTypes" => "loggerTypes*",
    "recordTypes" => "recordTypes*",
    "records" => "records*",
    "temperatures" => "temperatures*",
    "volts" => "volts*",
    "amps" => "amps*",
    "home" => "/",
);

global $setup;
$setup = array(
    "#units" => true,
    "#loggers" => true,
    "#loggerTypes" => true,
    "#recordTypes" => true,
    "#records" => true,
    "#temperatures" => false,
    "#volts" => false,
    "#amps" => false,
    "#home" => false,
);


Form::macro('activeNavTab',function($tag)
{
    global $request;
    return Request::is( $request[$tag] ) ? 'active' : '';
});

Form::macro('activeSetupTab',function()
{
    global $setup;
    return $setup[Form::orgActiveNavTab()] ? 'active' : '';
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