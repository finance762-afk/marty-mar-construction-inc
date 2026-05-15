<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'kitchen-remodeling') { $currentService = $svc; break; }
}

$pageTitle       = 'Kitchen Remodeling Bend OR | Kitchen Renovation | ' . $siteName;
$pageDescription = 'Marty Mar Construction remodels kitchens in Bend, Redmond, Sisters, and Central Oregon. Custom cabinetry, countertops, layout changes, and appliance planning. Licensed since ' . $yearEstablished . '. Call ' . $phone . '.';
$canonicalUrl    = $siteUrl . '/services/kitchen-remodeling/';
$ogImage         = $currentService['image'];
$currentPage     = 'services';
$heroImagePreload = $currentService['image'];
$cssVersion      = '4.1';

// ── Page FAQs ─────────────────────────────────────────────────
$pageFaqs = [
    ['q' => 'How much does a kitchen remodel cost in Bend, Oregon?', 'a' => 'Kitchen remodel costs in Bend range from $20,000-$45,000 for a cosmetic refresh (countertops, paint, hardware) to $50,000-$120,000 for a mid-range renovation with new cabinets, countertops, and appliances. Full gut remodels with layout changes run $100,000-$200,000+.'],
    ['q' => 'How long does a kitchen renovation take in Central Oregon?', 'a' => 'A cosmetic kitchen refresh takes 2-4 weeks. Mid-range renovations with cabinet replacement run 6-10 weeks. Full gut remodels with structural changes, new plumbing, and electrical take 10-16 weeks. Custom cabinet lead times can add 4-8 weeks — we order before demo to minimize downtime.'],
    ['q' => 'Can you remove a wall to open up my kitchen?', 'a' => 'Yes. We regularly remove walls between kitchens and living or dining areas to create open-concept floor plans. Load-bearing wall removal requires a structural engineer\'s beam design, which we coordinate. The result is properly supported with an LVL or steel beam hidden in the ceiling.'],
    ['q' => 'What countertop materials work best in Bend kitchens?', 'a' => 'Quartz is the most popular choice for Bend kitchens — it\'s non-porous, UV-stable (important with Bend\'s 300 sunny days), and doesn\'t need sealing. Granite remains a durable choice. Butcher block works well for secondary prep surfaces. We help you select materials that fit your cooking habits and maintenance preferences.'],
    ['q' => 'Do you install kitchen appliances during the remodel?', 'a' => 'Yes. We coordinate appliance cutouts, utility connections (gas, electric, water), and ventilation routing for ranges, refrigerators, dishwashers, and range hoods. We can work with appliances you\'ve purchased or help you spec units that fit the layout.'],
    ['q' => 'Does Marty Mar handle kitchen plumbing and electrical?', 'a' => 'Yes. Under our general contractor license, we coordinate licensed plumbers and electricians for sink relocation, dishwasher hookups, garbage disposal, new circuits for appliances, under-cabinet lighting, and dedicated outlet runs for islands and countertops.'],
];

// ── Schema Markup ─────────────────────────────────────────────
$serviceSchema    = generateServiceSchema($currentService);
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Services', 'url' => '/services/'],
    ['name' => 'Kitchen Remodeling'],
]);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     KITCHEN REMODELING — Service Page
     Phase 4: Individual Service Pages
     ═══════════════════════════════════════════════════════════ -->

<style>
/* ── Service Hero ────────────────────────────────────────────── */
.hero--service {
  position: relative; min-height: 55vh; display: flex; align-items: center;
  background: var(--color-primary); overflow: hidden;
}
.hero--service::before {
  content: ''; position: absolute; inset: 0;
  background: url('<?php echo htmlspecialchars($heroImagePreload); ?>') center/cover no-repeat; z-index: 0;
}
.hero--service::after {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(140deg, rgba(var(--color-primary-rgb), 0.92) 0%, rgba(var(--color-primary-rgb), 0.62) 55%, rgba(var(--color-primary-rgb), 0.84) 100%);
  z-index: 1;
}
.hero--service .container {
  position: relative; z-index: 2; text-align: center; max-width: 800px;
  padding-top: calc(var(--navbar-height) + var(--space-3xl)); padding-bottom: var(--space-3xl);
}
.hero--service .breadcrumb { display: flex; justify-content: center; gap: var(--space-sm); font-size: 0.85rem; color: rgba(255,255,255,0.6); margin-bottom: var(--space-xl); }
.hero--service .breadcrumb a { color: rgba(255,255,255,0.7); transition: color var(--transition-base); }
.hero--service .breadcrumb a:hover { color: var(--color-accent); }
.hero--service .breadcrumb-sep { margin: 0 var(--space-xs); }
.hero--service h1 { font-size: var(--fs-h1); color: #fff; margin-bottom: var(--space-md); line-height: 1.05; }
.hero--service .hero-answer { color: rgba(255,255,255,0.85); font-size: 1.15rem; line-height: 1.7; max-width: 60ch; margin: 0 auto var(--space-xl); }
.hero--service .hero-ctas { display: flex; flex-wrap: wrap; gap: var(--space-md); justify-content: center; }
.hero--service .hero-trust { display: flex; flex-wrap: wrap; justify-content: center; gap: var(--space-lg); margin-top: var(--space-xl); font-size: 0.85rem; color: rgba(255,255,255,0.7); }
.hero--service .hero-trust span { display: flex; align-items: center; gap: var(--space-xs); }
.hero--service .hero-trust i, .hero--service .hero-trust svg { width: 16px; height: 16px; color: var(--color-accent); }

/* ── Split Content ───────────────────────────────────────────── */
.service-detail { background: var(--color-bg); position: relative; }
.service-detail .content-grid {
  display: grid; grid-template-columns: 1.2fr 0.8fr; gap: var(--space-3xl); align-items: start;
}
.service-detail .content-text h2 { margin-bottom: var(--space-md); }
.service-detail .content-text .answer-block { font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--space-lg); }
.service-detail .content-text p { margin-bottom: var(--space-lg); max-width: var(--content-width); line-height: 1.7; }

.content-gallery {
  display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md);
  border-radius: var(--radius-lg); overflow: hidden;
}
.content-gallery .gallery-item { border-radius: var(--radius-md); overflow: hidden; }
.content-gallery .gallery-item--tall { grid-row: span 2; }
.content-gallery .gallery-item img { width: 100%; height: 100%; object-fit: cover; display: block; }

@media (max-width: 860px) {
  .service-detail .content-grid { grid-template-columns: 1fr; gap: var(--space-xl); }
  .content-gallery { grid-template-columns: 1fr 1fr; }
}

/* ── Upgrade Options ─────────────────────────────────────────── */
.upgrades-section { background: var(--color-bg-alt); position: relative; }

.upgrades-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); max-width: 1000px; margin: 0 auto;
}

.upgrade-card {
  background: var(--color-bg); border-radius: var(--radius-md);
  padding: var(--space-2xl) var(--space-xl); text-align: center;
  border-bottom: 3px solid transparent;
  transition: transform var(--transition-base), box-shadow var(--transition-base), border-color var(--transition-base);
}
.upgrade-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-bottom-color: var(--color-accent); }

.upgrade-card__icon {
  width: 56px; height: 56px; border-radius: var(--radius-md);
  background: rgba(var(--color-accent-rgb), 0.08);
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-md); color: var(--color-accent);
}
.upgrade-card__icon i, .upgrade-card__icon svg { width: 24px; height: 24px; }
.upgrade-card h3 { font-size: 1.05rem; margin-bottom: var(--space-sm); }
.upgrade-card p { font-size: 0.9rem; color: var(--color-text-light); line-height: 1.6; margin: 0; }

@media (max-width: 768px) { .upgrades-grid { grid-template-columns: 1fr; } }

/* ── Process Section ─────────────────────────────────────────── */
.process-section { background: var(--color-bg); position: relative; }

.process-numbered {
  display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl);
  counter-reset: process;
}

.numbered-step {
  counter-increment: process;
  padding: var(--space-xl); background: var(--color-bg-alt); border-radius: var(--radius-md);
  position: relative; padding-top: var(--space-3xl);
}

.numbered-step::before {
  content: counter(process, decimal-leading-zero);
  position: absolute; top: var(--space-md); left: var(--space-xl);
  font-family: var(--font-heading); font-size: 2.5rem; font-weight: 900;
  color: rgba(var(--color-accent-rgb), 0.12); line-height: 1;
}

.numbered-step h3 { font-size: 1rem; margin-bottom: var(--space-sm); }
.numbered-step p { font-size: 0.88rem; color: var(--color-text-light); line-height: 1.6; margin: 0; }

@media (max-width: 860px) { .process-numbered { grid-template-columns: 1fr 1fr; } }
@media (max-width: 500px) { .process-numbered { grid-template-columns: 1fr; } }

/* ── FAQ Section ─────────────────────────────────────────────── */
.faq-section { background: var(--color-bg-alt); position: relative; }
.faq-list { max-width: 800px; margin: 0 auto; display: flex; flex-direction: column; gap: var(--space-md); }
.faq-item { background: var(--color-bg); border-radius: var(--radius-md); padding: var(--space-xl); box-shadow: var(--shadow-sm); transition: box-shadow var(--transition-base); }
.faq-item:hover { box-shadow: var(--shadow-md); }
.faq-item h3 { font-size: 1.1rem; margin-bottom: var(--space-sm); }
.faq-item .faq-answer { font-size: 0.95rem; line-height: 1.7; color: var(--color-text-light); }

/* ── Related Services ────────────────────────────────────────── */
.related-services { background: var(--color-bg); }
.related-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-xl); }
@media (max-width: 768px) { .related-grid { grid-template-columns: 1fr; } }

/* ── CTA Banner ──────────────────────────────────────────────── */
.service-cta { background: var(--color-primary); text-align: center; position: relative; }
.service-cta::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at 60% 40%, rgba(var(--color-accent-rgb), 0.1) 0%, transparent 60%); pointer-events: none; }
.service-cta .container { position: relative; z-index: 1; max-width: 680px; }
.service-cta h2 { color: #fff; margin-bottom: var(--space-md); }
.service-cta .answer-block { color: rgba(255,255,255,0.85); font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--space-xl); }

/* ── Section Dividers ────────────────────────────────────────── */
.section-divider svg { display: block; width: 100%; }
.section-divider--bottom { position: absolute; bottom: 0; left: 0; right: 0; }
.section-divider--top { position: absolute; top: 0; left: 0; right: 0; }

.floating-accent { position: absolute; border-radius: 50%; background: rgba(var(--color-accent-rgb), 0.04); pointer-events: none; z-index: 0; }
.float-animate { animation: floatWave 7s ease-in-out infinite; }
@keyframes floatWave { 0%, 100% { transform: translate(0, 0); } 50% { transform: translate(-6px, -10px); } }

.identity-sentence { font-weight: 600; color: var(--color-primary); }

/* ── Content Gallery Enhancements ────────────────────────────── */
.content-gallery {
  position: relative;
}

.content-gallery .gallery-item {
  transition: transform var(--transition-base);
}

.content-gallery .gallery-item:hover {
  transform: scale(1.02);
}

.content-gallery .gallery-item::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: var(--radius-md);
  box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.06);
  pointer-events: none;
}

.content-gallery .gallery-item--tall {
  position: relative;
}

/* ── Upgrade Card Enhancements ───────────────────────────────── */
.upgrade-card__icon {
  transition: transform var(--transition-base), background var(--transition-base);
}

.upgrade-card:hover .upgrade-card__icon {
  transform: scale(1.1);
  background: rgba(var(--color-accent-rgb), 0.15);
}

.upgrade-card h3 {
  transition: color var(--transition-base);
}

.upgrade-card:hover h3 {
  color: var(--color-accent);
}

/* ── Process Step Watermarks ─────────────────────────────────── */
.numbered-step {
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.numbered-step:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
}

.numbered-step::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--color-accent), transparent);
  border-radius: 0 0 var(--radius-md) var(--radius-md);
  opacity: 0;
  transition: opacity var(--transition-base);
}

.numbered-step:hover::after {
  opacity: 1;
}

/* ── FAQ Accent Border ───────────────────────────────────────── */
.faq-item {
  border-left: 3px solid transparent;
  transition: box-shadow var(--transition-base), border-color var(--transition-base);
}

.faq-item:hover {
  border-left-color: var(--color-accent);
}

/* ── Section Number Watermark ────────────────────────────────── */
.upgrades-section .section-watermark {
  position: absolute;
  bottom: var(--space-xl);
  left: clamp(1rem, 3vw, 2rem);
  font-family: var(--font-heading);
  font-size: clamp(5rem, 10vw, 9rem);
  font-weight: 900;
  color: rgba(var(--color-primary-rgb), 0.02);
  line-height: 1;
  pointer-events: none;
}

/* ── Related Card Focus States ───────────────────────────────── */
.service-card-with-image:focus-within {
  outline: 3px solid var(--color-accent);
  outline-offset: 2px;
}

.service-card__cta:focus-visible {
  outline: 2px solid var(--color-accent);
  outline-offset: 2px;
  border-radius: var(--radius-sm);
}

/* ── Hero Decorative Corner ──────────────────────────────────── */
.hero--service .container::before {
  content: '';
  position: absolute;
  bottom: 0;
  right: 0;
  width: 120px;
  height: 120px;
  border-right: 2px solid rgba(var(--color-accent-rgb), 0.2);
  border-bottom: 2px solid rgba(var(--color-accent-rgb), 0.2);
  pointer-events: none;
  z-index: 1;
}

@media (max-width: 480px) {
  .hero--service .container { padding-top: calc(var(--navbar-height) + var(--space-2xl)); padding-bottom: var(--space-2xl); }
  .upgrades-grid { gap: var(--space-md); }
  .process-numbered { gap: var(--space-md); }
}
</style>


<!-- ════════════════════════════════════════════════════════════ HERO ════════ -->
<section class="hero hero--service">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a><span class="breadcrumb-sep" aria-hidden="true">/</span>
      <a href="/services/">Services</a><span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">Kitchen Remodeling</span>
    </nav>
    <h1>Kitchen Remodeling in <span class="text-accent">Bend, Oregon</span></h1>
    <p class="hero-answer"><?php echo htmlspecialchars($siteName); ?> remodels kitchens across Bend, Redmond, Sisters, and Central Oregon. We handle cabinetry, countertops, layout changes, appliance planning, lighting, and structural modifications — from cosmetic refreshes to full gut renovations with open-concept floor plans.</p>
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
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true"><path d="M0,60 L1440,60 L1440,0 C1080,55 360,55 0,0 Z"/></svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ DETAIL ════════ -->
<section class="service-detail">
  <div class="floating-accent float-animate" style="width: 260px; height: 260px; bottom: -50px; left: -80px;" aria-hidden="true"></div>
  <div class="container">
    <div class="content-grid">
      <div class="content-text reveal-up">
        <span class="eyebrow-label">Kitchen Renovation</span>
        <h2>What's Included in a <span class="text-accent">Kitchen Remodel</span> With Marty Mar?</h2>
        <p class="answer-block">A kitchen remodel with Marty Mar Construction includes demolition, structural modifications, cabinet installation, countertop fabrication, plumbing and electrical updates, appliance hookups, flooring, lighting, backsplash tile, and painting. We manage every trade and deliver a written schedule before work begins.</p>

        <p class="identity-sentence"><?php echo htmlspecialchars($siteName); ?> is a licensed Oregon general contractor based in Bend, remodeling kitchens across Central Oregon since <?php echo $yearEstablished; ?>.</p>

        <p>The kitchen is the most complex room in your home — more trades, more utility connections, and more daily-use pressure than any other space. A successful kitchen remodel in Bend requires coordinating cabinetmakers, countertop fabricators, plumbers, electricians, tile setters, and flooring crews in the right sequence. Miss the sequence and you waste weeks waiting for one trade to redo what another trade covered up.</p>

        <p>We start with a site visit to measure your existing kitchen, assess structural conditions (especially if you want to remove a wall), and map existing plumbing and electrical. From there we develop a scope of work with material selections, timeline, and detailed pricing. You see the full cost before we pull a single permit.</p>

        <p>Whether you're updating a builder-grade galley kitchen in NorthWest Crossing or gutting a 1980s layout in River West, we tailor every remodel to your cooking style, storage needs, and daily routine.</p>

        <p>Last updated: <?php echo date('F Y'); ?></p>
      </div>
      <div class="content-gallery reveal-right">
        <div class="gallery-item gallery-item--tall">
          <img src="<?php echo htmlspecialchars($clientPhotos[5]); ?>" alt="Kitchen renovation by Marty Mar Construction showing new cabinetry and countertops" width="400" height="600" loading="lazy">
        </div>
        <div class="gallery-item">
          <img src="<?php echo htmlspecialchars($clientPhotos[6]); ?>" alt="Kitchen remodel detail showing custom countertop installation" width="400" height="280" loading="lazy">
        </div>
        <div class="gallery-item">
          <img src="<?php echo htmlspecialchars($clientPhotos[4]); ?>" alt="Completed kitchen renovation project in Bend, Oregon" width="400" height="280" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ UPGRADES ════════ -->
<section class="upgrades-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true"><polygon points="0,0 1440,50 1440,0"/></svg>
  </div>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Popular Upgrades</span>
      <h2>What Kitchen Upgrades Are Most Popular in <span class="text-accent">Bend Homes</span>?</h2>
      <p class="answer-block">The most requested kitchen upgrades in Bend include quartz countertops, custom soft-close cabinetry, kitchen islands with seating, open-concept wall removal, under-cabinet LED lighting, and modern tile backsplashes. Below are the upgrades Central Oregon homeowners choose most.</p>
    </div>
    <div class="upgrades-grid">
      <div class="upgrade-card card-tint-1 reveal-up reveal-delay-1">
        <div class="upgrade-card__icon"><i data-lucide="square" aria-hidden="true"></i></div>
        <h3>Custom Cabinetry</h3>
        <p>Soft-close hinges, dovetail drawers, pull-out shelving, and finishes from painted shaker to natural wood grain. Built to fit your layout exactly.</p>
      </div>
      <div class="upgrade-card card-tint-2 reveal-up reveal-delay-2">
        <div class="upgrade-card__icon"><i data-lucide="gem" aria-hidden="true"></i></div>
        <h3>Quartz Countertops</h3>
        <p>Non-porous, UV-stable, no sealing required. Custom-fabricated for your layout with undermount sink cutouts and waterfall edge options.</p>
      </div>
      <div class="upgrade-card card-tint-3 reveal-up reveal-delay-3">
        <div class="upgrade-card__icon"><i data-lucide="layout-grid" aria-hidden="true"></i></div>
        <h3>Kitchen Islands</h3>
        <p>Prep space, storage, and seating in one. We handle structural support, electrical for outlets, and plumbing if you want a prep sink.</p>
      </div>
      <div class="upgrade-card card-tint-1 reveal-scale reveal-delay-1">
        <div class="upgrade-card__icon"><i data-lucide="lightbulb" aria-hidden="true"></i></div>
        <h3>Under-Cabinet Lighting</h3>
        <p>LED strips with dimmable drivers, hardwired to dedicated switches. Eliminates counter shadows and transforms the evening kitchen atmosphere.</p>
      </div>
      <div class="upgrade-card card-tint-2 reveal-scale reveal-delay-2">
        <div class="upgrade-card__icon"><i data-lucide="grid-3x3" aria-hidden="true"></i></div>
        <h3>Tile Backsplash</h3>
        <p>Subway, herringbone, arabesque, or large-format porcelain. Protects walls behind cooktops and sinks while anchoring the kitchen's visual design.</p>
      </div>
      <div class="upgrade-card card-tint-3 reveal-scale reveal-delay-3">
        <div class="upgrade-card__icon"><i data-lucide="move" aria-hidden="true"></i></div>
        <h3>Open-Concept Layout</h3>
        <p>Load-bearing wall removal with engineered beam support. Connects kitchen to living and dining areas for modern sight lines and entertaining flow.</p>
      </div>
    </div>
  </div>
  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true"><path d="M0,50 L1440,50 L1440,0 Q720,55 0,0 Z"/></svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ PROCESS ════════ -->
<section class="process-section">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Our Process</span>
      <h2>How Does a Kitchen Remodel <span class="text-accent">Work</span> With Marty Mar?</h2>
      <p class="answer-block">Our kitchen remodel process covers four phases: design and material selection, permit and material procurement, demolition and construction, and finish installation with final walkthrough. You communicate directly with Marty at every phase — no middlemen.</p>
    </div>
    <div class="process-numbered">
      <div class="numbered-step reveal-up reveal-delay-1">
        <h3>Design &amp; Selections</h3>
        <p>Measure existing kitchen, finalize layout, select cabinets, countertops, tile, and fixtures. Deliver written estimate.</p>
      </div>
      <div class="numbered-step reveal-up reveal-delay-2">
        <h3>Permits &amp; Procurement</h3>
        <p>Pull Deschutes County permits, order cabinets and countertops (4-6 week lead), coordinate material delivery dates.</p>
      </div>
      <div class="numbered-step reveal-up reveal-delay-3">
        <h3>Demo &amp; Construction</h3>
        <p>Controlled demolition, structural mods, plumbing and electrical rough-in, cabinet install, and countertop template.</p>
      </div>
      <div class="numbered-step reveal-up reveal-delay-4">
        <h3>Finishes &amp; Walkthrough</h3>
        <p>Countertop install, backsplash tile, appliance hookup, lighting, paint, and final walkthrough to confirm every detail.</p>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ FAQ ════════ -->
<section class="faq-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true"><polygon points="0,50 720,0 1440,50"/></svg>
  </div>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Common Questions</span>
      <h2>What Do Homeowners Ask About <span class="text-accent">Kitchen Remodeling</span> in Bend?</h2>
      <p class="answer-block">Homeowners considering a kitchen remodel in Bend and Central Oregon typically ask about costs, timelines, wall removal, countertop materials, and appliance coordination. Below are the questions we hear most — with direct answers.</p>
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


<!-- ════════════════════════════════════════════════════════════ RELATED ════════ -->
<section class="related-services">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">More Services</span>
      <h2>What Other <span class="text-accent">Construction Services</span> Do We Offer?</h2>
      <p class="answer-block">Beyond kitchen remodeling, Marty Mar Construction handles bathroom renovations, whole-home remodeling, new construction, room additions, and custom deck building across Central Oregon.</p>
    </div>
    <div class="related-grid">
      <?php
      $relatedBullets = [
          'new-home-construction'  => ['Custom floor plans for your lot', 'Foundation-to-finish oversight', 'Snow-load rated framing'],
          'home-additions'         => ['Seamless match to existing structure', 'Second-story expansions', 'ADU and garage conversions'],
          'remodeling-renovations' => ['Whole-home transformations', 'Structural and cosmetic work', 'On-schedule, on-budget delivery'],
          'bathroom-remodeling'    => ['Walk-in showers and soaking tubs', 'Custom tile and vanity work', 'Full gut or targeted upgrades'],
          'deck-outdoor-structures'=> ['Composite and timber options', 'Engineered for Oregon snow loads', 'Pergolas, porches, and shade structures'],
      ];
      $related = array_filter($services, fn($s) => $s['slug'] !== 'kitchen-remodeling');
      $related = array_values($related);
      $picked = [$related[1], $related[3], $related[4]];
      $tintCycle = [1, 2, 3];
      foreach ($picked as $i => $svc):
        $tint = $tintCycle[$i % 3];
        $bullets = $relatedBullets[$svc['slug']] ?? ['Professional installation', 'Licensed and insured', 'Free estimates'];
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-up reveal-delay-<?php echo $i + 1; ?>">
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


<!-- ════════════════════════════════════════════════════════════ CTA ════════ -->
<section class="service-cta">
  <div class="container reveal-up">
    <span class="eyebrow-label" style="color: var(--color-accent);">Start Your Remodel</span>
    <h2>How Do You Get a Free Kitchen Remodeling Estimate?</h2>
    <p class="answer-block">Call <?php echo $phone; ?> or fill out our online form. We'll visit your home, measure your kitchen, discuss your vision and budget, and deliver a detailed written estimate with material specs — no cost, no obligation.</p>
    <div style="display: flex; flex-wrap: wrap; gap: var(--space-md); justify-content: center;">
      <a href="/contact/" class="btn-primary"><i data-lucide="file-text" aria-hidden="true"></i> Request Free Estimate</a>
      <a href="tel:<?php echo $phonePlain; ?>" class="btn-secondary btn-secondary--light"><i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
