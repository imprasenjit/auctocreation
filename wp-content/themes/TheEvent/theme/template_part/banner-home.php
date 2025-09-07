

		<?php 
			$args = array(
				'post_type' => 'slides',
				'orderby' => 'menu_order',
				'posts_per_page' => -1
			);
			$slides = new WP_Query( $args );
		?>

		<div id="myCarouselBanner" class="carousel slide" data-ride="carousel">

			<!-- Indicators -->

			<?php

			if( $slides->have_posts() ) : 
			?>

			<ol class="carousel-indicators">

			<?php
				$dataToSlide = 0;
				while( $slides->have_posts() ) : $slides->the_post();
			?>

				<li data-target="#myCarouselBanner" data-slide-to="<?php echo $dataToSlide;?>" <?php if($dataToSlide === 0){ ?> class="active" <?php } ?>></li>

			<?php
				$dataToSlide++;
				endwhile;
			?>

			</ol>
			
			<!-- Wrapper for slides -->

			<div class="carousel-inner">

			<?php
				$sliderCount = 0;
				while( $slides->have_posts() ) : $slides->the_post();
			?>

				<div class="item <?php echo ($sliderCount === 0)?'active':'';?>">

					<img src="<?php the_post_thumbnail_url();?>" alt="<?php echo esc_html ( get_the_post_thumbnail_caption() )?>" style="width:100%;">

				</div>

			<?php
					$sliderCount++;
				endwhile;
			endif;
			?>

			</div>

			<!-- Left and right controls -->

			<a class="left carousel-control" href="#myCarouselBanner" data-slide="prev">

				<span class="glyphicon glyphicon-chevron-left"></span>

				<span class="sr-only">Previous</span>

			</a>

			<a class="right carousel-control" href="#myCarouselBanner" data-slide="next">

				<span class="glyphicon glyphicon-chevron-right"></span>

				<span class="sr-only">Next</span>

			</a>
		</div>