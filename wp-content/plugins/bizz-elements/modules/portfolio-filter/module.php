<?php
namespace BizzElements\Modules\PortfolioFilter;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'portfolio-filter';
	}

	public function get_widgets() {
		 $widgets = [
			'Portfolio_Filter',
		];
		return $widgets;
	}
}
