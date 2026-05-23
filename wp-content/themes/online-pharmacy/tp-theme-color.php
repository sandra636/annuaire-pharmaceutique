<?php

$online_pharmacy_tp_theme_css = '';

//theme color
$online_pharmacy_tp_color_option = get_theme_mod('online_pharmacy_tp_color_option');

// 1st color
$online_pharmacy_tp_color_option = get_theme_mod('online_pharmacy_tp_color_option', '#283b6a');
if ($online_pharmacy_tp_color_option) {
	$online_pharmacy_tp_theme_css .= ':root {';
	$online_pharmacy_tp_theme_css .= '--color-primary1: ' . esc_attr($online_pharmacy_tp_color_option) . ';';
	$online_pharmacy_tp_theme_css .= '}';
}

// second color
$online_pharmacy_tp_color_sec = get_theme_mod('online_pharmacy_tp_color_sec');

if($online_pharmacy_tp_color_sec != false){
$online_pharmacy_tp_theme_css .='.book-tkt-btn a{';
$online_pharmacy_tp_theme_css .='background-color: '.esc_attr($online_pharmacy_tp_color_sec).';';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_color_sec != false){
$online_pharmacy_tp_theme_css .='.top-header a:hover, .main-navigation a:hover, .logo h1 a:hover, .logo p a:hover,
.media-links i:hover, #product h3 a:hover, #slider .slider-call i{';
$online_pharmacy_tp_theme_css .='color: '.esc_attr($online_pharmacy_tp_color_sec).';';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_color_sec != false){
$online_pharmacy_tp_theme_css .='#slider .slider-call i{';
$online_pharmacy_tp_theme_css .='border-color: '.esc_attr($online_pharmacy_tp_color_sec).';';
$online_pharmacy_tp_theme_css .='}';
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

// logo tagline color
$online_pharmacy_site_tagline_color = get_theme_mod('online_pharmacy_site_tagline_color');

if($online_pharmacy_site_tagline_color != false){
$online_pharmacy_tp_theme_css .='.logo h1 a, .logo p, .logo p.site-title a{';
$online_pharmacy_tp_theme_css .='color: '.esc_attr($online_pharmacy_site_tagline_color).';';
$online_pharmacy_tp_theme_css .='}';
}

$online_pharmacy_logo_tagline_color = get_theme_mod('online_pharmacy_logo_tagline_color');
if($online_pharmacy_logo_tagline_color != false){
$online_pharmacy_tp_theme_css .='p.site-description{';
$online_pharmacy_tp_theme_css .='color: '.esc_attr($online_pharmacy_logo_tagline_color).';';
$online_pharmacy_tp_theme_css .='}';
}

// footer widget title color
$online_pharmacy_footer_widget_title_color = get_theme_mod('online_pharmacy_footer_widget_title_color');
if($online_pharmacy_footer_widget_title_color != false){
$online_pharmacy_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
$online_pharmacy_tp_theme_css .='color: '.esc_attr($online_pharmacy_footer_widget_title_color).';';
$online_pharmacy_tp_theme_css .='}';
}

// copyright text color
$online_pharmacy_footer_copyright_text_color = get_theme_mod('online_pharmacy_footer_copyright_text_color');
if($online_pharmacy_footer_copyright_text_color != false){
$online_pharmacy_tp_theme_css .='#footer .site-info p, #footer .site-info a {';
$online_pharmacy_tp_theme_css .='color: '.esc_attr($online_pharmacy_footer_copyright_text_color).';';
$online_pharmacy_tp_theme_css .='}';
}

// header image title color
$online_pharmacy_header_image_title_text_color = get_theme_mod('online_pharmacy_header_image_title_text_color');
if($online_pharmacy_header_image_title_text_color != false){
$online_pharmacy_tp_theme_css .='.box-text h2{';
$online_pharmacy_tp_theme_css .='color: '.esc_attr($online_pharmacy_header_image_title_text_color).';';
$online_pharmacy_tp_theme_css .='}';
}

// menu color
$online_pharmacy_menu_color = get_theme_mod('online_pharmacy_menu_color');
if($online_pharmacy_menu_color != false){
$online_pharmacy_tp_theme_css .='.main-navigation a{';
$online_pharmacy_tp_theme_css .='color: '.esc_attr($online_pharmacy_menu_color).';';
$online_pharmacy_tp_theme_css .='}';
}

//Footer Font Weight
$online_pharmacy_footer_copyright_title_font_weight = get_theme_mod( 'online_pharmacy_footer_copyright_title_font_weight','');
if($online_pharmacy_footer_copyright_title_font_weight == '100'){
$online_pharmacy_tp_theme_css .='#footer .site-info p {';
    $online_pharmacy_tp_theme_css .='font-weight: 100;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_copyright_title_font_weight == '200'){
$online_pharmacy_tp_theme_css .='#footer .site-info p {';
    $online_pharmacy_tp_theme_css .='font-weight: 200;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_copyright_title_font_weight == '300'){
$online_pharmacy_tp_theme_css .='#footer .site-info p {';
    $online_pharmacy_tp_theme_css .='font-weight: 300;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_copyright_title_font_weight == '400'){
$online_pharmacy_tp_theme_css .='#footer .site-info p {';
    $online_pharmacy_tp_theme_css .='font-weight: 400;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_copyright_title_font_weight == '500'){
$online_pharmacy_tp_theme_css .='#footer .site-info p {';
    $online_pharmacy_tp_theme_css .='font-weight: 500;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_copyright_title_font_weight == '600'){
$online_pharmacy_tp_theme_css .='#footer .site-info p {';
    $online_pharmacy_tp_theme_css .='font-weight: 600;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_copyright_title_font_weight == '700'){
$online_pharmacy_tp_theme_css .='#footer .site-info p {';
    $online_pharmacy_tp_theme_css .='font-weight: 700;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_copyright_title_font_weight == '800'){
$online_pharmacy_tp_theme_css .='#footer .site-info p {';
    $online_pharmacy_tp_theme_css .='font-weight: 800;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_copyright_title_font_weight == '900'){
$online_pharmacy_tp_theme_css .='#footer .site-info p {';
    $online_pharmacy_tp_theme_css .='font-weight: 900;';
$online_pharmacy_tp_theme_css .='}';
}
