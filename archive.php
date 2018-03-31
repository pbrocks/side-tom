<?php
/**
 * Archive page
 */
get_header();
?>
	
		<div id="inner">					 
		<?php echo __FILE__ . ' line ' . __LINE__; ?>
		<div id="content" class="<?php echo $bw; ?>">
			
			<div id="pageHead">
				<?php
				global $post; if ( is_archive() && have_posts() ) :

					if ( is_category() ) :
					?>
						<h1><?php single_cat_title(); ?></h1>				
						<?php
						if ( strlen( category_description() ) > 0 ) {
							echo category_description();}
?>
					<?php elseif ( is_tag() ) : ?>
						<h1><?php single_tag_title(); ?></h1>
					<?php elseif ( is_day() ) : ?>
						<h1>Archive <?php the_time( 'M j, Y' ); ?></h1>
					<?php elseif ( is_month() ) : ?>
						<h1>Archive <?php the_time( 'F Y' ); ?></h1>
					<?php elseif ( is_year() ) : ?>
						<h1>Archive <?php the_time( 'Y' ); ?></h1>
					<?php elseif ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) : ?>
						<h1>Archive</h1>
					<?php endif; ?>

				<?php endif; ?>
			</div>
			
			<div class="posts clearfix">				
			<?php
			while ( have_posts() ) :
				the_post();
?>
			
					<?php get_template_part( 'part-post' ); ?>				
			<?php endwhile; ?>			
			<?php get_template_part( 'part-pagination' ); ?>
			</div>			    	
		</div>		
		</div>			
		</div>
		
<?php get_footer(); ?>
