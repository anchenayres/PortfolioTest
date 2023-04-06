<?php

// Get all elementor page templates
if ( !function_exists( 'code_elements_get_page_templates' ) ) {

    function code_elements_get_page_templates( $type = '' ) {
        $args = [
            'post_type' => 'elementor_library',
            'posts_per_page' => -1,
        ];

        if ( $type ) {
            $args[ 'tax_query' ] = [
                [
                    'taxonomy' => 'elementor_library_type',
                    'field' => 'slug',
                    'terms' => $type,
                ]
            ];
        }

        $page_templates = get_posts( $args );

        $options = array();

        if ( !empty( $page_templates ) && !is_wp_error( $page_templates ) ) {
            foreach ( $page_templates as $post ) {
                $options[ $post->ID ] = $post->post_title;
            }
        }
        return $options;
    }

}

// Get all forms of Contact Form 7 plugin
if ( !function_exists( 'code_elements_get_contact_form_7_forms' ) ) {

    function code_elements_get_contact_form_7_forms() {
        if ( function_exists( 'wpcf7' ) ) {
            $options = array();

            $args = array(
                'post_type' => 'wpcf7_contact_form',
                'posts_per_page' => -1
            );

            $contact_forms = get_posts( $args );

            if ( !empty( $contact_forms ) && !is_wp_error( $contact_forms ) ) {

                $i = 0;

                foreach ( $contact_forms as $post ) {
                    if ( $i == 0 ) {
                        $options[ 0 ] = esc_html__( 'Select a Contact form', 'power-pack' );
                    }
                    $options[ $post->ID ] = $post->post_title;
                    $i++;
                }
            }
        } else {
            $options = array();
        }

        return $options;
    }

}

// Get all forms of Gravity Forms plugin
if ( !function_exists( 'code_elements_get_gravity_forms' ) ) {

    function code_elements_get_gravity_forms() {
        if ( class_exists( 'GFCommon' ) ) {
            $options = array();

            $contact_forms = RGFormsModel::get_forms( null, 'title' );

            if ( !empty( $contact_forms ) && !is_wp_error( $contact_forms ) ) {

                $i = 0;

                foreach ( $contact_forms as $form ) {
                    if ( $i == 0 ) {
                        $options[ 0 ] = esc_html__( 'Select a Contact form', 'power-pack' );
                    }
                    $options[ $form->id ] = $form->title;
                    $i++;
                }
            }
        } else {
            $options = array();
        }

        return $options;
    }

}

// Get all forms of Ninja Forms plugin
if ( !function_exists( 'code_elements_get_ninja_forms' ) ) {

    function code_elements_get_ninja_forms() {
        if ( class_exists( 'Ninja_Forms' ) ) {
            $options = array();

            $contact_forms = Ninja_Forms()->form()->get_forms();

            if ( !empty( $contact_forms ) && !is_wp_error( $contact_forms ) ) {

                $i = 0;

                foreach ( $contact_forms as $form ) {
                    if ( $i == 0 ) {
                        $options[ 0 ] = esc_html__( 'Select a Contact form', 'power-pack' );
                    }
                    $options[ $form->get_id() ] = $form->get_setting( 'title' );
                    $i++;
                }
            }
        } else {
            $options = array();
        }

        return $options;
    }

}

// Get all forms of Caldera plugin
if ( !function_exists( 'code_elements_get_caldera_forms' ) ) {

    function code_elements_get_caldera_forms() {
        if ( class_exists( 'Caldera_Forms' ) ) {
            $options = array();

            $contact_forms = Caldera_Forms_Forms::get_forms( true, true );

            if ( !empty( $contact_forms ) && !is_wp_error( $contact_forms ) ) {

                $i = 0;

                foreach ( $contact_forms as $form ) {
                    if ( $i == 0 ) {
                        $options[ 0 ] = esc_html__( 'Select a Contact form', 'power-pack' );
                    }
                    $options[ $form[ 'ID' ] ] = $form[ 'name' ];
                    $i++;
                }
            }
        } else {
            $options = array();
        }

        return $options;
    }

}

// Get all forms of WPForms plugin
if ( !function_exists( 'code_elements_get_wpforms_forms' ) ) {

    function code_elements_get_wpforms_forms() {
        if ( function_exists( 'wpforms' ) ) {
            $options = array();

            $args = array(
                'post_type' => 'wpforms',
                'posts_per_page' => -1
            );

            $contact_forms = get_posts( $args );

            if ( !empty( $contact_forms ) && !is_wp_error( $contact_forms ) ) {

                $i = 0;

                foreach ( $contact_forms as $post ) {
                    if ( $i == 0 ) {
                        $options[ 0 ] = esc_html__( 'Select a Contact form', 'power-pack' );
                    }
                    $options[ $post->ID ] = $post->post_title;
                    $i++;
                }
            }
        } else {
            $options = array();
        }

        return $options;
    }

}

// Get categories
if ( !function_exists( 'code_elements_get_post_categories' ) ) {

    function code_elements_get_post_categories() {

        $options = array();

        $terms = get_terms( array(
            'taxonomy' => 'category',
            'hide_empty' => true,
                ) );

        if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                $options[ $term->term_id ] = $term->name;
            }
        }

        return $options;
    }

}

// Get Post Types
if ( !function_exists( 'code_elements_get_post_types' ) ) {

    function code_elements_get_post_types() {
        $code_elements_post_types = array();

        $code_elements_post_types_obj = get_post_types( array(
            'public' => true,
            'show_in_nav_menus' => true
                ), 'objects' );

        foreach ( $code_elements_post_types_obj as $post_type => $object ) {
            $code_elements_post_types[ $post_type ] = $object->label;
        }
        return $code_elements_post_types;
    }

}

// Get all Authors
if ( !function_exists( 'code_elements_get_auhtors' ) ) {

    function code_elements_get_auhtors() {

        $options = array();

        $users = get_users();

        foreach ( $users as $user ) {
            $options[ $user->ID ] = $user->display_name;
        }

        return $options;
    }

}

// Get all Authors
if ( !function_exists( 'code_elements_get_tags' ) ) {

    function code_elements_get_tags() {

        $options = array();

        $tags = get_tags();

        foreach ( $tags as $tag ) {
            $options[ $tag->term_id ] = $tag->name;
        }

        return $options;
    }

}

// Get all Posts
if ( !function_exists( 'code_elements_get_posts' ) ) {

    function code_elements_get_posts() {

        $post_list = get_posts( array(
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => -1,
                ) );

        $posts = array();

        if ( !empty( $post_list ) && !is_wp_error( $post_list ) ) {
            foreach ( $post_list as $post ) {
                $posts[ $post->ID ] = $post->post_title;
            }
        }

        return $posts;
    }

}

// Custom Excerpt
if ( !function_exists( 'code_elements_custom_excerpt' ) ) {

    function code_elements_custom_excerpt( $limit = '' ) {
        $excerpt = explode( ' ', get_the_excerpt(), $limit );
        if ( count( $excerpt ) >= $limit ) {
            array_pop( $excerpt );
            $excerpt = implode( " ", $excerpt ) . '...';
        } else {
            $excerpt = implode( " ", $excerpt );
        }
        $excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );
        return $excerpt;
    }

}
add_filter( 'get_the_excerpt', 'do_shortcode' );

// Get Counter Years
function code_elements_get_normal_years() {
    $options = array( '0' => __( 'Year', 'power-pack' ) );

    for ( $i = date( 'Y' ); $i < date( 'Y' ) + 6; $i++ ) {
        $options[ $i ] = $i;
    }

    return $options;
}

// Get Counter Month
function code_elements_get_normal_month() {
    $months = array(
        '1' => __( 'Jan', 'power-pack' ),
        '2' => __( 'Feb', 'power-pack' ),
        '3' => __( 'Mar', 'power-pack' ),
        '4' => __( 'Apr', 'power-pack' ),
        '5' => __( 'May', 'power-pack' ),
        '6' => __( 'Jun', 'power-pack' ),
        '7' => __( 'Jul', 'power-pack' ),
        '8' => __( 'Aug', 'power-pack' ),
        '9' => __( 'Sep', 'power-pack' ),
        '10' => __( 'Oct', 'power-pack' ),
        '11' => __( 'Nov', 'power-pack' ),
        '12' => __( 'Dec', 'power-pack' ),
    );

    $options = array( '0' => __( 'Month', 'power-pack' ), );

    for ( $i = 1; $i <= 12; $i++ ) {
        $options[ $i ] = $months[ $i ];
    }

    return $options;
}

// Get Counter Date
function code_elements_get_normal_date() {
    $options = array( '0' => __( 'Date', 'power-pack' ) );

    for ( $i = 1; $i <= 31; $i++ ) {
        $options[ $i ] = $i;
    }

    return $options;
}

// Get Counter Hours
function code_elements_get_normal_hour() {
    $options = array( '0' => __( 'Hour', 'power-pack' ) );

    for ( $i = 0; $i < 24; $i++ ) {
        $options[ $i ] = $i;
    }

    return $options;
}

// Get Counter Minutes
function code_elements_get_normal_minutes() {
    $options = array( '0' => __( 'Minute', 'power-pack' ) );

    for ( $i = 0; $i < 60; $i++ ) {
        $options[ $i ] = $i;
    }

    return $options;
}

// Get Counter Seconds
function code_elements_get_normal_seconds() {
    $options = array( '0' => __( 'Seconds', 'power-pack' ) );

    for ( $i = 0; $i < 60; $i++ ) {
        $options[ $i ] = $i;
    }

    return $options;
}

if ( !function_exists( 'is_plugin_active' ) ) {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if ( class_exists( 'WooCommerce' ) || is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

    // Get all Products
    if ( !function_exists( 'code_elements_get_products' ) ) {

        function code_elements_get_products() {

            $post_list = get_posts( array(
                'post_type' => 'product',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => -1,
                    ) );

            $posts = array();

            if ( !empty( $post_list ) && !is_wp_error( $post_list ) ) {
                foreach ( $post_list as $post ) {
                    $posts[ $post->ID ] = $post->post_title;
                }
            }

            return $posts;
        }

    }

    // Woocommerce - Get product categories
    if ( !function_exists( 'code_elements_get_product_categories' ) ) {

        function code_elements_get_product_categories() {

            $options = array();

            $terms = get_terms( array(
                'taxonomy' => 'product_cat',
                'hide_empty' => true,
                    ) );

            if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
                foreach ( $terms as $term ) {
                    $options[ $term->term_id ] = $term->name;
                }
            }

            return $options;
        }

    }

    // WooCommerce - Get product tags
    if ( !function_exists( 'code_elements_product_get_tags' ) ) {

        function code_elements_product_get_tags() {

            $options = array();

            $tags = get_terms( 'product_tag' );

            if ( !empty( $tags ) && !is_wp_error( $tags ) ) {
                foreach ( $tags as $tag ) {
                    $options[ $tag->term_id ] = $tag->name;
                }
            }

            return $options;
        }

    }
}

function code_elements_get_modules() {
    $modules = array(
        'pp-link-effects' => __( 'Link Effects', 'powerpack' ),
        'pp-divider' => __( 'Divider', 'powerpack' ),
        'pp-recipe' => __( 'Recipe', 'powerpack' ),
        'pp-info-box' => __( 'Info Box', 'powerpack' ),
        'pp-info-box-carousel' => __( 'Info Box Carousel', 'powerpack' ),
        'pp-info-list' => __( 'Info List', 'powerpack' ),
        'pp-info-table' => __( 'Info Table', 'powerpack' ),
        'pp-tiled-posts' => __( 'Tiled Posts', 'powerpack' ),
        'pp-pricing-table' => __( 'Pricing Table', 'powerpack' ),
        'pp-price-menu' => __( 'Price Menu', 'powerpack' ),
        'pp-business-hours' => __( 'Businsess Hours', 'powerpack' ),
        'pp-team-member' => __( 'Team Member', 'powerpack' ),
        'pp-team-member-carousel' => __( 'Team Member Carousel', 'powerpack' ),
        'pp-counter' => __( 'Counter', 'powerpack' ),
        'pp-hotspots' => __( 'Image Hotspots', 'powerpack' ),
        'pp-icon-list' => __( 'Icon List', 'powerpack' ),
        'pp-dual-heading' => __( 'Dual Heading', 'powerpack' ),
        'pp-promo-box' => __( 'Promo Box', 'powerpack' ),
        'pp-logo-carousel' => __( 'Logo Carousel', 'powerpack' ),
        'pp-logo-grid' => __( 'Logo Grid', 'powerpack' ),
        'pp-modal-popup' => __( 'Modal Popup', 'powerpack' ),
        'pp-onepage-nav' => __( 'One Page Navigation', 'powerpack' ),
        'pp-table' => __( 'Table', 'powerpack' ),
        'pp-toggle' => __( 'Toggle', 'powerpack' ),
        'pp-image-comparison' => __( 'Image Comparison', 'powerpack' ),
        'pp-instafeed' => __( 'Instagram Feed', 'powerpack' ),
        'pp-google-maps' => __( 'Google Maps', 'powerpack' ),
        'pp-countdown' => __( 'Countdown', 'powerpack' ),
        'pp-buttons' => __( 'Buttons', 'powerpack' ),
        'pp-advanced-tabs' => __( 'Advanced Tabs', 'powerpack' ),
        'pp-advanced-menu' => __( 'Advanced Menu', 'powerpack' ),
        'pp-image-gallery' => __( 'Image Gallery', 'powerpack' ),
        'pp-image-slider' => __( 'Image Slider', 'powerpack' ),
        'pp-offcanvas-content' => __( 'Offcanvas Content', 'powerpack' ),
        'pp-showcase' => __( 'Showcase', 'powerpack' ),
        'pp-timeline' => __( 'Timeline', 'powerpack' ),
        'pp-card-slider' => __( 'Card Slider', 'powerpack' ),
    );

    // Contact Form 7
    if ( function_exists( 'wpcf7' ) ) {
        $modules[ 'pp-contact-form-7' ] = __( 'Contact Form 7', 'power-pack' );
    }

    // Gravity Forms
    if ( class_exists( 'GFCommon' ) ) {
        $modules[ 'pp-gravity-forms' ] = __( 'Gravity Forms', 'power-pack' );
    }

    // Ninja Forms
    if ( class_exists( 'Ninja_Forms' ) ) {
        $modules[ 'pp-ninja-forms' ] = __( 'Ninja Forms', 'power-pack' );
    }

    // Caldera Forms
    if ( class_exists( 'Caldera_Forms' ) ) {
        $modules[ 'pp-caldera-forms' ] = __( 'Caldera Forms', 'power-pack' );
    }

    // WPForms
    if ( function_exists( 'wpforms' ) ) {
        $modules[ 'pp-wpforms' ] = __( 'WPForms', 'power-pack' );
    }

    /* foreach ( $modules as $key => $label ) {
      if ( ! file_exists( POWERPACK_ELEMENTS_PATH . 'includes/widgets/'.$key.'.php' ) ) {
      unset( $modules[$key] );
      }
      } */

    ksort( $modules );

    return $modules;
}

function code_elements_get_enabled_modules() {
    //$enabled_modules = \PowerpackElements\Classes\code_elements_Admin_Settings::get_option( 'code_elements_elementor_modules', true );

    if ( !is_array( $enabled_modules ) ) {
        return array_keys( code_elements_get_modules() );
    } else {
        return $enabled_modules;
    }
}

// Get templates

function code_elements_get_saved_templates( $templates = array() ) {

    if ( empty( $templates ) ) {
        return array();
    }

    $options = array();

    foreach ( $templates as $template ) {
        $options[ $template[ 'template_id' ] ] = $template[ 'title' ];
    }

    return $options;
}




/**
* Queries for the elements
*
*/
if( ! function_exists('code_elements_query')){
    function code_elements_query( $settings, $first_id = '',$post_per_page = 4 ){

        
        $post_type      = $settings['posts_post_type'];
        $category       = '';
        $tags           = '';
        $exclude_posts  = '';
        $post_formats   = '';
        if( get_post_format() ){
            $post_formats   = $settings['posts_post_format_ids'];
        }
        

        if ( !empty( $post_formats) ) {
            $post_formats[] = implode( ",", $post_formats );
        }



        if( 'post' == $post_type ){

            $category       = $settings['posts_category_ids'];
            $tags           = $settings['posts_post_tag_ids'];
            $exclude_posts  = $settings['posts_exclude_posts'];

        }elseif( 'product' == $post_type ){

          $category         = $settings['posts_product_cat_ids'];  
          $exclude_posts    = $settings['posts_exclude_posts'];

        }

        //Categories
        $post_cat = '';
        $post_cats = $category;
        if ( ! empty( $category) ){
            asort($category);    
        }
        
        if ( !empty( $post_cats) ) {
            $post_cat = implode( ",", $post_cats );
        }

        
        if( !empty($first_id)){
            $post_cat = $category[0];
        }


        // Post Authors
        $post_author = '';
        $post_authors = $settings['posts_authors'];
        if ( !empty( $post_authors) ) {
            $post_author = implode( ",", $post_authors );
        }

        if( $post_formats ){

            $args = array(
                    'post_type'             => $post_type,
                    'post__in'              => '',
                    'cat'                   => $post_cat,
                    'author'                => $post_author,
                    'tag__in'               => $tags,
                    'orderby'               => $settings['posts_orderby'],
                    'order'                 => $settings['posts_order'],
                    'post__not_in'          => $exclude_posts,
                    'offset'                => $settings['posts_offset'],
                    'ignore_sticky_posts'   => 1,
                    'posts_per_page'        => $post_per_page,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'post_format',
                            'field'    => 'slug',
                            'terms'    => $post_formats,
                            'operator' => 'IN',
                        ),
                    ),
                );

        }else{

            $args = array(
                        'post_status'           => array( 'publish' ),
                        'post_type'             => $post_type,
                        'post__in'              => '',
                        'cat'                   => $post_cat,
                        'author'                => $post_author,
                        'tag__in'               => $tags,
                        'orderby'               => $settings['posts_orderby'],
                        'order'                 => $settings['posts_order'],
                        'post__not_in'          => $exclude_posts,
                        'offset'                => $settings['posts_offset'],
                        'ignore_sticky_posts'   => 1,
                        'posts_per_page'        => $post_per_page
                    );
        }

        if( 'product' == $post_type ){

            $args = array(
                        'post_type'             => 'product',
                        'post__in'              => '',
                        'orderby'               => $settings['posts_orderby'],
                        'order'                 => $settings['posts_order'],
                        'author'                => $post_author,
                        'posts_per_page'        => $post_per_page,
                        'post__not_in'          => $exclude_posts,
                        'offset'                => $settings['posts_offset'],
                       
                    );

            if( $post_cat ){
                 $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $post_cat
                            )
                        );
            }
        }


         return $args;

    }
}


/**
* Post title excerpt
*/
if( ! function_exists( 'code_elements_title_excerpt' ) ):
    function code_elements_title_excerpt( $settings ) {

            $title_excerpt_show = $settings['post_content_title_excerpt_show'];
            $length = absint( $settings['post_content_title_excerpt_length'] );
            $title  = get_the_title();
        
            $limit_content = mb_substr( $title, 0 , $length );
            $title_length = strlen($title);
               if( $title_length > $length){
                $limit_content .= $settings['post_content_title_suffix'];
               }

            $content = $title;
            if( $length && $title_excerpt_show == 'yes' ){
                $content = $limit_content;
            }

            $final_content = '<h2 class="post-title">';
            $final_content .= '<a href="'.get_the_permalink().'">';
            $final_content .= $content;
            $final_content .= '</a>';
            $final_content .= '</h2>';
            return $final_content;    
        
    }
endif;


/**
 * Function for excerpt length
 */
if( ! function_exists( 'code_elements_get_excerpt_content' ) ):
    function code_elements_get_excerpt_content( $limit ) { ?>

            <div class="post-excerpt">
                <?php 
                $content            = get_the_content();
                if( $limit ){
                    $striped_contents   = strip_shortcodes( $content );
                    $striped_content    = strip_tags( $striped_contents );
                    $limit_content      = mb_substr( $striped_content, 0 , $limit );
                    echo $limit_content;
                }else{
                    echo $content;
                } ?>
            </div>
        <?php 
    }
endif;

/**
* Function to generate post meta 
*
*/
if( ! function_exists('code_elements_post_meta')):
    function code_elements_post_meta($settings){

        if( $settings['post_meta'] == 'yes' ){ ?>
            <div class="post-meta">
              

                <?php if ( $settings['post_author'] == 'yes' ) { ?>
                        <span class="cww-post-author">
                            <?php echo get_the_author(); ?>
                        </span>
                    <?php } ?>

                    <?php if ( $settings['post_date'] == 'yes' ) { 
                        $time_string = sprintf( '<time class="entry-date" datetime="%1$s">%2$s</time>',
                            esc_attr( get_the_date( 'c' ) ),
                            get_the_date()
                        );

                        printf( '<span class="cww-post-date"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                            __( 'Posted on', 'bizz-elements' ),
                            $time_string
                        );
                    } 
                  ?>
            </div>
    <?php
        }
    }
endif;

/**
* Ajax module function
*
*/
if( ! function_exists('code_elements_post_meta_ajax')):
    function code_elements_post_meta_ajax($settings){

        $settings    = json_decode($settings);

        if( $settings->post_meta == 'yes' ){ ?>
            <div class="post-meta">
                <?php if( $settings->post_category == 'yes' ){ ?>
                <div class="post-categories">
                    <span>
                        <?php
                            $category = get_the_category();
                            if ( $category ) {
                                echo esc_attr( $category[0]->name );
                            }
                        ?>
                    </span>
                </div>
                <?php } ?>

                <?php if ( $settings->post_author == 'yes' ) { ?>
                        <span class="cww-post-author">
                            <?php echo get_the_author(); ?>
                        </span>
                    <?php } ?>

                    <?php if ( $settings->post_date == 'yes' ) { 
                        $time_string = sprintf( '<time class="entry-date" datetime="%1$s">%2$s</time>',
                            esc_attr( get_the_date( 'c' ) ),
                            get_the_date()
                        );

                        printf( '<span class="cww-post-date"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                            __( 'Posted on', 'bizz-elements' ),
                            $time_string
                        );
                    } 
                  ?>
            </div>
    <?php
        }
    }
endif;

/**
* Module Header titles
*
*/
if( ! function_exists('code_elements_header_titles')){
    function code_elements_header_titles($settings){

        $header_title   = $settings['header_header_title'];
        $header_link    = $settings['header_header_link'];
        $header_style   = $settings['header_header_style'];

        $header_url = isset($header_link['url']) ? $header_link['url'] : '';
        $new_tab    = ($header_link['is_external'] == true ) ? 'target="_blank"' : '';
        $nofollow   = ($header_link['nofollow'] == true) ? 'nofollow' : '';

        if( empty($header_title) ){
            return;
        }
        ?>
        <div class="header-title-wrapp <?php echo esc_attr($header_style); ?>">
            <?php if( $header_url ){ ?>
                <h3 class="title-wrap">
                    <a href="<?php echo esc_url($header_url); ?>" <?php echo $new_tab.' '.$nofollow; ?>>
                        <?php echo esc_html($header_title); ?>    
                    </a>
                </h3>    
            <?php }else{ ?>
                <h3 class="title-wrap"><?php echo esc_html($header_title); ?></h3>
            <?php } ?>
            
        </div>
        <?php 
    }
}


/**
* Display post posted category
*
*
*/
if(! function_exists('code_elements_posted_cat')){
    function code_elements_posted_cat(){
       echo '<div class="post-categories">';
        
        $category = get_the_category();
        $cat_link = get_category_link( $category[0]->term_id );

        if ($category) {
            echo '<a href="'.$cat_link.'" class="cat-' . $category[0]->term_id . '" rel="category tag">'.$category[0]->cat_name.'</a>';
        }
        
        echo '</div>';
    }
}

// Title Tags
function bizz_elements_title_tags() {
    $title_tags = [
        'h1'   => esc_html__( 'H1', 'bizz-elements' ),
        'h2'   => esc_html__( 'H2', 'bizz-elements' ),
        'h3'   => esc_html__( 'H3', 'bizz-elements' ),
        'h4'   => esc_html__( 'H4', 'bizz-elements' ),
        'h5'   => esc_html__( 'H5', 'bizz-elements' ),
        'h6'   => esc_html__( 'H6', 'bizz-elements' ),
        'div'  => esc_html__( 'div', 'bizz-elements' ),
        'span' => esc_html__( 'span', 'bizz-elements' ),
        'p'    => esc_html__( 'p', 'bizz-elements' ),
    ];

    return $title_tags;
}


//Transition
function bizz_elements_transition_options() {
    $transition_options = [
        ''                    => esc_html__('None', 'bizz-elements'),
        'fade'                => esc_html__('Fade', 'bizz-elements'),
        'scale-up'            => esc_html__('Scale Up', 'bizz-elements'),
        'scale-down'          => esc_html__('Scale Down', 'bizz-elements'),
        'slide-top'           => esc_html__('Slide Top', 'bizz-elements'),
        'slide-bottom'        => esc_html__('Slide Bottom', 'bizz-elements'),
        'slide-left'          => esc_html__('Slide Left', 'bizz-elements'),
        'slide-right'         => esc_html__('Slide Right', 'bizz-elements'),
        'slide-top-small'     => esc_html__('Slide Top Small', 'bizz-elements'),
        'slide-bottom-small'  => esc_html__('Slide Bottom Small', 'bizz-elements'),
        'slide-left-small'    => esc_html__('Slide Left Small', 'bizz-elements'),
        'slide-right-small'   => esc_html__('Slide Right Small', 'bizz-elements'),
        'slide-top-medium'    => esc_html__('Slide Top Medium', 'bizz-elements'),
        'slide-bottom-medium' => esc_html__('Slide Bottom Medium', 'bizz-elements'),
        'slide-left-medium'   => esc_html__('Slide Left Medium', 'bizz-elements'),
        'slide-right-medium'  => esc_html__('Slide Right Medium', 'bizz-elements'),
    ];

    return $transition_options;
}


/**
 * String to ID maker for any title to relavent id
 * @param  [type] $string any title or string
 * @return [type]         [description]
 */
function bizz_elements_string_id($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    //finally return here
    return $string;
}