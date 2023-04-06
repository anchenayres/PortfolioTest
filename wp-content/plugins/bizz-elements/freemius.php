<?php

if ( !function_exists( 'be_fs' ) ) {
    // Create a helper function for easy SDK access.
    function be_fs()
    {
        global  $be_fs ;
        
        if ( !isset( $be_fs ) ) {
            // Include Freemius SDK.
            require_once BIZZ_EL_PATH . '/freemius/start.php';
            $be_fs = fs_dynamic_init( array(
                'id'               => '9793',
                'slug'             => 'bizz-elements',
                'premium_slug'     => 'bizz-elements',
                'type'             => 'plugin',
                'public_key'       => 'pk_bd57bbce09947d37298ffd79461e2',
                'is_premium'       => true,
                'is_premium_only'  => true,
                'has_addons'       => false,
                'has_paid_plans'   => true,
                'is_org_compliant' => false,
                'menu'             => array(
                'first-path' => 'plugins.php',
                'support'    => false,
            ),
                'is_live'          => true,
            ) );
        }
        
        return $be_fs;
    }
    
    // Init Freemius.
    be_fs();
    // Signal that SDK was initiated.
    do_action( 'be_fs_loaded' );
}
