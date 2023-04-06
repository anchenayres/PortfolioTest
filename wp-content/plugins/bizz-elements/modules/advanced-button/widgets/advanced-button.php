<?php
namespace BizzElements\Modules\AdvancedButton\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Core\Schemes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class AdvancedButton extends Widget_Base {
	public function get_name() {
		return 'aea-advanced-button';
	}

	public function get_title() {
		return esc_html__( 'Advanced Button', 'bizz-elements' );
	}

	public function get_icon() {
		return 'eicon-button';
	}	

	public function get_categories() {
		return ['bizz-elements'];
	}

	public function get_style_depends() {
		return [ 'biz-elements-adv-button' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__( 'Button', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'text',
			[
				'label'       => esc_html__( 'Text', 'bizz-elements' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [ 'active' => true ],
				'default'     => esc_html__( 'Click me', 'bizz-elements' ),
				'placeholder' => esc_html__( 'Click me', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label'       => esc_html__( 'Link', 'bizz-elements' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => [ 'active' => true ],
				'placeholder' => esc_html__( 'https://your-link.com', 'bizz-elements' ),
				'default'     => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'button_size',
			[
				'label'   => esc_html__( 'Button Size', 'bizz-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'md',
				'options' => [
					'xs' => esc_html__( 'Extra Small', 'bizz-elements' ),
					'sm' => esc_html__( 'Small', 'bizz-elements' ),
					'md' => esc_html__( 'Medium', 'bizz-elements' ),
					'lg' => esc_html__( 'Large', 'bizz-elements' ),
					'xl' => esc_html__( 'Extra Large', 'bizz-elements' ),
				],
			]
		);

		$this->add_control(
			'onclick',
			[
				'label'   => esc_html__( 'OnClick', 'bizz-elements' ),
				'type'    => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'onclick_event',
			[
				'label'       => esc_html__( 'OnClick Event', 'bizz-elements' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => 'myFunction()',
				'description' => sprintf( esc_html__('For details please look <a href="%s" target="_blank">here</a>'), 'https://www.w3schools.com/jsref/event_onclick.asp' ),
				'condition' => [
					'onclick' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'        => esc_html__( 'Alignment', 'bizz-elements' ),
				'type'         => Controls_Manager::CHOOSE,
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
				'options'      => [
					'left'    => [
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
			]
		);

		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'bizz-elements' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label'   => esc_html__( 'Icon Position', 'bizz-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'left'   => esc_html__( 'Left', 'bizz-elements' ),
					'right'  => esc_html__( 'Right', 'bizz-elements' ),
					'top'    => esc_html__( 'Top', 'bizz-elements' ),
					'bottom' => esc_html__( 'Bottom', 'bizz-elements' ),
				],
				'condition' => [
					'icon!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'bizz-elements' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
					'default' => [
						'size' => 8,
					],
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .aea-advanced-button .aea-button-icon-align-right'  => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aea-advanced-button .aea-button-icon-align-left'   => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aea-advanced-button .aea-button-icon-align-top'    => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aea-advanced-button .aea-button-icon-align-bottom' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label'     => esc_html__( 'Style', 'bizz-elements' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_effect',
			[
				'label'   => esc_html__( 'Effect', 'bizz-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'a',
				'options' => [
					'a' => esc_html__( 'Effect A', 'bizz-elements' ),
					'b' => esc_html__( 'Effect B', 'bizz-elements' ),
					'c' => esc_html__( 'Effect C', 'bizz-elements' ),
					'd' => esc_html__( 'Effect D', 'bizz-elements' ),
					'e' => esc_html__( 'Effect E', 'bizz-elements' ),
					'f' => esc_html__( 'Effect F', 'bizz-elements' ),
					'g' => esc_html__( 'Effect G', 'bizz-elements' ),
					'h' => esc_html__( 'Effect H', 'bizz-elements' ),
					'i' => esc_html__( 'Effect I', 'bizz-elements' ),
				],
				'render_type' => 'template',
			]
		);

		$this->add_control(
			'attention_button',
			[
				'label' => esc_html__( 'Attention', 'bizz-elements' ),
				'type'  => Controls_Manager::SWITCHER,
			]
		);

		$this->start_controls_tabs( 'tabs_advanced_button_style' );

		$this->start_controls_tab(
			'tab_advanced_button_normal',
			[
				'label' => esc_html__( 'Normal', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'advanced_button_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
				'selectors' => [
					'{{WRAPPER}} .aea-advanced-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'button_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .aea-advanced-button, 
								{{WRAPPER}} .aea-advanced-button.aea-advanced-button-effect-i .aea-advanced-button-content-wrapper:after,
								{{WRAPPER}} .aea-advanced-button.aea-advanced-button-effect-i .aea-advanced-button-content-wrapper:before',
				'separator' => 'after',
			]
		);

		$this->add_control(
			'button_border_style',
			[
				'label'   => esc_html__( 'Border Style', 'bizz-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'none'   => esc_html__( 'None', 'bizz-elements' ),
					'solid'  => esc_html__( 'Solid', 'bizz-elements' ),
					'dotted' => esc_html__( 'Dotted', 'bizz-elements' ),
					'dashed' => esc_html__( 'Dashed', 'bizz-elements' ),
					'groove' => esc_html__( 'Groove', 'bizz-elements' ),
				],
				'selectors'  => [
					'{{WRAPPER}} .aea-advanced-button' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_border_width',
			[
				'label' => esc_html__( 'Border Width', 'bizz-elements' ),
				'type'  => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'top'    => 3,
					'right'  => 3,
					'bottom' => 3,
					'left'   => 3,
				],
				'selectors'  => [
					'{{WRAPPER}} .aea-advanced-button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'button_border_style!' => 'none'
				]
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
				'default'   => '#666',
				'selectors' => [
					'{{WRAPPER}} .aea-advanced-button' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'button_border_style!' => 'none'
				],
				'separator' => 'after',
			]
		);

		$this->add_responsive_control(
			'advanced_button_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'bizz-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aea-advanced-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'advanced_button_shadow',
				'selector' => '{{WRAPPER}} .aea-advanced-button',
			]
		);

		$this->add_responsive_control(
			'advanced_button_padding',
			[
				'label'      => esc_html__( 'Padding', 'bizz-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aea-advanced-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'advanced_button_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .aea-advanced-button',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_advanced_button_hover',
			[
				'label' => esc_html__( 'Hover', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'advanced_button_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
				'selectors' => [
					'{{WRAPPER}} .aea-advanced-button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'button_hover_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .aea-advanced-button:after, 
								{{WRAPPER}} .aea-advanced-button:hover,
								{{WRAPPER}} .aea-advanced-button.aea-advanced-button-effect-i,
								{{WRAPPER}} .aea-advanced-button.aea-advanced-button-effect-h:after',
				'separator' => 'after',
			]
		);

		$this->add_control(
			'button_hover_border_style',
			[
				'label'   => esc_html__( 'Border Style', 'bizz-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'none'   => esc_html__( 'None', 'bizz-elements' ),
					'solid'  => esc_html__( 'Solid', 'bizz-elements' ),
					'dotted' => esc_html__( 'Dotted', 'bizz-elements' ),
					'dashed' => esc_html__( 'Dashed', 'bizz-elements' ),
					'groove' => esc_html__( 'Groove', 'bizz-elements' ),
				],
				'selectors'  => [
					'{{WRAPPER}} .aea-advanced-button:hover' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_hover_border_width',
			[
				'label' => esc_html__( 'Border Width', 'bizz-elements' ),
				'type'  => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'top'    => 3,
					'right'  => 3,
					'bottom' => 3,
					'left'   => 3,
				],
				'selectors'  => [
					'{{WRAPPER}} .aea-advanced-button:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'button_hover_border_style!' => 'none'
				]
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
				'selectors' => [
					'{{WRAPPER}} .aea-advanced-button:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'button_hover_border_style!' => 'none'
				]
			]
		);

		$this->add_responsive_control(
			'advanced_button_hover_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'bizz-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aea-advanced-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'advanced_button_hover_shadow',
				'selector' => '{{WRAPPER}} .aea-advanced-button:hover',
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'bizz-elements' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_icon',
			[
				'label'     => esc_html__( 'Icon', 'bizz-elements' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon!' => '',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_advanced_button_icon_style' );

		$this->start_controls_tab(
			'tab_advanced_button_icon_normal',
			[
				'label' => esc_html__( 'Normal', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'advanced_button_icon_color',
			[
				'label'     => esc_html__( 'Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
				'selectors' => [
					'{{WRAPPER}} .aea-advanced-button .aea-advanced-button-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'advanced_button_icon_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .aea-advanced-button .aea-advanced-button-icon:after',
				'separator' => 'after',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        => 'advanced_button_icon_border',
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .aea-advanced-button .aea-advanced-button-icon:after',
			]
		);

		$this->add_control(
			'advanced_button_icon_padding',
			[
				'label'      => esc_html__( 'Padding', 'bizz-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aea-advanced-button .aea-advanced-button-icon:after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'advanced_button_icon_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'bizz-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aea-advanced-button .aea-advanced-button-icon:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'advanced_button_icon_shadow',
				'selector' => '{{WRAPPER}} .aea-advanced-button .aea-advanced-button-icon:after',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'advanced_button_icon_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector'  => '{{WRAPPER}} .aea-advanced-button .aea-advanced-button-icon',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_advanced_button_icon_hover',
			[
				'label' => esc_html__( 'Hover', 'bizz-elements' ),
			]
		);

		$this->add_control(
			'advanced_button_icon_hover_color',
			[
				'label'     => esc_html__( 'Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
				'selectors' => [
					'{{WRAPPER}} .aea-advanced-button:hover .aea-advanced-button-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'advanced_button_icon_hover_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .aea-advanced-button:hover .aea-advanced-button-icon:after',
				'separator' => 'after',
			]
		);

		$this->add_control(
			'icon_hover_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
				'condition' => [
					'icon_border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .aea-advanced-button:hover .aea-advanced-button-icon:after' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	public function render_text() {
		$settings = $this->get_settings();
		$this->add_render_attribute( 'content-wrapper', 'class', 'aea-advanced-button-content-wrapper' );
		$this->add_render_attribute( 'content-wrapper', 'class', ( 'top' == $settings['icon_align'] ) ? 'aea-flex aea-flex-column' : '' );
		$this->add_render_attribute( 'content-wrapper', 'class', ( 'bottom' == $settings['icon_align'] ) ? 'aea-flex aea-flex-column-reverse' : '' );
		$this->add_render_attribute( 'content-wrapper', 'data-text', esc_attr($settings['text']));

		$this->add_render_attribute( 'icon-align', 'class', 'elementor-align-icon-' . $settings['icon_align'] );
		$this->add_render_attribute( 'icon-align', 'class', 'aea-advanced-button-icon' );

		$this->add_render_attribute( 'text', 'class', 'aea-advanced-button-text' );
		$this->add_inline_editing_attributes( 'text', 'none' );

		?>
		<div <?php echo $this->get_render_attribute_string( 'content-wrapper' ); ?>>
			<?php if ( ! empty( $settings['icon'] ) ) : ?>
				<div class="aea-advanced-button-icon aea-button-icon-align-<?php echo esc_attr($settings['icon_align']); ?>">
					<i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
				</div>
			<?php endif; ?>
			<div <?php echo $this->get_render_attribute_string( 'text' ); ?>><?php echo $settings['text']; ?></div>
		</div>
		<?php
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'aea-advanced-button-wrapper' );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'advanced_button', 'href', $settings['link']['url'] );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'advanced_button', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'advanced_button', 'rel', 'nofollow' );
			}

		}

		if ( $settings['link']['nofollow'] ) {
			$this->add_render_attribute( 'advanced_button', 'rel', 'nofollow' );
		}

		if ($settings['onclick']) {
			$this->add_render_attribute( 'advanced_button', 'onclick', $settings['onclick_event'] );
		}

		if ($settings['attention_button']) {
			$this->add_render_attribute( 'advanced_button', 'class', 'aea-ep-attention-button' );
		}

		$this->add_render_attribute( 'advanced_button', 'class', 'aea-advanced-button' );		
		$this->add_render_attribute( 'advanced_button', 'class', 'aea-advanced-button-effect-' . esc_attr($settings['button_effect']) );
		$this->add_render_attribute( 'advanced_button', 'class', 'aea-advanced-button-size-' . esc_attr($settings['button_size']) );
		

		if ( $settings['hover_animation'] ) {
			$this->add_render_attribute( 'advanced_button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}

		?>
		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			<a <?php echo $this->get_render_attribute_string( 'advanced_button' ); ?>>
				<?php $this->render_text(); ?>
			</a>
		</div>
		<?php
	}


	protected function content_template() {
		?>
		<#
		view.addRenderAttribute( 'text', 'class', 'aea-advanced-button-text' );

		view.addInlineEditingAttributes( 'text', 'none' );
		
		
		view.addRenderAttribute( 'button', 'onclick', settings.onclick_event );

		var animation = (settings.hover_animation) ? ' elementor-animation-' + settings.hover_animation : '';
		var attention = (settings.attention_button) ? ' aea-ep-attention-button' : '';

		view.addRenderAttribute( 'content-wrapper', 'class', 'aea-advanced-button-content-wrapper' );

		if (settings.icon_align == 'bottom') {
			view.addRenderAttribute( 'content-wrapper', 'class', 'aea-flex aea-flex-column-reverse' );
		}
		
		view.addRenderAttribute( 'content-wrapper', 'data-text', settings.readmore_text);

		#>
		<div class="elementor-button-wrapper">
			<a class="aea-advanced-button aea-advanced-button-effect-{{ settings.button_effect }} aea-advanced-button-size-{{ settings.button_size }}{{animation}}{{attention}}" href="{{ settings.link.url }}" role="button" {{{ view.getRenderAttributeString( 'button' ) }}}>
				<div {{{ view.getRenderAttributeString( 'content-wrapper' ) }}}>
					<# if ( settings.icon ) { #>
					<div class="aea-advanced-button-icon aea-button-icon-align-{{ settings.icon_align }}">
						<i class="{{ settings.icon }}" aria-hidden="true"></i>
					</div>
					<# } #>
					<div {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</div>
				</div>
			</a>
		</div>
		<?php
	}
}
