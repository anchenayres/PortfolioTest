<?php 
/**
 * Call to action section
 *
 *@package Creativ Portfolio
 */
?>
    <?php 
        $call_to_action_title              = creativ_portfolio_get_option( 'call_to_action_title' );
        $call_to_action_subtitle           = creativ_portfolio_get_option( 'call_to_action_subtitle' );
        $call_to_action_button_label       = creativ_portfolio_get_option( 'call_to_action_button_label' );
        $call_to_action_button_url         = creativ_portfolio_get_option( 'call_to_action_button_url' );
    ?>

    <div class="wrapper">
        <div class="cta-wrapper clear">
            <header class="entry-header">
                <?php if ( !empty($call_to_action_title ) )  :?>
                    <h2 class="entry-title"><?php echo esc_html($call_to_action_title); ?></h2>
                <?php endif;?>

                <?php if( !empty( $call_to_action_subtitle ) ): ?>
                    <h3 class="section-subtitle"><?php echo esc_html( $call_to_action_subtitle ); ?></h3>
                <?php endif; ?>
            </header><!-- .entry-header -->

            <?php if ( !empty($call_to_action_button_label ) )  :?>
                <div class="read-more">
                    <a href="<?php echo esc_url($call_to_action_button_url); ?>" class="btn"><?php echo esc_html($call_to_action_button_label); ?></a>
                </div><!-- .read-more -->
            <?php endif;?>
        </div><!-- .cta-wrapper -->
    </div><!-- .wrapper -->

