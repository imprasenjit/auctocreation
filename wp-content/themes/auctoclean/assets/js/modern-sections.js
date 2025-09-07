/* Modern Sections JavaScript */
document.addEventListener("DOMContentLoaded", function () {
  // Initialize all modern section effects
  initModernEffects();
  initDynamicBackgrounds();

  function initModernEffects() {
    initCounterAnimations();
    initServiceHoverEffects();
    initContactAnimations();
    initParticleAnimations();
    initFormEnhancements();
  }

  // Dynamic Background Image Rotation
  function initDynamicBackgrounds() {
    const backgroundImages = {
      hero: ["banner.jpg", "banner1.jpg", "ban.jpg", "ban2.jpg"],
      about: ["back_pic1.jpg", "1.jpg", "2.jpg", "3.jpg"],
      services: ["back_pic2.jpg", "5.jpg", "8.jpg", "9.jpg"],
      contact: ["back_pic3.jpg", "newyork.jpg", "paris.jpg", "sanfran.jpg"],
      footer: ["back_pic4.jpg", "10.jpg", "11.jpg", "bg1.jpg"],
    };

    // Preload background images for smooth transitions
    function preloadImages() {
      const allImages = [
        ...backgroundImages.hero,
        ...backgroundImages.about,
        ...backgroundImages.services,
        ...backgroundImages.contact,
        ...backgroundImages.footer,
      ];

      allImages.forEach((imageName) => {
        const img = new Image();
        img.src = `${modern_theme_object.images_url}${imageName}`;
      });
    }

    // Change hero background every 15 seconds with smooth transition
    let heroIndex = 0;
    const heroSection = document.querySelector(".hero-section-modern");
    if (heroSection) {
      preloadImages(); // Start preloading

      setInterval(() => {
        heroSection.classList.add("bg-loading", "loading");

        setTimeout(() => {
          heroIndex = (heroIndex + 1) % backgroundImages.hero.length;
          const imageUrl = `url('${modern_theme_object.images_url}${backgroundImages.hero[heroIndex]}')`;
          heroSection.style.backgroundImage = `linear-gradient(rgba(10, 10, 10, 0.7), rgba(10, 10, 10, 0.7)), ${imageUrl}`;

          setTimeout(() => {
            heroSection.classList.remove("loading");
          }, 500);
        }, 300);
      }, 15000);
    }

    // Randomly assign background images on page load with fade effect
    const sections = [
      { selector: ".section-bg-dark", images: backgroundImages.about },
      { selector: ".section-bg-services", images: backgroundImages.services },
      { selector: ".contact-bg-modern", images: backgroundImages.contact },
    ];

    sections.forEach((section, index) => {
      const element = document.querySelector(section.selector);
      if (element) {
        // Add loading class
        element.classList.add("bg-loading");

        setTimeout(() => {
          const randomImage =
            section.images[Math.floor(Math.random() * section.images.length)];
          const imageUrl = `url('${modern_theme_object.images_url}${randomImage}')`;
          element.style.backgroundImage = `linear-gradient(rgba(10, 10, 10, 0.8), rgba(10, 10, 10, 0.8)), ${imageUrl}`;

          // Remove loading class after image loads
          setTimeout(() => {
            element.classList.remove("bg-loading");
          }, 1000);
        }, index * 500); // Stagger the loading
      }
    });

    // Add background change on scroll for variety (optional)
    let scrollTimeout;
    window.addEventListener("scroll", () => {
      clearTimeout(scrollTimeout);
      scrollTimeout = setTimeout(() => {
        const scrollPercent =
          window.pageYOffset /
          (document.documentElement.scrollHeight - window.innerHeight);

        // Change footer background based on scroll position
        const footerBg = document.querySelector(".footer-bg-modern");
        if (footerBg && scrollPercent > 0.8) {
          const footerImageIndex =
            Math.floor(scrollPercent * backgroundImages.footer.length) %
            backgroundImages.footer.length;
          const imageUrl = `url('${modern_theme_object.images_url}${backgroundImages.footer[footerImageIndex]}')`;
          footerBg.style.backgroundImage = `linear-gradient(rgba(10, 10, 10, 0.9), rgba(10, 10, 10, 0.9)), ${imageUrl}`;
        }
      }, 100);
    });

    // Fallback for failed image loading
    function handleImageError(element, fallbackImage) {
      const img = new Image();
      img.onload = () => {
        element.style.backgroundImage = `linear-gradient(rgba(10, 10, 10, 0.8), rgba(10, 10, 10, 0.8)), url('${modern_theme_object.images_url}${fallbackImage}')`;
      };
      img.onerror = () => {
        // Ultimate fallback to solid color with pattern
        element.style.background = `
          linear-gradient(rgba(10, 10, 10, 0.9), rgba(10, 10, 10, 0.9)),
          radial-gradient(circle at 25% 25%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
          radial-gradient(circle at 75% 75%, rgba(255, 107, 53, 0.1) 0%, transparent 50%),
          var(--modern-dark)
        `;
      };
      img.src = `${modern_theme_object.images_url}${fallbackImage}`;
    }

    // Test image loading and apply fallbacks
    function testAndApplyBackgrounds() {
      const testElements = [
        { element: heroSection, image: "banner.jpg" },
        {
          element: document.querySelector(".section-bg-dark"),
          image: "back_pic1.jpg",
        },
        {
          element: document.querySelector(".section-bg-services"),
          image: "back_pic2.jpg",
        },
        {
          element: document.querySelector(".contact-bg-modern"),
          image: "back_pic3.jpg",
        },
      ];

      testElements.forEach(({ element, image }) => {
        if (element) {
          const testImg = new Image();
          testImg.onerror = () => handleImageError(element, "bg1.jpg"); // Final fallback
          testImg.src = `../images/backgrounds/${image}`;
        }
      });
    }

    // Run background tests
    testAndApplyBackgrounds();
  }

  // Counter Animation
  function initCounterAnimations() {
    const counters = document.querySelectorAll(".stat-number-modern");
    const observerOptions = {
      threshold: 0.3,
      rootMargin: "0px 0px -50px 0px",
    };

    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObserver.unobserve(entry.target);
        }
      });
    }, observerOptions);

    counters.forEach((counter) => {
      counterObserver.observe(counter);
    });
  }

  function animateCounter(element) {
    const target = parseInt(element.textContent.replace(/\D/g, ""));
    const suffix = element.textContent.match(/\D+$/);
    const duration = 2000;
    const step = target / (duration / 16);
    let current = 0;

    element.classList.add("animate-counter");

    const timer = setInterval(() => {
      current += step;
      if (current >= target) {
        element.textContent = target + (suffix ? suffix[0] : "");
        clearInterval(timer);
      } else {
        element.textContent = Math.floor(current) + (suffix ? suffix[0] : "");
      }
    }, 16);
  }

  // Service Cards Hover Effects
  function initServiceHoverEffects() {
    const serviceCards = document.querySelectorAll(".service-card-modern");

    serviceCards.forEach((card) => {
      card.addEventListener("mouseenter", function () {
        // Add floating animation to icon
        const icon = this.querySelector(".service-icon-modern");
        if (icon) {
          icon.style.animation = "serviceIconFloat 0.6s ease-in-out";
        }

        // Animate service features
        const features = this.querySelectorAll(".service-features li");
        features.forEach((feature, index) => {
          setTimeout(() => {
            feature.style.transform = "translateX(10px)";
            feature.style.transition = "transform 0.3s ease";
          }, index * 50);
        });
      });

      card.addEventListener("mouseleave", function () {
        const icon = this.querySelector(".service-icon-modern");
        if (icon) {
          icon.style.animation = "";
        }

        const features = this.querySelectorAll(".service-features li");
        features.forEach((feature) => {
          feature.style.transform = "translateX(0)";
        });
      });
    });
  }

  // Contact Card Animations
  function initContactAnimations() {
    const contactCards = document.querySelectorAll(".contact-card-modern");

    contactCards.forEach((card) => {
      card.addEventListener("mouseenter", function () {
        const icon = this.querySelector(".contact-icon-modern");
        if (icon) {
          icon.style.transform = "scale(1.1) rotate(5deg)";
          icon.style.transition = "transform 0.3s ease";
        }
      });

      card.addEventListener("mouseleave", function () {
        const icon = this.querySelector(".contact-icon-modern");
        if (icon) {
          icon.style.transform = "scale(1) rotate(0deg)";
        }
      });
    });

    // Social links animation
    const socialLinks = document.querySelectorAll(".social-link-modern");
    socialLinks.forEach((link) => {
      link.addEventListener("mouseenter", function () {
        this.style.transform = "translateY(-5px) scale(1.1)";
      });

      link.addEventListener("mouseleave", function () {
        this.style.transform = "translateY(0) scale(1)";
      });
    });
  }

  // Particle System Enhancements
  function initParticleAnimations() {
    // Create additional dynamic particles
    createDynamicParticles(".floating-particles-about", "about-particle", 8);
    createDynamicParticles(".floating-shapes-services", "service-particle", 6);
    createDynamicParticles(".floating-elements-contact", "contact-particle", 5);
  }

  function createDynamicParticles(container, className, count) {
    const containerEl = document.querySelector(container);
    if (!containerEl) return;

    for (let i = 0; i < count; i++) {
      const particle = document.createElement("div");
      particle.className = `${className} dynamic-particle-${i}`;
      particle.style.cssText = `
                position: absolute;
                width: ${Math.random() * 6 + 2}px;
                height: ${Math.random() * 6 + 2}px;
                background: ${getRandomColor()};
                border-radius: 50%;
                box-shadow: 0 0 10px currentColor;
                top: ${Math.random() * 100}%;
                left: ${Math.random() * 100}%;
                animation: dynamicFloat ${
                  Math.random() * 3 + 4
                }s ease-in-out infinite;
                animation-delay: ${Math.random() * 2}s;
                opacity: 0.4;
            `;
      containerEl.appendChild(particle);
    }
  }

  function getRandomColor() {
    const colors = [
      "var(--modern-primary)",
      "var(--modern-secondary)",
      "var(--modern-accent)",
      "var(--modern-success)",
      "var(--modern-purple)",
    ];
    return colors[Math.floor(Math.random() * colors.length)];
  }

  // Enhanced Form Functionality
  function initFormEnhancements() {
    const form = document.querySelector(".modern-form");
    if (!form) return;

    const inputs = form.querySelectorAll(".form-control-modern");

    inputs.forEach((input) => {
      // Focus effects
      input.addEventListener("focus", function () {
        this.parentElement.classList.add("focused");
        this.style.transform = "scale(1.02)";
      });

      input.addEventListener("blur", function () {
        this.parentElement.classList.remove("focused");
        this.style.transform = "scale(1)";

        // Validation effects
        if (this.required && !this.value) {
          this.style.borderBottomColor = "var(--modern-accent)";
        } else if (this.value) {
          this.style.borderBottomColor = "var(--modern-success)";
        } else {
          this.style.borderBottomColor = "var(--modern-border)";
        }
      });

      // Input animation
      input.addEventListener("input", function () {
        if (this.value) {
          this.parentElement.classList.add("has-content");
        } else {
          this.parentElement.classList.remove("has-content");
        }
      });
    });

    // Form submission enhancement
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const submitBtn = this.querySelector('button[type="submit"]');
      if (submitBtn) {
        const originalText = submitBtn.textContent;
        submitBtn.textContent = "Sending...";
        submitBtn.style.background =
          "linear-gradient(135deg, var(--modern-success), var(--modern-primary))";

        // Simulate form submission (replace with actual form handling)
        setTimeout(() => {
          submitBtn.textContent = "Sent!";
          submitBtn.style.background =
            "linear-gradient(135deg, var(--modern-success), var(--modern-success))";

          setTimeout(() => {
            submitBtn.textContent = originalText;
            submitBtn.style.background = "";
          }, 2000);
        }, 2000);
      }
    });
  }

  // Stats Card Interaction
  const statCards = document.querySelectorAll(".stat-card-modern");
  statCards.forEach((card) => {
    card.addEventListener("mouseenter", function () {
      // Add ripple effect
      const rect = this.getBoundingClientRect();
      const ripple = document.createElement("div");
      ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(0, 212, 255, 0.1);
                transform: scale(0);
                animation: rippleEffect 0.6s ease-out;
                pointer-events: none;
                width: 100px;
                height: 100px;
                top: 50%;
                left: 50%;
                margin-top: -50px;
                margin-left: -50px;
            `;
      this.appendChild(ripple);

      setTimeout(() => ripple.remove(), 600);
    });
  });

  // Vision Card Animation
  const visionCard = document.querySelector(".vision-card-modern");
  if (visionCard) {
    const observerOptions = {
      threshold: 0.5,
    };

    const visionObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.style.animation = "visionAppear 0.8s ease-out forwards";
          visionObserver.unobserve(entry.target);
        }
      });
    }, observerOptions);

    visionObserver.observe(visionCard);
  }

  // Smooth scroll enhancement for modern sections
  const modernLinks = document.querySelectorAll('a[href^="#"]');
  modernLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });

  // Add parallax effect to background elements
  if (window.innerWidth > 768) {
    window.addEventListener("scroll", function () {
      const scrolled = window.pageYOffset;
      const parallaxElements = document.querySelectorAll(
        ".section-bg-dark, .section-bg-services, .contact-bg-modern"
      );

      parallaxElements.forEach((el) => {
        const speed = 0.5;
        el.style.transform = `translateY(${scrolled * speed}px)`;
      });
    });
  }
});

// Additional CSS animations via JavaScript
const additionalStyles = `
    @keyframes serviceIconFloat {
        0%, 100% { transform: translateY(0) scale(1); }
        50% { transform: translateY(-10px) scale(1.1); }
    }
    
    @keyframes dynamicFloat {
        0%, 100% { 
            transform: translateY(0) translateX(0) rotate(0deg);
            opacity: 0.3;
        }
        25% { 
            transform: translateY(-30px) translateX(10px) rotate(90deg);
            opacity: 0.8;
        }
        50% { 
            transform: translateY(-15px) translateX(-5px) rotate(180deg);
            opacity: 0.5;
        }
        75% { 
            transform: translateY(-45px) translateX(15px) rotate(270deg);
            opacity: 0.9;
        }
    }
    
    @keyframes rippleEffect {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes visionAppear {
        from {
            opacity: 0;
            transform: translate(-50%, -50%) scale(0.8);
        }
        to {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }
    }
    
    .form-group-modern.focused .form-control-modern {
        border-bottom-color: var(--modern-primary);
    }
    
    .form-group-modern.has-content .form-control-modern {
        border-bottom-color: var(--modern-success);
    }
`;

// Inject additional styles
const styleSheet = document.createElement("style");
styleSheet.textContent = additionalStyles;
document.head.appendChild(styleSheet);
