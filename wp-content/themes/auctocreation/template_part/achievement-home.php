        <!-- Acheivements -->
        <div id="acheivements" class="container-fluid" style="background-image: url('<?=get_template_directory_uri()?>/images/back_pic/bg1.jpg'); color:#FFF;padding: 60px 50px!important;">
             <?php
                $argsAchievements = array(
                    'post_type' => 'achievement',
                    'orderby' => 'menu_order',
                    'posts_per_page' => 16
                );
                $achievements = new WP_Query( $argsAchievements );
            if( $achievements->have_posts() ) : 
            ?>
            <h2 class="text-center">Acheivements</h2>
            <!--<p>Mr Rajib Kalita, owner of Aucto Creation has won the ‘62nd National Film Award’ for the ‘Best Film’ in other language category in 2015 for a “Rabha’ language feature film “ORONG”.
				</p>            <p>Mr Rajib Kalita of Aucto Creation had the proud privilege to composed ‘THEME SONG’ OF ‘33RD National Games’ hosted by Guwahati, Assam in the year 2007.
			</p>-->
            <div class="row">
				<?php
                    $achievementsCount = 1;
                    while( $achievements->have_posts() ) : $achievements->the_post();
                ?>
					<div class="col-md-4">
						<div class="thumbnail" style="background-color:#0a430a;">
							<a href="<?php the_post_thumbnail_url();?>" target="_blank" style="
    text-decoration: none;">
								<img src="<?php the_post_thumbnail_url();?>" alt="<?php echo esc_html ( get_the_post_thumbnail_caption() );?>" style="width:100%">
								<?php if(get_the_excerpt() != null) {?>
								<div class="caption">
									<p style="color:white;font-family: Stencil Std, fantasy;"><b><?php echo get_the_excerpt();?></b></p>
								</div>
								<?php }?>
							</a>
						</div>
					</div>
                <?php                
                        $achievementsCount++;
                    endwhile;
                ?>                
			</div>
            <?php
                endif;
            ?>
		</div>