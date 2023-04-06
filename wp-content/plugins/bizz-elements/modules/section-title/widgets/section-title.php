<?php

namespace BizzElements\Modules\SectionTitle\Widgets;

// Elementor Classes
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use BizzElements\Group_Control_Query;
use BizzElements\Group_Control_Header;
use BizzElements\Group_Control_Post_Contents;
use Elementor\Core\Schemes;
use Elementor\Controls_Stack;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 *  Widget
 */
class Section_Title extends Widget_Base {

    /**
     * Retrieve  widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'section-title';
    }

    /**
     * Retrieve  widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Section Title', 'bizz-elements');
    }

    /**
     * Retrieve the list of categories the  widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['bizz-elements'];
    }

    /**
     * Retrieve  widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-site-title';
    }

    /**
     * Register  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'header', [
                'label' => esc_html__('Section Title', 'bizz-elements'),
            ]
        );

        /*$this->add_group_control(
            Group_Control_Header::get_type(), [
            'name' => 'header',
            'label' => esc_html__('Header', 'bizz-elements'),
            ]
        );*/

        $this->add_control(
            'title_layout',
            [
                'label'             => esc_html__( 'Layout', 'bizz-elements' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => [
                   'layout-one'     => esc_html__( 'Layout One', 'bizz-elements' ),
                   'layout-two'     => esc_html__( 'Layout Two', 'bizz-elements' ),
                   'layout-three'     => esc_html__( 'Layout Three', 'bizz-elements' ),
                   'layout-four'     => esc_html__( 'Layout Four', 'bizz-elements' ),
                   
                ],
                'default'           => 'layout-one',
                'separator'         => 'after', //adds border below this controller
            ]
        );

        $this->add_control(
            'title_align',
            [
                'label'             => esc_html__( 'Text Align', 'bizz-elements' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => [
                   'left'     => esc_html__( 'Left', 'bizz-elements' ),
                   'center'     => esc_html__( 'Center', 'bizz-elements' ),
                   'right'     => esc_html__( 'Right', 'bizz-elements' ),
                   
                ],
                'default'           => 'left',
                'separator'         => 'after', //adds border below this controller
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'             => esc_html__( 'Title', 'bizz-elements' ),
                'type'              => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'section_desc',
            [
                'label'             => esc_html__( 'Description', 'bizz-elements' ),
                'type'              => Controls_Manager::TEXTAREA,
            ]
        );


        $this->end_controls_section();


        /**
         * Style Tab: Title
         */
        $this->start_controls_section(
                'section_header_style', [
                    'label' => esc_html__('Title', 'bizz-elements'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'header_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .code-wrapp.section-title h5',
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
                    '{{WRAPPER}} .code-wrapp.section-title h5' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .code-wrapp.section-title h5 span:after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .code-wrapp.section-title h5 span:before' => 'background: {{VALUE}}',

                    '{{WRAPPER}} .code-wrapp.section-title.layout-three h5:after' => 'background: {{VALUE}}',
                    
                ],
            ]
        );



        $this->add_control(
                'title_padding', [
            'label' => esc_html__('Padding', 'bizz-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .code-wrapp.section-title h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
            'title_margin', [
                'label' => esc_html__('Margin', 'bizz-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.section-title h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        
        /**
         * Style Tab: Line Icon Styles
         */
        $this->start_controls_section(
                'section_icon_style', [
                    'label' => esc_html__('Lines Style', 'bizz-elements'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition'         => [
                        'title_layout!'      => 'layout-three',
                        'title_layout!'      => 'layout-four'
                    ]
                ]
        );


        $this->add_responsive_control(
            'section_icon_height',
            [
                'label'             => __( 'Height', 'code-elements' ),
                'type'              => Controls_Manager::SLIDER,
                'range'             => [
                    'px' => [
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                    ],
                ],
                'size_units'        => [ 'px' ],
                'selectors'         => [
                    '{{WRAPPER}} .code-wrapp.section-title h5 span:before' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .code-wrapp.section-title h5 span:after' => 'height: {{SIZE}}{{UNIT}};',

                    '{{WRAPPER}} .code-wrapp.section-title h5 span.last-icon:before' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .code-wrapp.section-title h5 span.last-icon:after' => 'height: {{SIZE}}{{UNIT}};',
                ],
                
                
            ]
        );

        $this->add_responsive_control(
            'section_icon_width',
            [
                'label'             => __( 'Width', 'code-elements' ),
                'type'              => Controls_Manager::SLIDER,
                'range'             => [
                    'px' => [
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                    ],
                ],
                'size_units'        => [ 'px' ],
                'selectors'         => [
                    '{{WRAPPER}} .code-wrapp.section-title h5 span:before' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .code-wrapp.section-title h5 span:after' => 'width: {{SIZE}}{{UNIT}};',
                ],
                
            ]
        );

       $this->end_controls_section();


        /**
         * Style Tab: Description
         */
        $this->start_controls_section(
            'section_desc_style', [
                'label' => esc_html__('Description', 'bizz-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'desc_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .code-wrapp.section-title h2',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );


        $this->add_control(
            'desc_text_color', [
                'label'     => __('Text Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );

       $this->end_controls_section();


        /**
         * Style Tab: Blured Circle Style(Overlay Circle)
         */
        $this->start_controls_section(
            'section_circle_style', [
                'label' => esc_html__('Overlay Circle', 'bizz-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'         => [
                        'title_layout'      => 'layout-four'
                    ]

            ]
        );
        
      

        $this->add_control(
            'circle_color', [
                'label'     => __('Circle Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'default' => 'rgba(51, 231, 175, .1)',
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.section-title.layout-four:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_circle_left',
            [
                'label'             => __( 'Left', 'code-elements' ),
                'type'              => Controls_Manager::SLIDER,
                'range'             => [
                    '%' => [
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                    ],
                ],
                'size_units'        => [ 'px' ],
                'selectors'         => [
                    '{{WRAPPER}} .code-wrapp.section-title.layout-four:before' => 'left: {{SIZE}}{{UNIT}};'
                ],
                
            ]
        );

        $this->add_responsive_control(
            'section_circle_bottom',
            [
                'label'             => __( 'Bottom', 'code-elements' ),
                'type'              => Controls_Manager::SLIDER,
                'range'             => [
                    'px' => [
                        'min'   => 0,
                        'max'   => 1000,
                        'step'  => 1,
                    ],
                ],
                'size_units'        => [ 'px' ],
                'selectors'         => [
                    '{{WRAPPER}} .code-wrapp.section-title.layout-four:before' => 'top: {{SIZE}}{{UNIT}};'
                ],
                
            ]
        );

       $this->end_controls_section();


    }

    /**
     * Render widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * 
     */
    public function render() {

        $settings       = $this->get_settings();
        $title_layout   = $settings['title_layout'];
        $title_align    = $settings['title_align'];
        $section_title  = $settings['section_title'];
        $section_desc   = $settings['section_desc'];
        

        $this->add_render_attribute('code-wrapp', 'class', 'code-wrapp section-title '.$title_layout.' '.$title_align);

        
        
        ?>

        <div <?php echo $this->get_render_attribute_string('code-wrapp'); ?>>

            <?php if($section_title): ?>

                <?php if( $title_layout == 'layout-one' || $title_layout == 'layout-two' ){ ?>
                    <h5>
                        <span></span>
                        <?php echo esc_html($section_title); ?>
                        <?php if($title_layout == 'layout-two'): ?>
                            <span class="last-icon"></span>
                        <?php endif; ?>
                    </h5>
                <?php }elseif( $title_layout == 'layout-three' ){ ?>
                    <h5><?php echo esc_html($section_title); ?></h5>
                <?php  }elseif( $title_layout == 'layout-four' ){ ?>
                    <h5><?php echo esc_html($section_title); ?></h5>

                <?php } ?>

            <?php endif; ?>

            <?php if($section_desc): ?>
                <h2><?php echo wp_kses_post($section_desc); ?></h2>
            <?php endif; ?>

        </div>

        <?php }

        
        

        /**
         * Render posts widget output in the editor.
         *
         * Written as a Backbone JavaScript template and used to generate the live preview.
         *
         * @access protected
         */
        protected function content_template() {
            
        }

    }
    