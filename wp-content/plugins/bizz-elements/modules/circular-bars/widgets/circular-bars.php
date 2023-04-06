<?php

namespace BizzElements\Modules\CircularBars\Widgets;

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
 * Widget
 */
class Circular_Bars extends Widget_Base {

    /**
     * Retrieve widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'circular-bars';
    }

    /**
     * Retrieve widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Circular Bars', 'bizz-elements');
    }

    /**
     * Retrieve the list of categories the widget belongs to.
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
     * Retrieve widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-counter-circle';
    }


    public function get_script_depends() {
        return [ 'jquery-classyloader','jquery-waypoints' ];
    }

    /**
     * Register widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'header', [
                'label' => esc_html__('Circular Bar', 'bizz-elements'),
            ]
        );

        $this->add_control(
            'bar_title',
            [
                'label'             => esc_html__( 'Title', 'bizz-elements' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => 'WordPress',
            ]
        );

        $this->add_control(
            'bar_percentage',
            [
                'label'             => esc_html__( 'Value(%)', 'bizz-elements' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => '87',
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
                'selector' => '{{WRAPPER}} .title-bar',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );


        $this->add_control(
            'circle_color', [
                'label'     => __('Circle Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333',
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
               /* 'selectors' => [
                    '{{WRAPPER}} .code-wrapp.section-title h5' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .code-wrapp.section-title h5 span:after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .code-wrapp.section-title h5 span:before' => 'background: {{VALUE}}',

                    '{{WRAPPER}} .code-wrapp.section-title.layout-three h5:after' => 'background: {{VALUE}}',
                    
                ],*/
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
                    '{{WRAPPER}} .title-bar' => 'color: {{VALUE}}'
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

        $settings           = $this->get_settings();
        $bar_title          = $settings['bar_title'];
        $bar_percentage     = $settings['bar_percentage'];
        $circle_color       = $settings['circle_color'];
        

        $this->add_render_attribute('code-wrapp', 'class', 'code-wrapp circular-bars');

        
        
        ?>

        <div <?php echo $this->get_render_attribute_string('code-wrapp'); ?>>

          <div class="skill-progress-wrapper circular cww-flex">
                <?php
                $counter = 1;
                
                ?>
                <div class="bar-circular-wrapp">
                    <canvas id="cww-pp<?php echo esc_attr($counter); ?>" class="cww-pp<?php echo esc_attr($counter); ?> cloader"  data-percentage="<?php echo absint($bar_percentage); ?>" data-color="<?php echo esc_attr($circle_color);?>"></canvas>
                    <?php if($bar_title){ ?><div class="title-bar"><?php echo esc_attr($bar_title); ?></div><?php } ?>
                </div>
                      
           </div>

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
    