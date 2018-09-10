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
			<div class="social-share">
				<ul>
					<li><span><i class="fas fa-share"></i></span></li>
					<li><a class="popup-share facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>"><i class="fab fa-facebook-f"></i></a></li>
					<li><a class="popup-share twitter" target="_blank" href="http://twitter.com/intent/tweet?text=<?php the_title() ?>&url=<?php the_permalink() ?>&via=jarbas434"><i class="fab fa-twitter"></i></a></li>
					<li><a class="popup-share google-plus" target="_blank" href="http://plus.google.com/share?url=<?php the_permalink() ?>"><i class="fab fa-google-plus-g"></i></a></li>
					<li><a class="popup-share pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&description=&media=<?php the_post_thumbnail_url() ?>"><i class="fab fa-pinterest-p"></i></a></li>
					<li><a class="popup-share linkedin" target="_blank" href="http://linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title() ?>"><i class="fab fa-linkedin-in"></i></a></li>
				</ul>
				<script>
					$(document).ready(function() {
					    $('.popup-share').click(function(e) {
					        e.preventDefault();
					        window.open($(this).attr('href'), 'socialShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
					        return false;
					    });
					});
				</script>
			</div>
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
