<section id="Festivals" class="gallery section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Festivals</h2>
  <p class="text-center">With years of experience, we bring fresh ideas and flawless execution to every Festivals.</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="swiper init-swiper">
    <script type="application/json" class="swiper-config">
      {
        "loop": true,
        "speed": 600,
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": "auto",
        "centeredSlides": true,
        "pagination": {
          "el": ".swiper-pagination",
          "type": "bullets",
          "clickable": true
        },
        "breakpoints": {
          "320": {
            "slidesPerView": 1,
            "spaceBetween": 0
          },
          "768": {
            "slidesPerView": 3,
            "spaceBetween": 20
          },
          "1200": {
            "slidesPerView": 5,
            "spaceBetween": 20
          }
        }
      }
    </script>
    <div class="swiper-wrapper align-items-center">
    <?php

$argsFestival = array(
    'post_type' => 'festival',
    'orderby' => 'menu_order',
    'posts_per_page' => -1
);
$festivalSlides = new WP_Query( $argsFestival );

if( $festivalSlides->have_posts() ) : 
    $festivalSliderCount = 1;
    while( $festivalSlides->have_posts() ) :
         $festivalSlides->the_post();

?>
      <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="<?php the_post_thumbnail_url();?>"><img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="<?=esc_html ( get_the_title() )?>"></a></div>
                     <?php
                            
                            $festivalSliderCount++;
                        endwhile;
                    endif;
                    ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>

</div>

</section><!-- /Gallery Section -->
   