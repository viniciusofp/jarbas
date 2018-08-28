<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jarbas_Vasconcelos
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png" sizes="16x16" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.bundle.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<div class="top-row">
		<div class="container">
			<div class="row">
				<div class="col-auto ml-auto">
					<?php get_template_part('template-parts/social-media') ?>		
				</div>
			</div>
		</div>
	
	</div>

	<nav class="navbar navbar-expand-lg navbar-dark">
		<div class="container">
		 <a class="navbar-brand" href="<?php echo home_url() ?>">
		 	<img srcset="<?php echo get_template_directory_uri(); ?>/img/brand.png 1x,
		 	<?php echo get_template_directory_uri(); ?>/img/brand.png 2x" alt="">
		 </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

			<?php
				wp_nav_menu( array(
					'theme_location'    => 'menu-1',
					'depth'             => 1,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'bs-example-navbar-collapse-1',
					'menu_class'        => 'nav navbar-nav ml-auto',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				) );
			?>
		</div>
		 
	</nav>
	<div id="content" class="site-content">
