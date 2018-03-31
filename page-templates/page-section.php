<?php
/**
 * Template Name: Section Page
 */
get_header();
?>
	<div id="inner">
		<?php echo __FILE__ . ' line ' . __LINE__; ?>
		<div id="content" class="clearfix">
			<div class="page-title">
				<?php echo esc_html( get_the_title() ); ?>
			</div>
			<div id="pageHead" >
				<div class="inside">

				</div>
			</div>
			<?php
			while ( have_posts() ) :
				the_post();
			?>
			<div class="main-content">
			<?php
			if ( get_field( 'page_subhead_h2' ) ) {
				echo '<div class="page-subhead">';
				echo '<h2>' . get_field( 'page_subhead_h2' ) . '</h2>';
				echo '<h3>' . get_field( 'page_subhead_h3' ) . '</h3>';
				// echo '</div>';
			}
				?>
				<div <?php post_class( 'clearfix' ); ?>>
					<?php the_content(); ?>
				</div>
			</div>

				<div class="post-featured-image">
					<?php echo the_post_thumbnail( 'medium_large' ); ?>
				</div>
			</div>

				<div class="page-graphic">
				<?php

				if ( get_field( 'page_graphic' ) ) {
					echo '<div class="page-graphic-title">';
						echo '<h3>' . get_field( 'graphic_title' ) . '</h3>';
					echo '</div>';
				}
				?>
					<div class="page-graphic-image">
						<?php if ( get_field( 'page_graphic' ) ) : ?>
							<img src="<?php the_field( 'page_graphic' ); ?>" />
						<?php endif; ?>
					</div>
				</div>

				<div class="rotator">
					<?php
					if ( get_field( 'rotator_shortcode' ) ) {
						echo '<div class="rotator-title">';
						echo '<h3>' . get_field( 'rotator_title' ) . '</h3>';
						echo '</div>';
						echo '<div class="rotator-content">';
						echo '<div class="rotator-intro">';
						the_field( 'rotator_intro' );
						echo '</div>';
						echo '<div class="rotator-shortcode">';
						echo do_shortcode( get_field( 'rotator_shortcode' ) );
						echo '</div>';
						echo '</div>';
					}
					?>
				</div>

				<div class="benefits">
					<?php
					if ( get_field( 'left_content' ) ) {
						echo '<div class="benefits-title">';
						echo '<h3>' . get_field( 'benefits_title' ) . '</h3>';
						echo '</div>';
						echo '<div class="benefits-subtitle">';
						echo '<h3>' . get_field( 'benefits_subtitle' ) . '</h3>';
						echo '</div>';
						echo '<div class="benefits-content">';
						echo '<div class="subhead-left">';
						echo '<h4>' . get_field( 'subhead_left' ) . '</h4>';
						echo '<span class="left-content">';
						the_field( 'left_content' );
						echo '</span>';
						echo '</div>';
						echo '<div class="subhead-center">';
						echo '<h4>' . get_field( 'subhead_center' ) . '</h4>';
						echo '<span class="center-content">';
						the_field( 'center_content' );
						echo '</span>';
						echo '</div>';
						echo '<div class="subhead-right">';
						echo '<h4>' . get_field( 'subhead_right' ) . '</h4>';
						echo '<span class="right-content">';
						the_field( 'right_content' );
						echo '</span>';
						echo '</div>';
						echo '</div>';
					}
					?>
				</div>

				<div class="cta">
				<?php
				if ( get_field( 'cta_form' ) ) {
					echo '<div class="cta-form">';
					echo do_shortcode( get_field( 'cta_form' ) );
					echo '</div>';
					echo '<div class="call-to-action-head">';
					echo '<h3>' . get_field( 'call_to_action_head' ) . '</h3>';
				}
				?>

						<div class="cta-image">
							<?php if ( get_field( 'cta_image' ) ) : ?>
								<img src="<?php the_field( 'cta_image' ); ?>" />
							<?php
							endif;
?>
						</div>

				</div>
			</div>

			<?php endwhile; ?>

	</div>

<?php get_footer(); ?>
