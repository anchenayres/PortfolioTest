<?php
/**
 * Plugin Name: CWW Portfolio Pro
 * Plugin URI: http://codeworkweb.com/wordpress-themes/cww-portfolio-pro
 * Description: Premium addons for CWW Portfolio. This plugin adds premium features & functionalities to CWW Portfoli theme
 * Version: 1.1.8
 * Update URI: https://api.freemius.com
 * Author: Code Work Web
 * Author URI: https://codeworkweb.com
 * Text Domain: cww-portfolio-pro
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 *
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die();
}

define( 'CWW_PP_VER', '1.1.8' );

define( 'CWW_PP_FILE', __FILE__ );
define( 'CWW_PP_PLUGIN_BASENAME', plugin_basename( CWW_PP_FILE ) );
define( 'CWW_PP_PATH', plugin_dir_path( CWW_PP_FILE ) );
define( 'CWW_PP_URL', plugins_url( '/', CWW_PP_FILE ) );

define( 'CWW_PP_ASS_URL', CWW_PP_URL . 'inc/assets/' );

require CWW_PP_PATH. '/inc/freemius.php';

require CWW_PP_PATH. '/inc/customizer/defaults.php';
require CWW_PP_PATH. '/inc/customizer/customizer-load.php';

require CWW_PP_PATH. '/inc/homepage-hooks.php';
require CWW_PP_PATH. '/inc/cpt.php';


require CWW_PP_PATH. '/cww-portfolio-pro-class.php';
require CWW_PP_PATH. '/inc/customizer/section-reorder.php';
require CWW_PP_PATH. '/inc/preloader/preloader.php';
require CWW_PP_PATH. '/inc/customizer/typography/theme-typo.php';