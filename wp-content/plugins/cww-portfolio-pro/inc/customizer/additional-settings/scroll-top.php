<?php 
/**
* Scroll to top button
*
*
*/
$wp_customize->add_section( 'cww_additional_scroll_top_section', array(
    'title'    => esc_html__( 'Scroll To Top', 'cww-companion' ),
    'panel'    => 'cww_additional_panel',
    'priority' => 30
    )
  );

if (  defined( 'CWW_PORTFOLIO_VER' ) ) {
//enable dark mode
$wp_customize->add_setting('cww_scroll_top_enable', 
		array(
	        'default'           	=> $default['cww_scroll_top_enable'],
	        'sanitize_callback' 	=> 'cww_portfolio_sanitize_checkbox',
	        
		)
	);

$wp_customize->add_control( new CWW_Portfolio_Checkbox($wp_customize, 'cww_scroll_top_enable', 
	array(
	    'label' 			=> esc_html__( 'Enable Scroll To Top', 'cww-portfolio-pro' ),
	    'description' 		=> esc_html__(' Enable or disable scroll to top button','cww-portfolio-pro'),
	    'section'     		=> 'cww_additional_scroll_top_section',
	    'priority'			=> 10,
	    
       )
    )
);

}