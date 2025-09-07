<?php
/**
* Template Name: Gallery
*
*
*/

get_header();
?>


    <div class="container-fluid" style="padding:85px 0px 0px 0px;">
        <!-- Image Gallery -->
        <div class="row"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-center">
                            GALLERY
                        </h2>
                    </div>
                    <div class="body">

                    <?php

                        $argsGallery = array(
                            'post_type' => 'gallery_image',
                            'orderby' => 'menu_order',
                            'posts_per_page' => -1
                        );
                        $galleryList = new WP_Query( $argsGallery );

                    if( $galleryList->have_posts() ) : 
                    ?>

                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">


                            <?php

                                $galleryListCount = 1;
                                while( $galleryList->have_posts() ) : $galleryList->the_post();
                            ?>

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <a href="<?php the_post_thumbnail_url();?>" data-sub-html="<?php echo esc_html ( get_the_post_thumbnail_caption() );?>">
                                    <img class="img-responsive thumbnail" src="<?php the_post_thumbnail_url();?>">
                                </a>
                            </div>


                            <?php                
                                    $galleryListCount++;
                                endwhile;
                            ?>

                        </div>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>