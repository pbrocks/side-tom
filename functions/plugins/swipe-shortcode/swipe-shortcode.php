<?php
/**
 * Plugin Name: Swipe Hive
 */

add_shortcode( 'sidetrack-swipe-hive', 'sidetrack_swipe_hive' );
function sidetrack_swipe_hive() {
?>

	<section id="swipe-wrapper" class="skewed">
		<div id="swipe-inner">
		<div class="layer bottom" style="">
			<div class="swipe-wrap">
				<div class="swipe-body">
					<h2>Swipe Left<br>
			Bottom Layer</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
		</div>

		<div class="layer top" style="">
			<div class="swipe-wrap">
				<div class="swipe-body">
					<h2>Swipe Right<br>
			Top Layer</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
		</div>
		</div>
		<div class="handle"></div>
	</section>
<?php
}

function sidetrack_swipe_hive1() {
	wp_enqueue_style( 'swipe-hive' );
?>
	<section id="swipe-wrapper" class="skewed">
		<!--       <div id="draggable"> -->
			<div class="layer bottom">
				<div class="swipe-wrap">
					<img src="<?php echo plugins_url( '/images/converged.png', __FILE__ ); ?>" alt="">
				</div>

				<!--         </div> -->
			</div>

			<div class="layer top">
				<div class="swipe-wrap">
					<img src="<?php echo plugins_url( '/images/hyperconverged.jpg', __FILE__ ); ?>" alt="">
				</div>
			</div>

			<div class="handle"></div>
		</section>
<?php
}

add_action( 'wp_enqueue_scripts', 'swipe_hive_scripts' );

function swipe_hive_scripts() {
	wp_register_script( 'scrollreveal', 'https://unpkg.com/scrollreveal/dist/scrollreveal.min.js', array(), time(), true );
	wp_enqueue_script( 'scrollreveal' );
	// wp_register_style( 'swipe-hive', plugins_url( '/css/swipe-hive.css',__FILE__ ), time() );
	wp_register_script( 'swipe-hive', plugins_url( '/js/swipe-hive.js',__FILE__ ), array(), time(), true );
	wp_enqueue_script( 'swipe-hive' );
	wp_register_style( 'swipe-hive', plugins_url( '/css/swipe-graphic.css',__FILE__ ), time() );
	wp_enqueue_style( 'swipe-hive' );
}


