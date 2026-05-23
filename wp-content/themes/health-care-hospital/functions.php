<?php

add_action( 'after_setup_theme', 'health_care_hospital_after_setup_theme' );
function health_care_hospital_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'health-care-hospital-featured-image', 2000, 1200, true );
    add_image_size( 'health-care-hospital-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
        'flex-height'  => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

}

// Add function after setup:
function health_care_hospital_conditional_editor_styles() {
    
    add_editor_style( array( 'assets/css/editor-style.css') );
}
add_action( 'after_setup_theme', 'health_care_hospital_conditional_editor_styles', 11 );

/**
 * Register widget area.
 */
function health_care_hospital_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'health-care-hospital' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'health-care-hospital' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'health-care-hospital' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'health-care-hospital' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'health-care-hospital' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'health-care-hospital' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'health-care-hospital' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'health-care-hospital' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'health-care-hospital' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'health-care-hospital' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'health-care-hospital' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'health-care-hospital' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'health-care-hospital' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'health-care-hospital' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'health_care_hospital_widgets_init' );

// enqueue styles for child theme
function health_care_hospital_enqueue_styles() {
    
    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // owl-carousel
    wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'health-care-hospital-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'health-care-hospital-child-style' ), '1.0' );

    // enqueue parent styles
    wp_enqueue_style('online-pharmacy-style', get_template_directory_uri() .'/style.css');
    
    // enqueue child styles
    wp_enqueue_style('online-pharmacy-child-style', get_stylesheet_directory_uri() .'/style.css', array('online-pharmacy-style'));

     require get_theme_file_path( '/tp-theme-color.php' );
        wp_add_inline_style( 'online-pharmacy-child-style',$online_pharmacy_tp_theme_css );

    wp_enqueue_script('owl.carousel-js', esc_url( get_theme_file_uri() ) . '/assets/js/owl.carousel.js',array('jquery'),'2.3.4',     TRUE);

    wp_enqueue_script('health-care-hospital-custom-js', esc_url( get_theme_file_uri() ) . '/assets/js/health-care-hospital-custom.js',array('jquery'),'2.3.4',TRUE
    );

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );

    $online_pharmacy_body_font_family = get_theme_mod('online_pharmacy_body_font_family', '');

    $online_pharmacy_heading_font_family = get_theme_mod('online_pharmacy_heading_font_family', '');

    $online_pharmacy_tp_theme_css = '
        body{
            font-family: '.esc_html($online_pharmacy_body_font_family).';
        }
        p.simplep{
            font-family: '.esc_html($online_pharmacy_body_font_family).';
        }
        .more-btn a{
            font-family: '.esc_html($online_pharmacy_body_font_family).';
        }
        h1,h2.woocommerce-loop-product__title,.woocommerce div.product .product_title {
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        h2{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        h3{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        h4,#abt-product h4{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        h5{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        h6{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        #theme-sidebar .wp-block-search .wp-block-search__label{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
    ';
    wp_add_inline_style('online-pharmacy-style', $online_pharmacy_tp_theme_css);    
}
add_action('wp_enqueue_scripts', 'health_care_hospital_enqueue_styles');

function health_care_hospital_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'health-care-hospital-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'health_care_hospital_admin_scripts' );

    function health_care_hospital_header_style() {
 if ( get_header_image() ) :
 $health_care_hospital_custom_header = "
 .headerbox{
 background-image:url('".esc_url(get_header_image())."');
 background-position: center top;
 background-size: cover; }";
 wp_add_inline_style( 'health-care-hospital-child-style', $health_care_hospital_custom_header );
 endif;
}
add_action( 'wp_enqueue_scripts', 'health_care_hospital_header_style' );

function health_care_hospital_sanitize_select( $input, $setting ){  
    $input = sanitize_key($input);    
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );      
}

function health_care_hospital_theme_setup() {
    
    require get_theme_file_path( '/customizer/customize-control-toggle.php' );

    require get_stylesheet_directory() . '/customizer/customizer.php';

    if ( ! defined( 'ONLINE_PHARMACY_PRO_THEME_NAME' ) ) {
        define( 'ONLINE_PHARMACY_PRO_THEME_NAME', esc_html__( 'Health Care Hospital Pro', 'health-care-hospital' ));
    }
    if ( ! defined( 'ONLINE_PHARMACY_FREE_THEME_URL' ) ) {
        define( 'ONLINE_PHARMACY_FREE_THEME_URL', 'https://www.themespride.com/products/free-hospital-wordpress-theme' );
    }
    if ( ! defined( 'ONLINE_PHARMACY_RATE_THEME_URL' ) ) {
        define( 'ONLINE_PHARMACY_RATE_THEME_URL', 'https://wordpress.org/support/theme/health-care-hospital/reviews/#new-post' );
    }
    if ( ! defined( 'ONLINE_PHARMACY_CHANGELOG_THEME_URL' ) ) {
        define( 'ONLINE_PHARMACY_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
    }
    if ( ! defined( 'ONLINE_PHARMACY_SUPPORT_THEME_URL' ) ) {
        define( 'ONLINE_PHARMACY_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/health-care-hospital' );
    }
    if ( ! defined( 'ONLINE_PHARMACY_DOCS_URL' ) ) {
        define( 'ONLINE_PHARMACY_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/hospital-health-care-lite/'));
    }
    if ( ! defined( 'ONLINE_PHARMACY_PRO_THEME_URL' ) ) {
        define( 'ONLINE_PHARMACY_PRO_THEME_URL', 'https://www.themespride.com/products/health-care-wordpress-theme' );
    }
    if ( ! defined( 'ONLINE_PHARMACY_DEMO_THEME_URL' ) ) {
        define( 'ONLINE_PHARMACY_DEMO_THEME_URL', 'https://page.themespride.com/hospital-health-care-pro/' );
    }
    if ( ! defined( 'ONLINE_PHARMACY_DOCS_THEME_URL' ) ) {
        define( 'ONLINE_PHARMACY_DOCS_THEME_URL', 'https://page.themespride.com/demo/docs/hospital-health-care-lite/' );
    }

    define('HEALTH_CARE_HOSPITAL_CREDIT',__('https://www.themespride.com/products/free-hospital-wordpress-theme','health-care-hospital') );
    if ( ! function_exists( 'health_care_hospital_credit' ) ) {
        function health_care_hospital_credit(){
            echo "<a href=".esc_url(HEALTH_CARE_HOSPITAL_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('online_pharmacy_footer_text',__('Hospital WordPress Theme','online-pharmacy')))."</a>";
        }
    }

}
add_action( 'after_setup_theme', 'health_care_hospital_theme_setup' );

// Skip WooCommerce setup wizard after activation
add_filter('woocommerce_prevent_automatic_wizard_redirect', '__return_true');