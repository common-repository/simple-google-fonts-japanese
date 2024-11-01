<?php
/**
 * Plugin Name: Simple Google Fonts Japanese
 * Plugin URI: https://yws.tokyo/simple-google-fonts-japanese/
 * Description: Change the site font to Japanese Google font. You can change the font type and weight as an option.
 * Author: Yossy's web service
 * Author URI: https://yws.tokyo
 * Text Domain: simple-google-fonts-japanese
 * Domain Path: /languages
 * Version: 1.0.0
 */


function simple_google_fonts_japanese_languages() {
	load_plugin_textdomain( 'simple-google-fonts-japanese', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'simple_google_fonts_japanese_languages' );

require_once 'simple-google-fonts-japanese.php';
require_once 'sgfj-generate.php';
require_once 'sgfj-admin.php';

function simple_google_fonts_japanese_admin_style(){
	wp_enqueue_style( 'simple_google_fonts_japanese_admin_style', plugins_url( '/css/admin.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'simple_google_fonts_japanese_admin_style' );

function simple_google_fonts_japanese_add_block() {
	wp_enqueue_style( 'bnp-editor-style-color', plugins_url( '/css/editor-font.css?ver=', __FILE__ ), array(), date_i18n("U") );
}

function simple_google_fonts_japanese_add_visual($style){
	$style[] = plugins_url( '/css/editor-font.css?ver=', __FILE__ ) . date_i18n("U");
	return $style;
}

if( get_option( 'simple-google-fonts-japanese-editor', '1' ) == '1' ){
	add_filter( 'editor_stylesheets', 'simple_google_fonts_japanese_add_visual' );
	add_action( 'enqueue_block_editor_assets', 'simple_google_fonts_japanese_add_block' );
}
?>
