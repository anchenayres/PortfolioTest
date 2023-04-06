<?php
/**
 * Skills Section.
 *
 * @package Creativ Portfolio
 */

$default = creativ_portfolio_get_default_theme_options();

// Our Services Section
$wp_customize->add_section( 'section_skills',
	array(
	'title'      => __( 'My Skills', 'creativ-portfolio' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Our Services Section
$wp_customize->add_setting('theme_options[enable_skills_section]', 
	array(
	'default' 			=> $default['enable_skills_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_portfolio_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_skills_section]', 
	array(		
	'label' 	=> __('Enable Section', 'creativ-portfolio'),
	'section' 	=> 'section_skills',
	'settings'  => 'theme_options[enable_skills_section]',
	'type' 		=> 'checkbox',	
	)
);

// Section Title
$wp_customize->add_setting('theme_options[skills_section_title]', 
	array(
	'default'           => $default['skills_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[skills_section_title]', 
	array(
	'label'       => __('Section Title', 'creativ-portfolio'),
	'section'     => 'section_skills',   
	'settings'    => 'theme_options[skills_section_title]',	
	'active_callback' => 'creativ_portfolio_skills_active',		
	'type'        => 'text'
	)
);

// Section Subtitle
$wp_customize->add_setting('theme_options[skills_section_subtitle]', 
	array(
	'default'           => $default['skills_section_subtitle'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_portfolio_sanitize_textarea_content'
	)
);

$wp_customize->add_control('theme_options[skills_section_subtitle]', 
	array(
	'label'       => __('Section Subtitle', 'creativ-portfolio'),
	'section'     => 'section_skills',   
	'settings'    => 'theme_options[skills_section_subtitle]',	
	'active_callback' => 'creativ_portfolio_skills_active',		
	'type'        => 'textarea'
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_skills_items]', 
	array(
	'default' 			=> $default['number_of_skills_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_portfolio_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_skills_items]', 
	array(
	'label'       => __('Number Of Items', 'creativ-portfolio'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 50.', 'creativ-portfolio'),
	'section'     => 'section_skills',   
	'settings'    => 'theme_options[number_of_skills_items]',		
	'type'        => 'number',
	'active_callback' => 'creativ_portfolio_skills_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 50,
			'step'	=> 1,
		),
	)
);

$number_of_skills_items = creativ_portfolio_get_option( 'number_of_skills_items' );

for( $i=1; $i<=$number_of_skills_items; $i++ ) {

	// Title
	$wp_customize->add_setting('theme_options[skills_title_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[skills_title_'.$i.']', 
		array(
		'label'       		=> sprintf( __('Skill Title #%1$s', 'creativ-portfolio'), $i),
		'section'     		=> 'section_skills',   
		'settings'    		=> 'theme_options[skills_title_'.$i.']',		
		'active_callback' 	=> 'creativ_portfolio_skills_active',		
		'type'        		=> 'text'
		)
	);

	// Content
	$wp_customize->add_setting('theme_options[skills_percentage_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[skills_percentage_'.$i.']', 
		array(
		'label'       		=> sprintf( __('Skill Percentage #%1$s', 'creativ-portfolio'), $i),
		'section'     		=> 'section_skills',   
		'settings'    		=> 'theme_options[skills_percentage_'.$i.']',		
		'active_callback' 	=> 'creativ_portfolio_skills_active',		
		'type'        		=> 'text'
		)
	);
}