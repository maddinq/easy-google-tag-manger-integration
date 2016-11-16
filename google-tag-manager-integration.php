<?php
/*
Plugin Name: Easy Google Tag Manager Integration
Plugin URI: http://wordpress.org/extend/plugins/google-tag-manager-integration/
Description: This plugin helps you to integrate the Google Tag Manger into your Wordpress Theme. Just install and activate the plugin and add your GTM ID once in the preferences.
Version: 0.9
Author: Martin Quade 
License: GPLv2 or later
*/

class google_tag_manager_integration {

	public static function go() {
		add_filter( 'admin_init', array( __CLASS__, 'register_gtm_field' ) );
		add_action( 'wp_head', array( __CLASS__, 'output_tag_code_header' ) );
		add_action( 'wp_footer', array( __CLASS__, 'output_tag_code_footer' ) );
	}
	public static function register_gtm_field() {
		register_setting( 'general', 'google_tag_manager_id', 'esc_attr' );
		add_settings_field( 'google_tag_manager_id', '<label for="google_tag_manager_id">' . __( 'Google Tag Manager ID' , 'google_tag_manager_integration' ) . '</label>' , array( __CLASS__, 'gtm_input_fields_html') , 'general' );
	}
	public static function gtm_input_fields_html() {
		?>
		<input type="text" id="google_tag_manager_id" name="google_tag_manager_id" placeholder="GTM-ABC1234" class="regular-text code" value="<?php echo get_option( 'google_tag_manager_id', '' ); ?>" />
		<p class="description"><?php _e( 'The ID will be provided from Google Tag Manger code:', 'google_tag_manager_integration' ); ?><br />
			<code>&lt;noscript&gt;&lt;iframe src="//www.googletagmanager.com/ns.html?id=<strong style="color:#c00;">GTM-ABC1234</strong>"</code></p>
		<p class="description"><?php _e( 'Generate your ID via <a href="https://www.google.com/tagmanager/">Google Tag Manger</a>..', 'google_tag_manager_integration' ); ?></p>
		<?php
	}
	// Header Code - at the end of the head
	public static function output_tag_code_header() {
			if( ! $id = get_option( 'google_tag_manager_id', '' ) ) return;
			?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo $id; ?>');</script>
<!-- End Google Tag Manager -->
			<?php
		}
	// Footer Code (normally right after the opening body tag - but wordpress themes don't support that by default
	public static function output_tag_code_footer() {
		if( ! $id = get_option( 'google_tag_manager_id', '' ) ) return;
		?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $id; ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<?php
	}
}

google_tag_manager_integration::go();
