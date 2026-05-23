<?php

$online_pharmacy_tp_theme_css = '';

//theme color
$online_pharmacy_tp_color_option = get_theme_mod('online_pharmacy_tp_color_option');

// 1st color
$online_pharmacy_tp_color_option = get_theme_mod('online_pharmacy_tp_color_option', '#0cb8b6');
if ($online_pharmacy_tp_color_option) {
    $online_pharmacy_tp_theme_css .= ':root {';
    $online_pharmacy_tp_theme_css .= '--color-primary1: ' . esc_attr($online_pharmacy_tp_color_option) . ';';
    $online_pharmacy_tp_theme_css .= '}';
}

//preloader

$online_pharmacy_tp_preloader_color1_option = get_theme_mod('online_pharmacy_tp_preloader_color1_option');
$online_pharmacy_tp_preloader_color2_option = get_theme_mod('online_pharmacy_tp_preloader_color2_option');
$online_pharmacy_tp_preloader_bg_color_option = get_theme_mod('online_pharmacy_tp_preloader_bg_color_option');

if($online_pharmacy_tp_preloader_color1_option != false){
$online_pharmacy_tp_theme_css .='.center1{';
	$online_pharmacy_tp_theme_css .='border-color: '.esc_attr($online_pharmacy_tp_preloader_color1_option).' !important;';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_preloader_color1_option != false){
$online_pharmacy_tp_theme_css .='.center1 .ring::before{';
	$online_pharmacy_tp_theme_css .='background: '.esc_attr($online_pharmacy_tp_preloader_color1_option).' !important;';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_preloader_color2_option != false){
$online_pharmacy_tp_theme_css .='.center2{';
	$online_pharmacy_tp_theme_css .='border-color: '.esc_attr($online_pharmacy_tp_preloader_color2_option).' !important;';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_preloader_color2_option != false){
$online_pharmacy_tp_theme_css .='.center2 .ring::before{';
	$online_pharmacy_tp_theme_css .='background: '.esc_attr($online_pharmacy_tp_preloader_color2_option).' !important;';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_preloader_bg_color_option != false){
$online_pharmacy_tp_theme_css .='.loader{';
	$online_pharmacy_tp_theme_css .='background: '.esc_attr($online_pharmacy_tp_preloader_bg_color_option).';';
$online_pharmacy_tp_theme_css .='}';
}

// footer-bg-color
$online_pharmacy_tp_footer_bg_color_option = get_theme_mod('online_pharmacy_tp_footer_bg_color_option');

if($online_pharmacy_tp_footer_bg_color_option != false){
$online_pharmacy_tp_theme_css .='#footer{';
	$online_pharmacy_tp_theme_css .='background: '.esc_attr($online_pharmacy_tp_footer_bg_color_option).' !important;';
$online_pharmacy_tp_theme_css .='}';
}

//footer image
$online_pharmacy_footer_widget_image = get_theme_mod('online_pharmacy_footer_widget_image');
if($online_pharmacy_footer_widget_image != false){
$online_pharmacy_tp_theme_css .='#footer{';
	$online_pharmacy_tp_theme_css .='background: url('.esc_attr($online_pharmacy_footer_widget_image).');';
$online_pharmacy_tp_theme_css .='}';
}

//======================= slider Content layout ===================== //

$health_care_hospital_slider_content_layout = get_theme_mod('health_care_hospital_slider_content_layout', 'RIGHT-ALIGN'); 
$online_pharmacy_tp_theme_css .= '#slider .carousel-caption{';
switch ($health_care_hospital_slider_content_layout) {
    case 'LEFT-ALIGN':
        $online_pharmacy_tp_theme_css .= 'text-align:left; right: 48%; left: 18%';
        break;
    case 'CENTER-ALIGN':
        $online_pharmacy_tp_theme_css .= 'text-align:center; left: 20%; right: 20%';
        break;
    case 'RIGHT-ALIGN':
        $online_pharmacy_tp_theme_css .= 'text-align:right; left: 48%; right: 18%';
        break;
    default:
        $online_pharmacy_tp_theme_css .= 'text-align:left; right: 48%; left: 18%';
        break;
}
$online_pharmacy_tp_theme_css .= '}';

// Slider Height
    $health_care_hospital_slider_img_height      = get_theme_mod('health_care_hospital_slider_img_height');
    $health_care_hospital_slider_img_height_responsive = get_theme_mod('health_care_hospital_slider_img_height_responsive');

    // Desktop height
    $online_pharmacy_tp_theme_css .= '@media screen and (min-width: 768px) {';
    $online_pharmacy_tp_theme_css .= '#slider img {';
    if ( $health_care_hospital_slider_img_height ) {
        $online_pharmacy_tp_theme_css .= 'height: ' . esc_attr( $health_care_hospital_slider_img_height ) . ';';
    }
    $online_pharmacy_tp_theme_css .= 'width: 100%;';
    $online_pharmacy_tp_theme_css .= '}';
    $online_pharmacy_tp_theme_css .= '}';

    // Mobile height
    $online_pharmacy_tp_theme_css .= '@media screen and (max-width: 767px) {';
    $online_pharmacy_tp_theme_css .= '#slider img {';
    if ( $health_care_hospital_slider_img_height_responsive ) {
        $online_pharmacy_tp_theme_css .= 'height: ' . esc_attr( $health_care_hospital_slider_img_height_responsive ) . ' !important;';
    }
    $online_pharmacy_tp_theme_css .= 'width: 100%;';
    $online_pharmacy_tp_theme_css .= '}';
    $online_pharmacy_tp_theme_css .= '}';

    // footer Section ANimation
    $online_pharmacy_child_sec_animation = get_theme_mod( 'online_pharmacy_child_sec_animation', true );
    if ( $online_pharmacy_child_sec_animation ) {
        $online_pharmacy_tp_theme_css .= '#abt-product { animation: bounceInDown 3s; animation-fill-mode: both; }';
    }