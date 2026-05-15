<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$pageTitle       = 'Construction Services in Bend, OR | ' . $siteName;
$pageDescription = $siteName . ' offers new home construction, additions, remodeling, kitchen and bathroom renovations, and custom deck building in Bend, Redmond, Sisters, and Central Oregon. Call ' . $phone . ' for a free estimate.';
$canonicalUrl    = $siteUrl . '/services/';
$ogImage         = $services[0]['image'];
$currentPage     = 'services';
$heroImagePreload = $clientPhotos[3];
$cssVersion      = '4.0';

// ── Schema: BreadcrumbList ────────────────────────────────────
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Services'],
]);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<!-- BreadcrumbList Schema -->
<script type="application/ld+json">
<?php echo $breadcrumbSchema; ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     SERVICES LISTING — Marty Mar Construction Inc
     Phase 4: Services Main Page
     ═══════════════════════════════════════════════════════════ -->

<style>
/* ── Services Page Hero ─────────────────────────────────────── */
.hero--services {
  position: relative;
  min-height: 55vh;
  display: flex;
  align-items: center;
  background: var(--color-primary);
  overflow: hidden;
}

.hero--services::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url('<?php echo htmlspecialchars($heroImagePreload); ?>') center/cover no-repeat;
  z-index: 0;
}

.hero--services::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(var(--color-primary-rgb), 0.92) 0%, rgba(var(--color-primary-rgb), 0.7) 50%, rgba(var(--color-primary-rgb), 0.85) 100%);
  z-index: 1;
}

.hero--services .container {
  position: relative;
  z-index: 2;
  text-align: center;
  max-width: 780px;
  padding-top: calc(var(--navbar-height) + var(--space-3xl));
  padding-bottom: var(--space-3xl);
}

.hero--services h1 {
  font-size: var(--fs-h1);
  color: #fff;
  margin-bottom: var(--space-md);
  line-height: 1.05;
}

.hero--services .hero-answer {
  color: rgba(255, 255, 255, 0.85);
  font-size: 1.15rem;
  line-height: 1.7;
  max-width: 60ch;
  margin: 0 auto var(--space-xl);
}

.hero--services .breadcrumb {
  display: flex;
  justify-content: center;
  gap: var(--space-sm);
  font-size: 0.85rem;
  color: rgba(255, 255, 255, 0.6);
  margin-bottom: var(--space-xl);
}

.hero--services .breadcrumb a {
  color: rgba(255, 255, 255, 0.7);
  transition: color var(--transition-base);
}

.hero--services .breadcrumb a:hover { color: var(--color-accent); }
.hero--services .breadcrumb-sep { margin: 0 var(--space-xs); }

/* ── Services Intro ─────────────────────────────────────────── */
.services-intro {
  background: var(--color-bg);
}

.services-intro .section-title {
  max-width: 780px;
}

/* ── Services Grid Section ──────────────────────────────────── */
.services-listing {
  background: var(--color-bg-alt);
  position: relative;
}

.services-listing .section-number {
  position: absolute;
  top: var(--space-2xl);
  left: clamp(1rem, 4vw, 2rem);
  font-family: var(--font-heading);
  font-size: clamp(4rem, 8vw, 7rem);
  font-weight: 900;
  color: rgba(var(--color-primary-rgb), 0.03);
  line-height: 1;
  pointer-events: none;
}

.services-grid--listing {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-xl);
}

@media (max-width: 960px) {
  .services-grid--listing { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 600px) {
  .services-grid--listing { grid-template-columns: 1fr; }
}

/* ── Why Marty Mar Section ──────────────────────────────────── */
.why-section {
  background: var(--color-bg);
  position: relative;
}

.why-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-xl);
  max-width: 900px;
  margin: 0 auto;
}

.why-card {
  display: flex;
  gap: var(--space-lg);
  align-items: flex-start;
  padding: var(--space-xl);
  border-radius: var(--radius-lg);
  background: var(--color-bg-alt);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.why-card:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-md);
}

.why-card .card-icon {
  flex-shrink: 0;
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}

.why-card .card-icon i,
.why-card .card-icon svg {
  width: 22px;
  height: 22px;
}

.why-card h3 {
  font-size: 1.05rem;
  margin-bottom: var(--space-xs);
}

.why-card p {
  font-size: 0.92rem;
  color: var(--color-text-light);
  line-height: 1.6;
  margin: 0;
}

@media (max-width: 768px) {
  .why-grid { grid-template-columns: 1fr; }
}

/* ── CTA Banner ─────────────────────────────────────────────── */
.services-cta {
  background: var(--color-primary);
  text-align: center;
  position: relative;
}

.services-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 30% 50%, rgba(var(--color-accent-rgb), 0.12) 0%, transparent 60%);
  pointer-events: none;
}

.services-cta .container {
  position: relative;
  z-index: 1;
  max-width: 680px;
}

.services-cta h2 { color: #fff; margin-bottom: var(--space-md); }
.services-cta .answer-block { color: rgba(255, 255, 255, 0.85); font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--space-xl); }

/* ── Section Dividers ───────────────────────────────────────── */
.services-listing .section-divider--top svg,
.services-listing .section-divider--bottom svg { display: block; }

/* ── Responsive ─────────────────────────────────────────────── */
@media (max-width: 480px) {
  .hero--services .container {
    padding-top: calc(var(--navbar-height) + var(--space-2xl));
    padding-bottom: var(--space-2xl);
  }
}
</style>


<!-- ════════════════════════════════════════════════════════════
     HERO SECTION
     ════════════════════════════════════════════════════════════ -->
<section class="hero hero--services">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">Services</span>
    </nav>
    <h1>Construction Services in <span class="text-accent">Bend, Oregon</span></h1>
    <p class="hero-answer"><?php echo htmlspecialchars($siteName); ?> is a licensed general contractor in Bend, OR, offering new home construction, room additions, whole-home remodeling, kitchen and bathroom renovations, and custom deck building. We serve homeowners across Central Oregon with hands-on project management and transparent pricing.</p>
  </div>

  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <path d="M0,60 L1440,60 L1440,0 C960,50 480,50 0,0 Z"/>
    </svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     SERVICES GRID
     ════════════════════════════════════════════════════════════ -->
<section class="services-listing" aria-label="All construction services">
  <span class="section-number" aria-hidden="true">01</span>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What <span class="text-accent">Construction Services</span> Are Available in Central Oregon?</h2>
      <p class="answer-block">Marty Mar Construction offers six core construction services for homeowners in Bend, Redmond, Sisters, Sunriver, La Pine, and Prineville. From custom home builds to single-room renovations, every project includes licensed tradespeople, direct communication, and a written estimate before work begins.</p>
      <span class="section-subtitle">Everything under one roof</span>
    </div>

    <div class="services-grid--listing">
      <?php
      $tintCycle = [1, 2, 3];
      $serviceBullets = [
          'new-home-construction'  => ['Custom floor plans for your lot', 'Foundation-to-finish oversight', 'Snow-load rated framing'],
          'home-additions'         => ['Seamless match to existing structure', 'Second-story expansions', 'ADU and garage conversions'],
          'remodeling-renovations' => ['Whole-home transformations', 'Structural and cosmetic work', 'On-schedule, on-budget delivery'],
          'bathroom-remodeling'    => ['Walk-in showers and soaking tubs', 'Custom tile and vanity work', 'Full gut or targeted upgrades'],
          'kitchen-remodeling'     => ['Custom cabinetry and countertops', 'Layout and structural changes', 'Lighting and appliance planning'],
          'deck-outdoor-structures'=> ['Composite and timber options', 'Engineered for Oregon snow loads', 'Pergolas, porches, and shade structures'],
      ];
      foreach ($services as $i => $svc):
        $tint = $tintCycle[$i % 3];
        $delay = ($i % 3) + 1;
        $bullets = $serviceBullets[$svc['slug']] ?? ['Professional installation', 'Licensed and insured', 'Free estimates available'];
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-up reveal-delay-<?php echo $delay; ?>">
        <div class="service-card__image">
          <img src="<?php echo htmlspecialchars($svc['image']); ?>" alt="<?php echo htmlspecialchars($svc['name']); ?> in Bend, Oregon" width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><i data-lucide="<?php echo htmlspecialchars($svc['icon']); ?>"></i></div>
          <h3><?php echo htmlspecialchars($svc['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars(strtok($svc['description'], '.')); ?>.</p>
          <ul>
            <?php foreach ($bullets as $bullet): ?>
            <li><?php echo htmlspecialchars($bullet); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/services/<?php echo $svc['slug']; ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     WHY MARTY MAR SECTION
     ════════════════════════════════════════════════════════════ -->
<section class="why-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg-alt)" aria-hidden="true">
      <polygon points="0,50 1440,0 1440,50"/>
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Why Us</span>
      <h2>Why Do Bend Homeowners Choose <span class="text-accent">Marty Mar</span>?</h2>
      <p class="answer-block">Homeowners in Bend and Central Oregon choose Marty Mar Construction for direct communication, transparent pricing, and <?php echo $yearsInBusiness; ?>+ years of hands-on experience building in high-desert conditions. We manage every phase in-house — no subcontractor runaround, no surprise change orders.</p>
    </div>

    <div class="why-grid">
      <div class="why-card reveal-up reveal-delay-1">
        <div class="card-icon"><i data-lucide="user-check" aria-hidden="true"></i></div>
        <div>
          <h3>Direct Communication</h3>
          <p>Marty is your single point of contact from estimate to final walkthrough. No project managers, no phone trees — just direct answers.</p>
        </div>
      </div>
      <div class="why-card reveal-up reveal-delay-2">
        <div class="card-icon"><i data-lucide="shield-check" aria-hidden="true"></i></div>
        <div>
          <h3>Licensed &amp; Insured</h3>
          <p>Fully licensed general contractor in Oregon with general liability and workers' compensation coverage on every job site.</p>
        </div>
      </div>
      <div class="why-card reveal-up reveal-delay-3">
        <div class="card-icon"><i data-lucide="mountain-snow" aria-hidden="true"></i></div>
        <div>
          <h3>Built for Central Oregon</h3>
          <p>We engineer for snow loads, freeze-cycle foundations, UV-resistant finishes, and high-desert soil conditions — because Bend isn't Portland.</p>
        </div>
      </div>
      <div class="why-card reveal-up reveal-delay-4">
        <div class="card-icon"><i data-lucide="file-text" aria-hidden="true"></i></div>
        <div>
          <h3>Transparent Pricing</h3>
          <p>Written estimates with material specs and itemized costs before work begins. No surprise change orders, no hidden fees.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     CLOSING CTA
     ════════════════════════════════════════════════════════════ -->
<section class="services-cta">
  <div class="container reveal-up">
    <span class="eyebrow-label" style="color: var(--color-accent);">Ready to Start?</span>
    <h2>How Do You Get a Free Construction Estimate?</h2>
    <p class="answer-block">Call <?php echo $phone; ?> or fill out our online form. We'll schedule a site visit, assess your project scope, and deliver a detailed written estimate within 48 hours — no cost, no obligation, no pressure.</p>
    <div style="display: flex; flex-wrap: wrap; gap: var(--space-md); justify-content: center;">
      <a href="/contact/" class="btn-primary">
        <i data-lucide="file-text" aria-hidden="true"></i> Request Free Estimate
      </a>
      <a href="tel:<?php echo $phonePlain; ?>" class="btn-secondary btn-secondary--light">
        <i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?>
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
