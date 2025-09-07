<section id="production" class="speakers section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Productions<br></h2>
    </div><!-- End Section Title -->
    <div class="container">
        <div class="row gy-4">
            <?php
$argsProduction = array(
    'post_type' => 'production_silde',
    'orderby' => 'menu_order',
    'posts_per_page' => -1
);
$productionSlides = new WP_Query( $argsProduction );
if( $productionSlides->have_posts() ) : 
    $productionSliderCount = 1;
    while( $productionSlides->have_posts() && $productionSliderCount < 9 ) : 
    $productionSlides->the_post();
?>
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4><a href="speaker-details.html"><?= esc_html( get_the_title() )?></a></h4>
                            <!-- <span><?=esc_html ( get_the_title() )?></span> -->
                        </div>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div><!-- End Team Member -->
            <?php
            $productionSliderCount++;
            endwhile;
                            if($productionSlides->found_posts != $productionSliderCount && $productionSliderCount%3 == 0)
                            {
                            }
                            
                            endif;
                    ?>
        </div>
    </div>
    </div>
</section>