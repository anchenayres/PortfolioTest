<?php
namespace BizzElements\Modules\PortfolioFilter\Widgets;

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

class Portfolio_Filter extends Widget_Base {

	public function get_name() {
		return 'portfolio-filter';
	}

	public function get_title() {
		return  esc_html__( 'Portfolio Filter', 'bizz-elements' );
	}

	public function get_icon() {
		return 'eicon-apps';
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
		  'alignment',
		  	[
		   	'label'       	=> esc_html__( 'Filter Alignment', 'bizz-elements' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'left',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'left'  	=> esc_html__( 'Left', 'bizz-elements' ),
		     		'center' 	=> esc_html__( 'Center', 'bizz-elements' ),
		     		'right' 	=> esc_html__( 'Right', 'bizz-elements' ),
		     	],
		  	]
		);

		

		$this->end_controls_section();

		

		/**
         * Style Tab: Title
         */

		$this->start_controls_section(
			'style_title',
			[
				'label' => __( 'Filters', 'bizz-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		

		$this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .portfolio-filter-wrapp .filter',
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
                    '{{WRAPPER}} .portfolio-filter-wrapp .filter' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'header_text_color_active', [
                'label'     => __('Active Text Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter-wrapp .filter.active' => 'color: {{VALUE}}',
                ],
            ]
        );


		$this->end_controls_section();


		

	}

	protected function render() {

		$settings    			= $this->get_settings();
		$alignment 		= isset( $settings['alignment'] ) ? $settings['alignment'] : 'left';

		$taxonomy 	= 'portfolio_categories';
		$terms 		= get_terms($taxonomy);

		$this->add_render_attribute( 'cww-wrapp', 'class', 'cww-portfolio-filter '.$alignment );
		
		?>
		<div <?php echo $this->get_render_attribute_string( 'cww-wrapp' ); ?>>
			<div class="portfolio-filter-wrapp">
		        <div class="filter active" data-filter="*"><?php esc_html_e('All', 'bizz-elements'); ?></div>
		        
		        <?php if ( $terms && !is_wp_error( $terms ) ) : ?>
						    
			        <?php foreach ( $terms as $term ) { ?>
			          <div class="filter" data-filter=".category-<?php echo esc_attr($term->term_id); ?>"><?php echo esc_html($term->name); ?></div>
			        <?php } ?>

				<?php endif; ?>
        	</div>
        </div>
		
		<?php 
	}




}
