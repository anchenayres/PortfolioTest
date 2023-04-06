<?php
namespace BizzElements\Modules\SimpleServices;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'simple-services';
	}

	public function get_widgets() {
		 $widgets = [
			'Simple_Services',
		];
		return $widgets;
	}
}
