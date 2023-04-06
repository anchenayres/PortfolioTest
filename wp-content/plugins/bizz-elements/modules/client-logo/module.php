<?php
namespace BizzElements\Modules\ClientLogo;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'client-logo';
	}

	public function get_widgets() {
		 $widgets = [
			'Client_Logo',
		];
		return $widgets;
	}
}
