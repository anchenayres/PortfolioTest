<?php
namespace BizzElements\Modules\Teams;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'aea-teams';
	}

	public function get_widgets() {
		 $widgets = [
			'Teams',
		];
		return $widgets;
	}
}
