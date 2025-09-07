        <div id="festivals" class="container-fluid text-center">

            <?php

                $argsFestival = array(
                    'post_type' => 'festival',
                    'orderby' => 'menu_order',
                    'posts_per_page' => -1
                );
                $festivalSlides = new WP_Query( $argsFestival );

            if( $festivalSlides->have_posts() ) : 
            ?>

            <h2>Festivals</h2>

            <div class="carousel slide" id="myCarouselFestivals">

                <div class="carousel-inner">

                    <div class="item active">

                        <div class="row text-center slideanim">

                <?php

                    $festivalSliderCount = 1;
                    while( $festivalSlides->have_posts() ) : $festivalSlides->the_post();
                ?>

                            <div class="col-sm-4">

                                <div class="thumbnail">

                                    <img src="<?php the_post_thumbnail_url();?>" alt="<?php echo esc_html ( get_the_post_thumbnail_caption() );?>" width="400" height="300">

                                    <p><strong><?=esc_html ( get_the_title() )?></strong></p>

                                    <p><?=esc_html ( get_the_post_thumbnail_caption() )?></p>

                                </div>

                            </div>

                    <?php
                            if($festivalSlides->found_posts != $festivalSliderCount && $festivalSliderCount%3 == 0)
                            {
                    ?>

                        </div>
                    </div>

                    <div class="item">
                        <div class="row text-center slideanim">

                    <?php
                            }
                            $festivalSliderCount++;
                        endwhile;
                    ?>

                        </div>
                    </div>
                </div>

                <ul class="control-box pager">

                    <li><a data-slide="prev" href="#myCarouselFestivals" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>

                    <li><a data-slide="next" href="#myCarouselFestivals" class=""><i class="glyphicon glyphicon-chevron-right"></i></a></li>

                </ul>

            </div>

            <?php
                endif;
            ?>

        </div>