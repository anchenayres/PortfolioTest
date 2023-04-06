<?php
namespace BizzElements\Modules\Services;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'services';
	}

	public function get_widgets() {
		 $widgets = [
			'Services',
		];
		return $widgets;
	}
}
