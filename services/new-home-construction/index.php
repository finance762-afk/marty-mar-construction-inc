<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$currentService  = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'new-home-construction') { $currentService = $svc; break; }
}

$pageTitle       = 'New Home Construction Bend OR | Custom Home Builder | ' . $siteName;
$pageDescription = 'Marty Mar Construction builds custom homes in Bend, Redmond, Sisters, and Central Oregon. Licensed general contractor managing every phase from foundation to finish. Call ' . $phone . ' for a free estimate.';
$canonicalUrl    = $siteUrl . '/services/new-home-construction/';
$ogImage         = $currentService['image'];
$currentPage     = 'services';
$heroImagePreload = $currentService['image'];
$cssVersion      = '4.1';

// ── Page FAQs ─────────────────────────────────────────────────
$pageFaqs = [
    ['q' => 'How long does it take to build a new home in Bend, Oregon?', 'a' => 'Most custom homes in Bend take 8-14 months from breaking ground to move-in, depending on size, complexity, and weather. Severe winter conditions at elevation can shift exterior timelines by 2-4 weeks. We set a detailed schedule before work begins and update you weekly.'],
    ['q' => 'How much does new home construction cost in Central Oregon?', 'a' => 'New construction in the Bend area typically runs $250-$450+ per square foot depending on finishes, site conditions, and design complexity. A 2,000 sq ft custom home generally ranges from $500,000 to $900,000. We provide a detailed written estimate after a site visit and plan review.'],
    ['q' => 'Do you build on my lot or help find land in Bend?', 'a' => 'We build on lots you already own throughout Central Oregon. While we don\'t sell land, we can assess your lot for buildability — soil conditions, slope, access, utility connections, and Deschutes County setback requirements — before you commit to a purchase.'],
    ['q' => 'What is included in your new home construction estimate?', 'a' => 'Our estimates cover site preparation, foundation, framing, roofing, mechanical systems (HVAC, plumbing, electrical), insulation, drywall, interior finishes, cabinetry, flooring, painting, and final landscaping grading. Permits, inspections, and project management are included — no hidden fees.'],
    ['q' => 'Does Marty Mar Construction handle building permits in Deschutes County?', 'a' => 'Yes. We pull all required permits through Deschutes County, the City of Bend, or the applicable jurisdiction. We coordinate every inspection from foundation to final certificate of occupancy so you don\'t have to manage the bureaucracy.'],
    ['q' => 'Can you build energy-efficient homes for Central Oregon winters?', 'a' => 'Absolutely. Every home we build meets or exceeds Oregon energy code. We use advanced framing techniques, high-R insulation, low-E windows, and sealed building envelopes designed for Bend\'s freeze-thaw cycles and 250+ days of sunshine. Heat pump systems and radiant floor heating are popular options.'],
];

// ── Schema Markup ─────────────────────────────────────────────
$serviceSchema    = generateServiceSchema($currentService);
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Services', 'url' => '/services/'],
    ['name' => 'New Home Construction'],
]);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<!-- Service Schema -->
<script type="application/ld+json">
<?php echo $serviceSchema; ?>
</script>

<!-- FAQPage Schema -->
<script type="application/ld+json">
<?php echo $faqSchema; ?>
</script>

<!-- BreadcrumbList Schema -->
<script type="application/ld+json">
<?php echo $breadcrumbSchema; ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     NEW HOME CONSTRUCTION — Service Page
     Phase 4: Individual Service Pages
     ═══════════════════════════════════════════════════════════ -->

<style>
/* ── Service Hero ────────────────────────────────────────────── */
.hero--service {
  position: relative;
  min-height: 55vh;
  display: flex;
  align-items: center;
  background: var(--color-primary);
  overflow: hidden;
}

.hero--service::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url('<?php echo htmlspecialchars($heroImagePreload); ?>') center/cover no-repeat;
  z-index: 0;
}

.hero--service::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(160deg, rgba(var(--color-primary-rgb), 0.92) 0%, rgba(var(--color-primary-rgb), 0.68) 55%, rgba(var(--color-primary-rgb), 0.85) 100%);
  z-index: 1;
}

.hero--service .container {
  position: relative;
  z-index: 2;
  text-align: center;
  max-width: 800px;
  padding-top: calc(var(--navbar-height) + var(--space-3xl));
  padding-bottom: var(--space-3xl);
}

.hero--service .breadcrumb {
  display: flex;
  justify-content: center;
  gap: var(--space-sm);
  font-size: 0.85rem;
  color: rgba(255, 255, 255, 0.6);
  margin-bottom: var(--space-xl);
}

.hero--service .breadcrumb a {
  color: rgba(255, 255, 255, 0.7);
  transition: color var(--transition-base);
}

.hero--service .breadcrumb a:hover { color: var(--color-accent); }
.hero--service .breadcrumb-sep { margin: 0 var(--space-xs); }

.hero--service h1 {
  font-size: var(--fs-h1);
  color: #fff;
  margin-bottom: var(--space-md);
  line-height: 1.05;
}

.hero--service .hero-answer {
  color: rgba(255, 255, 255, 0.85);
  font-size: 1.15rem;
  line-height: 1.7;
  max-width: 60ch;
  margin: 0 auto var(--space-xl);
}

.hero--service .hero-ctas {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  justify-content: center;
}

.hero--service .hero-trust {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: var(--space-lg);
  margin-top: var(--space-xl);
  font-size: 0.85rem;
  color: rgba(255, 255, 255, 0.7);
}

.hero--service .hero-trust span {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
}

.hero--service .hero-trust i,
.hero--service .hero-trust svg {
  width: 16px;
  height: 16px;
  color: var(--color-accent);
}

/* ── Service Detail Section ──────────────────────────────────── */
.service-detail {
  background: var(--color-bg);
  position: relative;
}

.service-detail .content-grid {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr;
  gap: var(--space-3xl);
  align-items: start;
}

.service-detail .content-text h2 {
  margin-bottom: var(--space-md);
}

.service-detail .content-text .answer-block {
  font-size: 1.05rem;
  line-height: 1.7;
  color: var(--color-text);
  margin-bottom: var(--space-lg);
}

.service-detail .content-text p {
  margin-bottom: var(--space-lg);
  max-width: var(--content-width);
  line-height: 1.7;
}

.service-detail .content-image {
  border-radius: var(--radius-lg);
  overflow: hidden;
  position: relative;
}

.service-detail .content-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.service-detail .content-image::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: var(--radius-lg);
  box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.06);
  pointer-events: none;
}

.service-detail .stat-row {
  display: flex;
  gap: var(--space-xl);
  margin-top: var(--space-xl);
  padding-top: var(--space-xl);
  border-top: 1px solid var(--color-border);
}

.service-detail .stat-item {
  text-align: center;
}

.service-detail .stat-number {
  font-family: var(--font-heading);
  font-size: 2rem;
  font-weight: 800;
  color: var(--color-accent);
  line-height: 1;
}

.service-detail .stat-label {
  font-size: 0.8rem;
  color: var(--color-text-light);
  margin-top: var(--space-xs);
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

@media (max-width: 860px) {
  .service-detail .content-grid {
    grid-template-columns: 1fr;
    gap: var(--space-xl);
  }
}

/* ── Process Section ─────────────────────────────────────────── */
.process-section {
  background: var(--color-bg-alt);
  position: relative;
}

.process-timeline {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  max-width: 1100px;
  margin: 0 auto;
  position: relative;
}

.process-timeline::before {
  content: '';
  position: absolute;
  top: 36px;
  left: 10%;
  right: 10%;
  height: 2px;
  background: linear-gradient(90deg, var(--color-accent), rgba(var(--color-accent-rgb), 0.2));
  z-index: 0;
}

.process-step {
  text-align: center;
  position: relative;
  z-index: 1;
}

.process-step__number {
  width: 72px;
  height: 72px;
  border-radius: 50%;
  background: var(--color-bg);
  border: 3px solid var(--color-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-lg);
  font-family: var(--font-heading);
  font-size: 1.5rem;
  font-weight: 800;
  color: var(--color-accent);
  box-shadow: var(--shadow-md);
}

.process-step h3 {
  font-size: 1.05rem;
  margin-bottom: var(--space-sm);
}

.process-step p {
  font-size: 0.92rem;
  color: var(--color-text-light);
  line-height: 1.6;
  max-width: 240px;
  margin: 0 auto;
}

@media (max-width: 860px) {
  .process-timeline {
    grid-template-columns: 1fr 1fr;
    gap: var(--space-2xl) var(--space-xl);
  }
  .process-timeline::before { display: none; }
}

@media (max-width: 500px) {
  .process-timeline { grid-template-columns: 1fr; }
}

/* ── Why Choose Section ──────────────────────────────────────── */
.why-service {
  background: var(--color-bg);
  position: relative;
}

.why-service__grid {
  display: grid;
  grid-template-columns: 0.8fr 1.2fr;
  gap: var(--space-3xl);
  align-items: center;
}

.why-service__image {
  border-radius: var(--radius-lg);
  overflow: hidden;
  aspect-ratio: 4 / 5;
}

.why-service__image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.why-service__points {
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
}

.why-point {
  display: flex;
  gap: var(--space-lg);
  align-items: flex-start;
  padding: var(--space-lg);
  border-radius: var(--radius-md);
  background: var(--color-bg-alt);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.why-point:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
}

.why-point__icon {
  flex-shrink: 0;
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}

.why-point__icon i,
.why-point__icon svg {
  width: 20px;
  height: 20px;
}

.why-point h3 {
  font-size: 1rem;
  margin-bottom: var(--space-xs);
}

.why-point p {
  font-size: 0.92rem;
  color: var(--color-text-light);
  line-height: 1.6;
  margin: 0;
}

@media (max-width: 860px) {
  .why-service__grid { grid-template-columns: 1fr; }
  .why-service__image { max-height: 400px; }
}

/* ── FAQ Section ─────────────────────────────────────────────── */
.faq-section {
  background: var(--color-bg-alt);
  position: relative;
}

.faq-list {
  max-width: 800px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}

.faq-item {
  background: var(--color-bg);
  border-radius: var(--radius-md);
  padding: var(--space-xl);
  box-shadow: var(--shadow-sm);
  transition: box-shadow var(--transition-base);
}

.faq-item:hover {
  box-shadow: var(--shadow-md);
}

.faq-item h3 {
  font-size: 1.1rem;
  margin-bottom: var(--space-sm);
  color: var(--color-primary);
}

.faq-item .faq-answer {
  font-size: 0.95rem;
  line-height: 1.7;
  color: var(--color-text-light);
}

/* ── Related Services ────────────────────────────────────────── */
.related-services {
  background: var(--color-bg);
}

.related-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-xl);
}

@media (max-width: 768px) {
  .related-grid { grid-template-columns: 1fr; }
}

/* ── CTA Banner ──────────────────────────────────────────────── */
.service-cta {
  background: var(--color-primary);
  text-align: center;
  position: relative;
}

.service-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 30% 50%, rgba(var(--color-accent-rgb), 0.12) 0%, transparent 60%);
  pointer-events: none;
}

.service-cta .container {
  position: relative;
  z-index: 1;
  max-width: 680px;
}

.service-cta h2 { color: #fff; margin-bottom: var(--space-md); }
.service-cta .answer-block { color: rgba(255, 255, 255, 0.85); font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--space-xl); }

/* ── Section Dividers ────────────────────────────────────────── */
.section-divider svg { display: block; width: 100%; }
.section-divider--bottom { position: absolute; bottom: 0; left: 0; right: 0; }
.section-divider--top { position: absolute; top: 0; left: 0; right: 0; }

/* ── Floating Accent ─────────────────────────────────────────── */
.floating-accent {
  position: absolute;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.05);
  pointer-events: none;
  z-index: 0;
}

.float-animate {
  animation: floatBob 6s ease-in-out infinite;
}

@keyframes floatBob {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-12px); }
}

/* ── Identity Sentence ───────────────────────────────────────── */
.identity-sentence {
  font-weight: 600;
  color: var(--color-primary);
}

/* ── Responsive ──────────────────────────────────────────────── */
@media (max-width: 480px) {
  .hero--service .container {
    padding-top: calc(var(--navbar-height) + var(--space-2xl));
    padding-bottom: var(--space-2xl);
  }
}
</style>


<!-- ════════════════════════════════════════════════════════════
     HERO
     ════════════════════════════════════════════════════════════ -->
<section class="hero hero--service">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <a href="/services/">Services</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">New Home Construction</span>
    </nav>
    <h1>New Home Construction in <span class="text-accent">Bend, Oregon</span></h1>
    <p class="hero-answer"><?php echo htmlspecialchars($siteName); ?> is a licensed general contractor in Bend, OR, building custom homes from foundation to finish across Central Oregon. We manage every phase — site prep, framing, mechanical, and interiors — with hands-on oversight and transparent pricing for homeowners in Bend, Redmond, Sisters, and surrounding communities.</p>

    <div class="hero-ctas">
      <a href="/contact/" class="btn-primary"><i data-lucide="file-text" aria-hidden="true"></i> Get a Free Estimate</a>
      <a href="tel:<?php echo $phonePlain; ?>" class="btn-secondary btn-secondary--light"><i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?></a>
    </div>

    <div class="hero-trust">
      <span><i data-lucide="shield-check" aria-hidden="true"></i> Licensed &amp; Insured</span>
      <span><i data-lucide="calendar" aria-hidden="true"></i> Since <?php echo $yearEstablished; ?></span>
      <span><i data-lucide="map-pin" aria-hidden="true"></i> Central Oregon</span>
    </div>
  </div>

  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <path d="M0,60 L1440,60 L1440,0 C960,50 480,50 0,0 Z"/>
    </svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     SERVICE DETAIL
     ════════════════════════════════════════════════════════════ -->
<section class="service-detail">
  <div class="floating-accent float-animate" style="width: 300px; height: 300px; top: -80px; right: -100px;" aria-hidden="true"></div>

  <div class="container">
    <div class="content-grid">
      <div class="content-text reveal-up">
        <span class="eyebrow-label">Custom Home Building</span>
        <h2>What Does Custom Home Construction <span class="text-accent">Include</span> in Bend?</h2>
        <p class="answer-block">Custom home construction in Bend includes everything from site preparation and foundation work to framing, roofing, mechanical systems, interior finishes, and final inspections. Marty Mar Construction manages every trade and permit so you get a move-in-ready home built to Oregon code and Central Oregon climate standards.</p>

        <p class="identity-sentence"><?php echo htmlspecialchars($siteName); ?> is a licensed Oregon general contractor based in Bend, serving homeowners across Central Oregon with full-service new home construction since <?php echo $yearEstablished; ?>.</p>

        <p>Building a new home in Central Oregon means engineering for conditions Portland builders never deal with. Bend sits at 3,600 feet with freeze-thaw cycles that crack weak foundations, snow loads that stress undersized framing, and 300 days of UV that degrades cheap exterior finishes within five years. Every home we build accounts for these realities — from the footer depth to the roof pitch to the insulation R-value.</p>

        <p>We work with your architect or help you select plans that fit your lot, your budget, and Deschutes County requirements. Our project management approach means you talk directly to Marty — not a rotating crew of subcontractor middlemen — from the first site walk to the final walkthrough.</p>

        <p>Last updated: <?php echo date('F Y'); ?></p>
      </div>

      <div class="content-image reveal-right">
        <img src="<?php echo htmlspecialchars($clientPhotos[29]); ?>" alt="New home construction project by Marty Mar Construction in Bend, Oregon" width="600" height="750" loading="lazy">
        <div class="stat-row">
          <div class="stat-item">
            <div class="stat-number" data-target="<?php echo $yearsInBusiness; ?>">0</div>
            <div class="stat-label">Years Building</div>
          </div>
          <div class="stat-item">
            <div class="stat-number" data-target="6">0</div>
            <div class="stat-label">Cities Served</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     PROCESS / HOW IT WORKS
     ════════════════════════════════════════════════════════════ -->
<section class="process-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <polygon points="0,0 1440,50 1440,0" />
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Our Process</span>
      <h2>How Does the New Home <span class="text-accent">Building Process</span> Work?</h2>
      <p class="answer-block">Our new home building process follows four phases: design and permitting, site work and foundation, structural framing and mechanical rough-ins, and interior finishing with final inspections. Each phase has defined milestones, weekly progress updates, and direct communication with Marty throughout.</p>
    </div>

    <div class="process-timeline">
      <div class="process-step reveal-up reveal-delay-1">
        <div class="process-step__number">1</div>
        <h3>Design &amp; Permits</h3>
        <p>Plan review, site assessment, Deschutes County permits, and budget finalization before any dirt moves.</p>
      </div>
      <div class="process-step reveal-up reveal-delay-2">
        <div class="process-step__number">2</div>
        <h3>Foundation &amp; Site Work</h3>
        <p>Excavation, footer pours, foundation walls, and utility connections — engineered for Bend's freeze-thaw soil conditions.</p>
      </div>
      <div class="process-step reveal-up reveal-delay-3">
        <div class="process-step__number">3</div>
        <h3>Framing &amp; Mechanicals</h3>
        <p>Structural framing, roofing, windows, then HVAC, plumbing, and electrical rough-ins — all inspected before closing walls.</p>
      </div>
      <div class="process-step reveal-up reveal-delay-4">
        <div class="process-step__number">4</div>
        <h3>Finishes &amp; Walkthrough</h3>
        <p>Drywall, cabinetry, flooring, paint, fixtures, landscaping grading, and a final walkthrough before handing you the keys.</p>
      </div>
    </div>
  </div>

  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <path d="M0,50 L1440,50 L1440,0 Q720,60 0,0 Z"/>
    </svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     WHY CHOOSE US
     ════════════════════════════════════════════════════════════ -->
<section class="why-service">
  <div class="container">
    <div class="why-service__grid">
      <div class="why-service__image reveal-left">
        <img src="<?php echo htmlspecialchars($clientPhotos[1]); ?>" alt="Marty Mar Construction crew working on a custom home project in Central Oregon" width="500" height="625" loading="lazy">
      </div>

      <div class="why-service__points">
        <div class="section-title reveal-up">
          <span class="eyebrow-label">Why Marty Mar</span>
          <h2>Why Choose Marty Mar for Your <span class="text-accent">New Home Build</span>?</h2>
          <p class="answer-block">Bend homeowners choose Marty Mar Construction for new builds because of direct owner communication, transparent itemized pricing, <?php echo $yearsInBusiness; ?>+ years of Central Oregon building experience, and construction methods specifically engineered for high-desert elevation conditions.</p>
        </div>

        <div class="why-point reveal-right reveal-delay-1">
          <div class="why-point__icon"><i data-lucide="user-check" aria-hidden="true"></i></div>
          <div>
            <h3>Direct Owner Communication</h3>
            <p>Marty is your single point of contact from estimate to final walkthrough — no project manager middlemen, no phone trees.</p>
          </div>
        </div>

        <div class="why-point reveal-right reveal-delay-2">
          <div class="why-point__icon"><i data-lucide="mountain-snow" aria-hidden="true"></i></div>
          <div>
            <h3>Built for 3,600-Foot Elevation</h3>
            <p>Snow-load framing, freeze-cycle foundations, UV-resistant exteriors, and insulation specs designed for Bend's 250+ sunny days and cold winters.</p>
          </div>
        </div>

        <div class="why-point reveal-right reveal-delay-3">
          <div class="why-point__icon"><i data-lucide="file-text" aria-hidden="true"></i></div>
          <div>
            <h3>Transparent Itemized Pricing</h3>
            <p>Written estimates with material specs and labor breakdowns before work begins. No surprise change orders, no hidden markup on subcontractors.</p>
          </div>
        </div>

        <div class="why-point reveal-right reveal-delay-4">
          <div class="why-point__icon"><i data-lucide="clipboard-check" aria-hidden="true"></i></div>
          <div>
            <h3>Full Permit &amp; Inspection Management</h3>
            <p>We pull all Deschutes County and City of Bend permits, coordinate every inspection, and deliver your certificate of occupancy.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     FAQ SECTION
     ════════════════════════════════════════════════════════════ -->
<section class="faq-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <polygon points="0,50 720,0 1440,50"/>
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Common Questions</span>
      <h2>What Do Homeowners Ask About <span class="text-accent">Building in Bend</span>?</h2>
      <p class="answer-block">Homeowners considering new construction in Bend typically ask about timelines, costs, lot buildability, permits, and energy efficiency. Below are the questions we hear most from clients across Central Oregon — with direct answers.</p>
    </div>

    <div class="faq-list">
      <?php foreach ($pageFaqs as $i => $faq): ?>
      <div class="faq-item reveal-up<?php echo ($i < 4) ? ' reveal-delay-' . ($i + 1) : ''; ?>">
        <h3><?php echo htmlspecialchars($faq['q']); ?></h3>
        <p class="faq-answer"><?php echo htmlspecialchars($faq['a']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     RELATED SERVICES
     ════════════════════════════════════════════════════════════ -->
<section class="related-services">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">More Services</span>
      <h2>What Other <span class="text-accent">Construction Services</span> Do We Offer?</h2>
      <p class="answer-block">Beyond new home construction, Marty Mar Construction offers room additions, whole-home remodeling, kitchen and bathroom renovations, and custom deck building across Central Oregon. Every service includes licensed tradespeople, direct communication, and transparent pricing.</p>
    </div>

    <div class="related-grid">
      <?php
      $relatedBullets = [
          'home-additions'         => ['Seamless match to existing structure', 'Second-story expansions', 'ADU and garage conversions'],
          'remodeling-renovations' => ['Whole-home transformations', 'Structural and cosmetic work', 'On-schedule, on-budget delivery'],
          'bathroom-remodeling'    => ['Walk-in showers and soaking tubs', 'Custom tile and vanity work', 'Full gut or targeted upgrades'],
          'kitchen-remodeling'     => ['Custom cabinetry and countertops', 'Layout and structural changes', 'Lighting and appliance planning'],
          'deck-outdoor-structures'=> ['Composite and timber options', 'Engineered for Oregon snow loads', 'Pergolas, porches, and shade structures'],
      ];
      $related = array_filter($services, fn($s) => $s['slug'] !== 'new-home-construction');
      $related = array_slice($related, 0, 3);
      $tintCycle = [1, 2, 3];
      foreach ($related as $i => $svc):
        $tint = $tintCycle[$i % 3];
        $delay = $i + 1;
        $bullets = $relatedBullets[$svc['slug']] ?? ['Professional installation', 'Licensed and insured', 'Free estimates available'];
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
     CLOSING CTA
     ════════════════════════════════════════════════════════════ -->
<section class="service-cta">
  <div class="container reveal-up">
    <span class="eyebrow-label" style="color: var(--color-accent);">Start Your Build</span>
    <h2>How Do You Get a Free New Home Construction Estimate?</h2>
    <p class="answer-block">Call <?php echo $phone; ?> or fill out our online form. We'll schedule a site visit, review your plans and lot, and deliver a detailed written estimate — no cost, no obligation, no pressure. Most estimates are completed within one week of the site walk.</p>
    <div style="display: flex; flex-wrap: wrap; gap: var(--space-md); justify-content: center;">
      <a href="/contact/" class="btn-primary"><i data-lucide="file-text" aria-hidden="true"></i> Request Free Estimate</a>
      <a href="tel:<?php echo $phonePlain; ?>" class="btn-secondary btn-secondary--light"><i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
