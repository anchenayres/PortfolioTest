<?php
/**
* Custom post types for the theme
*
*/
add_action('init','cww_pp_ea_portfolio_init');
add_action('init','cww_pp_ea_portfolio_taxonomies');
add_action('add_meta_boxes','cww_pp_ea_add_metabox');
add_action('save_post', 'cww_pp_ea_pfolio_settings_save');

function cww_pp_ea_portfolio_init() {
	$labels = array(
		'name'               => _x( 'Portfolio', 'post type general name', 'cww-portfolio-pro' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'cww-portfolio-pro' ),
		'menu_name'          => _x( 'Portfolio', 'admin menu', 'cww-portfolio-pro' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'cww-portfolio-pro' ),
		'add_new'            => _x( 'Add New', 'portfolio', 'cww-portfolio-pro' ),
		'add_new_item'       => esc_html__( 'Add New Portfolio', 'cww-portfolio-pro' ),
		'new_item'           => esc_html__( 'New Portfolio', 'cww-portfolio-pro' ),
		'edit_item'          => esc_html__( 'Edit Portfolio', 'cww-portfolio-pro' ),
		'view_item'          => esc_html__( 'View Portfolio', 'cww-portfolio-pro' ),
		'all_items'          => esc_html__( 'All Portfolio', 'cww-portfolio-pro' ),
		'search_items'       => esc_html__( 'Search Portfolio', 'cww-portfolio-pro' ),
		'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'cww-portfolio-pro' ),
		'not_found'          => esc_html__( 'No portfolio found.', 'cww-portfolio-pro' ),
		'not_found_in_trash' => esc_html__( 'No portfolio found in Trash.', 'cww-portfolio-pro' )
	);
	$args = array(
		'labels'             => $labels,
        'description'        => esc_html__( 'Description.', 'cww-portfolio-pro' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'menu_icon'           => 'dashicons-grid-view',
		//'taxonomies'          => array( 'portfolio_category', 'post_tag' ),
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'portfolio', $args );
}

/*
* Register taxonomy category for portfolio
*/

function cww_pp_ea_portfolio_taxonomies() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name','cww-portfolio-pro' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name','cww-portfolio-pro' ),
        'search_items'      => esc_html__( 'Search Categories','cww-portfolio-pro' ),
        'all_items'         => esc_html__( 'All Categories','cww-portfolio-pro' ),
        'parent_item'       => esc_html__( 'Parent Category','cww-portfolio-pro' ),
        'parent_item_colon' => esc_html__( 'Parent Category:','cww-portfolio-pro' ),
        'edit_item'         => esc_html__( 'Edit Category','cww-portfolio-pro' ),
        'update_item'       => esc_html__( 'Update Category','cww-portfolio-pro' ),
        'add_new_item'      => esc_html__( 'Add New Category','cww-portfolio-pro' ),
        'new_item_name'     => esc_html__( 'New Category Name','cww-portfolio-pro' ),
        'menu_name'         => esc_html__( 'Categories','cww-portfolio-pro' ),
    );
    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categories' ),
    );
    register_taxonomy( 'portfolio_categories', array( 'portfolio' ), $args );
}


function cww_pp_ea_add_metabox()
{
    
	add_meta_box(
           'cww_pp_ea_pfoio_meta_settings',
           esc_html__( 'Additional Settings', 'cww-portfolio-pro' ),
           'cww_pp_ea_pfolio_settings_callback',
           'portfolio',
           'normal',
           'high'
         );
    
}



/*-------------------------------------------Portfolio Settings ---------------------------------------------------*/
function cww_pp_ea_pfolio_settings_callback(){
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'cww_pp_ea_pfoio_meta_settings' );
    ?>
    <table>
        <tr>
            <td style="padding-right:30px"><?php esc_html_e('Client Name','cww-portfolio-pro'); ?></td>
            <td><input style="width:400px;" name="portfolio_client_name" type="text"  value="<?php echo esc_attr(get_post_meta( $post->ID, 'portfolio_client_name', true ));?>" /></td>
        </tr>
        <tr>
            <td style="padding-right:30px"><?php esc_html_e('Tasks','cww-portfolio-pro'); ?></td>
            <td><input style="width:400px;" name="portfolip_skills" type="text"  value="<?php echo esc_attr(get_post_meta( $post->ID, 'portfolip_skills', true ));?>" /></td>
        </tr>

        <tr>
            <td style="padding-right:30px"><?php esc_html_e('Client Website','cww-portfolio-pro'); ?></td>
            <td><input style="width:400px;" name="portfolio_company_website" type="text"  value="<?php echo esc_url(get_post_meta( $post->ID, 'portfolio_company_website', true ));?>" /></td>
        </tr>

         <tr>
            <td style="padding-right:30px"><?php esc_html_e('Date','cww-portfolio-pro'); ?></td>
            <td><input style="width:400px;" name="portfolio_date" type="text"  value="<?php echo esc_attr(get_post_meta( $post->ID, 'portfolio_date', true ));?>" /></td>
        </tr>
        
    </table>
    <?php
}

function cww_pp_ea_pfolio_settings_save($post_id){
    global $post;

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'cww_pp_ea_pfoio_meta_settings' ] ) || !wp_verify_nonce( $_POST[ 'cww_pp_ea_pfoio_meta_settings' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
        return;

    $old_portfolio_client_name = get_post_meta( $post_id, 'portfolio_client_name', true);
    $new_portfolio_client_name = sanitize_text_field($_POST['portfolio_client_name']);

    $old_portfolip_skills = get_post_meta( $post_id, 'portfolip_skills', true);
    $new_portfolip_skills = sanitize_text_field($_POST['portfolip_skills']);

    $old_portfolio_company_website = get_post_meta( $post_id, 'portfolio_company_website', true);
    $new_portfolio_company_website = esc_url_raw($_POST['portfolio_company_website']);

    $old_portfolio_date = get_post_meta( $post_id, 'portfolio_date', true);
    $new_portfolio_date = esc_attr($_POST['portfolio_date']);

    
      if ($new_portfolio_client_name && $new_portfolio_client_name != $old_portfolio_client_name) {
                update_post_meta($post_id, 'portfolio_client_name', $new_portfolio_client_name);
        }

    if ($new_portfolip_skills && $new_portfolip_skills != $old_portfolip_skills) {
            update_post_meta($post_id, 'portfolip_skills', $new_portfolip_skills);
    }
   
    if ($new_portfolio_company_website && $new_portfolio_company_website != $old_portfolio_company_website) {
            update_post_meta($post_id, 'portfolio_company_website', $new_portfolio_company_website);
    }

    if ($new_portfolio_date && $new_portfolio_date != $old_portfolio_date) {
            update_post_meta($post_id, 'portfolio_date', $new_portfolio_date);
    }
    
}
