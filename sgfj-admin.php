<?php
function simple_google_fonts_japanese_admin_menu(){
    add_submenu_page('options-general.php', 'Simple Google Fonts Japanese', 'Simple Google Fonts Japanese', 'manage_options', 'simple-google-fonts-japanese', 'simple_google_fonts_japanese_admin' );
	add_action( 'admin_init', 'simple_google_fonts_japanese_register_option' );
}
add_action( 'admin_menu', 'simple_google_fonts_japanese_admin_menu' );

function simple_google_fonts_japanese_register_option(){
	register_setting( 'simple-google-fonts-japanese-group', 'simple-google-fonts-japanese-font' );
	register_setting( 'simple-google-fonts-japanese-group', 'simple-google-fonts-japanese-notosansjp-weight' );
	register_setting( 'simple-google-fonts-japanese-group', 'simple-google-fonts-japanese-mplus1p-weight' );
	register_setting( 'simple-google-fonts-japanese-group', 'simple-google-fonts-japanese-notoserifjp-weight' );
	register_setting( 'simple-google-fonts-japanese-group', 'simple-google-fonts-japanese-mplusrounded1c-weight' );
	register_setting( 'simple-google-fonts-japanese-group', 'simple-google-fonts-japanese-editor' );
}

function simple_google_fonts_japanese_admin() {
?>
<script>
function simple_google_fonts_japanese_notosansjp(){
	if( document.getElementById( 'sgfj_font_notosansjp' ).checked == true) {
		document.getElementById( 'sgfj_font_notosansjp_select' ).disabled = false;
		document.getElementById( 'sgfj_font_mplus1p_select' ).disabled = true;
		document.getElementById( 'sgfj_font_notoserifjp_select' ).disabled = true;
		document.getElementById( 'sgfj_font_mplusrounded1c_select' ).disabled = true;
	}else{
		document.getElementById( 'sgfj_font_notosansjp_select' ).disabled = true;
	}
}
function simple_google_fonts_japanese_mplus1p(){
	if( document.getElementById( 'sgfj_font_mplus1p' ).checked == true) {
		document.getElementById( 'sgfj_font_mplus1p_select' ).disabled = false;
		document.getElementById( 'sgfj_font_notosansjp_select' ).disabled = true;
		document.getElementById( 'sgfj_font_notoserifjp_select' ).disabled = true;
		document.getElementById( 'sgfj_font_mplusrounded1c_select' ).disabled = true;
	}else{
		document.getElementById( 'sgfj_font_mplus1p_select' ).disabled = true;
	}
}
function simple_google_fonts_japanese_notoserifjp(){
	if( document.getElementById( 'sgfj_font_notoserifjp' ).checked == true) {
		document.getElementById( 'sgfj_font_notoserifjp_select' ).disabled = false;
		document.getElementById( 'sgfj_font_notosansjp_select' ).disabled = true;
		document.getElementById( 'sgfj_font_mplus1p_select' ).disabled = true;
		document.getElementById( 'sgfj_font_mplusrounded1c_select' ).disabled = true;
	}else{
		document.getElementById( 'sgfj_font_notoserifjp_select' ).disabled = true;
	}
}
function simple_google_fonts_japanese_mplusrounded1c(){
	if( document.getElementById( 'sgfj_font_mplusrounded1c' ).checked == true) {
		document.getElementById( 'sgfj_font_mplusrounded1c_select' ).disabled = false;
		document.getElementById( 'sgfj_font_notosansjp_select' ).disabled = true;
		document.getElementById( 'sgfj_font_mplus1p_select' ).disabled = true;
		document.getElementById( 'sgfj_font_notoserifjp_select' ).disabled = true;
	}else{
		document.getElementById( 'sgfj_font_mplusrounded1c_select' ).disabled = true;
	}
}
function simple_google_fonts_japanese_other(){
		document.getElementById( 'sgfj_font_notosansjp_select' ).disabled = true;
		document.getElementById( 'sgfj_font_mplus1p_select' ).disabled = true;
		document.getElementById( 'sgfj_font_notoserifjp_select' ).disabled = true;
		document.getElementById( 'sgfj_font_mplusrounded1c_select' ).disabled = true;
}
jQuery(function($){
    $('input:checkbox').click(function() {
        $(this).closest('.sgfj_field').find('input:checkbox').not(this).prop('checked', false);
    });
});
</script>

<h1 class="sgfj_admin_title">Simple Google Fonts Japanese</h1>

<div class="sgfj_admin">
	<form method="post" action="options.php">
	<?php
		settings_fields( 'simple-google-fonts-japanese-group' );
		do_settings_sections( 'simple-google-fonts-japanese-group' ); 
	?>
	<input type="radio" id="sgfj_m1" name="sgfj_info_menu" checked>
	<label for="sgfj_m1" class="sgfj_admin_menu_list_1"><?php esc_html_e( 'Setting', 'simple-google-fonts-japanese' ); ?></label>
	<div class="sgfj_admin_content_1">

	<h2><span><?php esc_html_e( 'Font type', 'simple-google-fonts-japanese' ); ?></span></h2>
		<p><?php esc_html_e( 'Please check the image of each font below.', 'simple-google-fonts-japanese' ); ?> → <a href="https://fonts.google.com/?subset=japanese" target="_blank" rel="noreferrer noopener">Japanese - Google Fonts<span class="dashicons dashicons-external"></span></a></p>
		<div class="sgfj_field">
			<input type="checkbox" onclick="simple_google_fonts_japanese_notosansjp()" id="sgfj_font_notosansjp" name="simple-google-fonts-japanese-font" value="Noto+Sans+JP"<?php echo ( get_option( 'simple-google-fonts-japanese-font', 'Noto+Sans+JP' ) == 'Noto+Sans+JP' ) ? " checked" : ""; ?> />
			<label for="sgfj_font_notosansjp">Noto Sans JP</label>

			<select id="sgfj_font_notosansjp_select" name="simple-google-fonts-japanese-notosansjp-weight"<?php echo ( get_option( 'simple-google-fonts-japanese-font', 'Noto+Sans+JP' ) == 'Noto+Sans+JP' ) ? "" : " disabled"; ?>>
			<option value=":100"<?php echo ( get_option( 'simple-google-fonts-japanese-notosansjp-weight' ) == ':100' ) ? " selected" : ""; ?>>Thin100</option>
			<option value=":300"<?php echo ( get_option( 'simple-google-fonts-japanese-notosansjp-weight' ) == ':300' ) ? " selected" : ""; ?>>Light300</option>
			<option value=":400"<?php echo ( get_option( 'simple-google-fonts-japanese-notosansjp-weight' ) == ':400' || !get_option( 'simple-google-fonts-japanese-notosansjp-weight' ) ) ? " selected" : ""; ?>>Regular400</option>
			<option value=":500"<?php echo ( get_option( 'simple-google-fonts-japanese-notosansjp-weight' ) == ':500' ) ? " selected" : ""; ?>>Medium500</option>
			<option value=":700"<?php echo ( get_option( 'simple-google-fonts-japanese-notosansjp-weight' ) == ':700' ) ? " selected" : ""; ?>>Bold700</option>
			<option value=":900"<?php echo ( get_option( 'simple-google-fonts-japanese-notosansjp-weight' ) == ':900' ) ? " selected" : ""; ?>>Black900</option>
			</select><br />

			<input type="checkbox" onclick="simple_google_fonts_japanese_mplus1p()" id="sgfj_font_mplus1p" name="simple-google-fonts-japanese-font" value="M+PLUS+1p"<?php echo ( get_option( 'simple-google-fonts-japanese-font' ) == 'M+PLUS+1p' ) ? " checked" : ""; ?> />
			<label for="sgfj_font_mplus1p">M PLUS 1p</label>

			<select id="sgfj_font_mplus1p_select" name="simple-google-fonts-japanese-mplus1p-weight"<?php echo ( get_option( 'simple-google-fonts-japanese-font' ) == 'M+PLUS+1p' ) ? "" : " disabled"; ?>>
			<option value=":100"<?php echo ( get_option( 'simple-google-fonts-japanese-mplus1p-weight' ) == ':100' ) ? " selected" : ""; ?>>Thin100</option>
			<option value=":300"<?php echo ( get_option( 'simple-google-fonts-japanese-mplus1p-weight' ) == ':300' ) ? " selected" : ""; ?>>Light300</option>
			<option value=":400"<?php echo ( get_option( 'simple-google-fonts-japanese-mplus1p-weight' ) == ':400' || !get_option( 'simple-google-fonts-japanese-mplus1p-weight' ) ) ? " selected" : ""; ?>>Regular400</option>
			<option value=":500"<?php echo ( get_option( 'simple-google-fonts-japanese-mplus1p-weight' ) == ':500' ) ? " selected" : ""; ?>>Medium500</option>
			<option value=":700"<?php echo ( get_option( 'simple-google-fonts-japanese-mplus1p-weight' ) == ':700' ) ? " selected" : ""; ?>>Bold700</option>
			<option value=":800"<?php echo ( get_option( 'simple-google-fonts-japanese-mplus1p-weight' ) == ':800' ) ? " selected" : ""; ?>>Extra-Bold800</option>
			<option value=":900"<?php echo ( get_option( 'simple-google-fonts-japanese-mplus1p-weight' ) == ':900' ) ? " selected" : ""; ?>>Black900</option>
			</select><br />

			<input type="checkbox" onclick="simple_google_fonts_japanese_notoserifjp()" id="sgfj_font_notoserifjp" name="simple-google-fonts-japanese-font" value="Noto+Serif+JP"<?php echo ( get_option( 'simple-google-fonts-japanese-font' ) == 'Noto+Serif+JP' ) ? " checked" : ""; ?> />
			<label for="sgfj_font_notoserifjp">Noto Serif JP</label>

			<select id="sgfj_font_notoserifjp_select" name="simple-google-fonts-japanese-notoserifjp-weight"<?php echo ( get_option( 'simple-google-fonts-japanese-font' ) == 'Noto+Serif+JP' ) ? "" : " disabled"; ?>>
			<option value=":100"<?php echo ( get_option( 'simple-google-fonts-japanese-notoserifjp-weight' ) == ':100' ) ? " selected" : ""; ?>>Extra-Light200</option>
			<option value=":300"<?php echo ( get_option( 'simple-google-fonts-japanese-notoserifjp-weight' ) == ':300' ) ? " selected" : ""; ?>>Light300</option>
			<option value=":400"<?php echo ( get_option( 'simple-google-fonts-japanese-notoserifjp-weight' ) == ':400' || !get_option( 'simple-google-fonts-japanese-notoserifjp-weight' ) ) ? " selected" : ""; ?>>Regular400</option>
			<option value=":500"<?php echo ( get_option( 'simple-google-fonts-japanese-notoserifjp-weight' ) == ':500' ) ? " selected" : ""; ?>>Medium500</option>
			<option value=":600"<?php echo ( get_option( 'simple-google-fonts-japanese-notoserifjp-weight' ) == ':600' ) ? " selected" : ""; ?>>Semi-Bold600</option>
			<option value=":700"<?php echo ( get_option( 'simple-google-fonts-japanese-notoserifjp-weight' ) == ':700' ) ? " selected" : ""; ?>>Bold700</option>
			<option value=":900"<?php echo ( get_option( 'simple-google-fonts-japanese-notoserifjp-weight' ) == ':900' ) ? " selected" : ""; ?>>Black900</option>
			</select><br />

			<input type="checkbox" onclick="simple_google_fonts_japanese_other()" id="sgfj_font_sawarabimincho" name="simple-google-fonts-japanese-font" value="Sawarabi+Mincho"<?php echo ( get_option( 'simple-google-fonts-japanese-font' ) == 'Sawarabi+Mincho' ) ? " checked" : ""; ?> />
			<label for="sgfj_font_sawarabimincho">Sawarabi Mincho</label><br />

			<input type="checkbox" onclick="simple_google_fonts_japanese_mplusrounded1c()" id="sgfj_font_mplusrounded1c" name="simple-google-fonts-japanese-font" value="M+PLUS+Rounded+1c"<?php echo ( get_option( 'simple-google-fonts-japanese-font' ) == 'M+PLUS+Rounded+1c' ) ? " checked" : ""; ?> />
			<label for="sgfj_font_mplusrounded1c">M PLUS Rounded 1c</label>

			<select id="sgfj_font_mplusrounded1c_select" name="simple-google-fonts-japanese-mplusrounded1c-weight"<?php echo ( get_option( 'simple-google-fonts-japanese-font' ) == 'M+PLUS+Rounded+1c' ) ? "" : " disabled
"; ?>>
			<option value=":100"<?php echo ( get_option( 'simple-google-fonts-japanese-mplusrounded1c-weight' ) == ':100' ) ? " selected" : ""; ?>>Thin100</option>
			<option value=":300"<?php echo ( get_option( 'simple-google-fonts-japanese-mplusrounded1c-weight' ) == ':300' ) ? " selected" : ""; ?>>Light300</option>
			<option value=":400"<?php echo ( get_option( 'simple-google-fonts-japanese-mplusrounded1c-weight' ) == ':400' || !get_option( 'simple-google-fonts-japanese-mplusrounded1c-weight' ) ) ? " selected" : ""; ?>>Regular400</option>
			<option value=":500"<?php echo ( get_option( 'simple-google-fonts-japanese-mplusrounded1c-weight' ) == ':500' ) ? " selected" : ""; ?>>Medium500</option>
			<option value=":700"<?php echo ( get_option( 'simple-google-fonts-japanese-mplusrounded1c-weight' ) == ':700' ) ? " selected" : ""; ?>>Bold700</option>
			<option value=":800"<?php echo ( get_option( 'simple-google-fonts-japanese-mplusrounded1c-weight' ) == ':800' ) ? " selected" : ""; ?>>Extra-Bold800</option>
			<option value=":900"<?php echo ( get_option( 'simple-google-fonts-japanese-mplusrounded1c-weight' ) == ':900' ) ? " selected" : ""; ?>>Black900</option>
			</select><br />

			<input type="checkbox" onclick="simple_google_fonts_japanese_other()" id="sgfj_font_sawarabigothic" name="simple-google-fonts-japanese-font" value="Sawarabi+Gothic"<?php echo ( get_option( 'simple-google-fonts-japanese-font' ) == 'Sawarabi+Gothic' ) ? " checked" : ""; ?> />
			<label for="sgfj_font_sawarabigothic">Sawarabi Gothic</label><br />

			<input type="checkbox" onclick="simple_google_fonts_japanese_other()" id="sgfj_font_kosugimaru" name="simple-google-fonts-japanese-font" value="Kosugi+Maru"<?php echo ( get_option( 'simple-google-fonts-japanese-font' ) == 'Kosugi+Maru' ) ? " checked" : ""; ?> />
			<label for="sgfj_font_kosugimaru">Kosugi Maru</label><br />

			<input type="checkbox" onclick="simple_google_fonts_japanese_other()" id="sgfj_font_kosugi" name="simple-google-fonts-japanese-font" value="Kosugi"<?php echo ( get_option( 'simple-google-fonts-japanese-font' ) == 'Kosugi' ) ? " checked" : ""; ?> />
			<label for="sgfj_font_kosugi">Kosugi</label>
		</div>

	<h2><span><?php esc_html_e( 'Apply to editor', 'simple-google-fonts-japanese' ); ?></span></h2>
		<div class="sgfj_radio">
			<input type="radio" id="sgfj_editor_yes" name="simple-google-fonts-japanese-editor" value="1"<?php echo ( get_option( 'simple-google-fonts-japanese-editor', '1' ) == '1' ) ? " checked" : ""; ?> />
			<label for="sgfj_editor_yes"><?php esc_html_e( 'Yes', 'simple-google-fonts-japanese' ); ?></label>
			<input type="radio" id="sgfj_editor_no" name="simple-google-fonts-japanese-editor" value="2"<?php echo ( get_option( 'simple-google-fonts-japanese-editor', '1' ) == '2' ) ? " checked" : ""; ?> />
			<label for="sgfj_editor_no"><?php esc_html_e( 'No', 'simple-google-fonts-japanese' ); ?></label>
		</div>

	<?php submit_button(); ?>
	</div>

	<input type="radio" id="sgfj_m2" name="sgfj_info_menu">
	<label for="sgfj_m2" class="sgfj_admin_menu_list_2"><?php esc_html_e( 'How to use', 'simple-google-fonts-japanese' ); ?></label>
	<div class="sgfj_admin_content_2">
		<h2><span><?php esc_html_e( 'Font type', 'simple-google-fonts-japanese' ); ?></span></h2>
		<p><?php esc_html_e( 'The checked font is applied to the entire site.', 'simple-google-fonts-japanese' ); ?></p>
		<p><?php esc_html_e( 'If nothing is checked, it will return before using the plug-in.', 'simple-google-fonts-japanese' ); ?></p>
		<p><?php esc_html_e( 'Weight options are only available for "Noto Sans JP", "M PLUS 1p", "Noto Serif JP" and "M PLUS Rounded 1c".', 'simple-google-fonts-japanese' ); ?></p>
		<h2><span><?php esc_html_e( 'Apply to editor', 'simple-google-fonts-japanese' ); ?></span></h2>
		<p><?php esc_html_e( 'Select “Yes” to apply the font to the editor.', 'simple-google-fonts-japanese' ); ?></p>
		<p><?php esc_html_e( 'However, this does not apply to text editors (classic).', 'simple-google-fonts-japanese' ); ?></p>
	</div>

	</form>
</div>
<?php
}
