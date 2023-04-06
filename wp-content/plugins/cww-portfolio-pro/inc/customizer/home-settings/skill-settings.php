<?php
/**
* Skill settings for site
*
*
*/



$wp_customize->add_section( 'cww_homepage_skill_section', array(
    'title'    => esc_html__( 'Skill Section', 'cww-companion' ),
    'panel'    => 'cww_homepage_panel',
    'priority' => 25
    )
  );


if (  defined( 'CWW_PORTFOLIO_VER' ) ) {
    

    //enable or disable section
    $wp_customize->add_setting('cww_skill_enable', 
            array(
                'default'               => $default['cww_skill_enable'],
                'sanitize_callback'     => 'cww_portfolio_sanitize_checkbox',
            )
        );

    $wp_customize->add_control( new CWW_Portfolio_Checkbox($wp_customize, 'cww_skill_enable', 
        array(
            'label'             => esc_html__( 'Enable or Disable Section', 'cww-portfolio' ),
            'section'           => 'cww_homepage_skill_section',
            'priority'          => 1,
            
           )
        )
    );

}

//section title
$wp_customize->add_setting('cww_skill_title', array(
        
        'sanitize_callback' => 'sanitize_text_field',
        //'transport'         => 'postMessage'
	)
);

$wp_customize->add_control( 'cww_skill_title', array(
        'label'         	=> esc_html__( 'Skill Title', 'cww-companion' ),
        'section'       	=> 'cww_homepage_skill_section',
        'type'      		=> 'text',
        'priority'			=> 10,
       )
); 


$wp_customize->add_setting('cww_skill_subtitle', array(
        
        'sanitize_callback' => 'sanitize_text_field',
        //'transport'         => 'postMessage'
	)
);

$wp_customize->add_control( 'cww_skill_subtitle', array(
        'label'         	=> esc_html__( 'Skill Subtitle', 'cww-companion' ),
        'section'       	=> 'cww_homepage_skill_section',
        'type'      		=> 'text',
        'priority'			=> 20,
       )
); 


//Skill Item repeater
$wp_customize->add_setting( 'cww_skills_left', array(
    'sanitize_callback' => 'cww_companion_sanitize_repeater',
    'default' => json_encode(
        array(
            array(
                
                'skill_text'   	=> '',
                'percentage'  	=> '',
            )
        )
    )
));

$wp_customize->add_control(  new CWW_Companion_Repeater_Controler( $wp_customize, 'cww_skills_left', 
    array(
        'label'                     		=> esc_html__('Skill Options','cww-companion'),
        'description'               		=> esc_html__('Manage Skills','cww-companion'),
        'section'                   		=> 'cww_homepage_skill_section',
        'priority'							=> 50,
        'cww_companion_box_label'           => esc_html__('Skills','cww-companion'),
        'cww_companion_box_add_control'     => esc_html__('Add Skills','cww-companion'),
    ),
        array(
           

            'skill_text' => array(
            'type'        => 'text',
            'label'       => esc_html__( 'Skill Text', 'cww-companion' ),
            'default'     => '',
            'class'       => 'un-bottom-block-cat1'
            ),

            'percentage' => array(
            'type'        => 'text',
            'label'       => esc_html__( 'Percentage Value', 'cww-companion' ),
            'default'     => '',
            'class'       => 'un-bottom-block-cat1'
            )   
        )
));


if (  defined( 'CWW_PORTFOLIO_VER' ) ) {

    //Settings seperator
    $wp_customize->add_setting( 'cww_skill_section_info',array(
              'sanitize_callback' => 'sanitize_text_field'
          )
      );

    $wp_customize->add_control( new CWW_Portfolio_Customize_Seperator_Control($wp_customize, 'cww_skill_section_info',
          array(
              'label'       => esc_html__( 'Add More Skills Below', 'cww-companion' ),
               'section'    => 'cww_homepage_skill_section',
               'priority' 	=> 100,
            )
        )
    );

}

//section title
$wp_customize->add_setting('cww_skill_title2', array(
        
        'sanitize_callback' => 'sanitize_text_field',
        //'transport'         => 'postMessage'
	)
);

$wp_customize->add_control( 'cww_skill_title2', array(
        'label'         	=> esc_html__( 'Skill Title', 'cww-companion' ),
        'section'       	=> 'cww_homepage_skill_section',
        'type'      		=> 'text',
        'priority'			=> 110,
       )
); 


$wp_customize->add_setting('cww_skill_subtitle2', array(
        
        'sanitize_callback' => 'sanitize_text_field',
        //'transport'         => 'postMessage'
	)
);

$wp_customize->add_control( 'cww_skill_subtitle2', array(
        'label'         	=> esc_html__( 'Skill Subtitle', 'cww-companion' ),
        'section'       	=> 'cww_homepage_skill_section',
        'type'      		=> 'text',
        'priority'			=> 120,
       )
); 


//Skill Item repeater
$wp_customize->add_setting( 'cww_skills_left2', array(
    'sanitize_callback' => 'cww_companion_sanitize_repeater',
    'default' => json_encode(
        array(
            array(
                
                'skill_text'   	=> '',
                'percentage'  	=> '',
            )
        )
    )
));

$wp_customize->add_control(  new CWW_Companion_Repeater_Controler( $wp_customize, 'cww_skills_left2', 
    array(
        'label'                     		=> esc_html__('Skill Options','cww-companion'),
        'description'               		=> esc_html__('Manage Skills','cww-companion'),
        'section'                   		=> 'cww_homepage_skill_section',
        'priority'							=> 150,
        'cww_companion_box_label'           => esc_html__('Skills','cww-companion'),
        'cww_companion_box_add_control'     => esc_html__('Add Skills','cww-companion'),
    ),
        array(
           

            'skill_text' => array(
            'type'        => 'text',
            'label'       => esc_html__( 'Skill Text', 'cww-companion' ),
            'default'     => '',
            'class'       => 'un-bottom-block-cat1'
            ),

            'percentage' => array(
            'type'        => 'text',
            'label'       => esc_html__( 'Percentage Value', 'cww-companion' ),
            'default'     => '',
            'class'       => 'un-bottom-block-cat1'
            )   
        )
));


/* ============ Color Option ======================= */
/**
*  accordion for color options
*
*/
if (  defined( 'CWW_PORTFOLIO_VER' ) ) {

    $wp_customize->add_setting( 'cww_home_skill_design_accordion', 
            array(
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

    $wp_customize->add_control( new CWW_Portfolio_Heading($wp_customize, 'cww_home_skill_design_accordion', 
        array(
            'label'             => esc_html__( 'Design Options', 'cww-companion' ),
            'section'           => 'cww_homepage_skill_section',
            'class'             => 'advanced-home-skill-design-accordion',
            'accordion'         => true,
            'expanded'          => true,
            'priority'          => 250,
            'controls_to_wrap'  => 3,
            
           )
        )
    );

}

if (  defined( 'CWW_PORTFOLIO_VER' ) ) {

    //section bg color
    $wp_customize->add_setting( 'cww_skill_bg',
                array(
                    'default'           => $default['cww_skill_bg'],
                    'type'              => 'theme_mod',
                    'capability'        => 'edit_theme_options',
                    'sanitize_callback' => 'cww_portfolio_sanitize_color',
                )
            );
        

    $wp_customize->add_control( new Customizer_Alpha_Color_Control( $wp_customize, 'cww_skill_bg',
                array(
                    'label'         => esc_html__( 'Background Color', 'cww-companion' ),
                    'description'   => esc_html__('Change background color for skill section','cww-companion'),
                    'section'       => 'cww_homepage_skill_section',
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