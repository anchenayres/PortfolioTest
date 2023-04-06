<?php
if (  defined( 'CWW_PORTFOLIO_VER' ) ) {

$prefix         = 'cww_portfolio_pro';
$default        = cww_portfolio_pro_customizer_defaults();
$thDefault      = cww_portfolio_customizer_defaults();

$preloaders_lists = array(
                'preloader1'  => esc_html__( 'Preloader 1', 'cww-portfolio-pro' ),
                'preloader2'  => esc_html__( 'Preloader 2', 'cww-portfolio-pro' ),
                'preloader3'  => esc_html__( 'Preloader 3', 'cww-portfolio-pro' ),
                'preloader4'  => esc_html__( 'Preloader 4', 'cww-portfolio-pro' ),
                'preloader5'  => esc_html__( 'Preloader 5', 'cww-portfolio-pro' ),
                'preloader6'  => esc_html__( 'Preloader 6', 'cww-portfolio-pro' ),
                'preloader7'  => esc_html__( 'Preloader 7', 'cww-portfolio-pro' ),
                'preloader8'  => esc_html__( 'Preloader 8', 'cww-portfolio-pro' ),
                'preloader9'  => esc_html__( 'Preloader 9', 'cww-portfolio-pro' ),
                'preloader10' => esc_html__( 'Preloader 10', 'cww-portfolio-pro' ),
                'preloader11' => esc_html__( 'Preloader 11', 'cww-portfolio-pro' ),
                'preloader12' => esc_html__( 'Preloader 12', 'cww-portfolio-pro' ),
                'preloader13' => esc_html__( 'Preloader 13', 'cww-portfolio-pro' ),
                'preloader14' => esc_html__( 'Preloader 14', 'cww-portfolio-pro' ),
                'preloader15' => esc_html__( 'Preloader 15', 'cww-portfolio-pro' ),
                'preloader16' => esc_html__( 'Preloader 16', 'cww-portfolio-pro' ),
                'preloader17' => esc_html__( 'Preloader 17', 'cww-portfolio-pro' ),
                'preloader18' => esc_html__( 'Preloader 18', 'cww-portfolio-pro' ),
                'custom'      => esc_html__( 'Custom Preloader', 'cww-portfolio-pro' ),
                  );

$wp_customize->add_section( 'cww_additional_preloader_section', array(
    'title'    => esc_html__( 'Preloader Options', 'cww-companion' ),
    'panel'    => 'cww_additional_panel',
    'priority' => 45
    )
  );

$wp_customize->add_setting( $prefix.'_preloader_sec_sep', array(
        'sanitize_callback'   => 'sanitize_text_field',        
      ) );

$wp_customize->add_control( new CWW_Portfolio_Customize_Seperator_Control( $wp_customize, $prefix.'_preloader_sec_sep', array(
        'label'         => esc_html__( 'Preloader Options', 'cww-portfolio-pro' ),
        'section'       => 'cww_additional_preloader_section',
        'priority'      => 5,
      ) ) );


$wp_customize->add_setting('cww_pfp_preloader_enable', 
        array(
            'default'               => $default['cww_pfp_preloader_enable'],
            'sanitize_callback'     => 'cww_portfolio_sanitize_checkbox',
        )
    );

$wp_customize->add_control( new CWW_Portfolio_Checkbox($wp_customize, 'cww_pfp_preloader_enable', 
    array(
        'label'             => esc_html__( 'Enable or Disable Preloader', 'cww-portfolio' ),
        'section'           => 'cww_additional_preloader_section',
        'priority'          => 1,
        
       )
    )
);


//preloader list options
$wp_customize->add_setting( $prefix.'_preloader_lists', array(
  'default'             => $default[$prefix.'_preloader_lists'],
  'sanitize_callback'   => 'esc_html',
) );

$wp_customize->add_control( $prefix.'_preloader_lists', array(
        'label'         => esc_html__( 'Select Preloader Type', 'cww-portfolio-pro' ),
        'section'       => 'cww_additional_preloader_section',
        'priority'      => 7,
        'type'          => 'select',
        'choices'       => $preloaders_lists
        
      ) );

/**
 * Preloader Button Text
 * @since 1.1.3
 * */      
$wp_customize->add_setting( $prefix.'_preloader_btn_text', array(
    'default'             => $default[$prefix.'_preloader_btn_text'],
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  
  $wp_customize->add_control( $prefix.'_preloader_btn_text', array(
          'label'         => esc_html__( 'Preloader Button Text', 'cww-portfolio-pro' ),
          'section'       => 'cww_additional_preloader_section',
          'priority'      => 7,
          'type'          => 'text',
          
        ) );

//custom preloader 
$wp_customize->add_setting( $prefix.'_preloader_custom', array(
  'sanitize_callback'   => 'esc_url_raw',
) );
$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           $prefix.'_preloader_custom',
           array(
               'label'          => esc_html__( 'Upload Custom Preloader', 'cww-portfolio-pro' ),
               'description'    => esc_html__('Upload gif image for best user interface','cww-portfolio-pro'),
               'section'        => 'cww_additional_preloader_section',
               'priority'       => 8,
           )
       )
   );

//preloader color
$wp_customize->add_setting($prefix.'_preloader_color', array(
        'default'           => $thDefault['cww_theme_color'],
        'sanitize_callback' => 'cww_portfolio_sanitize_color',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_preloader_color', array(
            'label'         => esc_html__( 'Preloader Color', 'cww-portfolio-pro' ),
            'section'       => 'cww_additional_preloader_section',
            'priority'      => 9,
)));


$wp_customize->add_setting($prefix.'_preloader_bg_color', array(
        'default'           => $default[$prefix.'_preloader_bg_color'],
        'sanitize_callback' => 'cww_portfolio_sanitize_color',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_preloader_bg_color', array(
            'label'         => esc_html__( 'Preloader Background Color', 'cww-portfolio-pro' ),
            'section'       => 'cww_additional_preloader_section',
            'priority'      => 10,
)));

//preloader hide button bg color
$wp_customize->add_setting($prefix.'_preloader_btn_bg_color', array(
        'default'           => $default[$prefix.'_preloader_btn_bg_color'],
        'sanitize_callback' => 'cww_portfolio_sanitize_color',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_preloader_btn_bg_color', array(
            'label'         => esc_html__( 'Preloader Button Background Color', 'cww-portfolio-pro' ),
            'section'       => 'cww_additional_preloader_section',
            'priority'      => 15,
)));

//button hover
$wp_customize->add_setting($prefix.'_preloader_btn_bg_color_hover', array(
        'default'           => $default[$prefix.'_preloader_btn_bg_color_hover'],
        'sanitize_callback' => 'cww_portfolio_sanitize_color',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,$prefix.'_preloader_btn_bg_color_hover', array(
            'label'         => esc_html__( 'Preloader Button Background Color:hover', 'cww-portfolio-pro' ),
            'section'       => 'cww_additional_preloader_section',
            'priority'      => 20,
)));

}