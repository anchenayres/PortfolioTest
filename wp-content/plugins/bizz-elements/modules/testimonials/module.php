<?php
namespace BizzElements\Modules\Testimonials;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'testimonials';
	}

	public function get_widgets() {
		 $widgets = [
			'Testimonials',
		];
		return $widgets;
	}
}
