<?php
/**
 * Plugin Name: Custom Preview Link Generator
 * Plugin URI:  
 * Description: Custom Preview Link Generator for WordPress
 * Version:     1.0.0
 * Author:      
 * Author URI:  
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: htpl-generator
 * Domain Path: /languages
 */

// If this file is accessed directly, exit
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Main class
 *
 * @since 1.0.0
 */
final class Htpl_Generator {

    /**
     * Version
     *
     * @since 1.0.0
     */
    public $version = '1.0.6';

    /**
     * The single instance of the class
     *
     * @since 1.0.0
     */
    protected static $_instance = null;

    /**
     * Main Instance
     *
     * Ensures only one instance of this pluin is loaded
     *
     * @since 1.0.0
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     *
     * @since 1.0.0
     */
    private function __construct() {
        $this->define_constants();
        $this->includes();
        $this->run();
    }

    /**
     * Define the required constants
     *
     * @since 1.0.0
     */
    private function define_constants() {
        define( 'HTPL_GENERATOR_VERSION', $this->version );
        define( 'HTPL_GENERATOR_FILE', __FILE__ );
        define( 'HTPL_GENERATOR_PATH', __DIR__ );
        define( 'HTPL_GENERATOR_URL', plugins_url( '', HTPL_GENERATOR_FILE ) );
        define( 'HTPL_GENERATOR_ASSETS', HTPL_GENERATOR_URL . '/assets' );
    }

    /**
     * Include required core files
     *
     * @since 1.0.0
     */
    public function includes() {
        /**
         * Including Codestar Framework.
         */
        if ( ! class_exists( 'CSF' ) ) {
            require_once HTPL_GENERATOR_PATH .'/libs/codestar-framework/codestar-framework.php';
        }

        require_once HTPL_GENERATOR_PATH . '/includes/functions.php';
        require_once HTPL_GENERATOR_PATH . '/includes/Custom_Posts.php';
        require_once HTPL_GENERATOR_PATH . '/includes/Taxonomies.php';

        require_once HTPL_GENERATOR_PATH . '/includes/Admin.php';
        require_once HTPL_GENERATOR_PATH . '/includes/Admin/Global_Settings.php';
        require_once HTPL_GENERATOR_PATH . '/includes/Admin/Recommended_Plugins.php';
        require_once HTPL_GENERATOR_PATH . '/includes/Admin/class.recommendation-plugin.php';
        require_once HTPL_GENERATOR_PATH . '/includes/Admin/Metaboxes.php';


        require_once HTPL_GENERATOR_PATH . '/includes/Frontend.php';

        /**
         * Including plugin file for secutiry purpose
         */
        if ( ! function_exists( 'is_plugin_active' ) ) {
            include_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
    }

    /**
     * First initialization of the plugin
     *
     * @since 1.0.0
     */
    private function run() {
        register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
        register_activation_hook( __FILE__, array( $this, 'flush_rewrites' ) );

        // Set up localisation.
        add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );

        // Finally initialize this plugin
        add_action( 'plugins_loaded', array( $this, 'init' ) );
    }

    /**
     * Load the plugin textdomain
     *
     * @since 1.0.0
     */
    public function load_plugin_textdomain() {
        load_plugin_textdomain( 'htpl-generator', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

    /**
     * Initialize this plugin
     *
     * @since 1.0.0
     */
    public function init() {
        if ( is_admin() ) {
            new HtplGenerator\Admin();
        } else {
            new HtplGenerator\Frontend();
        }
    }

    public function flush_rewrites() {
        flush_rewrite_rules();
    }
}

Htpl_Generator::instance();
