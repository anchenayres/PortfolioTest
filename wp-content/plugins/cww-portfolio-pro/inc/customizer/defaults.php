<?php
/**
* Default settings for theme customizer
*
*
*/
if( ! function_exists('cww_portfolio_pro_customizer_defaults')):
	function cww_portfolio_pro_customizer_defaults(){

		$defaults = array();

		$defaults['cww_dark_mode_enable']                 	= 0;
		$defaults['cww_dark_mode_position'] 				= 'bottom-left';
		$defaults['cww_header_sticky_enable'] 				= 1;
		$defaults['cww_scroll_top_enable'] 					= 1;
		$defaults['cww_banner_moving_text_enable'] 			= 0;
		$defaults['cww_woo_section_enable'] 				= 1;
		$defaults['cww_skill_enable'] 						= 1;
		$defaults['cww_icon_banner_bg'] 					= '#e67a85';
		$defaults['cww_about_bg'] 							= '#fff';
		$defaults['cww_woo_bg'] 							= '#fff';
		$defaults['cww_woo_product_border'] 				= '#f1f1f1';
		$defaults['cww_skill_bg']							= 'rgba(249, 86, 79, 0.06)';
		$defaults['cww_service_bg'] 						= '#fff';
		$defaults['cww_service_hover'] 						= '#efebf8';
		$defaults['cww_service_icon'] 						= '#404040';
		$defaults['cww_service_title_color'] 				= '#11204d';
		$defaults['cww_service_desc'] 						= '#666';
		$defaults['cww_portfolio_bg'] 						= 'rgba(249,86,79,0.04)';
		$defaults['cww_blog_bg'] 							= '#fff';
		$defaults['cww_contact_bg'] 						= 'rgba(249,86,79,0.04)';
		$defaults['cww_portfolio_content_type'] 			= 'page';
		$defaults['cww_portfolio_count'] 					= 5;

		$defaults['cww_icon_yt'] 							= '';
		$defaults['cww_icon_pin'] 							= '';
		$defaults['cww_icon_whatsapp'] 						= '';
		$defaults['cww_icon_email'] 						= '';
		
		$defaults['cww_pfp_preloader_enable'] 							= 1;
		$defaults['cww_portfolio_pro_preloader_lists'] 					= 'preloader1';
		$defaults['cww_portfolio_pro_preloader_btn_text'] 				= esc_html__('Hide Preloader','cww-portfolio-pro');
		$defaults['cww_portfolio_pro_preloader_bg_color'] 				= '#fff';
		$defaults['cww_portfolio_pro_preloader_btn_bg_color'] 			= '#333';
		$defaults['cww_portfolio_pro_preloader_btn_bg_color_hover'] 	= '#666';

			
		

		return $defaults;
	}
endif;