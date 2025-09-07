<?php
	function auctocreationResources(){

		wp_register_style('font-awsome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('font-awsome');

		wp_enqueue_style('bootstrap',get_template_directory_uri().'/bootstrap/css/bootstrap.min.css');

		if((basename(get_permalink()) === 'gallery')){
			// wp_enqueue_style('light-gallery',get_template_directory_uri().'/bootstrap/bsb/lightgallery.css');

			wp_enqueue_style('light-gallery','https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.css');

			wp_enqueue_style('light-gallery-style',get_template_directory_uri().'/bootstrap/bsb/css/style.css');
		}

		wp_enqueue_style('style', get_template_directory_uri().'/style.css');

		// wp_enqueue_style('main_css',get_stylesheet_uri().'bootstrap/css/main.css');

		wp_register_style('montserrat','https://fonts.googleapis.com/css?family=Montserrat');
		wp_enqueue_style('montserrat');

		wp_register_style('lato','https://fonts.googleapis.com/css?family=Lato');
		wp_enqueue_style('lato');

	}

	add_action('wp_enqueue_scripts', 'auctocreationResources');

	function auctocreationScriptResources(){

		wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/bootstrap/js/bootstrap.min.js',array('jquery'),true);

		if((basename(get_permalink()) === 'gallery')){
			wp_enqueue_script('light-gallery-js',get_template_directory_uri().'/bootstrap/bsb/light-gallery/js/lightgallery-all.js',array('bootstrap-js'),true);

			wp_enqueue_script('image-gallery-js',get_template_directory_uri().'/bootstrap/bsb/image-gallery.js',array('light-gallery-js'),true);
		}
		else{

			wp_enqueue_script('google-map','https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap','',true);
		}

		wp_enqueue_script('app',get_template_directory_uri().'/app.js');

	}

	add_action('wp_enqueue_scripts', 'auctocreationScriptResources');

	// Navigation Menus
	register_nav_menus(array(
		'primary' => __( 'Primary Menu' ),
		'footer' => __( 'Footer Menu' )
	));

	// Image thumbnails
	add_theme_support('post-thumbnails');

	// For banners 
	add_image_size('slides',1200,580,true);//true for crop or not

	// For Production
	add_image_size('production_slides',400,300,true);

	// For Festival
	add_image_size('festival',400,300,true);

	// For Fallery
	add_image_size('gallery_image',1080,640,true);

	// For Owned Property
	add_image_size('owned_property_slides',400,300,true);

	// For Achievement
	add_image_size('achievement_slides',600,400,true);
	
?>