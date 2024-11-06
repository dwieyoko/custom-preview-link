<?php
namespace HtplGenerator;

/**
 * Taxonomies class
 */
class Taxonomies {

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_taxonomies' ) );
    }

    public function register_taxonomies() {

        $labels = array(
            'name'                       => _x( 'Categories', 'Taxonomy General Name', 'htpl-generator' ),
            'singular_name'              => _x( 'Categories', 'Taxonomy Singular Name', 'htpl-generator' ),
            'menu_name'                  => __( 'Categories', 'htpl-generator' ),
            'all_items'                  => __( 'All Items', 'htpl-generator' ),
            'parent_item'                => __( 'Parent Item', 'htpl-generator' ),
            'parent_item_colon'          => __( 'Parent Item:', 'htpl-generator' ),
            'new_item_name'              => __( 'New Item Name', 'htpl-generator' ),
            'add_new_item'               => __( 'Add New Item', 'htpl-generator' ),
            'edit_item'                  => __( 'Edit Item', 'htpl-generator' ),
            'update_item'                => __( 'Update Item', 'htpl-generator' ),
            'view_item'                  => __( 'View Item', 'htpl-generator' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'htpl-generator' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'htpl-generator' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'htpl-generator' ),
            'popular_items'              => __( 'Popular Items', 'htpl-generator' ),
            'search_items'               => __( 'Search Items', 'htpl-generator' ),
            'not_found'                  => __( 'Not Found', 'htpl-generator' ),
            'no_terms'                   => __( 'No items', 'htpl-generator' ),
            'items_list'                 => __( 'Items list', 'htpl-generator' ),
            'items_list_navigation'      => __( 'Items list navigation', 'htpl-generator' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => false,
        );

        register_taxonomy( 'htpl_link_cat', array( 'htpl-link' ), $args );
    }
}

// instance
new Taxonomies();