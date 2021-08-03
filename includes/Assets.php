<?php
/***
 * Project Custom Role Creator
 *
 * @since 1.0.0
 *
 * @author Ratul Hasan <tanjilhasanratul@gmail.com>
 *
 * @package Covid\Hospitals
 */

namespace Covid\Hospitals;

// To prevent direct access, if not define WordPress ABSOLUTE PATH then exit.
if ( ! defined( 'ABSPATH' ) ) {
    exit();
}
/**
 * Class Assets
 *
 * @package Covid\Hospitals
 */
class Assets {

    /**
     * Assets constructor.
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'register_c19h_wp_scripts' ) );
    }

    /**
     * Load Frontend assets
     *
     * @param  string $screen  current screen.
     *
     * @return void
     */
    public function register_c19h_wp_scripts( $screen ) {
        $styles = $this->get_admin_styles();
        foreach ( $styles as $handle => $style ) {
            wp_register_style( $handle, $style['src'], $style['deps'], $style['ver'] );
        }

        $scripts = $this->get_admin_scripts();
        foreach ( $scripts as $handle => $script ) {
            wp_register_script( $handle, $script['src'], $script['deps'], $script['ver'], true );
        }
        wp_enqueue_style( 'c19h_bootstrap' );
        wp_enqueue_style( 'c19h_custom' );
        wp_enqueue_script( 'c19h_bootstrap-scripts' );
        wp_enqueue_script( 'c19h_custom-scripts' );
    }

    /**
     * Register Styles
     *
     * @return array[]
     */
    public function get_admin_styles() {
        return array(
            'c19h_bootstrap' => array(
                'src'  => C19H_ASSETS . '/css/bootstrap-4/css/bootstrap.min.css',
                'deps' => array(),
                'ver'  => C19H_PLUGIN_VERSION,
            ),
            'c19h_custom'   => array(
                'src'  => C19H_ASSETS . '/css/c19h_custom.css',
                'deps' => array(),
                'ver'  => C19H_PLUGIN_VERSION,
            ),
        );
    }


    /**
     * Register Styles
     *
     * @return array[]
     */
    public function get_admin_scripts() {
        return array(
            'c19h_bootstrap-scripts' => array(
                'src'  => C19H_ASSETS . '/css/bootstrap-4/js/bootstrap.min.js',
                'deps' => array( 'jquery' ),
                'ver'  => C19H_PLUGIN_VERSION,
            ),
            'c19h_custom-scripts'    => array(
                'src'  => C19H_ASSETS . '/c19h_custom.js',
                'deps' => array(),
                'ver'  => C19H_PLUGIN_VERSION,
            ),
        );
    }

}
