<?php
/**
 * @package CWW Portfolio Pro
 *
 * @since 1.0.8
 */

add_action('cww_pp_hide','cww_pp_hide');
function cww_pp_hide(){
    $default  = cww_portfolio_pro_customizer_defaults();
    $cww_portfolio_pro_preloader_btn_text = get_theme_mod( 'cww_portfolio_pro_preloader_btn_text', $default['cww_portfolio_pro_preloader_btn_text'] );
     ?>

    <a href="javascript:void(0)" class="cww-hide-preloader"><?php echo esc_html($cww_portfolio_pro_preloader_btn_text); ?></a>    

<?php  }


if ( !function_exists( 'cww_pp_preloader_controllers' ) ) {

    function cww_pp_preloader_controllers() {
        
        $default  = cww_portfolio_pro_customizer_defaults();
      
        $cww_portfolio_pro_preloader_lists = get_theme_mod('cww_portfolio_pro_preloader_lists',$default['cww_portfolio_pro_preloader_lists']);


        switch ( $cww_portfolio_pro_preloader_lists ) {
            case 'preloader1':
                ?>
                <div id="loading1" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div id="object"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader2':
                ?>
                <div id="loading2" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="object_one"></div>
                            <div class="object" id="object_two"></div>
                            <div class="object" id="object_three"></div>
                            <div class="object" id="object_four"></div>
                            <div class="object" id="object_five"></div>
                            <div class="object" id="object_six"></div>
                            <div class="object" id="object_seven"></div>
                            <div class="object" id="object_eight"></div>
                            <div class="object" id="object_big"></div>
                        </div>
                    </div> 
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader3':
                ?>
                <div id="loading3" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="first_object"></div>
                            <div class="object" id="second_object"></div>
                            <div class="object" id="third_object"></div>
                        </div>
                    </div> 
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader4':
                ?>
                <div id="loading4" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="first_object"></div>
                            <div class="object" id="second_object"></div>
                            <div class="object" id="third_object"></div>
                            <div class="object" id="forth_object"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader5':
                ?>
                <div id="loading5" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="object_one"></div>
                            <div class="object" id="object_two"></div>
                            <div class="object" id="object_three"></div>
                            <div class="object" id="object_four"></div>
                            <div class="object" id="object_five"></div>
                            <div class="object" id="object_six"></div>
                            <div class="object" id="object_seven"></div>
                            <div class="object" id="object_eight"></div>
                            <div class="object" id="object_nine"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader6':
                ?>
                <div id="loading6" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="object_one"></div>
                            <div class="object" id="object_two"></div>
                            <div class="object" id="object_three"></div>
                            <div class="object" id="object_four"></div>
                            <div class="object" id="object_five"></div>
                            <div class="object" id="object_six"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader7':
                ?>
                <div id="loading7" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="object_one"></div>
                            <div class="object" id="object_two"></div>
                            <div class="object" id="object_three"></div>
                            <div class="object" id="object_four"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader8':
                ?>
                <div id="loading8" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="object_one"></div>
                            <div class="object" id="object_two"></div>
                            <div class="object" id="object_three"></div>
                            <div class="object" id="object_four"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader9':
                ?>
                <div id="loading9" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="object_one"></div>
                            <div class="object" id="object_two"></div>
                            <div class="object" id="object_three"></div>
                            <div class="object" id="object_four"></div>
                            <div class="object" id="object_five"></div>
                            <div class="object" id="object_six"></div>
                            <div class="object" id="object_seven"></div>
                            <div class="object" id="object_eight"></div>
                            <div class="object" id="object_big"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader10':
                ?>
                <div id="loading10" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="first_object"></div>
                            <div class="object" id="second_object" style="float:right;"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader11':
                ?>
                <div id="loading11" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader12':
                ?>
                <div id="loading12" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute-one">
                            <div class="object-one"></div>
                            <div class="object-one"></div>
                            <div class="object-one"></div>
                            <div class="object-one"></div>
                            <div class="object-one"></div>
                            <div class="object-one"></div>
                            <div class="object-one"></div>
                            <div class="object-one"></div>
                            <div class="object-one"></div>
                        </div>
                        <div id="loading-center-absolute-two">
                            <div class="object-two"></div>
                            <div class="object-two"></div>
                            <div class="object-two"></div>
                            <div class="object-two"></div>
                            <div class="object-two"></div>
                            <div class="object-two"></div>
                            <div class="object-two"></div>
                            <div class="object-two"></div>
                            <div class="object-two"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader13':
                ?>
                <div id="loading13" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="object_one"></div>
                            <div class="object" id="object_two"></div>
                            <div class="object" id="object_three"></div>
                            <div class="object" id="object_four"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader14':
                ?>
                <div id="loading14" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="object_one"></div>
                            <div class="object" id="object_two" style="left:20px;"></div>
                            <div class="object" id="object_three" style="left:40px;"></div>
                            <div class="object" id="object_four" style="left:60px;"></div>
                            <div class="object" id="object_five" style="left:80px;"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader15':
                ?>
                <div id="loading15" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="object_one"></div>
                            <div class="object" id="object_two"></div>
                            <div class="object" id="object_three"></div>
                            <div class="object" id="object_four"></div>
                            <div class="object" id="object_five"></div>
                            <div class="object" id="object_six"></div>
                            <div class="object" id="object_seven"></div>
                            <div class="object" id="object_eight"></div>
                            <div class="object" id="object_nine"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader16':
                ?>
                <div id="loading16" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader17':
                ?>
                <div id="loading17" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                            <div class="object"></div>
                        </div>
                    </div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'preloader18':
                ?>
                <div id="loading18" class="cww-loader">
                    <div id="loading-center">
                        <div id="loading-center-absolute">
                            <div class="object" id="object_one"></div>
                            <div class="object" id="object_two"></div>
                            <div class="object" id="object_three"></div>
                            <div class="object" id="object_four"></div>
                        </div>
                    </div> 
                    <?php do_action('cww_pp_hide'); ?>
                </div>
                <?php
                break;

            case 'custom':
            ?>
                <div id="loading19" class="cww-loader">
                    <div id="loading-center"></div>
                    <?php do_action('cww_pp_hide'); ?>
                </div>
        <?php 
        }
    }

}

add_action( 'wp_footer', 'cww_pp_preloader_controllers' );



if( ! function_exists('cww_pp_prelaoder_styles') ){

    function cww_pp_prelaoder_styles(){

        wp_enqueue_style('cww-preloader-styles', CWW_PP_URL.'/inc/preloader/preloader.css' );
    }

}
add_action( 'wp_enqueue_scripts', 'cww_pp_prelaoder_styles' );