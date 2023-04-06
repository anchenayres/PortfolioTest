<?php
namespace BizzElements\Modules\ProductSlider;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'product-slider';
	}

	public function get_widgets() {
		 $widgets = [
			'Product_Slider',
		];
		return $widgets;
	}
}
