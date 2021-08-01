<?php
/***
 * Trigger this file on Plugin uninstall
 *
 * @since 1.0.0
 *
 * @author Ratul Hasan <tanjilhasanratul@gmail.com>
 *
 * @package Covid\Hospitals
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die();
}

global $wpdb;
$wpdb->query( "DELETE FROM `{$wpdb->prefix}options` WHERE `option_name` LIKE ('_transient_c19h_available_details_%')" );
