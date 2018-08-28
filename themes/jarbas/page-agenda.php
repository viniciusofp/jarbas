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
<div class="home-agenda">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Agenda</h1>
			</div>
		</div>
		<div class="row mt-4">
			<?php 

			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$postArgs = array(
				'post_type' => 'eventos',
				'posts_per_page' => -1,
		  	'paged'          => $paged,
				'meta_key'			=> 'data',
				'orderby'			=> 'meta_value',
				'order'				=> 'ASC'
			);
			$eventsLoop = new WP_Query( $postArgs );
		if ($eventsLoop->have_posts()) :
			while ( $eventsLoop->have_posts() ) : $eventsLoop->the_post();
			$dtime = DateTime::createFromFormat("d/m", get_field('data'));
			$eventTime = $dtime->getTimestamp();
			$now =  new DateTime('now');?>

			<?php if ($eventTime >= $now->getTimestamp()):
				$eventClass = '';
				$eventAttr = '';
			else:
				$eventClass = 'past';
				$eventAttr = 'style="order:9"';
			endif ?>

			<div class="col-6 col-md-3" <?php echo $eventAttr ?>>
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
			<!-- pagination here -->
			<div class="pagination col-12" style="order:99">
				<?php if (function_exists("pagination")) {
		      pagination($eventsLoop->max_num_pages);
		    } ?>
		  </div>
		<?php endif;?>
		</div>
	</div>
</div>

<?php endwhile; endif ?>
<?php
get_footer();
