<?php
namespace BizzElements\Modules\CircularBars;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'circular-bars';
	}

	public function get_widgets() {
		 $widgets = [
			'Circular_Bars',
		];
		return $widgets;
	}
}
