<?php
/**
 *
 */
get_header();
?>

<div class="page-title"><?php echo _e( 'Page Not Found', 'sidetrack' ); ?></div>
	</div>		
		<div id="inner">
		<?php echo __FILE__ . ' line ' . __LINE__; ?>
		<div id="content" class="twoThirds clearfix">
	
			
			<p><?php _e( "Sorry, but what you're looking for could not be found.", 'sidetrack' ); ?></p> 
		</div>	
<?php
get_footer();
