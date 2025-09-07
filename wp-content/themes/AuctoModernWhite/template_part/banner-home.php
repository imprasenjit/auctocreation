<?php
$args = array(
	'post_type' => 'slides',
	'orderby' => 'menu_order',
	'posts_per_page' => -1
);
$slides = new WP_Query($args);
?>

<!-- Modern Hero Banner (Refactored Layout) -->
<section class="hero-banner hero-full" data-aos="fade-in" aria-label="Featured Highlights">
	<!-- Layered Background / Gradient Overlay -->
	<div class="hero-overlay-gradient" aria-hidden="true"></div>
	<div class="hero-decor hero-decor-a" aria-hidden="true"></div>
	<div class="hero-decor hero-decor-b" aria-hidden="true"></div>

	<?php if ($slides->have_posts()) : ?>
		<?php
		// Gather slides first for duplication (marquee effect)
		$slide_items = array();
		while ($slides->have_posts()) : $slides->the_post();
			$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$title = get_the_title();
			$caption = get_the_post_thumbnail_caption();
			if ($img) {
				$slide_items[] = array(
					'img' => $img,
					'title' => $title,
					'caption' => $caption
				);
			}
		endwhile;
		$slide_count = count($slide_items);
		?>
		<?php if ($slide_count > 0): ?>
			<div id="modernCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="4000" aria-label="Hero image slides">
				<div class="carousel-inner">
					<?php foreach ($slide_items as $i => $s): ?>
						<div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>" aria-label="Slide <?php echo $i + 1; ?>">
							<img src="<?php echo esc_url($s['img']); ?>" class="d-block w-100 carousel-image" alt="<?php echo esc_attr($s['caption'] ? $s['caption'] : $s['title']); ?>" loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>" />
						</div>
					<?php endforeach; ?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#modernCarousel" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#modernCarousel" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
					<span class="visually-hidden">Next</span>
				</button>
				<button class="hero-pause-btn" type="button" aria-pressed="false" aria-label="Pause carousel" data-state="playing">
					<i class="fas fa-pause icon-pause" aria-hidden="true"></i>
					<i class="fas fa-play icon-play" aria-hidden="true"></i>
					<span class="label">Pause</span>
				</button>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<!-- Typing Animation Overlay -->
	<div class="typing-overlay container">
		<div class="typing-content">
			<div class="typing-container">
				<div class="typing-line">
					<span class="typing-text" data-texts='["Every Event is a New story for us...To script new endeavors...", "Events sprout from simple ideas, with Patronization...", "An Event.....that finally gets public acceptance, converts to a property... An Asset"]'></span>
					<span class="typing-cursor">|</span>
				</div>
			</div>
		</div>
	</div>

	<!-- (Hero textual content moved outside of banner for layout adjustment) -->
</section>

<!-- Hero Content Section (now outside banner) -->


<?php wp_reset_postdata(); ?>