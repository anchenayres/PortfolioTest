<?php
namespace BizzElements\Modules\Tabs\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use BizzElements\BizzElementsWidgetLoader;
use Elementor\Core\Schemes;
use Elementor\Controls_Stack;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Tabs extends Widget_Base {

	public function get_name() {
		return 'tabs';
	}

	public function get_title() {
		return esc_html__( 'Tabs', 'bizz-elements' );
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_categories() {
		return ['bizz-elements'];
	}
	
	public function get_style_depends() {
        return [ 'biz-elements-tabs'];
    }

    public function get_script_depends() {
        return [ 'bizz-elements-uikit'];
    }

	public function get_keywords() {
		return [ 'tabs', 'toggle', 'accordion' ];
	}

	public function is_reload_preview_required() {
		return false;
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Tabs', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'tab_layout',
			[
				'label'   => esc_html__( 'Layout', 'bizz-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Top (Default)', 'bizz-elements' ),
					'bottom'  => esc_html__( 'Bottom', 'bizz-elements' ),
					'left'    => esc_html__( 'Left', 'bizz-elements' ),
					'right'   => esc_html__( 'Right', 'bizz-elements' ),
				],
			]
		);

		$this->add_control(
			'tabs',
			[
				'label'   => __( 'Tab Items', 'bizz-elements' ),
				'type'    => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => __( 'Tab #1', 'bizz-elements' ),
						'tab_content' => __( 'I am tab #1 content. Click edit button to change this text. One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.', 'bizz-elements' ),
					],
					[
						'tab_title'   => __( 'Tab #2', 'bizz-elements' ),
						'tab_content' => __( 'I am tab #2 content. Click edit button to change this text. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman.', 'bizz-elements' ),
					],
					[
						'tab_title'   => __( 'Tab #3', 'bizz-elements' ),
						'tab_content' => __( 'I am tab #3 content. Click edit button to change this text. Drops of rain could be heard hitting the pane, which made him feel quite sad. How about if I sleep a little bit longer and forget all this nonsense.', 'bizz-elements' ),
					],
				],
				'fields' => [
					[
						'name'        => 'tab_title',
						'label'       => __( 'Title', 'bizz-elements' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => __( 'Tab Title' , 'bizz-elements' ),
						'label_block' => true,
					],
					[
						'name'        => 'tab_sub_title',
						'label'       => __( 'Sub Title', 'bizz-elements' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
					],
					[
						'name'        => 'tab_icon',
						'label'       => __( 'Icon', 'bizz-elements' ),
						'type'        => Controls_Manager::ICON,
						'label_block' => true,
					],
					[
						'name'    => 'source',
						'label'   => esc_html__( 'Select Source', 'bizz-elements' ),
						'type'    => Controls_Manager::SELECT,
						'default' => 'custom',
						'options' => [
							'custom'    => esc_html__( 'Custom', 'bizz-elements' ),
							"elementor" => esc_html__( 'Elementor Template', 'bizz-elements' ),
							'anywhere'  => esc_html__( 'AE Template', 'bizz-elements' ),
						],
					],
					[
						'name'       => 'tab_content',
						'type'       => Controls_Manager::WYSIWYG,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Tab Content', 'bizz-elements' ),
						'condition'  => ['source' => 'custom'],
					],
					[
						'name'        	=> 'template_id',
						'label'       	=> esc_html__( 'Enter Template', 'bizz-elements' ),
						'description' 	=> esc_html__( 'Select elementor template to display.', 'bizz-elements' ),
						'type'        	=> Controls_Manager::SELECT,
						'default' 		=> 0,
						'label_block' 	=> true,
						'options' 	  	=> code_elements_get_page_templates(),
						'condition'   	=> ['source' => "elementor"],
					],
					[
						'name'        => 'anywhere_id',
						'label'       => esc_html__( 'Enter Template ID', 'bizz-elements' ),
						'type'        => Controls_Manager::TEXT,
						'label_block' => 'true',
						'condition'   => ['source' => 'anywhere'],
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->add_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'bizz-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					''    => [
						'title' => esc_html__( 'Left', 'bizz-elements' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bizz-elements' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bizz-elements' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'bizz-elements' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'condition' => [
					'tab_layout' => ['default', 'bottom']
				],
			]
		);

		$this->add_responsive_control(
			'item_spacing',
			[
				'label' => esc_html__( 'Nav Spacing', 'bizz-elements' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .aea-tab .aea-tabs-item'                                                                 => 'padding-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aea-tab'                                                                                => 'margin-left: -{{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aea-tab.aea-tab-left .aea-tabs-item, {{WRAPPER}} .aea-tab.aea-tab-right .aea-tabs-item' => 'padding-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aea-tab.aea-tab-left, {{WRAPPER}} .aea-tab.aea-tab-right'                               => 'margin-top: -{{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'nav_spacing',
			[
				'label' => esc_html__( 'Nav Width', 'bizz-elements' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .aea-grid:not(.aea-grid-stack) .aea-tab-wrapper' => 'width: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'tab_layout' => ['left', 'right']
                ],
			]
		);

		$this->add_responsive_control(
			'content_spacing',
			[
				'label' => esc_html__( 'Content Spacing', 'bizz-elements' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .aea-tabs-default .aea-switcher-wrapper'=> 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aea-tabs-bottom .aea-switcher-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aea-tabs-left .aea-grid:not(.aea-grid-stack) .aea-switcher-wrapper'   => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aea-tabs-right .aea-grid:not(.aea-grid-stack) .aea-switcher-wrapper'  => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aea-tabs-left .aea-grid-stack .aea-switcher-wrapper,
					 {{WRAPPER}} .aea-tabs-right .aea-grid-stack .aea-switcher-wrapper'  => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_additional',
			[
				'label' => esc_html__( 'Additional', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'active_item',
			[
				'label' => esc_html__( 'Active Item No', 'bizz-elements' ),
				'type'  => Controls_Manager::NUMBER,
				'min'   => 1,
				'max'   => 20,
			]
		);

		$this->add_control(
			'tab_transition',
			[
				'label'   => esc_html__( 'Transition', 'bizz-elements' ),
				'type'    => Controls_Manager::SELECT,
				'options' => bizz_elements_transition_options(),
				'default' => '',
			]
		);

		$this->add_control(
			'duration',
			[
				'label' => esc_html__( 'Animation Duration', 'bizz-elements' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 501,
						'step' => 50,
					],
				],
				'default' => [
					'size' => 200,
				],
                'condition' => [
                    'tab_transition!' => ''
                ],
			]
		);

		$this->add_control(
			'media',
			[
				'label'       => esc_html__( 'Turn On Horizontal mode', 'bizz-elements' ),
				'description' => esc_html__( 'It means that tabs nav will switch vertical to horizontal on mobile mode', 'bizz-elements' ),
				'type'        => Controls_Manager::CHOOSE,
				'options'     => [
					960 => [
						'title' => esc_html__( 'On Tablet', 'bizz-elements' ),
						'icon'  => 'fa fa-tablet',
					],
					768 => [
						'title' => esc_html__( 'On Mobile', 'bizz-elements' ),
						'icon'  => 'fa fa-mobile',
					],
				],
				'default' => 960,
				'condition' => [
					'tab_layout' => ['left', 'right']
				],
			]
		);

		$this->add_control(
			'nav_sticky_mode',
			[
				'label'   => esc_html__( 'Tabs Nav Sticky', 'bizz-elements' ),
				'type'    => Controls_Manager::SWITCHER,
                'condition' => [
                    'tab_layout!' => 'bottom',
                ],
			]
		);

		$this->add_control(
			'nav_sticky_offset',
			[
				'label'   => esc_html__( 'Offset', 'bizz-elements' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'condition' => [
					'nav_sticky_mode' => 'yes',
                    'tab_layout!' => 'bottom',
				],
			]
		);

		$this->add_control(
			'nav_sticky_on_scroll_up',
			[
				'label'        => esc_html__( 'Sticky on Scroll Up', 'bizz-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'description'  => esc_html__( 'Set sticky options when you scroll up your mouse.', 'bizz-elements' ),
				'condition' => [
					'nav_sticky_mode' => 'yes',
                    'tab_layout!' => 'bottom',
				],
			]
		);

		$this->add_control(
			'fullwidth_on_mobile',
			[
				'label'        => esc_html__( 'Fullwidth Nav on Mobile', 'bizz-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'description'  => esc_html__( 'If you have long test tab so this can help design issue', 'bizz-elements' )
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_style_title',
			[
				'label' => __( 'Tab', 'bizz-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'tabs_title_style' );

		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => __( 'Normal', 'bizz-elements' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'title_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .aea-tab .aea-tabs-item-title',
				'separator' => 'after',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Text Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aea-tab .aea-tabs-item-title' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'title_shadow',
				'selector' => '{{WRAPPER}} .aea-tab .aea-tabs-item .aea-tabs-item-title',
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => __( 'Padding', 'bizz-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aea-tab .aea-tabs-item-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        => 'title_border',
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .aea-tab .aea-tabs-item .aea-tabs-item-title',
			]
		);

		$this->add_control(
			'title_radius',
			[
				'label'      => __( 'Border Radius', 'bizz-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aea-tab .aea-tabs-item .aea-tabs-item-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .aea-tab .aea-tabs-item-title',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_title_active',
			[
				'label' => __( 'Active', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'active_style_color',
			[
				'label'     => __( 'Style Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aea-tab .aea-tabs-item.aea-active .aea-tabs-item-title:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'active_title_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .aea-tab .aea-tabs-item.aea-active .aea-tabs-item-title',
				'separator' => 'after',
			]
		);

		$this->add_control(
			'active_title_color',
			[
				'label'     => __( 'Text Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aea-tab .aea-tabs-item.aea-active .aea-tabs-item-title' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'active_title_shadow',
				'selector' => '{{WRAPPER}} .aea-tab .aea-tabs-item.aea-active .aea-tabs-item-title',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        => 'active_title_border',
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .aea-tab .aea-tabs-item.aea-active .aea-tabs-item-title',
			]
		);

		$this->add_control(
			'active_title_radius',
			[
				'label'      => __( 'Border Radius', 'bizz-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aea-tab .aea-tabs-item.aea-active .aea-tabs-item-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_sub_title',
			[
				'label' => __( 'Sub Title', 'bizz-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'tabs_sub_title_style' );

		$this->start_controls_tab(
			'tab_sub_title_normal',
			[
				'label' => __( 'Normal', 'bizz-elements' ),
			]
		);


		$this->add_control(
			'sub_title_color',
			[
				'label'     => __( 'Text Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aea-tab .aea-tab-sub-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'sub_title_spacing',
			[
				'label'     => __( 'Spacing', 'bizz-elements' ),
				'type'      => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .aea-tab .aea-tab-sub-title' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'sub_title_typography',
				'selector' => '{{WRAPPER}} .aea-tab .aea-tab-sub-title',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_sub_title_active',
			[
				'label' => __( 'Active', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'active_sub_title_color',
			[
				'label'     => __( 'Text Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aea-tab .aea-tabs-item .aea-active .aea-tab-sub-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'active_sub_title_typography',
				'selector' => '{{WRAPPER}} .aea-tab .aea-tabs-item .aea-active .aea-tab-sub-title',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_style_content',
			[
				'label' => __( 'Content', 'bizz-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'content_background_color',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .aea-tabs .aea-switcher-item-content',
				'separator' => 'after',
			]
		);

		$this->add_control(
			'content_color',
			[
				'label'     => __( 'Text Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .aea-tabs .aea-switcher-item-content' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        => 'content_border',
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .aea-tabs .aea-switcher-item-content',
			]
		);

		$this->add_control(
			'content_radius',
			[
				'label'      => __( 'Border Radius', 'bizz-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aea-tabs .aea-switcher-item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
				],
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => __( 'Padding', 'bizz-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aea-tabs .aea-switcher-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'selector' => '{{WRAPPER}} .aea-tabs .aea-switcher-item-content',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'bizz-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'tabs_icon_style' );

		$this->start_controls_tab(
			'tab_icon_normal',
			[
				'label' => __( 'Normal', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label'   => __( 'Alignment', 'bizz-elements' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Start', 'bizz-elements' ),
						'icon'  => 'eicon-h-align-left',
					],
					'right' => [
						'title' => __( 'End', 'bizz-elements' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default' => is_rtl() ? 'right' : 'left',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => __( 'Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aea-tabs .aea-tabs-item-title .fa:before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'label' => __( 'Spacing', 'bizz-elements' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 8,
				],
				'selectors' => [
					'{{WRAPPER}} .aea-tabs .aea-tabs-item-title .aea-button-icon-align-left'  => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aea-tabs .aea-tabs-item-title .aea-button-icon-align-right' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_icon_active',
			[
				'label' => __( 'Active', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'icon_active_color',
			[
				'label'     => __( 'Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aea-tabs .aea-tabs-item.aea-active .aea-tabs-item-title .fa:before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();











		$this->start_controls_section(
			'section_tabs_sticky_style',
			[
				'label' => __( 'Sticky', 'bizz-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sticky_background',
			[
				'label'     => __( 'Background', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aea-tabs > div > .aea-sticky.aea-active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'sticky_shadow',
				'selector' => '{{WRAPPER}} .aea-tabs > div > .aea-sticky.aea-active',
			]
		);

		$this->add_control(
			'sticky_border_radius',
			[
				'label'      => __( 'Border Radius', 'bizz-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aea-tabs > div > .aea-sticky.aea-active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$id       = $this->get_id();

		$this->add_render_attribute( 'tabs',  'id',  'aea-tabs-' . esc_attr($id) );
		$this->add_render_attribute( 'tabs',  'class',  'aea-tabs' );
		$this->add_render_attribute( 'tabs',  'class',  'aea-tabs-' . $settings['tab_layout'] );

		if ($settings['fullwidth_on_mobile']) {
            $this->add_render_attribute( 'tabs',  'class',  'fullwidth-on-mobile' );
        }

		?>
		<div <?php echo $this->get_render_attribute_string( 'tabs' ); ?>>
			<?php
			if ( 'left' == $settings['tab_layout'] or 'right' == $settings['tab_layout'] ) {
				echo '<div class="aea-grid-collapse"  aea-grid>';				
			}
			?>

			<?php if ( 'bottom' == $settings['tab_layout'] ) : ?>			
				<?php $this->tabs_content(); ?>
			<?php endif; ?>

			<?php $this->desktop_tab_items(); ?>
			

			<?php if ( 'bottom' != $settings['tab_layout'] ) : ?>
					<?php $this->tabs_content(); ?>
			<?php endif; ?>

			<?php
			if ( 'left' == $settings['tab_layout'] or 'right' == $settings['tab_layout'] ) {
				echo "</div>";
			}
			?>
			<a href="#" id="bottom-anchor-<?php echo esc_attr($id); ?>" aea-hidden></a>
		</div>

		<?php
	}

	public function tabs_content() {
		$settings = $this->get_settings_for_display();
		$id       = $this->get_id();

        $this->add_render_attribute( 'switcher-width',  'class',  'aea-switcher-wrapper');

        if ( 'left' == $settings['tab_layout'] or 'right' == $settings['tab_layout'] ) {

            if ( 768 == $settings['media'] ) {
                $this->add_render_attribute( 'switcher-width',  'class', 'aea-width-expand@s' );
            } else {
                $this->add_render_attribute( 'switcher-width',  'class', 'aea-width-expand@m' );
            }
        }

		?>

		<div <?php echo $this->get_render_attribute_string( 'switcher-width' ); ?>>
			<div id="aea-tab-content-<?php echo esc_attr($id); ?>" class="aea-switcher aea-switcher-item-content">
				<?php foreach ( $settings['tabs'] as $index => $item ) : ?>
					<div>
						<div>
							<?php 
				            	if ( 'custom' == $item['source'] and !empty( $item['tab_content'] ) ) {
				            		echo $this->parse_text_editor( $item['tab_content'] );
				            	} elseif ("elementor" == $item['source'] and !empty( $item['template_id'] )) {
				            		echo BizzElementsWidgetLoader::elementor()->frontend->get_builder_content_for_display( $item['template_id'] );
				            	} elseif ('anywhere' == $item['source'] and !empty( $item['anywhere_id'] )) {
				            		echo BizzElementsWidgetLoader::elementor()->frontend->get_builder_content_for_display( $item['anywhere_id'] );
				            	}
				            ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}

	public function desktop_tab_items() {
		$settings = $this->get_settings_for_display();
		$id       = $this->get_id();

		if ( 'left' == $settings['tab_layout'] or 'right' == $settings['tab_layout'] ) {

			$this->add_render_attribute( 'tabs-width',  'class',  'aea-tab-wrapper');

			if ( 'right' == $settings['tab_layout'] ) {
				$this->add_render_attribute( 'tabs-width',  'class', 'aea-flex-last@m' );
			}

			if (768 == $settings['media']) {
				$this->add_render_attribute( 'tabs-width',  'class', 'aea-width-auto@s' );
				if ( 'right' == $settings['tab_layout'] ) {
					$this->add_render_attribute( 'tabs-width',  'class', 'aea-flex-last' );
				}
			} else {
                $this->add_render_attribute( 'tabs-width',  'class', 'aea-width-auto@m' );
            }
		}

		$this->add_render_attribute(
			[
				'tab-settings' => [
					'class' => [
						'aea-tab',
						( '' !== $settings['tab_layout'] ) ? 'aea-tab-' . $settings['tab_layout'] : '',
						('' != $settings['align'] and 'left' != $settings['tab_layout'] and 'right' != $settings['tab_layout']) ? ('justify' != $settings['align']) ? 'aea-flex-' . $settings['align'] : 'aea-child-width-expand' : ''
					]
				]
			]
		);
        $this->add_render_attribute( 'tab-settings', 'aea-tab', 'connect: #aea-tab-content-' .  esc_attr($id) . ';' );

        if ($settings['tab_transition']) {
            $this->add_render_attribute( 'tab-settings', 'aea-tab', 'animation: aea-animation-'. $settings['tab_transition'] . ';' );
        }
        
        if(isset($settings['duration'])){
        if ($settings['duration']['size']) {
            $this->add_render_attribute('tab-settings', 'aea-tab', 'duration: ' . $settings['duration']['size'] . ';');
        }}
        if ($settings['media']) {
            $this->add_render_attribute('tab-settings', 'aea-tab', 'media: ' . intval($settings['media']) . ';');
        }

        if ('yes' == $settings['nav_sticky_mode'] ) {
            $this->add_render_attribute( 'tabs-sticky', 'aea-sticky', 'bottom: #bottom-anchor-' . $id . ';' );

			if ($settings[ 'nav_sticky_offset' ]['size']) {
				$this->add_render_attribute( 'tabs-sticky', 'aea-sticky', 'offset: ' . $settings[ 'nav_sticky_offset' ]['size'] . ';'  );
			}
			if ($settings['nav_sticky_on_scroll_up']) {
				$this->add_render_attribute( 'tabs-sticky', 'aea-sticky', 'show-on-up: true; animation: aea-animation-slide-top'  );
			}
		}

		?>
		<div <?php echo ( $this->get_render_attribute_string( 'tabs-width' ) ); ?>>
			<div <?php echo ( $this->get_render_attribute_string( 'tabs-sticky' ) ); ?>>
				<div <?php echo ( $this->get_render_attribute_string( 'tab-settings' ) ); ?>>
					<?php foreach ( $settings['tabs'] as $index => $item ) :
						
						$tab_count = $index + 1;
						$tab_id    = ($item['tab_title']) ? bizz_elements_string_id($item['tab_title']) : $id . $tab_count;
						$tab_id    = 'aea-tab-'. $tab_id;

						$this->add_render_attribute( 'tabs-item', 'class', 'aea-tabs-item', true );
						if (empty($item['tab_title'])) {
							$this->add_render_attribute( 'tabs-item', 'class', 'aea-has-no-title' );
						}
						if ($tab_count === $settings['active_item']) {
							$this->add_render_attribute( 'tabs-item', 'class', 'aea-active' );
                        }

                        ?>
						<div <?php echo ( $this->get_render_attribute_string( 'tabs-item' ) ); ?>>
							<a class="aea-tabs-item-title" href="#" id="<?php echo $tab_id; ?>" data-tab-index="<?php echo $index; ?>">
								<div class="aea-tab-text-wrapper aea-flex-column">

									<div class="aea-tab-title-icon-wrapper">
										<?php if ('' != $item['tab_icon'] and 'left' == $settings['icon_align']) : ?>
											<span class="aea-button-icon-align-<?php echo esc_html($settings['icon_align']); ?>">
												<i class="<?php echo esc_attr($item['tab_icon']); ?>"></i>
											</span>
										<?php endif; ?>

										<?php if ($item['tab_title']) : ?>
											<span class="aea-tab-text"><?php echo $item['tab_title']; ?></span>
										<?php endif; ?>

										<?php if ('' != $item['tab_icon'] and 'right' == $settings['icon_align']) : ?>
											<span class="aea-button-icon-align-<?php echo esc_html($settings['icon_align']); ?>">
												<i class="<?php echo esc_attr($item['tab_icon']); ?>"></i>
											</span>
										<?php endif; ?>
									</div>

									<?php if ($item['tab_sub_title'] and $item['tab_title']) : ?>
										<span class="aea-tab-sub-title aea-text-small"><?php echo $item['tab_sub_title']; ?></span>
									<?php endif; ?>

								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
	}
	
}