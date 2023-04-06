<?php
namespace BizzElements\Modules\Testimonials\skins;

use Elementor\Skin_Base as Elementor_Skin_Base;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use BizzElements\Group_Control_Query;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Layout_Five extends Elementor_Skin_Base {

    public function get_id() {
        return 'layout-five';
    }

    public function get_title() {
        return esc_html__( 'Layout Five', 'bizz-elements' );
    }

    

    public function render() {

        $settings = $this->parent->get_settings();
        $this->parent->add_render_attribute( 'cww-wrapp', 'class', 'cww-testimonials layout-five' );
        ?>
        <div <?php echo $this->parent->get_render_attribute_string( 'cww-wrapp' ); ?>>
        <div class="testimonial-wrapp">
            <?php 
            foreach( $settings['cww_test_rep_data'] as $item ){ ?>
                <div class="inner-wrapp">
                    
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
                    <div class="content-wrapp">
                        <div class="test-desc"><?php echo esc_html($item['cww_test_desc']); ?></div>
                        <div class="name-wrapp">
                            <div class="test-name"><?php echo esc_html($item['cww_testimonial_name']); ?></div>
                            <div class="test-deg"><?php echo esc_html($item['cww_test_deg']); ?></div>
                        </div>
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
                
               $('.cww-testimonials.layout-five .testimonial-wrapp').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true
                });

                });
            
            </script>
            <?php 
        }

    }




     

}

