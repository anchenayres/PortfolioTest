<?php
namespace BizzElements\Modules\Testimonials\Widgets;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Core\Schemes;

use BizzElements\Modules\Testimonials\skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Testimonials extends Widget_Base {

	public function get_name() {
		return 'testimonials';
	}

	public function get_title() {
		return  esc_html__( 'Testimonials', 'bizz-elements' );
	}

	public function get_icon() {
		return 'eicon-slider-album';
	}

	public function get_script_depends() {
        return [
            'slick',
            'code-elements-frontend'
        ];
    }

    public function get_style_depends() {
        return [ 'biz-elements-testimonials','slick-theme'];
    }

	public function get_categories() {
		return ['bizz-elements'];
	}

	 protected function register_skins() {

        $this->add_skin( new Skins\Layout_Two( $this ) );
        $this->add_skin( new Skins\Layout_Three( $this ) );
        $this->add_skin( new Skins\Layout_Four( $this ) );
        $this->add_skin( new Skins\Layout_Five( $this ) );
        $this->add_skin( new Skins\Layout_Six( $this ) );
        
    }

	protected function register_controls() {
		$this->start_controls_section(
			'section_content_list',
			[
				'label' => esc_html__( 'Testimonials Options', 'bizz-elements' ),
			]
		);

		$this->add_control(
            'cww_test_rep_data',
            [
                'type'      => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    [ 'cww_testimonial_name' => 'John Doe' ],
                   
                ],
                'fields' => [

                	[
                        'name'          => 'user_icon_type',
                        'label'         => esc_html__( 'Image Source', 'bizz-elements' ),
                        'type'          => Controls_Manager::CHOOSE,
                        'label_block'   => false,
                        'options' => [
										'img_val' => [
											'title' => __( 'Custom Image', 'bizz-elements' ),
											'icon'  => 'fas fa-image',
										],
										'gravator' => [
											'title' => __( 'Gravator Image', 'bizz-elements' ),
											'icon'  => 'fas fa-user-circle',
										],
									],
						

                    ],

                    [
                        'name'          => 'img_src',
                        'label'         => esc_html__( 'Choose Image', 'bizz-elements' ),
                        'type'    => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'dynamic'     => [ 'active' => true ],
                        
						'condition' => [
										'user_icon_type' => 'img_val',
									],			
                        'label_block'   => false,
                    ],

                    [
                        'name'          => 'cww_test_grav_email',
                        'label'         => esc_html__( 'Email', 'bizz-elements' ),
                        'type'          => Controls_Manager::TEXT,
                        'condition' => [
										'user_icon_type' => 'gravator',
									],
                        'label_block'   => false,
                    ],


                    [
                        'name'          => 'cww_testimonial_name',
                        'label'         => esc_html__( 'Name', 'bizz-elements' ),
                        'default'       => esc_html__( 'John Doe', 'bizz-elements' ),
                        'type'          => Controls_Manager::TEXT,
                        'label_block'   => false,
                    ],

                    [
                        'name'          => 'cww_test_deg',
                        'label'         => esc_html__( 'Designation', 'bizz-elements' ),
                        'default'       => esc_html__( 'New York', 'bizz-elements' ),
                        'type'          => Controls_Manager::TEXT,
                        'label_block'   => false,
                    ],


                    [
                        'name'          => 'cww_test_desc',
                        'label'         => esc_html__( 'Description', 'bizz-elements' ),
                        'default'       => esc_html__('Find what you need in one template and combine features at will.','bizz-elements'),
                        'type'          => Controls_Manager::TEXTAREA,
                        'label_block'   => true,
                    ],
                  
                ],
                'title_field' => '{{cww_testimonial_name}}',
            ]
        );

		$this->end_controls_section();

		/**
		* Style tabs
		*/
		$this->start_controls_section(
			'section_style_content_box',
			[
				'label' => esc_html__( 'Content Box', 'bizz-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_box_desc_bg_color',
			[
				'label'     => esc_html__( 'Background', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'_skin!' => 'layout-two',
					'_skin!' => 'layout-five',
					],
				'selectors' => [
					'{{WRAPPER}} .cww-testimonials.layout-one .testimonial-wrapp .inner-wrapp .test-desc' => 'background: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-one .testimonial-wrapp .test-desc:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-three .testimonial-wrapp .inner-wrapp' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-four .testimonial-wrapp .inner-wrapp' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-six .testimonial-wrapp .inner-wrapp .content-wrap' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_box_desc_color',
			[
				'label'     => esc_html__( 'Text Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cww-testimonials.layout-one .testimonial-wrapp .inner-wrapp .test-desc' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-two .testimonial-wrapp .inner-wrapp .test-desc' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-three .testimonial-wrapp .inner-wrapp .test-desc' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-four .testimonial-wrapp .inner-wrapp .test-desc' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-five .testimonial-wrapp .inner-wrapp .test-desc' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-six .testimonial-wrapp .inner-wrapp .content-wrap .test-desc' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_box_typography',
				'label'    => esc_html__( 'Typography', 'bizz-elements' ),
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cww-testimonials.layout-one .testimonial-wrapp .inner-wrapp .test-desc,.cww-testimonials.layout-two .testimonial-wrapp .inner-wrapp .test-desc,.cww-testimonials.layout-six .testimonial-wrapp .inner-wrapp .content-wrap .test-desc,.cww-testimonials.layout-five .testimonial-wrapp .inner-wrapp .test-desc,.cww-testimonials.layout-four .testimonial-wrapp .inner-wrapp .test-desc,.cww-testimonials.layout-three .testimonial-wrapp .inner-wrapp .test-desc',
			]
		);

		 $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'title_shadow',
            'selector' => '{{WRAPPER}} .cww-testimonials.layout-one .testimonial-wrapp .inner-wrapp .test-desc,.cww-testimonials.layout-three .testimonial-wrapp .inner-wrapp,.cww-testimonials.layout-four .testimonial-wrapp .inner-wrapp,.cww-testimonials.layout-six .testimonial-wrapp .inner-wrapp .content-wrap',
                ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_additionals',
			[
				'label' => esc_html__( 'Additional', 'bizz-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'section_additional_styles',
			[
				'label'     => esc_html__( 'Name Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cww-testimonials.layout-one .testimonial-wrapp .inner-wrapp .content-wrap .test-name' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-two .testimonial-wrapp .inner-wrapp .content-wrap .test-name' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-three .testimonial-wrapp .inner-wrapp .content-wrap .test-name' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-four .testimonial-wrapp .inner-wrapp .content-wrap .test-name' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-five .testimonial-wrapp .inner-wrapp .test-name' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-six .testimonial-wrapp .inner-wrapp .content-wrap .name-wrapp .test-name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'section_additional_styles_typography',
				'label'    => esc_html__( 'Typography', 'bizz-elements' ),
				'separator' => 'after',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cww-testimonials.layout-one .testimonial-wrapp .inner-wrapp .content-wrap .test-name,.cww-testimonials.layout-two .testimonial-wrapp .inner-wrapp .content-wrap .test-name,.cww-testimonials.layout-three .testimonial-wrapp .inner-wrapp .content-wrap .test-name,.cww-testimonials.layout-four .testimonial-wrapp .inner-wrapp .content-wrap .test-name,.cww-testimonials.layout-five .testimonial-wrapp .inner-wrapp .test-name,.cww-testimonials.layout-six .testimonial-wrapp .inner-wrapp .content-wrap .name-wrapp .test-name',
			]
		);

		$this->add_control(
			'section_additional_deg_styles',
			[
				'label'     => esc_html__( 'Designation Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cww-testimonials.layout-one .testimonial-wrapp .content-wrap .test-deg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-two .testimonial-wrapp .content-wrap .test-deg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-three .testimonial-wrapp .content-wrap .test-deg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-four .testimonial-wrapp .content-wrap .test-deg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-five .testimonial-wrapp .test-deg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cww-testimonials.layout-six .testimonial-wrapp .inner-wrapp .content-wrap .name-wrapp .test-deg' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'section_additional_styles_deg_typography',
				'label'    => esc_html__( 'Typography', 'bizz-elements' ),
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cww-testimonials.layout-one .testimonial-wrapp .content-wrap .test-deg,.cww-testimonials.layout-two .testimonial-wrapp .content-wrap .test-deg,.cww-testimonials.layout-three .testimonial-wrapp .content-wrap .test-deg,.cww-testimonials.layout-four .testimonial-wrapp .content-wrap .test-deg,.cww-testimonials.layout-five .testimonial-wrapp .test-deg,.cww-testimonials.layout-six .testimonial-wrapp .inner-wrapp .content-wrap .name-wrapp .test-deg',
			]
		);


		$this->end_controls_section();

	}

	

	protected function render() {
		$settings = $this->get_settings();

		$this->add_render_attribute( 'cww-wrapp', 'class', 'cww-testimonials layout-one' );

		?>
		<div <?php echo $this->get_render_attribute_string( 'cww-wrapp' ); ?>>
		<div class="testimonial-wrapp">
			<?php 
			foreach( $settings['cww_test_rep_data'] as $item ){
			
			 ?>
				<div class="inner-wrapp">
					<div class="test-desc"><?php echo esc_html($item['cww_test_desc']); ?></div>
					<div class="content-wrap">

						<?php if(  $item['user_icon_type'] == 'img_val' && ! empty( $item['img_src']['url'] ) ){ ?>
							<div class="cww-test-box-image">
								<img src="<?php echo esc_url($item['img_src']['url'])?>">
								<?php //echo Group_Control_Image_Size::get_attachment_image_html( $item ); ?>
							</div>
						<?php }elseif( $item['user_icon_type'] == 'gravator' && ! empty($item['cww_test_grav_email'])){ ?>
							<div class="cww-test-box-image">
								<img src="<?php echo esc_url(get_avatar_url($item['cww_test_grav_email'])); ?>">
							</div>
						<?php } ?>

						<div class="test-name"><?php echo esc_html($item['cww_testimonial_name']); ?></div>
						<div class="test-deg"><?php echo esc_html($item['cww_test_deg']); ?></div>
					</div>
				</div>
			<?php } ?>
		</div>
		</div>
		<?php

		if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {

            ?>
            <script type="text/javascript">

            jQuery( document ).ready( function( $ ) {
                
                $('.cww-testimonials.layout-one .testimonial-wrapp').slick({
		            infinite: true,
		            slidesToShow: 3,
		            slidesToScroll: 3,
		            dots: true,
		            arrows: false,
		            centerMode: true,
		            focusOnSelect: true
		        });

                });
            
            </script>
            <?php 
        }

        
	}


	
}
