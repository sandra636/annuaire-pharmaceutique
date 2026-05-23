<?php
/**
 * Online Pharmacy: Customizer
 *
 * @package Online Pharmacy
 * @subpackage online_pharmacy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function online_pharmacy_customize_register( $wp_customize ) {

	// Pro Version
    class online_pharmacy_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>Unlock Premium <strong>'. esc_html( $this->label ) .'</strong>? </span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( ONLINE_PHARMACY_BUY_TEXT,'online-pharmacy' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function online_pharmacy_sanitize_custom_control( $input ) {
        return $input;
    }

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Online_Pharmacy_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Online_Pharmacy_Control_Sortable' );

	//add home page setting pannel
	$wp_customize->add_panel( 'online_pharmacy_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'online-pharmacy'),
	    'description' => __( 'Description of what this panel does.', 'online-pharmacy'),
	) );

	$wp_customize->add_section('online_pharmacy_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'online-pharmacy'),
		'description' => __('Control will not function if the toggle in the main settings is off.', 'online-pharmacy'),
		'priority' => 22,
		'panel' => 'online_pharmacy_panel_id'
	) );

	$wp_customize->add_setting( 'online_pharmacy_mobile_blog_description', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new online_pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_mobile_blog_description', array(
		'label'       => esc_html__( 'Show / Hide Blog Page Description', 'online-pharmacy' ),
		'section'     => 'online_pharmacy_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_mobile_blog_description',
	) ) );

	$wp_customize->add_setting( 'online_pharmacy_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'online-pharmacy'),
		'section'     => 'online_pharmacy_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_return_to_header_mob',
	) ) );

	$wp_customize->add_setting( 'online_pharmacy_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'online-pharmacy'),
		'section'     => 'online_pharmacy_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_slider_buttom_mob',
	) ) );
	$wp_customize->add_setting( 'online_pharmacy_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'online-pharmacy' ),
		'section'     => 'online_pharmacy_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_related_post_mob',
	) ) );

	// Pro Version
    $wp_customize->add_setting( 'online_pharmacy_responsive_pro_version_logo', array(
        'sanitize_callback' => 'online_pharmacy_sanitize_custom_control'
    ));
    $wp_customize->add_control( new online_pharmacy_Customize_Pro_Version ( $wp_customize,'online_pharmacy_responsive_pro_version_logo', array(
        'section'     => 'online_pharmacy_mobile_media_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'online-pharmacy' ),
        'description' => esc_url( ONLINE_PHARMACY_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//Sidebar Position
	$wp_customize->add_section('online_pharmacy_tp_general_settings',array(
        'title' => __('TP General Option', 'online-pharmacy'),
        'priority' => 2,
        'panel' => 'online_pharmacy_panel_id'
    ) );

 	$wp_customize->add_setting('online_pharmacy_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
 	$wp_customize->add_control('online_pharmacy_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'online-pharmacy'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'online-pharmacy'),
		'section' => 'online_pharmacy_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','online-pharmacy'),
		'Container' => __('Container','online-pharmacy'),
		'Container Fluid' => __('Container Fluid','online-pharmacy')
		),
	) );

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('online_pharmacy_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Post Sidebar Position', 'online-pharmacy'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'online-pharmacy'),
     'section' => 'online_pharmacy_tp_general_settings',
     'choices' => array(
         'full' => __('Full','online-pharmacy'),
         'left' => __('Left','online-pharmacy'),
         'right' => __('Right','online-pharmacy'),
         'three-column' => __('Three Columns','online-pharmacy'),
         'four-column' => __('Four Columns','online-pharmacy'),
         'grid' => __('Grid Layout','online-pharmacy')
     ),
	) );
	// Add Settings and Controls for Post sidebar Layout
	$wp_customize->add_setting('online_pharmacy_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'online-pharmacy'),
        'description'   => __('This option work for single blog page', 'online-pharmacy'),
        'section' => 'online_pharmacy_tp_general_settings',
        'choices' => array(
            'full' => __('Full','online-pharmacy'),
            'left' => __('Left','online-pharmacy'),
            'right' => __('Right','online-pharmacy'),
        ),
	) );
	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('online_pharmacy_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'online-pharmacy'),
     'description'   => __('This option work for pages.', 'online-pharmacy'),
     'section' => 'online_pharmacy_tp_general_settings',
     'choices' => array(
         'full' => __('Full','online-pharmacy'),
         'left' => __('Left','online-pharmacy'),
         'right' => __('Right','online-pharmacy')
     ),
	) );	
	$wp_customize->add_setting( 'online_pharmacy_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Header', 'online-pharmacy'),
		'section'     => 'online_pharmacy_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_sticky',
	) ) );

	//tp typography option
	$online_pharmacy_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('online_pharmacy_typography_option',array(
		'title'         => __('TP Typography Option', 'online-pharmacy'),
		'priority' => 2,
		'panel' => 'online_pharmacy_panel_id'
   	));

   	$wp_customize->add_setting('online_pharmacy_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'online_pharmacy_sanitize_choices',
	));
	$wp_customize->add_control(	'online_pharmacy_heading_font_family', array(
		'section' => 'online_pharmacy_typography_option',
		'label'   => __('heading Fonts', 'online-pharmacy'),
		'type'    => 'select',
		'choices' => $online_pharmacy_font_array,
	));

	$wp_customize->add_setting('online_pharmacy_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'online_pharmacy_sanitize_choices',
	));
	$wp_customize->add_control(	'online_pharmacy_body_font_family', array(
		'section' => 'online_pharmacy_typography_option',
		'label'   => __('Body Fonts', 'online-pharmacy'),
		'type'    => 'select',
		'choices' => $online_pharmacy_font_array,
	));

	//MENU TYPOGRAPHY
	$wp_customize->add_section( 'online_pharmacy_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'online-pharmacy'),
    	'priority' => 10,
		'panel' => 'online_pharmacy_panel_id'
	) );

	$wp_customize->add_setting('online_pharmacy_menu_font_weight',array(
        'default' => '600',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_menu_font_weight',array(
     'type' => 'radio',
     'label'     => __('Font Weight', 'online-pharmacy'),
     'section' => 'online_pharmacy_menu_typography',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','online-pharmacy'),
         '200' => __('200','online-pharmacy'),
         '300' => __('300','online-pharmacy'),
         '400' => __('400','online-pharmacy'),
         '500' => __('500','online-pharmacy'),
         '600' => __('600','online-pharmacy'),
         '700' => __('700','online-pharmacy'),
         '800' => __('800','online-pharmacy'),
         '900' => __('900','online-pharmacy')
     ),
	) );

	$wp_customize->add_setting('online_pharmacy_menu_text_tranform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'online_pharmacy_sanitize_choices'
 	));
 	$wp_customize->add_control('online_pharmacy_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','online-pharmacy'),
		'section' => 'online_pharmacy_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','online-pharmacy'),
		   'Lowercase' => __('Lowercase','online-pharmacy'),
		   'Capitalize' => __('Capitalize','online-pharmacy'),
		),
	) );

	$wp_customize->add_setting('online_pharmacy_menu_font_size', array(
	'default' => '',
    'sanitize_callback' => 'online_pharmacy_sanitize_number_range',
	));
	$wp_customize->add_control(new Online_Pharmacy_Range_Slider($wp_customize, 'online_pharmacy_menu_font_size', array(
    'section' => 'online_pharmacy_menu_typography',
    'label' => esc_html__('Font Size', 'online-pharmacy'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 50,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('online_pharmacy_menus_item_style',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_menus_item_style',array(
		'type' => 'select',
		'section' => 'online_pharmacy_menu_typography',
		'label' => __('Menu Hover Effect','online-pharmacy'),
		'choices' => array(
			'None' => __('None','online-pharmacy'),
			'Zoom In' => __('Zoom In','online-pharmacy'),
		),
	) );

	$wp_customize->add_setting( 'online_pharmacy_menu_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_menu_color', array(
			'label'     => __('Change Menu Color', 'online-pharmacy'),
	    'section' => 'online_pharmacy_menu_typography',
	    'settings' => 'online_pharmacy_menu_color',
  	)));

  	// Pro Version
    $wp_customize->add_setting( 'online_pharmacy_menu_pro_version_logo', array(
        'sanitize_callback' => 'online_pharmacy_sanitize_custom_control'
    ));
    $wp_customize->add_control( new online_pharmacy_Customize_Pro_Version ( $wp_customize,'online_pharmacy_menu_pro_version_logo', array(
        'section'     => 'online_pharmacy_menu_typography',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'online-pharmacy' ),
        'description' => esc_url( ONLINE_PHARMACY_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//TP Blog Option
	$wp_customize->add_section('online_pharmacy_blog_option',array(
		'title' => __('TP Blog Option', 'online-pharmacy'),
		'priority' => 8,
		'panel' => 'online_pharmacy_panel_id'
	) );

	$wp_customize->add_setting('online_pharmacy_edit_blog_page_title',array(
		'default'=>  __('Home','online-pharmacy'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_pharmacy_edit_blog_page_title',array(
		'label'	=> __('Change Blog Page Title','online-pharmacy'),
		'section'=> 'online_pharmacy_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('online_pharmacy_edit_blog_page_description',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_pharmacy_edit_blog_page_description',array(
		'label'	=> __('Add Blog Page Description','online-pharmacy'),
		'section'=> 'online_pharmacy_blog_option',
		'type'=> 'text'
	));

	/** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category', 'time'),
        'sanitize_callback' => 'online_pharmacy_sanitize_sortable',
    ));
    $wp_customize->add_control(new Online_Pharmacy_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'online-pharmacy'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'online-pharmacy') ,
        'section' => 'online_pharmacy_blog_option',
        'choices' => array(
            'date' => __('date', 'online-pharmacy') ,
            'author' => __('author', 'online-pharmacy') ,
            'comment' => __('comment', 'online-pharmacy') ,
            'category' => __('category', 'online-pharmacy') ,
            'time' => __('time', 'online-pharmacy') ,
        ) ,
    )));
    $wp_customize->add_setting( 'online_pharmacy_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'online_pharmacy_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'online_pharmacy_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','online-pharmacy'),
		'section'     => 'online_pharmacy_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('online_pharmacy_show_first_caps',array(
        'default' => false,
        'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
    ));
	$wp_customize->add_control( 'online_pharmacy_show_first_caps',array(
		'label' => esc_html__('First Cap (First Capital Letter)', 'online-pharmacy'),
		'type' => 'checkbox',
		'section' => 'online_pharmacy_blog_option',
	));

	$wp_customize->add_setting('online_pharmacy_read_more_text',array(
		'default'=> __('Read More','online-pharmacy'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_pharmacy_read_more_text',array(
		'label'	=> __('Edit Button Text','online-pharmacy'),
		'section'=> 'online_pharmacy_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('online_pharmacy_post_image_round', array(
	  'default' => '0',
      'sanitize_callback' => 'online_pharmacy_sanitize_number_range',
	));
	$wp_customize->add_control(new online_pharmacy_Range_Slider($wp_customize, 'online_pharmacy_post_image_round', array(
       'section' => 'online_pharmacy_blog_option',
      'label' => esc_html__('Edit Post Image Border Radius', 'online-pharmacy'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 180,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('online_pharmacy_post_image_width', array(
	  'default' => '',
      'sanitize_callback' => 'online_pharmacy_sanitize_number_range',
	));
	$wp_customize->add_control(new online_pharmacy_Range_Slider($wp_customize, 'online_pharmacy_post_image_width', array(
       'section' => 'online_pharmacy_blog_option',
      'label' => esc_html__('Edit Post Image Width', 'online-pharmacy'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 367,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('online_pharmacy_post_image_length', array(
	  'default' => '',
      'sanitize_callback' => 'online_pharmacy_sanitize_number_range',
	));
	$wp_customize->add_control(new online_pharmacy_Range_Slider($wp_customize, 'online_pharmacy_post_image_length', array(
       'section' => 'online_pharmacy_blog_option',
      'label' => esc_html__('Edit Post Image height', 'online-pharmacy'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 900,
        'step' => 1
    )
	)));
	
	$wp_customize->add_setting( 'online_pharmacy_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'online-pharmacy'),
		'section'     => 'online_pharmacy_blog_option',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_remove_read_button',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'online_pharmacy_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'online_pharmacy_customize_partial_online_pharmacy_remove_read_button',
	 ));
     $wp_customize->add_setting( 'online_pharmacy_remove_tags', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
 	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_remove_tags', array(
		 'label'       => esc_html__( 'Show / Hide Tags Option', 'online-pharmacy'),
		 'section'     => 'online_pharmacy_blog_option',
		 'type'        => 'toggle',
		 'settings'    => 'online_pharmacy_remove_tags',
	) ) );
	$wp_customize->selective_refresh->add_partial( 'online_pharmacy_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'online_pharmacy_customize_partial_online_pharmacy_remove_tags',
	));
	$wp_customize->add_setting( 'online_pharmacy_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'online-pharmacy' ),
		'section'     => 'online_pharmacy_blog_option',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'online_pharmacy_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'online_pharmacy_customize_partial_online_pharmacy_remove_category',
	));
	$wp_customize->add_setting( 'online_pharmacy_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'online-pharmacy' ),
	 'section'     => 'online_pharmacy_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'online_pharmacy_remove_comment',
	) ) );

	$wp_customize->add_setting( 'online_pharmacy_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'online-pharmacy' ),
	 'section'     => 'online_pharmacy_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'online_pharmacy_remove_related_post',
	) ) );

	$wp_customize->add_setting('online_pharmacy_related_post_heading',array(
		'default'=> __('Related Posts','online-pharmacy'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_pharmacy_related_post_heading',array(
		'label'	=> __('Related Posts Title','online-pharmacy'),
		'section'=> 'online_pharmacy_blog_option',
		'type'=> 'text'
	));
	
	$wp_customize->add_setting( 'online_pharmacy_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'online_pharmacy_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'online_pharmacy_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','online-pharmacy' ),
		'section'     => 'online_pharmacy_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );

	$wp_customize->add_setting( 'online_pharmacy_related_post_per_columns', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'online_pharmacy_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'online_pharmacy_related_post_per_columns', array(
		'label'       => esc_html__( 'Related Post Per Row','online-pharmacy' ),
		'section'     => 'online_pharmacy_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	) );
	
	$wp_customize->add_setting('online_pharmacy_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'online-pharmacy'),
        'description' => __( 'Control Works only for full,left and right sidebar position in archieve posts', 'online-pharmacy' ),
        'section' => 'online_pharmacy_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','online-pharmacy'),
            'content-image' => __('Content-Media','online-pharmacy'),
        ),
	) );

	//TP Single Blog Option
	$wp_customize->add_section('online_pharmacy_single_blog_option',array(
        'title' => __('Single Post Option', 'online-pharmacy'),
        'priority' => 8,
        'panel' => 'online_pharmacy_panel_id'
    ) );

    /** Meta Order */
    $wp_customize->add_setting('online_pharmacy_single_blog_meta_order', array(
        'default' => array('date', 'author', 'comment','category', 'time'),
        'sanitize_callback' => 'online_pharmacy_sanitize_sortable',
    ));
    $wp_customize->add_control(new online_pharmacy_Control_Sortable($wp_customize, 'online_pharmacy_single_blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'online-pharmacy'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'online-pharmacy') ,
        'section' => 'online_pharmacy_single_blog_option',
        'choices' => array(
            'date' => __('date', 'online-pharmacy') ,
            'author' => __('author', 'online-pharmacy') ,
            'comment' => __('comment', 'online-pharmacy') ,
            'category' => __('category', 'online-pharmacy') ,
            'time' => __('time', 'online-pharmacy') ,
        ) ,
    )));

    $wp_customize->add_setting('online_pharmacy_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
       $wp_customize,'online_pharmacy_single_post_date_icon',array(
		'label'	=> __('Change Date Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_single_blog_option',
		'type'		=> 'online-pharmacy-icon'
	)));

	$wp_customize->add_setting('online_pharmacy_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
       $wp_customize,'online_pharmacy_single_post_author_icon',array(
		'label'	=> __('Change Author Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_single_blog_option',
		'type'		=> 'online-pharmacy-icon'
	)));

	$wp_customize->add_setting('online_pharmacy_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
       $wp_customize,'online_pharmacy_single_post_comment_icon',array(
		'label'	=> __('Change Comment Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_single_blog_option',
		'type'		=> 'online-pharmacy-icon'
	)));

	$wp_customize->add_setting('online_pharmacy_single_post_category_icon',array(
		'default'	=> 'fas fa-list',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
       $wp_customize,'online_pharmacy_single_post_category_icon',array(
		'label'	=> __('Change Category Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_single_blog_option',
		'type'		=> 'online-pharmacy-icon'
	)));

	$wp_customize->add_setting('online_pharmacy_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
       $wp_customize,'online_pharmacy_single_post_time_icon',array(
		'label'	=> __('Change Time Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_single_blog_option',
		'type'		=> 'online-pharmacy-icon'
	)));

	//TP Color Option
	$wp_customize->add_section('online_pharmacy_color_option',array(
     'title'         => __('TP Color Option', 'online-pharmacy'),
     'priority' => 2,
     'panel' => 'online_pharmacy_panel_id'
    ) );

	$wp_customize->add_setting( 'online_pharmacy_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_tp_color_option', array(
  		'label'     => __('Theme Color', 'online-pharmacy'),
	    'description' => __('It will change the complete theme color in one click.', 'online-pharmacy'),
	    'section' => 'online_pharmacy_color_option',
	    'settings' => 'online_pharmacy_tp_color_option',
  	)));

  	$wp_customize->add_setting( 'online_pharmacy_tp_color_sec', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_tp_color_sec', array(
  		'label'     => __('Theme Color', 'online-pharmacy'),
	    'description' => __('It will change the complete theme color in one click.', 'online-pharmacy'),
	    'section' => 'online_pharmacy_color_option',
	    'settings' => 'online_pharmacy_tp_color_sec',
  	)));

	//TP Preloader Option
	$wp_customize->add_section('online_pharmacy_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'online-pharmacy'),
		'priority' => 4,
		'panel' => 'online_pharmacy_panel_id'
	) );

	$wp_customize->add_setting( 'online_pharmacy_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'online-pharmacy'),
		'section'     => 'online_pharmacy_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_preloader_show_hide',
	) ) );

	$wp_customize->add_setting( 'online_pharmacy_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'online-pharmacy'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'online-pharmacy'),
	    'section' => 'online_pharmacy_prelaoder_option',
	    'settings' => 'online_pharmacy_tp_preloader_color1_option',
  	)));

  	$wp_customize->add_setting( 'online_pharmacy_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'online-pharmacy'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'online-pharmacy'),
	    'section' => 'online_pharmacy_prelaoder_option',
	    'settings' => 'online_pharmacy_tp_preloader_color2_option',
  	)));

  	$wp_customize->add_setting( 'online_pharmacy_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'online-pharmacy'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'online-pharmacy'),
	    'section' => 'online_pharmacy_prelaoder_option',
	    'settings' => 'online_pharmacy_tp_preloader_bg_color_option',
  	)));

	// Pro Version
    $wp_customize->add_setting( 'online_pharmacy_preloader_pro_version_logo', array(
        'sanitize_callback' => 'online_pharmacy_sanitize_custom_control'
    ));
    $wp_customize->add_control( new online_pharmacy_Customize_Pro_Version ( $wp_customize,'online_pharmacy_preloader_pro_version_logo', array(
        'section'     => 'online_pharmacy_prelaoder_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'online-pharmacy' ),
        'description' => esc_url( ONLINE_PHARMACY_PRO_THEME_URL ),
        'priority'    => 100
    )));

	// Top Bar
	$wp_customize->add_section( 'online_pharmacy_topbar', array(
    	'title'      => __( 'Contact Details', 'online-pharmacy'),
    	'priority' => 12,
    	'description' => __( 'Add your contact details', 'online-pharmacy'),
		'panel' => 'online_pharmacy_panel_id'
	) );

	$wp_customize->add_setting('online_pharmacy_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'online_pharmacy_sanitize_phone_number'
	));
	$wp_customize->add_control('online_pharmacy_phone_number',array(
		'label'	=> __('Add Phone Number','online-pharmacy'),
		'section'=> 'online_pharmacy_topbar',
		'type'=> 'text'
	));

	 $wp_customize->add_setting('online_pharmacy_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
        $wp_customize,'online_pharmacy_phone_icon',array(
		'label'	=> __('Phone Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->selective_refresh->add_partial( 'online_pharmacy_phone_number', array(
		'selector' => '.top-header span i',
		'render_callback' => 'online_pharmacy_customize_partial_online_pharmacy_phone_number',
	) );

	$wp_customize->add_setting('online_pharmacy_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_pharmacy_email_address',array(
		'label'	=> __('Add Email Address','online-pharmacy'),
		'section'=> 'online_pharmacy_topbar',
		'type'=> 'text'
	));

	 $wp_customize->add_setting('online_pharmacy_mail_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
        $wp_customize,'online_pharmacy_mail_icon',array(
		'label'	=> __('Mail Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('online_pharmacy_my_account_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('online_pharmacy_my_account_link',array(
		'label'	=> __('Add My Account Page Link','online-pharmacy'),
		'section'=> 'online_pharmacy_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('online_pharmacy_book_ticket_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_pharmacy_book_ticket_button',array(
		'label'	=> __('Add Header Button Text','online-pharmacy'),
		'section'=> 'online_pharmacy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('online_pharmacy_book_ticket_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('online_pharmacy_book_ticket_link',array(
		'label'	=> __('Add Header Page Link','online-pharmacy'),
		'section'=> 'online_pharmacy_topbar',
		'type'=> 'url'
	));

	 if(class_exists('woocommerce')){
		$wp_customize->add_setting( 'online_online_pharmacyping_bag', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_online_pharmacyping_bag', array(
			'label'       => esc_html__( ' show Shopping Bag', 'online-pharmacy'),
			'section'     => 'online_pharmacy_topbar',
			'type'        => 'toggle',
			'settings'    => 'online_online_pharmacyping_bag',
		) ) );
	}

	// Pro Version
    $wp_customize->add_setting( 'online_pharmacy_header_pro_version_logo', array(
        'sanitize_callback' => 'online_pharmacy_sanitize_custom_control'
    ));
    $wp_customize->add_control( new online_pharmacy_Customize_Pro_Version ( $wp_customize,'online_pharmacy_header_pro_version_logo', array(
        'section'     => 'online_pharmacy_topbar',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'online-pharmacy' ),
        'description' => esc_url( ONLINE_PHARMACY_PRO_THEME_URL ),
        'priority'    => 100
    )));

	// Social Media
	$wp_customize->add_section( 'online_pharmacy_social_media', array(
    	'title'      => __( 'Social Media Links', 'online-pharmacy'),
    	'priority' => 14,
    	'description' => __( 'Add your Social Links', 'online-pharmacy'),
		'panel' => 'online_pharmacy_panel_id'
	) );

	$wp_customize->add_setting( 'online_pharmacy_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'online-pharmacy'),
		'section'     => 'online_pharmacy_social_media',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_header_fb_new_tab',
	) ) );

	$wp_customize->add_setting('online_pharmacy_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('online_pharmacy_facebook_url',array(
		'label'	=> __('Facebook Link','online-pharmacy'),
		'section'=> 'online_pharmacy_social_media',
		'type'=> 'url'
	));
	 $wp_customize->add_setting('online_pharmacy_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
        $wp_customize,'online_pharmacy_facebook_icon',array(
		'label'	=> __('Facebook Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->selective_refresh->add_partial( 'online_pharmacy_facebook_url', array(
		'selector' => '.media-links a i',
		'render_callback' => 'online_pharmacy_customize_partial_online_pharmacy_facebook_url',
	) );

	$wp_customize->add_setting( 'online_pharmacy_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'online-pharmacy'),
		'section'     => 'online_pharmacy_social_media',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_header_twt_new_tab',
	) ) );

	$wp_customize->add_setting('online_pharmacy_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('online_pharmacy_twitter_url',array(
		'label'	=> __('Twitter Link','online-pharmacy'),
		'section'=> 'online_pharmacy_social_media',
		'type'=> 'url'
	));
	 $wp_customize->add_setting('online_pharmacy_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
        $wp_customize,'online_pharmacy_twitter_icon',array(
		'label'	=> __('Twitter Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'online_pharmacy_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'online-pharmacy'),
		'section'     => 'online_pharmacy_social_media',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_header_ins_new_tab',
	) ) );

	$wp_customize->add_setting('online_pharmacy_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('online_pharmacy_instagram_url',array(
		'label'	=> __('Instagram Link','online-pharmacy'),
		'section'=> 'online_pharmacy_social_media',
		'type'=> 'url'
	));

	 $wp_customize->add_setting('online_pharmacy_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
        $wp_customize,'online_pharmacy_instagram_icon',array(
		'label'	=> __('Instagram Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'online_pharmacy_header_ut_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_header_ut_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'online-pharmacy'),
		'section'     => 'online_pharmacy_social_media',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_header_ut_new_tab',
	) ) );

	$wp_customize->add_setting('online_pharmacy_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('online_pharmacy_youtube_url',array(
		'label'	=> __('YouTube Link','online-pharmacy'),
		'section'=> 'online_pharmacy_social_media',
		'type'=> 'url'
	));

	 $wp_customize->add_setting('online_pharmacy_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
        $wp_customize,'online_pharmacy_youtube_icon',array(
		'label'	=> __('YouTube Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'online_pharmacy_header_pint_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_header_pint_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'online-pharmacy'),
		'section'     => 'online_pharmacy_social_media',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_header_pint_new_tab',
	) ) );

	$wp_customize->add_setting('online_pharmacy_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('online_pharmacy_pint_url',array(
		'label'	=> __('Pinterest Link','online-pharmacy'),
		'section'=> 'online_pharmacy_social_media',
		'type'=> 'url'
	));

	 $wp_customize->add_setting('online_pharmacy_pinterest_icon',array(
		'default'	=> 'fab fa-pinterest',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
        $wp_customize,'online_pharmacy_pinterest_icon',array(
		'label'	=> __('Pinterest Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('online_pharmacy_social_icon_fontsize',array(
	'default'=> '14',
	'sanitize_callback'	=> 'online_pharmacy_sanitize_number_absint'
	));
	$wp_customize->add_control('online_pharmacy_social_icon_fontsize',array(
		'label'	=> __('Social Icons Font Size in PX','online-pharmacy'),
		'type'=> 'number',
		'section'=> 'online_pharmacy_social_media',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 100,
				),
	));

	// Pro Version
    $wp_customize->add_setting( 'online_pharmacy_social_media_pro_version_logo', array(
        'sanitize_callback' => 'online_pharmacy_sanitize_custom_control'
    ));
    $wp_customize->add_control( new online_pharmacy_Customize_Pro_Version ( $wp_customize,'online_pharmacy_social_media_pro_version_logo', array(
        'section'     => 'online_pharmacy_social_media',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'online-pharmacy' ),
        'description' => esc_url( ONLINE_PHARMACY_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//home page slider
	$wp_customize->add_section( 'online_pharmacy_slider_section' , array(
	    'title'      => __( 'Slider Section', 'online-pharmacy'),
	    'priority'   => 16,
	    'panel'      => 'online_pharmacy_panel_id'
	) );

	$wp_customize->add_setting( 'online_pharmacy_slider_arrows', array(
	    'default'           => true,
	    'transport'         => 'refresh',
	    'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_slider_arrows', array(
	    'label'       => esc_html__( 'Show / Hide Slider', 'online-pharmacy'),
	    'section'     => 'online_pharmacy_slider_section',
	    'type'        => 'toggle',
	    'settings'    => 'online_pharmacy_slider_arrows',
	) ) );

	$wp_customize->add_setting( 'online_pharmacy_slider_sec_animation', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new online_pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_slider_sec_animation', array(
		'label'       => esc_html__( 'Show / Hide Slider Section Animation', 'online-pharmacy' ),
		'section'     => 'online_pharmacy_slider_section',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_slider_sec_animation',
	) ) );

	$wp_customize->add_setting( 'online_pharmacy_show_slider_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new online_pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_show_slider_title', array(
		'label'       => esc_html__( 'Show / Hide Slider Heading', 'online-pharmacy' ),
		'section'     => 'online_pharmacy_slider_section',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_show_slider_title',
	) ) );

	$wp_customize->add_setting( 'online_pharmacy_show_slider_content', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new online_pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_show_slider_content', array(
		'label'       => esc_html__( 'Show / Hide Slider Content', 'online-pharmacy' ),
		'section'     => 'online_pharmacy_slider_section',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_show_slider_content',
	) ) );

	$wp_customize->selective_refresh->add_partial( 'online_pharmacy_slider_arrows', array(
	    'selector'        => '#slider .carousel-caption',
	    'render_callback' => 'online_pharmacy_customize_partial_online_pharmacy_slider_arrows',
	) );

	for ( $online_pharmacy_count = 1; $online_pharmacy_count <= 4; $online_pharmacy_count++ ) {
	    $wp_customize->add_setting( 'online_pharmacy_slider_page' . $online_pharmacy_count, array(
	        'default'           => '',
	        'sanitize_callback' => 'online_pharmacy_sanitize_dropdown_pages'
	    ) );

	    $wp_customize->add_control( 'online_pharmacy_slider_page' . $online_pharmacy_count, array(
	        'label'       => __( 'Select Slide Image Page', 'online-pharmacy'),
	        'description' => __('Image Size ( 1835 x 700 ) px','online-pharmacy'),
	        'section'     => 'online_pharmacy_slider_section',
	        'type'        => 'dropdown-pages'
	    ) );
	}

	$wp_customize->add_setting( 'online_pharmacy_slider_button', array(
	    'default'           => true,
	    'transport'         => 'refresh',
	    'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_slider_button', array(
	    'label'       => esc_html__( 'Show / Hide Slider Button', 'online-pharmacy'),
	    'section'     => 'online_pharmacy_slider_section',
	    'type'        => 'toggle',
	    'settings'    => 'online_pharmacy_slider_button',
	) ) );

	$wp_customize->add_setting(
	    'online_pharmacy_slider_call',
	    array(
	        'default'            => '',
	        'sanitize_callback'  => 'online_pharmacy_sanitize_phone_number'
	    )
	);

	$wp_customize->add_control(
	    'online_pharmacy_slider_call', array(
	        'label'       => __('Add Phone Number','online-pharmacy'),
	        'section'     => 'online_pharmacy_slider_section',
	        'type'        => 'text'
	    )
	);

	$wp_customize->add_setting('online_pharmacy_slider_content_layout',array(
	    'default'           => 'CENTER-ALIGN',
	    'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));

	$wp_customize->add_control('online_pharmacy_slider_content_layout',array(
	    'type'        => 'radio',
	    'label'       => __('Slider Content Layout', 'online-pharmacy'),
	    'section'     => 'online_pharmacy_slider_section',
	    'choices'     => array(
	        'CENTER-ALIGN' => __('CENTER-ALIGN','online-pharmacy'),
	        'LEFT-ALIGN'   => __('LEFT-ALIGN','online-pharmacy'),
	        'RIGHT-ALIGN'  => __('RIGHT-ALIGN','online-pharmacy'),
	    ),
	) );

	//Slider excerpt
	$wp_customize->add_setting( 'online_pharmacy_slider_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'absint',
	) );
	$wp_customize->add_control( 'online_pharmacy_slider_excerpt_length', array(
		'label'       => esc_html__( 'Slider Excerpt length','online-pharmacy' ),
		'section'     => 'online_pharmacy_slider_section',
		'type'        => 'number',
		'settings'    => 'online_pharmacy_slider_excerpt_length',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	// Pro Version
    $wp_customize->add_setting( 'online_pharmacy_slider_pro_version_logo', array(
        'sanitize_callback' => 'online_pharmacy_sanitize_custom_control'
    ));
    $wp_customize->add_control( new online_pharmacy_Customize_Pro_Version ( $wp_customize,'online_pharmacy_slider_pro_version_logo', array(
        'section'     => 'online_pharmacy_slider_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'online-pharmacy' ),
        'description' => esc_url( ONLINE_PHARMACY_PRO_THEME_URL ),
        'priority'    => 100
    )));

	// Product Section
	$wp_customize->add_section( 'online_pharmacy_product_section' , array(
    	'title'      => __( 'Product Section', 'online-pharmacy' ),
    	'priority' => 18,
		'panel' => 'online_pharmacy_panel_id'
	) );

	$wp_customize->add_setting( 'online_pharmacy_show_hide_product_section', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new online_pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_show_hide_product_section', array(
		'label'       => esc_html__( 'Show / Hide Product Section', 'online-pharmacy' ),
		'section'     => 'online_pharmacy_product_section',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_show_hide_product_section',
	) ) );

	$wp_customize->add_setting( 'online_pharmacy_about_sec_animation', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new online_pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_about_sec_animation', array(
		'label'       => esc_html__( 'Show / Hide Section Animation', 'online-pharmacy' ),
		'section'     => 'online_pharmacy_product_section',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_about_sec_animation',
	) ) );

	$wp_customize->add_setting('online_pharmacy_product_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_pharmacy_product_heading',array(
		'label'	=> __('Add Heading','online-pharmacy'),
		'section'=> 'online_pharmacy_product_section',
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
	$categories = get_categories( $online_pharmacy_args );
	$online_pharmacy_cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
				$default = $category->slug;
				$i++;
		}
		$online_pharmacy_cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('online_pharmacy_recent_product_category',array(
		'sanitize_callback' => 'online_pharmacy_sanitize_select',
	));
	$wp_customize->add_control('online_pharmacy_recent_product_category',array(
		'type'    => 'select',
		'choices' => $online_pharmacy_cats,
		'label' => __('Select Product Category','online-pharmacy'),
		'section' => 'online_pharmacy_product_section',
	));

	// Pro Version
    $wp_customize->add_setting( 'online_pharmacy_about_pro_version_logo', array(
        'sanitize_callback' => 'online_pharmacy_sanitize_custom_control'
    ));
    $wp_customize->add_control( new online_pharmacy_Customize_Pro_Version ( $wp_customize,'online_pharmacy_about_pro_version_logo', array(
        'section'     => 'online_pharmacy_product_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'online-pharmacy' ),
        'description' => esc_url( ONLINE_PHARMACY_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//footer
	$wp_customize->add_section('online_pharmacy_footer_section',array(
		'title'	=> __('Footer Widget Settings','online-pharmacy'),
		'priority' => 18,
		'panel' => 'online_pharmacy_panel_id'
	));

	$wp_customize->add_setting( 'online_pharmacy_footer_animation', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new online_pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_footer_animation', array(
		'label'       => esc_html__( 'Show / Hide Footer Animation', 'online-pharmacy' ),
		'priority' => 1,
		'section'     => 'online_pharmacy_footer_section',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_footer_animation',
	) ) );
	
	// footer columns
	$wp_customize->add_setting('online_pharmacy_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'online_pharmacy_sanitize_number_absint'
	));
	$wp_customize->add_control('online_pharmacy_footer_columns',array(
		'label'	=> __('Footer Widget Columns','online-pharmacy'),
		'section'	=> 'online_pharmacy_footer_section',
		'setting'	=> 'online_pharmacy_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));

	$wp_customize->add_setting('online_pharmacy_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'online_pharmacy_footer_widget_image',array(
    'label' => __('Footer Widget Background Image','online-pharmacy'),
    'section' => 'online_pharmacy_footer_section'
	)));

	$wp_customize->add_setting( 'online_pharmacy_tp_footer_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_tp_footer_bg_color_option', array(
	    'description' => __('It will change the complete theme hover link color in one click.', 'online-pharmacy'),
	    'section' => 'online_pharmacy_footer_section',
	    'settings' => 'online_pharmacy_tp_footer_bg_color_option',
  	)));

	$wp_customize->add_setting('online_pharmacy_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'online_pharmacy_footer_widget_image',array(
    'label' => __('Footer Widget Background Image','online-pharmacy'),
    'section' => 'online_pharmacy_footer_section'
	)));

	$wp_customize->selective_refresh->add_partial( 'online_pharmacy_footer_text', array(
		'selector' => '#footer p',
		'render_callback' => 'online_pharmacy_customize_partial_online_pharmacy_footer_text',
	) );

	//footer widget title font size
	$wp_customize->add_setting('online_pharmacy_footer_widget_title_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'online_pharmacy_sanitize_number_absint'
	));
	$wp_customize->add_control('online_pharmacy_footer_widget_title_font_size',array(
		'label'	=> __('Change Footer Widget Title Font Size in PX','online-pharmacy'),
		'section'	=> 'online_pharmacy_footer_section',
	    'setting'	=> 'online_pharmacy_footer_widget_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'online_pharmacy_footer_widget_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_footer_widget_title_color', array(
			'label'     => __('Change Footer Widget Title Color', 'online-pharmacy'),
	    'section' => 'online_pharmacy_footer_section',
	    'settings' => 'online_pharmacy_footer_widget_title_color',
  	)));

  	$wp_customize->add_setting('online_pharmacy_footer_widget_title_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_footer_widget_title_font_weight',array(
     'type' => 'radio',
     'label'     => __('Change Footer Widget Title Font Weight', 'online-pharmacy'),
     'section' => 'online_pharmacy_footer_section',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','online-pharmacy'),
         '200' => __('200','online-pharmacy'),
         '300' => __('300','online-pharmacy'),
         '400' => __('400','online-pharmacy'),
         '500' => __('500','online-pharmacy'),
         '600' => __('600','online-pharmacy'),
         '700' => __('700','online-pharmacy'),
         '800' => __('800','online-pharmacy'),
         '900' => __('900','online-pharmacy')
     ),
	) );

	$wp_customize->add_setting('online_pharmacy_footer_widget_title_text_tranform',array(
		'default' => '',
		'sanitize_callback' => 'online_pharmacy_sanitize_choices'
 	));
 	$wp_customize->add_control('online_pharmacy_footer_widget_title_text_tranform',array(
		'type' => 'select',
		'label' => __('Change Footer Widget Title Letter Case','online-pharmacy'),
		'section' => 'online_pharmacy_footer_section',
		'choices' => array(
		   'Uppercase' => __('Uppercase','online-pharmacy'),
		   'Lowercase' => __('Lowercase','online-pharmacy'),
		   'Capitalize' => __('Capitalize','online-pharmacy'),
		),
	) );

	// Add Settings and Controls for position
	$wp_customize->add_setting('online_pharmacy_footer_widget_title_position',array(
        'default' => '',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_footer_widget_title_position',array(
        'type' => 'radio',
        'label'     => __('Change Footer Widget Position', 'online-pharmacy'),
        'description'   => __('This option work for Footer Widget', 'online-pharmacy'),
        'section' => 'online_pharmacy_footer_section',
        'choices' => array(
            'Right' => __('Right','online-pharmacy'),
            'Left' => __('Left','online-pharmacy'),
            'Center' => __('Center','online-pharmacy')
        ),
	) );

	$wp_customize->add_setting( 'online_pharmacy_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to Header', 'online-pharmacy'),
		'section'     => 'online_pharmacy_footer_section',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_return_to_header',
	) ) );

	 $wp_customize->add_setting('online_pharmacy_scroll_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Online_Pharmacy_Icon_Changer(
        $wp_customize,'online_pharmacy_scroll_top_icon',array(
		'label'	=> __('Scroll to top Icon','online-pharmacy'),
		'transport' => 'refresh',
		'section'	=> 'online_pharmacy_footer_section',
		'type'		=> 'icon'
	)));

   // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('online_pharmacy_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_scroll_top_position',array(
     'type' => 'radio',
     'label'     => __('Scroll to top Position', 'online-pharmacy'),
     'description'   => __('This option work for scroll to top', 'online-pharmacy'),
     'section' => 'online_pharmacy_footer_section',
     'choices' => array(
         'Right' => __('Right','online-pharmacy'),
         'Left' => __('Left','online-pharmacy'),
         'Center' => __('Center','online-pharmacy')
     ),
	) );

	// Pro Version
    $wp_customize->add_setting( 'online_pharmacy_footer_widget_pro_version_logo', array(
        'sanitize_callback' => 'online_pharmacy_sanitize_custom_control'
    ));
    $wp_customize->add_control( new online_pharmacy_Customize_Pro_Version ( $wp_customize,'online_pharmacy_footer_widget_pro_version_logo', array(
        'section'     => 'online_pharmacy_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'online-pharmacy' ),
        'description' => esc_url( ONLINE_PHARMACY_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//footer
	$wp_customize->add_section('online_pharmacy_footer_copyright_section',array(
		'title'	=> __('Footer Copyright Settings','online-pharmacy'),
		'priority' => 18,
		'description'	=> __('Add copyright text.','online-pharmacy'),
		'panel' => 'online_pharmacy_panel_id'
	));

	$wp_customize->add_setting('online_pharmacy_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_pharmacy_footer_text',array(
		'label'	=> __('Copyright Text','online-pharmacy'),
		'section'	=> 'online_pharmacy_footer_copyright_section',
		'type'		=> 'text'
	));

	//footer widget title font size
	$wp_customize->add_setting('online_pharmacy_footer_copyright_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'online_pharmacy_sanitize_number_absint'
	));
	$wp_customize->add_control('online_pharmacy_footer_copyright_font_size',array(
		'label'	=> __('Change Footer Copyright Font Size in PX','online-pharmacy'),
		'section'	=> 'online_pharmacy_footer_copyright_section',
	    'setting'	=> 'online_pharmacy_footer_copyright_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting('online_pharmacy_footer_copyright_title_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_footer_copyright_title_font_weight',array(
     'type' => 'radio',
     'label'     => __('Change Footer Copyright Text Font Weight', 'online-pharmacy'),
     'section' => 'online_pharmacy_footer_copyright_section',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','online-pharmacy'),
         '200' => __('200','online-pharmacy'),
         '300' => __('300','online-pharmacy'),
         '400' => __('400','online-pharmacy'),
         '500' => __('500','online-pharmacy'),
         '600' => __('600','online-pharmacy'),
         '700' => __('700','online-pharmacy'),
         '800' => __('800','online-pharmacy'),
         '900' => __('900','online-pharmacy')
     ),
	) );

	$wp_customize->add_setting( 'online_pharmacy_footer_copyright_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_footer_copyright_text_color', array(
			'label'     => __('Change Footer Copyright Text Color', 'online-pharmacy'),
	    'section' => 'online_pharmacy_footer_copyright_section',
	    'settings' => 'online_pharmacy_footer_copyright_text_color',
  	)));

  	$wp_customize->add_setting('online_pharmacy_footer_copyright_top_bottom_padding',array(
		'default'	=> '',
		'sanitize_callback'	=> 'online_pharmacy_sanitize_number_absint'
	));
	$wp_customize->add_control('online_pharmacy_footer_copyright_top_bottom_padding',array(
		'label'	=> __('Change Footer Copyright Padding in PX','online-pharmacy'),
		'section'	=> 'online_pharmacy_footer_copyright_section',
	    'setting'	=> 'online_pharmacy_footer_copyright_top_bottom_padding',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	// Add Settings and Controls for copyright
	$wp_customize->add_setting('online_pharmacy_copyright_text_position',array(
        'default' => 'Center',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_copyright_text_position',array(
        'type' => 'radio',
        'label'     => __('Copyright Text Position', 'online-pharmacy'),
        'description'   => __('This option work for Copyright', 'online-pharmacy'),
        'section' => 'online_pharmacy_footer_copyright_section',
        'choices' => array(
            'Right' => __('Right','online-pharmacy'),
            'Left' => __('Left','online-pharmacy'),
            'Center' => __('Center','online-pharmacy')
        ),
	) );

	// Pro Version
    $wp_customize->add_setting( 'online_pharmacy_copyright_pro_version_logo', array(
        'sanitize_callback' => 'online_pharmacy_sanitize_custom_control'
    ));
    $wp_customize->add_control( new online_pharmacy_Customize_Pro_Version ( $wp_customize,'online_pharmacy_copyright_pro_version_logo', array(
        'section'     => 'online_pharmacy_footer_copyright_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'online-pharmacy' ),
        'description' => esc_url( ONLINE_PHARMACY_PRO_THEME_URL ),
        'priority'    => 100
    )));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'online_pharmacy_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'online_pharmacy_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting( 'online_pharmacy_site_title_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_site_title_text', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'online-pharmacy'),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'online_pharmacy_site_title_text',
	) ) );

	// logo site title size
	$wp_customize->add_setting('online_pharmacy_site_title_font_size',array(
		'default'	=> 25,
		'sanitize_callback'	=> 'online_pharmacy_sanitize_number_absint'
	));
	$wp_customize->add_control('online_pharmacy_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','online-pharmacy'),
		'section'	=> 'title_tagline',
		'setting'	=> 'online_pharmacy_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'online_pharmacy_site_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_site_tagline_color', array(
			'label'     => __('Change Site Title Color', 'online-pharmacy'),
	    'section' => 'title_tagline',
	    'settings' => 'online_pharmacy_site_tagline_color',
  	)));

		$wp_customize->add_setting( 'online_pharmacy_site_tagline_text', array(
			'default'           => false,
			'transport'         => 'refresh',
			'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_site_tagline_text', array(
			'label'       => esc_html__( 'Show / Hide Tagline', 'online-pharmacy'),
			'section'     => 'title_tagline',
			'type'        => 'toggle',
			'settings'    => 'online_pharmacy_site_tagline_text',
		) ) );

		// logo site tagline size
	$wp_customize->add_setting('online_pharmacy_site_tagline_font_size',array(
		'default'	=> 10,
		'sanitize_callback'	=> 'online_pharmacy_sanitize_number_absint'
	));
	$wp_customize->add_control('online_pharmacy_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','online-pharmacy'),
		'section'	=> 'title_tagline',
		'setting'	=> 'online_pharmacy_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));

	$wp_customize->add_setting( 'online_pharmacy_logo_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_logo_tagline_color', array(
			'label'     => __('Change Site Tagline Color', 'online-pharmacy'),
	    'section' => 'title_tagline',
	    'settings' => 'online_pharmacy_logo_tagline_color',
  	)));

    $wp_customize->add_setting('online_pharmacy_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'online_pharmacy_sanitize_number_absint'
	));
	 $wp_customize->add_control('online_pharmacy_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','online-pharmacy'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('online_pharmacy_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
    $wp_customize->add_control('online_pharmacy_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'online-pharmacy'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'online-pharmacy'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','online-pharmacy'),
            'Same Line' => __('Same Line','online-pharmacy')
        ),
	) );

	$wp_customize->add_setting('online_pharmacy_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'online_pharmacy_sanitize_number_absint'
	));
	$wp_customize->add_control('online_pharmacy_per_columns',array(
		'label'	=> __('Product Per Row','online-pharmacy'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('online_pharmacy_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'online_pharmacy_sanitize_number_absint'
	));
	$wp_customize->add_control('online_pharmacy_product_per_page',array(
		'label'	=> __('Product Per Page','online-pharmacy'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

		$wp_customize->add_setting( 'online_pharmacy_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'online-pharmacy' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'online_pharmacy_product_sidebar',
		) ) );

		$wp_customize->add_setting( 'online_pharmacy_single_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_single_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'online-pharmacy' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'online_pharmacy_single_product_sidebar',
		) ) );

		$wp_customize->add_setting( 'online_pharmacy_related_product', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Online_Pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_related_product', array(
			'label'       => esc_html__( 'Show / Hide related product', 'online-pharmacy' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'online_pharmacy_related_product',
		) ) );

	//Page template settings
	$wp_customize->add_panel( 'online_pharmacy_page_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Page Template Settings', 'online-pharmacy' ),
	    'description' => __( 'Description of what this panel does.', 'online-pharmacy' ),
	) );

	// 404 PAGE
	$wp_customize->add_section('online_pharmacy_404_page_section',array(
		'title'         => __('404 Page', 'online-pharmacy'),
		'description'   => 'Here you can customize 404 Page content.',
		'panel' => 'online_pharmacy_page_panel_id'
	) );

	$wp_customize->add_setting('online_pharmacy_edit_404_title',array(
		'default'=> __('Oops! That page cant be found.','online-pharmacy'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('online_pharmacy_edit_404_title',array(
		'label'	=> __('Edit Title','online-pharmacy'),
		'section'=> 'online_pharmacy_404_page_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('online_pharmacy_edit_404_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','online-pharmacy'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_pharmacy_edit_404_text',array(
		'label'	=> __('Edit Text','online-pharmacy'),
		'section'=> 'online_pharmacy_404_page_section',
		'type'=> 'text'
	));

	// Search Results
	$wp_customize->add_section('online_pharmacy_no_result_section',array(
		'title'         => __('Search Results', 'online-pharmacy'),
		'description'   => 'Here you can customize Search Result content.',
		'panel' => 'online_pharmacy_page_panel_id'
	) );

	$wp_customize->add_setting('online_pharmacy_edit_no_result_title',array(
		'default'=> __('Nothing Found','online-pharmacy'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('online_pharmacy_edit_no_result_title',array(
		'label'	=> __('Edit Title','online-pharmacy'),
		'section'=> 'online_pharmacy_no_result_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('online_pharmacy_edit_no_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','online-pharmacy'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_pharmacy_edit_no_result_text',array(
		'label'	=> __('Edit Text','online-pharmacy'),
		'section'=> 'online_pharmacy_no_result_section',
		'type'=> 'text'
	));

	// Header Image Height
    $wp_customize->add_setting(
        'online_pharmacy_header_image_height',
        array(
            'default'           => 350,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'online_pharmacy_header_image_height',
        array(
            'label'       => esc_html__( 'Header Image Height', 'online-pharmacy' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the height of the header image. Default is 350px.', 'online-pharmacy' ),
            'input_attrs' => array(
                'min'  => 220,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    );

    // Header Background Position
    $wp_customize->add_setting(
        'online_pharmacy_header_background_position',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'online_pharmacy_header_background_position',
        array(
            'label'       => esc_html__( 'Header Background Position', 'online-pharmacy' ),
            'section'     => 'header_image',
            'type'        => 'select',
            'choices'     => array(
                'top'    => esc_html__( 'Top', 'online-pharmacy' ),
                'center' => esc_html__( 'Center', 'online-pharmacy' ),
                'bottom' => esc_html__( 'Bottom', 'online-pharmacy' ),
            ),
            'description' => esc_html__( 'Choose how you want to position the header image.', 'online-pharmacy' ),
        )
    );

    // Header Image Parallax Effect
    $wp_customize->add_setting(
        'online_pharmacy_header_background_attachment',
        array(
            'default'           => 1,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'online_pharmacy_header_background_attachment',
        array(
            'label'       => esc_html__( 'Header Image Parallax', 'online-pharmacy' ),
            'section'     => 'header_image',
            'type'        => 'checkbox',
            'description' => esc_html__( 'Add a parallax effect on page scroll.', 'online-pharmacy' ),
        )
    );

        //Opacity
	$wp_customize->add_setting('online_pharmacy_header_banner_opacity_color',array(
       'default'              => '0.5',
       'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
    $wp_customize->add_control( 'online_pharmacy_header_banner_opacity_color', array(
		'label'       => esc_html__( 'Header Image Opacity','online-pharmacy' ),
		'section'     => 'header_image',
		'type'        => 'select',
		'settings'    => 'online_pharmacy_header_banner_opacity_color',
		'choices' => array(
           '0' =>  esc_attr(__('0','online-pharmacy')),
           '0.1' =>  esc_attr(__('0.1','online-pharmacy')),
           '0.2' =>  esc_attr(__('0.2','online-pharmacy')),
           '0.3' =>  esc_attr(__('0.3','online-pharmacy')),
           '0.4' =>  esc_attr(__('0.4','online-pharmacy')),
           '0.5' =>  esc_attr(__('0.5','online-pharmacy')),
           '0.6' =>  esc_attr(__('0.6','online-pharmacy')),
           '0.7' =>  esc_attr(__('0.7','online-pharmacy')),
           '0.8' =>  esc_attr(__('0.8','online-pharmacy')),
           '0.9' =>  esc_attr(__('0.9','online-pharmacy'))
		), 
	) );

   $wp_customize->add_setting( 'online_pharmacy_header_banner_image_overlay', array(
	    'default'   => true,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
	));
	$wp_customize->add_control( new online_pharmacy_Toggle_Control( $wp_customize, 'online_pharmacy_header_banner_image_overlay', array(
	    'label'   => esc_html__( 'Show / Hide Header Image Overlay', 'online-pharmacy' ),
	    'section' => 'header_image',
	)));

    $wp_customize->add_setting('online_pharmacy_header_banner_image_ooverlay_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_pharmacy_header_banner_image_ooverlay_color', array(
		'label'    => __('Header Image Overlay Color', 'online-pharmacy'),
		'section'  => 'header_image',
	)));

    $wp_customize->add_setting(
        'online_pharmacy_header_image_title_font_size',
        array(
            'default'           => 32,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'online_pharmacy_header_image_title_font_size',
        array(
            'label'       => esc_html__( 'Change Header Image Title Font Size', 'online-pharmacy' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the font Size of the header image title. Default is 32px.', 'online-pharmacy' ),
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 200,
                'step' => 1,
            ),
        )
    );

	$wp_customize->add_setting( 'online_pharmacy_header_image_title_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_pharmacy_header_image_title_text_color', array(
			'label'     => __('Change Header Image Title Color', 'online-pharmacy'),
	    'section' => 'header_image',
	    'settings' => 'online_pharmacy_header_image_title_text_color',
  	)));

  	//Woocommerce settings
	$wp_customize->add_section('online_pharmacy_woocommerce_section', array(
		'title'    => __('WooCommerce Options', 'online-pharmacy'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('online_pharmacy_sale_tag_position',array(
        'default' => 'right',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
	));
	$wp_customize->add_control('online_pharmacy_sale_tag_position',array(
        'type' => 'radio',
        'label'     => __('Sale Badge Position', 'online-pharmacy'),
        'description'   => __('This option work for Archieve Products', 'online-pharmacy'),
        'section' => 'online_pharmacy_woocommerce_section',
        'choices' => array(
            'left' => __('Left','online-pharmacy'),
            'right' => __('Right','online-pharmacy'),
        ),
	) );

  	$wp_customize->add_setting('online_pharmacy_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('online_pharmacy_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','online-pharmacy'),

		'section'=> 'online_pharmacy_woocommerce_section',
		'settings'    => 'online_pharmacy_woocommerce_sale_font_size',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	));

	$wp_customize->add_setting('online_pharmacy_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('online_pharmacy_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','online-pharmacy'),
		'section'=> 'online_pharmacy_woocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	));

	$wp_customize->add_setting('online_pharmacy_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('online_pharmacy_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','online-pharmacy'),
		'section'=> 'online_pharmacy_woocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	));

	$wp_customize->add_setting( 'online_pharmacy_woocommerce_sale_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint'
	) );
	$wp_customize->add_control( 'online_pharmacy_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','online-pharmacy' ),
		'section'     => 'online_pharmacy_woocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	) );

}
add_action( 'customize_register', 'online_pharmacy_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Online Pharmacy 1.0
 * @see online_pharmacy_customize_register()
 *
 * @return void
 */
function online_pharmacy_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Online Pharmacy 1.0
 * @see online_pharmacy_customize_register()
 *
 * @return void
 */
function online_pharmacy_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'ONLINE_PHARMACY_PRO_THEME_NAME' ) ) {
	define( 'ONLINE_PHARMACY_PRO_THEME_NAME', esc_html__( 'Online Pharmacy Pro', 'online-pharmacy'));
}
if ( ! defined( 'ONLINE_PHARMACY_PRO_THEME_URL' ) ) {
	define( 'ONLINE_PHARMACY_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/online-pharmacy-wordpress-theme'));
}
if ( ! defined( 'ONLINE_PHARMACY_DOCS_URL' ) ) {
	define( 'ONLINE_PHARMACY_DOCS_URL', esc_url('https://www.themespride.com/demo/docs/online-pharmacy-lite/'));
}

if ( ! defined( 'ONLINE_PHARMACY_TEXT' ) ) {
    define( 'ONLINE_PHARMACY_TEXT', __( 'Online Pharmacy Pro','online-pharmacy' ));
}
if ( ! defined( 'ONLINE_PHARMACY_BUY_TEXT' ) ) {
    define( 'ONLINE_PHARMACY_BUY_TEXT', __( 'Upgrade Pro','online-pharmacy' ));
}


add_action( 'customize_register', function( $manager ) {

// Load custom sections.
load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

    $manager->register_section_type( Online_Pharmacy_Button::class );

    $manager->add_section(
        new Online_Pharmacy_Button( $manager, 'online_pharmacy_pro', [
            'title'       => esc_html( ONLINE_PHARMACY_TEXT,'online-pharmacy' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'online-pharmacy' ),
            'button_url'  => esc_url( ONLINE_PHARMACY_PRO_THEME_URL )
        ] )
    );

} );
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Online_Pharmacy_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Online_Pharmacy_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Online_Pharmacy_Customize_Section_Pro(
				$manager,
				'online_pharmacy_section_pro',
				array(
					'priority'   => 9,
					'title'    => ONLINE_PHARMACY_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'online-pharmacy'),
					'pro_url'  => esc_url( ONLINE_PHARMACY_PRO_THEME_URL, 'online-pharmacy'),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Online_Pharmacy_Customize_Section_Pro(
				$manager,
				'online_pharmacy_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'online-pharmacy'),
					'pro_text' => esc_html__( 'Click Here', 'online-pharmacy'),
					'pro_url'  => esc_url( ONLINE_PHARMACY_DOCS_URL, 'online-pharmacy'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'online_pharmacy-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'online_pharmacy-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Online_Pharmacy_Customize::get_instance();
