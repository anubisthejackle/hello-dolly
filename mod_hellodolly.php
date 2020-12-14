<?php
/**
 * Hello Dolly
 * 
 * @package    HelloDolly
 * @subpackage Modules
 */

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