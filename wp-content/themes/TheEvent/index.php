<?php	
	get_header();
?>
		<!-- Social Links -->
		<div class="icon-bar visible-lg-block visible-md-block">
			<a href="http://www.facebook.com/aucto.creation" class="facebook"><i class="fa fa-facebook"></i></a> 
			<!--<a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
			<a href="#" class="google"><i class="fa fa-google"></i></a> 
			<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
			<a href="https://www.youtube.com/c/AuctoCreation" class="youtube"><i class="fa fa-youtube"></i></a>
		</div>

		<?php 
			if( is_front_page() )
			{
				// Banner
				get_template_part('/template_part/banner','home');
				get_template_part('/template_part/production','home');
				get_template_part('/template_part/achievement','home');
				get_template_part('/template_part/festival','home');
				get_template_part('/template_part/gallery','home');
			}
		?>
        
    <!-- Contact Section -->
    <section id="contact" class="contact section" >

<!-- Section Title -->
<div class="container section-title" data-aos="fade-right" data-aos-offset="-500"
  <h2>Contact</h2>
  <p class="text-center">Creative marketing events that engage audiences and elevate your brand.</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up">

  <div class="row gy-4">

	<div class="col-lg-6">
	  <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-offset="-500">
		<i class="bi bi-geo-alt"></i>
		<h3>Address</h3>
		<p>Aucto Creation 11,Janaki path
		Ganeshguri Guwahati-781006</p>
	  </div>
	</div><!-- End Info Item -->

	<div class="col-lg-3 col-md-6">
	  <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-offset="-500" >
		<i class="bi bi-telephone"></i>
		<h3>Call Us</h3>
		<p>0361-3139121</p>
	  </div>
	</div><!-- End Info Item -->

	<div class="col-lg-3 col-md-6">
	  <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-offset="-500">
		<i class="bi bi-envelope"></i>
		<h3>Email Us</h3>
		<p>auctocreation@gmail.com</p>
		<p>info@auctocreation.com</p>
	  </div>
	</div><!-- End Info Item -->

  </div>

  <div class="row gy-4 mt-1">
	<div class="col-lg-6" data-aos="zoom-out-right" data-aos-offset="-500">
	  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3581.4073476416597!2d91.785617!3d26.15086!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5918f83e5165%3A0x3e122c01800c12fa!2sAucto%20Creation!5e0!3m2!1sen!2sus!4v1745081000315!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div><!-- End Google Maps -->

	<div class="col-lg-6">
	  <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="100" data-aos-offset="-600">
		<div class="row gy-4">

		  <div class="col-md-6">
			<input type="text" name="name" class="form-control" placeholder="Your Name" required="">
		  </div>

		  <div class="col-md-6 ">
			<input type="email" class="form-control" name="email" placeholder="Your Email" required="">
		  </div>

		  <div class="col-md-12">
			<input type="text" class="form-control" name="subject" placeholder="Subject" required="">
		  </div>

		  <div class="col-md-12">
			<textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
		  </div>

		  <div class="col-md-12 text-center">
			<div class="loading">Loading</div>
			<div class="error-message"></div>
			<div class="sent-message">Your message has been sent. Thank you!</div>

			<button type="submit">Send Message</button>
		  </div>

		</div>
	  </form>
	</div><!-- End Contact Form -->

  </div>

</div>

</section><!-- /Contact Section -->
<?php	
	get_footer();
?>