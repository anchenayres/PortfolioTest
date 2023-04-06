<?php
namespace BizzElements\Modules\AnimatedBanner;

use BizzElements\Base\Module_Base;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'animated-banner';
	}

	public function get_widgets() {

		$widgets = [
			'Animated_Banner'
		];

		return $widgets;
	}
}
