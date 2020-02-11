<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Field: button_set
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'SP_EAP_Field_button_set' ) ) {
	class SP_EAP_Field_button_set extends SP_EAP_Fields {

		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		public function render() {

			$args = wp_parse_args(
				$this->field,
				array(
					'multiple' => false,
					'options'  => array(),
				)
			);

			$value = ( is_array( $this->value ) ) ? $this->value : array_filter( (array) $this->value );

			echo $this->field_before();

			if ( ! empty( $args['options'] ) ) {

				echo '<div class="spf-siblings spf--button-group" data-multiple="' . $args['multiple'] . '">';

				foreach ( $args['options'] as $key => $option ) {

					$type     = ( $args['multiple'] ) ? 'checkbox' : 'radio';
					$extra    = ( $args['multiple'] ) ? '[]' : '';
					$active   = ( in_array( $key, $value ) ) ? ' spf--active' : '';
					$checked  = ( in_array( $key, $value ) ) ? ' checked' : '';
					$pro_only = isset( $option['pro_only'] ) ? ' disabled' : '';

					echo '<div class="spf--sibling ' . $pro_only . ' spf--button' . $active . '">';
					echo '<input ' . $pro_only . ' type="' . $type . '" name="' . $this->field_name( $extra ) . '" value="' . $key . '"' . $this->field_attributes() . $checked . '/>';
					echo $option['text'];
					echo '</div>';

				}

				echo '</div>';

			}

			echo '<div class="clear"></div>';

			echo $this->field_after();

		}

	}
}
