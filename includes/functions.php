<?php
/**
 * Necessary functions of the plugin.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Get global options value.
 *
 * @since 1.0.0
 *
 * @param string   $option_name Option name.
 * @param null $default Default value.
 *
 * @return string|null
 */
function htpl_get_option( $option_name = '', $default = null ) {
    $options = get_option( 'htpl_options' );

    return ( isset( $options[$option_name] ) ) ? $options[$option_name] : $default;
}