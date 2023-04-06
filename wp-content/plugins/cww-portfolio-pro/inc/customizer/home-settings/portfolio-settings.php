<?php 
/**
* Premium settings for theme portfolio section
*
*
*
*/

//portfoli content type
$wp_customize->add_setting('cww_portfolio_content_type', 
    array(
        'default'           => $default['cww_portfolio_content_type'],
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control( 'cww_portfolio_content_type', array(
            'label'             => esc_html__( 'Content Type', 'cww-portfolio' ),
            'description'       => esc_html__('From where should portfolio display?','cww-portfolio'),
            'section'           => 'cww_homepage_portfolio_section',
            'type'              => 'select',
            'priority'          => 61,
            'choices'           => array(
                'page'       => esc_html__('Page','cww-portfolio-pro'),
                'portfolio'  => esc_html__('Portfolio Contents','cww-portfolio-pro'),
            )
           
            
          ) );

//posts per page
$wp_customize->add_setting('cww_portfolio_count', 
    array(
        'default'           => $default['cww_portfolio_count'],
        'sanitize_callback' => 'absint'
    )
);

$wp_customize->add_control( 'cww_portfolio_count', array(
            'label'             => esc_html__( 'No. Of Portfolios', 'cww-portfolio' ),
            'description'       => esc_html__('Enter number of portfolios to display from custom portfolio type','cww-portfolio'),
            'section'           => 'cww_homepage_portfolio_section',
            'type'              => 'number',
            'priority'          => 62,
            
           
            
          ) );

if (  defined( 'CWW_PORTFOLIO_VER' ) ) {

$wp_customize->add_setting( 'cww_home_portfolio_design_accordion', 
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

$wp_customize->add_control( new CWW_Portfolio_Heading($wp_customize, 'cww_home_portfolio_design_accordion', 
    array(
        'label'             => esc_html__( 'Design Options', 'cww-companion' ),
        'section'           => 'cww_homepage_portfolio_section',
        'class'             => 'advanced-home-portfolio-design-accordion',
        'accordion'         => true,
        'expanded'          => true,
        'priority'          => 250,
        'controls_to_wrap'  => 5,
        
       )
    )
);



$wp_customize->add_setting( 'cww_portfolio_bg',
            array(
                'default'           => $default['cww_portfolio_bg'],
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'cww_portfolio_sanitize_color',
            )
        );
    

$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_portfolio_bg',
            array(
                'label'         => esc_html__( 'Background Color', 'cww-companion' ),
                'description'   => esc_html__('Change background color for portfolio section','cww-companion'),
                'section'       => 'cww_homepage_portfolio_section',
                'priority'      => 260,
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