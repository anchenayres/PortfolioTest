<?php 
/**
* Options for dark mode
*
*
*/
$wp_customize->add_section( 'cww_additional_dark_section', array(
    'title'    => esc_html__( 'Dark Mode', 'cww-companion' ),
    'panel'    => 'cww_additional_panel',
    'priority' => 25
    )
  );


if (  defined( 'CWW_PORTFOLIO_VER' ) ) {

        //enable dark mode
        $wp_customize->add_setting('cww_dark_mode_enable', 
        		array(
        	        'default'           	=> $default['cww_dark_mode_enable'],
        	        'sanitize_callback' 	=> 'cww_portfolio_sanitize_checkbox',
        	        
        		)
        	);

        $wp_customize->add_control( new CWW_Portfolio_Checkbox($wp_customize, 'cww_dark_mode_enable', 
        	array(
        	    'label' 			=> esc_html__( 'Enable Dark Mode', 'cww-portfolio' ),
        	    'section'     		=> 'cww_additional_dark_section',
        	    'priority'			=> 10,
        	    
               )
            )
        );

}

$wp_customize->add_setting('cww_dark_mode_position', array(
        'default' 			=> $default['cww_dark_mode_position'],
        'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control( 'cww_dark_mode_position', array(
        'label'         	=> esc_html__( 'Screen Position', 'cww-companion' ),
        'section'       	=> 'cww_additional_dark_section',
        'priority'			=> 20,
        'type'      		=> 'select',
        'choices' 			=> array(
        	'bottom-left' 	=> esc_html__('Bottom Left','cww-portfolio-pro'),
        	'bottom-right' 	=> esc_html__('Bottom Right','cww-portfolio-pro')
        )
        
       )
); 

//dark mode logo
$wp_customize->add_setting( 'cww_logo_dark',array(
        'sanitize_callback' => 'esc_url_raw',
         
    	)
	);

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'cww_logo_dark',
      array(
          'label'       => esc_html__( 'Upload Logo', 'cww-companion' ),
          'description' => esc_html__('Upload logo for dark mode','cww-companion'),
           'section'   	=> 'cww_additional_dark_section',
           'priority'	=> 30,
        )
    )
);