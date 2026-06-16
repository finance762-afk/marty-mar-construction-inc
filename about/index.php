<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$pageTitle       = 'About Marty Mar Construction | General Contractor Eugene, OR | Since ' . $yearEstablished;
$pageDescription = 'Learn about Marty Mar Construction Inc — a licensed general contractor serving Eugene, Springfield, Cottage Grove, and Lane County since ' . $yearEstablished . '. Meet the team behind ' . $yearsInBusiness . '+ years of custom homes, remodels, and additions.';
$canonicalUrl    = $siteUrl . '/about/';
$ogImage         = $clientPhotos[3];
$currentPage     = 'about';
$heroImagePreload = $clientPhotos[25];
$cssVersion      = '5.0';

// ── Schema Markup ─────────────────────────────────────────────
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'About'],
]);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<!-- BreadcrumbList Schema -->
<script type="application/ld+json">
<?php echo $breadcrumbSchema; ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     ABOUT PAGE — Marty Mar Construction Inc
     Phase 5: About, Contact & Utility Pages
     ═══════════════════════════════════════════════════════════ -->

<style>
/* ── About Hero ─────────────────────────────────────────────── */
.about-hero {
  position: relative;
  min-height: 55vh;
  display: flex;
  align-items: center;
  background: var(--color-primary);
  overflow: hidden;
}

.about-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url('<?php echo htmlspecialchars($heroImagePreload); ?>') center/cover no-repeat;
  z-index: 0;
}

.about-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(var(--color-primary-rgb), 0.9) 0%, rgba(var(--color-primary-rgb), 0.72) 50%, rgba(var(--color-primary-rgb), 0.85) 100%);
  z-index: 1;
}

.about-hero .container {
  position: relative;
  z-index: 2;
  padding-top: calc(var(--navbar-height) + var(--space-3xl));
  padding-bottom: var(--space-3xl);
  max-width: 800px;
  text-align: center;
}

.about-hero .eyebrow-label { color: var(--color-accent); }

.about-hero h1 {
  color: #fff;
  margin-bottom: var(--space-md);
}

.about-hero h1 .text-accent {
  color: var(--color-accent);
  font-family: var(--font-accent);
  font-size: 1.1em;
}

.about-hero-subtitle {
  color: rgba(255, 255, 255, 0.8);
  font-size: 1.15rem;
  line-height: 1.7;
  max-width: 60ch;
  margin: 0 auto;
}

/* ── Breadcrumb ─────────────────────────────────────────────── */
.breadcrumb {
  display: flex;
  gap: var(--space-sm);
  align-items: center;
  font-size: 0.85rem;
  color: rgba(255, 255, 255, 0.6);
  margin-bottom: var(--space-xl);
  justify-content: center;
}

.breadcrumb a { color: rgba(255, 255, 255, 0.7); transition: color var(--transition-base); }
.breadcrumb a:hover { color: var(--color-accent); }
.breadcrumb-sep { color: rgba(255, 255, 255, 0.4); }

/* ── Story Section ──────────────────────────────────────────── */
.story-section {
  background: var(--color-bg);
  position: relative;
}

.story-section .section-number {
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

.story-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: start;
}

.story-content h2 {
  margin-bottom: var(--space-lg);
}

.story-content h2 .text-accent {
  color: var(--color-accent);
  font-family: var(--font-accent);
  font-size: 1.1em;
}

.story-content p {
  color: var(--color-text-light);
  line-height: 1.75;
  margin-bottom: var(--space-lg);
  max-width: 58ch;
}

.story-content .eyebrow-label {
  margin-bottom: var(--space-md);
  display: block;
}

.story-image-stack {
  position: relative;
}

.story-image-primary {
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
}

.story-image-primary img {
  width: 100%;
  height: auto;
  display: block;
}

.story-image-secondary {
  position: absolute;
  bottom: -30px;
  left: -30px;
  width: 55%;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  border: 4px solid var(--color-bg);
}

.story-image-secondary img {
  width: 100%;
  height: auto;
  display: block;
}

/* ── Values Section ─────────────────────────────────────────── */
.values-section {
  background: var(--color-bg-alt);
  position: relative;
}

.values-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-xl);
  margin-top: var(--space-2xl);
}

.value-card {
  padding: var(--space-2xl) var(--space-xl);
  border-radius: var(--radius-lg);
  text-align: center;
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.value-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-md);
}

.value-icon {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-lg);
  color: var(--color-accent);
}

.value-icon i, .value-icon svg {
  width: 28px;
  height: 28px;
}

.value-card h3 {
  font-size: 1.15rem;
  margin-bottom: var(--space-sm);
}

.value-card p {
  font-size: 0.92rem;
  color: var(--color-text-light);
  line-height: 1.6;
}

/* ── Timeline Section ───────────────────────────────────────── */
.timeline-section {
  background: var(--color-bg);
  position: relative;
}

.timeline-section .section-number {
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

.timeline {
  position: relative;
  max-width: 700px;
  margin: 0 auto;
  padding-left: var(--space-3xl);
}

.timeline::before {
  content: '';
  position: absolute;
  left: 14px;
  top: 0;
  bottom: 0;
  width: 3px;
  background: linear-gradient(to bottom, var(--color-accent), var(--color-secondary));
  border-radius: 2px;
}

.timeline-item {
  position: relative;
  padding-bottom: var(--space-2xl);
}

.timeline-item:last-child { padding-bottom: 0; }

.timeline-dot {
  position: absolute;
  left: calc(-1 * var(--space-3xl) + 6px);
  top: 4px;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: var(--color-accent);
  border: 3px solid var(--color-bg);
  box-shadow: var(--shadow-sm);
  z-index: 1;
}

.timeline-year {
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: 1.1rem;
  color: var(--color-accent);
  margin-bottom: var(--space-xs);
}

.timeline-item h3 {
  font-size: 1.05rem;
  margin-bottom: var(--space-xs);
}

.timeline-item p {
  font-size: 0.92rem;
  color: var(--color-text-light);
  line-height: 1.65;
}

/* ── Credentials Section ────────────────────────────────────── */
.credentials-section {
  background: var(--color-bg-dark);
  position: relative;
}

.credentials-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  text-align: center;
}

.credential-item {
  padding: var(--space-xl);
}

.credential-icon {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-md);
  color: var(--color-accent);
}

.credential-icon i, .credential-icon svg {
  width: 24px;
  height: 24px;
}

.credential-item h4 {
  color: #fff;
  font-size: 0.95rem;
  margin-bottom: var(--space-xs);
}

.credential-item p {
  font-size: 0.85rem;
  color: rgba(255, 255, 255, 0.6);
  line-height: 1.55;
}

/* ── About CTA ──────────────────────────────────────────────── */
.about-cta {
  background: linear-gradient(135deg, var(--color-primary) 0%, rgba(var(--color-secondary-rgb), 0.9) 100%);
  text-align: center;
  position: relative;
}

.about-cta::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  pointer-events: none;
}

.about-cta .container {
  position: relative;
  z-index: 1;
  max-width: 700px;
}

.about-cta h2 { color: #fff; margin-bottom: var(--space-md); }
.about-cta p { color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; line-height: 1.7; margin-bottom: var(--space-xl); }

/* ── Section Dividers ───────────────────────────────────────── */
.divider-angle svg, .divider-curve svg { display: block; width: 100%; height: auto; }

/* ── Responsive ─────────────────────────────────────────────── */
@media (max-width: 960px) {
  .story-grid {
    grid-template-columns: 1fr;
    gap: var(--space-2xl);
  }
  .story-image-stack { order: -1; }
  .story-image-secondary {
    bottom: -20px;
    left: auto;
    right: -15px;
    width: 45%;
  }
  .values-grid { grid-template-columns: 1fr; max-width: 480px; margin-left: auto; margin-right: auto; }
  .credentials-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 768px) {
  .about-hero { min-height: 45vh; }
  .about-hero .container {
    padding-top: calc(var(--navbar-height) + var(--space-2xl));
    padding-bottom: var(--space-2xl);
  }
  .credentials-grid { grid-template-columns: 1fr 1fr; gap: var(--space-md); }
  .timeline { padding-left: var(--space-2xl); }
  .timeline-dot { left: calc(-1 * var(--space-2xl) + 6px); }
}
</style>


<!-- ════════════════════════════════════════════════════════════
     ABOUT HERO
     ════════════════════════════════════════════════════════════ -->
<section class="about-hero hero">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">About</span>
    </nav>
    <span class="eyebrow-label">About Our Company</span>
    <h1>Building the Eugene Area Since <span class="text-accent"><?php echo $yearEstablished; ?></span></h1>
    <p class="about-hero-subtitle"><?php echo htmlspecialchars($siteName); ?> is a licensed general contractor based in <?php echo $address['city']; ?>, <?php echo $address['state']; ?>, delivering hands-on project management for custom homes, additions, and remodels across Lane County and beyond.</p>
  </div>

  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <path d="M0,60 L1440,60 L1440,0 C960,50 480,50 0,0 Z"/>
    </svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     COMPANY STORY
     ════════════════════════════════════════════════════════════ -->
<section class="story-section">
  <span class="section-number" aria-hidden="true">01</span>

  <div class="container">
    <div class="story-grid">
      <div class="story-content reveal-left">
        <span class="eyebrow-label">Our Story</span>
        <h2>From First Framing Nail to <span class="text-accent">Full-Service Contractor</span></h2>
        <p>Marty Mar started swinging a hammer in the Eugene area back in 2007 — not as a company, but as a craftsman who believed the person running the job should be the person on the job. That philosophy hasn't changed. <?php echo $yearsInBusiness; ?> years later, Marty Mar Construction Inc handles everything from ground-up custom homes to single-room remodels, and Marty is still the one coordinating your build, walking your site, and answering your calls.</p>
        <p>We grew through referrals, not marketing budgets. Homeowners in South Hills, River Road, Friendly, Cal Young, and neighborhoods across Eugene and Springfield keep sending their neighbors our way because we show up, communicate clearly, and deliver what we promise. No subcontractor runaround. No surprise change orders. One point of contact from estimate to final walkthrough.</p>
        <p>Lane County's building environment is unique — Willamette Valley clay soils, persistent rain and moisture management, seasonal flooding concerns, and a permit process that demands local expertise. We've navigated Lane County permitting on hundreds of projects, and we build every structure to handle what Oregon's wet climate throws at it.</p>
      </div>

      <div class="story-image-stack reveal-right">
        <div class="story-image-primary">
          <img src="<?php echo htmlspecialchars($clientPhotos[3]); ?>" alt="Marty Mar Construction crew working on a home project in Eugene, Oregon" width="600" height="450" loading="lazy">
        </div>
        <div class="story-image-secondary">
          <img src="<?php echo htmlspecialchars($clientPhotos[12]); ?>" alt="Custom home construction detail by Marty Mar Construction in Lane County, Oregon" width="400" height="300" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     VALUES SECTION
     ════════════════════════════════════════════════════════════ -->
<section class="values-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <polygon points="0,50 1440,0 1440,50"/>
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">What Drives Us</span>
      <h2>The Values Behind Every <span class="text-accent">Build</span></h2>
      <span class="section-subtitle">More than a contractor — a partner</span>
    </div>

    <div class="values-grid">
      <div class="value-card card-tint-1 reveal-up reveal-delay-1">
        <div class="value-icon"><i data-lucide="message-circle" aria-hidden="true"></i></div>
        <h3>Direct Communication</h3>
        <p>You talk to the person building your project — not a call center, not an office manager. Marty answers the phone and walks the jobsite.</p>
      </div>
      <div class="value-card card-tint-2 reveal-up reveal-delay-2">
        <div class="value-icon"><i data-lucide="file-check" aria-hidden="true"></i></div>
        <h3>Transparent Pricing</h3>
        <p>Detailed written estimates before work starts. No hidden fees, no surprise change orders. If the scope changes, you hear about it first — with numbers.</p>
      </div>
      <div class="value-card card-tint-3 reveal-up reveal-delay-3">
        <div class="value-icon"><i data-lucide="hammer" aria-hidden="true"></i></div>
        <h3>Hands-On Craftsmanship</h3>
        <p>We don't broker your project out to the lowest bidder. Licensed crew on-site daily, with Marty managing every phase from permits to punch list.</p>
      </div>
    </div>
  </div>

  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <path d="M0,0 C360,50 1080,50 1440,0 L1440,50 L0,50 Z"/>
    </svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     TIMELINE / MILESTONES
     ════════════════════════════════════════════════════════════ -->
<section class="timeline-section">
  <span class="section-number" aria-hidden="true">02</span>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Our Journey</span>
      <h2><?php echo $yearsInBusiness; ?> Years of <span class="text-accent">Building Right</span></h2>
      <span class="section-subtitle">Key milestones along the way</span>
    </div>

    <div class="timeline">
      <div class="timeline-item reveal-left reveal-delay-1">
        <div class="timeline-dot"></div>
        <span class="timeline-year">2007</span>
        <h3>Founded in Eugene</h3>
        <p>Marty Mar Construction launched as a hands-on general contracting operation in Eugene, Oregon, focused on residential remodeling and small additions across Lane County.</p>
      </div>
      <div class="timeline-item reveal-left reveal-delay-2">
        <div class="timeline-dot"></div>
        <span class="timeline-year">2010</span>
        <h3>Expanded to New Home Construction</h3>
        <p>After three years of successful remodels and referrals, we added full custom home construction — managing ground-up builds from foundation to finish across the Eugene area.</p>
      </div>
      <div class="timeline-item reveal-left reveal-delay-3">
        <div class="timeline-dot"></div>
        <span class="timeline-year">2015</span>
        <h3>Serving All of Lane County</h3>
        <p>Grew our reach to include Springfield, Cottage Grove, Junction City, Veneta, and Creswell — building a reputation across the Willamette Valley for reliable, on-schedule work.</p>
      </div>
      <div class="timeline-item reveal-left reveal-delay-4">
        <div class="timeline-dot"></div>
        <span class="timeline-year">2020</span>
        <h3>500+ Projects Milestone</h3>
        <p>Reached 500 completed residential projects — from bathroom refreshes to custom Willamette Valley homes — with a 4.9-star Google rating built entirely through word-of-mouth referrals.</p>
      </div>
      <div class="timeline-item reveal-left">
        <div class="timeline-dot"></div>
        <span class="timeline-year"><?php echo date('Y'); ?></span>
        <h3>Still Building, Still On-Site</h3>
        <p><?php echo $yearsInBusiness; ?> years in, Marty still walks every jobsite. We continue to grow through referrals, transparent pricing, and builds that stand up to Lane County's demanding climate.</p>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     CREDENTIALS & CERTIFICATIONS
     ════════════════════════════════════════════════════════════ -->
<section class="credentials-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <path d="M0,0 L1440,0 L1440,50 C960,0 480,0 0,50 Z"/>
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label" style="color: var(--color-accent);">Credentials</span>
      <h2 style="color: #fff;">Licensed, Insured, <span class="text-accent">Proven</span></h2>
      <span class="section-subtitle" style="color: var(--color-accent);">The paperwork behind the promise</span>
    </div>

    <div class="credentials-grid">
      <div class="credential-item reveal-up reveal-delay-1">
        <div class="credential-icon"><i data-lucide="shield-check" aria-hidden="true"></i></div>
        <h4>Oregon Licensed GC</h4>
        <p>Fully licensed general contractor in the State of Oregon with current CCB registration.</p>
      </div>
      <div class="credential-item reveal-up reveal-delay-2">
        <div class="credential-icon"><i data-lucide="file-shield" aria-hidden="true"></i></div>
        <h4>General Liability Insurance</h4>
        <p>Comprehensive general liability coverage protecting your property and our crew on every project.</p>
      </div>
      <div class="credential-item reveal-up reveal-delay-3">
        <div class="credential-icon"><i data-lucide="hard-hat" aria-hidden="true"></i></div>
        <h4>Workers' Compensation</h4>
        <p>Full workers' comp insurance for every team member — your home is never a liability risk.</p>
      </div>
      <div class="credential-item reveal-up reveal-delay-4">
        <div class="credential-icon"><i data-lucide="building-2" aria-hidden="true"></i></div>
        <h4>Lane County Permitted</h4>
        <p>Hundreds of permits pulled and inspections passed across Eugene, Springfield, and Lane County jurisdictions.</p>
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
     CLOSING CTA
     ════════════════════════════════════════════════════════════ -->
<section class="about-cta">
  <div class="container reveal-up">
    <span class="eyebrow-label" style="color: var(--color-accent);">Work With Us</span>
    <h2>Ready to Build Something That Lasts?</h2>
    <p>From a bathroom refresh to a ground-up custom home, Marty Mar Construction handles every phase — permits, framing, finishes, and final walkthrough. Call <?php echo $phone; ?> or request your free estimate today.</p>
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
