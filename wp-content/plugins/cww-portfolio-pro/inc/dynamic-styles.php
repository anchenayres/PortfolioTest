<?php 
/**
* Dynamic styles for premium modules
*
*
*/
add_action( 'wp_enqueue_scripts', 'cww_portfolio_pro_dynamic_styles' );

if( ! function_exists('cww_portfolio_pro_dynamic_styles')):
	function cww_portfolio_pro_dynamic_styles(){
		
		if ( !  defined( 'CWW_PORTFOLIO_VER' ) ) {
			return;
		}

		ob_start();

		$defaults 					= cww_portfolio_pro_customizer_defaults();
		$thDefault      			= cww_portfolio_customizer_defaults();

		$cww_icon_banner_bg 		= get_theme_mod('cww_icon_banner_bg',$defaults['cww_icon_banner_bg']);
		$cww_about_bg 				= get_theme_mod('cww_about_bg',$defaults['cww_about_bg']);
		$cww_woo_bg 				= get_theme_mod('cww_woo_bg',$defaults['cww_woo_bg']);
		$cww_woo_product_border 	= get_theme_mod('cww_woo_product_border',$defaults['cww_woo_product_border']);
		$cww_skill_bg 				= get_theme_mod('cww_skill_bg',$defaults['cww_skill_bg']);
		$cww_service_bg 			= get_theme_mod('cww_service_bg', $defaults['cww_service_bg'] );
		$cww_service_hover 			= get_theme_mod('cww_service_hover', $defaults['cww_service_hover']);
		$cww_service_icon 			= get_theme_mod('cww_service_icon', $defaults['cww_service_icon']);
		$cww_service_title_color 	= get_theme_mod('cww_service_title_color', $defaults['cww_service_title_color']);
		$cww_service_desc 			= get_theme_mod('cww_service_desc', $defaults['cww_service_desc']);
		$cww_portfolio_bg 			= get_theme_mod('cww_portfolio_bg', $defaults['cww_portfolio_bg']);
		$cww_blog_bg 				= get_theme_mod('cww_blog_bg',$defaults['cww_blog_bg']);
		$cww_contact_bg 			= get_theme_mod('cww_contact_bg', $defaults['cww_contact_bg']);


		//preloader colors
	$_preloader_color 		  = get_theme_mod('cww_portfolio_pro_preloader_color',$thDefault['cww_theme_color']);
	$_preloader_bg_color 	  = get_theme_mod('cww_portfolio_pro_preloader_bg_color',$defaults['cww_portfolio_pro_preloader_bg_color']);
 	$_preloader_custom		  = get_theme_mod('cww_portfolio_pro_preloader_custom');
 	$_preloader_btn_bg_color  = get_theme_mod('cww_portfolio_pro_preloader_btn_bg_color',$defaults['cww_portfolio_pro_preloader_btn_bg_color']);
    $_preloader_btn_bg_color_hover = get_theme_mod('cww_portfolio_pro_preloader_btn_bg_color_hover',$defaults['cww_portfolio_pro_preloader_btn_bg_color_hover']);

	?>
    
    a.cww-hide-preloader{
        background: <?php echo cww_portfolio_sanitize_color($_preloader_btn_bg_color); ?>;
    }
    a.cww-hide-preloader:hover{
        background: <?php echo cww_portfolio_sanitize_color($_preloader_btn_bg_color_hover); ?>;
    }
	.cww-loader{
            background-color: <?php echo cww_portfolio_sanitize_color($_preloader_bg_color); ?>;
        }

        #loading1 #object,
        #loading2 .object,
        #loading5 .object,
        #loading6 .object,
        #loading7 .object,
        #loading8 .object,
        #loading9 .object,
        #loading10 .object,
        #loading11 .object,
        #loading12 .object-one,
        #loading12 .object-two,
        #loading13 .object,
        #loading14 .object,
        #loading15 .object,
        #loading16 .object,
        #loading17 .object,
        #loading18 .object{
        background-color: <?php echo cww_portfolio_sanitize_color($_preloader_color); ?>;
        }

        #loading3 .object,
        #loading4 .object{
        border-color: <?php echo cww_portfolio_sanitize_color($_preloader_color); ?>;
        }

        <?php 
        if ( $_preloader_custom ) { ?>
            #loading19 #loading-center{
            background-image: url(<?php echo esc_url($_preloader_custom); ?>);
            }
        <?php 
    	}



		 if($cww_icon_banner_bg != $defaults['cww_icon_banner_bg'] ){ ?>
			section.cww-main-banner .bottom-style{
				color: <?php echo  cww_portfolio_sanitize_color($cww_icon_banner_bg);?>;
			}
		<?php }


		if($cww_about_bg != $defaults['cww_about_bg'] ){ ?>
			.cww-about-section{
				background-color: <?php echo  cww_portfolio_sanitize_color($cww_about_bg);?>;
			}
		<?php }


		if($cww_woo_bg != $defaults['cww_woo_bg'] ){ ?>
			.cww-woo-products{
				background-color: <?php echo  cww_portfolio_sanitize_color($cww_woo_bg);?>;
			}
		<?php }

		if($cww_woo_product_border != $defaults['cww_woo_product_border'] ){ ?>
			.cww-woo-products ul li{
				border-color: <?php echo  cww_portfolio_sanitize_color($cww_woo_product_border);?>;
			}
		<?php }


		if($cww_skill_bg != $defaults['cww_skill_bg'] ){ ?>
			.cww-skill-section{
				background-color: <?php echo  cww_portfolio_sanitize_color($cww_skill_bg);?>;
			}
		<?php }


		if($cww_service_bg != $defaults['cww_service_bg'] ){ ?>
			.cww-service-section{
				background-color: <?php echo  cww_portfolio_sanitize_color($cww_service_bg);?>;
			}
		<?php }


		if($cww_service_hover != $defaults['cww_service_hover'] ){ ?>
			.cww-service-section .service-wrapper-outer .service-inner-wrapp:before{
				background: <?php echo  cww_portfolio_sanitize_color($cww_service_hover);?>;
			}
		<?php }

		if($cww_service_icon != $defaults['cww_service_icon'] ){ ?>
			.cww-service-section .service-wrapper-outer .service-inner-wrapp .icon{
				color: <?php echo  cww_portfolio_sanitize_color($cww_service_icon);?>;
			}
		<?php }

		if($cww_service_title_color != $defaults['cww_service_title_color'] ){ ?>
			.cww-service-section .service-inner-wrapp h4{
				color: <?php echo  cww_portfolio_sanitize_color($cww_service_title_color);?>;
			}
		<?php }

		if($cww_service_desc != $defaults['cww_service_desc'] ){ ?>
			.cww-service-section .service-wrapper-outer .service-inner-wrapp p{
				color: <?php echo  cww_portfolio_sanitize_color($cww_service_desc);?>;
			}
		<?php }

		if($cww_portfolio_bg != $defaults['cww_portfolio_bg'] ){ ?>
			.cww-portfolio-section{
				background-color: <?php echo  cww_portfolio_sanitize_color($cww_portfolio_bg);?>;
			}
		<?php }

		if($cww_blog_bg != $defaults['cww_blog_bg'] ){ ?>
			.cww-blog-section{
				background-color: <?php echo  cww_portfolio_sanitize_color($cww_blog_bg);?>;
			}
		<?php }

		if($cww_contact_bg != $defaults['cww_contact_bg'] ){ ?>
			.cww-contact-section{
				background-color: <?php echo  cww_portfolio_sanitize_color($cww_contact_bg);?>;
			}
		<?php }



		/**
        * Main navigation typography
        */
        $menu_font_family = get_theme_mod( 'menu_font_family','Jost');
        $menu_font_weight = get_theme_mod( 'menu_font_weight','500');
        $menu_font_style = get_theme_mod('menu_font_style','normal');
        
        
        $menu_text_decoration       = get_theme_mod( 'menu_text_decoration','none');
        $menu_text_transform        = get_theme_mod( 'menu_text_transform','uppercase');
        $menu_font_size             = get_theme_mod( 'menu_font_size', '17');
        $menu_line_height           = get_theme_mod( 'menu_line_height',25.5);
        $menu_typography_padding    = get_theme_mod('menu_typography_padding','0.5');

        $menu_defaults  = array('Jost','500','normal','none','uppercase','17',25.5);
        $menu_new       = array($menu_font_family,$menu_font_weight,$menu_font_style,$menu_text_decoration,$menu_text_transform,$menu_font_size,$menu_line_height);

       //compare values on two arrays
        if( $menu_defaults != $menu_new){
        ?>
            .main-navigation ul li a,
            .full-screen-side-nav-wrapp ul.first-level li a,.main-header-wrapp .container .main-navigation .primary-menu-container>ul>li>a,.main-header-wrapp .container .main-navigation .primary-menu-container ul li a{
                font-family : <?php echo $menu_font_family; ?>;
                font-style : <?php echo $menu_font_style;  ?>;
                font-weight : <?php echo $menu_font_weight; ?>;
                text-decoration : <?php echo $menu_text_decoration ?>;
                text-transform : <?php echo $menu_text_transform; ?>;
                font-size : <?php echo $menu_font_size ?>px;
                line-height: <?php echo $menu_line_height ?>px;
            }
        <?php } ?>

        <?php 
        if( $menu_typography_padding != '0.5' ){ ?>
            .main-navigation ul li{
                margin-right: <?php echo $menu_typography_padding ?>em;
            }
        <?php 
        }






		$custom_css = ob_get_clean();
		$custom_css = cww_portfolio_strip_css_whitespace( $custom_css );

		wp_add_inline_style( 'cww-portfolio-style', $custom_css );

	}
endif;