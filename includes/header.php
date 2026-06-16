<?php
// ============================================================
// includes/header.php — Marty Mar Construction Inc
// Page One Insights Build System — Glassmorphism Navbar
// ============================================================
?>

<!-- Skip to Content (Accessibility) -->
<a href="#main-content" class="skip-link">Skip to main content</a>

<header class="site-header" data-header>
  <nav class="navbar" aria-label="Main navigation">
    <div class="navbar-inner container">

      <!-- Logo -->
      <a href="/" class="navbar-logo" aria-label="<?php echo htmlspecialchars($siteName); ?> — Home">
        <img src="<?php echo htmlspecialchars($logoUrl); ?>" alt="<?php echo htmlspecialchars($siteName); ?> logo" width="60" height="60">
        <div class="logo-text-wrap">
          <span class="logo-mark"><?php echo htmlspecialchars($siteName); ?></span>
          <span class="logo-text"><?php echo htmlspecialchars($tagline); ?></span>
        </div>
      </a>

      <!-- Desktop Nav Links -->
      <ul class="navbar-links">
        <li>
          <a href="/" <?php echo isActivePage('home') ? 'aria-current="page"' : ''; ?>>Home</a>
        </li>
        <li class="has-dropdown">
          <a href="/services/" <?php echo isActivePage('services') ? 'aria-current="page"' : ''; ?>>
            Services <span class="dropdown-arrow" aria-hidden="true"></span>
          </a>
          <ul class="dropdown" role="menu" style="display:none">
            <?php foreach ($services as $svc): ?>
            <li role="none">
              <a href="/services/<?php echo $svc['slug']; ?>/" role="menuitem"><?php echo htmlspecialchars($svc['name']); ?></a>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>
        <li>
          <a href="/service-area/" <?php echo isActivePage('service-area') ? 'aria-current="page"' : ''; ?>>Eugene &amp; Surrounding Areas</a>
        </li>
        <li>
          <a href="/about/" <?php echo isActivePage('about') ? 'aria-current="page"' : ''; ?>>About</a>
        </li>
        <li>
          <a href="/contact/" <?php echo isActivePage('contact') ? 'aria-current="page"' : ''; ?>>Contact</a>
        </li>
      </ul>

      <!-- Desktop CTA -->
      <div class="navbar-cta">
        <a href="tel:<?php echo $phonePlain; ?>" class="nav-phone">
          <i data-lucide="phone" aria-hidden="true"></i>
          <?php echo $phone; ?>
        </a>
        <a href="/contact/" class="btn-nav">Free Estimate</a>
      </div>

      <!-- Mobile Hamburger -->
      <button class="hamburger" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
      </button>

    </div>
  </nav>
</header>

<!-- Mobile Full-Screen Menu -->
<div class="mobile-menu" id="mobile-menu" aria-hidden="true">
  <ul class="mobile-menu-links">
    <li><a href="/">Home</a></li>
    <li><a href="/services/">Services</a></li>
    <?php foreach ($services as $svc): ?>
    <li><a href="/services/<?php echo $svc['slug']; ?>/" class="mobile-sub-link"><?php echo htmlspecialchars($svc['name']); ?></a></li>
    <?php endforeach; ?>
    <li><a href="/service-area/">Eugene &amp; Surrounding Areas</a></li>
    <li><a href="/about/">About</a></li>
    <li><a href="/contact/">Contact</a></li>
  </ul>
  <div class="mobile-menu-cta">
    <a href="tel:<?php echo $phonePlain; ?>" class="btn-primary">
      <i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?>
    </a>
    <a href="/contact/" class="btn-secondary btn-secondary--light">Get Free Estimate</a>
  </div>
</div>

<main id="main-content">
