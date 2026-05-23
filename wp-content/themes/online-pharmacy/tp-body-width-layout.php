<?php

	$online_pharmacy_tp_theme_css = "";

	$online_pharmacy_theme_lay = get_theme_mod( 'online_pharmacy_tp_body_layout_settings','Full');
    if($online_pharmacy_theme_lay == 'Container'){
		$online_pharmacy_tp_theme_css .='body{';
			$online_pharmacy_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$online_pharmacy_tp_theme_css .='}';
		$online_pharmacy_tp_theme_css .='.page-template-front-page .menubar{';
			$online_pharmacy_tp_theme_css .='position: static;';
		$online_pharmacy_tp_theme_css .='}';
		$online_pharmacy_tp_theme_css .='@media screen and (max-width:575px){';
		$online_pharmacy_tp_theme_css .='body{';
			$online_pharmacy_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
		$online_pharmacy_tp_theme_css .='} }';
		$online_pharmacy_tp_theme_css .='.scrolled{';
			$online_pharmacy_tp_theme_css .='width: auto; left:0; right:0;';
		$online_pharmacy_tp_theme_css .='}';
	}else if($online_pharmacy_theme_lay == 'Container Fluid'){
		$online_pharmacy_tp_theme_css .='body{';
			$online_pharmacy_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$online_pharmacy_tp_theme_css .='}';
		$online_pharmacy_tp_theme_css .='.page-template-front-page .menubar{';
			$online_pharmacy_tp_theme_css .='width: 99%';
		$online_pharmacy_tp_theme_css .='}';
		$online_pharmacy_tp_theme_css .='@media screen and (max-width:575px){';
		$online_pharmacy_tp_theme_css .='body{';
			$online_pharmacy_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$online_pharmacy_tp_theme_css .='} }';
		$online_pharmacy_tp_theme_css .='.scrolled{';
			$online_pharmacy_tp_theme_css .='width: auto; left:0; right:0;';
		$online_pharmacy_tp_theme_css .='}';
	}else if($online_pharmacy_theme_lay == 'Full'){
		$online_pharmacy_tp_theme_css .='body{';
			$online_pharmacy_tp_theme_css .='max-width: 100%;';
		$online_pharmacy_tp_theme_css .='}';
	}

    $online_pharmacy_scroll_position = get_theme_mod( 'online_pharmacy_scroll_top_position','Right');
    if($online_pharmacy_scroll_position == 'Right'){
        $online_pharmacy_tp_theme_css .='#return-to-top{';
            $online_pharmacy_tp_theme_css .='right: 20px;';
        $online_pharmacy_tp_theme_css .='}';
    }else if($online_pharmacy_scroll_position == 'Left'){
        $online_pharmacy_tp_theme_css .='#return-to-top{';
            $online_pharmacy_tp_theme_css .='left: 20px;';
        $online_pharmacy_tp_theme_css .='}';
    }else if($online_pharmacy_scroll_position == 'Center'){
        $online_pharmacy_tp_theme_css .='#return-to-top{';
            $online_pharmacy_tp_theme_css .='right: 50%;left: 50%;';
        $online_pharmacy_tp_theme_css .='}';
    }

		//Social icon Font size
		$online_pharmacy_social_icon_fontsize = get_theme_mod('online_pharmacy_social_icon_fontsize');
				$online_pharmacy_tp_theme_css .='.media-links i{';
		$online_pharmacy_tp_theme_css .='font-size: '.esc_attr($online_pharmacy_social_icon_fontsize).'px;';
				$online_pharmacy_tp_theme_css .='}';

		// site title and tagline font size option
		$online_pharmacy_site_title_font_size = get_theme_mod('online_pharmacy_site_title_font_size', 30);{
				$online_pharmacy_tp_theme_css .='.logo h1 a, .logo p a{';
		$online_pharmacy_tp_theme_css .='font-size: '.esc_attr($online_pharmacy_site_title_font_size).'px;';
				$online_pharmacy_tp_theme_css .='}';
		}

		$online_pharmacy_site_tagline_font_size = get_theme_mod('online_pharmacy_site_tagline_font_size', 15);{
				$online_pharmacy_tp_theme_css .='.logo p{';
		$online_pharmacy_tp_theme_css .='font-size: '.esc_attr($online_pharmacy_site_tagline_font_size).'px;';
				$online_pharmacy_tp_theme_css .='}';
		}

$online_pharmacy_footer_widget_image = get_theme_mod('online_pharmacy_footer_widget_image');
if($online_pharmacy_footer_widget_image != false){
$online_pharmacy_tp_theme_css .='#footer{';
	$online_pharmacy_tp_theme_css .='background: url('.esc_attr($online_pharmacy_footer_widget_image).');';
$online_pharmacy_tp_theme_css .='}';
}

//menu font size
$online_pharmacy_menu_font_size = get_theme_mod('online_pharmacy_menu_font_size', '');{
$online_pharmacy_tp_theme_css .='.main-navigation a{';
	$online_pharmacy_tp_theme_css .='font-size: '.esc_attr($online_pharmacy_menu_font_size).'px;';
$online_pharmacy_tp_theme_css .='}';
}

// menu text tranform
$online_pharmacy_menu_text_tranform = get_theme_mod( 'online_pharmacy_menu_text_tranform','Uppercase');
if($online_pharmacy_menu_text_tranform == 'Uppercase'){
$online_pharmacy_tp_theme_css .='.main-navigation a {';
	$online_pharmacy_tp_theme_css .='text-transform: uppercase;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_menu_text_tranform == 'Lowercase'){
$online_pharmacy_tp_theme_css .='.main-navigation a {';
	$online_pharmacy_tp_theme_css .='text-transform: lowercase;';
$online_pharmacy_tp_theme_css .='}';
}
else if($online_pharmacy_menu_text_tranform == 'Capitalize'){
$online_pharmacy_tp_theme_css .='.main-navigation a {';
	$online_pharmacy_tp_theme_css .='text-transform: capitalize;';
$online_pharmacy_tp_theme_css .='}';
}

// related post
$online_pharmacy_related_post_mob = get_theme_mod('online_pharmacy_related_post_mob', true);
$online_pharmacy_related_post = get_theme_mod('online_pharmacy_remove_related_post', true);
$online_pharmacy_tp_theme_css .= '.related-post-block {';
if ($online_pharmacy_related_post == false) {
    $online_pharmacy_tp_theme_css .= 'display: none;';
}
$online_pharmacy_tp_theme_css .= '}';
$online_pharmacy_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($online_pharmacy_related_post == false || $online_pharmacy_related_post_mob == false) {
    $online_pharmacy_tp_theme_css .= '.related-post-block { display: none; }';
}
$online_pharmacy_tp_theme_css .= '}';

//blog description              
$online_pharmacy_mobile_blog_description = get_theme_mod('online_pharmacy_mobile_blog_description', true);
$online_pharmacy_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($online_pharmacy_mobile_blog_description == false) {
    $online_pharmacy_tp_theme_css .= '.blog-description{ display: none; }';
}
$online_pharmacy_tp_theme_css .= '}';

// slider btn
$online_pharmacy_slider_buttom_mob = get_theme_mod('online_pharmacy_slider_buttom_mob', true);
$online_pharmacy_slider_button = get_theme_mod('online_pharmacy_slider_button', true);
$online_pharmacy_tp_theme_css .= '#slider .more-btn {';
if ($online_pharmacy_slider_button == false) {
    $online_pharmacy_tp_theme_css .= 'display: none;';
}
$online_pharmacy_tp_theme_css .= '}';
$online_pharmacy_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($online_pharmacy_slider_button == false || $online_pharmacy_slider_buttom_mob == false) {
    $online_pharmacy_tp_theme_css .= '#slider .more-btn { display: none; }';
}
$online_pharmacy_tp_theme_css .= '}';

//return to header mobile				
$online_pharmacy_return_to_header_mob = get_theme_mod('online_pharmacy_return_to_header_mob', true);
$online_pharmacy_return_to_header = get_theme_mod('online_pharmacy_return_to_header', true);
$online_pharmacy_tp_theme_css .= '.return-to-header{';
if ($online_pharmacy_return_to_header == false) {
    $online_pharmacy_tp_theme_css .= 'display: none;';
}
$online_pharmacy_tp_theme_css .= '}';
$online_pharmacy_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($online_pharmacy_return_to_header == false || $online_pharmacy_return_to_header_mob == false) {
    $online_pharmacy_tp_theme_css .= '.return-to-header{ display: none; }';
}
$online_pharmacy_tp_theme_css .= '}';

//related products
$online_pharmacy_related_product = get_theme_mod('online_pharmacy_related_product',true);
if($online_pharmacy_related_product == false){
	$online_pharmacy_tp_theme_css .='.related.products{';
		$online_pharmacy_tp_theme_css .='display: none;';
	$online_pharmacy_tp_theme_css .='}';
}

//======================= slider Content layout ===================== //

$online_pharmacy_slider_content_layout = get_theme_mod('online_pharmacy_slider_content_layout', 'CENTER-ALIGN'); 
$online_pharmacy_tp_theme_css .= '#slider .carousel-caption{';
switch ($online_pharmacy_slider_content_layout) {
    case 'LEFT-ALIGN':
        $online_pharmacy_tp_theme_css .= 'text-align:left; right: 45%; left: 20%';
        break;
    case 'CENTER-ALIGN':
        $online_pharmacy_tp_theme_css .= 'text-align:center; right: 45%; left: 20%';
        break;
    case 'RIGHT-ALIGN':
        $online_pharmacy_tp_theme_css .= 'text-align:right; right: 45%; left: 20%';
        break;
    default:
        $online_pharmacy_tp_theme_css .= 'text-align:center; right: 45%; left: 20%';
        break;
}
$online_pharmacy_tp_theme_css .= '}';

//sale position
$online_pharmacy_scroll_position = get_theme_mod( 'online_pharmacy_sale_tag_position','right');
if($online_pharmacy_scroll_position == 'right'){
$online_pharmacy_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $online_pharmacy_tp_theme_css .='right: 25px !important;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_scroll_position == 'left'){
$online_pharmacy_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $online_pharmacy_tp_theme_css .='left: 25px !important; right: auto !important;';
$online_pharmacy_tp_theme_css .='}';
}

$online_pharmacy_woocommerce_sale_font_size = get_theme_mod('online_pharmacy_woocommerce_sale_font_size');
if($online_pharmacy_woocommerce_sale_font_size != false){
    $online_pharmacy_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $online_pharmacy_tp_theme_css .='font-size: '.esc_attr($online_pharmacy_woocommerce_sale_font_size).'px;';
    $online_pharmacy_tp_theme_css .='}';
}

$online_pharmacy_woocommerce_sale_padding_top_bottom = get_theme_mod('online_pharmacy_woocommerce_sale_padding_top_bottom');
if($online_pharmacy_woocommerce_sale_padding_top_bottom != false){
    $online_pharmacy_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $online_pharmacy_tp_theme_css .='padding-top: '.esc_attr($online_pharmacy_woocommerce_sale_padding_top_bottom).'px; padding-bottom: '.esc_attr($online_pharmacy_woocommerce_sale_padding_top_bottom).'px;';
    $online_pharmacy_tp_theme_css .='}';
}

$online_pharmacy_woocommerce_sale_padding_left_right = get_theme_mod('online_pharmacy_woocommerce_sale_padding_left_right');
if($online_pharmacy_woocommerce_sale_padding_left_right != false){
    $online_pharmacy_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $online_pharmacy_tp_theme_css .='padding-left: '.esc_attr($online_pharmacy_woocommerce_sale_padding_left_right).'px !Important; padding-right: '.esc_attr($online_pharmacy_woocommerce_sale_padding_left_right).'px !important;';
    $online_pharmacy_tp_theme_css .='}';
}

$online_pharmacy_woocommerce_sale_border_radius = get_theme_mod('online_pharmacy_woocommerce_sale_border_radius', 100);
if($online_pharmacy_woocommerce_sale_border_radius != false){
    $online_pharmacy_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $online_pharmacy_tp_theme_css .='border-radius: '.esc_attr($online_pharmacy_woocommerce_sale_border_radius).'% !important;';
    $online_pharmacy_tp_theme_css .='}';
}

//Font Weight
$online_pharmacy_menu_font_weight = get_theme_mod( 'online_pharmacy_menu_font_weight','600');
if($online_pharmacy_menu_font_weight == '100'){
$online_pharmacy_tp_theme_css .='.main-navigation a{';
    $online_pharmacy_tp_theme_css .='font-weight: 100;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_menu_font_weight == '200'){
$online_pharmacy_tp_theme_css .='.main-navigation a{';
    $online_pharmacy_tp_theme_css .='font-weight: 200;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_menu_font_weight == '300'){
$online_pharmacy_tp_theme_css .='.main-navigation a{';
    $online_pharmacy_tp_theme_css .='font-weight: 300;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_menu_font_weight == '400'){
$online_pharmacy_tp_theme_css .='.main-navigation a{';
    $online_pharmacy_tp_theme_css .='font-weight: 400;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_menu_font_weight == '500'){
$online_pharmacy_tp_theme_css .='.main-navigation a{';
    $online_pharmacy_tp_theme_css .='font-weight: 500;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_menu_font_weight == '600'){
$online_pharmacy_tp_theme_css .='.main-navigation a{';
    $online_pharmacy_tp_theme_css .='font-weight: 600;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_menu_font_weight == '700'){
$online_pharmacy_tp_theme_css .='.main-navigation a{';
    $online_pharmacy_tp_theme_css .='font-weight: 700;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_menu_font_weight == '800'){
$online_pharmacy_tp_theme_css .='.main-navigation a{';
    $online_pharmacy_tp_theme_css .='font-weight: 800;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_menu_font_weight == '900'){
$online_pharmacy_tp_theme_css .='.main-navigation a{';
    $online_pharmacy_tp_theme_css .='font-weight: 900;';
$online_pharmacy_tp_theme_css .='}';
}

/*------------- Blog Page------------------*/
$online_pharmacy_post_image_round = get_theme_mod('online_pharmacy_post_image_round', 0);
if($online_pharmacy_post_image_round != false){
	$online_pharmacy_tp_theme_css .='.blog .box-image img{';
		$online_pharmacy_tp_theme_css .='border-radius: '.esc_attr($online_pharmacy_post_image_round).'px;';
	$online_pharmacy_tp_theme_css .='}';
}

$online_pharmacy_post_image_width = get_theme_mod('online_pharmacy_post_image_width', '');
if($online_pharmacy_post_image_width != false){
	$online_pharmacy_tp_theme_css .='.blog .box-image img{';
		$online_pharmacy_tp_theme_css .='Width: '.esc_attr($online_pharmacy_post_image_width).'px;';
	$online_pharmacy_tp_theme_css .='}';
}

$online_pharmacy_post_image_length = get_theme_mod('online_pharmacy_post_image_length', '');
if($online_pharmacy_post_image_length != false){
	$online_pharmacy_tp_theme_css .='.blog .box-image img{';
		$online_pharmacy_tp_theme_css .='height: '.esc_attr($online_pharmacy_post_image_length).'px;';
	$online_pharmacy_tp_theme_css .='}';
}

// footer widget title font size
	$online_pharmacy_footer_widget_title_font_size = get_theme_mod('online_pharmacy_footer_widget_title_font_size', '');{
	$online_pharmacy_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
		$online_pharmacy_tp_theme_css .='font-size: '.esc_attr($online_pharmacy_footer_widget_title_font_size).'px;';
	$online_pharmacy_tp_theme_css .='}';
	}

	// Copyright text font size
	$online_pharmacy_footer_copyright_font_size = get_theme_mod('online_pharmacy_footer_copyright_font_size', '');{
	$online_pharmacy_tp_theme_css .='#footer .site-info p{';
		$online_pharmacy_tp_theme_css .='font-size: '.esc_attr($online_pharmacy_footer_copyright_font_size).'px;';
	$online_pharmacy_tp_theme_css .='}';
	}

	// copyright padding
	$online_pharmacy_footer_copyright_top_bottom_padding = get_theme_mod('online_pharmacy_footer_copyright_top_bottom_padding', '');
	if ($online_pharmacy_footer_copyright_top_bottom_padding !== '') { 
	    $online_pharmacy_tp_theme_css .= '.site-info {';
	    $online_pharmacy_tp_theme_css .= 'padding-top: ' . esc_attr($online_pharmacy_footer_copyright_top_bottom_padding) . 'px;';
	    $online_pharmacy_tp_theme_css .= 'padding-bottom: ' . esc_attr($online_pharmacy_footer_copyright_top_bottom_padding) . 'px;';
	    $online_pharmacy_tp_theme_css .= '}';
	}

	// copyright position
	$online_pharmacy_copyright_text_position = get_theme_mod( 'online_pharmacy_copyright_text_position','Center');
	if($online_pharmacy_copyright_text_position == 'Center'){
	$online_pharmacy_tp_theme_css .='#footer .site-info p{';
	$online_pharmacy_tp_theme_css .='text-align:center;';
	$online_pharmacy_tp_theme_css .='}';
	}else if($online_pharmacy_copyright_text_position == 'Left'){
	$online_pharmacy_tp_theme_css .='#footer .site-info p{';
	$online_pharmacy_tp_theme_css .='text-align:left;';
	$online_pharmacy_tp_theme_css .='}';
	}else if($online_pharmacy_copyright_text_position == 'Right'){
	$online_pharmacy_tp_theme_css .='#footer .site-info p{';
	$online_pharmacy_tp_theme_css .='text-align:right;';
	$online_pharmacy_tp_theme_css .='}';
}

// Header Image title font size
$online_pharmacy_header_image_title_font_size = get_theme_mod('online_pharmacy_header_image_title_font_size', '32');{
$online_pharmacy_tp_theme_css .='.box-text h2{';
    $online_pharmacy_tp_theme_css .='font-size: '.esc_attr($online_pharmacy_header_image_title_font_size).'px;';
$online_pharmacy_tp_theme_css .='}';
}


/*--------------------------- banner image Opacity -------------------*/
    $online_pharmacy_theme_lay = get_theme_mod( 'online_pharmacy_header_banner_opacity_color','0.5');
        if($online_pharmacy_theme_lay == '0'){
            $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
                $online_pharmacy_tp_theme_css .='opacity:0';
            $online_pharmacy_tp_theme_css .='}';
        }else if($online_pharmacy_theme_lay == '0.1'){
            $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
                $online_pharmacy_tp_theme_css .='opacity:0.1';
            $online_pharmacy_tp_theme_css .='}';
        }else if($online_pharmacy_theme_lay == '0.2'){
            $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
                $online_pharmacy_tp_theme_css .='opacity:0.2';
            $online_pharmacy_tp_theme_css .='}';
        }else if($online_pharmacy_theme_lay == '0.3'){
            $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
                $online_pharmacy_tp_theme_css .='opacity:0.3';
            $online_pharmacy_tp_theme_css .='}';
        }else if($online_pharmacy_theme_lay == '0.4'){
            $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
                $online_pharmacy_tp_theme_css .='opacity:0.4';
            $online_pharmacy_tp_theme_css .='}';
        }else if($online_pharmacy_theme_lay == '0.5'){
            $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
                $online_pharmacy_tp_theme_css .='opacity:0.5';
            $online_pharmacy_tp_theme_css .='}';
        }else if($online_pharmacy_theme_lay == '0.6'){
            $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
                $online_pharmacy_tp_theme_css .='opacity:0.6';
            $online_pharmacy_tp_theme_css .='}';
        }else if($online_pharmacy_theme_lay == '0.7'){
            $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
                $online_pharmacy_tp_theme_css .='opacity:0.7';
            $online_pharmacy_tp_theme_css .='}';
        }else if($online_pharmacy_theme_lay == '0.8'){
            $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
                $online_pharmacy_tp_theme_css .='opacity:0.8';
            $online_pharmacy_tp_theme_css .='}';
        }else if($online_pharmacy_theme_lay == '0.9'){
            $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
                $online_pharmacy_tp_theme_css .='opacity:0.9';
            $online_pharmacy_tp_theme_css .='}';
        }else if($online_pharmacy_theme_lay == '1'){
            $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
                $online_pharmacy_tp_theme_css .='opacity:1';
            $online_pharmacy_tp_theme_css .='}';
        }

    $online_pharmacy_header_banner_image_overlay = get_theme_mod('online_pharmacy_header_banner_image_overlay', true);
    if($online_pharmacy_header_banner_image_overlay == false){
        $online_pharmacy_tp_theme_css .='.single-page-img, .featured-image{';
            $online_pharmacy_tp_theme_css .='opacity:1;';
        $online_pharmacy_tp_theme_css .='}';
    }

    $online_pharmacy_header_banner_image_ooverlay_color = get_theme_mod('online_pharmacy_header_banner_image_ooverlay_color', true);
    if($online_pharmacy_header_banner_image_ooverlay_color != false){
        $online_pharmacy_tp_theme_css .='.box-image-page{';
            $online_pharmacy_tp_theme_css .='background-color: '.esc_attr($online_pharmacy_header_banner_image_ooverlay_color).';';
        $online_pharmacy_tp_theme_css .='}';
    }


    //First Cap ( Blog Post )
    $online_pharmacy_show_first_caps = get_theme_mod('online_pharmacy_show_first_caps', 'false');
    if($online_pharmacy_show_first_caps == 'true' ){
    $online_pharmacy_tp_theme_css .='.blog .page-box p:nth-of-type(1)::first-letter{';
    $online_pharmacy_tp_theme_css .=' font-size: 55px; font-weight: 600;';
    $online_pharmacy_tp_theme_css .=' margin-right: 6px;';
    $online_pharmacy_tp_theme_css .=' line-height: 1;';
    $online_pharmacy_tp_theme_css .='}';
    }elseif($online_pharmacy_show_first_caps == 'false' ){
    $online_pharmacy_tp_theme_css .='.blog .page-box p:nth-of-type(1)::first-letter {';
    $online_pharmacy_tp_theme_css .='display: none;';
    $online_pharmacy_tp_theme_css .='}';
    }

    // Menu hover effect
    $online_pharmacy_menus_item = get_theme_mod( 'online_pharmacy_menus_item_style','None');
    if($online_pharmacy_menus_item == 'None'){
        $online_pharmacy_tp_theme_css .='.main-navigation a:hover{';
            $online_pharmacy_tp_theme_css .='';
        $online_pharmacy_tp_theme_css .='}';
    }else if($online_pharmacy_menus_item == 'Zoom In'){
        $online_pharmacy_tp_theme_css .='.main-navigation a:hover{';
            $online_pharmacy_tp_theme_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
        $online_pharmacy_tp_theme_css .='}';
    }

    
// footer widget letter case
$online_pharmacy_footer_widget_title_text_tranform = get_theme_mod( 'online_pharmacy_footer_widget_title_text_tranform','');
if($online_pharmacy_footer_widget_title_text_tranform == 'Uppercase'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='text-transform: uppercase;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_widget_title_text_tranform == 'Lowercase'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='text-transform: lowercase;';
$online_pharmacy_tp_theme_css .='}';
}
else if($online_pharmacy_footer_widget_title_text_tranform == 'Capitalize'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='text-transform: capitalize;';
$online_pharmacy_tp_theme_css .='}';
}

//Footer Font Weight
$online_pharmacy_footer_widget_title_font_weight = get_theme_mod( 'online_pharmacy_footer_widget_title_font_weight','');
if($online_pharmacy_footer_widget_title_font_weight == '100'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='font-weight: 100;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_widget_title_font_weight == '200'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='font-weight: 200;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_widget_title_font_weight == '300'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='font-weight: 300;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_widget_title_font_weight == '400'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='font-weight: 400;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_widget_title_font_weight == '500'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='font-weight: 500;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_widget_title_font_weight == '600'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='font-weight: 600;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_widget_title_font_weight == '700'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='font-weight: 700;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_widget_title_font_weight == '800'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='font-weight: 800;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_widget_title_font_weight == '900'){
$online_pharmacy_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $online_pharmacy_tp_theme_css .='font-weight: 900;';
$online_pharmacy_tp_theme_css .='}';
}

// footer widget position
$online_pharmacy_footer_widget_title_position = get_theme_mod( 'online_pharmacy_footer_widget_title_position','');
if($online_pharmacy_footer_widget_title_position == 'Right'){
$online_pharmacy_tp_theme_css .='#footer aside.widget{';
$online_pharmacy_tp_theme_css .='text-align: right;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_widget_title_position == 'Left'){
$online_pharmacy_tp_theme_css .='#footer aside.widget{';
$online_pharmacy_tp_theme_css .='text-align: left;';
$online_pharmacy_tp_theme_css .='}';
}else if($online_pharmacy_footer_widget_title_position == 'Center'){
$online_pharmacy_tp_theme_css .='#footer aside.widget{';
$online_pharmacy_tp_theme_css .='text-align: center;';
$online_pharmacy_tp_theme_css .='}';
}

// Slider animation
$online_pharmacy_slider_sec_animation = get_theme_mod( 'online_pharmacy_slider_sec_animation', true );
if ( $online_pharmacy_slider_sec_animation ) {
    $online_pharmacy_tp_theme_css .= '#slider { animation: bounceInDown 3s; animation-fill-mode: both; }';
}

// About Section ANimation
$online_pharmacy_about_sec_animation = get_theme_mod( 'online_pharmacy_about_sec_animation', true );
if ( $online_pharmacy_about_sec_animation ) {
    $online_pharmacy_tp_theme_css .= '#product { animation: bounceInDown 3s; animation-fill-mode: both; }';
}

// footer Section ANimation
$online_pharmacy_footer_animation = get_theme_mod( 'online_pharmacy_footer_animation', true );
if ( $online_pharmacy_footer_animation ) {
    $online_pharmacy_tp_theme_css .= '#footer { animation: bounceInDown 3s; animation-fill-mode: both; }';
}

// Output the complete CSS
if ( ! empty( $online_pharmacy_tp_theme_css ) ) {
    echo '<style id="online-pharmacy-dynamic-css">' . $online_pharmacy_tp_theme_css . '</style>';
}
?>