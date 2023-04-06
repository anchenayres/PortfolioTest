<?php

namespace BizzElements;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Group_Control_Header_Filter extends Group_Control_Base {

    protected static $fields;

    public static function get_type() {
        return 'code-elements-header-filter';
    }

    protected function init_fields() {
        $fields = [];

        $fields['post_type'] = [
            'label' => _x('Source', 'Posts Query Control', 'bizz-elements'),
            'type' => Controls_Manager::SELECT,
        ];

        return $fields;
    }

    protected function prepare_fields($fields) {

        //$args = $this->get_args();

        $post_types = self::get_post_types();

        $fields['post_type']['options'] = $post_types;

        $fields['post_type']['default'] = 'post'; //key($post_types);

        $taxonomy_filter_args = [
            'show_in_nav_menus' => true,
        ];

        $taxonomies = get_taxonomies($taxonomy_filter_args, 'objects');

        foreach ($taxonomies as $taxonomy => $object) {
            $options = array();

            $terms = get_terms($taxonomy);

            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
            }

            $fields[$taxonomy . '_ids'] = [
                'label' => $object->label,
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'object_type' => $taxonomy,
                'options' => $options,
                'condition' => [
                    'post_type' => $object->object_type,
                ],
            ];
        }

        $fields['authors'] = [
            'label' => esc_html__('Authors', 'bizz-elements'),
            'type' => Controls_Manager::SELECT2,
            'label_block' => true,
            'multiple' => true,
            'options' => code_elements_get_auhtors(),
            'condition' => [
                'post_type' => 'post'
            ]
        ];


        $fields['default_text'] = [
            'label' => esc_html__('Default Text', 'bizz-elements'),
            'description' => esc_html__('First item text on heading filter.', 'bizz-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('All', 'bizz-elements'),
        ];

        return parent::prepare_fields($fields);
    }

    private static function get_post_types() {
        $post_type_args = [
            'show_in_nav_menus' => true,
        ];

        $_post_types = get_post_types($post_type_args, 'objects');

        $post_types = [];

        foreach ($_post_types as $post_type => $object) {
            $post_types[$post_type] = $object->label;
        }

        return $post_types;
    }

    protected function get_default_options() {
        return [
            'popover' => false,
        ];
    }

}
