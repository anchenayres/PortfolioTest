<?php

namespace BizzElements;

if ( !defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

if ( !function_exists( 'is_plugin_active' ) ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

final class Modules_Manager {

    private function is_module_active( $module_id ) {

        $options = get_option( 'element_pack_active_modules', [] );
        return true;

        /* if ( $options[ $module_id ] == "on" ) {
          return true;
          } else {
          return false;
          } */
    }

    private function require_files() {
        require( BIZZ_EL_PATH . 'base/module_base.php' );
    }

    public function register_modules() {
        $modules = [
            'section-title',
            'client-logo',
            'services',
            'animated-banner',
            'animated-heading',
            'circular-bars',
            'simple-services',
            'blogs',
            'testimonials',
            'portfolio',
            'portfolio-filter',
            'teams',
            'advanced-button',
            'round-images',
            'tabs',
            'elementor',
        ];

        if ( class_exists('WooCommerce') ) {
            $modules[] = 'product-slider';
        }

        if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
            $modules[] = 'contact-form-seven';
        }

        


        foreach ( $modules as $module ) {
            if ( !$this->is_module_active( $module ) ) {
                continue;
            }

            $class_name = str_replace( '-', ' ', $module );
            $class_name = str_replace( ' ', '', ucwords( $class_name ) );
            $class_name = __NAMESPACE__ . '\\Modules\\' . $class_name . '\Module';

            $class_name::instance();
        }
    }

    public function __construct() {
        $this->require_files();
        $this->register_modules();
    }

}

if ( !function_exists( 'code_elements_module_manager' ) ) {

    /**
     * Returns an instance of the plugin class.
     * @since  1.0.0
     * @return object
     */
    function code_elements_module_manager() {
        return new Modules_Manager();
    }

}
code_elements_module_manager();
