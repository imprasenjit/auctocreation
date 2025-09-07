<?php

/**
 * Main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * 
 * @package AuctoModernWhite
 */
get_header();
?>
<!-- Fixed Social Media Links (Desktop Only) -->
<div class="icon-bar d-none d-lg-block" data-aos="fade-left" data-aos-delay="200">
	<a href="http://www.facebook.com/aucto.creation"
		class="facebook"
		aria-label="Follow us on Facebook"
		target="_blank"
		rel="noopener noreferrer">
		<i class="fab fa-facebook-f" aria-hidden="true"></i>
	</a>
	<a href="https://www.youtube.com/c/AuctoCreation"
		class="youtube"
		aria-label="Subscribe to our YouTube channel"
		target="_blank"
		rel="noopener noreferrer">
		<i class="fab fa-youtube" aria-hidden="true"></i>
	</a>
</div>
<!-- Main Content -->
<main id="main" class="site-main" role="main">
	<?php if (is_front_page()) : ?>

		<!-- Hero Banner Section -->
		<section id="myPage">
			<?php get_template_part('template_part/banner', 'home'); ?>
		</section>

		<!-- About Us Section (Full Width) -->
		<section class="hero-content-stack" id="about" class="full-width-section">
			<?php get_template_part('template_part/about', 'home'); ?>
		</section>

		<!-- Clients Section (Full Width) -->
		<section id="clients" class="full-width-section">
			<?php get_template_part('template_part/clients', 'home'); ?>
		</section>

		<!-- Services Section (Full Width) -->
		<section id="services" class="full-width-section">
			<?php get_template_part('template_part/services', 'home'); ?>
		</section>

		<!-- Achievements Section -->
		<section id="achievements" class="contained-section">
			<div class="site-contained">
				<?php get_template_part('template_part/achievement', 'home'); ?>
			</div>
		</section>

		<!-- Contact Section -->
		<section id="contact" class="contained-section">
			<div class="site-contained">
				<?php get_template_part('template_part/contact', 'home'); ?>
			</div>
		</section>

	<?php else : ?>
		<!-- Default Page Content for Non-Front Pages -->
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php
					if (have_posts()) :
						while (have_posts()) :
							the_post();
					?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
								</header>
								<div class="entry-content">
									<?php the_content(); ?>
								</div>
							</article>
						<?php
						endwhile;
					else :
						?>
						<div class="no-content">
							<h1><?php esc_html_e('Nothing Found', 'auctocreation'); ?></h1>
							<p><?php esc_html_e('It looks like nothing was found at this location.', 'auctocreation'); ?></p>
						</div>
					<?php
					endif;
					?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</main><!-- #main -->
<?php
get_footer();
?>