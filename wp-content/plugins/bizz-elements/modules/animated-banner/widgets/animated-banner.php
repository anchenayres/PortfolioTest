<?php
namespace BizzElements\Modules\AnimatedBanner\Widgets;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Core\Schemes;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Animated_Banner extends Widget_Base {

	public function get_name() {
		return 'animated-banner';
	}

	public function get_title() {
		return  esc_html__( 'Animated Banner', 'arrival-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}
	
	public function get_script_depends() {
		return [ 'arrival-frontend' ];
	}

	public function get_categories() {
		return ['bizz-elements'];
	}

	public function get_style_depends() {
        return [
            'arrival-frontend'
        ];
    }

	protected function register_controls() {

		$this->start_controls_section(
			'section_side_a_content',
			[
				'label' => esc_html__( 'Image Settings', 'arrival-elementor-addons' ),
			]
		);

		
		$this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Choose Image', 'arrival-elementor-addons' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				
				'dynamic'     => [ 'active' => true ],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'image',
				'label'     => esc_html__( 'Image Size', 'arrival-elementor-addons' ),
				'default'   => 'full',
				
			]
		);

		

		$this->end_controls_section();


		$this->start_controls_section(
			'section_animated_bg_options',
			[
				'label' => esc_html__( 'Animated Background', 'arrival-elementor-addons' ),
			]
		);

	

		$this->add_control(
			'animated_bg_height',
			[
				'label' => esc_html__( 'Height', 'arrival-elementor-addons' ),
				'type'  => Controls_Manager::SLIDER,
				'size_units' => '%',
				'range' => [
					'%' => [
						'min' => 50,
						'max' => 300,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .aea-animated-banner  .animated-bg' => 'height: {{SIZE}}{{UNIT}};',
				],
				
			]
		);

		$this->add_control(
			'animated_bg_width',
			[
				'label' => esc_html__( 'Width', 'arrival-elementor-addons' ),
				'type'  => Controls_Manager::SLIDER,
				'size_units' => '%',
				'range' => [
					'%' => [
						'min' => 50,
						'max' => 300,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .aea-animated-banner  .animated-bg' => 'width: {{SIZE}}{{UNIT}};',
				],
				
			]
		);

		$this->add_control(
			'animated_bg_left',
			[
				'label' => esc_html__( 'Left', 'arrival-elementor-addons' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .aea-animated-banner  .animated-bg' => 'left: {{SIZE}}{{UNIT}};',
				],
				
			]
		);

		$this->add_control(
			'animated_bg_btm',
			[
				'label' => esc_html__( 'Bottom', 'arrival-elementor-addons' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .aea-animated-banner  .animated-bg' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				
			]
		);
		

		$this->end_controls_section();

		

		

		$this->start_controls_section(
			'section_style_front',
			[
				'label' => esc_html__( 'Animated Background', 'arrival-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		

		$this->add_control(
			'icon_primary_color',
			[
				'label' => esc_html__( 'Background Color', 'arrival-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
				'default' => '#ff3d4f',
				'selectors' => [
					'{{WRAPPER}} .aea-animated-banner  .animated-bg' => 'background: {{VALUE}}',
				],
				
			]
		);



		$this->end_controls_section();

	}

	protected function render() {
		$settings    			= $this->get_settings();
	

		$this->add_render_attribute( 'aea-wrapp', 'class', 'aea-animated-banner ' );
		
		?>
		<div <?php echo $this->get_render_attribute_string( 'aea-wrapp' ); ?>>
			<div class="animated-bg"></div>
			<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
		</div>
		<?php 
	}



}
