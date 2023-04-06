<?php 


function cww_porfolio_pro_customizer_reset_defaults($wp_customize){

$sections = array( 'p_typography', 'menu_typography', 'h1_typography', 'h2_typography', 'h3_typography', 'h4_typography', 'h5_typography', 'h6_typography');

foreach( $sections as $section ){
	
	$wp_customize->add_control( $section.'_reset_button_id', array(
		    'type' => 'button',
		   	'settings' => array(), 
		    'priority' => 1,
		    'section' => $section,
		    'description' => esc_html__('If you want to reset your styles to default values just press the button and reload once.','cww-portfolio-pro'),
		    'input_attrs' => array(
		        'value' => esc_html__( 'Reset To Default', 'cww-portfolio-pro' ),
		        'class' => 'button button-primary',
		    ),
	) );

}




}
add_action( 'customize_register', 'cww_porfolio_pro_customizer_reset_defaults',35 );
