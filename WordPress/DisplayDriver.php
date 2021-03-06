<?php

namespace WordPress;

require_once( dirname( __DIR__ ) . '/HelloDolly/hello.php' );
require_once( dirname( __DIR__ ) . '/Interfaces/DisplayDriverInterface.php' );

use HelloDolly\HelloDolly;

class DisplayDriver {

    private $_hello;

    public function __construct(HelloDolly $hello) {
        $this->_hello = $hello;
    }

    public function printProxy() {

        $this->_hello->printFormattedLyric( get_user_locale() );

    }

    public function register() {
        add_action( 'admin_notices', [$this, 'printProxy'] );
        add_action( 'admin_head', [$this->_hello, 'printCss'] );
    }

}