<?php 
/**
* Service settings premium options
*
*
*
*
*/
if (  defined( 'CWW_PORTFOLIO_VER' ) ) {
$wp_customize->add_setting( 'cww_home_service_design_accordion', 
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

$wp_customize->add_control( new CWW_Portfolio_Heading($wp_customize, 'cww_home_service_design_accordion', 
    array(
        'label'             => esc_html__( 'Design Options', 'cww-companion' ),
        'section'           => 'cww_homepage_service_section',
        'class'             => 'advanced-home-skill-design-accordion',
        'accordion'         => true,
        'expanded'          => true,
        'priority'          => 250,
        'controls_to_wrap'  => 5,
        
       )
    )
);


//section bg color
$wp_customize->add_setting( 'cww_service_bg',
            array(
                'default'           => $default['cww_service_bg'],
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'cww_portfolio_sanitize_color',
            )
        );
    

$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_service_bg',
            array(
                'label'         => esc_html__( 'Background Color', 'cww-companion' ),
                'description'   => esc_html__('Change background color for service section','cww-companion'),
                'section'       => 'cww_homepage_service_section',
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


//services hover color
$wp_customize->add_setting( 'cww_service_hover',
            array(
                'default'           => $default['cww_service_hover'],
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'cww_portfolio_sanitize_color',
            )
        );
    

$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_service_hover',
            array(
                'label'         => esc_html__( 'Hover Color', 'cww-companion' ),
                'description'   => esc_html__('Change background color for service hovers','cww-companion'),
                'section'       => 'cww_homepage_service_section',
                'priority'      => 270,
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

//service icon color
$wp_customize->add_setting( 'cww_service_icon',
            array(
                'default'           => $default['cww_service_icon'],
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'cww_portfolio_sanitize_color',
            )
        );
    

$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_service_icon',
            array(
                'label'         => esc_html__( 'Icon Color', 'cww-companion' ),
                'description'   => esc_html__('Color for service Icons','cww-companion'),
                'section'       => 'cww_homepage_service_section',
                'priority'      => 280,
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

//service title color
$wp_customize->add_setting( 'cww_service_title_color',
            array(
                'default'           => $default['cww_service_title_color'],
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'cww_portfolio_sanitize_color',
            )
        );
    

$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_service_title_color',
            array(
                'label'         => esc_html__( 'Service Title Color', 'cww-companion' ),
                'description'   => esc_html__('Color for service titles','cww-companion'),
                'section'       => 'cww_homepage_service_section',
                'priority'      => 290,
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


//service desc color
$wp_customize->add_setting( 'cww_service_desc',
            array(
                'default'           => $default['cww_service_desc'],
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'cww_portfolio_sanitize_color',
            )
        );
    

$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_service_desc',
            array(
                'label'         => esc_html__( 'Service Description Color', 'cww-companion' ),
                'description'   => esc_html__('Color for service description','cww-companion'),
                'section'       => 'cww_homepage_service_section',
                'priority'      => 300,
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