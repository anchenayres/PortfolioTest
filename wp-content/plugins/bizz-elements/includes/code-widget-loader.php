<?php

namespace BizzElements;

if ( !defined( 'ABSPATH' ) )
    exit();

class BizzElementsWidgetLoader {

    private static $instance = null;

    /**
     * Initialize integration hooks
     *
     * @return void
     */
    public function __construct() {
        spl_autoload_register( [ $this, 'autoload' ] );

        $this->includes();
        // Elementor hooks
        $this->add_actions();
        
    }

    function add_elementor_widget_categories() {

        $groups = array(
            'bizz-elements'    => esc_html__( 'Bizz - Elements', 'bizz-elements' ),
            'code-elements-modules'     => esc_html__( 'Code - Modules', 'bizz-elements' ),
            'code-elements-grid'        => esc_html__( 'Code - Grid', 'bizz-elements' ),
            'code-elements-hero'        => esc_html__( 'Code - Hero', 'bizz-elements' ),
            'code-elements-slider'      => esc_html__( 'Code - Slider', 'bizz-elements' ),
            'code-elements-element'     => esc_html__( 'Code - Element', 'bizz-elements' ),
            'code-elements-carousel'    => esc_html__( 'Code - Carousel', 'bizz-elements' ),
            'code-elements-footer'      => esc_html__( 'Code - Footer', 'bizz-elements' ),
            'code-elements-post'        => esc_html__( 'Code - Post', 'bizz-elements' ),
            'code-elements-archive'     => esc_html__( 'Code - Archive', 'bizz-elements' )

        );

        foreach ( $groups as $key => $value )
        {
            \Elementor\Plugin::$instance->elements_manager->add_category( $key, [ 'title' => $value ], 1 );
        }

    }

    /**
     * we loaded module manager + admin php from here
     * @return [type] [description]
     */
    private function includes() {
        require BIZZ_EL_PATH . 'includes/module-manager.php';
    }

    /**
     * Autoload Classes
     *
     * @since 1.6.0
     */
    public function autoload( $class ) {
        if ( 0 !== strpos( $class, __NAMESPACE__ ) ) {
            return;
        }

        $has_class_alias = isset( $this->classes_aliases[ $class ] );

        // Backward Compatibility: Save old class name for set an alias after the new class is loaded
        if ( $has_class_alias ) {
            $class_alias_name = $this->classes_aliases[ $class ];
            $class_to_load = $class_alias_name;
        } else {
            $class_to_load = $class;
        }

        if ( !class_exists( $class_to_load ) ) {

            $filename = strtolower(
                    preg_replace(
                            [ '/^' . __NAMESPACE__ . '\\\/', '/([a-z])([A-Z])/', '/_/', '/\\\/' ], [ '', '$1-$2', '-', DIRECTORY_SEPARATOR ], $class_to_load
                    )
            );

            $filename = BIZZ_EL_PATH . $filename . '.php';

            if ( is_readable( $filename ) ) {
                include( $filename );
            }
        }

        if ( $has_class_alias ) {
            class_alias( $class_alias_name, $class );
        }
    }

    /**
     * Add Actions
     *
     * @since 0.1.0
     *
     * @access private
     */
    public function add_actions() {
        add_action( 'elementor/init', [ $this, 'add_elementor_widget_categories' ] );

        // Fires after Elementor controls are registered.
        add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );

        //FrontEnd Scripts
        add_action( 'elementor/frontend/before_register_scripts', [ $this, 'register_frontend_scripts' ] );
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'enqueue_frontend_scripts' ] );

        //FrontEnd Styles
        add_action( 'elementor/frontend/before_register_styles', [ $this, 'register_frontend_styles' ] );
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_frontend_styles' ] );

        //Editor Scripts
        add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_editor_scripts' ] );

        //Editor Style
        add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'enqueue_editor_styles' ] );

        //Fires after Elementor preview styles are enqueued.
        add_action( 'elementor/preview/enqueue_styles', [ $this, 'enqueue_preview_styles' ] );
    }

    /**
     * Register Controls
     * @since 1.0.0
     * @access public
     */
    public function register_controls() {
        require_once BIZZ_EL_PATH . 'includes/controls/groups/group-control-query.php';
        require_once BIZZ_EL_PATH . 'includes/controls/groups/group-control-header.php';
        require_once BIZZ_EL_PATH . 'includes/controls/groups/group-control-header-filter.php';
        require_once BIZZ_EL_PATH . 'includes/controls/groups/group-control-contents.php';

        // Register Group
        \Elementor\Plugin::instance()->controls_manager->add_group_control( 'code-elements-query', new Group_Control_Query() );
        \Elementor\Plugin::instance()->controls_manager->add_group_control( 'code-elements-header', new Group_Control_Header() );
        \Elementor\Plugin::instance()->controls_manager->add_group_control( 'code-elements-header-filter', new Group_Control_Header_filter() );
        \Elementor\Plugin::instance()->controls_manager->add_group_control( 'code-elements-post-contents', new Group_Control_Post_Contents() );
    }

    /**
     * Register Frontend Scripts
     * @since 1.0.0
     * @access public
     */
    public function register_frontend_scripts() {
        
        $lib_js             = BIZZ_EL_URL . 'assets/lib/js';
        $lib                = BIZZ_EL_URL . 'assets/lib';

        wp_register_script( 'bizz-elements-uikit',  BIZZ_EL_URL. '/assets/js/bizz-elements-uikit.js', ['jquery'], BIZZ_EL_VERSION, true );
        wp_register_script( 'morphext', $lib_js.    '/morphext.min.js', ['jquery'], BIZZ_EL_VERSION, true );
        wp_register_script( 'typed', $lib_js.       '/typed.min.js', ['jquery'], '', true );
        wp_register_script( 'jquery-classyloader', $lib_js.       '/jquery.classyloader.min.js', ['jquery'], '', true );
        wp_register_script( 'jquery-waypoints', $lib_js.       '/jquery.waypoints.min.js', ['jquery'], '', true );
        wp_register_script( 'isotope', $lib.       '/isotope/isotope.pkgd.js', ['jquery','imagesloaded'], '', true );
       // wp_register_script( 'packery', $lib.       '/isotope/packery-mode.pkgd.js', ['jquery','imagesloaded'], '', true );
        
    }

    /**
     * Enqueue Frontend Scripts
     * @since 1.0.0
     * @access public
     */
    public function enqueue_frontend_scripts() {
        $direction_suffix = is_rtl() ? '.rtl' : '';
        $lib_dir = BIZZ_EL_URL. 'assets/lib/';

        wp_enqueue_script('jarallax',$lib_dir .'/jarallax/jarallax.min.js',[],BIZZ_EL_VERSION);
        wp_enqueue_script('jquery-sticky-sidebar',$lib_dir .'/js/jquery.sticky-sidebar.min.js',[],BIZZ_EL_VERSION);
        wp_enqueue_script( 'slick', $lib_dir . 'slick/slick.min.js', [], BIZZ_EL_VERSION );
        wp_enqueue_script( 'code-elements-frontend', BIZZ_EL_URL . 'assets/js/frontend.js', [], BIZZ_EL_VERSION );
    }

    /**
     * Register Frontend Styles
     * @since 1.0.0
     * @access public
     */
    public function register_frontend_styles() {
        $lib_dir = BIZZ_EL_URL. 'assets/lib/';

        wp_register_style( 'biz-elements-tabs', BIZZ_EL_URL . 'assets/css/tabs.css', [], BIZZ_EL_VERSION );
        wp_register_style( 'biz-elements-round-images', BIZZ_EL_URL . 'assets/css/round-images.css', [], BIZZ_EL_VERSION );
        wp_register_style( 'biz-elements-adv-button', BIZZ_EL_URL . 'assets/css/adv-button.css', [], BIZZ_EL_VERSION );
        wp_register_style( 'biz-elements-portfolio', BIZZ_EL_URL . 'assets/css/portfolio.css', [], BIZZ_EL_VERSION );
        wp_register_style( 'biz-elements-teams', BIZZ_EL_URL . 'assets/css/teams.css', [], BIZZ_EL_VERSION );
        wp_register_style( 'biz-elements-testimonials', BIZZ_EL_URL . 'assets/css/testimonials.css', [], BIZZ_EL_VERSION );
        wp_register_style( 'biz-elements-blogs', BIZZ_EL_URL . 'assets/css/blogs.css', [], BIZZ_EL_VERSION );
        wp_register_style( 'biz-elements-cf7', BIZZ_EL_URL . 'assets/css/cf7-styles.css', [], BIZZ_EL_VERSION );
        wp_register_style( 'code-woo', BIZZ_EL_URL . 'assets/css/woo.css', [], BIZZ_EL_VERSION );
        wp_register_style( 'slick-theme', $lib_dir . 'slick/slick-theme.css', [], BIZZ_EL_VERSION );
    }

    /**
     * Enqueue Frontend Styles
     * @since 1.0.0
     * @access public
     */
    public function enqueue_frontend_styles() {
        $lib_dir = BIZZ_EL_URL. 'assets/lib/';

        wp_enqueue_style( 'jarallax', $lib_dir . 'jarallax/jarallax.css', [], BIZZ_EL_VERSION );
        wp_enqueue_style( 'slick', $lib_dir . 'slick/slick.css', [], BIZZ_EL_VERSION );
        wp_enqueue_style( 'code-elements-vars', BIZZ_EL_URL . 'assets/css/style-vars.css', [], BIZZ_EL_VERSION );
        wp_enqueue_style( 'code-elements-frontend', BIZZ_EL_URL . 'assets/css/frontend.css', [], BIZZ_EL_VERSION );
    }

    /**
     * Enqueue Editor Scripts
     * @since 1.0.0
     * @access public
     */
    public function enqueue_editor_scripts() {
        
    }

    /**
     * Enqueue Editor Styles
     * @since 1.0.0
     * @access public
     */
    public function enqueue_editor_styles() {

     
     $editor_style  = BIZZ_EL_ASSETS_URL. '/css/';

     
     wp_enqueue_style( 'code-elements-editor-style', $editor_style . 'editor-styles.css', [], BIZZ_EL_VERSION );


     if (! defined('ELEMENTOR_PRO_VERSION')) {
        wp_enqueue_style( 'code-elements-editor-hide', $editor_style . 'editor-hide.css', [], BIZZ_EL_VERSION );
    }

    }

    /**
     * Preview Styles
     * @since 1.0.0
     * @access public
     */
    public function enqueue_preview_styles() {
        
    }

    /**
     * Creates and returns an instance of the class
     * @since 1.0.0
     * @access public
     * return object
     */
    public static function get_instance() {
        if ( self::$instance == null ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}

if ( !function_exists( 'code_elements_widget_loader' ) ) {

    /**
     * Returns an instance of the plugin class.
     * @since  1.0.0
     * @return object
     */
    function code_elements_widget_loader() {
        return BizzElementsWidgetLoader::get_instance();
    }

}
code_elements_widget_loader();
