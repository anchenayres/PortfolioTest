<?php
namespace BizzElements\Modules\RoundImages;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'round-images';
	}

	public function get_widgets() {
		 $widgets = [
			'Round_Images',
		];
		return $widgets;
	}
}
