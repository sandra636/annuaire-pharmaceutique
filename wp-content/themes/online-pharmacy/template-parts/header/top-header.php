<?php 
/*
* Display Logo and contact details
*/
?>

<div class="top-header py-2">
  <div class="container">
    <div class="row">
      <div class="contact-info col-xl-8 col-lg-6 col-md-6 align-self-center">
        <?php if( get_theme_mod( 'online_pharmacy_phone_number' ) != '') { ?>
          <span><a href="tel:<?php echo esc_html( get_theme_mod('online_pharmacy_phone_number','') ); ?>"><i class="<?php echo esc_attr(get_theme_mod('online_pharmacy_phone_icon','fas fa-phone')); ?> me-2"></i><?php echo esc_html( get_theme_mod('online_pharmacy_phone_number','')); ?></a></span>
        <?php } ?>
        <?php if( get_theme_mod( 'online_pharmacy_email_address' ) != '') { ?>
          <span class="ms-3"><a href="mailto:<?php echo esc_html( get_theme_mod('online_pharmacy_email_address','') ); ?>"><i class="<?php echo esc_attr(get_theme_mod('online_pharmacy_mail_icon','fas fa-envelope')); ?> me-2"></i><?php echo esc_html( get_theme_mod('online_pharmacy_email_address','')); ?></a></span>
        <?php } ?>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-4 align-self-center">
        <div class="media-links text-md-end">
           <?php                  
            $online_pharmacy_header_fb_new_tab = esc_attr(get_theme_mod('online_pharmacy_header_fb_new_tab','true'));
            $online_pharmacy_header_twt_new_tab = esc_attr(get_theme_mod('online_pharmacy_header_twt_new_tab','true'));
            $online_pharmacy_header_ins_new_tab = esc_attr(get_theme_mod('online_pharmacy_header_ins_new_tab','true'));
            $online_pharmacy_header_ut_new_tab = esc_attr(get_theme_mod('online_pharmacy_header_ut_new_tab','true'));
            $online_pharmacy_header_pint_new_tab = esc_attr(get_theme_mod('online_pharmacy_header_pint_new_tab','true'));
            ?>
          <?php if( get_theme_mod( 'online_pharmacy_facebook_url' ) != '' || get_theme_mod( 'online_pharmacy_twitter_url' ) != '' || get_theme_mod( 'online_pharmacy_instagram_url' ) != '' || get_theme_mod( 'online_pharmacy_youtube_url' ) != '' || get_theme_mod( 'online_pharmacy_pint_url' ) != '') { ?>
            <?php if( get_theme_mod( 'online_pharmacy_facebook_url' ) != '') { ?>
              <a <?php if($online_pharmacy_header_fb_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'online_pharmacy_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('online_pharmacy_facebook_icon','fab fa-facebook-f')); ?> me-3"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'online_pharmacy_twitter_url' ) != '') { ?>
              <a <?php if($online_pharmacy_header_twt_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'online_pharmacy_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('online_pharmacy_twitter_icon','fab fa-twitter')); ?> me-3"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'online_pharmacy_instagram_url' ) != '') { ?>
              <a <?php if($online_pharmacy_header_ins_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'online_pharmacy_instagram_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('online_pharmacy_instagram_icon','fab fa-instagram')); ?> me-3"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'online_pharmacy_youtube_url' ) != '') { ?>
              <a <?php if($online_pharmacy_header_ut_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'online_pharmacy_youtube_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('online_pharmacy_youtube_icon','fab fa-youtube')); ?> me-3"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'online_pharmacy_pint_url' ) != '') { ?>
              <a <?php if($online_pharmacy_header_pint_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'online_pharmacy_pint_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('online_pharmacy_pinterest_icon','fab fa-pinterest')); ?> me-3"></i></a>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
      <div class="header-icon col-xl-1 col-lg-3 col-md-2 align-self-center">
          <?php if( get_theme_mod( 'online_pharmacy_my_account_link' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod('online_pharmacy_my_account_link','')); ?>"><i class="far fa-user"></i></a>
          <?php } ?>
          <?php if (class_exists('woocommerce')) : ?>
            <?php if (get_theme_mod('crockery_store_like_option') != '') : ?>
                <span class="mb-0 ps-3">
                    <a href="<?php echo esc_url(get_theme_mod('crockery_store_like_option')); ?>" aria-label="<?php esc_attr_e('Wishlist', 'online-pharmacy'); ?>">
                        <i class="far fa-heart me-1"></i>
                    </a>
                </span>
            <?php endif; ?>
            <?php if (class_exists('YITH_WCWL')) : ?>
                <span class="mb-0 ps-3">
                    <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" aria-label="<?php esc_attr_e('Wishlist', 'online-pharmacy'); ?>">
                        <i class="far fa-heart me-1"></i>
                    </a>
                </span>
            <?php endif; ?>
          <?php endif; ?>
        <?php if( get_theme_mod( 'online_online_pharmacyping_bag',true) != ''){ ?>
        <?php if(class_exists('woocommerce')){ ?>
          <span class="cart_no infotext ps-3">
            <?php global $woocommerce; ?>
            <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','online-pharmacy' ); ?>"><i class="fas fa-shopping-bag"></i><span class="cart-value simplep"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count()));?></span></a>
          </span>
        <?php }?>
      </div>
        <?php }?>
    </div>
  </div>
</div>