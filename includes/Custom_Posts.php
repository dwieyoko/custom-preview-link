<?php
namespace HtplGenerator;

/**
 * Custom_Posts class
 */
class Custom_Posts {
    public $slug_type;
    public $custom_slug;

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_custom_posts' ) );

        // Remove cpt slug & behave like post
        $this->slug_type   = htpl_get_option('slug_type');
        $this->custom_slug = htpl_get_option('custom_slug');

        if($this->slug_type == 'no_slug' || ($this->slug_type == 'custom' && empty($this->custom_slug)) ){
            add_filter( 'post_type_link', array( $this, 'remove_slug'), 10, 3 );

            // Instruct wordpress on how to find posts from the new permalinks
            add_filter( 'request', array( $this, 'parse_request_remove_cpt_slug') , 1, 1 );
        }
        
    }

    public function register_custom_posts() {
        // templates
        $labels = array(
            'name'                  => _x( 'Preview Links', 'Post Type General Name', 'htpl-generator' ),
            'singular_name'         => _x( 'Link', 'Post Type Singular Name', 'htpl-generator' ),
            'menu_name'             => __( 'Preview Links', 'htpl-generator' ),
            'name_admin_bar'        => __( 'nab', 'htpl-generator' ),
            'archives'              => __( 'Link Archives', 'htpl-generator' ),
            'parent_item_colon'     => __( 'Parent Link:', 'htpl-generator' ),
            'all_items'             => __( 'All Links', 'htpl-generator' ),
            'add_new_item'          => __( 'Generate New Preview Link', 'htpl-generator' ),
            'add_new'               => __( 'Generate New Link', 'htpl-generator' ),
            'new_item'              => __( 'New Link', 'htpl-generator' ),
            'edit_item'             => __( 'Edit Link', 'htpl-generator' ),
            'update_item'           => __( 'Update Link', 'htpl-generator' ),
            'view_item'             => __( 'View Link', 'htpl-generator' ),
            'search_items'          => __( 'Search Link', 'htpl-generator' ),
            'not_found'             => __( 'Not found', 'htpl-generator' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'htpl-generator' ),
            'featured_image'        => __( 'Featured Image', 'htpl-generator' ),
            'set_featured_image'    => __( 'Set featured image', 'htpl-generator' ),
            'remove_featured_image' => __( 'Remove featured image', 'htpl-generator' ),
            'use_featured_image'    => __( 'Use as featured image', 'htpl-generator' ),
            'insert_into_item'      => __( 'Insert into item', 'htpl-generator' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'htpl-generator' ),
            'items_list'            => __( 'Links list', 'htpl-generator' ),
            'items_list_navigation' => __( 'Links list navigation', 'htpl-generator' ),
            'filter_items_list'     => __( 'Filter items list', 'htpl-generator' ),
        );
        $args = array(
            'label'                 => __( 'Link', 'htpl-generator' ),
            'labels'                => $labels,
            'public'              => true,
            'show_ui'             => true,
            'menu_icon'           => 'dashicons-redo',
            'menu_position'         => 5,
            'capability_type'     => 'post',
            'publicly_queryable'  => true,
            'exclude_from_search' => true,
            'hierarchical'        => false, // Hierarchical causes memory issues - WP loads all records!
            'supports'            => array( 'title' ),
            'has_archive'         => false,
            'show_in_nav_menus'   => true,
            'show_in_rest'        => false,
        );

        if( $this->slug_type == 'custom' && $this->custom_slug ){
            $args['rewrite'] = array(
                'slug'       => $this->custom_slug,
                'with_front' => false,
                'feeds'      => false,
            );
        }

        register_post_type( 'htpl-link', $args );
    }

    public function remove_slug( $post_link, $post, $leavename ) {
        if ( 'htpl-link' != $post->post_type || 'publish' != $post->post_status ) {
            return $post_link;
        }

        $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
        
        return $post_link;
    }

    /* 
     * Remove CPT slug from the permalink
     * 
     * @link https://wordpress.stackexchange.com/a/388749
     * 
     * @return array
     */
    public function parse_request_remove_cpt_slug( $query_vars ) {
        // return if admin dashboard 
        if ( is_admin() ) {
            return $query_vars;
        }

        // return if pretty permalink isn't enabled
        if ( ! get_option( 'permalink_structure' ) ) {
            return $query_vars;
        }

        $cpt = 'htpl-link';

        // store post slug value to a variable
        if ( isset( $query_vars['pagename'] ) ) {
            $slug = $query_vars['pagename'];
        } elseif ( isset( $query_vars['name'] ) ) {
            $slug = $query_vars['name'];
        } else {
            global $wp;
            
            $path = $wp->request;

            // use url path as slug
            if ( $path && strpos( $path, '/' ) === false ) {
                $slug = $path;
            } else {
                $slug = false;
            }
        }

        if ( $slug ) {
            $post_match = get_page_by_path( $slug, 'OBJECT', $cpt );

            if ( ! is_admin() && $post_match ) {

                // remove any 404 not found error element from the query_vars array because a post match already exists in cpt
                if ( isset( $query_vars['error'] ) && $query_vars['error'] == 404 ) {
                    unset( $query_vars['error'] );
                }

                // remove unnecessary elements from the original query_vars array
                unset( $query_vars['pagename'] );
        
                // add necessary elements in the the query_vars array
                $query_vars['post_type'] = $cpt;
                $query_vars['name'] = $slug;
                $query_vars[$cpt] = $slug; // this constructs the "cpt=>post_slug" element
            }
        }

        return $query_vars;
    }
}

// instance
new Custom_Posts();