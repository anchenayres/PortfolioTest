<?php
/**
* WooCommerce settings for site
*
*
*/
if( ! class_exists('woocommerce')){
    return;
}
$categories = get_categories( array( 'taxonomy' => 'product_cat', 'hide_empty' => 1 ) );

$pcat = array();
foreach ( $categories as $cat ) {
    
    if ( is_object( $cat ) ) {
        $pcat[ $cat->term_id  ] = $cat->name;
    }
}


$wp_customize->add_section( 'cww_homepage_woo_section', array(
    'title'    => esc_html__( 'Product Section', 'cww-companion' ),
    'panel'    => 'cww_homepage_panel',
    'priority' => 26
    )
  );

//enable or disable product section
$wp_customize->add_setting('cww_woo_section_enable', 
        array(
            'default'               => $default['cww_woo_section_enable'],
            'sanitize_callback'     => 'cww_portfolio_sanitize_checkbox',
        )
    );

$wp_customize->add_control( new CWW_Portfolio_Checkbox($wp_customize, 'cww_woo_section_enable', 
    array(
        'label'             => esc_html__( 'Enable Product Section', 'cww-portfolio' ),
        'description'       => esc_html__('Enable or disable product section','cww-portfolio'),
        'section'           => 'cww_homepage_woo_section',
        'priority'          => 20,
        
       )
    )
);


$wp_customize->add_setting('cww_woo_title', array(
        
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control( 'cww_woo_title', array(
        'label'             => esc_html__( 'Section Title', 'cww-companion' ),
        'section'           => 'cww_homepage_woo_section',
        'type'              => 'text',
        'priority'          => 30,
       )
); 


$wp_customize->add_setting('cww_woo_subtitle', array(
        
        'sanitize_callback' => 'sanitize_text_field',
        
    )
);

$wp_customize->add_control( 'cww_woo_subtitle', array(
        'label'             => esc_html__( 'Section Subtitle', 'cww-companion' ),
        'section'           => 'cww_homepage_woo_section',
        'type'              => 'text',
        'priority'          => 40,
       )
); 


$wp_customize->add_setting('cww_woo_cat', array(
        
        'sanitize_callback' => 'sanitize_text_field',
        
    )
);

$wp_customize->add_control( 'cww_woo_cat', array(
        'label'             => esc_html__( 'Section Subtitle', 'cww-companion' ),
        'section'           => 'cww_homepage_woo_section',
        'type'              => 'select',
        'choices'           => $pcat,
        'priority'          => 50,
       )
); 

/* ============ Color Option ======================= */
/**
*  accordion for color options
*
*/
$wp_customize->add_setting( 'cww_home_woo_design_accordion', 
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

$wp_customize->add_control( new CWW_Portfolio_Heading($wp_customize, 'cww_home_woo_design_accordion', 
    array(
        'label'             => esc_html__( 'Design Options', 'cww-companion' ),
        'section'           => 'cww_homepage_woo_section',
        'class'             => 'advanced-home-woo-design-accordion',
        'accordion'         => true,
        'expanded'          => true,
        'priority'          => 100,
        'controls_to_wrap'  => 3,
        
       )
    )
);

//section bg color
$wp_customize->add_setting( 'cww_woo_bg',
            array(
                'default'           => $default['cww_woo_bg'],
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'cww_portfolio_sanitize_color',
            )
        );
    

$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_woo_bg',
            array(
                'label'         => esc_html__( 'Background Color', 'cww-companion' ),
                'description'   => esc_html__('Change background color for product section','cww-companion'),
                'section'       => 'cww_homepage_woo_section',
                'priority'      => 150,
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


$wp_customize->add_setting( 'cww_woo_product_border',
            array(
                'default'           => $default['cww_woo_product_border'],
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'cww_portfolio_sanitize_color',
            )
        );
    

$wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_woo_product_border',
            array(
                'label'         => esc_html__( 'Products Border', 'cww-companion' ),
                'description'   => esc_html__('Change color for product borders','cww-companion'),
                'section'       => 'cww_homepage_woo_section',
                'priority'      => 150,
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