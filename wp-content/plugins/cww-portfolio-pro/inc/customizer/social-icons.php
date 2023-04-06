<?php
/**
* Social Icons Settings
*
*
*/

$icon_arrays = array(

	'cww_icon_yt'		=> esc_html__('YouTube','cww-portfolio'),
	'cww_icon_pin' 		=> esc_html__('Pinterest','cww-portfolio'),
	'cww_icon_whatsapp' => esc_html__('WhatsApp','cww-portfolio'),
	'cww_icon_email' 	=> esc_html__('Email','cww-portfolio'),

);

foreach( $icon_arrays as 	$key => $value ){

	$wp_customize->add_setting( $key , array(
	    'default'               => $default[$key],
	    'sanitize_callback'     => 'esc_url_raw',
	  ) );

	$wp_customize->add_control( $key , array(
        'label'         => $value,
        'description'   => esc_html__('Add url for your social media page','cww-portfolio'),
        'section'       => 'cww_social_icons_section',
        'type'      	=> 'text',
        
      ) );

}