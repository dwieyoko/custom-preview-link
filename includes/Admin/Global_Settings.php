<?php
namespace HtplGenerator\Admin;

/**
 * Global_Settings class
 */
class Global_Settings {

    /**
     * Constructor
     */
    public function __construct() {
        $this->settings();
    }

    /**
     * All the global settings of this plugin
     */
    public function settings() {
        $prefix = 'htpl_options';

        // Create Settings Wrapper
        \CSF::createOptions( $prefix, array(
            'menu_title'         => esc_html__( 'Settings', 'htpl-generator' ),
            'framework_title'    => esc_html__( 'Preview Link Generator', 'htpl-generator' ),
            'menu_slug'          => 'htpl-admin',
            'menu_type'          => 'submenu',
            'menu_capability'    => 'manage_options',
            'menu_parent'        => 'edit.php?post_type=htpl-link',
            // optionals
            'theme'              => 'light',
            'sticky_header'      => false,
            'class'              => 'htpl_global_options',
            'output_css'         => true,
            'show_search'        => false,
            'show_reset_all'     => false,
            'show_reset_section' => false,
            'show_bar_menu '     => false,
            'footer_credit'      => esc_html__('Made with Love by HasThemes', 'htpl-generator'),
            'defaults'           => array(
                'slug_type'   => 'no_slug',
                'custom_slug' => '',
                'favicon'     => '',
            )
        ) );

        // General Options
        \CSF::createSection( $prefix, array(
            'id'     => 'genearl_settings',
            'title'  => esc_html__( 'General Settings', 'htpl-generator' ),
            'icon'  => 'fas fa-sliders-h',
        ) );

        // Global
        \CSF::createSection( $prefix, array(
            'parent' => 'genearl_settings',
            'title'  => esc_html__( 'Global', 'htpl-generator' ),
            'fields' => array(
                array(
                    'id'    => 'slug_type',
                    'type'  => 'select',
                    'title' => esc_html__('Rewrite Slug', 'htpl-generator'),
                    'desc'  => __('Rewrite/Change Custom Post Slug. <br> After save, please refresh your <a target="_blank" href="'. admin_url( '/options-permalink.php') .'">permalink settings</a> <i class="dashicons-before dashicons-editor-help ht_help_icon"></i>  <div id="ht_dialog" style="display: none;" title="Refresh Permalink"><div class="ht_dialog_content"><img src="'.HTPL_GENERATOR_ASSETS.'/images/refresh-permalink.gif" /></div></div> <br> Link Preview: <pre>'. get_site_url() .'/<span></span>preview-item-name</pre>', 'htpl-generator'),
                    'options' => array(
                        'no_slug' => esc_html__('Default', 'htpl-generator'),
                        'custom'  => esc_html__('Use Custom Slug', 'htpl-generator'),
                    ),
                    'class' => 'ht'
                ),
                array(
                    'id'    => 'custom_slug',
                    'type'  => 'text',
                    'title' => esc_html__('Custom Slug', 'htpl-generator'),
                    'desc'  => __('To change the default post type slug. Write your desired slug here.', 'htpl-generator'),
                    'class' => 'ht',
                    'dependency' => array('slug_type', '==', 'custom')
                ),
                array(
                    'id'    => 'favicon',
                    'type'  => 'media',
                    'title' => esc_html__('Favicon', 'htpl-generator'),
                    'desc'  => esc_html__('Favicon is what you see in browser tabs, bookmark bars, and within the WordPress mobile apps. Upload one here! Favicon should be square and at least 512 × 512 pixels.', 'htpl-generator'),
                    'url'   => false,
                ),
            )
        ) );

    }

}