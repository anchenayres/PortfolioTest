<?php
/**
* banner settings for site
*
*
*/
if (  defined( 'CWW_PORTFOLIO_VER' ) ) {
$wp_customize->add_setting( 'cww_home_banner_animated_text_accordion', 
			array(
			    'capability'        => 'edit_theme_options',
			    'sanitize_callback' => 'sanitize_text_field'
	        )
		);

	$wp_customize->add_control( new CWW_Portfolio_Heading($wp_customize, 'cww_home_banner_animated_text_accordion', 
		array(
		    'label' 			=> esc_html__( 'Animated Text', 'cww-companion' ),
		    'section'     		=> 'cww_homepage_section',
		    'class'				=> 'advanced-home-moving-content-accordion',
		    'accordion'			=> true,
		    'expanded'         	=> false,
		    'priority'			=> 250,
		    'controls_to_wrap'  => 8,
		    
	       )
	    )
	);
}

if (  defined( 'CWW_PORTFOLIO_VER' ) ) {

$wp_customize->add_setting('cww_banner_moving_text_enable', 
		array(
	        'default'           	=> $default['cww_banner_moving_text_enable'],
	        'sanitize_callback' 	=> 'cww_portfolio_sanitize_checkbox',
		)
	);

$wp_customize->add_control( new CWW_Portfolio_Checkbox($wp_customize, 'cww_banner_moving_text_enable', 
	array(
	    'label' 			=> esc_html__( 'Enable Moving Text', 'cww-portfolio' ),
	    'description' 		=> esc_html__('Add moving text effects on banner','cww-portfolio'),
	    'section'     		=> 'cww_homepage_section',
	    'priority'			=> 260,
	    
       )
    )
);
}

$wp_customize->add_setting('cww_banner_moving_texts', 
		array(
	        
	        'sanitize_callback' 	=> 'sanitize_text_field',
		)
	);

$wp_customize->add_control('cww_banner_moving_texts', 
	array(
	    'label' 			=> esc_html__( 'Enable Moving Text', 'cww-portfolio' ),
	    'description' 		=> esc_html__('Add texts seperated by comma eg: Developer,Designer','cww-portfolio'),
	    'section'     		=> 'cww_homepage_section',
	    'priority'			=> 270,
	    'type'				=> 'text'
	    
       
    )
);



/* ============ Color Option ======================= */

if (  defined( 'CWW_PORTFOLIO_VER' ) ) {
$wp_customize->add_setting( 'cww_icon_banner_bg',
            array(
                'default'     		=> $default['cww_icon_banner_bg'],
                'type'        		=> 'theme_mod',
                'capability'  		=> 'edit_theme_options',
                'sanitize_callback' => 'cww_portfolio_sanitize_color',
            )
        );
    

    $wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_icon_banner_bg',
                array(
                    'label'         => esc_html__( 'Icons Background Color', 'cww-companion' ),
                    'description' 	=> esc_html__('Change background color for social icons','cww-companion'),
                    'section'       => 'cww_homepage_section',
                    'priority'      => 201,
                    'show_opacity'  => true, // Optional.
                    'palette' => array(
                        'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                        'rgba(50,50,50,0.8)',
                        'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                        '#00CC99' // Mix of color types = no problem
                    )
                )
            )
        );
}