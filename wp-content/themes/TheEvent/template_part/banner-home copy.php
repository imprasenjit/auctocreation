<!-- myPage Section -->
<section id="myPage" class="myPage section dark-background fullscreen-carousel">
<div class="container-fluid sldes-banner">
	<div class="row">
<?php 
    $args = array(
        'post_type' => 'slides',
        'orderby' => 'menu_order',
        'posts_per_page' => -1
    );
    $slides = new WP_Query( $args );
?>
<div id="myCarouselBanner" class="carousel slide col-12 myCarouselBanner" data-bs-ride="carousel">
    <!-- Indicators -->
    <?php if( $slides->have_posts() ) : ?>
    <div class="carousel-indicators">
        <?php
        $dataToSlide = 0;
        while( $slides->have_posts() ) : $slides->the_post();
        ?>
        <button type="button" data-bs-target="#myCarouselBanner" data-bs-slide-to="<?php echo $dataToSlide;?>" class="<?php echo ($dataToSlide === 0) ? 'active' : ''; ?>" aria-current="<?php echo ($dataToSlide === 0) ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $dataToSlide + 1; ?>"></button>
        <?php
        $dataToSlide++;
        endwhile;
        ?>
    </div>
    <!-- Wrapper for slides -->
    <div class="carousel-inner ">
        <?php
        $sliderCount = 0;
        while( $slides->have_posts() ) : $slides->the_post();
        ?>
        <div class="carousel-item <?php echo ($sliderCount === 0) ? 'active' : ''; ?>">
		<div class="carousel-background" style="background-image: url('image1.jpg');"></div>
            <img src="<?php the_post_thumbnail_url(); ?>" class="d-block w-100 carousel-background" alt="<?php echo esc_html( get_the_post_thumbnail_caption() ); ?>">
        </div>
        <?php
        $sliderCount++;
        endwhile;
        ?>
    </div>
    <!-- Left and right controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarouselBanner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarouselBanner" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php endif; ?>
</div>
</div>
<div class="about-info position-relative">
  <div class="container position-relative" data-aos="fade-up">
    <div class="row">
      <div class="col-6">
        <h2>Auctocreation</h2>
        <p>We believe that every event is a unique story waiting to be told. As the leading event management company in Northeast India. we specialize in turning visions into reality, creating moments that leave lasting impressions. Whether it’s a wedding, corporate event, concert, festival, or private celebration, our team of passionate professionals ensures flawless execution with creativity, precision, and excellence.</p>
      </div>
      <div class="col-6">
        <h3>Our Vision</h3>
        <p>Whether it’s a wedding, corporate event, concert, festival, or private celebration, our team of passionate professionals ensures flawless execution with creativity, precision, and excellence</p>
      </div>
      <!-- <div class="col-lg-3">
        <h3>Vision</h3>
        <p>Monday to Wednesday<br>10-12 December</p>
      </div> -->
    </div>
  </div>
</div>
</section><!-- /myPage Section -->