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
	

<div class="page-container container">
	<div class="row">
		<div class="col-12">
			<h1><?php the_title() ?></h1>
			<?php the_content() ?>
		</div>
	</div>
</div>

<?php endwhile; endif ?>
<?php
get_footer();
