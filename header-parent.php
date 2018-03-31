<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php bloginfo( 'name' ); ?> <?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php if ( get_theme_mod( 'sidetrack_favicon' ) ) : ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod( 'sidetrack_favicon' ); ?>" />
	<?php endif; ?>

	<?php
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );}
?>

	<?php wp_head(); ?>


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
				<?php $logoHeadTag = (is_front_page()) ? 'h1' : 'h3'; ?>
				<?php $ttrust_logo = get_theme_mod( 'sidetrack_logo' ); ?>

				<div id="logo">
				<?php if ( $ttrust_logo ) : ?>
					<<?php echo $logoHeadTag; ?> class="logo"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo esc_url( $ttrust_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></<?php echo $logoHeadTag; ?>>
				<?php else : ?>
					<<?php echo $logoHeadTag; ?>><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></<?php echo $logoHeadTag; ?>>
				<?php endif; ?>
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
				</div>

				<a href="#slideNav" class="menuToggle"></a>

				<?php get_sidebar(); ?>

			</div>
		</div>
	</div>

