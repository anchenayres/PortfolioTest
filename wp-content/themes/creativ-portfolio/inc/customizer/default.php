<?php
/**
 * Default theme options.
 *
 * @package Creativ Portfolio
 */

if ( ! function_exists( 'creativ_portfolio_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function creativ_portfolio_get_default_theme_options() {

	$defaults = array();

    // Homepage Options
	$defaults['enable_frontpage_content'] 			= true;

	// Introduction	
	$defaults['enable_introduction_section']		= false;
	$defaults['introduction_image']				    = esc_url( get_template_directory_uri() . '/assets/images/bg.jpg' );

	$defaults['introduction_subtitle']				= esc_html__( 'I am WordPress Developer', 'creativ-portfolio' );
	$defaults['introduction_title']				    = esc_html__( 'Kristina Somolyer', 'creativ-portfolio' );
	$defaults['introduction_content']				= esc_html__( 'We work with a diverse selection of clients, from small start-ups to established companies and organisations.', 'creativ-portfolio' );
	$defaults['introduction_btn_text_one']		    = esc_html__( 'View Portfolio', 'creativ-portfolio' );
	$defaults['introduction_btn_text_two']		    = esc_html__( 'Contact Me', 'creativ-portfolio' );
	$defaults['introduction_hero_image']		    = esc_url( get_template_directory_uri() . '/assets/images/hero.png' );

	// Skills
	$defaults['enable_skills_section']				= false;
	$defaults['skills_section_title']				= esc_html__( 'My Skills', 'creativ-portfolio' );
	$defaults['skills_section_subtitle']			= esc_html__( 'We work with a diverse selection of clients, from small start-ups to established companies and organisations.', 'creativ-portfolio' );
	$defaults['number_of_skills_items']				= 8;

	// Call to action	
	$defaults['enable_call_to_action_section']	   	= false;
	$defaults['call_to_action_title']	   	 		= esc_html__( 'Ready to start your project ?', 'creativ-portfolio' );
		$defaults['call_to_action_subtitle']		= esc_html__( 'We work with a diverse selection of clients, from small start-ups to established companies and organisations.', 'creativ-portfolio' );
	$defaults['call_to_action_button_label']	   	= esc_html__( 'Contact Now', 'creativ-portfolio' );
	$defaults['call_to_action_button_url']	   	 	= '#';

	//General Section
	$defaults['your_latest_posts_title']			= esc_html__('Blog','creativ-portfolio');
	$defaults['excerpt_length']						= 15;
	$defaults['layout_options_blog']				= 'no-sidebar';
	$defaults['layout_options_archive']				= 'no-sidebar';
	$defaults['layout_options_page']				= 'no-sidebar';	
	$defaults['layout_options_single']				= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']					= esc_html__( '© Copyright 2023 Portfolio Name | All Rights Reserved.', 'creativ-portfolio' );

	// Pass through filter.
	$defaults = apply_filters( 'creativ_portfolio_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'creativ_portfolio_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function creativ_portfolio_get_option( $key ) {

		$default_options = creativ_portfolio_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;