<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package CWW Portfolio Pro
 */
if ( ! class_exists( 'WooCommerce' ) ) {
  return;
}

add_action( 'wp_enqueue_scripts', 'cww_pp_woo_styles' );
function cww_pp_woo_styles(){
  wp_enqueue_style( 'cww-portfolio-pro-woo', CWW_PP_ASS_URL.'/css/woo.css', array(), CWW_PP_VER );
}

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
add_action('init','cww_pp_woo_init');
function cww_pp_woo_init(){
  remove_action( 'woocommerce_sidebar',             'woocommerce_get_sidebar',                  10 );
  remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
}

add_action( 'after_setup_theme', 'cww_pp_woocommerce_setup');
function cww_pp_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}




/**
* Disable woocommerce shop page title
*/
add_filter('woocommerce_show_page_title','__return_false');


add_action('woocommerce_before_shop_loop','cww_woo_shop_header_wrapp_start',9);
if( ! function_exists('cww_woo_shop_header_wrapp_start')):
	function cww_woo_shop_header_wrapp_start(){ ?>
    <div class="container">
		<div class="cww-shop-header-wrapp clearfix">
<?php 
	}
endif;


add_action('woocommerce_before_shop_loop','cww_woo_shop_header_wrapp_end',31);
if( ! function_exists('cww_woo_shop_header_wrapp_end')):
	function cww_woo_shop_header_wrapp_end(){ ?>
	</div>
<?php 
	}
endif;

add_action('woocommerce_after_shop_loop','cww_woo_after_shop_loop');
if( ! function_exists('cww_woo_after_shop_loop')):
  function cww_woo_after_shop_loop(){
    ?>
    </div>
    <?php 
  }
endif;

/**
* add container to single product page
*
*/
add_action('woocommerce_before_single_product','cww_woo_woocommerce_before_single_product',9);
if( ! function_exists('cww_woo_woocommerce_before_single_product')):
  function cww_woo_woocommerce_before_single_product(){
    ?>
    <div class="container">
    <?php 
  }
endif;

add_action('woocommerce_after_single_product','cww_woo_woocommerce_after_single_product');
if( ! function_exists('cww_woo_woocommerce_after_single_product')):
  function cww_woo_woocommerce_after_single_product(){
    ?>
    </div>
    <?php 
  }
endif;


/**
* Cart Icon
*
*
*/
add_action('cww_cart_icon_disp','cww_cart_icon_disp');

if( ! function_exists('cww_cart_icon_disp')){
  function cww_cart_icon_disp(){
    echo '<i class="fa fa-shopping-basket" aria-hidden="true"></i>';
  }
}

/**
* Cart counter
*
*/
if (! function_exists('cww_header_cart_counter')){
  function cww_header_cart_counter(){ ?>

    <a class="cart-contentsone" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'cww-portfolio-pro' ); ?>">
         <?php do_action('cww_cart_icon_disp'); ?>
         <span class="cart-count"><?php echo wp_kses_data( sprintf(  WC()->cart->get_cart_contents_count() ) ); ?></span>
    </a>
  <?php 
  }
}

/**
* Header Shopping Cart function 
*/
add_action('cww_portfolio_header_button','cww_header_cart', 20 );
if ( ! function_exists( 'cww_header_cart' ) ) {
   function cww_header_cart(){ 
   
    if ( is_cart() ) {
      $class = 'current-menu-item';
    } else {
      $class = '';
    }
    ?>
    <div class="cart-wrapper">
    <ul class="site-header-cart">
      <li class="<?php echo esc_attr( $class ); ?> cww-cart">
        <?php cww_header_cart_counter(); ?>
        <?php do_action('cww_header_cart_text'); // header cart text ?>
      </li>
      <?php if( ! wp_is_mobile() ){ ?>
        <li class="cart-itm">
          <?php
          $instance = array(
            'title' => '',
          );

          the_widget( 'WC_Widget_Cart', $instance );
          ?>
        </li> 
      <?php } ?>
      
    </ul>
    </div>
    <?php  
     
  
   }
}

if ( ! function_exists( 'cww_cart_fragments' ) ) {

    function cww_cart_fragments( $fragments ) {
        global $woocommerce;
        ob_start();
        cww_header_cart_counter();
        $fragments['a.cart-contentsone'] = ob_get_clean();
        return $fragments;
    }
}
add_filter( 'woocommerce_add_to_cart_fragments', 'cww_cart_fragments' );