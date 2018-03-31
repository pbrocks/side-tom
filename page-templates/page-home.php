<?php
/**
 * Template Name: Home
 */
get_header( 'home' );
?>

<div id="middle" class="clearfix">
		<?php echo __FILE__ . ' line ' . __LINE__; ?>

	<div id="content" class="full">	
		<?php
		$args = array(
			'ignore_sticky_posts' => 1,
			'posts_per_page' => 20,
			'post_type' => 'slide',
		);
		$slides = new WP_Query( $args );
		?>

		<?php if ( $slides->post_count > 0 ) : ?>
			<div class="slideshow">			
				<ul class="slides">
					<?php
					$i = 1;
					while ( $slides->have_posts() ) :
						$slides->the_post();
						?>
						<?php
						// Get slide options
						$slide_background_img = wp_get_attachment_image_src( get_post_meta( $post->ID, '_sidetrack_slide_background_image', true ), 'full' );
						$slide_background_img = $slide_background_img[0];

						$s_styles = '';
						$s_class = '';
						if ( $slide_background_img ) {
							$s_styles .= 'background-image: url(' . $slide_background_img . ');';
						}
						?>
						<li id="slide<?php echo $i; ?>" <?php post_class( $s_class ); ?> style="<?php echo $s_styles; ?>">								
							<div class="details">
								<div class="box">
									<div class="inside">
										<div class="text">
											<?php the_content(); ?>								
										</div>
									</div>
								</div>					
							</div>									
						</li>				
						<?php
						$i++;
					endwhile;
					?>
				</ul>				
			</div>

			<div id="slideshowNav" 
			<?php
			if ( $i <= 2 ) {
				echo 'class="inactive"';}
				?>
				>

				<?php $k = 1; while ( $k < $i ) : ?>
				<a id="slideshowNavBtn<?php echo $k; ?>" 
					<?php
					if ( $k == 1 ) {
						echo 'class="active"';}
						?>
						href="#slide<?php echo $k; ?>"></a>		
						<?php
						$k++;
					endwhile;
					?>

				</div>

			<?php endif; ?>
		</div>

		<?php
		get_footer();
