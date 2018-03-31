<?php
/**
 * Template Name: Contact
 */
get_header();
?>
	
	<!-- <div id="middle" class="clearfix">				 -->
		
		<?php if ( get_theme_mod( 'sidetrackmap_address' ) ) : ?>			
		<div id="pageHeadImage" class="" >			
			<div id="googleMap"></div>								
		</div>
		<?php endif; ?>		
		<?php
			require_once( TEMPLATEPATH . '/functions/logo-insert.php' );
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
	<?php
	if ( get_theme_mod( 'sidetrackmap_address' ) ) :
		include( TEMPLATEPATH . '/js/google_map.php' );
	endif;
	?>
<?php get_footer(); ?>
