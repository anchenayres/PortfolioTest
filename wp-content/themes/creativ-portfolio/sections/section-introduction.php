<?php 
/**
 * Introduction Section
 *
 *@package Creativ Portfolio
 */

    $introduction_image        = creativ_portfolio_get_option( 'introduction_image');
    $introduction_hero_image   = creativ_portfolio_get_option( 'introduction_hero_image');
    $introduction_subtitle     = creativ_portfolio_get_option( 'introduction_subtitle');
    $introduction_title        = creativ_portfolio_get_option( 'introduction_title');
    $introduction_content      = creativ_portfolio_get_option( 'introduction_content');
    $introduction_btn_text_one = creativ_portfolio_get_option( 'introduction_btn_text_one');
    $introduction_btn_url_one  = creativ_portfolio_get_option( 'introduction_btn_url_one');   
    $introduction_btn_text_two = creativ_portfolio_get_option( 'introduction_btn_text_two');
    $introduction_btn_url_two  = creativ_portfolio_get_option( 'introduction_btn_url_two'); ?>

    <div class="overlay"></div>
    <article style="background-image: url('<?php echo esc_url( $introduction_image); ?>');">
        <div class="wrapper">
            <div class="featured-content-wrapper">
                <?php if( !empty($introduction_subtitle) || !empty($introduction_title) ): ?>
                    <header class="entry-header">
                        <?php if( !empty($introduction_subtitle)): ?>
                            <h3 class="entry-subtitle"><?php echo esc_html($introduction_subtitle); ?></h3>
                        <?php endif; ?>

                        <?php if( !empty($introduction_title)): ?>
                            <h2 class="entry-title"><?php echo esc_html( $introduction_title); ?></h2>
                        <?php endif; ?>
                    </header>
                <?php endif; ?>

                <?php if( !empty($introduction_content)): ?>
                    <div class="entry-content">
                        <?php echo esc_html( $introduction_content); ?>
                    </div><!-- .entry-content -->
                <?php endif; ?>

                <?php if( !empty($introduction_btn_text_one) || !empty($introduction_btn_text_two) ): ?>
                    <div class="read-more">
                        <?php if( !empty($introduction_btn_text_one)): ?>
                            <a href="<?php echo esc_attr($introduction_btn_url_one);?>" class="btn"><?php echo esc_html($introduction_btn_text_one);?></a>
                        <?php endif; ?>

                        <?php if( !empty($introduction_btn_text_two)): ?>
                            <a href="<?php echo esc_attr($introduction_btn_url_two);?>" class="btn"><?php echo esc_html($introduction_btn_text_two);?></a>
                        <?php endif; ?>
                    </div><!-- .read-more -->
                <?php endif; ?>
            </div><!-- .featured-content-wrapper -->

            <?php if( !empty($introduction_hero_image)): ?>
                <div class="introduction-featured-image">
                    <img src="<?php echo esc_url( $introduction_hero_image); ?>" alt="<?php echo esc_html( $introduction_title); ?>">
                </div><!-- .introduction-featured-image -->
            <?php endif; ?>
        </div><!-- .wrapper -->
    </article>