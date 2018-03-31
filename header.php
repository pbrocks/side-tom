<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php bloginfo( 'name' ); ?> <?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php if ( get_theme_mod( 'sidetrackfavicon' ) ) : ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod( 'sidetrackfavicon' ); ?>" />
	<?php endif; ?>

	<?php
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );}
		?>

		<?php wp_head(); ?>

		<!-- <link rel="stylesheet" type="text/css" href=""> -->
	</head>

	<body <?php body_class(); ?> >

		<div id="slideNav">
			<a href="javascript:jQuery.pageslide.close()" class="closeBtn"></a>
			<div id="mobileNav">
				<?php
				wp_nav_menu(
					array(
						'menu_class' => 'mainNav',
						'theme_location' => 'main',
						'fallback_cb' => 'default_nav',
					)
				);
				?>
			</div>
		</div>

		<div id="container">
			<div id="header">
				<div class="hidden-scroll">
					<div class="inside clearfix">
						<div class="grid-wrapper">
							<div id="top-widget">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</div>
							<div id="mainNav" class="mainNav clearfix">
								<?php
								wp_nav_menu(
									array(
										'menu_class' => 'sf-menu',
										'theme_location' => 'main',
										'fallback_cb' => 'default_nav',
									)
								);
								?>
							</div><!-- #mainNav -->

							<a href="#slideNav" class="menuToggle"></a>
							<div id="header-sidebar">
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div><!-- #header-sidebar -->
						</div><!-- .inside.clearfix -->
					</div><!-- .grid-wrapper -->
				</div><!-- .hidden-scroll -->
			</div><!-- #header.grid-wrapper -->
			<div id="middle" class="clearfix">

			<div id="content-header">
				<?php
				require_once( TEMPLATEPATH . '/functions/logo-insert.php' );
				?>
				<div id="top-menu" class="sidebar-container" role="complementary">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div><!-- #top-menu -->
			</div>
