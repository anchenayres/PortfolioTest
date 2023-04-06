<?php
/**
* Header additional options
*
*
*/
if (  defined( 'CWW_PORTFOLIO_VER' ) ) {
$wp_customize->add_setting('cww_header_sticky_enable', 
		array(
	        'default'           	=> $default['cww_header_sticky_enable'],
	        'sanitize_callback' 	=> 'cww_portfolio_sanitize_checkbox',
		)
	);

$wp_customize->add_control( new CWW_Portfolio_Checkbox($wp_customize, 'cww_header_sticky_enable', 
	array(
	    'label' 			=> esc_html__( 'Sticyk Header', 'cww-portfolio' ),
	    'description' 		=> esc_html__('Enable or disable sticky header','cww-portfolio'),
	    'section'     		=> 'cww_header_section',
	    'priority'			=> 20,
	    
       )
    )
);
}