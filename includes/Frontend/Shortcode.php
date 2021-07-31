<?php
/***
 * Shortcode class file
 *
 * @since 1.0.0
 *
 * @author Ratul Hasan <tanjilhasanratul@gmail.com>
 *
 * @package Covid\Hospitals
 */

namespace Covid\Hospitals\Frontend;

use Covid\Hospitals\Transient;

/**
 * Class Frontend
 *
 * @package Covid\Hospitals\Frontend
 */
class Shortcode {

    /**
     * For storing AdminTransient instance
     *
     * @since 1.2.2
     *
     * @var array $admin_details
     */
    public $admin_details;

    /**
     * Shortcode constructor.
     */
    public function __construct() {
        add_shortcode( 'c19h', array( $this, 'cb_c19h_shortcode' ) );
    }

    /**
     * Callback for My GitHub shortcode
     *
     * @return false|void
     */
    public function cb_c19h_shortcode() {
        if ( 'details' === $_GET['available'] ) {
            if ( ! wp_verify_nonce( $_GET['_wpnonce'], 'c19h_available_details' ) ) {
                die( esc_html__( 'Are you cheating?', 'covid-hospitals-bd' ) );
            }

            $url = C19h()->endpoint . '/available-hospitals?type=' . $_GET['type'];
            if ( $_GET['current_page'] && ! empty( $_GET['current_page'] ) ) {
                $url = $url . '&page=' . $_GET['current_page'];
            }
            $c19h_available_details = Transient::c19h_available_details( $url );
            if ( ! empty( $c19h_available_details ) ) {
                include_once C19H_INC_DIR . '/templates/c19h_details.php';
            }
        } elseif ( $_GET['search'] ) {
            $nonce = isset( $_GET['c19h_search_field'] ) ? sanitize_text_field( wp_unslash( $_GET['c19h_search_field'] ) ) : '';
            if ( ! wp_verify_nonce( $nonce, 'c19h_search' ) ) {
                wp_die( esc_html__( 'Are you cheating?', 'custom-role-creator' ) );
            }

            $url = C19h()->endpoint . '/search?query=' . $_GET['search'];
            if ( $_GET['current_page'] && ! empty( $_GET['current_page'] ) ) {
                $url = $url . '&page=' . $_GET['current_page'];
            }

            $c19h_available_details = Transient::c19h_available_details( $url );
            if ( ! empty( $c19h_available_details ) ) {
                include_once C19H_INC_DIR . '/templates/c19h_details.php';
            }
        } else {
            $url                    = C19h()->endpoint . '/available';
            $c19h_available_details = Transient::c19h_available_details( $url );
            if ( ! empty( $c19h_available_details ) ) {
                include_once C19H_INC_DIR . '/templates/c19h_home.php';
            }
        }
    }

}
