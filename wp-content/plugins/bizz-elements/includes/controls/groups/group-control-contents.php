<?php

namespace BizzElements;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Group_Control_Post_Contents extends Group_Control_Base {

    protected static $fields;

    public static function get_type() {
        return 'code-elements-post-contents';
    }

    protected function init_fields() {
        $fields = [];

        $fields['post_number'] = [
            'label'         => esc_html__('No. Of Posts', 'bizz-elements'),
            'type'          => Controls_Manager::NUMBER,
        ];


        $fields['post_excerpt_show'] = [
            'label'         => esc_html__('Show Excerpts?', 'bizz-elements'),
            'type'          => Controls_Manager::SWITCHER,
            'default'       => 'yes',
            'label_on'      => esc_html__('Yes', 'bizz-elements'),
            'label_off'     => esc_html__('No', 'bizz-elements'),
            'return_value'  => 'yes',
        ];

        $fields['excerpt_length'] = [
            'label'         => esc_html__('Excerpt Length(Letters)', 'bizz-elements'),
            'type'          => Controls_Manager::NUMBER,
            'condition'     => [ 'post_excerpt_show' => 'yes' ],
            'default'       => 150
        ];

        $fields['title_excerpt_show'] = [
            'label'         => esc_html__('Enable Title Excerpts?', 'bizz-elements'),
            'type'          => Controls_Manager::SWITCHER,
            'default'       => 'no',
            'label_on'      => esc_html__('Yes', 'bizz-elements'),
            'label_off'     => esc_html__('No', 'bizz-elements'),
            'return_value'  => 'yes',
            'separator'     => 'before',
        ];

        $fields['title_excerpt_length'] = [
            'label'         => esc_html__('Title Excerpt Length(Letters)', 'bizz-elements'),
            'type'          => Controls_Manager::NUMBER,
            'condition'     => [ 'title_excerpt_show' => 'yes' ],
        ];


        $fields['title_suffix'] = [
            'label'         => esc_html__('Title Excerpt Suffix', 'bizz-elements'),
            'type'          => Controls_Manager::TEXT,
            'default'       => esc_html__('...','bizz-elements'),
            'condition'     => [ 'title_excerpt_show' => 'yes' ],
        ];
        

        return $fields;
    }

    protected function get_default_options() {
        return [
            'popover' => false,
        ];
    }

}
