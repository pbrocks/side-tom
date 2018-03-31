<?php


add_shortcode( 'sidetrack-swipe-hive', 'sidetrack_swipe_hive' );
function sidetrack_swipe_hive() {
	wp_enqueue_style( 'swipe-hive' );
?>
	<section id="wrapper" class="skewed">
		<!--       <div id="draggable"> -->
			<div class="layer bottom">
				<div class="content-wrap">
					<div class="content-body">
						<h1>I think about running</h1>
					</div>
					<img src="<?php echo get_theme_directory_uri; ?>images/hyperconverged.jpg" alt="">
				</div>

				<!--         </div> -->
			</div>

			<div class="layer top">
				<div class="content-wrap">
					<div class="content-body">
						<h1>I'm actually running</h1>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/images/converged.png" alt="">
				</div>
			</div>

			<div class="handle"></div>
		</section>
<?php
}

add_action( 'wp_enqueue_scripts', 'swipe_hive_scripts' );

function swipe_hive_scripts() {
	wp_register_script( 'scrollreveal', 'https://unpkg.com/scrollreveal/dist/scrollreveal.min.js', array( 'jquery', 'jqueryui', 'jqueryui-touch-punch' ), time(), true );
	wp_enqueue_script( 'scrollreveal' );
	wp_register_style( 'swipe-hive', get_template_directory_uri() . '/css/swipe-hive.css', time() );
}


