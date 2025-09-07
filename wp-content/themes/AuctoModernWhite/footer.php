    </main>

    <!-- Modern Contact Footer Section -->
    <section class="modern-contact-footer">
    	<div class="container">
    		<div class="contact-footer-content">
    			<div class="row g-4 align-items-center">
    				<!-- Contact Info -->
    				<div class="col-lg-4">
    					<div class="contact-item">
    						<div class="contact-icon">
    							<i class="fas fa-map-marker-alt"></i>
    						</div>
    						<div class="contact-details">
    							<h5>Visit Us</h5>
    							<p>Aucto Creation 11, Janaki path<br>Ganeshguri Guwahati-781006</p>
    						</div>
    					</div>
    				</div>

    				<!-- Phone Info -->
    				<div class="col-lg-4">
    					<div class="contact-item">
    						<div class="contact-icon">
    							<i class="fas fa-phone"></i>
    						</div>
    						<div class="contact-details">
    							<h5>Call Us</h5>
    							<p><a href="tel:0361-3139121" class="contact-link">0361-3139121</a></p>
    						</div>
    					</div>
    				</div>

    				<!-- Email Info -->
    				<div class="col-lg-4">
    					<div class="contact-item">
    						<div class="contact-icon">
    							<i class="fas fa-envelope"></i>
    						</div>
    						<div class="contact-details">
    							<h5>Email Us</h5>
    							<p>
    								<a href="mailto:auctocreation@gmail.com" class="contact-link">auctocreation@gmail.com</a><br>
    								<a href="mailto:info@auctocreation.com" class="contact-link">info@auctocreation.com</a>
    							</p>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <!-- Modern Minimalist Footer -->
    <footer class="modern-minimalist-footer" role="contentinfo">
    	<div class="container">
    		<!-- Main Footer Content -->
    		<div class="footer-main">
    			<!-- Left: Links -->
    			<div class="footer-links">
    				<a href="/privacy-policy" class="footer-link">Privacy Policy</a>
    				<a href="/terms-conditions" class="footer-link">Terms and Conditions</a>
    			</div>

    			<!-- Center: Brand -->
    			<div class="footer-brand">
    				<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
    					<img class="footer-logo"
    						src="<?php echo get_template_directory_uri(); ?>/images/logo/logo.jpg"
    						alt="<?php bloginfo('name'); ?> Logo"
    						width="80"
    						height="56">
    				</a>
    			</div> <!-- Right: Social Media -->
    			<div class="footer-social">
    				<span class="social-label">Follow us at</span>
    				<div class="social-icons">
    					<a href="#" class="social-link linkedin" aria-label="LinkedIn">
    						<i class="fab fa-linkedin-in" aria-hidden="true"></i>
    					</a>
    					<a href="#" class="social-link vimeo" aria-label="Vimeo">
    						<i class="fab fa-vimeo-v" aria-hidden="true"></i>
    					</a>
    					<a href="#" class="social-link instagram" aria-label="Instagram">
    						<i class="fab fa-instagram" aria-hidden="true"></i>
    					</a>
    				</div>
    			</div>
    		</div>

    		<!-- Bottom: Copyright -->
    		<div class="footer-bottom">
    			<p class="copyright-text">© copyright <?php echo date('Y'); ?>, all rights reserved</p>
    		</div>
    	</div>

    	<!-- Back to Top Button -->
    	<a href="#top" class="modern-back-to-top" aria-label="Back to top">
    		<i class="fas fa-chevron-up" aria-hidden="true"></i>
    	</a>
    </footer>

    <?php wp_footer(); ?>

    <!-- <a href="#contact" class="floating-cta" aria-label="Quick Contact">
    	<i class="fas fa-headset" aria-hidden="true"></i>
    	Contact Us
    </a> -->

    <!-- Custom Theme JavaScript -->
    <script>
    	// Initialize AOS
    	AOS.init({
    		duration: 800,
    		easing: 'ease-in-out',
    		once: true,
    		mirror: false
    	});

    	// Typing Animation Script
    	document.addEventListener('DOMContentLoaded', function() {
    		const typingLine = document.querySelector('.typing-line');
    		if (!typingLine) return;

    		const textElement = typingLine.querySelector('.typing-text');
    		const cursor = typingLine.querySelector('.typing-cursor');

    		// Make the line visible immediately
    		typingLine.classList.add('active');

    		// Get texts from data attribute
    		const textsData = textElement.getAttribute('data-texts');
    		const texts = textsData ? JSON.parse(textsData) : ['Welcome to Aucto Creation', 'Your Vision, Our Expertise', 'Creating Excellence Together'];
    		let currentTextIndex = 0;
    		let isDeleting = false;
    		let currentText = '';
    		let charIndex = 0;

    		function typeEffect() {
    			const fullText = texts[currentTextIndex];

    			if (isDeleting) {
    				// Remove characters
    				currentText = fullText.substring(0, charIndex - 1);
    				charIndex--;
    			} else {
    				// Add characters
    				currentText = fullText.substring(0, charIndex + 1);
    				charIndex++;
    			}

    			// Update the display
    			textElement.textContent = currentText;

    			// Smoother typing speeds with variable timing
    			let typeSpeed;

    			if (isDeleting) {
    				// Faster deletion
    				typeSpeed = Math.random() * 30 + 25; // 25-55ms
    			} else {
    				// More natural typing with slight variations
    				typeSpeed = Math.random() * 50 + 60; // 60-110ms

    				// Slower for punctuation and pauses
    				const lastChar = currentText.slice(-1);
    				if (lastChar === '.' || lastChar === ',' || lastChar === '!' || lastChar === '?') {
    					typeSpeed += Math.random() * 200 + 150; // 150-350ms pause after punctuation
    				} else if (lastChar === ' ') {
    					typeSpeed += Math.random() * 50 + 25; // 25-75ms pause after spaces
    				}
    			}

    			// If word is complete
    			if (!isDeleting && charIndex === fullText.length) {
    				// Longer pause at end of complete text
    				typeSpeed = Math.random() * 1000 + 2500; // 2.5-3.5 seconds
    				isDeleting = true;
    			} else if (isDeleting && charIndex === 0) {
    				// Move to next text
    				isDeleting = false;
    				currentTextIndex = (currentTextIndex + 1) % texts.length;
    				typeSpeed = Math.random() * 300 + 400; // 400-700ms between texts
    			}

    			setTimeout(typeEffect, typeSpeed);
    		} // Start the animation
    		typeEffect();
    	}); // Modern Navigation Scroll Effect
    	window.addEventListener('scroll', function() {
    		const navbar = document.querySelector('.modern-navbar .navbar');
    		if (window.scrollY > 50) {
    			navbar.classList.add('scrolled');
    		} else {
    			navbar.classList.remove('scrolled');
    		}
    	});

    	// Smooth scrolling for anchor links with navbar offset
    	document.querySelectorAll('.smooth-scroll').forEach(anchor => {
    		anchor.addEventListener('click', function(e) {
    			e.preventDefault();
    			const targetId = this.getAttribute('href').split('#')[1];
    			const targetElement = document.getElementById(targetId);

    			if (targetElement) {
    				const navbarHeight = document.querySelector('.modern-navbar .navbar').offsetHeight;
    				const targetPosition = targetElement.offsetTop - navbarHeight - 20;

    				// Ultra-smooth custom scrolling function
    				function ultraSmoothScrollTo(targetY) {
    					const startingY = window.pageYOffset;
    					const diff = targetY - startingY;
    					const distance = Math.abs(diff);

    					// Dynamic duration based on distance - longer for farther distances
    					const duration = Math.min(2500, Math.max(1200, distance * 1.5));
    					let startTime = null;

    					function step(timestamp) {
    						if (!startTime) startTime = timestamp;
    						const progress = Math.min((timestamp - startTime) / duration, 1);

    						// Ultra-smooth easing function (ease-in-out-cubic with extra smoothness)
    						const easeInOutCubic = progress < 0.5 ?
    							4 * progress * progress * progress :
    							1 - Math.pow(-2 * progress + 2, 3) / 2;

    						const currentY = startingY + (diff * easeInOutCubic);
    						window.scrollTo(0, currentY);

    						if (progress < 1) {
    							requestAnimationFrame(step);
    						}
    					}

    					requestAnimationFrame(step);
    				}

    				ultraSmoothScrollTo(targetPosition);

    				// Close mobile menu if open
    				const navbarCollapse = document.querySelector('.navbar-collapse');
    				if (navbarCollapse.classList.contains('show')) {
    					const bsCollapse = new bootstrap.Collapse(navbarCollapse);
    					bsCollapse.hide();
    				}
    			}
    		});
    	});

    	// Enhanced Mobile Navigation
    	document.addEventListener('DOMContentLoaded', function() {
    		// Auto-close mobile menu when clicking outside
    		document.addEventListener('click', function(e) {
    			const navbar = document.querySelector('.navbar-collapse');
    			const toggler = document.querySelector('.navbar-toggler');

    			if (navbar && navbar.classList.contains('show') &&
    				!navbar.contains(e.target) &&
    				!toggler.contains(e.target)) {
    				const bsCollapse = new bootstrap.Collapse(navbar);
    				bsCollapse.hide();
    			}
    		});

    		// Add animation to mobile menu items
    		const navItems = document.querySelectorAll('.navbar-nav .nav-item');
    		navItems.forEach((item, index) => {
    			item.style.animationDelay = `${index * 0.1}s`;
    		});

    		// Highlight active section in navigation
    		function highlightActiveSection() {
    			const sections = document.querySelectorAll('section[id]');
    			const navLinks = document.querySelectorAll('.nav-link[href^="#"]');

    			let current = '';
    			sections.forEach(section => {
    				const sectionTop = section.offsetTop - 100;
    				if (window.pageYOffset >= sectionTop) {
    					current = section.getAttribute('id');
    				}
    			});

    			navLinks.forEach(link => {
    				link.classList.remove('active');
    				if (link.getAttribute('href') === '#' + current) {
    					link.classList.add('active');
    				}
    			});
    		}

    		// Update active section on scroll
    		window.addEventListener('scroll', highlightActiveSection);
    		highlightActiveSection(); // Initial check
    	});

    	// Back to top functionality
    	const backToTopBtn = document.querySelector('.modern-back-to-top');

    	// Show/hide back to top button based on scroll position
    	function toggleBackToTop() {
    		if (window.pageYOffset > 300) {
    			backToTopBtn?.classList.add('visible');
    		} else {
    			backToTopBtn?.classList.remove('visible');
    		}
    	}

    	window.addEventListener('scroll', toggleBackToTop);
    	toggleBackToTop(); // Initial check

    	document.querySelector('.modern-back-to-top')?.addEventListener('click', function(e) {
    		e.preventDefault();

    		// Custom smooth scrolling function for slower, more controlled scrolling
    		function smoothScrollToTop() {
    			const startingY = window.pageYOffset;
    			const targetY = 0;
    			const diff = targetY - startingY;
    			const duration = Math.min(3500, Math.max(1500, Math.abs(diff) * 3)); // 1500ms to 3500ms based on distance
    			let startTime = null;

    			function step(timestamp) {
    				if (!startTime) startTime = timestamp;
    				const progress = Math.min((timestamp - startTime) / duration, 1);

    				// Easing function for very smooth animation (ease-out-quart)
    				const ease = 1 - Math.pow(1 - progress, 4);

    				window.scrollTo(0, startingY + (diff * ease));

    				if (progress < 1) {
    					requestAnimationFrame(step);
    				}
    			}

    			requestAnimationFrame(step);
    		}

    		smoothScrollToTop();
    	});
    </script>
    </body>

    </html>