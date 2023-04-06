<?php
namespace BizzElements\Modules\SectionTitle;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'section-title';
	}

	public function get_widgets() {
		 $widgets = [
			'Section_Title',
		];
		return $widgets;
	}
}
