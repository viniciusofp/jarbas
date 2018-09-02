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
$postID = get_the_ID();
?>
<?php if (have_posts()): while(have_posts()): the_post(); ?>
	

<div class="page-container container">
	<div class="row">
		<div class="post-content col-12 col-lg-8">
			<?php if (has_post_thumbnail()):
				the_post_thumbnail('full');
			endif ?>
			<h1><?php the_title() ?></h1>
			<p><small><?php the_date() ?></small></p>
			<?php the_content() ?>
		</div>
		<div class="post-sidebar col-12 col-lg-4">
			<div class="sticky-top">
				<h3>Outros posts</h3>
				<?php 
				$postArgs = array(
					'post_type' => 'post',
					'posts_per_page' => 4,
					'post__not_in' => array($postID),
					'orderby' => 'rand'
				);
				$postLoop = new WP_Query( $postArgs );
				if ($postLoop->have_posts()) :
					while ( $postLoop->have_posts() ) : $postLoop->the_post(); ?>
					<div class="row post-item">
						<div class="col-5">
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
						</div>
						<div class="col-7">
							<a href="<?php the_permalink() ?>"><h2><?php the_title(); ?></h2></a>
						</div>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</div>

<?php endwhile; endif ?>
<?php
get_footer();
