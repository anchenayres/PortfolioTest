<?php

namespace BizzElements\Modules\ClientLogo\Widgets;

// Elementor Classes
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
//use Elementor\Scheme_Color;
use BizzElements\Group_Control_Query;
use BizzElements\Group_Control_Header;
use BizzElements\Group_Control_Post_Contents;
use Elementor\Core\Schemes;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 *  Widget
 */
class Client_Logo extends Widget_Base {

    /**
     * Retrieve  widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'client-logo';
    }

    /**
     * Retrieve  widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Client Logo', 'bizz-elements');
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
        return 'eicon-post-slider';
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
                'label' => esc_html__('Client Logo', 'bizz-elements'),
            ]
        );

        

        $this->add_control(
            'logos', 
            [
                'label' => esc_html__( 'Client Logo', 'bizz-elements' ),
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'title' => esc_html__( 'Logo #1', 'bizz-elements' ),    
                        'image_link' => [
                            'url' => '#',
                        ]
                    ],
                    [
                        'title' => esc_html__( 'Logo #2', 'bizz-elements' ),    
                        'image_link' => [
                            'url' => '#',
                        ]
                    ],
                   
                ],
                'fields' => [
                    [
                        'name'    => 'title',
                        'label'   => esc_html__( 'Image Alt Text', 'bizz-elements' ),
                        'type'    => Controls_Manager::TEXT,
                        'dynamic' => [ 'active' => true ],
                        'default' => esc_html__( 'ALT Title' , 'bizz-elements' ),
                    ],
                    [
                        'name' => 'image_source',
                        'label' => esc_html__( 'Upload Logo', 'bizz-elements' ),
                        'type' => Controls_Manager::MEDIA,
                        'dynamic' => [ 'active' => true ],
                        'label_block' => true,
                    ],
                    [
                        'name' => 'image_link',
                        'label' => esc_html__( 'Image Link', 'bizz-elements' ),
                        'type' => Controls_Manager::URL,
                        
                    ],
                   
                ],
                'title_field' => '{{{ title }}}',
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
                    'value' => Schemes\Color::COLOR_1,
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
                        'title_layout!'      => 'layout-three'
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
                    'value' => Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.section-title h2' => 'color: {{VALUE}}',
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
        $logos          = $settings['logos'];
        

        $this->add_render_attribute('code-wrapp', 'class', 'code-wrapp client-logo ');

        
        
        ?>

        <div <?php echo $this->get_render_attribute_string('code-wrapp'); ?>>
        <ul class="cww-flex">    
          <?php foreach($logos as $key => $logo ):
           
           $title = empty($logo['title']) ? ' ' : $logo['title'];
           ?>
            
                <li><a href="<?php echo esc_url($logo['image_link']['url'])?>">
                    <img class="hover_image" src="<?php echo esc_url($logo['image_source']['url'])?>" alt="<?php echo esc_attr($title)?>">
                    <img class="main_image" src="<?php echo esc_url($logo['image_source']['url'])?>" alt="<?php echo esc_attr($title)?>">
                </a></li>
            
           <?php endforeach; ?>
        </ul>   
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
    