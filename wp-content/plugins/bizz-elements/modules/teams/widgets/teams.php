<?php
namespace BizzElements\Modules\Teams\Widgets;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Teams extends Widget_Base {

	public function get_name() {
		return 'aea-teams';
	}

	public function get_title() {
		return  esc_html__( 'Teams', 'bizz-elements' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}

	public function get_categories() {
		return ['bizz-elements'];
	}

	public function get_style_depends() {
        return [ 'biz-elements-teams'];
    }

	protected function _register_controls() {

		$this->start_controls_section(
			'section_side_a_content',
			[
				'label' => esc_html__( 'Layout Settings', 'bizz-elements' ),
			]
		);

		$this->add_control(
		  'aea_team_style',
		  	[
		   	'label'       	=> esc_html__( 'Team Layout', 'bizz-elements' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'style-1',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'style-1'  	=> esc_html__( 'Style 1', 'bizz-elements' ),
		     		'style-2' 	=> esc_html__( 'Style 2', 'bizz-elements' ),
		     		'style-3' 	=> esc_html__( 'Style 3', 'bizz-elements' ),
		     		'style-4' 	=> esc_html__( 'Style 4', 'bizz-elements' ),
		     	],
		  	]
		);

		$this->add_control(
			'pfolio_count',
			[
				'label'       => esc_html__( 'No of Teams', 'bizz-elements' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '12'
			]
		);

		  $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size',
                'label'             => esc_html__( 'Image Size', 'bizz-elements' ),
                'default'           => 'medium_large',
                
            ]
        );		

		$this->add_control(
			'front_btn_text',
			[
				'label'       => esc_html__( 'View All Button', 'bizz-elements' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'View All', 'bizz-elements' ),
			]
		);

		

		$this->end_controls_section();

		

		

		$this->start_controls_section(
			'section_style_front',
			[
				'label' => __( 'Front', 'bizz-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'bizz-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .aea-flip-box-button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		

		$this->end_controls_section();

	}

	protected function render() {

		$settings    			= $this->get_settings();
		$aea_team_style 		= isset( $settings['aea_team_style'] ) ? $settings['aea_team_style'] : 'style-1';


		$this->add_render_attribute( 'aea-wrapp', 'class', 'cww-teams '.$aea_team_style );
		
		?>
		<div <?php echo $this->get_render_attribute_string( 'aea-wrapp' ); ?>>
		<div class="team-inner cww-flex">
		<?php 
		$portfolio_args = array(
                            'post_type' 		=> 'team',
                            'order' 			=> 'DESC',
                            'posts_per_page' 	=> -1,
                            'post_status' 		=> 'publish'
                        );
        $portfolio_query = new \WP_Query($portfolio_args);
        if($portfolio_query->have_posts()):
        	while($portfolio_query->have_posts()): $portfolio_query->the_post();
        		
        		$image_id 	= get_post_thumbnail_id( get_the_ID() );
				$thumb_url 	= Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );
				$image_alt 	= get_post_meta( $image_id, '_wp_attachment_image_alt', true );

				$this->add_render_attribute( 'img-alt', 'alt', $image_alt );

				$designation 	= get_post_meta( get_the_ID(), 'gandiv_member_designation' 			, true );
				$fb_url 		= get_post_meta( get_the_ID(), 'gandiv_member_facebook_profile' 	, true );
				$twitter_url 	= get_post_meta( get_the_ID(), 'gandiv_member_twitter_profile' 		, true );
				$youtube_url 	= get_post_meta( get_the_ID(), 'gandiv_member_youtube_profile' 		, true );
				$linkedin_url 	= get_post_meta( get_the_ID(), 'gandiv_member_linkedin_profile' 	, true );
				$insta_url 		= get_post_meta( get_the_ID(), 'gandiv_member_instagram_profile' 	, true );

        	 ?>
        	<div class="inner-wrapp">
        		<?php if( has_post_thumbnail() ){ ?>
        			<div class="img-wrapp">
        			<img src="<?php echo esc_url($thumb_url);?>" <?php echo $this->get_render_attribute_string('img-alt'); ?>>
        			</div>
        		<?php } ?>

				<div class="content-wrappp">
	        		<h4 class="pfolio-title">
	        			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	        		</h4>
	        		<div class="designation"><?php echo esc_html($designation); ?></div>
				</div>

				<div class="social-profiles">

					<?php if( $fb_url ){ ?>
						<a href="<?php echo esc_url($fb_url);?>" class="icon-fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<?php } ?>
					
					<?php if( $twitter_url ){ ?>
						<a href="<?php echo esc_url($twitter_url);?>" class="icon-tw"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<?php } ?>

					<?php if( $youtube_url ){ ?>
						<a href="<?php echo esc_url($youtube_url);?>" class="icon-yt"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
					<?php } ?>

					<?php if( $linkedin_url ){ ?>
						<a href="<?php echo esc_url($linkedin_url);?>" class="icon-ln"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					<?php } ?>

					<?php if( $insta_url ){ ?>
					<a href="<?php echo esc_url($insta_url);?>" class="icon-insta"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					<?php } ?>

				</div>
				

        	</div>
        	<?php 
        	endwhile;
        	wp_reset_postdata();
        endif;

		?>
		</div>
		</div>
		<?php 
	}




}
