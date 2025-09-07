jQuery(document).ready(function ($) {
  // Wait for DOM to be fully loaded
  setTimeout(function () {
    // Remove legacy global jQuery carousel init that was forcing 2000ms
    // Initialize only the hero carousel with desired 8s interval (3s slide + ~5s pause)
    const heroCarouselEl = document.getElementById("modernCarousel");
    let heroCarousel = null;

    if (heroCarouselEl && window.bootstrap) {
      heroCarousel = window.bootstrap.Carousel.getOrCreateInstance(
        heroCarouselEl,
        {
          interval: 6000,
          ride: "carousel",
          pause: false,
          touch: true,
          keyboard: true,
          wrap: true,
        }
      );
    }

    // Hero carousel pause/play button functionality - Alternative approach
    const pauseBtn = document.querySelector(".hero-pause-btn");
    console.log("Pause button found:", pauseBtn); // Debug log

    if (pauseBtn) {
      let isPlaying = true;

      pauseBtn.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        console.log("Pause button clicked, isPlaying:", isPlaying); // Debug log

        if (isPlaying) {
          // Pause the carousel - try multiple methods
          if (heroCarousel) {
            heroCarousel.pause();
          }
          // Also try jQuery approach as fallback
          $("#modernCarousel").carousel("pause");

          pauseBtn.setAttribute("aria-pressed", "true");
          pauseBtn.setAttribute("aria-label", "Resume carousel");
          const labelEl = pauseBtn.querySelector(".label");
          if (labelEl) labelEl.textContent = "Resume";
          isPlaying = false;
          console.log("Carousel paused"); // Debug log
        } else {
          // Resume the carousel - try multiple methods
          if (heroCarousel) {
            heroCarousel.cycle();
          }
          // Also try jQuery approach as fallback
          $("#modernCarousel").carousel("cycle");

          pauseBtn.setAttribute("aria-pressed", "false");
          pauseBtn.setAttribute("aria-label", "Pause carousel");
          const labelEl = pauseBtn.querySelector(".label");
          if (labelEl) labelEl.textContent = "Pause";
          isPlaying = true;
          console.log("Carousel resumed"); // Debug log
        }
      });

      console.log("Pause button event listener added"); // Debug log
    } else {
      console.log("Pause button not found!"); // Debug log
    }
  }, 500); // Increased delay to ensure everything is loaded

  $(document).ready(function () {
    // Add smooth scrolling to all links in navbar + footer link

    // $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // 	// Events

    // 	// Prevent default anchor click behavior

    // 	event.preventDefault();

    // 	// Store hash

    // 	var hash = this.hash;

    // 	// Using jQuery's animate() method to add smooth page scroll

    // 	// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area

    // 	$('html, body').animate({

    // 		scrollTop: $(hash).offset().top

    // 		}, 900, function(){

    // 		// Add hash (#) to URL when done scrolling (default click behavior)

    // 		window.location.hash = hash;

    // 	});

    // });

    // Slide in elements on scroll

    $(window).scroll(function () {
      $(".slideanim").each(function () {
        var pos = $(this).offset().top;

        var winTop = $(window).scrollTop();

        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
      });
    });
  });

  $(function () {
    // DOM ready

    // If a link has a dropdown, add sub menu toggle.

    $("nav ul li a:not(:only-child)").click(function (e) {
      $(this).siblings(".nav-dropdown").toggle();

      // Close one dropdown when selecting another

      $(".nav-dropdown").not($(this).siblings()).hide();

      e.stopPropagation();
    });

    // Clicking away from dropdown will remove the dropdown class

    $("html").click(function () {
      $(".nav-dropdown").hide();
    });

    // Toggle open and close nav styles on click

    $("#nav-toggle").click(function () {
      $("nav ul").slideToggle();
    });

    // Hamburger to X toggle

    $("#nav-toggle").on("click", function () {
      this.classList.toggle("active");
    });
  }); // end DOM ready

  /*****Scroll to about****/
  var headerHeight = $(".navbar").outerHeight();
  var scrollLink = $(".scroll");
  //Smooth scrolling
  scrollLink.click(function (e) {
    e.preventDefault();
    $("body,html").animate(
      {
        scrollTop: $(this.hash).offset().top - headerHeight,
      },
      1000
    );
  });

  // Smooth scroll

  $(".slide-section").click(function (e) {
    var linkHref = $(this).attr("href");
    //console.log($(linkHref).offset().top);
    $("html, body").animate(
      {
        scrollTop: $(linkHref).offset().top - headerHeight,
      },
      1000
    );
    e.preventDefault();
  });

  // Animated counters (data-count attribute)
  const counterEls = document.querySelectorAll(".stat-number[data-count]");
  const easeOutQuad = (t) => t * (2 - t);
  function animateCounter(el) {
    const target = parseInt(el.getAttribute("data-count"), 10);
    const suffix = el.getAttribute("data-suffix") || "";
    const durationAttr = parseInt(el.getAttribute("data-duration"), 10);
    const duration =
      !isNaN(durationAttr) && durationAttr > 0 ? durationAttr : 1600;
    const startTime = performance.now();
    function frame(now) {
      const progress = Math.min((now - startTime) / duration, 1);
      const value = Math.floor(easeOutQuad(progress) * target);
      el.textContent = value + suffix;
      if (progress < 1) requestAnimationFrame(frame);
    }
    requestAnimationFrame(frame);
  }
  if (counterEls.length) {
    const obs = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting && !entry.target.dataset._done) {
            entry.target.dataset._done = "1";
            animateCounter(entry.target);
          }
        });
      },
      { threshold: 0.35 }
    );
    counterEls.forEach((el) => obs.observe(el));
  }

  // Lazy add dark class if user prefers dark
  if (
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: dark)").matches
  ) {
    document.documentElement.classList.add("prefers-dark");
  }

  // Pause/play control is now enabled above in carousel initialization

  // Hero video trigger (placeholder logic – integrate lightbox later)
  const videoBtn = document.querySelector(".hero-video-trigger");
  if (videoBtn) {
    videoBtn.addEventListener("click", () => {
      // Placeholder: scroll to gallery or future modal hook
      const gallery = document.getElementById("gallery");
      if (gallery) {
        gallery.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    });
  }

  // Typing effect for hero headline
  (function initTyping() {
    const el = document.querySelector(".typing-seq");
    if (!el) return;
    let wordsAttr = el.getAttribute("data-words");
    let words = [];
    try {
      words = JSON.parse(wordsAttr);
    } catch (e) {
      return;
    }
    if (!Array.isArray(words) || !words.length) return;
    const caret = document.querySelector(".typing-caret");
    const baseDelay = 110; // typing speed
    const holdTime = 1800; // hold full word
    const eraseSpeed = 55;
    let idx = 0;
    let abort = false;
    const prefersReduced =
      window.matchMedia &&
      window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if (prefersReduced) {
      el.textContent = words[0];
      if (caret) caret.style.display = "none";
      return;
    }
    function typeWord(word) {
      el.textContent = "";
      let i = 0;
      function type() {
        if (abort) return;
        if (i < word.length) {
          el.textContent += word.charAt(i);
          i++;
          setTimeout(type, baseDelay + Math.random() * 60);
        } else {
          setTimeout(() => eraseWord(word), holdTime);
        }
      }
      type();
    }
    function eraseWord(word) {
      let i = word.length;
      function erase() {
        if (abort) return;
        if (i > 0) {
          el.textContent = word.substring(0, i - 1);
          i--;
          setTimeout(erase, eraseSpeed);
        } else {
          idx = (idx + 1) % words.length;
          typeWord(words[idx]);
        }
      }
      erase();
    }
    typeWord(words[idx]);
    document.addEventListener("visibilitychange", () => {
      if (document.hidden) {
        abort = true;
      }
    });
  })();

  // Production preview modal logic
  (function initProductionModal() {
    const triggers = document.querySelectorAll(".prod-action[data-prod-img]");
    if (!triggers.length) return;
    const modalEl = document.getElementById("productionPreviewModal");
    if (!modalEl || !window.bootstrap) return;
    const imgEl = modalEl.querySelector(".modal-prod-img");
    const captionEl = modalEl.querySelector(".modal-prod-caption");
    const titleEl = modalEl.querySelector(".modal-title");
    const bsModal = new window.bootstrap.Modal(modalEl);
    triggers.forEach((btn) => {
      btn.addEventListener("click", () => {
        const img = btn.getAttribute("data-prod-img");
        const title = btn.getAttribute("data-prod-title") || "Production Item";
        const caption = btn.getAttribute("data-prod-caption") || "";
        if (imgEl) {
          imgEl.src = img;
          imgEl.alt = title;
        }
        if (titleEl) titleEl.textContent = title;
        if (captionEl) captionEl.textContent = caption;
        bsModal.show();
      });
    });
  })();

  // Ensure carousel interval is slow (override if theme/scripts altered it)
  // Ensure single instance (already created above)

  // Clients slider functionality
  (function initClientsSlider() {
    const track = document.querySelector(".clients-track");
    if (!track) {
      console.log("Clients track not found");
      return;
    }

    const logos = track.querySelectorAll(".client-logo-item");
    console.log("Found logos:", logos.length);

    if (logos.length === 0) {
      console.log("No logos found in track");
      return;
    }

    // Clone logos for infinite scroll - simple approach
    const logoArray = Array.from(logos);
    logoArray.forEach((logo) => {
      const clone = logo.cloneNode(true);
      track.appendChild(clone);
    });

    console.log("Logos cloned for infinite scroll");

    // Animation is handled entirely by CSS
    // Optional: Add accessibility pause on focus if needed
  })();

  // Smart Navigation - Handle page redirects for section links
  function initSmartNavigation() {
    const smartNavLinks = document.querySelectorAll(".smart-nav-link");

    smartNavLinks.forEach(function (link) {
      link.addEventListener("click", function (e) {
        const section = this.getAttribute("data-section");
        const currentUrl = window.location.href;
        const isOnHomePage =
          auctocreation_ajax.is_home ||
          currentUrl.includes(auctocreation_ajax.home_url + "#") ||
          currentUrl === auctocreation_ajax.home_url;

        // If we have a section and we're not on the home page
        if (section && !isOnHomePage) {
          e.preventDefault();

          // Redirect to home page with the section hash
          window.location.href = auctocreation_ajax.home_url + "#" + section;
          return false;
        }

        // If we're on the home page, use smooth scrolling
        if (section && isOnHomePage) {
          e.preventDefault();

          const targetSection = document.getElementById(section);
          if (targetSection) {
            const headerHeight = document.querySelector(".navbar")
              ? document.querySelector(".navbar").offsetHeight
              : 70;
            const targetPosition = targetSection.offsetTop - headerHeight;

            // Smooth scroll using custom easing
            smoothScrollTo(targetPosition, 1000);
          }
          return false;
        }
      });
    });
  }

  // Smooth scroll function with custom easing
  function smoothScrollTo(targetPosition, duration) {
    const startPosition = window.pageYOffset;
    const distance = targetPosition - startPosition;
    const startTime = performance.now();

    function easeInOutCubic(t) {
      return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
    }

    function animation(currentTime) {
      const timeElapsed = currentTime - startTime;
      const progress = Math.min(timeElapsed / duration, 1);
      const ease = easeInOutCubic(progress);

      window.scrollTo(0, startPosition + distance * ease);

      if (progress < 1) {
        requestAnimationFrame(animation);
      }
    }

    requestAnimationFrame(animation);
  }

  // Initialize smart navigation
  initSmartNavigation();
});
// (Removed initMap callback per request)
