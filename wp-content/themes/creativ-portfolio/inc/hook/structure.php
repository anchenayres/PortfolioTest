<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Creativ Portfolio
 */

if ( ! function_exists( 'creativ_portfolio_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function creativ_portfolio_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'creativ_portfolio_action_doctype', 'creativ_portfolio_doctype', 10 );


if ( ! function_exists( 'creativ_portfolio_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function creativ_portfolio_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif;
}
endif;
add_action( 'creativ_portfolio_action_head', 'creativ_portfolio_head', 10 );

if ( ! function_exists( 'creativ_portfolio_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function creativ_portfolio_page_start() {
	?><div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'creativ-portfolio' ); ?></a><?php
	}
endif;

add_action( 'creativ_portfolio_action_before', 'creativ_portfolio_page_start', 10 );

if ( ! function_exists( 'creativ_portfolio_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function creativ_portfolio_header_start() { ?>
		<header id="masthead" class="site-header" role="banner"><?php
	}
endif;
add_action( 'creativ_portfolio_action_before_header', 'creativ_portfolio_header_start' );

if ( ! function_exists( 'creativ_portfolio_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function creativ_portfolio_header_end() {

		?></header> <!-- header ends here --><?php
	}
endif;
add_action( 'creativ_portfolio_action_header', 'creativ_portfolio_header_end', 15 );

if ( ! function_exists( 'creativ_portfolio_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function creativ_portfolio_content_start() { 
	?>
	<div id="content" class="site-content">
	<?php 

	}
endif;

add_action( 'creativ_portfolio_action_before_content', 'creativ_portfolio_content_start', 10 );

if ( ! function_exists( 'creativ_portfolio_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function creativ_portfolio_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div></div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php
	}
endif;
add_action( 'creativ_portfolio_action_before_footer', 'creativ_portfolio_footer_start' );

if ( ! function_exists( 'creativ_portfolio_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function creativ_portfolio_footer_end() {?>
		</footer><div class="backtotop"><i class="fas fa-caret-up"></i></div><?php
	}
endif;
add_action( 'creativ_portfolio_action_after_footer', 'creativ_portfolio_footer_end' );
