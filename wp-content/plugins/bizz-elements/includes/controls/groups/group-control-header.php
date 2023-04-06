<?php

namespace BizzElements;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Group_Control_Header extends Group_Control_Base {

    protected static $fields;

    public static function get_type() {
        return 'code-elements-header';
    }

    protected function init_fields() {
        $fields = [];

        $fields['header_title'] = [
            'label' => __('Title', 'bizz-elements'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true
        ];

        $fields['header_link'] = [
            'label' => __('Description', 'bizz-elements'),
            'type' => Controls_Manager::TEXTAREA,
            
        ];



        $fields['header_style'] = [
            'label' => __('Header Style', 'bizz-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'style-1',
            'options' =>  apply_filters( 'code_elements_header_style',[
                    'style-1' => __('Style 1', 'bizz-elements'),
                    'style-2' => __('Style 2', 'bizz-elements'),
                ]),
        ];

        return $fields;
    }

    protected function get_default_options() {
        return [
            'popover' => false,
        ];
    }

}
