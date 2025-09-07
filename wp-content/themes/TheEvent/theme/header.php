<!DOCTYPE html>

<html lang="en">

	<head>


		<meta charset="<?php bloginfo('charset');?>">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php bloginfo('name');?> :: <?php bloginfo('description')?></title>

		<link rel="icon" href="<?=get_template_directory_uri()?>/images/logo/logo.jpg" type="image/ico" />
		<?php wp_head(); ?>
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

		<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->

		<!-- <link rel="stylesheet" href="bootstrap/css/main.css"> -->

		<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"> -->

		<!-- <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"> -->

		

	</head>

	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


		<section class="navigation navbar">

			<div class="nav-container">

				<div class="brand">

					<a href="#!">

						<img class="logo-img visible-sm-block visible-md-block visible-lg-block" src="<?=get_template_directory_uri()?>/images/logo/logo.jpg">

						<img class="logo-img visible-xs-block" style="width:100px" src="<?=get_template_directory_uri()?>/images/logo/logo.jpg">

					</a>

				</div>

				<div class="tag-line visible-md-block visible-lg-block">

					<?php bloginfo('description')?>

				</div>

				<nav>

					<div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>

					<ul class="nav-list">

						

						<li>

							<a class='slide-section' href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#myPage">HOME</a>

						</li>

						<li>

							<a class='slide-section' href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#production">PRODUCTION</a>

						</li>

						<li>

							<a class='slide-section' href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#festivals">FESTIVALS</a>

						</li>

						<li>

							<a class='slide-section' href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#gallery">GALLERY</a>

						</li>

						<li>

							<a class='slide-section' href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#mice">MICE</a>

						</li>

						<li>

							<a class='slide-section' href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#ownedProperty">OWNED PROPERTY</a>

						</li>

						<li>

							<a id="nav-more" href="#!">MORE</a>

							<ul class="nav-dropdown">

								<li>

									<a class='slide-section' href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#set-design">SET DESIGN</a>

								</li>

								<li>

									<a class='slide-section' href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#acheivements">ACHIEVEMENTS</a>

								</li>

							</ul>

						</li>

						<li>

							<a class='slide-section' href="<?=(basename(get_permalink()) === 'gallery')?get_site_url().'/':''?>#contact">CONTACT</a>

						</li>

					</ul>

				</nav>

			</div>

		</section>