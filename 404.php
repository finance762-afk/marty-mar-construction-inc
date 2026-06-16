<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$pageTitle       = 'Page Not Found | ' . $siteName;
$pageDescription = 'The page you are looking for could not be found. Return to ' . $siteName . ' homepage or browse our construction services in Eugene, OR.';
$canonicalUrl    = $siteUrl . '/404';
$currentPage     = '404';
$noindex         = true;
$cssVersion      = '5.0';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     404 PAGE — Marty Mar Construction Inc
     ═══════════════════════════════════════════════════════════ -->

<style>
/* ── 404 Hero ───────────────────────────────────────────────── */
.error-hero {
  min-height: 70vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--color-primary);
  text-align: center;
  position: relative;
}

.error-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 40%, rgba(var(--color-accent-rgb), 0.08) 0%, transparent 60%);
  pointer-events: none;
}

.error-hero .container {
  position: relative;
  z-index: 1;
  padding-top: calc(var(--navbar-height) + var(--space-2xl));
  max-width: 650px;
}

.error-code {
  font-family: var(--font-heading);
  font-size: clamp(6rem, 15vw, 12rem);
  font-weight: 900;
  color: rgba(var(--color-accent-rgb), 0.2);
  line-height: 1;
  margin-bottom: var(--space-md);
}

.error-hero h1 {
  color: #fff;
  font-size: var(--fs-h2);
  margin-bottom: var(--space-md);
}

.error-hero p {
  color: rgba(255, 255, 255, 0.7);
  font-size: 1.1rem;
  line-height: 1.7;
  margin-bottom: var(--space-2xl);
}

.error-links {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  justify-content: center;
  margin-bottom: var(--space-2xl);
}

.error-popular {
  margin-top: var(--space-2xl);
  padding-top: var(--space-2xl);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.error-popular h3 {
  color: rgba(255, 255, 255, 0.5);
  font-size: 0.85rem;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  margin-bottom: var(--space-lg);
}

.popular-links {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-sm) var(--space-md);
  justify-content: center;
}

.popular-links a {
  color: rgba(255, 255, 255, 0.7);
  font-size: 0.92rem;
  padding: var(--space-sm) var(--space-md);
  border: 1px solid rgba(255, 255, 255, 0.12);
  border-radius: var(--radius-md);
  transition: all var(--transition-base);
}

.popular-links a:hover {
  color: #fff;
  border-color: var(--color-accent);
  background: rgba(var(--color-accent-rgb), 0.1);
}

@media (max-width: 480px) {
  .error-links { flex-direction: column; }
  .error-links .btn-primary, .error-links .btn-secondary { width: 100%; text-align: center; }
}
</style>


<section class="error-hero hero">
  <div class="container">
    <div class="error-code" aria-hidden="true">404</div>
    <h1>This Page Doesn't Exist</h1>
    <p>The page you're looking for may have been moved, removed, or never built in the first place. Let's get you back on track — start with our homepage or jump to a popular page below.</p>

    <div class="error-links">
      <a href="/" class="btn-primary">
        <i data-lucide="home" aria-hidden="true"></i> Back to Homepage
      </a>
      <a href="/contact/" class="btn-secondary btn-secondary--light">
        <i data-lucide="file-text" aria-hidden="true"></i> Get a Free Estimate
      </a>
    </div>

    <div class="error-popular">
      <h3>Popular Pages</h3>
      <div class="popular-links">
        <a href="/services/">All Services</a>
        <?php foreach (array_slice($services, 0, 4) as $svc): ?>
        <a href="/services/<?php echo $svc['slug']; ?>/"><?php echo htmlspecialchars($svc['name']); ?></a>
        <?php endforeach; ?>
        <a href="/about/">About Us</a>
        <a href="/service-area/">Eugene &amp; Surrounding Areas</a>
        <a href="/contact/">Contact</a>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
