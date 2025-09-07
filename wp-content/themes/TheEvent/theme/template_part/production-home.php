        <div id="production" class="container-fluid text-center">

            <?php

                $argsProduction = array(
                    'post_type' => 'production_silde',
                    'orderby' => 'menu_order',
                    'posts_per_page' => -1
                );
                $productionSlides = new WP_Query( $argsProduction );

            if( $productionSlides->have_posts() ) : 
            ?>

			<h2>Production</h2>

			<div class="carousel slide" id="myCarousel">

                <div class="carousel-inner">

                    <div class="item active">
                        <div class="row text-center slideanim">

                    <?php

                        $productionSliderCount = 1;
                        while( $productionSlides->have_posts() ) : $productionSlides->the_post();
                    ?>

                            <div class="col-sm-4">

                                <div class="thumbnail">

                                    <img src="<?php the_post_thumbnail_url();?>" alt="<?php echo esc_html ( get_the_post_thumbnail_caption() );?>" width="400" height="300">

                                    <p><strong><?=esc_html ( get_the_title() )?></strong></p>

                                    <p><?=esc_html ( get_the_post_thumbnail_caption() )?></p>

                                </div>

                            </div>

                    <?php
                            if($productionSlides->found_posts != $productionSliderCount && $productionSliderCount%3 == 0)
                            {
                    ?>

                        </div>
                    </div>

                    <div class="item">
                        <div class="row text-center slideanim">

                    <?php
                            }
                            $productionSliderCount++;
                        endwhile;
                    ?>

                        </div>
                    </div>
				</div>

				

				

				<ul class="control-box pager">

					<li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>

					<li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></a></li>

				</ul>

                <!-- /.control-box -->

				

			</div><!-- /#myCarousel -->

            <?php

                endif;

            ?>

		</div>	