<?php 
/**
 * Skills Section
 *
 *@package Creativ Portfolio
 */

    $skills_section_title           = creativ_portfolio_get_option( 'skills_section_title' );
    $skills_section_subtitle        = creativ_portfolio_get_option( 'skills_section_subtitle' );
    $number_of_skills_items         = creativ_portfolio_get_option( 'number_of_skills_items' ); ?>

    <?php if( !empty($skills_section_title) || !empty($skills_section_subtitle) ):?>
        <div class="section-header">
            <?php if( !empty( $skills_section_subtitle ) ) : ?>
                <h2 class="section-title"><?php echo esc_html($skills_section_title);?></h2>
            <?php endif; ?>

            <?php if( !empty( $skills_section_title ) ) : ?>
                <h3 class="section-subtitle"><?php echo esc_html($skills_section_subtitle);?></h3>
            <?php endif; ?>
        </div><!-- .section-header -->
    <?php endif; ?>

    <div class="section-content col-2 clear">
        <?php for( $i=1; $i<=$number_of_skills_items; $i++ ) : 
            $skills_title[$i]   = creativ_portfolio_get_option( 'skills_title_'. $i ); 
            $skills_percentage[$i]  = creativ_portfolio_get_option( 'skills_percentage_'. $i ); ?>
            
            <article>
                <div class="skill-item-wrapper">
                    <?php if( !empty( $skills_title[$i] ) ) : ?>
                        <header class="entry-header">
                            <h2 class="entry-title"><?php echo esc_html($skills_title[$i]); ?></h2>
                        </header>
                    <?php endif; ?>

                    <?php if( !empty( $skills_percentage[$i] ) ) : ?>
                        <div class="progress" data-percent="<?php echo esc_html($skills_percentage[$i]); ?>">
                            <div class="progress-bar">
                                <div class="progress-value">
                                    <?php echo esc_html($skills_percentage[$i]); ?>
                                </div><!-- .progress-value -->
                            </div><!-- .progress-bar -->
                        </div><!-- .progress -->
                    <?php endif; ?>
                </div><!-- .skill-item-wrapper -->
            </article>
        <?php endfor; ?>
    </div><!-- .section-content -->