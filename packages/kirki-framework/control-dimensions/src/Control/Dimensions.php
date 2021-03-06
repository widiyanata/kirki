<?php
/**
 * Customizer Control: dimensions
 *
 * @package   kirki-framework/control-dimensions
 * @copyright Copyright (c) 2019, Ari Stathopoulos (@aristath)
 * @license   https://opensource.org/licenses/MIT
 * @since     1.0
 */

namespace Kirki\Control;

use Kirki\URL;
use Kirki\Control\Dimension;
use Kirki\Control\Base;

/**
 * A text control with validation for CSS units.
 *
 * @since 1.0
 */
class Dimensions extends Base {

	/**
	 * The control type.
	 *
	 * @access public
	 * @since 1.0
	 * @var string
	 */
	public $type = 'kirki-dimensions';

	/**
	 * The version. Used in scripts & styles for cache-busting.
	 *
	 * @static
	 * @access public
	 * @since 1.0
	 * @var string
	 */
	public static $control_ver = '1.0';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 * @since 1.0
	 */
	public function enqueue() {
		parent::enqueue();

		// Enqueue the script.
		wp_enqueue_script( 'kirki-control-dimension', Dimension::get_control_path_url() . '/assets/scripts/control.js', [ 'jquery', 'customize-base', 'kirki-dynamic-control' ], Dimension::$control_ver, false );
		wp_enqueue_script( 'kirki-control-dimensions', URL::get_from_path( dirname( __DIR__ ) . '/assets/scripts/control.js' ), [ 'jquery', 'customize-base', 'kirki-dynamic-control' ], self::$control_ver, false );

		// Enqueue the style.
		wp_enqueue_style( 'kirki-control-dimensions-style', URL::get_from_path( dirname( __DIR__ ) . '/assets/styles/style.css' ), [], self::$control_ver );

		wp_localize_script(
			'kirki-control-dimensions',
			'dimensionskirkiL10n',
			[
				'left-top'       => esc_html__( 'Left Top', 'kirki' ),
				'left-center'    => esc_html__( 'Left Center', 'kirki' ),
				'left-bottom'    => esc_html__( 'Left Bottom', 'kirki' ),
				'right-top'      => esc_html__( 'Right Top', 'kirki' ),
				'right-center'   => esc_html__( 'Right Center', 'kirki' ),
				'right-bottom'   => esc_html__( 'Right Bottom', 'kirki' ),
				'center-top'     => esc_html__( 'Center Top', 'kirki' ),
				'center-center'  => esc_html__( 'Center Center', 'kirki' ),
				'center-bottom'  => esc_html__( 'Center Bottom', 'kirki' ),
				'font-size'      => esc_html__( 'Font Size', 'kirki' ),
				'font-weight'    => esc_html__( 'Font Weight', 'kirki' ),
				'line-height'    => esc_html__( 'Line Height', 'kirki' ),
				'font-style'     => esc_html__( 'Font Style', 'kirki' ),
				'letter-spacing' => esc_html__( 'Letter Spacing', 'kirki' ),
				'word-spacing'   => esc_html__( 'Word Spacing', 'kirki' ),
				'top'            => esc_html__( 'Top', 'kirki' ),
				'bottom'         => esc_html__( 'Bottom', 'kirki' ),
				'left'           => esc_html__( 'Left', 'kirki' ),
				'right'          => esc_html__( 'Right', 'kirki' ),
				'center'         => esc_html__( 'Center', 'kirki' ),
				'size'           => esc_html__( 'Size', 'kirki' ),
				'spacing'        => esc_html__( 'Spacing', 'kirki' ),
				'width'          => esc_html__( 'Width', 'kirki' ),
				'height'         => esc_html__( 'Height', 'kirki' ),
				'invalid-value'  => esc_html__( 'Invalid Value', 'kirki' ),
			]
		);
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		if ( is_array( $this->choices ) ) {
			foreach ( $this->choices as $choice => $value ) {
				if ( 'labels' !== $choice && true === $value ) {
					$this->json['choices'][ $choice ] = true;
				}
			}
		}
		if ( is_array( $this->json['default'] ) ) {
			foreach ( $this->json['default'] as $key => $value ) {
				if ( isset( $this->json['choices'][ $key ] ) && ! isset( $this->json['value'][ $key ] ) ) {
					$this->json['value'][ $key ] = $value;
				}
			}
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
	 * @since 1.0
	 * @return void
	 */
	protected function content_template() {
		?>
		<label>
			<# if ( data.label ) { #><span class="customize-control-title">{{{ data.label }}}</span><# } #>
			<# if ( data.description ) { #><span class="description customize-control-description">{{{ data.description }}}</span><# } #>
			<div class="wrapper">
				<div class="control">
					<# for ( choiceKey in data.default ) { #>
						<div class="{{ choiceKey }}">
							<h5>
								<# if ( ! _.isUndefined( data.choices.labels ) && ! _.isUndefined( data.choices.labels[ choiceKey ] ) ) { #>
									{{ data.choices.labels[ choiceKey ] }}
								<# } else if ( ! _.isUndefined( data.l10n[ choiceKey ] ) ) { #>
									{{ data.l10n[ choiceKey ] }}
								<# } else { #>
									{{ choiceKey }}
								<# } #>
							</h5>
							<div class="{{ choiceKey }} input-wrapper">
								<# var val = ( ! _.isUndefined( data.value ) && ! _.isUndefined( data.value[ choiceKey ] ) ) ? data.value[ choiceKey ].toString().replace( '%%', '%' ) : ''; #>
								<input {{{ data.inputAttrs }}} type="text" data-choice="{{ choiceKey }}" value="{{ val }}"/>
							</div>
						</div>
					<# } #>
				</div>
			</div>
		</label>
		<?php
	}
}
