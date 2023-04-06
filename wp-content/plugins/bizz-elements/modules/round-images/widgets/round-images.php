<?php
namespace BizzElements\Modules\RoundImages\Widgets;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Round_Images extends Widget_Base {

	public function get_name() {
		return 'aea-round-images';
	}

	public function get_title() {
		return  esc_html__( 'Round Images', 'arrival-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}
	
	public function get_style_depends() {
        return [ 'biz-elements-round-images'];
    }
    

	public function get_categories() {
        return ['bizz-elements'];
    }

	protected function _register_controls() {

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

	}

	protected function render() {
		$settings    			= $this->get_settings();
		$this->add_render_attribute( 'aea-wrapp', 'class', 'aea-round-images' );
		
		?>
		<div <?php echo $this->get_render_attribute_string( 'aea-wrapp' ); ?>>
			<div class="img-wrapp">
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
			</div>
		</div>
		<?php 
	}



}
