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