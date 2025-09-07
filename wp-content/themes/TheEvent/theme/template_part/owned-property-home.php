
        <div id="ownedProperty" class="container-fluid">

            <?php

                $argsOwnedProperty = array(
                    'post_type' => 'owned_property',
                    'orderby' => 'menu_order',
                    'posts_per_page' => 3
                );
                $ownedProperties = new WP_Query( $argsOwnedProperty );

            if( $ownedProperties->have_posts() ) : 
            ?>

            <h2 class="text-center">Owned Property</h2>

            <div class="carousel slide" id="myCarouselOwned">

                <div class="carousel-inner">

                    <div class="item active">

                        <div class="row text-center slideanim">

                <?php

                    $ownedPropertyCount = 1;
                    while( $ownedProperties->have_posts() ) : $ownedProperties->the_post();
                ?>

                            <div class="col-sm-4">

                                <div class="thumbnail">

                                    <img src="<?php the_post_thumbnail_url();?>" alt="<?php echo esc_html ( get_the_post_thumbnail_caption() );?>" width="400" height="300">

                                    <p><strong><?=esc_html ( get_the_title() )?></strong></p>

                                    <p><?=esc_html ( get_the_post_thumbnail_caption() )?></p>
                                    

								</div>

							</div>


                    <?php
                            $festivalSliderCount++;
                        endwhile;
                    ?>

						</div>

					</div><!-- /Slide1 -->

				</div>

				

			</div><!-- /#myCarousel -->

            <?php
                endif;
            ?>
		</div>