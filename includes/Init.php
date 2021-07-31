<?php
/***
 * Initial class file
 *
 * @since 1.0.0
 *
 * @author Ratul Hasan <tanjilhasanratul@gmail.com>
 *
 * @package Covid\Hospitals
 */

namespace Covid\Hospitals;

use Covid\Hospitals\Frontend\Widget;
use Covid\Hospitals\Frontend\Shortcode;

/**
 * Class Init
 *
 * @package Covid\Hospitals
 */
class Init {

    /**
     * Getaway for all classes.
     *
     * @return void
     */
    public static function register() {
        if ( ! is_admin() ) {
            new Assets();
            new Shortcode();
        }
    }
}
