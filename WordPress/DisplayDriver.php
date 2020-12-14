<?php

namespace WordPress;

require_once( dirname( __DIR__ ) . '/HelloDolly/hello.php' );
require_once( dirname( __DIR__ ) . '/Interfaces/DisplayDriverInterface.php' );

use HelloDolly\HelloDolly;
use Interfaces\DisplayDriverInterface;

class DisplayDriver implements DisplayDriverInterface {

    private $_hello;

    public function __construct(HelloDolly $hello) {
        $this->_hello = $hello;
    }

    public function printProxy() {

        $this->_hello->printFormattedLyric( get_user_locale() );

    }

    public function register() {
        add_action( 'admin_notices', [$this->_hello, 'printProxy'] );
        add_action( 'admin_head', [$this->_hello, 'printCss'] );
    }

}