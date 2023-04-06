<?php
namespace BizzElements\Modules\Blogs;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'blogs';
	}

	public function get_widgets() {
		 $widgets = [
			'Blogs',
		];
		return $widgets;
	}
}
