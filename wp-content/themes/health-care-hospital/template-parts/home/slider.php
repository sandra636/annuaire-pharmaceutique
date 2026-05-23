<?php
/**
 * Template part for displaying slider section
 *
 * @package Health Care Hospital
 * @subpackage health_care_hospital
 */

?>
<?php $health_care_hospital_static_image= get_stylesheet_directory_uri() . '/assets/images/slider.png'; ?>
<?php if( get_theme_mod( 'online_pharmacy_slider_arrows', true) != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $online_pharmacy_slide_pages = array();
      for ( $online_pharmacy_count = 1; $online_pharmacy_count <= 4; $online_pharmacy_count++ ) {
        $online_pharmacy_mod = intval( get_theme_mod( 'online_pharmacy_slider_page' . $online_pharmacy_count ));
        if ( 'page-none-selected' != $online_pharmacy_mod ) {
          $online_pharmacy_slide_pages[] = $online_pharmacy_mod;
        }
      }
      if( !empty($online_pharmacy_slide_pages) ) :
        $online_pharmacy_args = array(
          'post_type' => 'page',
          'post__in' => $online_pharmacy_slide_pages,
          'orderby' => 'post__in'
        );
        $online_pharmacy_query = new WP_Query( $online_pharmacy_args );
        if ( $online_pharmacy_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $online_pharmacy_query->have_posts() ) : $online_pharmacy_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <?php }else {echo ('<img src="'.$health_care_hospital_static_image.'">'); } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <?php if (get_theme_mod('online_pharmacy_show_slider_title', true)) : ?>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <?php endif; ?>
              <?php if (get_theme_mod('online_pharmacy_show_slider_content', true)) : ?>
                <p><?php $online_pharmacy_excerpt = get_the_excerpt(); echo esc_html( online_pharmacy_string_limit_words( $online_pharmacy_excerpt, esc_attr(get_theme_mod('online_pharmacy_slider_excerpt_length','20')))); ?></p>
              <?php endif; ?>
              <div class="more-btn call-info mt-4">
                <?php if( get_theme_mod( 'online_pharmacy_phone_number' ) != '') { ?>
                  <span><a href="tel:<?php echo esc_html( get_theme_mod('online_pharmacy_phone_number','') ); ?>"><i class="<?php echo esc_attr(get_theme_mod('online_pharmacy_phone_icon','fas fa-phone')); ?> me-3"></i><?php echo esc_html( get_theme_mod('online_pharmacy_phone_number','')); ?></a></span>
                <?php } ?>
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('SHOP NOW','health-care-hospital'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
      <span class="screen-reader-text"><?php esc_html_e('Previous','health-care-hospital'); ?></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
      <span class="screen-reader-text"><?php esc_html_e('Next','health-care-hospital'); ?></span>
    </a> 
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
