<?php 

namespace PreviewLink\Admin;

class Preview_Link_Recomendation{

	 /**
     * [$_instance]
     * @var null
     */
    private static $_instance = null;

    /**
     * [instance] Initializes a singleton instance
     * @return [Recommended_Plugins]
     */
    public static function instance( $args = [] ) {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self( $args );
        }
        return self::$_instance;
    }

	/**
     * [__construct] Class construct
     */
    function __construct() {
    	$this->plugin_recommendations();
    }

	 /**
	 * [plugin_recommendations]
	 * @return [void]
	 */
	public function plugin_recommendations(){

	    $get_instance = Recommended_Plugins::instance( 
	        array( 
	            'text_domain'       => 'htpl-generator', 
	            'parent_menu_slug'  => 'edit.php?post_type=htpl-link', 
	            'menu_capability'   => 'manage_options', 
	            'menu_page_slug'    => 'previewlink-recommendations',
	            'priority'          => 200,
	            'assets_url'        => HTPL_GENERATOR_ASSETS,
	            'hook_suffix'       => 'htpl-link_page_previewlink-recommendations'
	        )
	    );

	    $get_instance->add_new_tab( array(

	        'title' => esc_html__( 'Recommended', 'htpl-generator' ),
	        'active' => true,
	        'plugins' => array(

	            array(
	                'slug'      => 'woolentor-addons',
	                'location'  => 'woolentor_addons_elementor.php',
	                'name'      => esc_html__( 'WooLentor', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'ht-mega-for-elementor',
	                'location'  => 'htmega_addons_elementor.php',
	                'name'      => esc_html__( 'HT Mega', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'hashbar-wp-notification-bar',
	                'location'  => 'init.php',
	                'name'      => esc_html__( 'HashBar', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'ht-slider-for-elementor',
	                'location'  => 'ht-slider-for-elementor.php',
	                'name'      => esc_html__( 'HT Slider For Elementor', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'ht-contactform',
	                'location'  => 'contact-form-widget-elementor.php',
	                'name'      => esc_html__( 'HT Contact Form 7', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'extensions-for-cf7',
	                'location'  => 'extensions-for-cf7.php',
	                'name'      => esc_html__( 'Extensions For CF7', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'ht-wpform',
	                'location'  => 'wpform-widget-elementor.php',
	                'name'      => esc_html__( 'HT WPForms', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'ht-menu-lite',
	                'location'  => 'ht-mega-menu.php',
	                'name'      => esc_html__( 'HT Menu', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'insert-headers-and-footers-script',
	                'location'  => 'init.php',
	                'name'      => esc_html__( 'HT Script', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'wp-plugin-manager',
	                'location'  => 'plugin-main.php',
	                'name'      => esc_html__( 'WP Plugin Manager', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'wc-builder',
	                'location'  => 'wc-builder.php',
	                'name'      => esc_html__( 'WC Builder', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'whols',
	                'location'  => 'whols.php',
	                'name'      => esc_html__( 'Whols', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'wc-multi-currency',
	                'location'  => 'wcmilticurrency.php',
	                'name'      => esc_html__( 'Multi Currency', 'htpl-generator' )
	            )
	        )

	    ) );

	    $get_instance->add_new_tab(array(
	        'title' => esc_html__( 'You May Also Like', 'htpl-generator' ),
	        'plugins' => array(

	            array(
	                'slug'      => 'woolentor-addons-pro',
	                'location'  => 'woolentor_addons_pro.php',
	                'name'      => esc_html__( 'WooLentor Pro', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/woolentor-pro-woocommerce-page-builder/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'WooLentor is one of the most popular WooCommerce Elementor Addons on WordPress.org. It has been downloaded more than 672,148 times and 60,000 stores are using WooLentor plugin. Why not you?', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'htmega-pro',
	                'location'  => 'htmega_pro.php',
	                'name'      => esc_html__( 'HT Mega Pro', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/ht-mega-pro/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'HTMega is an absolute addon for elementor that includes 80+ elements & 360 Blocks with unlimited variations. HT Mega brings limitless possibilities. Embellish your site with the elements of HT Mega.', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'swatchly-pro',
	                'location'  => 'swatchly-pro.php',
	                'name'      => esc_html__( 'Product Variation Swatches', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/swatchly-product-variation-swatches-for-woocommerce-products/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'Are you getting frustrated with WooCommerce’s current way of presenting the variants for your products? Well, say goodbye to dropdowns and start showing the product variations in a whole new light with Swatchly.', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'whols-pro',
	                'location'  => 'whols-pro.php',
	                'name'      => esc_html__( 'Whols Pro', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/whols-woocommerce-wholesale-prices/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'Whols is an outstanding WordPress plugin for WooCommerce that allows store owners to set wholesale prices for the products of their online stores. This plugin enables you to show special wholesale prices to the wholesaler. Users can easily request to become a wholesale customer by filling out a simple online registration form. Once the registration is complete, the owner of the store will be able to review the request and approve the request either manually or automatically.', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'just-tables-pro',
	                'location'  => 'just-tables-pro.php',
	                'name'      => esc_html__( 'JustTables Pro', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/wp/justtables/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'JustTables is an incredible WordPress plugin that lets you showcase all your WooCommerce products in a sortable and filterable table view. It allows your customers to easily navigate through different attributes of the products and compare them on a single page. This plugin will be of great help if you are looking for an easy solution that increases the chances of landing a sale on your online store.', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'multicurrencypro',
	                'location'  => 'multicurrencypro.php',
	                'name'      => esc_html__( 'Multi Currency Pro for WooCommerce', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/multi-currency-pro-for-woocommerce/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'Multi-Currency Pro for WooCommerce is a prominent currency switcher plugin for WooCommerce. This plugin allows your website or online store visitors to switch to their preferred currency or their country’s currency.', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'cf7-extensions-pro',
	                'location'  => 'cf7-extensions-pro.php',
	                'name'      => esc_html__( 'Extensions For CF7 Pro', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/cf7-extensions/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'Contact Form7 Extensions plugin is a fantastic WordPress plugin that enriches the functionalities of Contact Form 7.This all-in-one WordPress plugin will help you turn any contact page into a well-organized, engaging tool for communicating with your website visitors by providing tons of advanced features like drag and drop file upload, repeater field, trigger error for already submitted forms, popup form response, country flags and dial codes with a telephone input field and acceptance field, etc. in addition to its basic features.', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'hashbar-pro',
	                'location'  => 'init.php',
	                'name'      => esc_html__( 'HashBar Pro', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/wordpress-notification-bar-plugin/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'HashBar is a WordPress Notification / Alert / Offer Bar plugin which allows you to create unlimited notification bars to notify your customers. This plugin has option to show email subscription form (sometimes it increases up to 500% email subscriber), Offer text and buttons about your promotions. This plugin has the options to add unlimited background colors and images to make your notification bar more professional.', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'wp-plugin-manager-pro',
	                'location'  => 'plugin-main.php',
	                'name'      => esc_html__( 'WP Plugin Manager Pro', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/wp-plugin-manager-pro/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'WP Plugin Manager Pro is a specialized WordPress Plugin that helps you to deactivate unnecessary WordPress Plugins page wise and boosts the speed of your WordPress site to improve the overall site performance.', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'ht-script-pro',
	                'location'  => 'plugin-main.php',
	                'name'      => esc_html__( 'HT Script Pro', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/insert-headers-and-footers-code-ht-script/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'Insert Headers and Footers Code allows you to insert Google Analytics, Facebook Pixel, custom CSS, custom HTML, JavaScript code to your website header and footer without modifying your theme code.This plugin has the option to add any custom code to your theme in one place, no need to edit the theme code. It will save your time and remove the hassle for the theme update.', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'ht-menu',
	                'location'  => 'ht-mega-menu.php',
	                'name'      => esc_html__( 'HT Menu Pro', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/ht-menu-pro/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'WordPress Mega Menu Builder for Elementor', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'ht-slider-addons-pro',
	                'location'  => 'ht-slider-addons-pro.php',
	                'name'      => esc_html__( 'HT Slider Pro For Elementor', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/ht-slider-pro-for-elementor/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'HT Slider Pro is a plugin to create a slider for WordPress websites easily using the Elementor page builder. 80+ prebuild slides/templates are included in this plugin. There is the option to create a post slider, WooCommerce product slider, Video slider, image slider, etc. Fullscreen, full width and box layout option are included.', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'ht-google-place-review',
	                'location'  => 'ht-google-place-review.php',
	                'name'      => esc_html__( 'Google Place Review', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/google-place-review-plugin-for-wordpress/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( 'If you are searching for a modern and excellent google places review WordPress plugin to showcase reviews from Google Maps and strengthen trust between you and your site visitors, look no further than HT Google Place Review', 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'was-this-helpful',
	                'location'  => 'was-this-helpful.php',
	                'name'      => esc_html__( 'Was This Helpful?', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/was-this-helpful/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( "Was this helpful? is a WordPress plugin that allows you to take visitors' feedback on your post/pages or any article. A visitor can share his feedback by like/dislike/yes/no", 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'ht-click-to-call',
	                'location'  => 'ht-click-to-call.php',
	                'name'      => esc_html__( 'HT Click To Call', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/ht-click-to-call/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( "HT – Click to Call is a lightweight WordPress plugin that allows you to add a floating click to call button on your website. It will offer your website visitors an opportunity to call your business immediately at the right moment, especially when they are interested in your products or services and seeking more information.", 'htpl-generator' ),
	            ),

	            array(
	                'slug'      => 'docus-pro',
	                'location'  => 'docus-pro.php',
	                'name'      => esc_html__( 'Docus Pro', 'htpl-generator' ),
	                'link'      => 'https://hasthemes.com/plugins/docus-pro-youtube-video-playlist/',
	                'author_link'=> 'https://hasthemes.com/',
	                'description'=> esc_html__( "Embedding a YouTube playlist into your website plays a vital role to curate your content into several categories and make your web content more engaging and popular by keeping the visitors on your website for a longer period.", 'htpl-generator' ),
	            ),

	        )
	    ));

	    $get_instance->add_new_tab(array(
	        'title' => esc_html__( 'Others', 'htpl-generator' ),
	        'plugins' => array(

	            array(
	                'slug'      => 'really-simple-google-tag-manager',
	                'location'  => 'really-simple-google-tag-manager.php',
	                'name'      => esc_html__( 'Really Simple Google Tag Manager', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'ht-instagram',
	                'location'  => 'ht-instagram.php',
	                'name'      => esc_html__( 'HT Feed', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'faster-youtube-embed',
	                'location'  => 'faster-youtube-embed.php',
	                'name'      => esc_html__( 'Faster YouTube Embed', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'wc-sales-notification',
	                'location'  => 'wc-sales-notification.php',
	                'name'      => esc_html__( 'WC Sales Notification', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'quickswish',
	                'location'  => 'quickswish.php',
	                'name'      => esc_html__( 'QuickSwish', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'docus',
	                'location'  => 'docus.php',
	                'name'      => esc_html__( 'Docus – YouTube Video Playlist', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'data-captia',
	                'location'  => 'data-captia.php',
	                'name'      => esc_html__( 'DataCaptia', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'coupon-zen',
	                'location'  => 'coupon-zen.php',
	                'name'      => esc_html__( 'Coupon Zen', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'sirve',
	                'location'  => 'sirve.php',
	                'name'      => esc_html__( 'Sirve – Simple Directory Listing', 'htpl-generator' )
	            ),

	            array(
	                'slug'      => 'ht-social-share',
	                'location'  => 'ht-social-share.php',
	                'name'      => esc_html__( 'HT Social Share', 'htpl-generator' )
	            ),

	        )
	    ));


	}
}

Preview_Link_Recomendation::instance();