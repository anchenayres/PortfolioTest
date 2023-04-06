<?php 
/**
* Blog settings
* 
*
*
*/
if (  defined( 'CWW_PORTFOLIO_VER' ) ) {


$wp_customize->add_setting('cww_blog_number', 
    array(
        'sanitize_callback' => 'cww_portfolio_sanitize_number'
    )
);

$wp_customize->add_control( 'cww_blog_number', array(
            'label'             => esc_html__( 'No. Of Blogs', 'cww-portfolio' ),
            'description'       => esc_html__( 'No. of blogs to display on homepage.','cww-portfolio'),
            'section'           => 'cww_homepage_blog_section',
            'type'              => 'number',
            'priority'          => 55,
            
          ) );


$wp_customize->add_setting( 'cww_home_blog_design_accordion', 
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

//post offset
$wp_customize->add_setting('cww_blog_offsets', 
    array(
        'sanitize_callback' => 'cww_portfolio_sanitize_number'
    )
);

$wp_customize->add_control( 'cww_blog_offsets', array(
            'label'             => esc_html__( 'Offset', 'cww-portfolio' ),
            'description'       => esc_html__( 'Post offset.','cww-portfolio'),
            'section'           => 'cww_homepage_blog_section',
            'type'              => 'number',
            'priority'          => 60,
            
          ) );


$wp_customize->add_setting( 'cww_home_blog_design_accordion', 
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

$wp_customize->add_control( new CWW_Portfolio_Heading($wp_customize, 'cww_home_blog_design_accordion', 
    array(
        'label'             => esc_html__( 'Design Options', 'cww-companion' ),
        'section'           => 'cww_homepage_blog_section',
        'class'             => 'advanced-home-blog-design-accordion',
        'accordion'         => true,
        'expanded'          => true,
        'priority'          => 250,
        'controls_to_wrap'  => 5,
        
       )
    )
);


$wp_customize->add_setting( 'cww_blog_bg',
            array(
                'default'           => $default['cww_blog_bg'],
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'cww_portfolio_sanitize_color',
            )
        );
    

$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_blog_bg',
            array(
                'label'         => esc_html__( 'Background Color', 'cww-companion' ),
                'description'   => esc_html__('Change background color for blog section','cww-companion'),
                'section'       => 'cww_homepage_blog_section',
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