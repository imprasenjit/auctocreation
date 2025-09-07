// WordPress Dynamic Content JavaScript for Modern Theme

(function ($) {
  "use strict";

  // Hero Background Slider
  class HeroSlider {
    constructor() {
      this.slides = $(".hero-bg-slide");
      this.indicators = $(".hero-slider-indicators .indicator");
      this.currentSlide = 0;
      this.slideCount = this.slides.length;
      this.isAutoPlaying = true;
      this.autoPlayInterval = null;

      if (this.slideCount > 1) {
        this.init();
      }
    }

    init() {
      this.bindEvents();
      this.startAutoPlay();
    }

    bindEvents() {
      // Previous button
      $(".slider-prev").on("click", () => {
        this.pauseAutoPlay();
        this.previousSlide();
        this.resumeAutoPlay();
      });

      // Next button
      $(".slider-next").on("click", () => {
        this.pauseAutoPlay();
        this.nextSlide();
        this.resumeAutoPlay();
      });

      // Indicators
      this.indicators.on("click", (e) => {
        this.pauseAutoPlay();
        const slideIndex = parseInt($(e.target).data("slide"));
        this.goToSlide(slideIndex);
        this.resumeAutoPlay();
      });

      // Pause on hover
      $("#modern-hero")
        .on("mouseenter", () => {
          this.pauseAutoPlay();
        })
        .on("mouseleave", () => {
          this.resumeAutoPlay();
        });
    }

    nextSlide() {
      const nextSlide = (this.currentSlide + 1) % this.slideCount;
      this.goToSlide(nextSlide);
    }

    previousSlide() {
      const prevSlide =
        (this.currentSlide - 1 + this.slideCount) % this.slideCount;
      this.goToSlide(prevSlide);
    }

    goToSlide(slideIndex) {
      if (slideIndex === this.currentSlide) return;

      // Remove active class from current slide and indicator
      this.slides.eq(this.currentSlide).removeClass("active");
      this.indicators.eq(this.currentSlide).removeClass("active");

      // Add active class to new slide and indicator
      this.slides.eq(slideIndex).addClass("active");
      this.indicators.eq(slideIndex).addClass("active");

      this.currentSlide = slideIndex;
    }

    startAutoPlay() {
      if (this.slideCount <= 1) return;

      this.autoPlayInterval = setInterval(() => {
        if (this.isAutoPlaying) {
          this.nextSlide();
        }
      }, 5000); // Change slide every 5 seconds
    }

    pauseAutoPlay() {
      this.isAutoPlaying = false;
    }

    resumeAutoPlay() {
      this.isAutoPlaying = true;
    }

    destroy() {
      if (this.autoPlayInterval) {
        clearInterval(this.autoPlayInterval);
      }
    }
  }

  // Gallery Lightbox Enhancement
  function initGalleryLightbox() {
    // Enhanced lightbox functionality for gallery
    $(".gallery-zoom").on("click", function (e) {
      e.preventDefault();

      const imageUrl = $(this).attr("href");
      const title = $(this).data("title") || "";

      // Create lightbox overlay
      const lightboxHTML = `
                <div class="modern-lightbox-overlay">
                    <div class="modern-lightbox-container">
                        <button class="modern-lightbox-close">
                            <i class="fas fa-times"></i>
                        </button>
                        <img src="${imageUrl}" alt="${title}" class="modern-lightbox-image">
                        ${
                          title
                            ? `<div class="modern-lightbox-caption">${title}</div>`
                            : ""
                        }
                    </div>
                </div>
            `;

      $("body").append(lightboxHTML);

      // Bind close events
      $(".modern-lightbox-close, .modern-lightbox-overlay").on(
        "click",
        function (e) {
          if (e.target === this) {
            $(".modern-lightbox-overlay").fadeOut(300, function () {
              $(this).remove();
            });
          }
        }
      );

      // Close on escape key
      $(document).on("keyup.lightbox", function (e) {
        if (e.keyCode === 27) {
          // ESC key
          $(".modern-lightbox-overlay").fadeOut(300, function () {
            $(this).remove();
          });
          $(document).off("keyup.lightbox");
        }
      });
    });
  }

  // Festival Modal (placeholder function)
  window.openFestivalModal = function (festivalId) {
    // This would typically fetch more details about the festival
    // For now, we'll just show an alert
    console.log("Opening festival modal for ID:", festivalId);

    // You could implement a proper modal here
    alert("Festival details modal would open here. Festival ID: " + festivalId);
  };

  // Number Counter Animation for Stats
  function animateCounters() {
    $(".stat-number-modern").each(function () {
      const $this = $(this);
      const countTo = parseInt($this.data("count"));

      if (countTo > 0) {
        $({ countNum: 0 }).animate(
          {
            countNum: countTo,
          },
          {
            duration: 2000,
            easing: "swing",
            step: function () {
              $this.text(Math.floor(this.countNum));
            },
            complete: function () {
              $this.text(countTo + "+");
            },
          }
        );
      }
    });
  }

  // Initialize everything when document is ready
  $(document).ready(function () {
    // Inject lightbox CSS
    $("<style>")
      .prop("type", "text/css")
      .html(
        `
        .modern-lightbox-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }
        
        .modern-lightbox-container {
            position: relative;
            max-width: 90%;
            max-height: 90%;
            text-align: center;
        }
        
        .modern-lightbox-close {
            position: absolute;
            top: -40px;
            right: -40px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .modern-lightbox-close:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }
        
        .modern-lightbox-image {
            max-width: 100%;
            max-height: 80vh;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        
        .modern-lightbox-caption {
            color: white;
            margin-top: 15px;
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        @media (max-width: 768px) {
            .modern-lightbox-close {
                top: -30px;
                right: -10px;
                width: 35px;
                height: 35px;
            }
        }
    `
      )
      .appendTo("head");

    // Initialize hero slider
    const heroSlider = new HeroSlider();

    // Initialize gallery lightbox
    initGalleryLightbox();

    // Animate counters when they come into view
    if ($(".stat-number-modern").length) {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              animateCounters();
              observer.disconnect(); // Only animate once
            }
          });
        },
        { threshold: 0.5 }
      );

      $(".stats-grid-modern").each(function () {
        observer.observe(this);
      });
    }

    // Enhanced hover effects for service cards
    $(".service-card-modern").hover(
      function () {
        $(this).find(".service-glow").css("opacity", "1");
      },
      function () {
        $(this).find(".service-glow").css("opacity", "0");
      }
    );

    // Smooth scroll for anchor links
    $('a[href^="#"]').on("click", function (e) {
      const target = $($(this).attr("href"));
      if (target.length) {
        e.preventDefault();
        $("html, body").animate(
          {
            scrollTop: target.offset().top - 80,
          },
          800
        );
      }
    });

    // AOS refresh after dynamic content loads
    // setTimeout(function () {
    //   if (typeof AOS !== "undefined") {
    //     AOS.refresh();
    //     console.log("AOS refreshed from wordpress-dynamic.js");
    //   }
    // }, 1000);

    // Refresh AOS on window resize
    $(window).on("resize", function () {
      if (typeof AOS !== "undefined") {
        setTimeout(function () {
          AOS.refresh();
        }, 300);
      }
    });
  });

  // Dynamic content refresh
  setTimeout(function () {
    console.log("WordPress Dynamic content refreshed");
  }, 1000);

  // Window resize handler
  $(window).on("resize", function () {
    console.log("Window resized - refreshing dynamic elements");
  });

  // Cleanup on page unload
  $(window).on("beforeunload", function () {
    if (window.heroSliderInstance) {
      window.heroSliderInstance.destroy();
    }
  });
})(jQuery);
