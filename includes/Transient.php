<?php
/***
 * Transient class file
 *
 * @since 1.0.0
 *
 * @author Ratul Hasan <tanjilhasanratul@gmail.com>
 *
 * @package Covid\Hospitals
 */

namespace Covid\Hospitals;

/**
 * Class Transient
 *
 * @package Covid\Hospitals
 */
class Transient {

    /**
     * Get available details
     *
     * @param string $url Api url.
     *
     * @since 1.0.0
     *
     * @return false|mixed|void
     */
    public static function c19h_available_details( $url ) {
        $cash_key = md5( $url );
        $body     = get_transient( 'c19h_available_details' . $cash_key );
        if ( ! $body ) {
            $args          = array(
                'timeout' => 30,
            );
            $response      = wp_remote_get( $url, $args );
            $response_code = wp_remote_retrieve_response_code( $response );

            if ( is_wp_error( $response ) ) {
                $error_message = $response->get_error_message();
                $body          = "Something went wrong: $error_message";
                if ( ! empty( $error_message ) ) {
                    wp_die( esc_html( $body ) );
                }
            }

            if ( 200 === $response_code ) {
                $body = wp_remote_retrieve_body( $response );
                $body = json_decode( $body );

                set_transient( 'c19h_available_details' . $cash_key, $body, MINUTE_IN_SECONDS );
            }
        }

        return $body;
    }
}
