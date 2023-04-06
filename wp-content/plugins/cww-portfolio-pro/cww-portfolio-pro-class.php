<?php
/**
 * Main plugin class 
 * 
 */

if ( !class_exists( 'CWW_Portfolio_Pro' ) ):

    /**
     * Sets up and initializes the plugin.
     */
    class CWW_Portfolio_Pro {

        /**
         * A reference to an instance of this class.
         *
         * @since  1.0.0
         * @access private
         * @var    object
         */
        private static $instance = null;

        /**
         * Plugin version
         *
         * @var string
         */
        private $version = CWW_PP_VER;

        /**
         * Returns the instance.
         *
         * @since  1.0.0
         * @access public
         * @return object
         */
        public static function get_instance() {
            // If the single instance hasn't been set, set it now.
            if ( null == self::$instance ) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        /**
         * Sets up needed actions/filters for the plugin to initialize.
         *
         * @since 1.0.0
         * @access public
         * @return void
         */
        public function __construct() {

            add_action( 'plugins_loaded', array( $this, 'check_companion_plugin' ) );

            // Load translation files
            add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

            add_action( 'wp_enqueue_scripts', [ $this, 'cww_portfolio_pro_view_scripts' ] );
            add_action('admin_enqueue_scripts', [ $this, 'cww_portfolio_pro_admin_scripts'] );
            add_action( 'customize_controls_enqueue_scripts', [$this, 'enqueue_customizer_scripts' ],20 );

            add_action( 'wp_footer',[$this,'backToTop'] );
            add_action('init',[$this,'modify_hooks'], 20 );

            add_action('cww_portfolio_footer',[$this, 'footerCredit' ],15 );//footer credit

            add_action('wp_footer',[$this,'darkModeToggle'] ); //dark mode toggle

            add_filter( 'body_class', [$this,'cww_pp_body_class'] ); //add class on body

            add_action( 'cww_portfolio_logo', [$this,'cww_pp_dark_logo'], 15 );

            add_action('plugins_loaded',[$this, 'include_after_plugins'] );
            
            add_filter( 'woocommerce_locate_template', [$this,'cww_pp_woocommerce_locate_template'], 10, 3 );

            add_filter( 'single_template', array($this,'single_post_templates') );
            add_filter( 'archive_template', array($this,'archive_post_templates') );

            add_action('cww_portfolio_social_icons', [$this, 'cww_portfolio_social_icons'], 15 );

            add_action('after_setup_theme',[$this,'register_image_sizes'], 20 );
        }

        /**
         * Check If CWW Companion Plugin is installed & activated
         * @since 1.1.1
         */
        public function check_companion_plugin(){
            if( ! class_exists('CWW_Companion')){
                add_action( 'admin_notices', array( $this, 'required_plugins_notice' ) );
                return;
            }
        }

        /**
         * Show recommended plugins notice.
         *
         * @since 1.1.1
         * @return void
         */
        public function required_plugins_notice() {
            $screen = get_current_screen();
            if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
                return;
            }

            $plugin = 'cww-companion/cww-companion.php';

            if ( $this->is_companion_installed() ) {
                if ( !current_user_can( 'activate_plugins' ) ) {
                    return;
                }

                $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
                $admin_message = '<p>' . wp_kses_post( '<h3>Oops!! CWW Portfolio Pro is not working because you need to activate the CWW Companion plugin first.</h3>', 'cww-portfolio-pro' ) . '</p>';
                $admin_message .= '<p>' . sprintf( '<a href="%s" class="button button-primary button-hero">%s</a>', $activation_url, esc_html__( 'Activate Now', 'cww-portfolio-pro' ) ) . '</p>';
            } else {
                if ( !current_user_can( 'install_plugins' ) ) {
                    return;
                }

                $install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=cww-companion' ), 'install-plugin_cww-companion' );
                $admin_message = '<p>' . wp_kses_post( '<h3>Oops!! CWW Portfolio Pro is not working because you need to install the CWW Companion plugin.</h3>', 'cww-portfolio-pro' ) . '</p>';
                $admin_message .= '<p>' . sprintf( '<a href="%s" class="button button-primary button-hero">%s</a>', $install_url, esc_html__( 'Install Now', 'cww-portfolio-pro' ) ) . '</p>';
            }

            echo '<div class="error cww-error">' . $admin_message . '</div>';
        }

        /**
         * Check if has companion plugin is installed
         *
         * @return boolean
         */
        public function is_companion_installed() {
            $file_path = 'cww-companion/cww-companion.php';
            $installed_plugins = get_plugins();

            return isset( $installed_plugins[ $file_path ] );
        }


        /**
         * Loads the translation files.
         *
         * @since 1.0.0
         * @access public
         * @return void
         */
        public function load_plugin_textdomain() {
        	
            load_plugin_textdomain( 'cww-portfolio-pro', false, basename( dirname( __FILE__ ) ) . '/languages' );
        }

        /**
         * Returns plugin version
         *
         * @return string
         */
        public function get_version() {
            return $this->version;
        }

       
        /**
         * Frontend styles & scripts
         * 
         * 
         */ 
        function cww_portfolio_pro_view_scripts(){

            if ( !  defined( 'CWW_PORTFOLIO_VER' ) ) {
                return;
            }

            $default                    = cww_portfolio_pro_customizer_defaults();
            $defaults                   = cww_portfolio_customizer_defaults();
            $cww_header_sticky_enable   = get_theme_mod('cww_header_sticky_enable',$default['cww_header_sticky_enable']);
            $cww_dark_mode_enable       = get_theme_mod('cww_dark_mode_enable', $default['cww_dark_mode_enable']);
            $cww_banner_moving_texts    = get_theme_mod('cww_banner_moving_texts');
            $cww_theme_color            =get_theme_mod('cww_theme_color',$defaults['cww_theme_color']);

            if($cww_dark_mode_enable == 1 ){
                wp_enqueue_style( 'cww-portfolio-pro-darkmode', CWW_PP_ASS_URL.'/css/darkmode.css', array(), CWW_PP_VER );
                wp_enqueue_script( 'cww-portfolio-pro-darkmode', CWW_PP_ASS_URL.'/js/darkmode.js', array(), CWW_PP_VER, false );
            }

            wp_register_style( 'cww-portfolio-pro-archive', CWW_PP_ASS_URL.'/css/archive-portfolio.css', array(), CWW_PP_VER );
            wp_enqueue_style( 'slick-theme', CWW_PP_ASS_URL.'/slick/slick-theme.css', array(), CWW_PP_VER );
            wp_enqueue_style( 'slick', CWW_PP_ASS_URL.'/slick/slick.css', array(), CWW_PP_VER );
            wp_enqueue_style( 'cww-portfolio-pro-frontend', CWW_PP_ASS_URL.'/css/frontend.css', array(), CWW_PP_VER );
            wp_enqueue_style( 'cww-portfolio-pro-responsive', CWW_PP_ASS_URL.'/css/responsive.css', array(), CWW_PP_VER );
            
            

            wp_enqueue_script( 'slick', CWW_PP_ASS_URL.'/slick/slick.min.js', array('jquery'), CWW_PP_VER, true );
            wp_enqueue_script( 'typer', CWW_PP_ASS_URL.'/js/typer.min.js', array('jquery'), CWW_PP_VER, true );
            wp_enqueue_script( 'jquery.cookie', CWW_PP_ASS_URL.'/js/jquery.cookie.js', array('jquery'), CWW_PP_VER, true );
            wp_enqueue_script( 'jquery.classyloader', CWW_PP_ASS_URL.'/js/jquery.classyloader.min.js', array('jquery'), CWW_PP_VER, true );
            wp_register_script( 'cww-portfolio-pro-frontend', CWW_PP_ASS_URL.'/js/frontend.js', array('jquery'), CWW_PP_VER, true );

            $script_vals = array(
                'stickyHeader'      => $cww_header_sticky_enable,
                'movingTexts'       => $cww_banner_moving_texts,
                'thColor'           => $cww_theme_color
            );
            wp_localize_script('cww-portfolio-pro-frontend','cwwPP',$script_vals );
            wp_enqueue_script('cww-portfolio-pro-frontend');
        }
    

        /**
        * Admin scripts
        */
        function cww_portfolio_pro_admin_scripts(){
        	
        	$current_screen = get_current_screen();
			
			if( $current_screen->base == 'customize' ){
                

                wp_enqueue_script( 'cww-portfolio-pro-admin', CWW_PP_ASS_URL . '/js/cww-admin.js',array('jquery','jquery-ui-sortable','customize-controls') );
                $args                       = array();
                $args['ajax_url']           = admin_url( 'admin-ajax.php' );
                wp_localize_script( 'cww-portfolio-pro-admin', 'cwwPP', $args );

        	}

        }

        function enqueue_customizer_scripts() {
            wp_enqueue_style( 'cww-portfolio-pro-admin', CWW_PP_ASS_URL.'/css/admin.css', array(), CWW_PP_VER );
            wp_dequeue_script( 'cww-companion-repeater-script');

            wp_enqueue_script( 'cww-portfolio-pro-repeater-script', CWW_PP_URL . '/inc/customizer/js/repeater-scripts.js',array( 'jquery','jquery-ui-sortable','customize-controls'));
            

        }

        //Back to top button
        function backToTop(){
            $default                    = cww_portfolio_pro_customizer_defaults();
            $cww_scroll_top_enable      = get_theme_mod('cww_scroll_top_enable',$default['cww_scroll_top_enable']);
            if( $cww_scroll_top_enable == 0 ){
                return;
            }
            ?>
            <div class="scroll-to-top" id="back-to-top">
                <i class="fa fa-angle-double-up" aria-hidden="true"></i>
            </div>
            <?php
        }


        function modify_hooks(){
            $default                    = cww_portfolio_pro_customizer_defaults();
            $cww_portfolio_content_type = get_theme_mod('cww_portfolio_content_type',$default['cww_portfolio_content_type']);

            remove_action('cww_portfolio_footer','cww_portfolio_copyright', 10 );
            remove_action( 'cww_portfolio_logo' , 'cww_portfolio_logo', 10 );
            remove_action('cww_portfolio_social_icons','cww_portfolio_social_icons',10 );
            
            $theme = get_stylesheet();
            if( $theme == 'cww-portfolio' || $theme == 'uportfolio' ){
                remove_action('cww_portfolio_home','cww_portfolio_banner', 10 );
            }
            
            
            if($cww_portfolio_content_type == 'portfolio' ){
               // remove_action('cww_portfolio_home','cww_portfolio_gallery',50 );
            }

            require CWW_PP_PATH. '/inc/dynamic-styles.php';
            require CWW_PP_PATH . '/inc/customizer/typography/style.php';
        }

        //remove footer credit
        function footerCredit(){

            $cww_footer_text = get_theme_mod('cww_footer_text');
        ?>
            <footer id="colophon" class="site-footer">
                <div class="container cww-flex">
                <?php do_action('cww_portfolio_social_icons'); ?>
                <div class="site-info cww-flex">
                    <?php if($cww_footer_text){ ?>
                        <div class="footer-copyright"><?php echo wp_kses_post($cww_footer_text);?></div>
                    <?php }else{ ?>
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'cww-portfolio' ) ); ?>">
                        <?php
                        /* translators: %s: CMS name, i.e. WordPress. */
                        printf( esc_html__( 'Proudly powered by %s', 'cww-portfolio' ), 'WordPress' );
                        ?>
                    </a>
                    <?php } ?>
                    
                </div><!-- .site-info -->
                </div>
            </footer><!-- #colophon -->
        <?php
        }

        /**
         * Dark Mode Toggle
         * 
         * 
         */
        function darkModeToggle(){
            $default                    = cww_portfolio_pro_customizer_defaults();
            $cww_dark_mode_enable       = get_theme_mod('cww_dark_mode_enable', $default['cww_dark_mode_enable']);
            $cww_dark_mode_position     = get_theme_mod('cww_dark_mode_position', $default['cww_dark_mode_position']);

            if( $cww_dark_mode_enable == 0 ){
                return;
            }
            ?>
            <div class="dark-mode-switch <?php echo esc_attr($cww_dark_mode_position)?>">
                <img src="<?php echo esc_url(CWW_PP_ASS_URL.'img/light.png')?>" class="dark">
                <img src="<?php echo esc_url(CWW_PP_ASS_URL.'img/bright.png')?>" class="light">
            </div>
            <?php 
        }

        /**
         * Generate dynamic classes to be used on body tag
         * 
         * 
         */ 
        function cww_pp_body_class( $classes ) {
            $default                    = cww_portfolio_pro_customizer_defaults();
            $cww_dark_mode_enable       = get_theme_mod('cww_dark_mode_enable', $default['cww_dark_mode_enable']);
            $cww_pfp_preloader_enable   = get_theme_mod('cww_pfp_preloader_enable', $default['cww_pfp_preloader_enable']);
            
            $dark_mode_cookie = isset($_COOKIE['cww_dark_mode_enable']) ? $_COOKIE['cww_dark_mode_enable'] : $cww_dark_mode_enable;

            if( $dark_mode_cookie == 1 ){
                $classes[] = 'dark-mode';
            }
            if( $cww_pfp_preloader_enable == 1 ){
                $classes[] = 'cww-loader-enabled';
            }
            return $classes;
        }

        /**
         * Modifyes default theme logo and adds another logo for dark mode
         * 
         * 
         * 
         */ 
        function cww_pp_dark_logo(){

            $cww_logo_dark = get_theme_mod('cww_logo_dark');
            ?>
            <div class="site-branding">
                <?php the_custom_logo(); ?>

                <?php if($cww_logo_dark){ ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-dark">
                    <img src="<?php echo esc_url($cww_logo_dark)?>" alt="<?php the_title_attribute()?>">
                    </a>
                <?php }
                
                if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                endif;
                $cww_portfolio_description = get_bloginfo( 'description', 'display' );
                if ( $cww_portfolio_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo esc_html($cww_portfolio_description); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->
            <?php 
        }
        
        /**
         * Add new soicla icons
         * 
         * 
         * 
         */ 
        function cww_portfolio_social_icons(){
        
        $default                = cww_portfolio_customizer_defaults();
        $cww_icon_fb            = get_theme_mod( 'cww_icon_fb', $default['cww_icon_fb'] );
        $cww_icon_insta         = get_theme_mod( 'cww_icon_insta', $default['cww_icon_insta'] );
        $cww_icon_twitter       = get_theme_mod( 'cww_icon_twitter', $default['cww_icon_twitter'] );
        $cww_icon_lnkedin       = get_theme_mod( 'cww_icon_lnkedin', $default['cww_icon_lnkedin'] );

        $defaults               = cww_portfolio_pro_customizer_defaults();
        $cww_icon_yt            = get_theme_mod( 'cww_icon_yt', $defaults['cww_icon_yt'] );
        $cww_icon_pin           = get_theme_mod( 'cww_icon_pin', $defaults['cww_icon_pin'] );
        $cww_icon_whatsapp      = get_theme_mod( 'cww_icon_whatsapp', $defaults['cww_icon_whatsapp'] );
        $cww_icon_email         = get_theme_mod( 'cww_icon_email', $defaults['cww_icon_email'] );


        if( $cww_icon_fb || $cww_icon_insta || $cww_icon_twitter || $cww_icon_lnkedin || $cww_icon_yt || $cww_icon_pin || $cww_icon_whatsapp || $cww_icon_email ){

            ?>
            <div class="social-icon-wrapp">
                
                <?php if($cww_icon_fb){ ?>
                <a href="<?php echo esc_url($cww_icon_fb) ?>">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <?php } ?>

                <?php if($cww_icon_insta){ ?>
                <a href="<?php echo esc_url($cww_icon_insta) ?>">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <?php } ?>

                <?php if($cww_icon_twitter){ ?>
                <a href="<?php echo esc_url($cww_icon_twitter) ?>">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <?php } ?>

                <?php if($cww_icon_lnkedin){ ?>
                <a href="<?php echo esc_url($cww_icon_lnkedin) ?>">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <?php } ?>

                <?php if($cww_icon_yt){ ?>
                <a href="<?php echo esc_url($cww_icon_yt) ?>">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
                <?php } ?>

                <?php if($cww_icon_pin){ ?>
                <a href="<?php echo esc_url($cww_icon_pin) ?>">
                    <i class="fa fa-pinterest" aria-hidden="true"></i>
                </a>
                <?php } ?>

                <?php if($cww_icon_whatsapp){ ?>
                <a href="<?php echo esc_url($cww_icon_whatsapp) ?>">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </a>
                <?php } ?>

                <?php if($cww_icon_email){ ?>
                <a href="mailto:<?php echo esc_url($cww_icon_email) ?>">
                    <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                </a>
                <?php } ?>




            </div>
        <?php } 
         
        }


        function include_after_plugins(){
            require CWW_PP_PATH. '/inc/woo/woo-functions.php';
        }


        function cww_pp_plugin_path() {
          // gets the absolute path to this plugin directory
          return untrailingslashit( plugin_dir_path( __FILE__ ) );
        }


        
        function cww_pp_woocommerce_locate_template( $template, $template_name, $template_path ) {
          global $woocommerce;

          $_template = $template;

          if ( ! $template_path ) $template_path = $woocommerce->template_url;

          $plugin_path  = $this->cww_pp_plugin_path() . '/woocommerce/';

          // Look within passed path within the theme - this is priority
          $template = locate_template(

            array(
              $template_path . $template_name,
              $template_name
            )
          );

          // Modification: Get the template from this plugin, if it exists
          if ( ! $template && file_exists( $plugin_path . $template_name ) )
            $template = $plugin_path . $template_name;

          // Use default template
          if ( ! $template )
            $template = $_template;

          // Return what we found
          return $template;
        }



        /**
        * Single template for custom post types portfolio and team
        * load this template if not found on theme and on child themes
        *
        */

        function single_post_templates( $template ) {
            global $post;

            if ( 'portfolio' === $post->post_type && locate_template( array( 'single-portfolio.php' ) ) !== $template ) {
                
                return CWW_PP_PATH . 'inc/single-portfolio.php';
            }


            


             if ( 'team' === $post->post_type && locate_template( array( 'single-team.php' ) ) !== $template ) {
                
                return CWW_PP_PATH . 'inc/single-team.php';
            }

            return $template;
        }


        function archive_post_templates($template){

            global $post;

            if ( 'portfolio' === $post->post_type && locate_template( array( 'archive-portfolio.php' ) ) !== $template ) {
                
                return CWW_PP_PATH . 'inc/archive-portfolio.php';
            }
        }

        /**
         * Register Image sizes
         * 
         */ 
        function register_image_sizes(){
            add_image_size( 'cww-portfolio-pro-portfolio', 425, 425, true );
        }


        

    }

endif;

if ( !function_exists( 'cww_portfolio_pro' ) ) {

    /**
     * Returns instanse of the plugin class.
     *
     * @since  1.0.0
     * @return object
     */
    function cww_portfolio_pro() {
        return CWW_Portfolio_Pro::get_instance();
    }

}

cww_portfolio_pro();
