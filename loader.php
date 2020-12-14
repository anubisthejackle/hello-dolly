<?php
/*
Plugin Name: Hello Dolly (Redux)
Description: This plugin is based on the Hello Dolly plugin by Matt Mullenweg
Author: Travis Weston, Matt Mullenweg
Version: 2.0.0
*/
if(defined('WPINC')){

    $texturizer = function($line) {
        return wptexturize($line);
    };

    $translator = function($line) {
        return __( $line, 'hello-dolly');
    };

    require_once( __DIR__ . '/HelloDolly/hello.php');
    require_once( __DIR__ . '/WordPress/DisplayDriver.php');
    $hello = new \HelloDolly\HelloDolly($texturizer, $translator);
    (new \WordPress\DisplayDriver($hello))->register();
    
}

if( defined('_JEXEC') ){

    require_once( __DIR__ . '/HelloDolly/hello.php' );
    
    $texturizer = function($line) {
        return $line;
    };
    
    $translator = function($line) {
        return $line;
    };
    
    $hello = new \HelloDolly\HelloDolly($texturizer, $translator);
    require JModuleHelper::getLayoutPath('mod_hellodolly');

}