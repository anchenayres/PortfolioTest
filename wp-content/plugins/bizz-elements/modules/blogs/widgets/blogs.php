<?php

namespace BizzElements\Modules\Blogs\Widgets;

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
class Blogs extends Widget_Base {

    /**
     * Retrieve  widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'blogs';
    }

    /**
     * Retrieve  widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Blogs', 'bizz-elements');
    }

    public function get_style_depends() {
        return [
            'biz-elements-blogs'
        ];
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
        return 'eicon-columns';
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
                'label' => esc_html__('Blogs', 'bizz-elements'),
            ]
        );

       
         $this->add_control(
            'post_meta',
            [
                'label'             => esc_html__( 'Post Meta', 'bizz-elements' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'bizz-elements' ),
                'label_off'         => esc_html__( 'No', 'bizz-elements' ),
                'return_value'      => 'yes',
            ]
        );

        $this->add_control(
            'post_meta_divider',
            [
                'label'             => esc_html__( 'Post Meta Divider', 'bizz-elements' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => '-',
                'selectors'         => [
                    '{{WRAPPER}} .post-meta > span:not(:last-child):after' => 'content: "{{UNIT}}";',
                ],
                'condition'         => [
                    'post_meta'     => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'post_author',
            [
                'label'             => esc_html__( 'Post Author', 'bizz-elements' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'bizz-elements' ),
                'label_off'         => esc_html__( 'No', 'bizz-elements' ),
                'return_value'      => 'yes',
                'condition'         => [
                    'post_meta'     => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'post_category',
            [
                'label'             => esc_html__( 'Post Category', 'bizz-elements' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'bizz-elements' ),
                'label_off'         => esc_html__( 'No', 'bizz-elements' ),
                'return_value'      => 'yes',
                'condition'         => [
                    'post_meta'     => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'post_date',
            [
                'label'             => esc_html__( 'Post Date', 'bizz-elements' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'bizz-elements' ),
                'label_off'         => esc_html__( 'No', 'bizz-elements' ),
                'return_value'      => 'yes',
                'condition'         => [
                    'post_meta'     => 'yes',
                ],
            ]
        );
       
         $this->add_control(
            'post_excerpt',
            [
                'label'             => esc_html__( 'Post Excerpt', 'bizz-elements' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'no',
                'label_on'          => esc_html__( 'Yes', 'bizz-elements' ),
                'label_off'         => esc_html__( 'No', 'bizz-elements' ),
                'return_value'      => 'yes',
                
            ]
        );
        
        $this->add_control(
            'excerpt_length',
            [
                'label'             => esc_html__( 'Excerpt Length', 'bizz-elements' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => 220,
                'min'               => 0,
                'max'               => 950,
                'step'              => 1,
                'condition'         => [
                    'post_excerpt'  => 'yes'
                ]
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label'             => esc_html__( 'No. Of Posts To Display', 'bizz-elements' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => 3,
                'min'               => 1,
                'max'               => 10,
                'step'              => 1,
               
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size',
                'label'             => esc_html__( 'Image Size', 'bizz-elements' ),
                'default'           => 'thumbnail',
            ]
        );

        $this->end_controls_section();

          /**
         * Content Tab: Query
         */
        $this->start_controls_section(
            'section_post_query',
            [
                'label'             => esc_html__( 'Query', 'bizz-elements' ),
            ]
        );

        $this->add_group_control(
                Group_Control_Query::get_type(), [
            'name' => 'posts',
            'label' => esc_html__( 'Posts', 'bizz-elements' ),
                ]
        );

        $this->end_controls_section();



         /**
         * Style Tab: Post Meta
         */
        $this->start_controls_section(
                'meta_style', [
                    'label' => esc_html__('Post Meta', 'bizz-elements'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'meta_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .code-wrapp.blogs .post-meta',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );


        $this->add_control(
            'meta_color', [
                'label'     => __('Text Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.blogs .post-meta' => 'color: {{VALUE}}',
                ],
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
                'selector' => '{{WRAPPER}} .code-wrapp.blogs .post-content h3 a',
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
                    '{{WRAPPER}} .code-wrapp.blogs .post-content h3 a' => 'color: {{VALUE}}',
                ],
            ]
        );
       

        $this->end_controls_section();


         /**
         * Style Tab: Post Contents
         */
        $this->start_controls_section(
                'content_style', [
                    'label' => esc_html__('Post Contents', 'bizz-elements'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'content_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .code-wrapp.blogs .post-content p',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );


        $this->add_control(
            'content_color', [
                'label'     => __('Text Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.blogs .post-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
       

        $this->end_controls_section();


         /**
         * Style Tab: Read More Button
         */
        $this->start_controls_section(
                'button_style', [
                    'label' => esc_html__('Read More Button', 'bizz-elements'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'btn_typography',
                'label' => esc_html__('Typography', 'bizz-elements'),
                'selector' => '{{WRAPPER}} .code-wrapp.blogs .read-more-link a',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );


        $this->add_control(
            'btn_color', [
                'label'     => __('Text Color', 'bizz-elements'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .code-wrapp.blogs .read-more-link a' => 'color: {{VALUE}}',
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
        
        
        

        $this->add_render_attribute('code-wrapp', 'class', 'code-wrapp blogs cww-flex ');

        
        
        ?>

        <div <?php echo $this->get_render_attribute_string('code-wrapp'); ?>>

           <?php $this->get_current_loop_contents(); ?>

        </div>

        <?php }



    protected function get_current_loop_contents(){
        $settings           = $this->get_settings();
        $posts_per_page     = $settings['posts_per_page'];
        

        $args = code_elements_query($settings, $first_id = '',$posts_per_page);
        $featured_posts = new \WP_Query( $args );
        

         if ( $featured_posts->have_posts() ) : while ($featured_posts->have_posts()) : $featured_posts->the_post();
            $total_posts =  $featured_posts->post_count;

        if ( has_post_thumbnail() ) {
            $image_id = get_post_thumbnail_id( get_the_ID() );
            
            $thumb_url = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );
            
        } else {
           $thumb_url = '#';
        }
        ?>
        <div class="blog-outer-wrapp">
            <div class="blog-inner-wrapp">
                <div class="img-wrapp">
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                        <img src="<?php echo esc_url($thumb_url)?>" alt="<?php the_title_attribute(); ?>">
                    </a>
                </div>
                <div class="post-content">
                    <div class="entry-meta">
                        <?php
                        echo code_elements_post_meta($settings);
                        /*cww_portfolio_posted_on();
                        cww_portfolio_posted_by();*/
                        ?>
                    </div><!-- .entry-meta -->
                    <h3>
                        <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
                    </h3>
                    <?php if( $settings['post_excerpt'] == 'yes' ): ?>
                    <p>
                        <?php echo code_elements_custom_excerpt($settings['excerpt_length']); ?>    
                    </p>
                    <?php endif; ?>
                    
                    <div class="read-more-link">
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue Reading','cww-portfolio'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        
        endwhile; endif; wp_reset_postdata(); 

     }

        
        

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
    