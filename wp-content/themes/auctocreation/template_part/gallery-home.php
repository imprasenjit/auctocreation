        <!-- Gallery -->

        <div id="gallery" class="container-fluid" style="background-image: url('<?=get_template_directory_uri()?>/images/back_pic/bg1.jpg'); padding: 60px 50px!important; background-repeat: no-repeat; background-size: cover;">

            <?php

                $argsGallery = array(
                    'post_type' => 'gallery_image',
                    'orderby' => 'menu_order',
                    'posts_per_page' => 16
                );
                $galleryList = new WP_Query( $argsGallery );

            if( $galleryList->have_posts() ) : 
            ?>

                <h2 class="text-center" style="color:azure;">Gallery</h2>

                <div class="row">

                <?php

                    $galleryListCount = 1;
                    while( $galleryList->have_posts() ) : $galleryList->the_post();
					if(has_post_thumbnail(get_the_ID())){
                ?>

                    <div class="col-md-3">
					
                        <a href="<?php the_post_thumbnail_url();?>" target="_blank" style="margin:10px;">
                        <img src="<?php the_post_thumbnail_url();?>" alt="<?php echo esc_html ( get_the_post_thumbnail_caption() );?>" style="width:100%">
                        </a>
                    </div>

					<?php     }           
                        $galleryListCount++;
                    endwhile;
                ?>
                    
				</div>

				<br>

				<div class="row">
					
					<div class="col-lg-5 col-md-4 col-sm-4 col-xs-4">	
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">							
						<a href="<?php echo get_site_url()."/gallery" ?>" class="btn btn-block btn-primary">View More</a>
					</div>
					<div class="col-lg-5 col-md-4 col-sm-4 col-xs-4">	
					</div>
				</div>

            <?php
                endif;
            ?>

		</div>

        <!-- End of Gallery -->