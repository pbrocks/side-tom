<?php
/**
 *
 */
get_header();
?>
	<!-- <div id="middle" class="clearfix"> -->

	<?php
	// Get the header image
	$hi = getHeaderImage();
	if ( $hi ) :
	?>

		<div id="pageHeadImage" class="" >
		<div class="inside" style="<?php echo 'background-image: url(' . $hi . ');'; ?>"></div>
	</div>
	<?php endif; ?>

	<div id="inner">
		<?php echo __FILE__ . ' line ' . __LINE__; ?>
	<div id="content" class="">

		<?php
		while ( have_posts() ) :
			the_post();
?>
		<div <?php post_class(); ?>>
		<div id="pageHead" >

			<h1><?php the_title(); ?></h1>
			<div class="meta clearfix">
				<span class="posted"><?php _e( 'Posted ', 'sidetrack' ); ?></span>
				<span class="author"><?php _e( 'by', 'sidetrack' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="date"><?php _e( 'on', 'sidetrack' ); ?> <?php the_time( 'M j, Y' ); ?></span>
				<span class="category"><?php _e( 'in', 'sidetrack' ); ?> <?php the_category( ', ' ); ?></span>
				<span class="commentCount">| <a href="<?php comments_link(); ?>"><?php comments_number( __( 'No Comments', 'sidetrack' ), __( 'One Comment', 'sidetrack' ), __( '% Comments', 'sidetrack' ) ); ?></a></span>
			</div>
		</div>
			<?php if ( get_theme_mod( 'sidetrackshow_featured_image' ) ) : ?>
				<?php
				the_post_thumbnail(
					'sidetrack_post_thumb_big', array(
						'class' => 'postThumb',
						'alt' => '' . get_the_title() . '',
						'title' => '' . get_the_title() . '',
					)
				);
?>
			<?php endif; ?>

			<?php the_content(); ?>

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="pagination clearfix">Pages: ',
					'after' => '</div>',
				)
			);
?>

		</div>

		<?php endwhile; ?>
	</div>
<?php get_footer(); ?>
