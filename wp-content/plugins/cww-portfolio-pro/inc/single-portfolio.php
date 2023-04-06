<?php
/**
* Single portfolio template
*
*
*/
get_header();
?>
<main id="primary" class="site-main portfolio">
	<div class="container cww-flex">
		<?php 
		$portfolio_client_name          = get_post_meta( $post->ID, 'portfolio_client_name', true );
		$portfolip_skills          		= get_post_meta( $post->ID, 'portfolip_skills', true );
		$portfolio_company_website      = get_post_meta( $post->ID, 'portfolio_company_website', true );
		$portfolio_date          		= get_post_meta( $post->ID, 'portfolio_date', true );
		?>
		<div class="left-wrapp">
			<?php the_post_thumbnail(); ?>	

		</div>

		<div class="right-wrapp">

			<h3><?php the_title(); ?></h3>
			<div class="pfolio-cat">
		      	<?php 
		      	$taxonomy = 'portfolio_categories';
				$terms = get_terms($taxonomy); // Get all terms of a taxonomy
		      	if ( $terms && !is_wp_error( $terms ) ) :
		      		foreach ( $terms as $term ) { ?>
		      			<span><?php echo $term->name; ?></span>
		      			<?php 
		      		}
		      	endif;
		      	?>
		    </div>
			<p><?php the_content(); ?></p>
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
</main>
<?php 
get_footer();