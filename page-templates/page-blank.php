<?php
/**
 * Template Name: Blank
 */
get_header();
?>
	<div id="inner">
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
