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
	

<!-- Notícias -->
<div class="home-noticias">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Blog</h1>
			</div>
		</div>
		<div class="row mt-4">
			<?php 
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$postArgs = array(
				'post_type' => 'post',
				'posts_per_page' => 12,
		  	'paged'          => $paged
			);
			$postLoop = new WP_Query( $postArgs );
		if ($postLoop->have_posts()) :
			while ( $postLoop->have_posts() ) : $postLoop->the_post(); ?>

			<div class="col-sm-6 col-md-4 mb-3">
				<div class="noticia-item">
					<a href="<?php the_permalink() ?>">
						<div class="imagem" style="background-image: url('<?php the_post_thumbnail_url() ?>');">
						</div>
						<h5><?php the_title() ?></h5>
					</a>
					<small><?php the_excerpt(); ?></small>
				</div>
			</div>
			<?php endwhile; wp_reset_query(); ?>
			<!-- pagination here -->
			<div class="pagination col-12">
				<?php if (function_exists("pagination")) {
		      pagination($postLoop->max_num_pages);
		    } ?>
		  </div>
		<?php endif;?>
		</div>
	</div>
</div>

<?php endwhile; endif ?>
<?php
get_footer();
