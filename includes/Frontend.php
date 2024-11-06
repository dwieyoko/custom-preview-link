<?php
namespace HtplGenerator;

/**
 * Frontend class.
 */
class Frontend {
    /**
     * Constructor.
     */
    public function __construct() {
        add_filter('single_template', array( $this, 'load_post_type_single_template') );
    }

    function load_post_type_single_template($single) {
        global $post;

        if($post->post_type != 'htpl-link'){
            return $single;
        }

        /* Checks for single template by post type */
        if ( file_exists( HTPL_GENERATOR_PATH . '/templates/single-htpl-link.php') ) {
            return HTPL_GENERATOR_PATH . '/templates/single-htpl-link.php';
        }

        return $single;
    }
}