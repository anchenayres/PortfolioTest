<?php 
/**
* Archive Portfolio Page
*
*
*
*
*/
get_header();
wp_print_styles( array( 'cww-portfolio-pro-archive' ) );
?>
<div id="primary" class="content-area">
<main id="main" class="site-main">
<?php if ( have_posts() ) : ?>
<div class="container">
	<div class="archive-pfolio-inner cww-flex">
	<?php while ( have_posts() ) : the_post();

	$portfolio_client_name          = get_post_meta( $post->ID, 'portfolio_client_name', true );
	$portfolip_skills          		= get_post_meta( $post->ID, 'portfolip_skills', true );
	$portfolio_company_website      = get_post_meta( $post->ID, 'portfolio_company_website', true );
	$portfolio_date          		= get_post_meta( $post->ID, 'portfolio_date', true );
	$portfolio_img 					= wp_get_attachment_image_src(get_post_thumbnail_id(),'cww-portfolio-pro-portfolio');
	?>
	<div class="portfolio-wrapper-innner">
		<div class="left-wrapp">
			<a href="<?php the_permalink()?>">
				<img src="<?php echo esc_url($portfolio_img[0])?>" alt="<?php the_title_attribute()?>">
			</a>
		</div>

		<div class="right-wrapp">

				<h3><?php the_title(); ?></h3>
				<div class="pfolio-cat">
			      	<?php 
			      	$taxonomy = 'portfolio_categories';
					$terms 		= wp_get_post_terms(get_the_ID(), 'portfolio_categories'); // Get all terms of a taxonomy
			      	 
			      	 if ( $terms && !is_wp_error( $terms ) ) : ?>
					    <ul class="meta">
					        <?php foreach ( $terms as $term ) { ?>
					            <li>
					            	<a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a>
					            	 <span class="delimiter-comma">/</span>
					            </li>

					        <?php } ?>
					    </ul>
					<?php endif; ?>

			      	
			    </div>
				
				<ul class="meta-info">
					<?php if($portfolio_client_name): ?>
						<li>
							<span class="title"><?php esc_html_e('Client:','cww-portfolio-pro'); ?></span>
							<span><?php echo esc_html($portfolio_client_name);?></span>
						</li>
					<?php endif; ?>

					<?php if($portfolip_skills): ?>
						<li>
							<span class="title"><?php esc_html_e('Tasks:','cww-portfolio-pro'); ?></span>
							<span><?php echo esc_html($portfolip_skills);?></span>
						</li>
					<?php endif; ?>

					<?php if($portfolio_date): ?>
						<li>
							<span class="title"><?php esc_html_e('Date:','cww-portfolio-pro'); ?></span>
							<span><?php echo esc_html($portfolio_date);?></span>
						</li>
					<?php endif; ?>

				</ul>
				<?php if($portfolio_company_website): ?>
				<div class="btn-view">
					<a href="<?php echo esc_url($portfolio_company_website)?>">
						<span><?php esc_html_e('Visit Website','cww-portfolio-pro'); ?></span>
					</a>
				</div>
				<?php endif;?>
			</div>
	</div>
	<?php endwhile; ?>
</div>
<?php cww_portfolio_numeric_posts_nav(); ?>
</div>

	
<?php endif; ?>

</main>
</div>
<?php
get_footer();