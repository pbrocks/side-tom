<?php $show_full_post = get_theme_mod( 'sidetrackshow_full_posts' ); ?>

<div <?php post_class(); ?>>		
	<div class="inside">
	<h2><a href="<?php the_permalink(); ?>" rel="bookmark" ><?php the_title(); ?></a></h2>
	<div class="meta clearfix">
					
		<span class="posted"><?php _e( 'Posted ', 'sidetrack' ); ?></span>					
		<span class="author"><?php _e( 'by', 'sidetrack' ); ?> <?php the_author_posts_link(); ?></span> 
		<span class="date"><?php _e( 'on', 'sidetrack' ); ?> <?php the_time( 'M j, Y' ); ?></span> 
		<span class="category"><?php _e( 'in', 'sidetrack' ); ?> <?php the_category( ', ' ); ?></span> 
		<span class="commentCount">| <a href="<?php comments_link(); ?>"><?php comments_number( __( 'No Comments', 'sidetrack' ), __( 'One Comment', 'sidetrack' ), __( '% Comments', 'sidetrack' ) ); ?></a></span>
		
	</div>
	
	<?php if ( $show_full_post && ! is_page_template( 'page-home.php' ) ) : ?>
		<?php the_content(); ?>		
	<?php else : ?>
		<?php if ( has_post_thumbnail() ) : ?>													
		<a href="<?php the_permalink(); ?>" rel="bookmark" >
										<?php
										the_post_thumbnail(
											'sidetrack_post_thumb_big', array(
												'class' => 'postThumb',
												'alt' => '' . get_the_title() . '',
												'title' => '' . get_the_title() . '',
											)
										);
?>
</a>		    	
		<?php endif; ?>
		<?php the_excerpt(); ?>
		<?php more_link(); ?>
	<?php endif; ?>												
	</div>
	
</div>
