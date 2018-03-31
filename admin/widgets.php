<?php

$sidetrack_theme = 'hivetrail';


/**
 * Define Widgetized Areas
 */
register_sidebar(
	array(
		'name' => 'Sidebar Top',
		'id' => 'sidebar-1',
		'description' => __( 'Left side margin top widget area.', 'sidetrack' ),
		'before_widget' => '<div id="%1$s" class="%2$s sidebarBox widgetBox">',
		'after_widget' => '</div>',
		'before_title' => '<span class="widgetTitle">',
		'after_title' => '</span>',
	)
);
register_sidebar(
	array(
		'name' => 'Sidebar Bottom',
		'id' => 'sidebar-2',
		'description' => __( 'Left side margin bottom widget area.', 'sidetrack' ),
		'before_widget' => '<div id="%1$s" class="%2$s sidebarBox widgetBox">',
		'after_widget' => '</div>',
		'before_title' => '<span class="widgetTitle">',
		'after_title' => '</span>',
	)
);
register_sidebar(
	array(
		'name' => 'Content Header Right',
		'id' => 'sidebar-3',
		'description' => __( 'Right side top of content widget area.', 'sidetrack' ),
		'before_widget' => '<div id="%1$s" class="%2$s sidebarBox widgetBox">',
		'after_widget' => '</div>',
		'before_title' => '<span class="widgetTitle">',
		'after_title' => '</span>',
	)
);
// register_sidebar(
// array(
// 'name' => 'Page Sidebar',
// 'id' => 'sidebar_pages',
// 'description' => __( 'Widget area for the sidebar on pages.', 'sidetrack' ),
// 'before_widget' => '<div id="%1$s" class="%2$s sidebarBox widgetBox">',
// 'after_widget' => '</div>',
// 'before_title' => '<span class="widgetTitle">',
// 'after_title' => '</span>',
// )
// );
// register_sidebar(
// array(
// 'name' => 'Home Page Sidebar',
// 'id' => 'sidebar_home',
// 'description' => __( 'Widget area for the home page sidebar.', 'sidetrack' ),
// 'before_widget' => '<div id="%1$s" class="%2$s sidebarBox widgetBox">',
// 'after_widget' => '</div>',
// 'before_title' => '<span class="widgetTitle">',
// 'after_title' => '</span>',
// )
// );
// register_sidebar(
// array(
// 'name' => 'Post Sidebar',
// 'id' => 'sidebar_posts',
// 'description' => __( 'Widget area for the sidebar on posts.', 'sidetrack' ),
// 'before_widget' => '<div id="%1$s" class="%2$s sidebarBox widgetBox">',
// 'after_widget' => '</div>',
// 'before_title' => '<span class="widgetTitle">',
// 'after_title' => '</span>',
// )
// );
// register_sidebar(
// array(
// 'name' => 'Project Sidebar',
// 'id' => 'sidebar_projects',
// 'description' => __( 'Widget area for the sidebar on projects.', 'sidetrack' ),
// 'before_widget' => '<div id="%1$s" class="%2$s sidebarBox widgetBox">',
// 'after_widget' => '</div>',
// 'before_title' => '<span class="widgetTitle">',
// 'after_title' => '</span>',
// )
// );
// register_sidebar(
// array(
// 'name' => 'Footer',
// 'id' => 'footer_default',
// 'description' => __( 'This is the default widget area for the footer. This will be displayed if the other footers have not been populated with widgets.', 'sidetrack' ),
// 'before_widget' => '<div id="%1$s" class="oneThird %2$s footerBox widgetBox">',
// 'after_widget' => '</div>',
// 'before_title' => '<span class="widgetTitle">',
// 'after_title' => '</span>',
// )
// );
// register_sidebar(
// array(
// 'name' => 'Home Page Footer',
// 'id' => 'footer_home',
// 'description' => __( 'Widget area for the footer on the home page.', 'sidetrack' ),
// 'before_widget' => '<div id="%1$s" class="oneThird %2$s footerBox widgetBox">',
// 'after_widget' => '</div>',
// 'before_title' => '<span class="widgetTitle">',
// 'after_title' => '</span>',
// )
// );
// register_sidebar(
// array(
// 'name' => 'Page Footer',
// 'id' => 'footer_pages',
// 'description' => __( 'Widget area for the footer on pages.', 'sidetrack' ),
// 'before_widget' => '<div id="%1$s" class="oneThird %2$s footerBox widgetBox">',
// 'after_widget' => '</div>',
// 'before_title' => '<span class="widgetTitle">',
// 'after_title' => '</span>',
// )
// );
// register_sidebar(
// array(
// 'name' => 'Post Footer',
// 'id' => 'footer_posts',
// 'description' => __( 'Widget area for the footer on posts.', 'sidetrack' ),
// 'before_widget' => '<div id="%1$s" class="oneThird %2$s footerBox widgetBox">',
// 'after_widget' => '</div>',
// 'before_title' => '<span class="widgetTitle">',
// 'after_title' => '</span>',
// )
// );
/* Allow widgets to use shortcodes */
add_filter( 'widget_text', 'do_shortcode' );



/**
 * Recent Posts
 */
class Sidetrack_Recent_Posts extends WP_Widget {


	function __construct() {

		global $sidetrack_theme;

		$widget_ops = array(
			'classname' => 'sidetrack_recent_posts',
			'description' => __( 'Display recent posts from any category.', 'sidetrack' ),
		);

		parent::__construct(
			'sidetrack_recent_posts', // Base ID
			$sidetrack_theme . ' ' . __( 'Recent Posts', 'sidetrack' ), // Name
			$widget_ops // Args
		);

	}

	function widget( $args, $instance ) {

		global $sidetrack_theme, $options;

		ob_start();
		extract( $args );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? 'Recent Posts' : $instance['title'] );
		if ( ! $number = (int) $instance['number'] ) {
			$number = 10;
		} else if ( $number < 1 ) {
			$number = 1;
		} else if ( $number > 10 ) {
			$number = 10;
		}

		$rp_cat = $instance['rp_cat'];

		$r = new WP_Query(
			array(
				'cat' => $rp_cat,
				'showposts' => $number,
				'nopaging' => 0,
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
			)
		);
		if ( $r->have_posts() ) :
?>				
			<?php echo $before_widget; ?>
			<?php echo $before_title . $title . $after_title; ?>			
		
			<ul class="widgetList">
				<?php
				while ( $r->have_posts() ) :
					$r->the_post();
?>
				<li class="clearfix">					
					<p class="title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>">
																		<?php
																		if ( get_the_title() ) {
																			the_title();
																		} else {
																			the_ID();
																		}
?>
 </a></p>
					<span class="meta"><?php the_time( get_option( 'date_format' ) ); ?> </span>
				</li>
				<?php endwhile; ?>
			</ul>
				
			<?php echo $after_widget; ?>
		
		
<?php
			wp_reset_query();
		endif;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['rp_cat'] = $new_instance['rp_cat'];

		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Recent Posts';
		if ( ! isset( $instance['number'] ) || ! $number = (int) $instance['number'] ) {
			$number = 5;
		}

		if ( isset( $instance['rp_cat'] ) ) :
			$rp_cat = $instance['rp_cat'];
		endif;

		if ( isset( $instance['show_post'] ) ) :
			$show_post = $instance['show_post'];
		endif;

		$pn_categories_obj = get_categories( 'hide_empty=0' );
		$pn_categories = array();
		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'sidetrack' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'rp_cat' ); ?>"><?php _e( 'Category', 'sidetrack' ); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id( 'rp_cat' ); ?>" name="<?php echo $this->get_field_name( 'rp_cat' ); ?>">
			<option value=""><?php _e( 'All', 'sidetrack' ); ?></option>
			<?php
			foreach ( $pn_categories_obj as $pn_cat ) {
				echo '<option value="' . $pn_cat->cat_ID . '" ' . selected( $pn_cat->cat_ID, $rp_cat ) . '>' . $pn_cat->cat_name . '</option>';
			}
			?>
		</select></p>	

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts:', 'sidetrack' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /><br />
		<small><?php _e( '10 max', 'sidetrack' ); ?></small></p>
<?php
	}
}

register_widget( 'Sidetrack_Recent_Posts' );


/*
//
// Flickr
// */class Sidetrack_Flickr extends WP_Widget {


	function __construct() {

		global $sidetrack_theme;

		$widget_ops = array(
			'classname' => 'widget_sidetrack_flickr',
			'description' => __( 'Display flickr photos.', 'sidetrack' ),
		);

		parent::__construct(
			'sidetrack_flickr', // Base ID
			$sidetrack_theme . ' ' . __( 'Flickr', 'sidetrack' ), // Name
			$widget_ops // Args
		);
	}

	function widget( $args, $instance ) {

			global $options;

				extract( $args );

				$title  = empty( $instance['title'] ) ? 'Flickr' : apply_filters( 'widget_title', $instance['title'] );
		$user   = $instance['user'];

		if ( ! $nr = (int) $instance['flickr_nr'] ) {
			$nr = 6;
		} else if ( $nr < 1 ) {
			$nr = 3;
		} else if ( $nr > 15 ) {
			$nr = 15;
		}

		?>
			<?php echo $before_widget; ?>
				<?php echo $before_title . $title . $after_title; ?>
				
				<div id="flickrBox" class="clearfix"></div>

				<script type="text/javascript">
					 //<![CDATA[
					jQuery(document).ready(function($){    			
						$('#flickrBox').jflickrfeed({
							limit: <?php echo $nr; ?>,
							qstrings: {
								id: '<?php echo $user; ?>'
							},
							itemTemplate:
							'<div class="flickrImage">' +
								'<a href="{{link}}" title="{{title}}">' +
									'<img src="{{image_s}}" alt="{{title}}" />' +
								'</a>' +
							'</div>'
						});
					});
					//]]>    			
				</script>
 
			<?php echo $after_widget; ?>
		<?php
	}

	function update( $new_instance, $old_instance ) {

			$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['user'] = strip_tags( $new_instance['user'] );
		$instance['flickr_nr'] = (int) $new_instance['flickr_nr'];

						  return $new_instance;
	}

	function form( $instance ) {

			global $options;

				$instance = wp_parse_args(
					(array) $instance, array(
						'title' => '',
						'user' => '',
						'flickr_nr' => '',
					)
				);
		$title = strip_tags( $instance['title'] );
		$user = $instance['user'];
		if ( ! $nr = (int) $instance['flickr_nr'] ) {
			$nr = 6;
		}
?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'sidetrack' ); ?>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'user' ); ?>"><?php _e( 'Flickr ID:', 'sidetrack' ); ?>
			<input class="widefat" id="<?php echo $this->get_field_id( 'user' ); ?>" name="<?php echo $this->get_field_name( 'user' ); ?>" type="text" value="<?php echo esc_attr( $user ); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'flickr_nr' ); ?>"><?php _e( 'Number of photos:', 'sidetrack' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'flickr_nr' ); ?>" name="<?php echo $this->get_field_name( 'flickr_nr' ); ?>" type="text" value="<?php echo $nr; ?>" size="3" /><br />
			<small><?php _e( '(15 max)' ); ?></small>
		</p>
		
<?php
	}

}

register_widget( 'Sidetrack_Flickr' );
