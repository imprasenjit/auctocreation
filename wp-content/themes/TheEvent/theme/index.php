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
		<!--        <div id="slideshow">-->
		<!--            <div>-->
		<!--                <img src="//farm6.static.flickr.com/5224/5658667829_2bb7d42a9c_m.jpg">-->
		<!--            </div>-->
		<!--            <div>-->
		<!--                <img src="//farm6.static.flickr.com/5230/5638093881_a791e4f819_m.jpg">-->
		<!--            </div>-->
		<!--        </div>-->
		<!-- Slider -->
		<?php 
			if( is_front_page() )
			{
				// Banner
				get_template_part('/template_part/banner','home');
				// Production
				get_template_part('/template_part/production','home');
				echo '<hr class="style-two">';
				// Festivals
				get_template_part('/template_part/festival','home');
				// Gallery
				get_template_part('/template_part/gallery','home');
				// Owned Property
				get_template_part('/template_part/owned-property','home');
				// Achievements
				get_template_part('/template_part/achievement','home');
				// Aucocreation
				get_template_part('/template_part/auctocreation','home');
			}
		?>
        <!-- Container (Contact Section) -->
        <div id="contact" class="container-fluid" style="background-color:#001b35f5;color:#FFF;padding: 60px 50px!important;">
            <h2 class="text-center">CONTACT</h2>
            <div class="row">
			    <div class="col-sm-1"></div>
                <div class="col-sm-4">
                    <p>Contact us and we'll get back to you soon.</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span>
                        Visit Us<br/>
					Aucto Creation 11,<br/> Janaki path <br/>Ganeshguri Guwahati-781006</p>
                    <p><span class="glyphicon glyphicon-phone"></span>
                        Call Us<br/>
                        0361-3139121
					</p>
                    <p><span class="glyphicon glyphicon-envelope"></span>
                        Mail Us<br/>
                        auctocreation@gmail.com , 
                        info@auctocreation.com
					</p>
				</div>
                <div class="col-sm-7 slideanim">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
						</div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
						</div>
					</div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-right" type="submit">Send</button>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- Add Google Maps -->
        <div class="container-fluid" style="padding: 60px 50px!important;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1790.7036815384095!2d91.78469667189856!3d26.150859497076464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5918f83e5165%3A0x3e122c01800c12fa!2sAUCTOCREATION!5e0!3m2!1sen!2sin!4v1527683321836" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
<?php	
	get_footer();
?>