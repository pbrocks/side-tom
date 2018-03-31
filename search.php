<?php
/**
 *
 */
get_header();
?>
<div id="middle" class="clearfix">	
				 
	<div id="content" class="clearfix">
		<div id="pageHead">
			<h1><?php _e( 'Search Results', 'sidetrack' ); ?></h1>
		</div>
		
		<?php
		$c = 0;
		$post_count = $wp_query->post_count;
?>
	
		<?php
		while ( have_posts() ) :
			the_post();
?>
			<?php $c++; ?>				
			<div <?php post_class( 'post' ); ?> >																				
				<div class="inside">
					<h2><a href="<?php the_permalink(); ?>" rel="bookmark" ><?php the_title(); ?></a></h2>	
					<?php the_excerpt( '',true ); ?>
								
					<?php $project_notes = get_post_meta( $post->ID, '_sidetrack_notes_value', true ); ?>
					<?php echo wpautop( $project_notes ); ?>
				</div>																									
			</div>				
			
		<?php endwhile; ?>
		<?php get_template_part( 'part-pagination' ); ?>		    	
	
	</div>	
	</div>
	
<?php get_footer(); ?>
