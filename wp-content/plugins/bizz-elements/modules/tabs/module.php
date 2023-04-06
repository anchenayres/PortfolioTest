<?php
namespace BizzElements\Modules\Tabs;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'tabs';
	}

	public function get_widgets() {
		 $widgets = [
			'Tabs',
		];
		return $widgets;
	}
}
