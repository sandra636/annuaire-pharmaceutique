<?php

function health_care_hospital_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'online_pharmacy_footer_widget_image' );
    $wp_customize->remove_control( 'online_pharmacy_footer_widget_image' );
    $wp_customize->remove_setting( 'online_pharmacy_slider_content_layout' );
    $wp_customize->remove_control( 'online_pharmacy_slider_content_layout' );

    $wp_customize->remove_setting( 'online_pharmacy_tp_color_sec' );
    $wp_customize->remove_control( 'online_pharmacy_tp_color_sec' );
    
}
add_action( 'customize_register', 'health_care_hospital_remove_customize_register', 11 );

if ( ! defined( 'HEALTH_CARE_HOSPITAL_TEXT' ) ) {
    define( 'HEALTH_CARE_HOSPITAL_TEXT', __( 'Health Care Hospital Pro','health-care-hospital' ));
}
if ( ! defined( 'HEALTH_CARE_HOSPITAL_BUY_TEXT' ) ) {
    define( 'HEALTH_CARE_HOSPITAL_BUY_TEXT', __( 'Upgrade Pro','health-care-hospital' ));
}

add_action( 'customize_register', function( $manager ) {

// Load custom sections.
load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

    $manager->register_section_type( online_pharmacy_Button::class );

    $manager->add_section(
        new online_pharmacy_Button( $manager, 'online_pharmacy_pro', [
            'title'       => esc_html( HEALTH_CARE_HOSPITAL_TEXT,'health-care-hospital' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'health-care-hospital' ),
            'button_url'  => esc_url( ONLINE_PHARMACY_PRO_THEME_URL )
        ] )
    );

} );

function health_care_hospital_customize_register( $wp_customize ) {

    // Pro Version
    class Health_Care_Hospital_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>Unlock Premium <strong>'. esc_html( $this->label ) .'</strong>? </span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( HEALTH_CARE_HOSPITAL_BUY_TEXT,'health-care-hospital' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function health_care_hospital_sanitize_custom_control( $input ) {
        return $input;
    }

    // Register the custom control type.
    $wp_customize->register_control_type( 'Health_Care_Hospital_Toggle_Control' );

    $wp_customize->add_setting('health_care_hospital_slider_content_layout',array(
        'default' => 'RIGHT-ALIGN',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
    ));
    $wp_customize->add_control('health_care_hospital_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'health-care-hospital'),
        'section' => 'online_pharmacy_slider_section',
        'choices' => array(
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','health-care-hospital'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','health-care-hospital'),
            'LEFT-ALIGN' => __('LEFT-ALIGN','health-care-hospital'),
            
        ),
    ) );

    //Slider height
    $wp_customize->add_setting('health_care_hospital_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_slider_img_height',array(
        'label' => __('Slider Height','health-care-hospital'),
        'description'   => __('Add slider height in px(eg. 700px).','health-care-hospital'),
        'section'=> 'online_pharmacy_slider_section',
        'type'=> 'text'
    ));

    //Slider height
    $wp_customize->add_setting('health_care_hospital_slider_img_height_responsive',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_slider_img_height_responsive',array(
        'label' => __('Slider Height','health-care-hospital'),
        'description'   => __('Add slider height in px(eg. 700px).','health-care-hospital'),
        'section'=> 'online_pharmacy_mobile_media_option',
        'type'=> 'text'
    ));

    // About Product
    $wp_customize->add_section('health_care_hospital_about_section',array(
        'title' => __('About Product Settings','health-care-hospital'),
        'priority'  => 17,
        'panel' => 'online_pharmacy_panel_id'
    ));

    $wp_customize->add_setting( 'health_care_hospital_about_section_show_hide', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new Health_Care_Hospital_Toggle_Control( $wp_customize, 'health_care_hospital_about_section_show_hide', array(
        'label'       => esc_html__( 'Show / Hide section', 'health-care-hospital' ),
        'section'     => 'health_care_hospital_about_section',
        'type'        => 'toggle',
        'settings'    => 'health_care_hospital_about_section_show_hide',
    ) ) );

    $wp_customize->add_setting( 'online_pharmacy_child_sec_animation', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new online_pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_child_sec_animation', array(
        'label'       => esc_html__( 'Show / Hide About Section Animation', 'online-pharmacy' ),
        'section'     => 'health_care_hospital_about_section',
        'type'        => 'toggle',
        'settings'    => 'online_pharmacy_child_sec_animation',
    ) ) );

    $wp_customize->add_setting('health_care_hospital_about_title',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_about_title',array(
        'label' => __('Title','health-care-hospital'),
        'section'=> 'health_care_hospital_about_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('health_care_hospital_about_sub_title',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_about_sub_title',array(
        'label' => __('Sub Title','health-care-hospital'),
        'section'=> 'health_care_hospital_about_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('health_care_hospital_about_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_about_text',array(
        'label' => __('Text','health-care-hospital'),
        'section'=> 'health_care_hospital_about_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('health_care_hospital_about_btn_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_about_btn_text',array(
        'label' => __('Button Text','health-care-hospital'),
        'section'=> 'health_care_hospital_about_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('health_care_hospital_about_btn_url',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_about_btn_url',array(
        'label' => __('Button URL','health-care-hospital'),
        'section'=> 'health_care_hospital_about_section',
        'type'=> 'text'
    ));

    $online_pharmacy_args = array(
        'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories($online_pharmacy_args);
    $cat_posts = array();
    $m = 0;
    $cat_posts[]='Select';
    foreach($categories as $category){
    if($m==0){
        $default = $category->slug;
            $m++;
        }
        $cat_posts[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('health_care_hospital_best_product_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'health_care_hospital_sanitize_select',
    ));
    $wp_customize->add_control('health_care_hospital_best_product_category',array(
        'type'    => 'select',
        'choices' => $cat_posts,
        'label' => __('Select category to display products ','health-care-hospital'),
        'section' => 'health_care_hospital_about_section',
    ));

    // Pro Version
    $wp_customize->add_setting( 'health_care_hospital_products_pro_version_logo', array(
        'sanitize_callback' => 'health_care_hospital_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Health_Care_Hospital_Customize_Pro_Version ( $wp_customize,'health_care_hospital_products_pro_version_logo', array(
        'section'     => 'health_care_hospital_about_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'health-care-hospital' ),
        'description' => esc_url( ONLINE_PHARMACY_PRO_THEME_URL ),
        'priority'    => 10,
    )));
}
add_action( 'customize_register', 'health_care_hospital_customize_register' );
