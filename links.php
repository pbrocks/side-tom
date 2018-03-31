<?php
/**
 *
 */
get_header();
?>		
		<div id="inner" class="">			 
		<div id="content" class="">
			
			<div id="pageHead">
				<h1><?php _e( 'Links', 'sidetrack' ); ?></h1>
			</div>
						
				<div class="post">					
				<ul>
					<?php get_links_list(); ?>
				</ul>				
			</div>						    	
		</div>
		</div>			
		</div>
<?php get_footer(); ?>
