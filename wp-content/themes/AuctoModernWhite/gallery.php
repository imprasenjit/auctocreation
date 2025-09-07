<?php

/**
 * Template for displaying gallery page
 *
 * @package AuctoModernWhite
 * @version 2.0
 */

get_header(); ?>

<main id="main-content" class="gallery-page">
	<div class="container py-5">

		<!-- Page Header -->
		<div class="row">
			<div class="col-12 text-center mb-5" data-aos="fade-up">
				<h1 class="display-4 mb-3">Event Gallery</h1>
				<p class="lead text-muted">Explore our collection of memorable moments from various events and productions</p>
			</div>
		</div>

		<!-- Gallery Grid -->
		<div class="row" id="lightgallery">
			<?php
			// Query for gallery images
			$gallery_query = new WP_Query(array(
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'post_status' => 'inherit',
				'posts_per_page' => 24,
				'meta_query' => array(
					array(
						'key' => '_wp_attachment_image_alt',
						'compare' => 'EXISTS'
					)
				)
			));

			if ($gallery_query->have_posts()) :
				$delay = 0;
				while ($gallery_query->have_posts()) : $gallery_query->the_post();
					$image_url = wp_get_attachment_image_src(get_the_ID(), 'large')[0];
					$thumb_url = wp_get_attachment_image_src(get_the_ID(), 'medium')[0];
					$image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true);
					$image_caption = wp_get_attachment_caption(get_the_ID());
			?>
					<div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
						<div class="gallery-item"
							data-src="<?php echo esc_url($image_url); ?>"
							data-sub-html="<h4><?php echo esc_html($image_alt ? $image_alt : get_the_title()); ?></h4><p><?php echo esc_html($image_caption); ?></p>">
							<div class="gallery-image-wrapper">
								<img src="<?php echo esc_url($thumb_url); ?>"
									alt="<?php echo esc_attr($image_alt ? $image_alt : get_the_title()); ?>"
									class="img-fluid gallery-thumb">
								<div class="gallery-overlay">
									<div class="gallery-overlay-content">
										<a href="#" class="gallery-zoom">
											<i class="fas fa-search-plus"></i>
										</a>
										<?php if ($image_alt) : ?>
											<h5 class="gallery-title"><?php echo esc_html($image_alt); ?></h5>
										<?php endif; ?>
										<?php if ($image_caption) : ?>
											<p class="gallery-caption"><?php echo esc_html($image_caption); ?></p>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
					$delay += 100;
					if ($delay > 400) $delay = 0;
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<!-- Fallback Gallery -->
				<?php
				$fallback_images = array(
					array('src' => 'events/105_th_Indian_Science_Congress.jpg', 'title' => '105th Indian Science Congress', 'caption' => 'Major scientific event organization'),
					array('src' => 'events/Alcheringa_Anushka_Shankar.jpg', 'title' => 'Alcheringa with Anushka Shankar', 'caption' => 'Cultural festival featuring renowned artists'),
					array('src' => 'events/hero_indian_super_legue.jpg', 'title' => 'Hero Indian Super League', 'caption' => 'Sports event management'),
					array('src' => 'events/NH7_2017.jpg', 'title' => 'NH7 Festival 2017', 'caption' => 'Music festival production'),
					array('src' => 'banners/1.jpg', 'title' => 'Corporate Event', 'caption' => 'Professional event setup'),
					array('src' => 'banners/2.jpg', 'title' => 'Cultural Program', 'caption' => 'Traditional cultural presentation'),
					array('src' => 'banners/3.jpg', 'title' => 'Award Ceremony', 'caption' => 'Excellence recognition event'),
					array('src' => 'banners/4.JPG', 'title' => 'Festival Production', 'caption' => 'Large scale festival management'),
					array('src' => 'banners/5.jpg', 'title' => 'Concert Setup', 'caption' => 'Professional stage and sound setup'),
				);

				$delay = 0;
				foreach ($fallback_images as $image) :
					$image_path = get_template_directory_uri() . '/images/' . $image['src'];
				?>
					<div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
						<div class="gallery-item"
							data-src="<?php echo esc_url($image_path); ?>"
							data-sub-html="<h4><?php echo esc_html($image['title']); ?></h4><p><?php echo esc_html($image['caption']); ?></p>">
							<div class="gallery-image-wrapper">
								<img src="<?php echo esc_url($image_path); ?>"
									alt="<?php echo esc_attr($image['title']); ?>"
									class="img-fluid gallery-thumb">
								<div class="gallery-overlay">
									<div class="gallery-overlay-content">
										<a href="#" class="gallery-zoom">
											<i class="fas fa-search-plus"></i>
										</a>
										<h5 class="gallery-title"><?php echo esc_html($image['title']); ?></h5>
										<p class="gallery-caption"><?php echo esc_html($image['caption']); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
					$delay += 100;
					if ($delay > 400) $delay = 0;
				endforeach;
				?>
			<?php endif; ?>
		</div>

		<!-- Back to Home -->
		<div class="row mt-5">
			<div class="col-12 text-center" data-aos="fade-up">
				<a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg">
					<i class="fas fa-home me-2"></i>
					Back to Home
				</a>
			</div>
		</div>

	</div>
</main>

<!-- Initialize LightGallery -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		if (typeof lightGallery !== 'undefined') {
			lightGallery(document.getElementById('lightgallery'), {
				plugins: [lgThumbnail, lgZoom],
				speed: 500,
				thumbnail: true,
				animateThumb: false,
				showThumbByDefault: false,
				thumbWidth: 60,
				thumbHeight: 60,
				thumbMargin: 5
			});
		}
	});
</script>

<?php get_footer(); ?>