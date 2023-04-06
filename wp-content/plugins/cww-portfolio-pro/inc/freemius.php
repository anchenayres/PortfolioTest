<?php

if ( !function_exists( 'cww_portfolio_pro_fs' ) ) {
    // Create a helper function for easy SDK access.
    function cww_portfolio_pro_fs()
    {
        global  $cww_portfolio_pro_fs ;
        
        if ( !isset( $cww_portfolio_pro_fs ) ) {
            // Include Freemius SDK.
            require_once CWW_PP_PATH . '/freemius/start.php';
            $cww_portfolio_pro_fs = fs_dynamic_init( array(
                'id'               => '8533',
                'slug'             => 'cww-portfolio-pro',
                'premium_slug'     => 'cww-portfolio-pro',
                'type'             => 'plugin',
                'public_key'       => 'pk_13772de0e3fc3476408181fc67c31',
                'is_premium'       => true,
                'is_premium_only'  => true,
                'has_addons'       => false,
                'has_paid_plans'   => true,
                'is_org_compliant' => false,
                'menu'             => array(
                'first-path' => 'plugins.php',
                'contact'    => false,
                'support'    => false,
            ),
                'is_live'          => true,
            ) );
        }
        
        return $cww_portfolio_pro_fs;
    }
    
    // Init Freemius.
    cww_portfolio_pro_fs();
    // Signal that SDK was initiated.
    do_action( 'cww_portfolio_pro_fs_loaded' );
}
