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
	
<div class="page-biografia">
	<div class="page-container container">
		<div class="row">
			<div class="col-12 col-md-8 mb-3">
				<h1><?php the_title() ?></h1>
				<div class="biografia-content">
					<?php the_content() ?>	
				</div>
				<button class="expand btn btn-orange mt-3">Expandir</button>
			</div>
			<div class="col-md-4">
				<a href="">
					<a href="<?php echo home_url('/porque') ?>"><h3 class="pq">Por que votar <strong>434</strong>?</h3></a>
				</a>
				<div class="suplentes sticky-top">
					<h3><?php the_field('suplentes_titulo') ?></h3>
					<p> <?php the_field('suplentes_resumo') ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		var bioH =  $('.biografia-content').height()
		var firstP = $('.biografia-content p:first-child').outerHeight()
		var secondP = $('.biografia-content p:nth-child(2').outerHeight()
		$('.biografia-content').css('height', firstP + secondP + 32 + 'px')
		$('.expand').click(function() {
			$('.biografia-content').css('height', bioH + 'px')
			$(this).remove();
		})
	})
</script>

<?php endwhile; endif ?>
<?php
get_footer();
