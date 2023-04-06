<?php
/**
 * Register customizer panels, sections, settings, and controls.
 *
 * @since  1.0.0
 * @access public
 * @param  object  $wp_customize
 * @return void
 */
# Register our customizer panels, sections, settings, and controls.

add_action( 'customize_register', 'cww_portfolio_pro_typo_customize_register', 25 );
function cww_portfolio_pro_typo_customize_register( $wp_customize ) {

	require CWW_PP_PATH. '/inc/customizer/typography/customize/control-typography.php';

	// Register typography control JS template.
	$wp_customize->register_control_type( 'Customizer_Typo_Control_Typography' );
	$wp_customize->register_control_type( 'Cww_Portfolio_Pro_Customizer_Range_Control' );

	// Add the typography panel.
	$wp_customize->add_panel( 'typography', array( 'priority' => 50, 'title' => esc_html__( 'Typography', 'cww-portfolio-pro' ) ) );

	// Add the `<menu>` typography section.
	$wp_customize->add_section( 'menu_typography',
		array( 'panel' => 'typography', 'title' => esc_html__( 'Main Menu', 'cww-portfolio-pro' ) )
	);
	$wp_customize->add_setting( 'menu_font_family', array( 'default' => 'Jost',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'menu_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_text_field',        'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'menu_font_weight', array( 'default' => '500', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'menu_text_decoration', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field',              'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'menu_text_transform', array( 'default' => 'uppercase', 'sanitize_callback' => 'sanitize_text_field',              'transport' => 'postMessage' ) );
	
	

	$wp_customize->add_control(
		new Customizer_Typo_Control_Typography(
			$wp_customize,
			'menu_typography',
			array(
				'label'       => esc_html__( 'Main Menu Typography', 'cww-portfolio-pro' ),
				'description' => esc_html__( 'Select how you want your main menu to appear.', 'cww-portfolio-pro' ),
				'section'     => 'menu_typography',
				'settings'    => array(
					'family'      => 'menu_font_family',
					'style'       => 'menu_font_style',
					'text_decoration' => 'menu_text_decoration',
					'text_transform' => 'menu_text_transform',
					'weight'	  => 'menu_font_weight'
				),
				'l10n'        => array(),
			)
		)
	);

	// Add the `<p>` typography section.
	$wp_customize->add_section( 'p_typography',
		array( 'panel' => 'typography', 'title' => esc_html__( 'Paragraphs', 'cww-portfolio-pro' ) )
	);
	$wp_customize->add_setting( 'p_font_family', array( 'default' => 'Jost',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'p_font_weight',  array( 'default' => '300', 'sanitize_callback' => 'sanitize_text_field',   'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'p_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_text_field',   'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'p_text_decoration', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field',              'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'p_text_transform', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field',              'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'p_color', array( 'default' => '#666',     'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );

	$wp_customize->add_control(
		new Customizer_Typo_Control_Typography(
			$wp_customize,
			'p_typography',
			array(
				'label'       => esc_html__( 'Paragraph Typography', 'cww-portfolio-pro' ),
				'description' => esc_html__( 'Select how you want your paragraphs to appear.', 'cww-portfolio-pro' ),
				'section'     => 'p_typography',
				'settings'    => array(
					'family'      => 'p_font_family',
					'weight'       => 'p_font_weight',
					'style'       => 'p_font_style',
					'text_decoration' => 'p_text_decoration',
					'text_transform' => 'p_text_transform',
					'typocolor'  => 'p_color'
				),
				'l10n'        => array(),
			)
		)
	);



	// Add the `<h1>` typography section.
	$wp_customize->add_section( 'h1_typography',
		array( 'panel' => 'typography', 'title' => esc_html__( 'Header (H1)', 'cww-portfolio-pro' ) )
	);
	$wp_customize->add_setting( 'h1_font_family', array( 'default' => 'Jost',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h1_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h1_text_decoration', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h1_text_transform', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h1_color', array( 'default' => '#000', 'sanitize_callback' => 'sanitize_hex_color','transport' => 'postMessage' ) );

	$wp_customize->add_control(
		new Customizer_Typo_Control_Typography(
			$wp_customize,
			'h1_typography',
			array(
				'label'       => esc_html__( 'Header H1 Typography', 'cww-portfolio-pro' ),
				'description' => esc_html__( 'Select how you want your paragraphs to appear.', 'cww-portfolio-pro' ),
				'section'     => 'h1_typography',
				'settings'    => array(
					'family'      => 'h1_font_family',
					'style'       => 'h1_font_style',
					'text_decoration' => 'h1_text_decoration',
					'text_transform' => 'h1_text_transform',
					'typocolor'  => 'h1_color'
				),
				'l10n'        => array(),
			)
		)
	);

	// Add the `<h2>` typography section.
	$wp_customize->add_section( 'h2_typography',
		array( 'panel' => 'typography', 'title' => esc_html__( 'Header (H2)', 'cww-portfolio-pro' ) )
	);
	$wp_customize->add_setting( 'h2_font_family', array( 'default' => 'Jost',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h2_font_style',  array( 'default' => '700', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h2_text_decoration', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h2_text_transform', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h2_color', array( 'default' => '#252525', 'sanitize_callback' => 'sanitize_hex_color','transport' => 'postMessage' ) );

	$wp_customize->add_control(
		new Customizer_Typo_Control_Typography(
			$wp_customize,
			'h2_typography',
			array(
				'label'       => esc_html__( 'Header H2 Typography', 'cww-portfolio-pro' ),
				'description' => esc_html__( 'Select how you want your paragraphs to appear.', 'cww-portfolio-pro' ),
				'section'     => 'h2_typography',
				'settings'    => array(
					'family'      => 'h2_font_family',
					'style'       => 'h2_font_style',
					'text_decoration' => 'h2_text_decoration',
					'text_transform' => 'h2_text_transform',
					'typocolor'  => 'h2_color'
				),
				'l10n'        => array(),
			)
		)
	);

	// Add the `<h3>` typography section.
	$wp_customize->add_section( 'h3_typography',
		array( 'panel' => 'typography', 'title' => esc_html__( 'Header (H3)', 'cww-portfolio-pro' ) )
	);
	$wp_customize->add_setting( 'h3_font_family', array( 'default' => 'Jost',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h3_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h3_text_decoration', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h3_text_transform', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h3_color', array( 'default' => '#000', 'sanitize_callback' => 'sanitize_hex_color','transport' => 'postMessage' ) );

	$wp_customize->add_control(
		new Customizer_Typo_Control_Typography(
			$wp_customize,
			'h3_typography',
			array(
				'label'       => esc_html__( 'Header H3 Typography', 'cww-portfolio-pro' ),
				'description' => esc_html__( 'Select how you want your paragraphs to appear.', 'cww-portfolio-pro' ),
				'section'     => 'h3_typography',
				'settings'    => array(
					'family'      => 'h3_font_family',
					'style'       => 'h3_font_style',
					'text_decoration' => 'h3_text_decoration',
					'text_transform' => 'h3_text_transform',
					'typocolor'  => 'h3_color'
				),
				'l10n'        => array(),
			)
		)
	);


	// Add the `<h4>` typography section.
	$wp_customize->add_section( 'h4_typography',
		array( 'panel' => 'typography', 'title' => esc_html__( 'Header (H4)', 'cww-portfolio-pro' ) )
	);
	$wp_customize->add_setting( 'h4_font_family', array( 'default' => 'Jost',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h4_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h4_text_decoration', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h4_text_transform', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h4_color', array( 'default' => '#000', 'sanitize_callback' => 'sanitize_hex_color','transport' => 'postMessage' ) );

	$wp_customize->add_control(
		new Customizer_Typo_Control_Typography(
			$wp_customize,
			'h4_typography',
			array(
				'label'       => esc_html__( 'Header H4 Typography', 'cww-portfolio-pro' ),
				'description' => esc_html__( 'Select how you want your paragraphs to appear.', 'cww-portfolio-pro' ),
				'section'     => 'h4_typography',
				'settings'    => array(
					'family'      => 'h4_font_family',
					'style'       => 'h4_font_style',
					'text_decoration' => 'h4_text_decoration',
					'text_transform' => 'h4_text_transform',
					'typocolor'  => 'h4_color'
				),
				'l10n'        => array(),
			)
		)
	);

	// Add the `<h5>` typography section.
	$wp_customize->add_section( 'h5_typography',
		array( 'panel' => 'typography', 'title' => esc_html__( 'Header (H5)', 'cww-portfolio-pro' ) )
	);
	$wp_customize->add_setting( 'h5_font_family', array( 'default' => 'Jost',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h5_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h5_text_decoration', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h5_text_transform', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h5_color', array( 'default' => '#000', 'sanitize_callback' => 'sanitize_hex_color','transport' => 'postMessage' ) );

	$wp_customize->add_control(
		new Customizer_Typo_Control_Typography(
			$wp_customize,
			'h5_typography',
			array(
				'label'       => esc_html__( 'Header H5 Typography', 'cww-portfolio-pro' ),
				'description' => esc_html__( 'Select how you want your paragraphs to appear.', 'cww-portfolio-pro' ),
				'section'     => 'h5_typography',
				'settings'    => array(
					'family'      => 'h5_font_family',
					'style'       => 'h5_font_style',
					'text_decoration' => 'h5_text_decoration',
					'text_transform' => 'h5_text_transform',
					'typocolor'  => 'h5_color'
				),
				'l10n'        => array(),
			)
		)
	);

	// Add the `<h6>` typography section.
	$wp_customize->add_section( 'h6_typography',array(
		'panel' => 'typography',
		'title' => esc_html__( 'Header (H6)', 'cww-portfolio-pro' )
	 ));

	$wp_customize->add_setting( 'h6_font_family', array( 'default' => 'Jost',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h6_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h6_text_decoration', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h6_text_transform', array( 'default' => 'none', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'h6_color', array( 'default' => '#000', 'sanitize_callback' => 'sanitize_hex_color','transport' => 'postMessage' ) );

	$wp_customize->add_control( new Customizer_Typo_Control_Typography( $wp_customize, 'h6_typography', array(
				'label'       => esc_html__( 'Header H6 Typography', 'cww-portfolio-pro' ),
				'description' => esc_html__( 'Select how you want your paragraphs to appear.', 'cww-portfolio-pro' ),
				'section'     => 'h6_typography',
				'settings'    => array(
					'family'      => 'h6_font_family',
					'style'       => 'h6_font_style',
					'text_decoration' => 'h6_text_decoration',
					'text_transform' => 'h6_text_transform',
					'typocolor'  => 'h6_color'
				),
				'l10n'        => array(),
			)));


/**
* Typography font weight controller
* @since 1.0.0
*/
$typo_setting_ids = array( 

	'menu_typography' 	=> 'menu_font_size,17',
	'p_typography' 		=> 'p_font_size,15',
	'h1_typography' 	=> 'h1_font_size,30',
	'h2_typography' 	=> 'h2_font_size,26',
	'h3_typography' 	=> 'h3_font_size,22',
	'h4_typography' 	=> 'h4_font_size,20',
	'h5_typography' 	=> 'h5_font_size,18',
	'h6_typography' 	=> 'h6_font_size,16'

);

foreach( $typo_setting_ids as $ids => $typo_setting_id ){

	$setting_id_exp = explode(',',$typo_setting_id);
	$setting_id 	= $setting_id_exp[0];
	$defaults 		= $setting_id_exp[1];


	$wp_customize->add_setting( $setting_id, array(
		  'default'             => $defaults,
		  'sanitize_callback'   => 'absint',
		  'transport'           => 'postMessage'
	) );

	$wp_customize->add_control( new Cww_Portfolio_Pro_Customizer_Range_Control( $wp_customize, $setting_id, array(
	  'label'           	=> esc_html__( 'Font Size (px)', 'cww-portfolio-pro' ),
	  'section'         	=> $ids,
	    'input_attrs'       => array(
	        'min'   => 5,
	        'max'   => 100,
	        'step'  => 1,
	    ),
	) ) );


}

/**
* Line height controller
* @since 1.0.0
*/
$lineHeight_setting_ids = array( 

	'menu_typography' 	=> 'menu_line_height,70',//seting ID and default value seperated with comma(,)
	'p_typography' 		=> 'p_line_height,1.5',
	'h1_typography' 	=> 'h1_line_height,1.1',
	'h2_typography' 	=> 'h2_line_height,1.1',
	'h3_typography' 	=> 'h3_line_height,1.1',
	'h4_typography' 	=> 'h4_line_height,1.1',
	'h5_typography' 	=> 'h5_line_height,1.1',
	'h6_typography' 	=> 'h6_line_height,1.1'

);

foreach( $lineHeight_setting_ids as $ids => $typo_setting_id ){

	$setting_id_exp = explode(',',$typo_setting_id);
	$setting_id 	= $setting_id_exp[0];
	$defaults 		= $setting_id_exp[1];


	$wp_customize->add_setting( $setting_id, array(
		  'default'             => $defaults,
		  'sanitize_callback'   => 'absint',
		  'transport'           => 'postMessage'
	) );

	$wp_customize->add_control( new Cww_Portfolio_Pro_Customizer_Range_Control( $wp_customize, $setting_id, array(
	  'label'           	=> esc_html__( 'Line Height (px)', 'cww-portfolio-pro' ),
	  'section'         	=> $ids,
	    'input_attrs'       => array(
	        'min'   => 0.1,
	        'max'   => 100,
	        'step'  => 0.1,
	    ),
	) ) );

}

// menu paddings

$wp_customize->add_setting( 'menu_typography_padding', array(
		  'default'             => '0.5',
		  'sanitize_callback'   => 'absint',
		  'transport'           => 'postMessage'
	) );

$wp_customize->add_control( new Cww_Portfolio_Pro_Customizer_Range_Control( $wp_customize, 'menu_typography_padding', array(
  'label'           	=> esc_html__( 'Menu Padding (em)', 'cww-portfolio-pro' ),
  'section'         	=> 'menu_typography',
    'input_attrs'       => array(
        'min'   => 0.1,
        'max'   => 10,
        'step'  => 0.1,
    ),
) ) );


}

/**
 * Register control scripts/styles.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
# Load scripts and styles.
add_action( 'customize_controls_enqueue_scripts', 'cww_portfolio_pro_customize_controls_register_scripts' );
function cww_portfolio_pro_customize_controls_register_scripts() {
	wp_enqueue_script( 'cww-portfolio-pro-pro-customize-controls', CWW_PP_URL .'/inc/customizer/typography/js/customize-controls.js', array( 'customize-controls' ) );
	wp_enqueue_script( 'ajax-script-function', CWW_PP_URL .'/inc/customizer/typography/js/typo-ajax.js', array('jquery')  );

    wp_localize_script( 'ajax-script-function', 'ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	wp_enqueue_style( 'cww-portfolio-pro-pro-customize-controls', CWW_PP_URL .'/inc/customizer/typography/css/customize-controls.css' );
	wp_enqueue_style( 'cww-portfolio-pro-pro-ui-controls', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css' );
}



/**
 * Load preview scripts/styles.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'customize_preview_init', 'cww_portfolio_pro_customize_preview_enqueue_scripts' );
function cww_portfolio_pro_customize_preview_enqueue_scripts() {
	wp_enqueue_script( 'cww-portfolio-pro-google-webfont', CWW_PP_URL. '/inc/customizer/typography/js/webfont.js' , array('jquery'));
	wp_enqueue_script( 'cww-portfolio-pro-customize-preview', CWW_PP_URL.'/inc/customizer/typography/js/customize-previews.js', array( 'jquery', 'customize-preview', 'cww-portfolio-pro-google-webfont') );
}
/**
 * Add custom body class to give some more weight to our styles.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $classes
 * @return array
 */
function cww_portfolio_pro_body_class( $classes ) {
	return array_merge( $classes, array( 'cww-portfolio-pro-typo' ) );
}
add_filter( 'body_class', 'cww_portfolio_pro_body_class' );
