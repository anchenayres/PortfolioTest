<?php
namespace BizzElements\Modules\Portfolio\Widgets;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Core\Schemes;
use Elementor\Controls_Stack;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Portfolio extends Widget_Base {

	public function get_name() {
		return 'portfolio';
	}

	public function get_title() {
		return  esc_html__( 'Portfolio', 'bizz-elements' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}

	public function get_categories() {
		return ['bizz-elements'];
	}

	public function get_style_depends() {
        return [
            'biz-elements-portfolio'
        ];
    }

    public function get_script_depends() {
        return [
            'isotope'
        ];
    }

	

	protected function register_controls() {

		$this->start_controls_section(
			'section_side_a_content',
			[
				'label' => esc_html__( 'Layout Settings', 'bizz-elements' ),
			]
		);

		$this->add_control(
		  'cww_pfolio_style',
		  	[
		   	'label'       	=> esc_html__( 'Portfolio Layout', 'bizz-elements' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'style-1',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'style-1'  	=> esc_html__( 'Style 1', 'bizz-elements' ),
		     		'style-2' 	=> esc_html__( 'Style 2', 'bizz-elements' ),
		     		'style-3' 	=> esc_html__( 'Style 3', 'bizz-elements' ),
		     	],
		  	]
		);

		$this->add_control(
			'pfolio_count',
			[
				'label'       => esc_html__( 'No of Portfolios', 'bizz-elements' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '3'
			]
		);

		  $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size',
                'label'             => esc_html__( 'Image Size', 'bizz-elements' ),
                'default'           => 'medium_large',
                
            ]
        );		

		$this->add_control(
			'front_btn_text',
			[
				'label'       => esc_html__( 'View All Button', 'bizz-elements' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'View All', 'bizz-elements' ),
			]
		);

		$this->add_control(
            'disable_single_linking',
            [
                'label'             => esc_html__( 'Disable Single Page Links', 'bizz-elements' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'no',
                'label_on'          => esc_html__( 'Yes', 'bizz-elements' ),
                'label_off'         => esc_html__( 'No', 'bizz-elements' ),
                'return_value'      => 'yes',
            ]
        );

		

		$this->end_controls_section();

		

		/**
         * Style Tab: Title
         */

		$this->start_controls_section(
			'style_title',
			[
				'label' => __( 'Title', 'bizz-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		

		$this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .cww-portfolio h4.pfolio-title a',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );


        $this->add_control(
            'header_text_color', [
                'label'     => __('Text Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cww-portfolio h4.pfolio-title a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cww-portfolio.style-1 .content-wrappp h4.pfolio-title a' => 'color: {{VALUE}}',
                ],
            ]
        );


		$this->end_controls_section();


		/**
         * Style Tab: Category Styles
         */

		$this->start_controls_section(
			'style_cat',
			[
				'label' => __( 'Portfolio Category', 'bizz-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		

		$this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'cat_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .cww-portfolio .content-wrappp ul.meta li a',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );


        $this->add_control(
            'cat_color', [
                'label'     => __('Text Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cww-portfolio .content-wrappp ul.meta li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cww-portfolio ul.meta li .delimiter-comma' => 'color: {{VALUE}}',
                ],
            ]
        );


		$this->end_controls_section();


	}

	protected function render() {

		$settings    			= $this->get_settings();
		$cww_pfolio_style 		= isset( $settings['cww_pfolio_style'] ) ? $settings['cww_pfolio_style'] : 'style-1';
		$disable_single_linking = $settings['disable_single_linking'];

		$taxonomy 	= 'portfolio_categories';
		$terms 		= get_terms($taxonomy);

		$this->add_render_attribute( 'cww-wrapp', 'class', 'cww-portfolio '.$cww_pfolio_style );
		
		?>
		<div <?php echo $this->get_render_attribute_string( 'cww-wrapp' ); ?>>
			

		<div class="pfolio-inner cww-flex">


		<?php 

		
		

		$portfolio_args = array(
                            'post_type' 		=> 'portfolio',
                            'order' 			=> 'DESC',
                            'posts_per_page' 	=> $settings['pfolio_count'],
                            'post_status' 		=> 'publish'
                        );
        $portfolio_query = new \WP_Query($portfolio_args);
        if($portfolio_query->have_posts()):
        	while($portfolio_query->have_posts()): $portfolio_query->the_post();

        		$terms 		= wp_get_post_terms(get_the_ID(), 'portfolio_categories'); // Get all terms of a taxonomy
        		$image_id 	= get_post_thumbnail_id( get_the_ID() );
				$thumb_url 	= Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );
				$image_alt 	= get_post_meta( $image_id, '_wp_attachment_image_alt', true );

				$this->add_render_attribute( 'img-alt', 'alt', $image_alt );

				if ( $terms && !is_wp_error( $terms ) ) : 
					$filter_class = [];
					foreach ( $terms as $term ) { 
						$filter_class[] = 'category-'.$term->term_id;
					}
					$filter_class = join(' ',$filter_class);

				endif;

        	 ?>
        	<div class="inner-wrapp <?php echo esc_attr($filter_class)?>">
        		<?php if( has_post_thumbnail() ){ ?>
        			<div class="img-wrapp">
						<?php if( $disable_single_linking == 'no' ){ ?>
							<a href="<?php the_permalink()?>">
        						<img src="<?php echo esc_url($thumb_url);?>" <?php echo $this->get_render_attribute_string('img-alt'); ?>>
        					</a>
						<?php }else{ ?>
							<img src="<?php echo esc_url($thumb_url);?>" <?php echo $this->get_render_attribute_string('img-alt'); ?>>
							<?php }?>
        				
        			</div>
        		<?php } ?>

				<div class="content-wrappp">
	        		<h4 class="pfolio-title">
						<?php if( $disable_single_linking == 'no' ){ ?>
	        				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php }else{ ?>
							<a href="javascript:void(0)"><?php the_title(); ?></a>
						<?php }?>
	        		</h4>
			        <?php if ( $terms && !is_wp_error( $terms ) ) : ?>
					    <ul class="meta">
					        <?php foreach ( $terms as $term ) { ?>
					            <li>
								<?php if( $disable_single_linking == 'no' ){ ?>
					            	<a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a>
								<?php }else{ ?>
									<a href="javascript:void(0)"><?php echo $term->name; ?></a>
								<?php }?>
					            	 <span class="delimiter-comma">/</span>
					            </li>

					        <?php } ?>
					    </ul>
					<?php endif; ?>
				</div>
				<div class="content-sep"></div>

        	</div>
        	<?php 
        	endwhile;
        	wp_reset_postdata();
        endif;

        if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {

            ?>
            <script type="text/javascript">

            jQuery( document ).ready( function( $ ) {
               var $grid = $('.cww-portfolio .pfolio-inner').imagesLoaded(function () {

		            $grid.isotope({
		              itemSelector: '.cww-portfolio .inner-wrapp',
		              layoutMode: 'fitRows'
		            });
		        });

                });
            
            </script>
            <?php 
        }

		?>
		</div>
		</div>
		<?php 
	}




}
