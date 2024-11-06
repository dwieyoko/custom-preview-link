<?php
namespace HtplGenerator;

/**
 * Admin class.
 */
class Admin {
    /**
     * Constructor.
     */
    public function __construct() {
        new Admin\Global_Settings();
        new Admin\Metaboxes();

        // Admin assets hook into action.
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );

        // Bind admin page link to the plugin action link.
        add_filter( 'plugin_action_links_preview-link-generator/preview_link_generator.php', array($this, 'action_links_add'), 10, 4 );
    }

    /**
     * Enqueue admin assets.
     */
    public function enqueue_admin_assets() {
        $current_screen = get_current_screen();
        if (
            $current_screen->base == 'htpl-link_page_htpl-admin'
        ) {
            // Dialog
            wp_enqueue_style( 'wp-jquery-ui-dialog' );
            wp_enqueue_script( 'jquery-ui-dialog' );

            wp_enqueue_style( 'htpl-generator-admin', HTPL_GENERATOR_ASSETS . '/css/admin.css', array(), HTPL_GENERATOR_VERSION );
            wp_enqueue_script( 'htpl-generator-admin', HTPL_GENERATOR_ASSETS . '/js/admin.js', array('jquery'), HTPL_GENERATOR_VERSION, true );
        }
    }

    /**
     * Action link add.
     */
    function action_links_add( $actions, $plugin_file, $plugin_data, $context ){

        $settings_page_link = sprintf(
            /*
             * translators:
             * 1: Settings label
             */
            '<a href="'. esc_url( get_admin_url() . 'edit.php?post_type=htpl-link' ) .'">%1$s</a>',
            esc_html__( 'Settings', 'htpl-generator' )
        );

        array_unshift( $actions, $settings_page_link );

        return $actions;
    }
}