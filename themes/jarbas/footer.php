<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jarbas_Vasconcelos
 */

?>

	</div><!-- #content -->

	<footer class="container-fluid site-footer">
		<div class="row">
			<div class="col-12">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
			</div>
			<div class="col-12 text-center">
				<?php get_template_part('template-parts/social-media') ?>	
			</div>
		</div>
		<div class="site-info">
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
