<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jarbas_Vasconcelos
 */

get_header();
?>
<?php if (have_posts()): while(have_posts()): the_post(); ?>
	
<div class="page-contato">
	<div class="page-container container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 col-lg-8 text-center mb-3">
				<h1><?php the_title() ?></h1>
				<?php the_content() ?>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 col-lg-8">
				<?php echo do_shortcode('[contact-form-7 id="74" title="Contato"]') ?>	
			</div>
		</div>
	</div>
</div>
	

<?php endwhile; endif ?>
<?php
get_footer();
