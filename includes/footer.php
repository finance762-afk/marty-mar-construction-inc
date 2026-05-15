<?php
// ============================================================
// includes/footer.php — Marty Mar Construction Inc
// Page One Insights Build System — Footer + Scripts
// ============================================================
?>

</main><!-- /#main-content -->

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">

      <!-- Column 1: About -->
      <div class="footer-about">
        <h3 class="footer-heading"><?php echo htmlspecialchars($siteName); ?></h3>
        <p><?php echo htmlspecialchars($tagline); ?>. We handle new home construction, additions, remodeling, kitchen and bathroom renovations, and custom deck building for homeowners across the <?php echo $address['city']; ?> area.</p>
        <div class="footer-trust-badges">
          <span class="footer-badge"><i data-lucide="shield-check" aria-hidden="true"></i> Licensed &amp; Insured</span>
          <span class="footer-badge"><i data-lucide="calendar" aria-hidden="true"></i> Since <?php echo $yearEstablished; ?></span>
          <span class="footer-badge"><i data-lucide="badge-check" aria-hidden="true"></i> Free Estimates</span>
        </div>
        <div class="footer-social">
          <?php if (!empty($socialLinks['facebook'])): ?>
          <a href="<?php echo htmlspecialchars($socialLinks['facebook']); ?>" target="_blank" rel="noopener" aria-label="Facebook">
            <i data-lucide="facebook" aria-hidden="true"></i>
          </a>
          <?php endif; ?>
          <?php if (!empty($socialLinks['instagram'])): ?>
          <a href="<?php echo htmlspecialchars($socialLinks['instagram']); ?>" target="_blank" rel="noopener" aria-label="Instagram">
            <i data-lucide="instagram" aria-hidden="true"></i>
          </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Column 2: Services -->
      <div>
        <h3 class="footer-heading">Our Services</h3>
        <ul class="footer-links-list">
          <?php foreach ($services as $svc): ?>
          <li><a href="/services/<?php echo $svc['slug']; ?>/"><?php echo htmlspecialchars($svc['name']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Column 3: Service Areas -->
      <div>
        <h3 class="footer-heading">Service Areas</h3>
        <ul class="footer-links-list">
          <?php foreach ($serviceAreas as $area): ?>
          <li><a href="/service-area/"><?php echo htmlspecialchars($area['city']); ?>, <?php echo $area['state']; ?></a></li>
          <?php endforeach; ?>
        </ul>
        <a href="/service-area/" class="footer-view-all">View All Areas &rarr;</a>
      </div>

      <!-- Column 4: Contact Info -->
      <div>
        <h3 class="footer-heading">Contact Us</h3>
        <div class="footer-contact-info">
          <div class="footer-contact-item">
            <i data-lucide="phone" aria-hidden="true"></i>
            <a href="tel:<?php echo $phonePlain; ?>"><?php echo $phone; ?></a>
          </div>
          <div class="footer-contact-item">
            <i data-lucide="mail" aria-hidden="true"></i>
            <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
          </div>
          <div class="footer-contact-item">
            <i data-lucide="map-pin" aria-hidden="true"></i>
            <span><?php echo $address['city']; ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></span>
          </div>
          <div class="footer-contact-item">
            <i data-lucide="clock" aria-hidden="true"></i>
            <span>Mon–Fri: 7:00 AM – 5:00 PM<br>Sat–Sun: By Appointment</span>
          </div>
        </div>
        <a href="/contact/" class="btn-primary footer-cta-btn">Get Free Estimate</a>
      </div>

    </div>

    <!-- AEO Entity Block -->
    <div class="footer-entity" itemscope itemtype="https://schema.org/GeneralContractor">
      <meta itemprop="name" content="<?php echo htmlspecialchars($siteName); ?>">
      <meta itemprop="url" content="<?php echo $siteUrl; ?>">
      <meta itemprop="telephone" content="<?php echo $phone; ?>">
      <p><?php echo htmlspecialchars($siteName); ?> is a licensed general contractor based in <?php echo $address['city']; ?>, <?php echo $address['state']; ?>, serving homeowners across Central Oregon since <?php echo $yearEstablished; ?>. Our team specializes in new home construction, room additions, whole-home remodeling, kitchen and bathroom renovations, and custom deck and outdoor structure building. We serve <?php echo $address['city']; ?>, Redmond, Sisters, Sunriver, La Pine, Prineville, and surrounding communities within a 40-mile radius. Call <?php echo $phone; ?> for a free project estimate.</p>
    </div>

    <!-- Footer Legal Row (MANDATORY) -->
    <div class="footer-legal-row">
      <a href="/privacy-policy/">Privacy Policy</a>
      <span class="divider">|</span>
      <a href="/terms/">Terms of Service</a>
      <span class="divider">|</span>
      <a href="/cookie-policy/">Cookie Policy</a>
      <span class="divider">|</span>
      <a href="/accessibility/">Accessibility</a>
      <span class="divider">|</span>
      <a href="/privacy-policy/#ccpa-rights">Do Not Sell or Share My Personal Information</a>
      <span class="divider">|</span>
      <a href="/sitemap.xml">Sitemap</a>
    </div>

    <!-- Footer Bottom Bar -->
    <div class="footer-bottom-bar">
      <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. All rights reserved. | <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">Web Design &amp; Hosting by Page One Insights, LLC</a></p>
    </div>

  </div>
</footer>

<!-- Back to Top Button -->
<button class="back-to-top" aria-label="Back to top">
  <i data-lucide="chevron-up" aria-hidden="true"></i>
</button>

<!-- Mobile Floating CTA Bar -->
<div class="mobile-cta-bar" aria-label="Quick actions">
  <div class="mobile-cta-bar__inner">
    <a href="tel:<?php echo $phonePlain; ?>" class="cta-call">
      <i data-lucide="phone" aria-hidden="true"></i> Call Now
    </a>
    <a href="/contact/" class="cta-estimate">
      <i data-lucide="file-text" aria-hidden="true"></i> Free Estimate
    </a>
  </div>
</div>

<!-- Cookie Banner -->
<div class="cookie-banner" id="cookie-banner" role="dialog" aria-label="Cookie notice">
  <p>We use cookies (Google Analytics, Google Fonts) to improve your experience. By continuing to browse, you consent to our use of cookies. <a href="/cookie-policy/">Learn more</a>.</p>
  <button class="cookie-banner__dismiss" id="cookie-dismiss">Got it</button>
</div>

<!-- ═══ Scripts ═══ -->

<!-- Lucide Icons (synchronous — must init before deferred scripts) -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>

<!-- Site Scripts -->
<script src="/assets/js/main.js" defer></script>
<script src="/assets/js/animations.js" defer></script>

<!-- Conditional CDN Libraries -->
<?php if ($useSwiper): ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<?php endif; ?>
<?php if ($useTilt): ?>
<script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.8.1/dist/vanilla-tilt.min.js" defer></script>
<?php endif; ?>
<?php if ($useTyped): ?>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.16/dist/typed.umd.js" defer></script>
<?php endif; ?>

<!-- Inline: Cookie Banner Dismissal + Back to Top -->
<script>
(function() {
  // Cookie banner
  var banner = document.getElementById('cookie-banner');
  var dismiss = document.getElementById('cookie-dismiss');
  if (banner && dismiss) {
    if (!localStorage.getItem('cookie_consent_dismissed')) {
      banner.classList.add('visible');
    }
    dismiss.addEventListener('click', function() {
      banner.classList.remove('visible');
      localStorage.setItem('cookie_consent_dismissed', 'true');
    });
  }

  // Back to top
  var btn = document.querySelector('.back-to-top');
  if (btn) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 400) {
        btn.classList.add('visible');
      } else {
        btn.classList.remove('visible');
      }
    }, { passive: true });
    btn.addEventListener('click', function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // Hamburger / mobile menu
  var hamburger = document.querySelector('.hamburger');
  var mobileMenu = document.getElementById('mobile-menu');
  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', function() {
      var isOpen = hamburger.classList.toggle('active');
      mobileMenu.classList.toggle('active');
      hamburger.setAttribute('aria-expanded', isOpen);
      mobileMenu.setAttribute('aria-hidden', !isOpen);
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });
    // Close on link click
    mobileMenu.querySelectorAll('a').forEach(function(link) {
      link.addEventListener('click', function() {
        hamburger.classList.remove('active');
        mobileMenu.classList.remove('active');
        hamburger.setAttribute('aria-expanded', 'false');
        mobileMenu.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
      });
    });
  }

  // Navbar scroll effect
  var header = document.querySelector('[data-header]');
  if (header) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    }, { passive: true });
  }
})();
</script>

</body>
</html>
