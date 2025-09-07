
        <?php 
            $argsAuctoQuote = array(
                'post_type' => 'aucto_quotes',
                'orderby' => 'menu_order',
                'posts_per_page' => -1
            );
            $auctoQuotes = new WP_Query( $argsAuctoQuote );
        ?>

        <!-- Container News -->

        <div id="news" class="container-fluid text-center">

            <h2>Auctocreation</h2>

            <div id="myCarouselWritings" class="carousel slide text-center" data-ride="carousel">

                <?php

                if( $auctoQuotes->have_posts() ) : 
                ?>

                <!-- Indicators -->

                <ol class="carousel-indicators">
                   
                    <?php
                        $qoutesToSlide = 0;
                        while( $auctoQuotes->have_posts() ) : $auctoQuotes->the_post();
                    ?>

                    <li data-target="#myCarouselWritings" data-slide-to="<?php echo $qoutesToSlide;?>" <?php if($qoutesToSlide === 0){ ?> class="active" <?php } ?>></li>

                    <?php 
                        endwhile;
                    ?>

				</ol>

				

                <!-- Wrapper for slides -->

                <div class="carousel-inner" role="listbox">
            
                <?php
                    $quotesCount = 0;
                    while( $auctoQuotes->have_posts() ) : $auctoQuotes->the_post();
                ?>

                    <div class="item <?php echo ($quotesCount === 0)?'active':'';?>">

                        <h4><?=get_the_excerpt()?></h4>

					</div>


                <?php
                        $quotesCount++;
                    endwhile;
                ?>

				</div>

				

                <!-- Left and right controls -->

                <a class="left carousel-control" href="#myCarouselWritings" role="button" data-slide="prev">

                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

                    <span class="sr-only">Previous</span>

				</a>

                <a class="right carousel-control" href="#myCarouselWritings" role="button" data-slide="next">

                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

                    <span class="sr-only">Next</span>

				</a>

                <?php
                    endif;
                ?>

			</div>

		</div>

        <!-- End of News -->