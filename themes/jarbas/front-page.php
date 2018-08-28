<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jarbas_Vasconcelos
 */

get_header();
?>


	<!-- 	Destaque Principal -->
	<?php get_template_part( 'template-parts/home', 'hero' ); ?>

<div class="home-sobre">
	<div class="container">
		<div class="row">
			<div class="col-md-8 align-self-center">
				<h1><?php the_field('titulo_biografia') ?></h1>
				<?php the_field('resumo_biografia') ?>
				<div class="home-sobre-cta">
					<a href="<?php echo home_url('/biografia') ?>"><button class="btn btn-light mb-3 mr-3">Leia a história de vida do candidato</button></a>
					<a href="<?php echo home_url('/porque') ?>"><h3>Por que votar <strong>434?</strong><i class="fas fa-arrow-right ml-2"></i></h3></a>
				</div>
				
			</div>
			<div class="col-md-4 align-senf-center">
				<h2><?php the_field('titulo_suplentes') ?></h2>
				<?php the_field('resumo_suplentes') ?>
			</div>
		</div>
	</div>
</div>

<!-- Propostas -->
<div class="home-propostas">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1>Conheça as nossas propostas para defender os interesses do povo paraense no Senado Federal</h1>
			</div>
			<div class="col-md-4 align-self-end">
				<a href="<?php echo home_url('/propostas') ?>"><h3 class="text-md-right mt-3">Ver todas as propostas<i class="fas fa-arrow-right ml-2"></i></h3></a>
			</div>
		</div>
		<div class="row mt-4">

			<?php 
			$args = array(
				'post_type' => 'propostas',
				'posts_per_page' => 3,
				'orderby' => 'rand');
			$loop = new WP_Query( $args );
			if ($loop->have_posts()) :
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<div class="col-md-4">
				<div class="proposta-item">
					<h5><?php the_title() ?></h5>
				</div>
			</div>

			<?php endwhile; endif?>

			<script>
				$( document ).ready(function() {
					var propostas = $('.proposta-item');
					var maxHeight = 0;
					propostas.each(function(i) {
						var elHeight = $(propostas[i]).height();
						if (elHeight >= maxHeight) {
							maxHeight = elHeight
						}
					})
					propostas.height(maxHeight);
				});
			</script>

		</div>
	</div>
</div>
<!-- Notícias -->
<div class="home-noticias">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<h1>Notícias</h1>
			</div>
			<div class="col-md-7 align-self-end">
				<a href="<?php echo home_url('/noticias') ?>"><h3 class="text-md-right mt-3">Ver todas as notícias<i class="fas fa-arrow-right ml-2"></i></h3></a>
			</div>
		</div>
		<div class="row mt-4">
			<?php 
			$postArgs = array(
				'post_type' => 'post',
				'posts_per_page' => 2
			);
			$postLoop = new WP_Query( $postArgs );
			$noticiaCount = 0;
			if ($postLoop->have_posts()) :
			while ( $postLoop->have_posts() ) : $postLoop->the_post(); $noticiaCount++;
			if ($noticiaCount == 1) {
			 	$noticiaClass = "col-md-8";
			 } else {
			 	$noticiaClass = "col-md-4";
			 } ?>

			<div class="<?php echo $noticiaClass ?>">
				<div class="noticia-item">
					<a href="<?php the_permalink() ?>">
						<div class="imagem" style="background-image: url('<?php the_post_thumbnail_url() ?>');">
						</div>
						<h5><?php the_title() ?></h5>
					</a>
					<small><?php the_excerpt(); ?></small>
				</div>
			</div>
			<?php endwhile; wp_reset_query(); endif?>
		</div>
	</div>
</div>
<!-- Agenda -->
<div class="home-agenda">
	<div class="container">
		<div class="row">

			<div class="col-md-8">
				<div class="row">
					<div class="col-md-5">
						<h1>Agenda</h1>
					</div>
					<div class="col-md-7 align-self-end">
						<a href="<?php echo home_url('/agenda') ?>"><h3 class="text-md-right mt-3">Ver todos os eventos<i class="fas fa-arrow-right ml-2"></i></h3></a>
					</div>
				</div>
				<div class="row mt-4">
					<?php 
					$agendaArgs = array(
						'post_type' => 'eventos',
						'posts_per_page' => -1,
						'meta_key'			=> 'data',
						'orderby'			=> 'meta_value',
						'order'				=> 'ASC'
					);
					$agendaLoop = new WP_Query( $agendaArgs );
					$agendaCount = 0;
					if ($agendaLoop->have_posts()) :
					while ( $agendaLoop->have_posts() ) : $agendaLoop->the_post();?>
					
					<?php 
					$dtime = DateTime::createFromFormat("d/m", get_field('data'));
					$eventTime = $dtime->getTimestamp();
					$now =  new DateTime('now');
					if ($eventTime >= $now->getTimestamp() && $agendaCount < 4): ?>
						<div class="col-6 col-md-3">
							<a href="<?php the_permalink(); ?>">
								<div class="agenda-item">
									<?php if (get_field('data')): ?>
										<div class="data"><?php the_field('data'); ?></div>
									<?php endif ?>
									<?php if (get_field('hora')): ?>
										<div class="hora">ÀS <?php the_field('hora'); ?></div>
									<?php endif ?>
									<div class="evento"><?php the_title(); ?></div>
								</div>
							</a>
						</div>
					<?php $agendaCount++; endif ?>
					<?php endwhile; wp_reset_query(); endif?>
				</div>
			</div>

			<div class="col-md-4">
				<div class="newsletter">
					<h2>Assine nossa newsletter</h2>
					<?php echo do_shortcode('[contact-form-7 id="72" title="Inscrever na Newsletter"]') ?>
				</div>
			</div>

		</div>
	</div>
</div>

<?php
get_footer();
