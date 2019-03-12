<?php
/**
 * VW Transport Cargo Theme Customizer
 *
 * @package VW Transport Cargo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_transport_cargo_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/content-creation/class-customizer-content-creation.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_transport_cargo_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-transport-cargo' ),
	    'description' => __( 'Description of what this panel does.', 'vw-transport-cargo' ),
	) );

	$wp_customize->add_section( 'vw_transport_cargo_left_right', array(
    	'title'      => __( 'General Settings', 'vw-transport-cargo' ),
		'priority'   => 30,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	$wp_customize->add_setting('vw_transport_cargo_theme_options',array(
        'default' => __('Right Sidebar','vw-transport-cargo'),
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_transport_cargo_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-transport-cargo'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-transport-cargo'),
            'Right Sidebar' => __('Right Sidebar','vw-transport-cargo'),
            'One Column' => __('One Column','vw-transport-cargo'),
            'Three Columns' => __('Three Columns','vw-transport-cargo'),
            'Four Columns' => __('Four Columns','vw-transport-cargo'),
            'Grid Layout' => __('Grid Layout','vw-transport-cargo')
        ),
	) );

	$wp_customize->add_setting('vw_transport_cargo_page_layout',array(
        'default' => __('Right Sidebar','vw-transport-cargo'),
        'sanitize_callback' => 'vw_transport_cargo_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_transport_cargo_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-transport-cargo'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-transport-cargo'),
        'section' => 'vw_transport_cargo_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-transport-cargo'),
            'Right Sidebar' => __('Right Sidebar','vw-transport-cargo'),
            'One Column' => __('One Column','vw-transport-cargo')
        ),
	) );

	$wp_customize->add_section( 'vw_transport_cargo_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-transport-cargo' ),
		'priority'   => 30,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	$wp_customize->add_setting('vw_transport_cargo_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_button_text',array(
		'label'	=> __('Add Button Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'REQUEST A QUOTE', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'text'
	));		

	$wp_customize->add_setting('vw_transport_cargo_button_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_transport_cargo_button_url',array(
		'label'	=> __('Add Button URL','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'www.example.com', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_topbar',
		'type'=> 'url'
	));	
    
	//Slider
	$wp_customize->add_section( 'vw_transport_cargo_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-transport-cargo' ),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	$wp_customize->add_setting('vw_transport_cargo_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_transport_cargo_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','vw-transport-cargo'),
       'section' => 'vw_transport_cargo_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'vw_transport_cargo_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_transport_cargo_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_transport_cargo_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-transport-cargo' ),
			'description' => __('Slider image size (1500 x 590)','vw-transport-cargo'),
			'section'  => 'vw_transport_cargo_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Contact Us
	$wp_customize->add_section( 'vw_transport_cargo_contact_section' , array(
    	'title'      => __( 'Contact us Section', 'vw-transport-cargo' ),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	$wp_customize->add_setting('vw_transport_cargo_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_call_text',array(
		'label'	=> __('Add Phone Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Call us', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_call',array(
		'label'	=> __('Add Phone Number','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( '+123-7896-123', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_email_text',array(
		'label'	=> __('Add Email Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Drop us Email', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_email',array(
		'label'	=> __('Add Email Address','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'transport@gmail.com', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_time_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_time_text',array(
		'label'	=> __('Add Time Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Timming', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_transport_cargo_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_time',array(
		'label'	=> __('Add Opening Time','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Mon to Fri 8:00am - 9:00pm', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_contact_section',
		'type'=> 'text'
	));

	//About
	$wp_customize->add_section( 'vw_transport_cargo_about_section' , array(
    	'title'      => __( 'About Section', 'vw-transport-cargo' ),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	$wp_customize->add_setting( 'vw_transport_cargo_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'vw_transport_cargo_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_transport_cargo_about_page', array(
		'label'    => __( 'About Page', 'vw-transport-cargo' ),
		'section'  => 'vw_transport_cargo_about_section',
		'type'     => 'dropdown-pages'
	) );

	//Services
	$wp_customize->add_section( 'vw_transport_cargo_service_section' , array(
    	'title'      => __( 'Services Section', 'vw-transport-cargo' ),
		'priority'   => null,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_transport_cargo_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_transport_cargo_sanitize_choices',
	));
	$wp_customize->add_control('vw_transport_cargo_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display services','vw-transport-cargo'),
		'description' => __('Image Size (50 x 45)','vw-transport-cargo'),
		'section' => 'vw_transport_cargo_service_section',
	));

	//Content Craetion
	$wp_customize->add_section( 'vw_transport_cargo_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-transport-cargo' ),
		'priority' => null,
		'panel' => 'vw_transport_cargo_panel_id'
	) );

	$wp_customize->add_setting('vw_transport_cargo_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Transport_Cargo_Content_Creation( $wp_customize, 'vw_transport_cargo_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-transport-cargo' ),
		),
		'section' => 'vw_transport_cargo_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-transport-cargo' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_transport_cargo_footer',array(
		'title'	=> __('Footer','vw-transport-cargo'),
		'panel' => 'vw_transport_cargo_panel_id',
	));	
	
	$wp_customize->add_setting('vw_transport_cargo_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_transport_cargo_footer_text',array(
		'label'	=> __('Copyright Text','vw-transport-cargo'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2018, .....', 'vw-transport-cargo' ),
        ),
		'section'=> 'vw_transport_cargo_footer',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_transport_cargo_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Transport_Cargo_Customize {

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
		$manager->register_section_type( 'VW_Transport_Cargo_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Transport_Cargo_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'VW Transport Cargo', 'vw-transport-cargo' ),
					'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-transport-cargo' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/transport-wordpress-theme/'),
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

		wp_enqueue_script( 'vw-transport-cargo-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-transport-cargo-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Transport_Cargo_Customize::get_instance();