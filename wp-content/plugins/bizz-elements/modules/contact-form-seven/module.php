<?php
namespace BizzElements\Modules\ContactFormSeven;

use BizzElements\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Module extends Module_Base {

	public function get_name() {
		return 'contact-form-seven';
	}

	public function get_widgets() {

		$widgets = [
			'Contact_Form_Seven',
		];

		return $widgets;
	}
}
