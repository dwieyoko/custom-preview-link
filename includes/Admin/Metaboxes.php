<?php
namespace HtplGenerator\Admin;

/**
 * Metaboxes class
 */
class Metaboxes {
    /**
     * Constructor
     */
    public function __construct() {
        $this->settings();
    }

    /**
     * Meta options
     */
    public function settings() {
        $prefix = '_htpl';

         // Create post type meta option wrapper
         \CSF::createMetabox( $prefix, array(
            'title'     => esc_html__( 'Preview Link Generator Options', 'htpl-generator'),
            'post_type' => 'htpl-link',
            'data_type' => 'unserialize', // The type of the database save options. `serialize` or `unserialize`
         ) );

         // Create a section & fields
         \CSF::createSection( $prefix, array(
            'fields'      =>    array(
                // description
                array(
                    'id'           => $prefix. '_description',
                    'type'         => 'text',
                    'title'        => esc_html__( 'Description', 'htpl-generator' ),
                    'desc'         => esc_html__( 'Meta Description. Leave empty to use auty generated description.', 'htpl-generator' ),
                ),
                // iframe_link
                array(
                    'id'           => $prefix. '_iframe_url',
                    'type'         => 'text',
                    'title'        => esc_html__( 'Iframe URL', 'htpl-generator' ),
                    'placeholder'  => esc_html__( 'https://example.com/', 'htpl-generator' )
                ),
                // buynow_button_text
                array(
                    'id'           => $prefix. '_buynow_button_text',
                    'type'         => 'text',
                    'title'        => esc_html__( 'Buy Now Button Text', 'htpl-generator' ),
                    'desc'         => esc_html__( 'Default: Buy Now', 'htpl-generator' )
                ),
                // buynow_button_link
                array(
                    'id'           => $prefix. '_buynow_button_url',
                    'type'         => 'text',
                    'title'        => esc_html__( 'Buy Now Button URL', 'htpl-generator' ),
                    'placeholder'  => esc_html__( 'https://example.com/', 'htpl-generator' )
                ),
                // back_button_text
                array(
                    'id'           => $prefix. '_back_button_text',
                    'type'         => 'text',
                    'title'        => esc_html__( 'Back Button Text', 'htpl-generator' ),
                    'desc'         => esc_html__( 'Default: Item Name', 'htpl-generator' )
                ),
                // back_button_url
                array(
                    'id'           => $prefix. '_back_button_link',
                    'type'         => 'text',
                    'title'        => esc_html__( 'Back Button URL', 'htpl-generator' ),
                    'placeholder'  => esc_html__( 'https://example.com/', 'htpl-generator' ),
                    'desc'         => esc_html__( 'Leave empty for default.', 'htpl-generator' )
                ),
            )
         ));
    }
}