<?php
/**
 * The template for displaying home page.
 * @package Creativ Portfolio
 */

if ( 'posts' != get_option( 'show_on_front' ) ){ 
    get_header(); ?>
    <?php $enabled_sections = creativ_portfolio_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {

            if( $section['id'] == 'introduction' ) { ?>
                <?php $enable_introduction_section = creativ_portfolio_get_option( 'enable_introduction_section' );
                if(true ==$enable_introduction_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">  
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

        <?php } elseif( $section['id'] == 'skills' ) { ?>
                <?php $enable_skills_section   = creativ_portfolio_get_option( 'enable_skills_section' );
                if( true ==$enable_skills_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="section-gap">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'call-to-action' ) { ?>
                <?php $enable_call_to_action_section   = creativ_portfolio_get_option( 'enable_call_to_action_section' );
                if( true ==$enable_call_to_action_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="section-gap">
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif;

            }
        }
    }
    if( true == creativ_portfolio_get_option('enable_frontpage_content') ) { ?>
        <div id="content-wrapper" class="wrapper">
            <div class="section-gap clear">
            <?php include( get_page_template() ); ?>
            </div><!-- .section-gap -->
        </div><!-- #content-wrapper -->
    <?php }
    get_footer();
} 
elseif ('posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} 