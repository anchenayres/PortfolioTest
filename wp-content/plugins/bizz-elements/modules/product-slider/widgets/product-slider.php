<?php

namespace BizzElements\Modules\ProductSlider\Widgets;

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
class Product_Slider extends Widget_Base {

    /**
     * Retrieve  widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'product-slider';
    }

    /**
     * Retrieve  widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Product Slider', 'bizz-elements');
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
        return 'eicon-slides';
    }


    public function get_style_depends() {
        return [
            'code-woo',
            'slick-theme'
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
                'label' => esc_html__('Product Slider', 'bizz-elements'),
            ]
        );

        $this->add_control(
            'product_cat',
            [
                'label'             => esc_html__( 'Product Category', 'bizz-elements' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => code_elements_get_product_categories(),
                'separator'         => 'after', //adds border below this controller
            ]
        );


        $this->end_controls_section();


        /**
         * Style Tab: Title
         */
        $this->start_controls_section(
                'title_style', [
                    'label' => esc_html__('Title', 'bizz-elements'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .cww-woo-products h2.woocommerce-loop-product__title',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );


        $this->add_control(
            'title_color', [
                'label'     => __('Title Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333',
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cww-woo-products h2.woocommerce-loop-product__title' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_section();


        /**
         * Style Tab: Price
         */
        $this->start_controls_section(
                'price_style', [
                    'label' => esc_html__('Price', 'bizz-elements'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'price_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .cww-woo-products a.woocommerce-LoopProduct-link.woocommerce-loop-product__link .price',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );


        $this->add_control(
            'price_color', [
                'label'     => __('Price Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333',
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cww-woo-products a.woocommerce-LoopProduct-link.woocommerce-loop-product__link .price' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_section();


        /**
         * Style Tab: Button
         */
        $this->start_controls_section(
                'button_style', [
                    'label' => esc_html__('Button', 'bizz-elements'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'button_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .code-wrapp.product-slider a.button.product_type_simple.add_to_cart_button',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );


        $this->add_control(
            'button_color', [
                'label'     => __('Button Background', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.product-slider a.button.product_type_simple.add_to_cart_button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_color_hover', [
                'label'     => __('Button Background:Hover', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.product-slider a.button.product_type_simple.add_to_cart_button:hover' => 'background-color: {{VALUE}}',
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
        $product_cat        = $settings['product_cat'];
       
        

        $this->add_render_attribute('code-wrapp', 'class', 'code-wrapp product-slider cww-woo-products');

        
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $product_cat
                )
            )
        );

        $query = new \WP_Query( $args );

        ?>

        <div <?php echo $this->get_render_attribute_string('code-wrapp'); ?>>

        <?php if ( $query->have_posts() ) : ?>
        <div class="woocommerce">
            <ul class="inner-wrapper">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                    <?php wc_get_template_part( 'content', 'product' ); ?>

                <?php endwhile; ?>
            </ul>
        </div>       
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
    