<?php
//Typography option Values
function cww_portfolio_pro_custom_stylesheet(){

	
	$custom_css ="";
					
	/** Typography **/
    $font_intials = array(
        'p' => array(
            'tags' => 'p,section.cww-main-banner .content-wrapp p,.cww-about-section .desc-wrapp p,.cww-service-section .service-wrapper-outer .service-inner-wrapp p',
            'ffamily' => 'Jost',
            'fweight' => '400',
            'ftrans' => 'none',
            'fdecor' => 'none',
            'fsize' => '15',
            'fheight' => '1.5',
            'fcolor' => '#666',
        ),
        'h1' => array(
            'tags' => 'h1',
            'ffamily' => 'Jost',
            'fweight' => '700',
            'ftrans' => 'none',
            'fdecor' => 'none',
            'fsize' => '80',
            'fheight' => '1.1',
            'fcolor' => '#252525',
        ),
        
        'h2' => array(
            'tags' => '.entry-title a,h2,section.cww-main-banner .content-wrapp h2',
            'ffamily' => 'Jost',
            'fweight' => '700',
            'ftrans' => 'none',
            'fdecor' => 'none',
            'fsize' => '76',
            'fheight' => '1.1',
            'fcolor' => '#252525',
        ),
        'h3' => array(
            'tags' => 'h3,.section-title-wrapp h3',
            'ffamily' => 'Jost',
            'fweight' => '700',
            'ftrans' => 'none',
            'fdecor' => 'none',
            'fsize' => '44',
            'fheight' => '1.1',
            'fcolor' => '#252525',
        ),
        'h4' => array(
            'tags' => 'h4,.service-inner-wrapp h4,.cww-contact-section .address-wrap h4',
            'ffamily' => 'Jost',
            'fweight' => '700',
            'ftrans' => 'none',
            'fdecor' => 'none',
            'fsize' => '28',
            'fheight' => '1.1',
            'fcolor' => '#252525',
        ),
        'h5' => array(
            'tags' => 'h5,section.cww-main-banner .content-wrapp h5',
            'ffamily' => 'Jost',
            'fweight' => '700',
            'ftrans' => 'none',
            'fdecor' => 'none',
            'fsize' => '18',
            'fheight' => '1.1',
            'fcolor' => '#252525',
        ),
        'h6' => array(
            'tags' => 'h6',
            'ffamily' => 'Jost',
            'fweight' => '700',
            'ftrans' => 'none',
            'fdecor' => 'none',
            'fsize' => '16',
            'fheight' => '1.1',
            'fcolor' => '#252525',
        ),
    );

    foreach($font_intials as $initial => $tags) {
        
        extract($tags);
        
        $font_family    = get_theme_mod( $initial.'_font_family', $ffamily);
        $font_stylefull = get_theme_mod( $initial.'_font_style', $fweight);
        if(!empty($font_stylefull)) {
       

            $font_style_weight = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$font_stylefull);
            $text_decoration = get_theme_mod( $initial.'_text_decoration', $fdecor);
            $text_transform  = get_theme_mod( $initial.'_text_transform', $ftrans);
            $font_size       = get_theme_mod( $initial.'_font_size', $fsize);
            $line_height     = get_theme_mod( $initial.'_line_height', $fheight);
            $color           = get_theme_mod( $initial.'_color', $fcolor);
        }
        

        $custom_css .= " {$tags}{
            font-family : ".esc_attr($font_family) .";
            font-weight : ".esc_attr($font_stylefull) .";
            text-decoration : ".esc_attr($text_decoration) .";
            text-transform : ".esc_attr($text_transform) .";
            font-size : ".esc_attr($font_size) ."px;
            line-height : ".esc_attr($line_height) .";
            color : ".esc_attr($color) .";
        }";
    }
  
    
wp_add_inline_style( 'cww-portfolio-style', $custom_css );
}
add_action('wp_enqueue_scripts','cww_portfolio_pro_custom_stylesheet');