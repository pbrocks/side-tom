<?php
/**
 *
 */
get_header();
?>

	<?php $blog_page_id = get_option( 'page_for_posts' ); ?>
	<div id="content-header">

	</div>

	<div id="inner">
		<?php echo __FILE__ . ' line ' . __LINE__; ?>
		<div id="content" class="">
			<?php if ( ! is_front_page() ) : ?>
			<div id="pageHead">
				<?php $blog_page_id = get_option( 'page_for_posts' ); ?>
				<?php $blog_page = get_page( $blog_page_id ); ?>
				<h1><?php echo $blog_page->post_title; ?></h1>
				<?php $page_description = get_post_meta( $blog_page_id, '_sidetrack_page_description_value', true ); ?>
				<?php if ( $page_description ) : ?>
					<p><?php echo $page_description; ?></p>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="posts clearfix">			
				<?php
				while ( have_posts() ) :
					the_post();
					 get_template_part( 'part-post' );
						?>
	
				<?php endwhile; ?>	
				<?php get_template_part( 'part-pagination' ); ?>
			
	</div>	
</div>
<?php get_footer(); ?>
