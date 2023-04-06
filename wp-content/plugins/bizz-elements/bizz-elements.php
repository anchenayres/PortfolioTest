<?php

/**
 * Plugin Name: Bizz Elements
 * Plugin URI: http://codeworkweb.com/plugins/bizz-elements
 * Description: Bizz Elements is collection of useful elementor addons. This plugin takes your elementor experience to next level.
 * Version: 1.0.2
 * Author: CodeWorkWeb
 * Author URI: https://codeworkweb.com/
 * Text Domain: bizz-elements
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 *
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die();
}

define( 'BIZZ_EL_VERSION', '1.0.2' );

define( 'BIZZ_EL_FILE', __FILE__ );
define( 'BIZZ_EL_PLUGIN_BASENAME', plugin_basename( BIZZ_EL_FILE ) );
define( 'BIZZ_EL_PATH', plugin_dir_path( BIZZ_EL_FILE ) );
define( 'BIZZ_EL_URL', plugins_url( '/', BIZZ_EL_FILE ) );

define( 'BIZZ_EL_ASSETS_URL', BIZZ_EL_URL . 'assets/' );
update_option('elementor_onboarded', true );//disable elementor onboarding

require BIZZ_EL_PATH. '/freemius.php';

if ( !class_exists( 'Bizz_Elements' ) ) {

    /**
     * Sets up and initializes the plugin.
     */
    class Bizz_Elements {

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
        private $version = BIZZ_EL_VERSION;

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

            // Load translation files
            add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

            // Load necessary files.
            add_action( 'plugins_loaded', array( $this, 'init' ) );
        }

        /**
         * Loads the translation files.
         *
         * @since 1.0.0
         * @access public
         * @return void
         */
        public function load_plugin_textdomain() {
            load_plugin_textdomain( 'bizz-elements', false, basename( dirname( __FILE__ ) ) . '/languages' );
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
         * Manually init required modules.
         *
         * @return void
         */
        public function init() {

            // Check if Elementor installed and activated
            if ( !did_action( 'elementor/loaded' ) ) {
                add_action( 'admin_notices', array( $this, 'required_plugins_notice' ) );
                return;
            }

            require( BIZZ_EL_PATH . 'includes/code-widget-loader.php' );
            require( BIZZ_EL_PATH . 'includes/helper-functions.php' );


            
        }

        /**
         * Show recommended plugins notice.
         *
         * @return void
         */
        public function required_plugins_notice() {
            $screen = get_current_screen();
            if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
                return;
            }

            $plugin = 'elementor/elementor.php';

            if ( $this->is_elementor_installed() ) {
                if ( !current_user_can( 'activate_plugins' ) ) {
                    return;
                }

                $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
                $admin_message = '<p>' . esc_html__( 'Ops! Bizz Elements is not working because you need to activate the Elementor plugin first.', 'bizz-elements' ) . '</p>';
                $admin_message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, esc_html__( 'Activate Elementor Now', 'bizz-elements' ) ) . '</p>';
            } else {
                if ( !current_user_can( 'install_plugins' ) ) {
                    return;
                }

                $install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
                $admin_message = '<p>' . esc_html__( 'Ops! Bizz Elements is not working because you need to install the Elementor plugin', 'bizz-elements' ) . '</p>';
                $admin_message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $install_url, esc_html__( 'Install Elementor Now', 'bizz-elements' ) ) . '</p>';
            }

            echo '<div class="error">' . $admin_message . '</div>';
        }

        /**
         * Check if has elementor installed
         *
         * @return boolean
         */
        public function is_elementor_installed() {
            $file_path = 'elementor/elementor.php';
            $installed_plugins = get_plugins();

            return isset( $installed_plugins[ $file_path ] );
        }

    }

}

if ( !function_exists( 'bizz_elements' ) ) {

    /**
     * Returns instanse of the plugin class.
     *
     * @since  1.0.0
     * @return object
     */
    function bizz_elements() {
        return Bizz_Elements::get_instance();
    }

}

bizz_elements();
