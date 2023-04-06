<?php
/**
 * Introduction section.
 *
 * @package Creativ Portfolio
 */

$default = creativ_portfolio_get_default_theme_options();

// Featured Introduction Section
$wp_customize->add_section( 'section_introduction',
	array(
	'title'      => __( 'Introduction', 'creativ-portfolio' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Introduction Section
$wp_customize->add_setting('theme_options[enable_introduction_section]', 
	array(
	'default' 			=> $default['enable_introduction_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_portfolio_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_introduction_section]', 
	array(		
	'label' 	=> __('Enable Section', 'creativ-portfolio'),
	'section' 	=> 'section_introduction',
	'settings'  => 'theme_options[enable_introduction_section]',
	'type' 		=> 'checkbox',	
	)
);

// Background Image
$wp_customize->add_setting('theme_options[introduction_image]', 
	array(
	'default' 			=> $default['introduction_image'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_portfolio_sanitize_image'
	)
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
	'theme_options[introduction_image]', 
	array(
	'label'       		=> __('Background Image', 'creativ-portfolio'),
	'section'     		=> 'section_introduction',   
	'settings'    		=> 'theme_options[introduction_image]',		
	'active_callback' 	=> 'creativ_portfolio_introduction_active',
	'type'        		=> 'image',
	)
	)
);

// Subtitle
$wp_customize->add_setting('theme_options[introduction_subtitle]', 
	array(
	'default' 			=> $default['introduction_subtitle'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[introduction_subtitle]', 
	array(
	'label'       => __('Position', 'creativ-portfolio'),
	'section'     => 'section_introduction',   
	'settings'    => 'theme_options[introduction_subtitle]',		
	'active_callback' => 'creativ_portfolio_introduction_active',		
	'type'        => 'text'
	)
);

// Title
$wp_customize->add_setting('theme_options[introduction_title]', 
	array(
	'default' 			=> $default['introduction_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[introduction_title]', 
	array(
	'label'       => __('Name', 'creativ-portfolio'),
	'section'     => 'section_introduction',   
	'settings'    => 'theme_options[introduction_title]',		
	'active_callback' => 'creativ_portfolio_introduction_active',		
	'type'        => 'text'
	)
);

// Content
$wp_customize->add_setting('theme_options[introduction_content]', 
	array(
	'default' 			=> $default['introduction_content'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_portfolio_sanitize_textarea_content'
	)
);

$wp_customize->add_control('theme_options[introduction_content]', 
	array(
	'label'       => __('Description', 'creativ-portfolio'),
	'section'     => 'section_introduction',   
	'settings'    => 'theme_options[introduction_content]',		
	'active_callback' => 'creativ_portfolio_introduction_active',		
	'type'        => 'textarea'
	)
);

// Button Text One
$wp_customize->add_setting('theme_options[introduction_btn_text_one]', 
	array(
	'default' 			=> $default['introduction_btn_text_one'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[introduction_btn_text_one]', 
	array(
	'label'       => __('Button Label One', 'creativ-portfolio'),
	'section'     => 'section_introduction',   
	'settings'    => 'theme_options[introduction_btn_text_one]',		
	'active_callback' => 'creativ_portfolio_introduction_active',		
	'type'        => 'text'
	)
);

// Button Url One
$wp_customize->add_setting('theme_options[introduction_btn_url_one]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control('theme_options[introduction_btn_url_one]', 
	array(
	'label'       => __('Button Url One', 'creativ-portfolio'),
	'section'     => 'section_introduction',   
	'settings'    => 'theme_options[introduction_btn_url_one]',		
	'active_callback' => 'creativ_portfolio_introduction_active',		
	'type'        => 'url'
	)
);

// Button Text Two
$wp_customize->add_setting('theme_options[introduction_btn_text_two]', 
	array(
	'default' 			=> $default['introduction_btn_text_two'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[introduction_btn_text_two]', 
	array(
	'label'       => __('Button Label Two', 'creativ-portfolio'),
	'section'     => 'section_introduction',   
	'settings'    => 'theme_options[introduction_btn_text_two]',		
	'active_callback' => 'creativ_portfolio_introduction_active',		
	'type'        => 'text'
	)
);

// Button Url Two
$wp_customize->add_setting('theme_options[introduction_btn_url_two]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control('theme_options[introduction_btn_url_two]', 
	array(
	'label'       => __('Button Url Two', 'creativ-portfolio'),
	'section'     => 'section_introduction',   
	'settings'    => 'theme_options[introduction_btn_url_two]',		
	'active_callback' => 'creativ_portfolio_introduction_active',		
	'type'        => 'url'
	)
);

// Image
$wp_customize->add_setting('theme_options[introduction_hero_image]', 
	array(
	'default' 			=> $default['introduction_hero_image'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_portfolio_sanitize_image'
	)
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
	'theme_options[introduction_hero_image]', 
	array(
	'label'       		=> __('Image', 'creativ-portfolio'),
	'section'     		=> 'section_introduction',   
	'settings'    		=> 'theme_options[introduction_hero_image]',		
	'active_callback' 	=> 'creativ_portfolio_introduction_active',
	'type'        		=> 'image',
	)
	)
);