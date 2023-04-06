<?php 
/**
* Lists all required files for the customizer reset option
*
* @package CWW Portfolio Pro
* @author Code Work Web
* @since 1.0.0
*
*/
if( ! function_exists('cww_portfolio_pro_customizer_reset_scripts') ){
	
	function cww_portfolio_pro_customizer_reset_scripts(){

		wp_enqueue_script( 'cww-portfolio-pro-reset-script', CWW_PP_URL .'/inc/customizer/typography/customizer-reset/reset.js', array( 'jquery','jquery-ui-button','customize-controls' ),1256, true );
    	wp_localize_script( 'cww-portfolio-pro-reset-script', 'cww_portfolio_pro_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php') ) );
	}
}
add_action( 'admin_enqueue_scripts', 'cww_portfolio_pro_customizer_reset_scripts' );


/**
* File containing functions to reset customizer
*/
require CWW_PP_PATH . '/inc/customizer/typography/customizer-reset/reset-functions.php';


/**
*
* File for customizer 
*/
require CWW_PP_PATH . '/inc/customizer/typography/customizer-reset/customizer-reset.php';