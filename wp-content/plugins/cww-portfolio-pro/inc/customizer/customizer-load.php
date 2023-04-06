<?php
/*if( ! defined('CWW_PORTFOLIO_VER')){
	return;
}*/

add_action( 'customize_register', 'cww_pp_controllers_customize_register', 20 );
function cww_pp_controllers_customize_register( $wp_customize ) {

	$default = cww_portfolio_pro_customizer_defaults();
    
    $additional = CWW_PP_PATH.'/inc/customizer/additional-settings/';
    $file_home 	= CWW_PP_PATH.'/inc/customizer/home-settings/';
    $file_cust 	= CWW_PP_PATH.'/inc/customizer/';

	$file_paths = array(

		$file_home.'skill-settings',
		$additional.'additional-settings',
		$additional.'dark-mode',
		$additional.'scroll-top',
		$file_cust.'header-settings',
		$file_home.'banner-settings',
		$file_home.'woo-settings',
		$file_home.'about-settings',
		$file_home.'service-settings',
		$file_home.'portfolio-settings',
		$file_home.'blog-settings',
		$file_home.'contact-settings',
		$file_cust.'social-icons',
		$file_cust.'preloaders',
		$file_cust.'typography/range/class-control-range',
		$file_cust.'typography/typography',
		$file_cust.'typography/customizer-reset/init',


	);

	foreach ( $file_paths as $file_path ){

		require $file_path.'.php'; 
	}


	//redefining section priority for section reorder
	if (  defined( 'CWW_PORTFOLIO_VER' ) ) {
    $wp_customize->get_section( 'cww_homepage_about_section' )->priority        = cww_pp_get_section_position('cww_homepage_about_section');
    $wp_customize->get_section( 'cww_homepage_skill_section' )->priority        = cww_pp_get_section_position('cww_homepage_skill_section');
    $wp_customize->get_section( 'cww_homepage_cta_section' )->priority        	= cww_pp_get_section_position('cww_homepage_cta_section');
    $wp_customize->get_section( 'cww_homepage_service_section' )->priority      = cww_pp_get_section_position('cww_homepage_service_section');
    $wp_customize->get_section( 'cww_homepage_portfolio_section' )->priority    = cww_pp_get_section_position('cww_homepage_portfolio_section');
    $wp_customize->get_section( 'cww_homepage_blog_section' )->priority    		= cww_pp_get_section_position('cww_homepage_blog_section');
    $wp_customize->get_section( 'cww_homepage_contact_section' )->priority    	= cww_pp_get_section_position('cww_homepage_contact_section');
	}
    
}