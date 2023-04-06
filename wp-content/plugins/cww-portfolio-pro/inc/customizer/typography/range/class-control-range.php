<?php
/**
 * Customizer Control: cww-portfolio-pro-range.
 *
 * @package     CWW Portfolio Pro
 * @subpackage  Controls
 * @since       1.0.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return; 
}

/**
 * Range control
 */
class Cww_Portfolio_Pro_Customizer_Range_Control extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'cww-portfolio-pro-range';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_script( 'cww-portfolio-pro-range', CWW_PP_URL . '/inc/customizer/typography/range/range.js', array( 'jquery', 'customize-base' ), false, true );
		wp_enqueue_style( 'cww-portfolio-pro-range', CWW_PP_URL . '/inc/customizer/typography/range/range.css', null );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		} else {
			$this->json['default'] = $this->setting->default;
		}
		$this->json['value']       = $this->value();
		$this->json['choices']     = $this->choices;
		$this->json['link']        = $this->get_link();
		$this->json['id']          = $this->id;

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}

	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<label>
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			<div class="control-wrap">
				<input type="range" {{{ data.inputAttrs }}} value="{{ data.value }}" {{{ data.link }}} data-reset_value="{{ data.default }}" />
				<input type="number" {{{ data.inputAttrs }}} class="cww-portfolio-pro-range-input" value="{{ data.value }}" />
				<span class="cww-portfolio-pro-reset-slider"><span class="dashicons dashicons-image-rotate"></span></span>
			</div>
		</label>
		<?php
	}
}
