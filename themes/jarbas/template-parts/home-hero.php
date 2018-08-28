
<div id="home-hero-carousel" class="carousel slide hero" data-interval="false">
  <div class="carousel-inner"><?php
$counter = 0;
if( have_rows('slider') ): while ( have_rows('slider') ) : the_row(); $counter++;
	//Give the first slide 'active' class
if ($counter == 1) { $sliderClass = 'active'; } else { $sliderClass = ''; }
?>

	<?php if (get_row_layout() == 'slide_de_imagem'): ?>
		<div class="carousel-item hero-item hero-item-image <?php echo $sliderClass; ?>" style="background-image: url('<?php the_sub_field('imagem') ?>">
			<a href="<?php the_sub_field('link') ?>"></a>
		</div>
	<?php elseif (get_row_layout() == 'slide_de_video'): ?>
		<div class="carousel-item hero-item hero-item-video <?php echo $sliderClass; ?>">
			<div id="hero-capa-<?php echo $count ?>" class="hero-video-capa" style="background-image: url('<?php the_sub_field('capa_do_video') ?>">
				<i id="hero-play-<?php echo $count ?>" class="fas fa-play-circle"></i>
			</div>
			<iframe id="hero-video-<?php echo $count ?>" src="<?php the_sub_field('video') ?>?rel=0&modestbranding=1" frameborder="0" allowfullscreen></iframe>
		</div>
		<script>
		  $('#hero-play-<?php echo $count ?>').on('click', function(ev) {
 
		    $("#hero-video-<?php echo $count ?>")[0].src += "&autoplay=1";
		    ev.preventDefault();
		    $("#hero-capa-<?php echo $count ?>").fadeOut();
		 
		  });
		</script>
	<?php endif ?>
<?php endwhile; endif; ?>
  </div>
  <a class="carousel-control-prev" href="#home-hero-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#home-hero-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>