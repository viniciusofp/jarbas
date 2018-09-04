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
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:title" content="<?php the_title(); ?> - Jarbas Senador 434" />
	<?php if (has_post_thumbnail()): ?>
		<meta property="og:image" content="<?php the_post_thumbnail_url() ?>" />
	<?php else: ?>
		<meta property="og:image" content="<?php echo get_template_directory_uri() ?>/img/hero.png" />
	<?php endif ?>
	<?php wp_head(); ?>
<!-- Tracking Code Sharp Spring -->
	<script type="text/javascript">
	    var _ss = _ss || [];
	    _ss.push(['_setDomain', 'https://koi-3QNEUU0UUA.marketingautomation.services/net']);
	    _ss.push(['_setAccount', 'KOI-41IBC1GA4O']);
	    _ss.push(['_trackPageView']);
	(function() {
	    var ss = document.createElement('script');
	    ss.type = 'text/javascript'; ss.async = true;
	    ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-3QNEUU0UUA.marketingautomation.services/client/ss.js?ver=1.1.1';
	    var scr = document.getElementsByTagName('script')[0];
	    scr.parentNode.insertBefore(ss, scr);
	})();
	</script>

	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(argument
	s)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,
	document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '475415489609347');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=475415489609347
	&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->
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
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-top-navbar-collapse-1" aria-controls="bs-top-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

			<?php
				wp_nav_menu( array(
					'theme_location'    => 'menu-1',
					'depth'             => 1,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'bs-top-navbar-collapse-1',
					'menu_class'        => 'nav navbar-nav ml-auto',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				) );
			?>
		</div>
		 
	</nav>
	<div id="content" class="site-content">
