<?php


add_shortcode( 'sidetrack-shortcode', 'sidetrack_swipe_hive4' );
function sidetrack_swipe_hive4() {
	wp_enqueue_style( 'swipe-hive' );
?>
	<section id="swipe-wrapper" class="skewed" ">
			<div class="layer bottom" style="background-color:pink">
				/Users/paul/Local Sites/memberlite/app/public/wp-content/themes/side-tom/functions/swipe-shortcode.php
				<?php echo get_template_directory_uri() . '/css/css-grid.css'; ?>
				<div class="swipe-wrap">
				</div>

				<!--         </div> -->
			</div>

		</section>
<?php
}

add_action( 'wp_enqueue_scripts', 'swipe_hive_scripts4' );

function swipe_hive_scripts4() {
	wp_register_script( 'scrollreveal', 'https://unpkg.com/scrollreveal/dist/scrollreveal.min.js', array(), time(), true );
	wp_enqueue_script( 'scrollreveal' );
	wp_register_style( 'swipe-hive', get_template_directory_uri() . '/css/swipe-hive.css', time() );
	wp_register_script( 'swipe-hive', get_template_directory_uri() . '/js/swipe-hive.js', array( 'jquery' ), time(), true );
	wp_enqueue_script( 'swipe-hive' );
}


