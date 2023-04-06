<?php
namespace BizzElements\Modules\AdvancedButton;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'advanced-button';
	}

	public function get_widgets() {

		$widgets = ['AdvancedButton'];

		return $widgets;
	}
}
