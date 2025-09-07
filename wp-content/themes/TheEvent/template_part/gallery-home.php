<section id="Gallery" class="venue section" >
<!-- Section Title -->
<div class="container section-title" data-aos="zoom-in-right" data-aos-offset="-500" >
  <h2>Gallery<br></h2>
</div><!-- End Section Title -->
<div class="container-fluid venue-gallery-container" data-aos="zoom-in-left" data-aos-offset="-600">
  <div class="row g-0">
  <?php
$argsGallery = array(
    'post_type' => 'gallery_image',
    'orderby' => 'menu_order',
    'posts_per_page' => 16
);
$galleryList = new WP_Query( $argsGallery );
if( $galleryList->have_posts() ) : 
    $galleryListCount = 1;
while( $galleryList->have_posts() ) : 
    $galleryList->the_post();
    if(has_post_thumbnail(get_the_ID())){
?>
    <div class="col-lg-3 col-md-4" data-aos="zoom-in-right" data-aos-offset="-600">
      <div class="venue-gallery">
        <a href="<?php the_post_thumbnail_url();?>" class="glightbox" data-gall="venue-gallery">
          <img src="<?php the_post_thumbnail_url();?>" alt="" class="img-fluid">
        </a>
      </div>
    </div>
    <?php
}    
    $galleryListCount++;
endwhile;
endif; 
?>
  </div>
</div>
</section><!-- /Venue Section -->
