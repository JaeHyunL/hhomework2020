<?php
/**
 * Header template
 * Displays all of the head element
 * @package New-Estate
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open() ): ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>
	<?php 
		//topbar
		//template-hooks.php L6 to L53
		do_action( 'new_estate_topbar' );

		//Logo & Navigational
		//template-hooks.php L66 to L104
		do_action( 'new_estate_header' ); 
	?>	
<div class="content-full">