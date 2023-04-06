<?php
/**
* Premium options for about us section
*
*/

/**
*  accordion for color options
*
*/
if (  defined( 'CWW_PORTFOLIO_VER' ) ) {
$wp_customize->add_setting( 'cww_home_about_design_accordion', 
		array(
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'sanitize_text_field'
        )
	);

$wp_customize->add_control( new CWW_Portfolio_Heading($wp_customize, 'cww_home_about_design_accordion', 
	array(
	    'label' 			=> esc_html__( 'Design Options', 'cww-companion' ),
	    'section'     		=> 'cww_homepage_about_section',
	    'class'				=> 'advanced-home-about-design-accordion',
	    'accordion'			=> true,
	    'expanded'         	=> true,
	    'priority'			=> 150,
	    'controls_to_wrap'  => 3,
	    
       )
    )
);


$wp_customize->add_setting( 'cww_about_bg',
            array(
                'default'     		=> $default['cww_about_bg'],
                'type'        		=> 'theme_mod',
                'capability'  		=> 'edit_theme_options',
                'sanitize_callback' => 'cww_portfolio_sanitize_color',
            )
        );
    

    $wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_about_bg',
                array(
                    'label'         => esc_html__( 'Background Color', 'cww-companion' ),
                    'description' 	=> esc_html__('Change background color for about section','cww-companion'),
                    'section'       => 'cww_homepage_about_section',
                    'priority'      => 200,
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