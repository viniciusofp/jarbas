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
	
<div class="single-evento container mt-3 home-agenda">
	<div class="row">
		<div class="col-12 col-md-auto">
			<div class="agenda-item">
				<?php if (get_field('data')): ?>
				<div class="data"><?php the_field('data'); ?></div>
				<?php endif ?>
				<?php if (get_field('hora')): ?>
					<div class="hora">ÀS <?php the_field('hora'); ?></div>
				<?php endif ?>
			</div>
			
		</div>
		<div class="col-12 col-md">
			<h1><?php the_title(); ?></h1>
			<h6><?php the_field('endereco') ?></h6>
			<?php the_content(); ?>
		</div>
	</div>
</div>

<!-- Notícias -->
<div class="home-agenda">
	<div class="container">
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
			$postArgs = array(
				'post_type' => 'eventos',
				'posts_per_page' => 8,
				'meta_key'			=> 'data',
				'orderby'			=> 'meta_value',
				'order'				=> 'DSC'
			);
			$eventsLoop = new WP_Query( $postArgs );
		if ($eventsLoop->have_posts()) :
			while ( $eventsLoop->have_posts() ) : $eventsLoop->the_post();
			$dtime = DateTime::createFromFormat("d/m", get_field('data'));
			$eventTime = $dtime->getTimestamp();
			$now =  new DateTime('now');?>

			<?php if ($eventTime >= $now->getTimestamp()):
				$eventClass = '';
			else:
				$eventClass = 'past';
			endif ?>

			<div class="col-6 col-md-3">
				<a href="<?php the_permalink(); ?>">
					<div class="agenda-item <?php echo $eventClass ?>">
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

			<?php endwhile; wp_reset_query(); ?>
		<?php endif;?>
		</div>
	</div>
</div>

<?php endwhile; endif ?>
<?php
get_footer();
