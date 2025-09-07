<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php bloginfo('name');?> :: <?php bloginfo('description')?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?=get_template_directory_uri()?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=get_template_directory_uri()?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=get_template_directory_uri()?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=get_template_directory_uri()?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=get_template_directory_uri()?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="<?=get_template_directory_uri()?>/assets/css/main.css" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="<?=get_template_directory_uri()?>/assets/img/logo.jpg" alt="">
        <!-- Uncomment the line below if you also wish to use an text logo -->
        <!-- <h1 class="sitename">TheEvent</h1>  -->
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?=(basename(get_permalink()) === 'home')?get_site_url().'/':''?>#home" class="active">Home<br></a></li>
          <li><a href="<?=(basename(get_permalink()) === 'production')?get_site_url().'/':''?>#production">Production</a></li>
          <li><a href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#Achivements">Achivements</a></li>
          <li><a href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#Festivals">Festivals</a></li>
          <li><a href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#Gallery">Gallery</a></li>
		  <!-- <li class="dropdown"><a href="#"><span>More</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Set Design</a></li>
              <li><a href="#">Achivements</a></li>
            </ul>
          </li> -->
          <li><a href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>