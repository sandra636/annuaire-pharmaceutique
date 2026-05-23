<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Online Pharmacy
 * @subpackage online_pharmacy
 */

function online_pharmacy_custom_header_setup() {
    register_default_headers( array(
        'default-image' => array(
            'url'           => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'thumbnail_url' => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'description'   => __( 'Default Header Image', 'online-pharmacy' ),
        ),
    ) );
}
add_action( 'after_setup_theme', 'online_pharmacy_custom_header_setup' );

/**
 * Styles the header image based on Customizer settings.
 */
function online_pharmacy_header_style() {
    $online_pharmacy_header_image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/images/sliderimage.png';

    $online_pharmacy_height     = get_theme_mod( 'online_pharmacy_header_image_height', 350 );
    $online_pharmacy_position   = get_theme_mod( 'online_pharmacy_header_background_position', 'center' );
    $online_pharmacy_attachment = get_theme_mod( 'online_pharmacy_header_background_attachment', 1 ) ? 'fixed' : 'scroll';

    $online_pharmacy_custom_css = "
        .header-img, .single-page-img, .external-div .box-image-page img, .external-div {
            background-image: url('" . esc_url( $online_pharmacy_header_image ) . "');
            background-size: cover;
            height: " . esc_attr( $online_pharmacy_height ) . "px;
            background-position: " . esc_attr( $online_pharmacy_position ) . ";
            background-attachment: " . esc_attr( $online_pharmacy_attachment ) . ";
        }

        @media (max-width: 1000px) {
            .header-img, .single-page-img, .external-div .box-image-page img,.external-div,.featured-image{
                height: 250px !important;
            }
            .box-text h2{
                font-size: 27px;
            }
        }
    ";

    wp_add_inline_style( 'online-pharmacy-style', $online_pharmacy_custom_css );
}
add_action( 'wp_enqueue_scripts', 'online_pharmacy_header_style' );

/**
 * Enqueue the main theme stylesheet.
 */
function online_pharmacy_enqueue_styles() {
    wp_enqueue_style( 'online-pharmacy-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'online_pharmacy_enqueue_styles' );