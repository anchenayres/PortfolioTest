<?php

namespace BizzElements\Modules\SimpleServices\Widgets;

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
class Simple_Services extends Widget_Base {

    /**
     * Retrieve  widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'simple-services';
    }

    /**
     * Retrieve  widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Services', 'bizz-elements');
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
        return 'eicon-table-of-contents';
    }

    public function get_script_depends() {
        return [
            'code-elements-frontend'
        ];
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
                'label' => esc_html__('Services', 'bizz-elements'),
            ]
        );

        

        $this->add_control(
            'services', 
            [
                'label' => esc_html__( 'Services', 'bizz-elements' ),
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'title' => esc_html__( 'Creative Design', 'bizz-elements' ),    
                        
                    ],
                    [
                        'title' => esc_html__( 'Creative Design', 'bizz-elements' ),    
                        
                    ],
                   
                ],
                'fields' => [
                      [
                        'name' => 'icon',
                        'label' => esc_html__( 'Icon', 'bizz-elements' ),
                        'type' => Controls_Manager::ICONS,
                        
                    ],
                    [
                        'name'    => 'title',
                        'label'   => esc_html__( 'Title', 'bizz-elements' ),
                        'type'    => Controls_Manager::TEXT,
                        'dynamic' => [ 'active' => true ],
                        'default' => esc_html__( 'Creative Design' , 'bizz-elements' ),
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__( 'Description', 'bizz-elements' ),
                        'type' => Controls_Manager::WYSIWYG,
                        'dynamic' => [ 'active' => true ],
                        'label_block' => true,
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
                'selector' => '{{WRAPPER}} .code-wrapp.simple-services .service-inner-wrapp h4',
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
                    '{{WRAPPER}} .code-wrapp.simple-services .service-inner-wrapp h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        
        /**
         * Style Tab: Line Icon Styles
         */
        $this->start_controls_section(
                'section_icon_style', [
                    'label' => esc_html__('Icon Style', 'bizz-elements'),
                    'tab' => Controls_Manager::TAB_STYLE,
                   
                ]
        );

         $this->add_control(
            'icon_color', [
                'label'     => __('Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.simple-services .service-wrapper-outer .icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_icon_height',
            [
                'label'             => __( 'Size', 'code-elements' ),
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
                    '{{WRAPPER}} .code-wrapp.simple-services .service-wrapper-outer .icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .code-wrapp.simple-services .service-wrapper-outer .service-inner-wrapp p',
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
                    '{{WRAPPER}} .code-wrapp.simple-services .service-wrapper-outer .service-inner-wrapp p' => 'color: {{VALUE}}',
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
        $services          = $settings['services'];
        

        $this->add_render_attribute('code-wrapp', 'class', 'code-wrapp simple-services');

        
        
        ?>

        <div <?php echo $this->get_render_attribute_string('code-wrapp'); ?>>
        <div class="service-wrapper-outer cww-flex">
            <?php $counter = 1;
                  $prefix = 0;   ?>
          <?php foreach(  $services as $key => $service ):
            
            if( $counter > 9 ){
                $prefix = '';
            }

            $icon           = $service['icon'];
            $title          = $service['title'];
            $description    = $service['description'];


           ?>
            
            <div class="service-wrapp">
                <div class="service-inner-wrapp">
                    <div class="counter"><?php echo esc_html($prefix . $counter); ?></div>
                    <div class="icon"><?php \Elementor\Icons_Manager::render_icon($icon, ['arial-hidden'=>'true'] ); ?></div>
                    
                    <h4><?php echo esc_html($title); ?></h4>
                    <p><?php echo wp_kses_post($description); ?></p>                       
                </div>
            </div>

            <?php 
            $counter++;
            
            endforeach; ?>
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