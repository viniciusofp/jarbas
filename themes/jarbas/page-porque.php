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
	
<div class="page-porque">
	<div class="page-container container">
		<div class="row">
			<div class="col-12 col-lg-8 mb-3">
				<h1><?php the_title() ?></h1>
				<div class="porque-content">
					<?php the_content() ?>	
				</div>
			</div>
			<div class="col-lg-4">
				<div class="suplentes sticky-top">
					<p> <?php the_field('biografia_resumo') ?></p>
					<a href="<?php echo home_url('/biografia') ?>"><button class="btn btn-light">Leia a biografia do candidato</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="propostas" class="propostas-pq">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-12 mb-3">
				<h1>Conheça nossas propostas</h1>
			</div>
			<?php 
			$args = array(
				'post_type' => 'propostas',
				'posts_per_page' => -1,
				'orderby' => 'rand');
			$loop = new WP_Query( $args );
			if ($loop->have_posts()) :
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<div class="col-md-8">
				<div class="proposta-item">
					<p><strong><?php the_title() ?></strong><?php the_content() ?></p>

				</div>
			</div>

			<?php endwhile; endif?>		
		</div>
	</div>
</div>
	



<?php endwhile; endif ?>
<?php
get_footer();
