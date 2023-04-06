<?php

namespace BizzElements\Modules\Services\Widgets;

// Elementor Classes
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
//use Elementor\Scheme_Color;
use Elementor\Icons_Manager;
use BizzElements\Group_Control_Query;
use BizzElements\Group_Control_Header;
use BizzElements\Group_Control_Post_Contents;
use Elementor\Core\Schemes;


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Widget
 */
class Services extends Widget_Base {

    /**
     * Retrieve widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'services';
    }

    /**
     * Retrieve widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Services - Perspective Hover', 'bizz-elements');
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
        return 'eicon-image-rollover';
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
            'image',
            [
                'label'             => esc_html__( 'Image', 'bizz-elements' ),
                'type'              => Controls_Manager::MEDIA,
                'separator'         => 'after', //adds border below this controller
            ]
        );

        $this->add_control(
            'icon',
            [
                'label'             => esc_html__( 'Icon', 'bizz-elements' ),
                'type'              => Controls_Manager::ICONS,
                'separator'         => 'after', //adds border below this controller
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label'             => esc_html__( 'Subtitle', 'bizz-elements' ),
                'type'              => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'             => esc_html__( 'Title', 'bizz-elements' ),
                'type'              => Controls_Manager::TEXT,
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
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .code-wrapp.services .content-wrapp h3',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );


        $this->add_control(
            'title_text_color', [
                'label'     => __('Text Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.services .content-wrapp h3' => 'color: {{VALUE}}'
                    
                ],
            ]
        );


        $this->end_controls_section();

        
       


        /**
         * Style Tab: Subtitle
         */
        $this->start_controls_section(
            'section_desc_style', [
                'label' => esc_html__('Subtitle', 'bizz-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'desc_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .code-wrapp.services .content-wrapp h6',
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
                'default' => '#DEDEDE',
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.services .content-wrapp h6' => 'color: {{VALUE}}',
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
        $image              = $settings['image'];
        $icon               = $settings['icon'];
        $section_subtitle   = $settings['section_subtitle'];
        $section_title      = $settings['section_title'];
        

        $this->add_render_attribute('code-wrapp', 'class', 'code-wrapp services');

        
        
        ?>

        <div <?php echo $this->get_render_attribute_string('code-wrapp'); ?>>
            <div class="inner-service" style="background-image:url('<?php echo esc_url($image['url'])?>');">
                <div class="inner-wrapp">
                    <div class="content-wrapp">
                        <div class="icon-wrapp">
                        <?php \Elementor\Icons_Manager::render_icon($icon, ['arial-hidden'=>'true'] ); ?>
                        </div>
                        <h6><?php echo esc_html($section_subtitle); ?></h6>
                        <h3><?php echo esc_html($section_title); ?></h3>
                    </div>
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
    