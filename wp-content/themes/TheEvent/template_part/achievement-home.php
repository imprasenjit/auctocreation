<section id="Achivements" class="hotels section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Achievements</h2>
        <p class="text-center"> Our reputation speaks for itself, with countless successful events and happy clients.</p>
    </div><!-- End Section Title -->
    <div class="container">
        <div class="row gy-4">
            <?php
            $argsAchievements = array(
                'post_type' => 'achievement',
                'orderby' => 'menu_order',
                'posts_per_page' => 16
            );
            $achievements = new WP_Query($argsAchievements);
            if ($achievements->have_posts()) :
                $achievementsCount = 1;
                while ($achievements->have_posts()) : $achievements->the_post();
            ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card h-100">
                            <div class="card-img">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                            </div>
                            <?php if (get_the_excerpt() != null) { ?>
                                <h3><a href="#" class="stretched-link"><?php echo get_the_excerpt(); ?></a></h3>
                                <!-- <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div> -->
                                <p><?php echo get_the_excerpt(); ?></p>
                                <div class="caption">
                                    <p style="color:white;font-family: Stencil Std, fantasy;"><b><?php echo get_the_excerpt(); ?></b></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div><!-- End Card Item -->
            <?php
                    $achievementsCount++;
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section><!-- /Hotels Section -->