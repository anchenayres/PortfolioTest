<?php
/**
* Additional Settings
*
*
*
*
*/
$wp_customize->add_panel( 'cww_additional_panel', array(
      'priority'         =>      40,
      'capability'       =>      'edit_theme_options',
      'theme_supports'   => '',
      'title'            =>      esc_html__( 'Additional Options', 'cww-portfolio' ),
      'description'      =>      esc_html__( 'This allows to edit general theme settings', 'cww-portfolio' ),
  ));

