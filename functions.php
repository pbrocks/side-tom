<?php

// Enable translation
// Translations can be put in the /languages/ directory
load_theme_textdomain( 'sidetrack-studio', TEMPLATEPATH . '/languages' );

// Widgets
require_once( TEMPLATEPATH . '/admin/widgets.php' );

/**
 * Customizer
 */
require_once( TEMPLATEPATH . '/functions/sidetrack-customizer.php' );
require_once( TEMPLATEPATH . '/functions/sidetrack-functions.php' );

// Mobile device detection
if ( ! function_exists( 'mobile_user_agent_switch' ) ) {
	function is_mobile() {
		$device = '';

		if ( stristr( $_SERVER['HTTP_USER_AGENT'], 'ipad' ) ) {
			$device = 'ipad';
		} else if ( stristr( $_SERVER['HTTP_USER_AGENT'], 'iphone' ) || strstr( $_SERVER['HTTP_USER_AGENT'], 'iphone' ) ) {
			$device = 'iphone';
		} else if ( stristr( $_SERVER['HTTP_USER_AGENT'], 'blackberry' ) ) {
			$device = 'blackberry';
		} else if ( stristr( $_SERVER['HTTP_USER_AGENT'], 'android' ) ) {
			$device = 'android';
		}

		if ( $device ) {
			return $device;
		} return false; {
			return false;
		}
	}
}

// Disable Updates
function sidetrack_hidden_theme( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check/1.0/' ) ) {
		return $r; // Not a theme update request. Bail immediately.
	}
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}

add_filter( 'http_request_args', 'sidetrack_hidden_theme', 5, 2 );


// Add Browser to body class
add_filter( 'body_class', 'browser_body_class' );
function browser_body_class( $classes ) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if ( $is_lynx ) {
		$classes[] = 'lynx';
	} elseif ( $is_gecko ) {
		$classes[] = 'gecko';
	} elseif ( $is_opera ) {
		$classes[] = 'opera';
	} elseif ( $is_NS4 ) {
		$classes[] = 'ns4';
	} elseif ( $is_safari ) {
		$classes[] = 'safari';
	} elseif ( $is_chrome ) {
		$classes[] = 'chrome';
	} elseif ( $is_IE ) {
		$classes[] = 'ie';
	} else {
		$classes[] = 'unknown';
	}
	if ( $is_iphone ) {
		$classes[] = 'iphone';
	}
	return $classes;
}


/**
 * Theme Header
 */
add_action( 'wp_enqueue_scripts', 'sidetrack_scripts' );
function sidetrack_scripts() {
	wp_register_style( 'trail-style', get_stylesheet_uri(), false );
	wp_enqueue_style( 'trail-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', false );
	wp_enqueue_style( 'trail-font-awesome', '//use.fontawesome.com/releases/v5.0.6/js/all.js', false );
	if ( is_active_widget( false, '', 'sidetrack_flickr' ) ) :
		wp_enqueue_script( 'flickrfeed', get_bloginfo( 'template_url' ) . '/js/jflickrfeed.js', array( 'jquery' ), '0.8', true );
	endif;

	wp_enqueue_script( 'pageslide', get_bloginfo( 'template_url' ) . '/js/jquery.pageslide.min.js', array( 'jquery' ), '2.0', true );

	wp_enqueue_script( 'fitvids', get_bloginfo( 'template_url' ) . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'actual', get_bloginfo( 'template_url' ) . '/js/jquery.actual.min.js', array( 'jquery' ), '1.8.13', true );

	wp_enqueue_script( 'scrollto', get_bloginfo( 'template_url' ) . '/js/jquery.scrollTo.min.js', array( 'jquery' ), '1.4.6', true );

	wp_enqueue_script( 'trail-wait-for-images', get_bloginfo( 'template_url' ) . '/js/jquery.waitforimages.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'isotope', get_bloginfo( 'template_url' ) . '/js/jquery.isotope.min.js', array( 'jquery' ), '1.3.110525', true );
	wp_enqueue_script( 'beckett-wait-for-images', get_bloginfo( 'template_url' ) . '/js/jquery.waitforimages.min.js', array( 'jquery' ), '2.0.2', true );

	wp_enqueue_script( 'sidetrack_js', get_bloginfo( 'template_url' ) . '/js/sidetrack.js', array( 'jquery' ), '1.0', true );
}

add_action( 'wp_head', 'sidetrack_theme_head' );

function sidetrack_theme_head() {
	?>
<meta name="generator" content="
<?php
global $sidetrack_theme, $sidetrack_version;
echo $sidetrack_theme . ' ' . $sidetrack_version;
?>
" />

<style type="text/css" media="screen">

<?php if ( get_theme_mod( 'sidetrackaccent_color' ) ) : ?>
	blockquote, address {
		border-left: 5px solid <?php echo( get_theme_mod( 'sidetrackaccent_color' ) ); ?>;
	}
	#filterNav .selected, #filterNav a.selected:hover {
		border-bottom: 3px solid <?php echo( get_theme_mod( 'sidetrackaccent_color' ) ); ?>;
	}
	#content .project.small .inside{
		background-color: <?php echo( get_theme_mod( 'sidetrackaccent_color' ) ); ?> !important;
	}
	.home #slideshowNav a.active {
		background-color: <?php echo( get_theme_mod( 'sidetrackaccent_color' ) ); ?> !important;
	}
	input[type="submit"] {
		background-color: <?php echo( get_theme_mod( 'sidetrackaccent_color' ) ); ?> !important;
	}
<?php endif; ?>

<?php if ( get_theme_mod( 'sidetrackheader_color' ) ) : ?>
	#header, #pageslide, #mainNav ul ul {
		background-color: <?php echo( get_theme_mod( 'sidetrackheader_color' ) ); ?>;
	}
<?php endif; ?>

<?php
if ( get_theme_mod( 'sidetrackmenu_color' ) ) :
?>
#slideNav .mainNav li a, #mainNav ul a, #mainNav ul li.sfHover ul a, .menuToggle::before, .closeBtn::before, ul li.menu-item-has-children::after, ul .page-item-has-children::after { color: <?php echo( get_theme_mod( 'sidetrackmenu_color' ) ); ?> !important;	}<?php endif; ?>

<?php if ( get_theme_mod( 'sidetrackmenu_active_color' ) ) : ?>
	#mainNav ul li.current a,
	#mainNav ul li.current-cat a,
	#mainNav ul li.current_page_item a,
	#mainNav ul li.current-menu-item a,
	#mainNav ul li.current-post-ancestor a,
	.single-post #mainNav ul li.current_page_parent a,
	#mainNav ul li.current-category-parent a,
	#mainNav ul li.current-category-ancestor a,
	#mainNav ul li.current-portfolio-ancestor a,
	#mainNav ul li.current-projects-ancestor a {
		color: <?php echo( get_theme_mod( 'sidetrackmenu_active_color' ) ); ?> !important;
	}
	#slideNav .mainNav li a:hover,
	#mainNav ul li.sfHover a,
	#mainNav ul li a:hover,
	#mainNav ul li:hover {
		color: <?php echo( get_theme_mod( 'sidetrackmenu_active_color' ) ); ?> !important;
	}
	#mainNav ul li.sfHover ul a:hover { color: <?php echo( get_theme_mod( 'sidetrackmenu_active_color' ) ); ?> !important;}
<?php endif; ?>

<?php
if ( get_theme_mod( 'sidetracklink_color' ) ) :
?>
a { color: <?php echo( get_theme_mod( 'sidetracklink_color' ) ); ?>;}<?php endif; ?>

<?php
if ( get_theme_mod( 'sidetracklink_hover_color' ) ) :
?>
a:hover {color: <?php echo( get_theme_mod( 'sidetracklink_hover_color' ) ); ?>;}<?php endif; ?>

<?php
if ( is_archive() ) :
?>
 html {height: 101%;} <?php endif; ?>

<?php echo( get_theme_mod( 'sidetrackcustom_css' ) ); ?>

</style>

<!--[if IE 8]>
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/ie8.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<?php echo "\n" . get_theme_mod( 'sidetrack_analytics' ) . "\n"; ?>

<?php
}

add_action( 'init', 'remheadlink' );
function remheadlink() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
}

/**
 * Theme Header Theme Footer
 */
add_action( 'wp_footer', 'sidetrack_footer' );

function sidetrack_footer() {
	wp_reset_query();
	global $wp_query;
	global $post;
}


/**
 * Theme Header Remove
 * Theme Header #more from more-link
 */
function sidetrack_remove( $content ) {
	global $id;
	return str_replace( '#more-' . $id . '"', '"', $content );
}
add_filter( 'the_content', 'sidetrack_remove' );


/**
 * Theme Header Custom Excerpt
 */
function excerpt_ellipsis( $text ) {
	return str_replace( '[...]', '...', $text );
}
add_filter( 'the_excerpt', 'excerpt_ellipsis' );


/**
 * Theme Header Add Excerpt Support for Pages
 */
add_post_type_support( 'page', 'excerpt' );


/**
 * Theme Header Get Meta Box Value
 */
function get_meta_box_vlaue( $m ) {
	global $wp_query;
	global $post;
	$meta_box_value = get_post_meta( $post->ID, $m, true );
	return $meta_box_value;
}

/**
 * Theme Header Pagination Styles
 */
add_action( 'wp_print_styles', 'sidetrack_deregister_styles', 100 );
function sidetrack_deregister_styles() {
	wp_deregister_style( 'wp-pagenavi' );
}
remove_action( 'wp_head', 'pagenavi_css' );
remove_action( 'wp_print_styles', 'pagenavi_stylesheets' );


/**
 * Theme Header Navigation Menus
 */
add_theme_support( 'menus' );
register_nav_menu( 'main', 'Main Navigation Menu' );
register_nav_menu( 'top', 'Top Auxiliary Menu' );

function default_nav() {
	echo '<ul class="sf-menu mainNav clearfix" >';
		wp_list_pages( 'sort_column=menu_order&title_li=' );
	echo '</ul>';
}

/**
 * Theme Header Feature Images (Post Thumbnails)
 */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100, true );
add_image_size( 'sidetrack_post_thumb', 570, 400, true );
add_image_size( 'sidetrack_post_thumb_big', 1000, 9999, true );
add_image_size( 'sidetrack_project_thumb', 570, 400, true );

/**
 * Theme Header Custom More Link
 */
function more_link() {
	global $post;
	$more_link = '<p class="moreLink"><a href="' . get_permalink() . '" title="' . get_the_title() . '">';
	$more_link .= '<span>' . __( 'Read More', 'sidetrack-studio' ) . '</span>';
	$more_link .= '</a></p>';
	echo $more_link;
}


/**
 * Theme Header Custom Post Types and Custom Taxonamies
 */
function register_projects() {

	$labels = array(
		'name' => __( 'Projects' ),
		'singular_name' => __( 'Project' ),
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add New Project' ),
		'edit' => __( 'Edit' ),
		'edit_item' => __( 'Edit Project' ),
		'new_item' => __( 'New Project' ),
		'view' => __( 'View Project' ),
		'view_item' => __( 'View Project' ),
		'search_items' => __( 'Search Projects' ),
		'not_found' => __( 'No projects found' ),
		'not_found_in_trash' => __( 'No projects found in Trash' ),
		'parent' => __( 'Parent Project' ),
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'menu_icon' => get_template_directory_uri() . '/images/blue-folder-stand.png',
		'query_var' => true,
		'rewrite' => array(
			'slug' => 'project',
			'hierarchical' => true,
			'with_front' => false,
		),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'excerpt' ),
	);

	// register_post_type( 'project' , $args );
}

// Add Portfolio  & Thumbnail to Admin Listing
// add_action( 'manage_project_posts_custom_column' , 'custom_project_column', 10, 2 );
function set_project_columns( $columns ) {
	return array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'thumbnail' => __( 'Thumbnail' ),
		'skill' => __( 'Skill' ),
		'author' => __( 'Author' ),
		'date' => __( 'Date' ),
	);
}
// add_filter( 'manage_project_posts_columns' , 'set_project_columns' );
function set_custom_edit_project_columns( $columns ) {
	return $columns
		 + array(
			 'skill' => __( 'Skill' ),
		 );
		 + array(
			 'thumbnail' => __( 'Thumbnail' ),
		 );
}

function custom_project_column( $column, $post_id ) {
	global $post;
	switch ( $column ) {
		case 'skill':
			$terms = get_the_term_list( $post_id, 'skill', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				echo 'Unable to get skill(s)';
			}
			break;
		case 'thumbnail':
			$thumbnail = get_the_post_thumbnail( $post->ID, array( 70, 70 ) );
			if ( is_string( $thumbnail ) ) {
				echo $thumbnail;
			} else {
				echo 'Unable to get thumbnail(s)';
			}
			break;
	}
}

function register_skills() {
	$labels = array(
		'name' => __( 'Skills' ),
		'singular_name' => __( 'Skill' ),
		'search_items' => __( 'Search Skills' ),
		'all_items' => __( 'All Skills' ),
		'parent_item' => __( 'Parent Skill' ),
		'parent_item_colon' => __( 'Parent Skill:' ),
		'edit_item' => __( 'Edit Skill' ),
		'update_item' => __( 'Update Skill' ),
		'add_new_item' => __( 'Add New Skill' ),
		'new_item_name' => __( 'New Skill Name' ),
	);

	register_taxonomy(
		'skill', 'project', array(
			'hierarchical' => false,
			'labels' => $labels,
		)
	);
}

// Slide post type
function register_slides() {
	register_post_type(
		'slide',
		array(
			'labels' => array(
				'name' => __( 'Slides', 'sidetrack-studio' ),
				'menu_name' => __( 'Slides', 'sidetrack-studio' ),
				'singular_name' => __( 'Slide', 'sidetrack-studio' ),
				'all_items' => __( 'All Slides', 'sidetrack-studio' ),
				'add_new' => __( 'Add New', 'sidetrack-studio' ),
				'add_new_item' => __( 'Add New Slide', 'sidetrack-studio' ),
				'edit_item' => __( 'Edit Slide', 'sidetrack-studio' ),
				'new_item' => __( 'New Slide', 'sidetrack-studio' ),
				'view_item' => __( 'View Slide', 'sidetrack-studio' ),
				'search_items' => __( 'Search Slides', 'sidetrack-studio' ),
				'not_found' => __( 'No slides found', 'sidetrack-studio' ),
				'not_found_in_trash' => __( 'No slides found in Trash', 'sidetrack-studio' ),
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'menu_icon' => get_template_directory_uri() . '/images/image-empty.png',
			'show_in_menu' => true,
			'show_in_nav_menus' => false,
			'menu_position ' => 20,
			'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'hierarchical' => false,
			'has_archive' => true,
			'rewrite' => 'slide',
		)
	);
}

function custom_flush_rules() {
	// defines the post type so the rules can be flushed.
	register_slides();
	// register_projects();
	register_skills();
	// and flush the rules.
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'custom_flush_rules' );
// add_action( 'init', 'register_projects' );
add_action( 'init', 'register_skills' );
add_action( 'init', 'register_slides' );

// List custom post type taxonomies
function sidetrack_get_terms( $id = '' ) {
	global $post;

	if ( empty( $id ) ) {
		$id = $post->ID;
	}

	if ( ! empty( $id ) ) {
		$post_taxonomies = array();
		$post_type = get_post_type( $id );
		$taxonomies = get_object_taxonomies( $post_type, 'names' );

		foreach ( $taxonomies as $taxonomy ) {
			$term_links = array();
			$terms = get_the_terms( $id, $taxonomy );

			if ( is_wp_error( $terms ) ) {
				return $terms;
			}

			if ( $terms ) {
				foreach ( $terms as $term ) {
					$link = get_term_link( $term, $taxonomy );
					if ( is_wp_error( $link ) ) {
						return $link;
					}
					$term_links[] = '<li><span><a href="' . $link . '">' . $term->name . '</a></span></li>';
				}
			}

			$term_links = apply_filters( "term_links-$taxonomy", $term_links );
			$post_terms[ $taxonomy ] = $term_links;
		}
		return $post_terms;
	} else {
		return false;
	}
}

function sidetrack_get_terms_list( $id = '', $echo = true ) {
	global $post;

	if ( empty( $id ) ) {
		$id = $post->ID;
	}

	if ( ! empty( $id ) ) {
		$my_terms = sidetrack_get_terms( $id );
		if ( $my_terms ) {
			$my_taxonomies = array();
			foreach ( $my_terms as $taxonomy => $terms ) {
				$my_taxonomy = get_taxonomy( $taxonomy );
				if ( ! empty( $terms ) ) {
					$my_taxonomies[] = implode( $terms );
				}
			}

			if ( ! empty( $my_taxonomies ) ) {
				$output = '';
				foreach ( $my_taxonomies as $my_taxonomy ) {
					$output .= $my_taxonomy . "\n";
				}
			}

			if ( $echo )
			if ( isset( $output ) ) {
				echo $output;
			} else if ( isset( $output ) ) {
				return $output;
			}
		} else {
			return;
		}
	} else {
		return false;
	}
}

/**
 * Theme Header Get Header Image
 */
function getHeaderImage( $id = '' ) {
	global $wp_query;
	global $post;
	$id = ( $id ) ? $id : $post->ID;
	$header_background_img = wp_get_attachment_image_src( get_post_meta( $id, '_sidetrack_header_background_image', true ), 'full' );
	$header_background_img = $header_background_img[0];
	return $header_background_img;
}



/**
 * Theme Header Comments
 */
function sidetrack_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li id="li-comment-<?php comment_ID(); ?>">

		<div class="comment <?php echo get_comment_type(); ?>" id="comment-<?php comment_ID(); ?>">

			<?php echo get_avatar( $comment, '70', get_bloginfo( 'template_url' ) . '/images/default_avatar.png' ); ?>

				  <h5><?php comment_author_link(); ?></h5>
			<span class="date"><?php comment_date(); ?></span>

			<?php if ( $comment->comment_approved == '0' ) : ?>
				<p><span class="message"><?php _e( 'Your comment is awaiting moderation.', 'sidetrack-studio' ); ?></span></p>
			<?php endif; ?>

			<?php comment_text(); ?>

			<?php
			if ( get_comment_type() != 'trackback' ) {
				comment_reply_link(
					array_merge(
						$args, array(
							'add_below' => 'comment',
							'reply_text' => '<span>' . __( 'Reply', 'sidetrack-studio' ) . '</span>',
							'login_text' => '<span>' . __( 'Log in to reply', 'sidetrack-studio' ) . '</span>',
							'depth' => $depth,
							'max_depth' => $args['max_depth'],
						)
					)
				);
			}

			?>

		</div><!-- end comment -->

<?php
}

function sidetrack_pings( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
		<li class="comment" id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
<?php
}


/**
 * Theme Header Pagination function // http://goo.gl/njhZ
 */
function kriesi_pagination( $pages = '', $range = 2 ) {
	 $showitems = ( $range * 2 ) + 1;

	 global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}

	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo "<div class='pagination clearfix'><div class='inside'>";
		if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( 1 ) . "'>&laquo;</a>";
		}
		if ( $paged > 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo;</a>";
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? "<span class='current'>" . $i . '</span>' : "<a href='" . get_pagenum_link( $i ) . "' class='inactive' >" . $i . '</a>';
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $paged + 1 ) . "'>&rsaquo;</a>";
		}
		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $pages ) . "'>&raquo;</a>";
		}
		echo "</div></div>\n";
	}
}

/**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
define( 'ACF_EARLY_ACCESS', '5' );
