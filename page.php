<?php
/**
 * Default Page template
 */
get_header();
?>
	<div id="inner">
		<?php echo __FILE__ . ' line ' . __LINE__; ?>
		<div id="content" class="clearfix">
			<div class="page-title"><?php echo esc_html( get_the_title() ); ?></div>

			<div id="pageHead" >
				<div class="inside">

				</div>
			</div>

			<?php
			while ( have_posts() ) :
				the_post();
			?>
				<div <?php post_class( 'clearfix' ); ?>>
					<?php the_content(); ?>
				</div>

			<?php endwhile; ?>

	</div>

<?php get_footer(); ?>
