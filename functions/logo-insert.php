<?php
$logoHeadTag = (is_front_page()) ? 'h1' : 'h3'; ?>
<?php

$sidetrack_logo = get_theme_mod( 'sidetracklogo' );
$sidetrack_mobile_logo = get_theme_mod( 'sidetrack_mobile_logo' );

if ( is_mobile() ) {
	$sidetrack_logo = $sidetrack_mobile_logo;
}

?>

<div id="logo">

<?php if ( $sidetrack_logo ) : ?>

<<?php echo $logoHeadTag; ?> class="logo"><a href="<?php bloginfo( 'url' ); ?>"><img src="

	<?php echo esc_url( $sidetrack_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></

	<?php echo $logoHeadTag; ?>>

<?php else : ?>

<<?php echo $logoHeadTag; ?>><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a>
</<?php echo $logoHeadTag; ?>>

<?php endif; ?>

</div>
