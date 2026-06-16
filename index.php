<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$pageTitle       = 'General Contractor in Eugene, OR | ' . $siteName . ' | Since ' . $yearEstablished;
$pageDescription = $siteName . ' is a licensed general contractor serving Eugene, Springfield, Cottage Grove, and Lane County since ' . $yearEstablished . '. New home construction, additions, remodeling, kitchens, bathrooms, and decks. Call ' . $phone . ' for a free estimate.';
$canonicalUrl    = $siteUrl . '/';
$ogImage         = $services[0]['image'];
$currentPage     = 'home';
$heroImagePreload = $clientPhotos[29]; // new home construction hero
$cssVersion      = '3.0';
$useSwiper       = true;

// ── Homepage FAQs ─────────────────────────────────────────────
$homeFaqs = [
    [
        'q' => 'What areas does Marty Mar Construction serve in the Eugene area?',
        'a' => 'We serve Eugene, Springfield, Cottage Grove, Junction City, Veneta, Creswell, and surrounding communities throughout Lane County. Most of our projects are within a 30-mile radius of Eugene, covering the Willamette Valley.',
    ],
    [
        'q' => 'Is Marty Mar Construction licensed and insured in Oregon?',
        'a' => 'Yes. Marty Mar Construction Inc is a fully licensed general contractor in the state of Oregon, carrying general liability insurance and workers\' compensation coverage. License documentation is available upon request.',
    ],
    [
        'q' => 'How do I get a free construction estimate in Eugene?',
        'a' => 'Call us at (541) 554-8181 or fill out the estimate form on this page. We\'ll schedule a site visit within 48 hours, assess the scope of your project, and deliver a detailed written estimate — no cost, no obligation.',
    ],
    [
        'q' => 'How long does a typical home remodel take in the Eugene area?',
        'a' => 'Timelines depend on scope. A bathroom remodel typically runs 2–4 weeks, a kitchen remodel 4–8 weeks, and new home construction averages 6–12 months. Rainy weather in Eugene can shift exterior schedules, but we build that into every timeline.',
    ],
    [
        'q' => 'Does Marty Mar Construction handle building permits?',
        'a' => 'Yes. We pull all required building permits through Lane County, the City of Eugene, or the applicable jurisdiction. We coordinate every inspection from foundation to final sign-off so you don\'t have to.',
    ],
    [
        'q' => 'What types of construction projects do you handle?',
        'a' => 'We handle new home construction, room additions, whole-home remodeling, kitchen and bathroom renovations, and custom deck and outdoor structure building. Whether it\'s a ground-up build or a single-room refresh, we manage every phase.',
    ],
];

// ── Schema Markup ─────────────────────────────────────────────
$faqSchema = generateFAQSchema($homeFaqs);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<!-- FAQPage Schema -->
<script type="application/ld+json">
<?php echo $faqSchema; ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     HOMEPAGE — Marty Mar Construction Inc
     Phase 3: Homepage Build
     ═══════════════════════════════════════════════════════════ -->

<style>
/* ── Hero Section ────────────────────────────────────────────── */
.hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  background: var(--color-primary);
  overflow: hidden;
}

.hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url('<?php echo htmlspecialchars($heroImagePreload); ?>') center/cover no-repeat;
  z-index: 0;
}

.hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(var(--color-primary-rgb), 0.88) 0%, rgba(var(--color-primary-rgb), 0.65) 50%, rgba(var(--color-primary-rgb), 0.78) 100%);
  z-index: 1;
}

.hero .container {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-3xl);
  align-items: center;
  padding-top: calc(var(--navbar-height) + var(--space-2xl));
  padding-bottom: var(--space-3xl);
}

.hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.85rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--color-accent);
  margin-bottom: var(--space-lg);
}

.hero-eyebrow i, .hero-eyebrow svg {
  width: 18px;
  height: 18px;
}

.hero-title {
  font-size: var(--fs-h1);
  color: #fff;
  margin-bottom: var(--space-lg);
  line-height: 1.05;
}

.hero-title .text-accent {
  color: var(--color-accent);
  font-family: var(--font-accent);
  font-size: 1.1em;
}

.hero-subtitle {
  font-size: 1.15rem;
  color: rgba(255, 255, 255, 0.8);
  line-height: 1.7;
  max-width: 52ch;
  margin-bottom: var(--space-xl);
}

.hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  margin-bottom: var(--space-2xl);
}

.hero-trust {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md) var(--space-xl);
}

.hero-trust-item {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.88rem;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.85);
}

.hero-trust-item i, .hero-trust-item svg {
  width: 18px;
  height: 18px;
  color: var(--color-accent);
}

/* ── Hero Form Card ──────────────────────────────────────────── */
.hero-form-card {
  background: rgba(255, 255, 255, 0.07);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.12);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  box-shadow: var(--shadow-xl);
}

.hero-form-card h2 {
  color: #fff;
  font-size: 1.6rem;
  margin-bottom: var(--space-xs);
}

.hero-form-tagline {
  color: rgba(255, 255, 255, 0.65);
  font-size: 0.95rem;
  margin-bottom: var(--space-xl);
}

.hero-form .form-row {
  margin-bottom: var(--space-md);
}

.hero-form input,
.hero-form select {
  width: 100%;
  padding: var(--space-md);
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: var(--radius-md);
  color: #fff;
  font-size: 1rem;
  transition: border-color var(--transition-base), background var(--transition-base);
}

.hero-form input::placeholder { color: rgba(255, 255, 255, 0.5); }
.hero-form select { color: rgba(255, 255, 255, 0.5); }
.hero-form select option { color: var(--color-text); background: var(--color-bg); }

.hero-form input:focus,
.hero-form select:focus {
  outline: none;
  border-color: var(--color-accent);
  background: rgba(255, 255, 255, 0.12);
}

.hero-form .btn-block {
  width: 100%;
  margin-top: var(--space-sm);
  padding: 1rem;
  font-size: 1rem;
}

.form-footnote {
  font-size: 0.78rem;
  color: rgba(255, 255, 255, 0.45);
  text-align: center;
  margin-top: var(--space-md);
  line-height: 1.5;
}

.form-footnote a {
  color: rgba(255, 255, 255, 0.6);
  text-decoration: underline;
}

/* ── Ticker Strip ────────────────────────────────────────────── */
.ticker-section {
  background: var(--color-bg-alt);
  padding: 0;
  overflow: hidden;
}

.ticker-track {
  display: flex;
  animation: tickerScroll 30s linear infinite;
  width: max-content;
}

.ticker-item {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  padding: var(--space-lg) var(--space-xl);
  font-size: 0.88rem;
  font-weight: 600;
  color: var(--color-text-light);
  white-space: nowrap;
}

.ticker-item i, .ticker-item svg {
  width: 18px;
  height: 18px;
  color: var(--color-accent);
}

@keyframes tickerScroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

/* ── Services Section ────────────────────────────────────────── */
.services-section {
  background: var(--color-bg);
  position: relative;
}

.services-section .section-number {
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

/* ── Stats Section ───────────────────────────────────────────── */
.stats-section {
  background: var(--color-bg-alt);
  position: relative;
}

.stats-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  text-align: center;
}

.stat-item {
  position: relative;
  padding: var(--space-xl) var(--space-md);
}

.stat-item::after {
  content: '';
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  width: 1px;
  height: 60%;
  background: rgba(var(--color-primary-rgb), 0.08);
}

.stat-item:last-child::after { display: none; }

/* ── CTA Banner ──────────────────────────────────────────────── */
.mid-cta {
  background: var(--color-primary);
  position: relative;
}

.mid-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 30% 50%, rgba(var(--color-accent-rgb), 0.12) 0%, transparent 60%);
  pointer-events: none;
}

.mid-cta .container {
  position: relative;
  z-index: 1;
  text-align: center;
  max-width: 680px;
}

.mid-cta h2 {
  color: #fff;
  margin-bottom: var(--space-md);
}

.mid-cta p {
  color: rgba(255, 255, 255, 0.8);
  font-size: 1.1rem;
  line-height: 1.7;
  margin-bottom: var(--space-xl);
}

/* ── About / Process Section ─────────────────────────────────── */
.about-section {
  background: var(--color-bg);
  position: relative;
}

.about-section .section-number {
  position: absolute;
  top: var(--space-2xl);
  right: clamp(1rem, 4vw, 2rem);
  font-family: var(--font-heading);
  font-size: clamp(4rem, 8vw, 7rem);
  font-weight: 900;
  color: rgba(var(--color-primary-rgb), 0.03);
  line-height: 1;
  pointer-events: none;
}

.about-split {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr;
  gap: var(--space-3xl);
  align-items: start;
}

.about-story h3 {
  font-size: 1.1rem;
  color: var(--color-accent);
  margin-bottom: var(--space-md);
}

.about-story p {
  color: var(--color-text-light);
  line-height: 1.7;
  margin-bottom: var(--space-lg);
}

.process-steps {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-xl);
}

.process-step {
  display: flex;
  gap: var(--space-md);
  align-items: flex-start;
}

.process-step-num {
  font-family: var(--font-heading);
  font-size: 2rem;
  font-weight: 900;
  color: rgba(var(--color-accent-rgb), 0.15);
  line-height: 1;
  flex-shrink: 0;
}

.process-step h4 {
  font-size: 0.95rem;
  margin-bottom: var(--space-xs);
}

.process-step p {
  font-size: 0.88rem;
  color: var(--color-text-light);
  line-height: 1.55;
  margin: 0;
}

.about-image-wrap {
  position: relative;
}

.about-image-wrap .img-reveal {
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
}

.about-stat-overlay {
  position: absolute;
  bottom: -20px;
  left: -20px;
  background: var(--color-accent);
  color: #fff;
  padding: var(--space-lg) var(--space-xl);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-xl);
  text-align: center;
  z-index: 2;
}

.about-stat-overlay .stat-number {
  font-size: 2.5rem;
  color: #fff;
  line-height: 1;
}

.about-stat-overlay .stat-label {
  font-size: 0.8rem;
  color: rgba(255, 255, 255, 0.9);
  margin-top: var(--space-xs);
  text-transform: uppercase;
  letter-spacing: 0.08em;
  font-weight: 600;
}

/* ── Reviews Section ─────────────────────────────────────────── */
.reviews-section {
  background: var(--color-bg-dark);
  position: relative;
}

.reviews-section .section-number {
  position: absolute;
  top: var(--space-2xl);
  left: clamp(1rem, 4vw, 2rem);
  font-family: var(--font-heading);
  font-size: clamp(4rem, 8vw, 7rem);
  font-weight: 900;
  color: rgba(255, 255, 255, 0.03);
  line-height: 1;
  pointer-events: none;
}

.reviews-section .section-title h2 { color: #fff; }
.reviews-section .section-subtitle { color: var(--color-accent); }
.reviews-section .eyebrow-label { color: var(--color-accent); }

.reviews-swiper {
  padding-bottom: var(--space-2xl);
}

.review-card {
  background: rgba(255, 255, 255, 0.06);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  height: 100%;
  display: flex;
  flex-direction: column;
}

.review-stars {
  color: #f59e0b;
  font-size: 1.1rem;
  letter-spacing: 2px;
  margin-bottom: var(--space-md);
}

.review-quote {
  color: rgba(255, 255, 255, 0.85);
  font-style: italic;
  line-height: 1.7;
  flex: 1;
  margin-bottom: var(--space-lg);
  font-size: 0.95rem;
}

.review-author {
  font-weight: 700;
  color: #fff;
  font-size: 0.9rem;
}

.review-meta {
  font-size: 0.8rem;
  color: rgba(255, 255, 255, 0.5);
  margin-top: var(--space-xs);
}

.review-badge-strip {
  display: flex;
  justify-content: center;
  gap: var(--space-xl);
  margin-top: var(--space-2xl);
  flex-wrap: wrap;
}

.review-badge {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  padding: var(--space-sm) var(--space-lg);
  background: rgba(255, 255, 255, 0.06);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: var(--radius-md);
  font-size: 0.85rem;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.8);
}

.review-badge i, .review-badge svg {
  width: 18px;
  height: 18px;
  color: var(--color-accent);
}

/* Swiper overrides for reviews */
.reviews-swiper .swiper-pagination-bullet {
  background: rgba(255, 255, 255, 0.3);
  opacity: 1;
}
.reviews-swiper .swiper-pagination-bullet-active {
  background: var(--color-accent);
}

/* ── FAQ Section ─────────────────────────────────────────────── */
.faq-section {
  background: var(--color-bg-alt);
  position: relative;
}

.faq-section .section-number {
  position: absolute;
  top: var(--space-2xl);
  right: clamp(1rem, 4vw, 2rem);
  font-family: var(--font-heading);
  font-size: clamp(4rem, 8vw, 7rem);
  font-weight: 900;
  color: rgba(var(--color-primary-rgb), 0.03);
  line-height: 1;
  pointer-events: none;
}

.faq-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0 var(--space-3xl);
  max-width: 960px;
  margin: 0 auto;
}

/* ── Closing CTA ─────────────────────────────────────────────── */
.closing-cta {
  background: linear-gradient(135deg, var(--color-primary) 0%, rgba(var(--color-secondary-rgb), 0.9) 100%);
  text-align: center;
  position: relative;
}

.closing-cta::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  pointer-events: none;
}

.closing-cta .container {
  position: relative;
  z-index: 1;
  max-width: 700px;
}

.closing-cta h2 { color: #fff; margin-bottom: var(--space-md); }
.closing-cta p { color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; line-height: 1.7; margin-bottom: var(--space-xl); }

/* ── Section Dividers ────────────────────────────────────────── */
.divider-angle-down svg { display: block; }
.divider-curve-up svg { display: block; }

/* ── Responsive ──────────────────────────────────────────────── */
@media (max-width: 960px) {
  .hero .container {
    grid-template-columns: 1fr;
    gap: var(--space-2xl);
  }
  .about-split {
    grid-template-columns: 1fr;
    gap: var(--space-2xl);
  }
  .about-image-wrap { order: -1; }
  .process-steps { grid-template-columns: 1fr; }
}

@media (max-width: 768px) {
  .hero .container {
    padding-top: calc(var(--navbar-height) + var(--space-xl));
    padding-bottom: var(--space-2xl);
  }
  .stats-row {
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-md);
  }
  .stat-item::after { display: none; }
  .faq-grid {
    grid-template-columns: 1fr;
  }
  .about-stat-overlay {
    left: auto;
    right: var(--space-md);
    bottom: -15px;
  }
  .review-badge-strip {
    gap: var(--space-md);
  }
}

@media (max-width: 480px) {
  .hero-actions { flex-direction: column; }
  .hero-actions .btn-primary,
  .hero-actions .btn-secondary { width: 100%; text-align: center; }
  .hero-trust { flex-direction: column; gap: var(--space-sm); }
  .stats-row { grid-template-columns: 1fr 1fr; }
}
</style>


<!-- ════════════════════════════════════════════════════════════
     HERO SECTION
     ════════════════════════════════════════════════════════════ -->
<section class="hero">
  <div class="container">

    <!-- Left: Hero Text -->
    <div class="hero-text">
      <span class="hero-eyebrow">
        <i data-lucide="shield-check" aria-hidden="true"></i>
        Serving Eugene &amp; Lane County Since <?php echo $yearEstablished; ?>
      </span>
      <h1 class="hero-title">Build It Right the <span class="text-accent">First Time</span></h1>
      <p class="hero-subtitle">Marty Mar Construction is a licensed general contractor in Eugene, Oregon, handling everything from ground-up custom homes to kitchen remodels and outdoor living spaces — with direct communication and transparent pricing on every project.</p>
      <div class="hero-actions">
        <a href="#estimate-form" class="btn-primary">
          <i data-lucide="file-text" aria-hidden="true"></i> Get a Free Estimate
        </a>
        <a href="tel:<?php echo $phonePlain; ?>" class="btn-secondary btn-secondary--light">
          <i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?>
        </a>
      </div>
      <div class="hero-trust">
        <span class="hero-trust-item"><i data-lucide="shield-check" aria-hidden="true"></i> Licensed &amp; Insured</span>
        <span class="hero-trust-item"><i data-lucide="calendar" aria-hidden="true"></i> <?php echo $yearsInBusiness; ?>+ Years</span>
        <span class="hero-trust-item"><i data-lucide="star" aria-hidden="true"></i> 4.9 Google Rating</span>
        <span class="hero-trust-item"><i data-lucide="map-pin" aria-hidden="true"></i> Eugene, OR Based</span>
      </div>
    </div>

    <!-- Right: Lead Capture Form -->
    <aside class="hero-form-card" id="estimate-form">
      <h2>Get Your Free Estimate</h2>
      <p class="hero-form-tagline">No obligation. Same-day response.</p>
      <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
        <!-- Honeypot -->
        <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
        <!-- Hidden tracking -->
        <input type="hidden" name="_form_location" value="hero">
        <input type="hidden" name="_next" value="/thank-you">
        <input type="hidden" name="_consent_version" value="v2.1">
        <input type="hidden" name="_consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
        <!-- Visible fields -->
        <div class="form-row">
          <input type="text" name="name" placeholder="Full name" required>
        </div>
        <div class="form-row">
          <input type="tel" name="phone" placeholder="Phone number" required>
        </div>
        <div class="form-row">
          <input type="email" name="email" placeholder="Email address" required>
        </div>
        <div class="form-row">
          <select name="service">
            <option value="">What do you need?</option>
            <?php foreach ($services as $svc): ?>
            <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn-primary btn-block">Get My Free Estimate</button>
        <p class="form-footnote">By submitting, you agree to our <a href="/terms/">Terms</a> and <a href="/privacy-policy/">Privacy Policy</a>.</p>
      </form>
    </aside>

  </div>

  <!-- Angle Divider -->
  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" fill="var(--color-bg-alt)" aria-hidden="true">
      <path d="M0,60 L1440,60 L1440,0 C960,50 480,50 0,0 Z"/>
    </svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     TICKER STRIP
     ════════════════════════════════════════════════════════════ -->
<section class="ticker-section" aria-hidden="true">
  <div class="ticker-track">
    <?php
    $tickerItems = [
        ['icon' => 'calendar',      'text' => $yearsInBusiness . '+ Years in Business'],
        ['icon' => 'home',          'text' => 'New Home Construction'],
        ['icon' => 'building-2',    'text' => 'Home Additions'],
        ['icon' => 'hammer',        'text' => 'Full Remodeling'],
        ['icon' => 'bath',          'text' => 'Bathroom Renovations'],
        ['icon' => 'utensils',      'text' => 'Kitchen Remodeling'],
        ['icon' => 'layout-grid',   'text' => 'Decks & Outdoor Structures'],
        ['icon' => 'star',          'text' => '4.9 ★ Google Rating'],
        ['icon' => 'shield-check',  'text' => 'Licensed & Insured'],
        ['icon' => 'map-pin',       'text' => 'Serving All of Lane County'],
    ];
    // Duplicate for seamless loop
    for ($loop = 0; $loop < 2; $loop++):
      foreach ($tickerItems as $item):
    ?>
    <span class="ticker-item">
      <i data-lucide="<?php echo $item['icon']; ?>"></i>
      <?php echo htmlspecialchars($item['text']); ?>
    </span>
    <?php
      endforeach;
    endfor;
    ?>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     SERVICES SECTION (01)
     ════════════════════════════════════════════════════════════ -->
<section class="services-section" aria-label="Construction services">
  <span class="section-number" aria-hidden="true">01</span>

  <!-- Curved Divider Top -->
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 40" preserveAspectRatio="none" fill="var(--color-bg-alt)" aria-hidden="true">
      <path d="M0,0 L1440,0 L1440,40 C960,0 480,0 0,40 Z"/>
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What <span class="text-accent">Construction Services</span> Does Marty Mar Offer in Eugene?</h2>
      <p class="hero-answer">Marty Mar Construction Inc is a full-service general contractor based in Eugene, Oregon, delivering new home builds, room additions, whole-home remodeling, kitchen and bathroom renovations, and custom deck construction across Lane County since <?php echo $yearEstablished; ?>.</p>
      <span class="section-subtitle">Hands-on craftsmanship, every phase</span>
    </div>

    <div class="services-grid">
      <?php
      $tintCycle = [1, 2, 3];
      $serviceBullets = [
          'new-home-construction' => ['Custom floor plans for your lot', 'Foundation-to-finish oversight', 'Rain-ready weatherproofing'],
          'home-additions'       => ['Seamless match to existing structure', 'Second-story expansions', 'ADU and garage conversions'],
          'remodeling-renovations'=> ['Whole-home transformations', 'Structural and cosmetic work', 'On-schedule, on-budget delivery'],
          'bathroom-remodeling'   => ['Walk-in showers and soaking tubs', 'Custom tile and vanity work', 'Full gut or targeted upgrades'],
          'kitchen-remodeling'    => ['Custom cabinetry and countertops', 'Layout and structural changes', 'Lighting and appliance planning'],
          'deck-outdoor-structures'=> ['Composite and timber options', 'Engineered for Oregon rain and moisture', 'Pergolas, porches, and shade structures'],
      ];
      foreach ($services as $i => $svc):
        $tint = $tintCycle[$i % 3];
        $delay = ($i % 3) + 1;
        $bullets = $serviceBullets[$svc['slug']] ?? ['Professional installation', 'Licensed and insured', 'Free estimates available'];
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-up reveal-delay-<?php echo $delay; ?>">
        <div class="service-card__image">
          <img src="<?php echo htmlspecialchars($svc['image']); ?>" alt="<?php echo htmlspecialchars($svc['name']); ?> in Eugene, Oregon" width="600" height="360" loading="lazy">
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

    <div class="text-center reveal-up" style="margin-top: var(--space-2xl);">
      <a href="/services/" class="btn-secondary">View All <?php echo count($services); ?> Services</a>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     STATS SECTION
     ════════════════════════════════════════════════════════════ -->
<section class="stats-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <polygon points="0,50 1440,0 1440,50"/>
    </svg>
  </div>

  <div class="container">
    <div class="stats-row">
      <div class="stat-item reveal-up reveal-delay-1">
        <div class="stat-block">
          <span class="stat-watermark" aria-hidden="true"><?php echo $yearsInBusiness; ?></span>
          <span class="stat-number" data-target="<?php echo $yearsInBusiness; ?>" data-suffix="+">0</span>
          <span class="stat-label">Years in Business</span>
        </div>
      </div>
      <div class="stat-item reveal-up reveal-delay-2">
        <div class="stat-block">
          <span class="stat-watermark" aria-hidden="true">500</span>
          <span class="stat-number" data-target="500" data-suffix="+">0</span>
          <span class="stat-label">Projects Completed</span>
        </div>
      </div>
      <div class="stat-item reveal-up reveal-delay-3">
        <div class="stat-block">
          <span class="stat-watermark" aria-hidden="true">4.9</span>
          <span class="stat-number" data-target="4" data-suffix=".9">0</span>
          <span class="stat-label">Google Rating</span>
        </div>
      </div>
      <div class="stat-item reveal-up reveal-delay-4">
        <div class="stat-block">
          <span class="stat-watermark" aria-hidden="true">30</span>
          <span class="stat-number" data-target="30" data-suffix=" mi">0</span>
          <span class="stat-label">Service Radius</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <polygon points="0,0 0,50 1440,50"/>
    </svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     MID-PAGE CTA BANNER
     ════════════════════════════════════════════════════════════ -->
<section class="mid-cta">
  <div class="container reveal-up">
    <span class="eyebrow-label" style="color: var(--color-accent);">Ready to Start?</span>
    <h2>Your Project Won't Build Itself</h2>
    <p>The Eugene area's building season fills fast. Lock in your contractor now so your remodel, addition, or new build starts on schedule — not next year's schedule.</p>
    <a href="/contact/" class="btn-primary">
      <i data-lucide="arrow-right" aria-hidden="true"></i> Schedule Your Free Consultation
    </a>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     ABOUT / PROCESS SECTION (02)
     ════════════════════════════════════════════════════════════ -->
<section class="about-section">
  <span class="section-number" aria-hidden="true">02</span>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">How We Work</span>
      <h2>Why Homeowners in <span class="text-accent">Eugene</span> Choose Marty Mar</h2>
      <span class="section-subtitle">Straight talk, solid builds</span>
    </div>

    <div class="about-split">
      <!-- Left: Story + Process -->
      <div class="about-content reveal-left">
        <div class="about-story">
          <h3>Built for the Willamette Valley</h3>
          <p>Marty Mar Construction has been building and remodeling homes across Lane County since 2007. From custom homes in South Hills to kitchen overhauls in the Friendly neighborhood, we know this market — the clay soils, the rain management, the permit timelines, and the subcontractor networks that actually show up on Monday.</p>
          <p>Unlike brokers who hand your project off to whoever's cheapest, Marty is on-site and directly managing your build. You get one point of contact, transparent pricing, and a schedule you can hold us to. We've earned our reputation one referral at a time — not through paid ads.</p>
        </div>

        <div class="process-steps">
          <div class="process-step reveal-up reveal-delay-1">
            <span class="process-step-num">01</span>
            <div>
              <h4>Inspect</h4>
              <p>Free on-site assessment of your property, scope, and goals.</p>
            </div>
          </div>
          <div class="process-step reveal-up reveal-delay-2">
            <span class="process-step-num">02</span>
            <div>
              <h4>Plan</h4>
              <p>Detailed estimate, material specs, and realistic timeline before we break ground.</p>
            </div>
          </div>
          <div class="process-step reveal-up reveal-delay-3">
            <span class="process-step-num">03</span>
            <div>
              <h4>Build</h4>
              <p>Licensed crew on-site daily. Direct communication, no subcontractor runaround.</p>
            </div>
          </div>
          <div class="process-step reveal-up reveal-delay-4">
            <span class="process-step-num">04</span>
            <div>
              <h4>Deliver</h4>
              <p>Final walkthrough, punch list, and inspection sign-off — we don't leave until it's right.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: Image + Stat Overlay -->
      <div class="about-image-wrap reveal-right">
        <div class="img-reveal">
          <img src="<?php echo htmlspecialchars($clientPhotos[3]); ?>" alt="Marty Mar Construction crew working on a home project in Eugene, Oregon" width="600" height="450" loading="lazy">
        </div>
        <div class="about-stat-overlay">
          <span class="stat-number" data-target="<?php echo $yearsInBusiness; ?>" data-suffix="+">0</span>
          <span class="stat-label">Years in Eugene</span>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     REVIEWS SECTION (03)
     ════════════════════════════════════════════════════════════ -->
<section class="reviews-section">
  <span class="section-number" aria-hidden="true">03</span>

  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <path d="M0,0 C360,50 1080,50 1440,0 L1440,50 L0,50 Z"/>
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">What Clients Say</span>
      <h2>Real Reviews from <span class="text-accent">Eugene Area</span> Homeowners</h2>
      <span class="section-subtitle">Honest feedback, no filters</span>
    </div>

    <div class="reviews-swiper swiper reveal-up">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="review-card">
            <div class="review-stars" aria-label="5 out of 5 stars">★★★★★</div>
            <p class="review-quote">"Marty and his team did an incredible job on our bathroom remodel. Professional from start to finish, great communication, and the quality of work exceeded our expectations. Highly recommend for anyone in Eugene looking for a reliable contractor."</p>
            <span class="review-author">Sarah M.</span>
            <span class="review-meta">Eugene, OR — Bathroom Remodel</span>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="review-card">
            <div class="review-stars" aria-label="5 out of 5 stars">★★★★★</div>
            <p class="review-quote">"We hired Marty Mar Construction for a room addition and couldn't be happier. They matched the existing roofline perfectly and stayed on schedule despite weeks of rain. The crew was respectful and kept our property clean every day."</p>
            <span class="review-author">James &amp; Linda T.</span>
            <span class="review-meta">Springfield, OR — Home Addition</span>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="review-card">
            <div class="review-stars" aria-label="5 out of 5 stars">★★★★★</div>
            <p class="review-quote">"From the initial estimate to the final walkthrough, Marty was honest, on-time, and delivered exactly what he promised. Our kitchen remodel came in on budget and looks amazing. We'll call him again for the deck next spring."</p>
            <span class="review-author">David R.</span>
            <span class="review-meta">Eugene, OR — Kitchen Remodel</span>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="review-card">
            <div class="review-stars" aria-label="5 out of 5 stars">★★★★★</div>
            <p class="review-quote">"Built our custom home from the ground up. Marty managed every sub, handled all permits, and communicated with us weekly. No surprise costs, no delays. If you're building in the Eugene area, this is your contractor."</p>
            <span class="review-author">Mike &amp; Karen P.</span>
            <span class="review-meta">Junction City, OR — New Home Construction</span>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="review-card">
            <div class="review-stars" aria-label="5 out of 5 stars">★★★★★</div>
            <p class="review-quote">"We needed a deck that could handle Oregon rain year-round — Marty's team built a composite deck with a covered section that's already survived two wet winters with zero issues. Solid work, fair price."</p>
            <span class="review-author">Chris L.</span>
            <span class="review-meta">Cottage Grove, OR — Deck Construction</span>
          </div>
        </div>

      </div>
      <div class="swiper-pagination"></div>
    </div>

    <div class="review-badge-strip reveal-up">
      <span class="review-badge"><i data-lucide="star" aria-hidden="true"></i> 4.9 Google Reviews</span>
      <span class="review-badge"><i data-lucide="facebook" aria-hidden="true"></i> Recommended on Facebook</span>
      <span class="review-badge"><i data-lucide="shield-check" aria-hidden="true"></i> Licensed Oregon Contractor</span>
    </div>
  </div>

  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg-alt)" aria-hidden="true">
      <path d="M0,50 C360,0 1080,0 1440,50 L1440,50 L0,50 Z"/>
    </svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     FAQ SECTION (04)
     ════════════════════════════════════════════════════════════ -->
<section class="faq-section">
  <span class="section-number" aria-hidden="true">04</span>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Common Questions</span>
      <h2>Frequently Asked <span class="text-accent">Questions</span></h2>
      <span class="section-subtitle">Answers before you ask</span>
    </div>

    <div class="faq-grid">
      <?php foreach ($homeFaqs as $i => $faq): ?>
      <details class="faq-item reveal-up reveal-delay-<?php echo ($i % 4) + 1; ?>">
        <summary><?php echo htmlspecialchars($faq['q']); ?></summary>
        <div class="faq-answer">
          <p><?php echo htmlspecialchars($faq['a']); ?></p>
        </div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     CLOSING CTA
     ════════════════════════════════════════════════════════════ -->
<section class="closing-cta">
  <div class="container reveal-up">
    <span class="eyebrow-label" style="color: var(--color-accent);">Let's Build Something</span>
    <h2>Your Next Project Starts with a Conversation</h2>
    <p>Whether it's a new home, a kitchen remodel, or a deck that handles Oregon winters — Marty Mar Construction delivers. Call <?php echo $phone; ?> or request your free estimate online.</p>
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


<!-- ═══ Swiper Init (Reviews Carousel) ═══ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  if (typeof Swiper !== 'undefined') {
    new Swiper('.reviews-swiper', {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
    });
  }
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
