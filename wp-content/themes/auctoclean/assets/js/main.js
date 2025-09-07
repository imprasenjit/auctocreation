/**
 * AuctoModern Theme JavaScript
 * Modern interactive features and animations
 */

document.addEventListener("DOMContentLoaded", function () {
  // Initialize AOS (Animate On Scroll) if available
  if (typeof AOS !== "undefined") {
    AOS.init({
      duration: 1000,
      once: true,
      offset: 100,
      easing: "ease-in-out",
    });
  }

  // Navbar scroll effect
  const navbar = document.getElementById("mainNav");
  if (navbar) {
    function updateNavbar() {
      if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
      }
    }

    window.addEventListener("scroll", updateNavbar);
    updateNavbar(); // Call on load
  }

  // Back to top button functionality
  const backToTopBtn = document.getElementById("backToTop");
  if (backToTopBtn) {
    function toggleBackToTop() {
      if (window.scrollY > 300) {
        backToTopBtn.classList.add("show");
      } else {
        backToTopBtn.classList.remove("show");
      }
    }

    window.addEventListener("scroll", toggleBackToTop);

    backToTopBtn.addEventListener("click", function (e) {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  }

  // EventCon Countdown Timer
  function initCountdown() {
    // Set the date for the event (February 12, 2025)
    const eventDate = new Date("February 12, 2025 20:00:00").getTime();

    const countdown = setInterval(function () {
      const now = new Date().getTime();
      const distance = eventDate - now;

      if (distance > 0) {
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor(
          (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Update the countdown display
        const daysEl = document.getElementById("days");
        const hoursEl = document.getElementById("hours");
        const minutesEl = document.getElementById("minutes");
        const secondsEl = document.getElementById("seconds");

        if (daysEl) daysEl.textContent = days;
        if (hoursEl) hoursEl.textContent = hours;
        if (minutesEl) minutesEl.textContent = minutes;
        if (secondsEl) secondsEl.textContent = seconds;
      } else {
        // Event has passed
        clearInterval(countdown);
        const countdownTimer = document.querySelector(".countdown-timer");
        if (countdownTimer) {
          countdownTimer.innerHTML =
            '<div class="text-center"><h3 class="text-accent">Event Started!</h3></div>';
        }
      }
    }, 1000);
  }

  // Initialize countdown if countdown timer exists
  if (document.querySelector(".countdown-timer")) {
    initCountdown();
  }

  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));

      if (target) {
        const navbarHeight = navbar ? navbar.offsetHeight : 0;
        const targetPosition = target.offsetTop - navbarHeight - 20;

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });
      }
    });
  });

  // Loading animation for images
  const images = document.querySelectorAll("img[data-src]");
  if ("IntersectionObserver" in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.classList.remove("lazy");
          imageObserver.unobserve(img);
        }
      });
    });

    images.forEach((img) => imageObserver.observe(img));
  } else {
    // Fallback for older browsers
    images.forEach((img) => {
      img.src = img.dataset.src;
      img.classList.remove("lazy");
    });
  }

  // Parallax effect for hero section
  const heroSection = document.querySelector(".hero-section");
  if (heroSection) {
    window.addEventListener("scroll", () => {
      const scrolled = window.pageYOffset;
      const parallax = heroSection.querySelector(".hero-bg-pattern");
      if (parallax) {
        parallax.style.transform = `translateY(${scrolled * 0.5}px)`;
      }
    });
  }

  // Counter animation for statistics
  const counters = document.querySelectorAll(".stat-number");
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        const target = parseInt(counter.textContent.replace(/[^\d]/g, ""));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
          current += step;
          if (current >= target) {
            counter.textContent = counter.textContent.replace(
              /[\d,]+/,
              target.toLocaleString()
            );
            clearInterval(timer);
          } else {
            counter.textContent = counter.textContent.replace(
              /[\d,]+/,
              Math.floor(current).toLocaleString()
            );
          }
        }, 16);

        counterObserver.unobserve(counter);
      }
    });
  });

  counters.forEach((counter) => counterObserver.observe(counter));

  // Gallery filter functionality
  const filterButtons = document.querySelectorAll(".filter-btn");
  const galleryItems = document.querySelectorAll(".gallery-item");

  filterButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const filter = this.getAttribute("data-filter");

      // Update active button
      filterButtons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");

      // Filter gallery items
      galleryItems.forEach((item) => {
        if (filter === "*" || item.classList.contains(filter.substring(1))) {
          item.style.display = "block";
          item.classList.remove("hidden");
        } else {
          item.classList.add("hidden");
          setTimeout(() => {
            if (item.classList.contains("hidden")) {
              item.style.display = "none";
            }
          }, 300);
        }
      });
    });
  });

  // Form validation and submission
  const contactForms = document.querySelectorAll(
    'form[id*="contact"], form[id*="booking"]'
  );
  contactForms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      // Basic form validation
      const requiredFields = form.querySelectorAll("[required]");
      let isValid = true;

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          field.classList.add("is-invalid");
          isValid = false;
        } else {
          field.classList.remove("is-invalid");
        }
      });

      if (isValid) {
        // Show loading state
        const submitBtn = form.querySelector(
          '[type="submit"], button[onclick*="submit"]'
        );
        if (submitBtn) {
          submitBtn.innerHTML =
            '<i class="fas fa-spinner fa-spin me-2"></i>Submitting...';
          submitBtn.disabled = true;
        }

        // Simulate form submission (replace with actual AJAX call)
        setTimeout(() => {
          showNotification(
            "Thank you! Your message has been sent successfully.",
            "success"
          );
          form.reset();

          if (submitBtn) {
            submitBtn.innerHTML = "Submit";
            submitBtn.disabled = false;
          }

          // Close modal if form is in a modal
          const modal = form.closest(".modal");
          if (modal) {
            const modalInstance = bootstrap.Modal.getInstance(modal);
            if (modalInstance) {
              modalInstance.hide();
            }
          }
        }, 2000);
      } else {
        showNotification("Please fill in all required fields.", "error");
      }
    });
  });

  // Carousel auto-height adjustment
  const carousels = document.querySelectorAll(".carousel");
  carousels.forEach((carousel) => {
    const items = carousel.querySelectorAll(".carousel-item");
    if (items.length > 0) {
      const setHeight = () => {
        const activeItem = carousel.querySelector(".carousel-item.active");
        if (activeItem) {
          carousel.style.height = activeItem.offsetHeight + "px";
        }
      };

      carousel.addEventListener("slide.bs.carousel", setHeight);
      carousel.addEventListener("slid.bs.carousel", setHeight);
      window.addEventListener("resize", setHeight);
      setHeight(); // Set initial height
    }
  });

  // Toast notifications
  function showNotification(message, type = "info") {
    const toastContainer = getOrCreateToastContainer();
    const toastId = "toast-" + Date.now();
    const bgClass =
      type === "success"
        ? "bg-success"
        : type === "error"
        ? "bg-danger"
        : "bg-primary";

    const toastHtml = `
            <div id="${toastId}" class="toast ${bgClass} text-white" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ${bgClass} text-white border-0">
                    <i class="fas fa-${
                      type === "success"
                        ? "check-circle"
                        : type === "error"
                        ? "exclamation-circle"
                        : "info-circle"
                    } me-2"></i>
                    <strong class="me-auto">${
                      type === "success"
                        ? "Success"
                        : type === "error"
                        ? "Error"
                        : "Info"
                    }</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    ${message}
                </div>
            </div>
        `;

    toastContainer.insertAdjacentHTML("beforeend", toastHtml);

    const toastElement = document.getElementById(toastId);
    const toast = new bootstrap.Toast(toastElement, {
      autohide: true,
      delay: 5000,
    });

    toast.show();

    // Remove toast element after it's hidden
    toastElement.addEventListener("hidden.bs.toast", () => {
      toastElement.remove();
    });
  }

  function getOrCreateToastContainer() {
    let container = document.getElementById("toast-container");
    if (!container) {
      container = document.createElement("div");
      container.id = "toast-container";
      container.className = "toast-container position-fixed top-0 end-0 p-3";
      container.style.zIndex = "9999";
      document.body.appendChild(container);
    }
    return container;
  }

  // Preload images on hover
  document.querySelectorAll("[data-preload-hover]").forEach((element) => {
    element.addEventListener("mouseenter", function () {
      const imageUrl = this.getAttribute("data-preload-hover");
      if (imageUrl) {
        const img = new Image();
        img.src = imageUrl;
      }
    });
  });

  // Initialize tooltips and popovers
  if (typeof bootstrap !== "undefined") {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(
      document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize popovers
    const popoverTriggerList = [].slice.call(
      document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl);
    });
  }

  // Performance optimization: Debounced resize handler
  let resizeTimer;
  window.addEventListener("resize", function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      // Trigger custom resize event
      window.dispatchEvent(new CustomEvent("debouncedResize"));
    }, 100);
  });
});

// Global functions
window.AuctoModern = {
  showNotification: function (message, type = "info") {
    // This will be available globally
    const event = new CustomEvent("showNotification", {
      detail: { message, type },
    });
    document.dispatchEvent(event);
  },
};

// Initialize Google Maps (if needed)
function initMap() {
  if (typeof google !== "undefined" && google.maps) {
    const mapElement = document.getElementById("map");
    if (mapElement) {
      const map = new google.maps.Map(mapElement, {
        center: { lat: 26.1445, lng: 91.7362 }, // Guwahati coordinates
        zoom: 13,
        styles: [
          {
            featureType: "all",
            elementType: "geometry.fill",
            stylers: [{ weight: "2.00" }],
          },
          {
            featureType: "all",
            elementType: "geometry.stroke",
            stylers: [{ color: "#9c9c9c" }],
          },
        ],
      });

      // Add marker
      const marker = new google.maps.Marker({
        position: { lat: 26.1445, lng: 91.7362 },
        map: map,
        title: "Auctocreation",
        animation: google.maps.Animation.BOUNCE,
      });

      // Add info window
      const infoWindow = new google.maps.InfoWindow({
        content:
          "<h5>Auctocreation</h5><p>Leading event management company in Northeast India</p>",
      });

      marker.addListener("click", function () {
        infoWindow.open(map, marker);
      });
    }
  }
}
