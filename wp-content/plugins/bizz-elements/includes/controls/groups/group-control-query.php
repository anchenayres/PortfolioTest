<?php

namespace BizzElements;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Group_Control_Query extends Group_Control_Base {

    protected static $fields;

    public static function get_type() {
        return 'code-elements-query';
    }
    /*
    public static function on_export_remove_setting_from_element($element, $control_id) {
        unset($element['settings'][$control_id . '_posts_ids']);
        unset($element['settings'][$control_id . '_authors']);

        foreach (self::get_post_types() as $post_type => $label) {
            $taxonomy_filter_args = [
                'show_in_nav_menus' => true,
                'object_type' => [$post_type],
            ];

            $taxonomies = get_taxonomies($taxonomy_filter_args, 'objects');

            foreach ($taxonomies as $taxonomy => $object) {
                unset($element['settings'][$control_id . '_' . $taxonomy . '_ids']);
            }
        }

        return $element;
    }*/

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
                'label'         => $object->label,
                'type'          => Controls_Manager::SELECT2,
                'label_block'   => true,
                'multiple'      => true,
                'object_type'   => $taxonomy,
                'options'       => $options,
                'condition'     => [
                    'post_type' => $object->object_type,
                ],
            ];
        }
        
        $fields['authors'] = [
            'label'         => esc_html__('Authors', 'bizz-elements'),
            'type'          => Controls_Manager::SELECT2,
            'label_block'   => true,
            'multiple'      => true,
            'options'       => code_elements_get_auhtors(),
            'condition'     => [
                'post_type' => 'post'
            ]
        ];

        $fields['exclude_posts'] = [
            'label'         => esc_html__('Exclude Posts', 'bizz-elements'),
            'type'          => Controls_Manager::SELECT2,
            'label_block'   => true,
            'multiple'      => true,
            'options'       => code_elements_get_posts(),
            'condition'     => [
                'post_type' => 'post'
            ]
        ];
        
        $fields['orderby'] = [
            'label'         => esc_html__('Order By', 'bizz-elements'),
            'type'          => Controls_Manager::SELECT,
            'options'       => [
                'date'          => esc_html__('Date', 'bizz-elements'),
                'modified'      => esc_html__('Last Modified Date', 'bizz-elements'),
                'rand'          => esc_html__('Rand', 'bizz-elements'),
                'comment_count' => esc_html__('Comment Count', 'bizz-elements'),
                'title'         => esc_html__('Title', 'bizz-elements'),
                'ID'            => esc_html__('Post ID', 'bizz-elements'),
                'author'        => esc_html__('Post Author', 'bizz-elements'),
            ],
            'default' => 'date',
        ];

        $fields['order'] = [
            'label'     => esc_html__('Order', 'bizz-elements'),
            'type'      => Controls_Manager::SELECT,
            'options'   => [
                'DESC'  => esc_html__('Descending', 'bizz-elements'),
                'ASC'   => esc_html__('Ascending', 'bizz-elements'),
            ],
            'default'   => 'DESC',
        ];
        
        $fields['offset'] = [
            'label'     => esc_html__('Offset', 'bizz-elements'),
            'type'      => Controls_Manager::NUMBER,
            'default'   => '',
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
