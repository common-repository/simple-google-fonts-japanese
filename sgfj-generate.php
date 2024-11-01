<?php
function simple_google_fonts_japanese_weight(){

	$weight = '';
	if( get_option( 'simple-google-fonts-japanese-font' ) == 'Noto+Sans+JP' ) $weight = get_option( 'simple-google-fonts-japanese-notosansjp-weight' );
	if( get_option( 'simple-google-fonts-japanese-font' ) == 'M+PLUS+1p' ) $weight = get_option( 'simple-google-fonts-japanese-mplus1p-weight' );
	if( get_option( 'simple-google-fonts-japanese-font' ) == 'Noto+Serif+JP' ) $weight = get_option( 'simple-google-fonts-japanese-notoserifjp-weight' );
	if( get_option( 'simple-google-fonts-japanese-font' ) == 'M+PLUS+Rounded+1c' ) $weight = get_option( 'simple-google-fonts-japanese-mplusrounded1c-weight' );

	return $weight;

}

function simple_google_fonts_japanese_enqueue(){

	wp_enqueue_style( 'simple_google_fonts_japanese', 'https://fonts.googleapis.com/css?family=' . esc_attr( get_option( 'simple-google-fonts-japanese-font', 'Noto+Sans+JP' ) . simple_google_fonts_japanese_weight() ) . '&display=swap' );

}
add_action( 'wp_enqueue_scripts', 'simple_google_fonts_japanese_enqueue' );

function simple_google_fonts_japanese_header(){

	if( !get_option( 'simple-google-fonts-japanese-font', 'Noto+Sans+JP' ) ) return;
	echo "<style>body{font-family:'" . esc_attr( str_replace('+',' ',get_option( 'simple-google-fonts-japanese-font', 'Noto+Sans+JP' ) ) ) . "', sans-serif}</style>";

}
add_action( 'wp_head', 'simple_google_fonts_japanese_header', 999999 );

function simple_google_fonts_japanese_editor_update(){

	$css = '';

	if( get_option( 'simple-google-fonts-japanese-font', 'Noto+Sans+JP' ) ){

		$font = str_replace('+',' ',get_option( 'simple-google-fonts-japanese-font', 'Noto+Sans+JP' ) );
		$css = '@import url(https://fonts.googleapis.com/css?family=' . get_option( 'simple-google-fonts-japanese-font', 'Noto+Sans+JP' ) . simple_google_fonts_japanese_weight() . '&display=swap);';
		$css .= "body.content,.wp-block,.editor-post-title__block .editor-post-title__input,div.editor-block-list__block p,.editor-styles-wrapper h1, .editor-styles-wrapper h2, .editor-styles-wrapper h3, .editor-styles-wrapper h4, .editor-styles-wrapper h5, .editor-styles-wrapper h6{font-family:'" . $font . "' !important}";

	}

	$file = plugin_dir_path( __FILE__ ) . 'css/editor-font.css';

	if( WP_Filesystem() ){
		global $wp_filesystem;
		if ( !file_exists( $file ) ){
			$wp_filesystem->touch( $file );
		}
		$wp_filesystem->put_contents( $file, $css );
	}
}
add_action( 'update_option_simple-google-fonts-japanese-font', 'simple_google_fonts_japanese_editor_update');
add_action( 'update_option_simple-google-fonts-japanese-editor', 'simple_google_fonts_japanese_editor_update');