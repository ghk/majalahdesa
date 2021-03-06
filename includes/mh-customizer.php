<?php

function mh_magazine_lite_customize_register($wp_customize) {

	/***** Register Custom Controls *****/

    /***** Add Panels *****/

	$wp_customize->add_panel('mh_theme_options', array('title' => esc_html__('Theme Options', 'mh-magazine-lite'), 'description' => '', 'capability' => 'edit_theme_options', 'theme_supports' => '', 'priority' => 1));

	/***** Add Sections *****/

	$wp_customize->add_section('mh_magazine_lite_general', array('title' => esc_html__('General', 'mh-magazine-lite'), 'priority' => 1, 'panel' => 'mh_theme_options'));
	$wp_customize->add_section('mh_magazine_lite_layout', array('title' => esc_html__('Layout', 'mh-magazine-lite'), 'priority' => 2, 'panel' => 'mh_theme_options'));

    /***** Add Settings *****/

    $wp_customize->add_setting('mh_magazine_lite_options[excerpt_length]', array('default' => 25, 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_integer'));
    $wp_customize->add_setting('mh_magazine_lite_options[excerpt_more]', array('default' => '[...]', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_text'));
	$wp_customize->add_setting('mh_magazine_lite_options[theme_type]', array('default' => 'red', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_theme_type'));
    $wp_customize->add_setting('mh_magazine_lite_options[sb_position]', array('default' => 'right', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_select'));
    $wp_customize->add_setting('mh_magazine_lite_options[author_box]', array('default' => 'enable', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_select'));
    $wp_customize->add_setting('mh_magazine_lite_options[post_nav]', array('default' => 'enable', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_select'));
	$wp_customize->add_setting('mh_magazine_lite_options[premium_version_upgrade]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));
    $wp_customize->add_setting('mh_magazine_lite_options[full_bg]', array('default' => 1, 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_checkbox'));

    /***** Add Controls *****/

    $wp_customize->add_control('excerpt_length', array('label' => esc_html__('Custom excerpt length in words', 'mh-magazine-lite'), 'section' => 'mh_magazine_lite_general', 'settings' => 'mh_magazine_lite_options[excerpt_length]', 'priority' => 1, 'type' => 'text'));
    $wp_customize->add_control('excerpt_more', array('label' => esc_html__('Custom excerpt more text', 'mh-magazine-lite'), 'section' => 'mh_magazine_lite_general', 'settings' => 'mh_magazine_lite_options[excerpt_more]', 'priority' => 2, 'type' => 'text'));
    $wp_customize->add_control('sb_position', array('label' => esc_html__('Position of default sidebar', 'mh-magazine-lite'), 'section' => 'mh_magazine_lite_layout', 'settings' => 'mh_magazine_lite_options[sb_position]', 'priority' => 1, 'type' => 'select', 'choices' => array('left' => esc_html__('Left', 'mh-magazine-lite'), 'right' => esc_html__('Right', 'mh-magazine-lite'))));
    $wp_customize->add_control('author_box', array('label' => esc_html__('Author Box', 'mh-magazine-lite'), 'section' => 'mh_magazine_lite_layout', 'settings' => 'mh_magazine_lite_options[author_box]', 'priority' => 2, 'type' => 'select', 'choices' => array('enable' => esc_html__('Enable', 'mh-magazine-lite'), 'disable' => esc_html__('Disable', 'mh-magazine-lite'))));
    $wp_customize->add_control('post_nav', array('label' => esc_html__('Post/Attachment Navigation', 'mh-magazine-lite'), 'section' => 'mh_magazine_lite_layout', 'settings' => 'mh_magazine_lite_options[post_nav]', 'priority' => 4, 'type' => 'select', 'choices' => array('enable' => esc_html__('Enable', 'mh-magazine-lite'), 'disable' => esc_html__('Disable', 'mh-magazine-lite'))));
	$wp_customize->add_control('full_bg', array('label' => esc_html__('Scale background image to full size', 'mh-magazine-lite'), 'section' => 'background_image', 'settings' => 'mh_magazine_lite_options[full_bg]', 'priority' => 99, 'type' => 'checkbox'));
	$wp_customize->add_control('theme_type', array('label' => esc_html__('Tipe Tema', 'mh-magazine-lite'), 'section' => 'colors', 'settings' => 'mh_magazine_lite_options[theme_type]', 'priority' => 2, 'type' => 'select', 'choices' => array('red' => esc_html__('Merah', 'mh-magazine-lite'), 'green' => esc_html__('Hijau', 'mh-magazine-lite'), 'blue' => esc_html__('Biru', 'mh-magazine-lite'), 'black' => esc_html__('Hitam', 'mh-magazine-lite'))));
}
add_action('customize_register', 'mh_magazine_lite_customize_register');

/***** Data Sanitization *****/

function mh_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}
function mh_sanitize_integer($input) {
    return strip_tags($input);
}
function mh_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}
function mh_sanitize_select($input) {
    $valid = array(
        'left' => esc_html__('Left', 'mh-magazine-lite'),
        'right' => esc_html__('Right', 'mh-magazine-lite'),
        'enable' => esc_html__('Enable', 'mh-magazine-lite'),
        'disable' => esc_html__('Disable', 'mh-magazine-lite'),
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

function mh_sanitize_theme_type($input) {
	$valid = array(
		'red' => esc_html__('Merah', 'mh-magazine-lite'),
		'green' => esc_html__('Hijau', 'mh-magazine-lite'),
		'blue' => esc_html__('Biru', 'mh-magazine-lite'),
		'black' => esc_html__('Hitam', 'mh-magazine-lite'),
	);
	if (array_key_exists($input, $valid)) {
		return $input;
	} else {
		return '';
	}
}

/***** Return Theme Options / Set Default Options *****/

if (!function_exists('mh_magazine_lite_theme_options')) {
	function mh_magazine_lite_theme_options() {
		$theme_options = wp_parse_args(
			get_option('mh_magazine_lite_options', array()),
			mh_magazine_lite_default_options()
		);
		return $theme_options;
	}
}

if (!function_exists('mh_magazine_lite_default_options')) {
	function mh_magazine_lite_default_options() {
		$default_options = array(
			'full_bg' => 1,
			'excerpt_length' => 25,
			'excerpt_more' => '[...]',
			'sb_position' => 'right',
			'author_box' => 'enable',
			'post_nav' => 'enable',
			'theme_type' => 'red',
			'premium_version_label' => '',
			'premium_version_text' => '',
			'premium_version_button' => ''
		);
		return $default_options;
	}
}

/***** Enqueue Customizer CSS *****/

function mh_magazine_lite_customizer_css() {
	wp_enqueue_style('mh-customizer', get_template_directory_uri() . '/admin/customizer.css', array());
}
add_action('customize_controls_print_styles', 'mh_magazine_lite_customizer_css');

/***** Enqueue Customizer JS *****/

function mh_magazine_lite_customizer_js() {
	wp_enqueue_script('mh-customizer', get_template_directory_uri() . '/js/mh-customizer.js', array(), '1.0.0', true);
	wp_localize_script('mh-customizer', 'mh_magazine_lite_links', array(
		'upgradeURL' => esc_url('http://www.mhthemes.com/themes/mh/magazine/'),
		'upgradeLabel' => esc_html__('Upgrade to MH Magazine Pro', 'mh-magazine-lite'),
		'title'	=> esc_html__('Theme Related Links:', 'mh-magazine-lite'),
		'themeURL' => esc_url('http://www.mhthemes.com/themes/mh/magazine-lite/'),
		'themeLabel' => esc_html__('Theme Info Page', 'mh-magazine-lite'),
		'docsURL' => esc_url('http://www.mhthemes.com/support/documentation-mh-magazine/'),
		'docsLabel'	=> esc_html__('Theme Documentation', 'mh-magazine-lite'),
		'supportURL' => esc_url('https://wordpress.org/support/theme/mh-magazine-lite'),
		'supportLabel' => esc_html__('Support Forum', 'mh-magazine-lite'),
		'rateURL' => esc_url('https://wordpress.org/support/view/theme-reviews/mh-magazine-lite?filter=5'),
		'rateLabel'	=> esc_html__('Rate this theme', 'mh-magazine-lite'),
	));
}
add_action('customize_controls_enqueue_scripts', 'mh_magazine_lite_customizer_js');

?>