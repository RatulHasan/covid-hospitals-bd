<?php
/**
 * Plugin Name:         Covid Hospitals BD
 * Plugin URI:          https://github.com/RatulHasan/covid-hospitals-bd
 * Description:         COVID Dedicated Hospital's Information for Bangladesh.
 * Version:             1.0.0
 * Requires PHP:        5.6
 * Requires at least:   5.2
 * Author:              Ratul Hasan
 * Author URI:          https://ratuljh.wordpress.com/
 * License:             GPL-2.0-or-later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         covid-hospitals-bd
 * Domain Path:         /languages
 *
 * @package WordPress
 */

// To prevent direct access, if not define WordPress ABSOLUTE PATH then exit.
if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

/**
 * Class CovidHospitals. The class that holds the entire Covid Hospitals plugin.
 */
final class CovidHospitals {

    // Plugin version.
    const VERSION = '1.0.0';

    /**
     * Name of the end point.
     *
     * @since 1.0.0
     *
     * @var string;
     */
    public $endpoint;

    /**
     * CovidHospitals constructor.
     *
     * Sets up all the appropriate hooks and actions
     * within this plugin.
     */
    public function __construct() {
        require_once __DIR__ . '/vendor/autoload.php';

        $this->c19h_localization_setup();
        $this->c19h_define_constants();
        $this->endpoint = 'https://api.covidhospitalsbd.com/api';

        register_activation_hook( __FILE__, array( $this, 'c19h_activate' ) );

        add_action( 'plugins_loaded', array( $this, 'c19h_initiate_plugin' ) );
    }

    /**
     * Define all constants
     *
     * @return void
     */
    public function c19h_define_constants() {
        $this->define( 'C19H_BASE_NAME', plugin_basename( __FILE__ ) );
        $this->define( 'C19H_PLUGIN_VERSION', self::VERSION );
        $this->define( 'C19H_FILE', __FILE__ );
        $this->define( 'C19H_URL', plugins_url( '', C19H_FILE ) );
        $this->define( 'C19H_ASSETS', C19H_URL . '/assets' );
        $this->define( 'C19H_DIR', __DIR__ );
        $this->define( 'C19H_INC_DIR', __DIR__ . '/includes' );
        //        $this->define( 'C19H_TEMPLATE_DIR', __DIR__ . '/includes/templates' );
    }

    /**
     * Define constant if not already defined
     *
     * @since 1.0.0
     *
     * @param string      $name constant name.
     * @param string|bool $value constant value.
     *
     * @return void
     */
    private function define( $name, $value ) {
        if ( ! defined( $name ) ) {
            define( $name, $value );
        }
    }

    /**
     * Placeholder for activation function
     *
     * Nothing being called here yet.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function c19h_activate() {
        if ( ! get_option( 'covid_hospitals_bd_installed' ) ) {
            update_option( 'covid_hospitals_bd_installed', time() );
        }
        update_option( 'covid_hospitals_bd_version', C19H_PLUGIN_VERSION );
    }

    /**
     * Initialize plugin for localization
     *
     * @uses load_plugin_textdomain()
     */
    public function c19h_localization_setup() {
        load_plugin_textdomain( 'covid-hospitals-bd', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    /**
     * Initializes the CovidHospitals() singleton class.
     *
     * Checks for an existing CovidHospitals() instance
     * and if it doesn't find one, creates it.
     *
     * @since 1.0.0
     *
     * @return false|\CovidHospitals
     */
    public static function init() {
        $instance = false;
        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Load the plugin after WP User Frontend is loaded
     *
     * @return void
     */
    public function c19h_initiate_plugin() {
        \Covid\Hospitals\Init::register();
    }
}

/**
 * Load the plugin.
 *
 * @since 1.0.0
 *
 * @return false|\CovidHospitals
 */
function c19h() {
    return CovidHospitals::init();
}

// Hit start.
c19h();
