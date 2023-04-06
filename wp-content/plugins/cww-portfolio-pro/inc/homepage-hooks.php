<?php 
/**
* Homepage hooks & functions
*
*
*
*/
add_action('cww_portfolio_home','cww_pp_skill_section',22 );
if( ! function_exists('cww_pp_skill_section')):
	function cww_pp_skill_section(){

		$default                    = cww_portfolio_pro_customizer_defaults();
		$cww_skill_enable           = get_theme_mod('cww_skill_enable', $default['cww_skill_enable']);
		$cww_skill_title 	= get_theme_mod('cww_skill_title');
		$cww_skill_subtitle = get_theme_mod('cww_skill_subtitle');
		$cww_skills_left 	= get_theme_mod('cww_skills_left');
		$cww_skills_left 	= json_decode($cww_skills_left);

		$cww_skill_title2 	= get_theme_mod('cww_skill_title2');
		$cww_skill_subtitle2 = get_theme_mod('cww_skill_subtitle2');
		$cww_skills_left2 	= get_theme_mod('cww_skills_left2');
		$cww_skills_left2 	= json_decode($cww_skills_left2);

		if( $cww_skill_enable == 0 ){
            return;
        }

	?>
	<section class="cww-skill-section" id="cww-skill-section">
			<div class="container cww-flex">

				<div class="left-wrapp">
					<div class="skill-title-wrapp">
						<h3><?php echo esc_html($cww_skill_title); ?></h3>
						<p><?php echo esc_html($cww_skill_subtitle); ?></p>
					</div>
					<div class="skill-progress-wrapper circular cww-flex">
						<?php
						$counter = 1;
						if($cww_skills_left):
							foreach( $cww_skills_left as $cww_skills ){
								$skill_text = $cww_skills->skill_text;
								$percentage = $cww_skills->percentage;
								?>
								<div class="bar-circular-wrapp">
		                            <canvas id="cww-pp<?php echo esc_attr($counter); ?>" class="cww-pp<?php echo esc_attr($counter); ?> cloader"  data-percentage="<?php echo absint($percentage); ?>"></canvas>
		                            <?php if($skill_text){ ?><div class="title-bar"><?php echo esc_attr($skill_text); ?></div><?php } ?>
		                        </div>
								<?php 
							}
						endif;
						?>
					</div>
				</div>

				<div class="right-wrapp">
					<div class="skill-title-wrapp">
						<h3><?php echo esc_html($cww_skill_title2); ?></h3>
						<p><?php echo esc_html($cww_skill_subtitle2); ?></p>
					</div>
					<div class="skill-progress-wrapper horizontal">
						<?php
						$counter = 1;
						if($cww_skills_left2):
							foreach( $cww_skills_left2 as $cww_skills ){
								$skill_text = $cww_skills->skill_text;
								$percentage = $cww_skills->percentage;
								?>
								<div class="cww-pbar-wrapp">
		                            <div class="pbar-title"> <?php echo esc_attr($skill_text); ?> </div>
                                        <div percent="<?php echo absint($percentage); ?>" id="id-pbar<?php echo esc_attr($counter); ?>" class="percent-bar">
                                            <?php echo esc_attr($percentage).' %'; ?>
                                        </div>
                                        <div class="progressBar" data-label="<?php echo absint($percentage); ?>" id="max<?php echo absint($percentage); ?>" data-width="<?php echo absint($percentage); ?>"><div></div>
                                        </div>
		                        </div>
								<?php 
							}
						endif;
						?>
					</div>

				</div>

			</div>
	</section>
	<?php
	}
endif;

/**
* Modify default theme banner functions
*
*
*/
$theme = get_stylesheet();
if( $theme == 'cww-portfolio' ){
	add_action('cww_portfolio_home','cww_portfolio_pro_banner',12);
}

if( ! function_exists('cww_portfolio_pro_banner')):
	function cww_portfolio_pro_banner(){

		$default 					= cww_portfolio_customizer_defaults();
		$def 						= cww_portfolio_pro_customizer_defaults();
		
		$cww_banner_image 			= get_theme_mod('cww_banner_image', $default['cww_banner_image']);
		$cww_banner_text_sm 		= get_theme_mod('cww_banner_text_sm', $default['cww_banner_text_sm']);
		$cww_banner_text_lg 		= get_theme_mod('cww_banner_text_lg', $default['cww_banner_text_lg']);
		$cww_banner_text_sm2 		= get_theme_mod( 'cww_banner_text_sm2', $default['cww_banner_text_sm2']);
		$cww_banner_btn_text 		= get_theme_mod( 'cww_banner_btn_text', $default['cww_banner_btn_text']);
		$cww_banner_btn_url 		= get_theme_mod( 'cww_banner_btn_url', $default['cww_banner_btn_url'] );
		$cww_banner_btn_text_sec 	= get_theme_mod( 'cww_banner_btn_text_sec', $default['cww_banner_btn_text_sec'] );
		$cww_banner_btn_url_sec 	= get_theme_mod('cww_banner_btn_url_sec', $default['cww_banner_btn_url_sec'] );

		$cww_banner_moving_text_enable  = get_theme_mod('cww_banner_moving_text_enable',$def['cww_banner_moving_text_enable'] );
		$cww_banner_moving_texts    	= get_theme_mod('cww_banner_moving_texts');
	
		$cls = '';
		if( $cww_banner_moving_text_enable ){
			$cls = 'moving-enabled';
		}

		?>
		<section id="cww-banner-section" class="cww-main-banner">
			<div class="container">
			<div class="animated-bg"></div> 

			<div class="cotent-wrapp-banner cww-flex">
     		<div class="img-wrapp">
				<img src="<?php echo esc_url($cww_banner_image)?>" >
			</div>
			
			
			<div class="content-wrapp <?php echo esc_attr($cls)?>">
				<h5><?php echo esc_html($cww_banner_text_sm); ?></h5>
				<?php if($cww_banner_moving_text_enable){ ?>
					<h2>
						<span class="typer" data-words="<?php echo esc_attr($cww_banner_moving_texts)?>" id="cww-typer-text"></span>	
						<span style="font-size:42px;vertical-align:middle;" class="cursor" data-cursorDisplay="|" data-owner="cww-typer-text"></span>	
					</h2>
					
					

				<?php }else{ ?>
				<h2><?php echo esc_html($cww_banner_text_lg);?></h2>
				<?php } ?>

				<div class="down-text-wrapp">
				<p><?php echo esc_html($cww_banner_text_sm2);?></p>

				<div class="button-wrapp cww-flex">
					<?php if($cww_banner_btn_text):?>
					<div class="btn-primary">
						<a href="<?php echo esc_url($cww_banner_btn_url)?>"> 
							<span><?php echo esc_html($cww_banner_btn_text); ?> </span>
						</a>
					</div>
					<?php endif; ?>

					<?php if($cww_banner_btn_text_sec):?>
					<div class="btn-secondary">
						<a href="<?php echo esc_url($cww_banner_btn_url_sec)?>" class="cww-flex">
						 <span><?php echo esc_html($cww_banner_btn_text_sec); ?> </span>
						 <?php echo cww_companion_get_icon_svg( 'arrow_down',14 ); ?>
						</a>
					</div>
				<?php endif; ?>
				</div>
				</div>

			</div>

			</div>
			

			<div class="bottom-style">
				<?php do_action('cww_portfolio_social_icons'); ?>
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1400.6 1226.4" enable-background="new 0 0 1400.6 1226.4">
		            <path fill="currentColor" d="M1384.4,488c-49.2-80.5-218.1-104.6-341.5-187.7C920.4,218,845.3,76.7,731.8,24C618.3-27.9,466.3,8.8,342,91    C217.8,173.3,120.4,301.1,59.6,449.5C-0.3,597.9-23.6,766.9,30.1,905.4c52.7,138.6,182.4,246.7,318.2,292.3    c135.9,46.5,278,29.5,397.8-1.8c119.8-32.2,216.3-78.7,303-141.2c86.7-61.7,163.6-137.7,238.7-244C1362,704.3,1433.6,568.4,1384.4,488z"></path>
		        </svg>
			</div>
		</div>
		</section>
		<?php 
	}
endif;


add_action('cww_portfolio_home','cww_pp_home_woo',23 );
if( ! function_exists('cww_pp_home_woo')):
	function cww_pp_home_woo(){

		if(! class_exists('WooCommerce')){
			return;
		}

		$default 				= cww_portfolio_pro_customizer_defaults();
		$cww_woo_section_enable = get_theme_mod('cww_woo_section_enable',$default['cww_woo_section_enable'] );
		$cww_woo_title 			= get_theme_mod('cww_woo_title');
		$cww_woo_subtitle 		= get_theme_mod('cww_woo_subtitle');
		$cww_woo_cat 			= get_theme_mod('cww_woo_cat');

		if( $cww_woo_section_enable == 0 ){
			return;
		}

		if($cww_woo_cat):
		$args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $cww_woo_cat
                )
            )
        );

		$query = new WP_Query( $args );

		?>
		<section class="cww-woo-products" id="cww-woo-products">
			<div class="container woocommerce">
				<div class="woo-sec-title-wrapp">
				<div class="section-title-wrapp">
					<h3><?php echo esc_html($cww_woo_title); ?></h3>
					<p><?php echo esc_html($cww_woo_subtitle); ?></p>
				</div>
				</div>

				<?php if ( $query->have_posts() ) : ?>
					 
	                <ul class="inner-wrapper">
	                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

	                        <?php wc_get_template_part( 'content', 'product' ); ?>

	                    <?php endwhile; ?>
	                </ul>
		            
				<?php endif; ?>

			</div>
		</section>
		<?php 
		endif;
	}
endif;

/**
 *  Modify default porftolio from free theme
 * 
 */ 

//add_action('cww_portfolio_home','cww_portfolio_cpt',50 );
if( ! function_exists('cww_portfolio_cpt')):
	function cww_portfolio_cpt(){

		$default 						= cww_portfolio_customizer_defaults();
		$defaults                    	= cww_portfolio_pro_customizer_defaults();
		$cww_portfolio_enable       	= get_theme_mod('cww_portfolio_enable', $default['cww_portfolio_enable']);
		
		$cww_portfolio_title 			= get_theme_mod('cww_portfolio_title', $default['cww_portfolio_title'] );
		$cww_portfolio_sub_title 		= get_theme_mod('cww_portfolio_sub_title', $default['cww_portfolio_sub_title'] );

		$cww_portfolio_content_type 	= get_theme_mod('cww_portfolio_content_type',$defaults['cww_portfolio_content_type']);
		$cww_portfolio_count 			= get_theme_mod('cww_portfolio_count', $defaults['cww_portfolio_count']);
		
		if($cww_portfolio_content_type == 'page'){
			return;
		}

		if( $cww_portfolio_enable == 0 ){
            return;
        }


		?>
		<section id="cww-portfolio-section" class="cww-portfolio-section">
			<div class="container">
				<div class="section-titles-wrapper">
					<div class="section-title-wrapp">
						<h3><?php echo esc_html($cww_portfolio_title); ?></h3>
						<p><?php echo esc_html($cww_portfolio_sub_title); ?></p>
					</div>
				</div>
				<div class="outer-wrapp cww-flex">
				<?php 
				$taxonomy = 'portfolio_categories';
				

				$args = array(
						        'post_type' => 'portfolio',
						        'posts_per_page' => $cww_portfolio_count
						    );
						    
			    $qry = new WP_Query( $args );
			    if( $qry->have_posts() ):
				    while( $qry->have_posts() ) {
				      $qry->the_post();

				      $terms 		= wp_get_post_terms(get_the_ID(), 'portfolio_categories'); // Get all terms of a taxonomy

				      $image_path = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );

				      ?>
				      <div class="inner-pfolio">
				      	<a href="<?php the_permalink() ?>">
				      		<img src="<?php echo esc_url($image_path[0])?>" alt="<?php the_title_attribute()?>">
				      	</a>
				      	<div class="content-wrapp">
					      	<h3><?php the_title() ?></h3>
					      	<div class="pfolio-cat">
						      	<?php 
						      	if ( $terms && !is_wp_error( $terms ) ) :
						      		foreach ( $terms as $term ) { ?>
						      			<span><?php echo $term->name; ?></span>
						      			<?php 
						      		}
						      	endif;
						      	?>
					      	</div>
				      	</div>
				      </div>
				      <?php 
				      

				  	}
				  	wp_reset_postdata();
				endif;

				?>
				</div>
			</div>
		</section>
		<?php 
	}
endif;


/**
*
* Modify main banner for UPortfolio (child theme)
*
*
*
*/
$theme = get_stylesheet();
if( $theme == 'uportfolio' ){
	add_action('cww_portfolio_home','cww_portfolio_banner_uportfolio_pro',12);
}

if( ! function_exists('cww_portfolio_banner_uportfolio_pro')):
    function cww_portfolio_banner_uportfolio_pro(){

        $default                    = uportfolio_customizer_defaults();
        $def 						= cww_portfolio_pro_customizer_defaults();

        $cww_banner_image           = get_theme_mod('cww_banner_image', $default['cww_banner_image']);
        $cww_banner_text_sm         = get_theme_mod('cww_banner_text_sm', $default['cww_banner_text_sm']);
        $cww_banner_text_lg         = get_theme_mod('cww_banner_text_lg', $default['cww_banner_text_lg']);
        $cww_banner_text_sm2        = get_theme_mod( 'cww_banner_text_sm2', $default['cww_banner_text_sm2']);
        $cww_banner_btn_text        = get_theme_mod( 'cww_banner_btn_text', $default['cww_banner_btn_text']);
        $cww_banner_btn_url         = get_theme_mod( 'cww_banner_btn_url', $default['cww_banner_btn_url'] );
        $cww_banner_btn_text_sec    = get_theme_mod( 'cww_banner_btn_text_sec', $default['cww_banner_btn_text_sec'] );
        $cww_banner_btn_url_sec     = get_theme_mod('cww_banner_btn_url_sec', $default['cww_banner_btn_url_sec'] );

        $cww_banner_moving_text_enable  = get_theme_mod('cww_banner_moving_text_enable',$def['cww_banner_moving_text_enable'] );
		$cww_banner_moving_texts    	= get_theme_mod('cww_banner_moving_texts');
	
		$cls = '';
		if( $cww_banner_moving_text_enable ){
			$cls = 'moving-enabled uportfolio';
		}

        ?>
        <div class="icons-wrapper-fixed">
            <?php do_action('cww_portfolio_social_icons'); ?>
        </div>

        <section id="cww-banner-section" class="cww-main-banner">
        <div class="container">
             

            <div class="cotent-wrapp-banner cww-flex">
          
            
            
            <div class="content-wrapp <?php echo esc_attr($cls)?>">
                <h5><?php echo esc_html($cww_banner_text_sm); ?></h5>
                <?php if($cww_banner_moving_text_enable){ ?>
					<h2>
						<span class="typer" data-words="<?php echo esc_attr($cww_banner_moving_texts)?>" id="cww-typer-text"></span>	
						<span style="font-size:42px;vertical-align:middle;" class="cursor" data-cursorDisplay="|" data-owner="cww-typer-text"></span>	
					</h2>
					
					

				<?php }else{ ?>
				<h2><?php echo esc_html($cww_banner_text_lg);?></h2>
				<?php } ?>

                <p><?php echo esc_html($cww_banner_text_sm2);?></p>

                <div class="button-wrapp cww-flex">
                    <div class="btn-primary">
                        <a href="<?php echo esc_url($cww_banner_btn_url)?>"> 
                            <span><?php echo esc_html($cww_banner_btn_text); ?> </span>
                        </a>
                    </div>
                    <div class="btn-secondary">
                        <a href="<?php echo esc_url($cww_banner_btn_url_sec)?>" class="cww-flex">
                         <span><?php echo esc_html($cww_banner_btn_text_sec); ?> </span>
                         <?php echo cww_companion_get_icon_svg( 'arrow_down',14 ); ?>
                        </a>
                    </div>
                </div>

            </div>

           
            <div class="shape-wrapper">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <mask id="mask0" mask-type="alpha">
              <path d="M60.8,-57.3C76.2,-45.5,84.2,-22.7,81.2,-3C78.1,16.7,64.1,33.4,48.8,48C33.4,62.6,16.7,75.1,-0.3,75.4C-17.4,75.8,-34.7,63.9,-47.1,49.3C-59.5,34.7,-66.9,17.4,-68.3,-1.4C-69.7,-20.2,-65.1,-40.3,-52.7,-52.1C-40.3,-63.9,-20.2,-67.3,1.3,-68.5C22.7,-69.8,45.5,-69,60.8,-57.3Z" transform="translate(100 100)" />
              </mask>
              <g mask="url(#mask0)">
                <path d="M60.8,-57.3C76.2,-45.5,84.2,-22.7,81.2,-3C78.1,16.7,64.1,33.4,48.8,48C33.4,62.6,16.7,75.1,-0.3,75.4C-17.4,75.8,-34.7,63.9,-47.1,49.3C-59.5,34.7,-66.9,17.4,-68.3,-1.4C-69.7,-20.2,-65.1,-40.3,-52.7,-52.1C-40.3,-63.9,-20.2,-67.3,1.3,-68.5C22.7,-69.8,45.5,-69,60.8,-57.3Z" transform="translate(100 100)" />
                <image class="svg-image-main" x='40' y='40' xlink:href="<?php echo esc_url($cww_banner_image); ?>"/>
              </g>
            </svg>
            </div>


            </div>
                
        </div>
        </section>
        <?php 
    }
endif;