/**
 * Theme Coordinator JavaScript
 * Handles initialization order, error handling, and performance optimization
 * for the AuctoModern WordPress theme
 */

(function () {
  "use strict";

  // Theme initialization state tracker
  window.AuctoModernTheme = {
    initialized: false,
    components: {
      aos: false,
      sliders: false,
      forms: false,
      animations: false,
    },
    errors: [],
  };

  // Error handling wrapper
  function safeExecute(func, name) {
    try {
      return func();
    } catch (error) {
      console.error(`AuctoModern Theme Error in ${name}:`, error);
      window.AuctoModernTheme.errors.push({
        component: name,
        error: error.message,
        timestamp: new Date().toISOString(),
      });
      return false;
    }
  }

  // Initialize AOS with error handling
  function initializeAOS() {
    return safeExecute(function () {
      if (typeof AOS !== "undefined") {
        AOS.init({
          duration: 800,
          once: true,
          offset: 100,
          easing: "ease-out-cubic",
          delay: 50,
        });
        window.AuctoModernTheme.components.aos = true;
        console.log("AOS initialized successfully");
        return true;
      } else {
        console.warn("AOS library not loaded");
        return false;
      }
    }, "AOS");
  }

  // Initialize sliders with error handling
  function initializeSliders() {
    return safeExecute(function () {
      if (typeof jQuery !== "undefined" && window.HeroSlider) {
        window.heroSliderInstance = new window.HeroSlider();
        window.AuctoModernTheme.components.sliders = true;
        console.log("Hero slider initialized successfully");
        return true;
      }
      return false;
    }, "Sliders");
  }

  // Initialize form enhancements
  function initializeForms() {
    return safeExecute(function () {
      // Contact form enhancements
      const contactForm = document.getElementById("contactForm");
      if (contactForm) {
        // Add form validation and submit handling
        contactForm.addEventListener("submit", function (e) {
          e.preventDefault();

          // Basic validation
          const requiredFields = contactForm.querySelectorAll("[required]");
          let isValid = true;

          requiredFields.forEach((field) => {
            if (!field.value.trim()) {
              field.classList.add("error");
              isValid = false;
            } else {
              field.classList.remove("error");
            }
          });

          if (isValid) {
            console.log("Form submitted successfully");
            // Here you would normally submit the form data
            alert("Thank you for your message! We will get back to you soon.");
          }
        });
      }

      // Newsletter form
      const newsletterForm = document.querySelector(".newsletter-form");
      if (newsletterForm) {
        newsletterForm.addEventListener("submit", function (e) {
          e.preventDefault();
          const email = this.querySelector('input[type="email"]');
          if (email && email.value.trim()) {
            console.log("Newsletter signup:", email.value);
            alert("Thank you for subscribing to our newsletter!");
            email.value = "";
          }
        });
      }

      window.AuctoModernTheme.components.forms = true;
      return true;
    }, "Forms");
  }

  // Initialize animations and interactions
  function initializeAnimations() {
    return safeExecute(function () {
      // Smooth scroll for anchor links
      document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
          const target = document.querySelector(this.getAttribute("href"));
          if (target) {
            e.preventDefault();
            target.scrollIntoView({
              behavior: "smooth",
              block: "start",
            });
          }
        });
      });

      // Service card hover effects
      document.querySelectorAll(".service-card-modern").forEach((card) => {
        const glow = card.querySelector(".service-glow");
        if (glow) {
          card.addEventListener("mouseenter", () => {
            glow.style.opacity = "1";
          });
          card.addEventListener("mouseleave", () => {
            glow.style.opacity = "0";
          });
        }
      });

      // Stats counter animation
      const observerOptions = {
        threshold: 0.5,
        rootMargin: "0px 0px -50px 0px",
      };

      const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const counter = entry.target;
            const countTo = parseInt(counter.dataset.count);

            if (countTo && !counter.classList.contains("counted")) {
              counter.classList.add("counted");
              animateCounter(counter, countTo);
            }
          }
        });
      }, observerOptions);

      document.querySelectorAll(".stat-number-modern").forEach((counter) => {
        statsObserver.observe(counter);
      });

      window.AuctoModernTheme.components.animations = true;
      return true;
    }, "Animations");
  }

  // Counter animation function
  function animateCounter(element, target) {
    let current = 0;
    const increment = target / 100;
    const duration = 2000;
    const stepTime = duration / 100;

    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        element.textContent = target + "+";
        clearInterval(timer);
      } else {
        element.textContent = Math.floor(current);
      }
    }, stepTime);
  }

  // Performance optimization: Debounced scroll handler
  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  // Main initialization function
  function initializeTheme() {
    console.log("AuctoModern Theme initializing...");

    // Wait for all dependencies to load
    let initAttempts = 0;
    const maxAttempts = 50;

    function attemptInit() {
      initAttempts++;

      // Check if core dependencies are loaded
      const jQueryReady = typeof jQuery !== "undefined";
      const bootstrapReady =
        typeof bootstrap !== "undefined" ||
        (window.bootstrap && typeof window.bootstrap === "object");

      if (jQueryReady && bootstrapReady) {
        // Initialize components in order
        setTimeout(() => initializeAOS(), 100);
        setTimeout(() => initializeSliders(), 200);
        setTimeout(() => initializeForms(), 300);
        setTimeout(() => initializeAnimations(), 400);

        window.AuctoModernTheme.initialized = true;
        console.log("AuctoModern Theme initialized successfully");

        // Dispatch custom event
        document.dispatchEvent(
          new CustomEvent("auctocreation:theme:ready", {
            detail: window.AuctoModernTheme,
          })
        );
      } else if (initAttempts < maxAttempts) {
        setTimeout(attemptInit, 100);
      } else {
        console.warn(
          "AuctoModern Theme: Dependencies not loaded after maximum attempts"
        );
      }
    }

    attemptInit();
  }

  // Initialize when DOM is ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initializeTheme);
  } else {
    initializeTheme();
  }

  // Refresh AOS on window resize (debounced)
  const debouncedAOSRefresh = debounce(() => {
    if (typeof AOS !== "undefined" && window.AuctoModernTheme.components.aos) {
      AOS.refresh();
    }
  }, 250);

  window.addEventListener("resize", debouncedAOSRefresh);

  // Expose theme status for debugging
  window.getThemeStatus = function () {
    console.table(window.AuctoModernTheme);
    if (window.AuctoModernTheme.errors.length > 0) {
      console.group("Theme Errors:");
      window.AuctoModernTheme.errors.forEach((error) => {
        console.error(
          `${error.component}: ${error.error} (${error.timestamp})`
        );
      });
      console.groupEnd();
    }
  };
})();
