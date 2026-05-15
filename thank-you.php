<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$pageTitle       = 'Thank You | ' . $siteName;
$pageDescription = 'Thank you for contacting Marty Mar Construction Inc. We have received your request and will respond within one business day.';
$canonicalUrl    = $siteUrl . '/thank-you';
$currentPage     = 'thank-you';
$noindex         = true;
$cssVersion      = '5.0';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     THANK YOU PAGE — Marty Mar Construction Inc
     ═══════════════════════════════════════════════════════════ -->

<style>
/* ── Thank You Hero ─────────────────────────────────────────── */
.thankyou-hero {
  min-height: 70vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--color-primary);
  text-align: center;
  position: relative;
}

.thankyou-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 40%, rgba(var(--color-secondary-rgb), 0.12) 0%, transparent 60%);
  pointer-events: none;
}

.thankyou-hero .container {
  position: relative;
  z-index: 1;
  padding-top: calc(var(--navbar-height) + var(--space-2xl));
  max-width: 650px;
}

.thankyou-icon {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background: rgba(var(--color-secondary-rgb), 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-xl);
  color: var(--color-accent);
}

.thankyou-icon i, .thankyou-icon svg {
  width: 40px;
  height: 40px;
}

.thankyou-hero h1 {
  color: #fff;
  font-size: var(--fs-h2);
  margin-bottom: var(--space-md);
}

.thankyou-hero h1 .text-accent {
  color: var(--color-accent);
  font-family: var(--font-accent);
  font-size: 1.1em;
}

.thankyou-hero p {
  color: rgba(255, 255, 255, 0.75);
  font-size: 1.05rem;
  line-height: 1.7;
  margin-bottom: var(--space-lg);
}

.thankyou-steps {
  text-align: left;
  background: rgba(255, 255, 255, 0.06);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  margin-bottom: var(--space-2xl);
}

.thankyou-steps h3 {
  color: var(--color-accent);
  font-size: 0.85rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin-bottom: var(--space-md);
}

.thankyou-steps ol {
  counter-reset: steps;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}

.thankyou-steps li {
  counter-increment: steps;
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  color: rgba(255, 255, 255, 0.8);
  font-size: 0.95rem;
  line-height: 1.6;
}

.thankyou-steps li::before {
  content: counter(steps);
  flex-shrink: 0;
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.2);
  color: var(--color-accent);
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: 0.85rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.thankyou-actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  justify-content: center;
}

@media (max-width: 480px) {
  .thankyou-actions { flex-direction: column; }
  .thankyou-actions .btn-primary, .thankyou-actions .btn-secondary { width: 100%; text-align: center; }
}
</style>


<section class="thankyou-hero hero">
  <div class="container">
    <div class="thankyou-icon">
      <i data-lucide="check-circle" aria-hidden="true"></i>
    </div>
    <h1>Thank You — <span class="text-accent">We're on It</span></h1>
    <p>Your request has been received. A member of our team will review your project details and get back to you within one business day — typically same-day for inquiries received before 3 PM.</p>

    <div class="thankyou-steps">
      <h3>What Happens Next</h3>
      <ol>
        <li>We review your project details and confirm we can help with your specific scope.</li>
        <li>A team member calls or emails you to schedule a free on-site assessment.</li>
        <li>After the site visit, you receive a detailed written estimate — no obligation, no pressure.</li>
      </ol>
    </div>

    <p>Need to reach us sooner? Call directly:</p>

    <div class="thankyou-actions">
      <a href="tel:<?php echo $phonePlain; ?>" class="btn-primary">
        <i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?>
      </a>
      <a href="/" class="btn-secondary btn-secondary--light">
        <i data-lucide="home" aria-hidden="true"></i> Back to Homepage
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
