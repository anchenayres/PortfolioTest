<?php
/**
 * Home Page Options.
 *
 * @package Creativ Portfolio
 */

$default = creativ_portfolio_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Home Page Sections', 'creativ-portfolio' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/home-sections/introduction.php';
require get_template_directory() . '/inc/customizer/home-sections/skills.php';
require get_template_directory() . '/inc/customizer/home-sections/call-to-action.php';

