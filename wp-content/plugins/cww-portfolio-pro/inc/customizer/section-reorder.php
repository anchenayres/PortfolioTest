<?php
/**
* Functions useful for section reorder
*
*
*
*/

if( ! function_exists('cww_pp_sections_positions')):
	function cww_pp_sections_positions() {
			$defaults = array(
				'cww_homepage_about_section',
				'cww_homepage_skill_section',
				'cww_homepage_cta_section',
				'cww_homepage_service_section',
				'cww_homepage_portfolio_section',
				'cww_homepage_blog_section',
				'cww_homepage_contact_section'
			);
			$sections = get_theme_mod( 'cww_pp_frontpage_sections', $defaults );
			return $sections;
			
	}
endif;


if ( ! function_exists( 'cww_pp_get_section_position' ) ) {
	function cww_pp_get_section_position( $key ) {
		$sections = cww_pp_sections_positions();
		$position = array_search( $key, $sections );
		$return   = ( $position + 1 ) * 10;
		return $return;
	}
}


add_action( 'wp_ajax_cww_pp_order_sections', 'cww_pp_order_sections' );
function cww_pp_order_sections() {

	if ( isset( $_POST['sections'] ) ) {

		set_theme_mod( 'cww_pp_frontpage_sections', $_POST['sections'] );
		echo 'succes';
	}
	wp_die();
}


add_action('init','cww_pp_enable_disable_section',20);
function cww_pp_enable_disable_section(){
    $section_lists = cww_pp_sections_positions();
    if(empty($section_lists)){
    	return;
    }
   
    
    foreach( $section_lists as $key => $section_list ){
    	/*var_dump($section_list);*/
    	$key = ($key + 10) * 2 ; //for increasing value so it is always greater than banner action 
    	
    	if( 'navigation_panel_install_companion_inside' != $section_list ){
    		
    		switch($section_list){

	    		case 'cww_homepage_skill_section':
	            	remove_action('cww_portfolio_home'	,'cww_pp_skill_section', 22 );
	            	add_action('cww_portfolio_home' 	,'cww_pp_skill_section', $key );
	            break;

	            case 'cww_homepage_about_section':
	            	remove_action('cww_portfolio_home'	,'cww_portfolio_about', 20 );
	            	add_action('cww_portfolio_home'		,'cww_portfolio_about', $key );
	            break;

	            case 'cww_homepage_cta_section':
	            	remove_action('cww_portfolio_home'	,'cww_portfolio_cta', 30 );
	            	add_action('cww_portfolio_home'		,'cww_portfolio_cta', $key );
	            break;

	            case 'cww_homepage_service_section':
	            	remove_action('cww_portfolio_home'	,'cww_portfolio_service', 40 );
	            	add_action('cww_portfolio_home'		,'cww_portfolio_service', $key );
	            break;


	            case 'cww_homepage_portfolio_section':
	            	$default                    = cww_portfolio_pro_customizer_defaults();
            		$cww_portfolio_content_type = get_theme_mod('cww_portfolio_content_type',$default['cww_portfolio_content_type']);
	            	
	            	remove_action('cww_portfolio_home'	,'cww_portfolio_gallery', 50 );
	            	
	            	if($cww_portfolio_content_type == 'portfolio' ){
                		add_action('cww_portfolio_home','cww_portfolio_cpt', $key );
            		}else{
            			add_action('cww_portfolio_home'		,'cww_portfolio_gallery', $key );	
            		}

	            	

	            break;

	            case 'cww_homepage_blog_section':
	            	remove_action('cww_portfolio_home'	,'cww_portfolio_blog', 60 );
	            	add_action('cww_portfolio_home'		,'cww_portfolio_blog', $key );
	            break;

	            case 'cww_homepage_contact_section':
	            	remove_action('cww_portfolio_home'	,'cww_portfolio_contact', 70 );
	            	add_action('cww_portfolio_home'		,'cww_portfolio_contact', $key );
	            break;

    		}

    	}

    	
    	
    }
    
   
    
        
        
        
        
    
    
}