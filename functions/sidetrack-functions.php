<?php

// include( 'swipe-shortcode.php' );
add_action( 'wp_enqueue_scripts', 'sidetrack_styles' );

function sidetrack_styles() {
	wp_register_script( 'opacity', get_bloginfo( 'template_url' ) . '/js/opacity.js', array( 'jquery' ), time(), true );
	if ( ! is_front_page() ) {
		wp_enqueue_script( 'opacity' );
	}
	wp_register_style( 'montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700', time() );
	wp_enqueue_style( 'montserrat' );
	wp_register_style( 'css-grid', get_template_directory_uri() . '/css/css-grid.css', array( 'trail-style' ), time() );
	wp_enqueue_style( 'css-grid' );
	wp_register_style( 'css-page-grid', get_template_directory_uri() . '/css/css-page-grid.css', array( 'trail-style' ), time() );
	wp_enqueue_style( 'css-page-grid' );
	wp_register_style( 'css-grid-colors', get_template_directory_uri() . '/css/css-grid-colors.css', array( 'trail-style' ), time() );
	if ( '1' === get_option( 'sidetrack_colors_checkbox' ) ) {
		wp_enqueue_style( 'css-grid-colors' );
	}
	wp_register_style( 'grid-logo', get_template_directory_uri() . '/css/grid-logo.css', array( 'trail-style' ), time() );
	wp_enqueue_style( 'grid-logo' );
	wp_register_style( 'css-customizer', get_template_directory_uri() . '/css/css-customizer.css', array( 'trail-style' ), time() );
	wp_enqueue_style( 'css-customizer' );
}


// add_shortcode( 'insert-google-map-here', 'sidetrack_customizer_google_map' );
function sidetrack_customizer_google_map() {
	if ( get_theme_mod( 'sidetrackmap_address' ) ) : ?>
		<div id="pageHeadImage" class="" >
			<div id="googleMap"></div>
		</div>
	<?php
	endif;
}


function sidetrack_dashboard_menu() {
	add_dashboard_page( __( 'Sidetrack Dashboard', 'sidetrack-studio' ), __( 'Sidetrack Dashboard', 'sidetrack-studio' ), 'read', 'sidetrack-dashboard.php', 'sidetrack_dashboard_function' );
}
add_action( 'admin_menu', 'sidetrack_dashboard_menu' );
function sidetrack_dashboard_function() {
	echo '<div class="wrap">';
	echo '<h3>' . __FUNCTION__ . '</h3>';
	$sidetrack_logo = get_theme_mod( 'sidetracklogo' );
	$sidetrack_mobile_logo = get_theme_mod( 'sidetrack_mobile_logo' );
	echo 'Logo = <img src="' . $sidetrack_logo . '" width="20%"/><br>';
	echo '<img src="' . $sidetrack_mobile_logo . '" /><br>';
	echo '</div>';
}
