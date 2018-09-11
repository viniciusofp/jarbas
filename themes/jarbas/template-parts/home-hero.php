
<div id="home-hero-carousel" class="carousel slide hero" data-interval="3000" data-ride="carousel">
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
			<div id="hero-capa-<?php echo $counter ?>" class="hero-video-capa" style="background-image: url('<?php the_sub_field('capa_do_video') ?>">
				<i id="hero-play-<?php echo $counter ?>" class="fas fa-play-circle"></i>
			</div>
			<iframe id="hero-video-<?php echo $counter ?>" data-src="<?php the_sub_field('video') ?>?rel=0&modestbranding=1&autoplay=1" frameborder="0" allowfullscreen class="carousel-video"></iframe>
		</div>
		<script>
		  $('#hero-play-<?php echo $counter ?>').on('click', function(ev) {

		    var videoUrl = $("#hero-video-<?php echo $counter ?>").attr('data-src');
		    $("#hero-video-<?php echo $counter ?>").attr('src', videoUrl);
		    ev.preventDefault();
		    $("#hero-capa-<?php echo $counter ?>").fadeOut();
		    $('.carousel').carousel('pause');
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

<script>
	$( document ).ready(function() {
		  $('.carousel').on('slide.bs.carousel', function () {
			  $('.carousel-video').attr('src', '')
			  $('.hero-video-capa').fadeIn();
		    $('.carousel').carousel('cycle');
			})
	});
</script>