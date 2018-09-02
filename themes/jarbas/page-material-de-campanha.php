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

<div class="page-material">
	<div class="page-container container">
		<div class="row justify-content-center">
			<div class="col-12 mb-3">
				<h1><?php the_title() ?></h1>
					<?php 

					$midias = get_field('midias');

					if( $midias ): ?>
					    <div class="row">
					        <?php foreach( $midias as $image ): ?>
					            <div class="midia col-12 col-md-4 col-lg-3">
												<button class="preview btn btn-primary" data-id="media-<?php echo $image['ID'];?>">Visualizar</button>
					            	<iframe id="media-<?php echo $image['ID'];?>" data-src="<?php echo $image['url'];  ?>" alt="" frameborder="0">
					            		
					            	</iframe>
												<h6><?php echo $image['title'];  ?></h6>
					              <a target="_blank" href="<?php echo $image['url']; ?>">
					              	<button class="btn btn-orange btn-sm mr-2">DOWNLOAD</button>
					              </a>
					              <small><?php echo $image['mime_type']; ?></small>
					            </div>
					        <?php endforeach; ?>
					    </div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('button.preview').click(function() {
		var mediaID = $(this).attr('data-id');
		var iframe = $('#'+mediaID)
		var iframeURL = iframe.attr('data-src')
		console.log(iframeURL)
		iframe.attr('src', iframeURL)
		$(this).fadeOut();
	})
</script>
<?php endwhile; endif ?>
<?php
get_footer();
