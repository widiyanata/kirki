<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       3.0.12
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config( 'kirki_demo', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

/**
 * Add a panel.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/panels.html
 */
Kirki::add_panel( 'kirki_demo_panel', array(
	'priority'    => 10,
	'title'       => esc_attr__( 'Kirki Demo Panel', 'textdomain' ),
	'description' => esc_attr__( 'Contains sections for all kirki controls.', 'textdomain' ),
) );

/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/sections.html
 */
$sections = array(
	'background'      => array( esc_attr__( 'Background', 'textdomain' ), '' ),
	'code'            => array( esc_attr__( 'Code', 'textdomain' ), '' ),
	'checkbox'        => array( esc_attr__( 'Checkbox', 'textdomain' ), '' ),
	'color'           => array( esc_attr__( 'Color', 'textdomain' ), '' ),
	'color-palette'   => array( esc_attr__( 'Color Palette', 'textdomain' ), '' ),
	'custom'          => array( esc_attr__( 'Custom', 'textdomain' ), '' ),
	'dashicons'       => array( esc_attr__( 'Dashicons', 'textdomain' ), '' ),
	'date'            => array( esc_attr__( 'Date', 'textdomain' ), '' ),
	'dimension'       => array( esc_attr__( 'Dimension', 'textdomain' ), '' ),
	'dimensions'      => array( esc_attr__( 'Dimensions', 'textdomain' ), '' ),
	'editor'          => array( esc_attr__( 'Editor', 'textdomain' ), '' ),
	'fontawesome'     => array( esc_attr__( 'Font-Awesome', 'textdomain' ), '' ),
	'generic'         => array( esc_attr__( 'Generic', 'textdomain' ), '' ),
	'image'           => array( esc_attr__( 'Image', 'textdomain' ), '' ),
	'multicheck'      => array( esc_attr__( 'Multicheck', 'textdomain' ), '' ),
	'multicolor'      => array( esc_attr__( 'Multicolor', 'textdomain' ), '' ),
	'number'          => array( esc_attr__( 'Number', 'textdomain' ), '' ),
	'palette'         => array( esc_attr__( 'Palette', 'textdomain' ), '' ),
	'preset'          => array( esc_attr__( 'Preset', 'textdomain' ), '' ),
	'radio'           => array( esc_attr__( 'Radio', 'textdomain' ), esc_attr__( 'A plain Radio control.', 'textdomain' ) ),
	'radio-buttonset' => array( esc_attr__( 'Radio Buttonset', 'textdomain' ), esc_attr__( 'Radio-Buttonset controls are essentially radio controls with some fancy styling to make them look cooler.', 'textdomain' ) ),
	'radio-image'     => array( esc_attr__( 'Radio Image', 'textdomain' ), esc_attr__( 'Radio-Image controls are essentially radio controls with some fancy styles to use images', 'textdomain' ) ),
	'repeater'        => array( esc_attr__( 'Repeater', 'textdomain' ), '' ),
	'select'          => array( esc_attr__( 'Select', 'textdomain' ), '' ),
	'slider'          => array( esc_attr__( 'Slider', 'textdomain' ), '' ),
	'sortable'        => array( esc_attr__( 'Sortable', 'textdomain' ), '' ),
	'switch'          => array( esc_attr__( 'Switch', 'textdomain' ), '' ),
	'toggle'          => array( esc_attr__( 'Toggle', 'textdomain' ), '' ),
	'typography'      => array( esc_attr__( 'Typography', 'textdomain' ), '' ),
);
foreach ( $sections as $section_id => $section ) {
	Kirki::add_section( str_replace( '-', '_', $section_id ) . '_section', array(
		'title'       => $section[0],
		'description' => $section[1],
		'panel'       => 'kirki_demo_panel',
	) );
}

/**
 * Background Control.
 */
Kirki::add_field( 'kirki_demo', array(
	'type'        => 'background',
	'settings'    => 'background_setting',
	'label'       => esc_attr__( 'Background Control', 'textdomain' ),
	'description' => esc_attr__( 'Background conrols are pretty complex! (but useful if properly used)', 'textdomain' ),
	'section'     => 'background_section',
	'default'     => array(
		'background-color'      => 'rgba(20,20,20,.8)',
		'background-image'      => '',
		'background-repeat'     => 'repeat-all',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	),
) );

/**
 * Code control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/code.html
 */
Kirki::add_field( 'kirki_demo', array(
	'type'        => 'code',
	'settings'    => 'code_setting',
	'label'       => esc_attr__( 'Code Control', 'textdomain' ),
	'description' => esc_attr__( 'Description', 'textdomain' ),
	'section'     => 'code_section',
	'default'     => '',
	'choices'     => array(
		'language' => 'css',
		'theme'    => 'monokai',
	),
) );

/**
 * Checkbox control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/checkbox.html
 */
Kirki::add_field( 'kirki_demo', array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_setting',
	'label'       => esc_attr__( 'Checkbox Control', 'textdomain' ),
	'description' => esc_attr__( 'Description', 'textdomain' ),
	'section'     => 'checkbox_section',
	'default'     => true,
) );

/**
 * Color Controls.
 *
 * @link https://aristath.github.io/kirki/docs/controls/color.html
 */
Kirki::add_field( 'kirki_demo', array(
	'type'        => 'color',
	'settings'    => 'color_setting_hex',
	'label'       => __( 'Color Control (hex-only)', 'textdomain' ),
	'description' => esc_attr__( 'This is a color control - without alpha channel.', 'textdomain' ),
	'section'     => 'color_section',
	'default'     => '#0088CC',
) );

Kirki::add_field( 'kirki_demo', array(
	'type'        => 'color',
	'settings'    => 'color_setting_rgba',
	'label'       => __( 'Color Control (with alpha channel)', 'textdomain' ),
	'description' => esc_attr__( 'This is a color control - with alpha channel.', 'textdomain' ),
	'section'     => 'color_section',
	'default'     => '#0088CC',
	'choices'     => array(
		'alpha' => true,
	),
) );

/**
 * Editor Controls
 */
Kirki::add_field( 'kirki_demo', array(
	'type'        => 'editor',
	'settings'    => 'editor_1',
	'label'       => esc_attr__( 'First Editor Control', 'textdomain' ),
	'description' => esc_attr__( 'This is an editor control.', 'textdomain' ),
	'section'     => 'editor_section',
	'default'     => '',
) );

Kirki::add_field( 'kirki_demo', array(
	'type'        => 'editor',
	'settings'    => 'editor_2',
	'label'       => esc_attr__( 'Second Editor Control', 'textdomain' ),
	'description' => esc_attr__( 'This is a 2nd editor control just to check that we do not have issues with multiple instances.', 'textdomain' ),
	'section'     => 'editor_section',
	'default'     => esc_attr__( 'Default Text', 'textdomain' ),
) );

/**
 * Color-Palette Controls.
 *
 * @link https://aristath.github.io/kirki/docs/controls/color-palette.html
 */
Kirki::add_field( 'kirki_demo', array(
	'type'        => 'color-palette',
	'settings'    => 'color_palette_setting_0',
	'label'       => esc_attr__( 'Color-Palette', 'textdomain' ),
	'description' => esc_attr__( 'This is a color-palette control', 'textdomain' ),
	'section'     => 'color_palette_section',
	'default'     => '#888888',
	'choices'     => array(
		'colors' => array( '#000000', '#222222', '#444444', '#666666', '#888888', '#aaaaaa', '#cccccc', '#eeeeee', '#ffffff' ),
		'style'  => 'round',
	),
) );

Kirki::add_field( 'kirki_demo', array(
	'type'        => 'color-palette',
	'settings'    => 'color_palette_setting_4',
	'label'       => esc_attr__( 'Color-Palette', 'textdomain' ),
	'description' => esc_attr__( 'Material Design Colors - all', 'textdomain' ),
	'section'     => 'color_palette_section',
	'default'     => '#F44336',
	'choices'     => array(
		'colors' => Kirki_Helper::get_material_design_colors( 'all' ),
		'size'   => 17,
	),
) );

Kirki::add_field( 'kirki_demo', array(
	'type'        => 'color-palette',
	'settings'    => 'color_palette_setting_1',
	'label'       => esc_attr__( 'Color-Palette', 'textdomain' ),
	'description' => esc_attr__( 'Material Design Colors - primary', 'textdomain' ),
	'section'     => 'color_palette_section',
	'default'     => '#000000',
	'choices'     => array(
		'colors' => Kirki_Helper::get_material_design_colors( 'primary' ),
		'size'   => 25,
	),
) );

Kirki::add_field( 'kirki_demo', array(
	'type'        => 'color-palette',
	'settings'    => 'color_palette_setting_2',
	'label'       => esc_attr__( 'Color-Palette', 'textdomain' ),
	'description' => esc_attr__( 'Material Design Colors - red', 'textdomain' ),
	'section'     => 'color_palette_section',
	'default'     => '#FF1744',
	'choices'     => array(
		'colors' => Kirki_Helper::get_material_design_colors( 'red' ),
		'size'   => 16,
	),
) );

Kirki::add_field( 'kirki_demo', array(
	'type'        => 'color-palette',
	'settings'    => 'color_palette_setting_3',
	'label'       => esc_attr__( 'Color-Palette', 'textdomain' ),
	'description' => esc_attr__( 'Material Design Colors - A100', 'textdomain' ),
	'section'     => 'color_palette_section',
	'default'     => '#FF80AB',
	'choices'     => array(
		'colors' => Kirki_Helper::get_material_design_colors( 'A100' ),
		'size'   => 60,
		'style'  => 'round',
	),
) );