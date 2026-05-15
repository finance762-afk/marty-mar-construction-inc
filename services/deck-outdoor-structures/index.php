<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'deck-outdoor-structures') { $currentService = $svc; break; }
}

$pageTitle       = 'Deck Builder Bend OR | Pergolas & Outdoor Structures | ' . $siteName;
$pageDescription = 'Marty Mar Construction builds custom decks, covered porches, pergolas, and outdoor structures in Bend, Redmond, Sisters, and Central Oregon. Engineered for snow loads and UV. Call ' . $phone . '.';
$canonicalUrl    = $siteUrl . '/services/deck-outdoor-structures/';
$ogImage         = $currentService['image'];
$currentPage     = 'services';
$heroImagePreload = $currentService['image'];
$cssVersion      = '4.1';

// ── Page FAQs ─────────────────────────────────────────────────
$pageFaqs = [
    ['q' => 'How much does a new deck cost in Bend, Oregon?', 'a' => 'Deck costs in Bend range from $30-$50 per square foot for pressure-treated lumber to $60-$100+ per square foot for composite or hardwood decking. A typical 300 sq ft composite deck runs $20,000-$35,000 installed, including railings, stairs, and footings. Complex multi-level designs and covered structures cost more.'],
    ['q' => 'What decking material works best in Central Oregon?', 'a' => 'Composite decking (Trex, TimberTech) is the most popular choice in Bend — it handles UV exposure, freeze-thaw cycling, and snow loads without splitting, warping, or annual sealing. Cedar is a solid natural alternative but requires yearly maintenance. Pressure-treated pine is the most affordable but has a shorter lifespan at elevation.'],
    ['q' => 'Do I need a permit to build a deck in Deschutes County?', 'a' => 'Yes. Most decks over 30 inches above grade or attached to a structure require a building permit in Deschutes County or the City of Bend. We handle all permitting, including structural plans, footing depth calculations, and inspection coordination from start to final sign-off.'],
    ['q' => 'How long does it take to build a deck in Bend?', 'a' => 'Most standard decks take 1-3 weeks from footing pours to final railing installation. Multi-level decks, covered structures, and pergolas with electrical run 3-6 weeks. Material lead times for composite decking are typically 1-2 weeks — we order before the build date to avoid delays.'],
    ['q' => 'Can you build a covered porch or pergola in Bend?', 'a' => 'Yes. We build covered porches, pergolas, shade structures, and timber-frame pavilions designed for Central Oregon\'s snow loads and wind conditions. Covered structures require engineered posts and footings rated for the snow load in your specific zone — Bend sees 30-50 lb/sq ft depending on elevation.'],
    ['q' => 'Are your decks engineered for Bend snow loads?', 'a' => 'Yes. Every deck we build in the Bend area is engineered to handle the ground snow load specified in Oregon Structural Specialty Code for your zone — typically 30-50 lbs per square foot. Joists, beams, posts, and footings are all sized to handle that load with margin, not at the minimum.'],
];

// ── Schema Markup ─────────────────────────────────────────────
$serviceSchema    = generateServiceSchema($currentService);
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Services', 'url' => '/services/'],
    ['name' => 'Deck & Outdoor Structures'],
]);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     DECK & OUTDOOR STRUCTURES — Service Page
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
  background: linear-gradient(135deg, rgba(var(--color-primary-rgb), 0.9) 0%, rgba(var(--color-primary-rgb), 0.6) 50%, rgba(var(--color-primary-rgb), 0.82) 100%);
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
.service-detail .split-reverse {
  display: grid; grid-template-columns: 0.85fr 1.15fr; gap: var(--space-3xl); align-items: center;
}
.detail-image-stack { position: relative; }
.detail-image-stack .img-primary {
  border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-lg);
}
.detail-image-stack .img-primary img { width: 100%; height: auto; object-fit: cover; }
.detail-image-stack .img-secondary {
  position: absolute; bottom: -20px; right: -20px; width: 45%;
  border-radius: var(--radius-md); overflow: hidden;
  box-shadow: var(--shadow-xl); border: 4px solid var(--color-bg);
}
.detail-image-stack .img-secondary img { width: 100%; height: auto; object-fit: cover; }

.service-detail .detail-text h2 { margin-bottom: var(--space-md); }
.service-detail .detail-text .answer-block { font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--space-lg); }
.service-detail .detail-text p { margin-bottom: var(--space-lg); max-width: var(--content-width); line-height: 1.7; }

@media (max-width: 860px) {
  .service-detail .split-reverse { grid-template-columns: 1fr; gap: var(--space-xl); }
  .detail-image-stack .img-secondary { position: static; width: 60%; margin-top: var(--space-md); border: none; }
}

/* ── Structure Types ─────────────────────────────────────────── */
.structures-section { background: var(--color-bg-alt); position: relative; }

.structures-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); max-width: 1000px; margin: 0 auto;
}

.structure-card {
  background: var(--color-bg); border-radius: var(--radius-md); overflow: hidden;
  box-shadow: var(--shadow-sm);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.structure-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }

.structure-card__img { aspect-ratio: 16/10; overflow: hidden; }
.structure-card__img img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.structure-card:hover .structure-card__img img { transform: scale(1.04); }

.structure-card__body { padding: var(--space-xl) var(--space-lg); }
.structure-card__body h3 { font-size: 1.05rem; margin-bottom: var(--space-sm); }
.structure-card__body p { font-size: 0.9rem; color: var(--color-text-light); line-height: 1.6; margin: 0; }

@media (max-width: 768px) { .structures-grid { grid-template-columns: 1fr; } }

/* ── Material Comparison ─────────────────────────────────────── */
.materials-section { background: var(--color-bg); position: relative; }

.materials-table-wrap {
  max-width: 900px; margin: 0 auto;
  border-radius: var(--radius-md); overflow: hidden;
  box-shadow: var(--shadow-md);
}

.materials-table {
  width: 100%; border-collapse: collapse;
  font-size: 0.92rem;
}

.materials-table thead { background: var(--color-primary); color: #fff; }
.materials-table th { padding: var(--space-lg) var(--space-md); text-align: left; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.04em; }
.materials-table td { padding: var(--space-md); border-bottom: 1px solid var(--color-border); }
.materials-table tbody tr:nth-child(even) { background: var(--color-bg-alt); }
.materials-table tbody tr:hover { background: rgba(var(--color-accent-rgb), 0.04); }

.material-badge {
  display: inline-block; padding: 2px 10px; border-radius: 999px;
  font-size: 0.78rem; font-weight: 600;
}
.material-badge--best { background: rgba(var(--color-secondary-rgb), 0.12); color: var(--color-secondary); }
.material-badge--good { background: rgba(var(--color-accent-rgb), 0.1); color: var(--color-accent); }
.material-badge--fair { background: rgba(var(--color-primary-rgb), 0.08); color: var(--color-text-light); }

@media (max-width: 600px) {
  .materials-table { font-size: 0.82rem; }
  .materials-table th, .materials-table td { padding: var(--space-sm); }
}

/* ── Process Section ─────────────────────────────────────────── */
.process-section { background: var(--color-bg-alt); position: relative; }

.process-cards {
  display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-lg);
}

.pcard {
  text-align: center; padding: var(--space-xl) var(--space-md);
  background: var(--color-bg); border-radius: var(--radius-md);
}

.pcard__icon {
  width: 60px; height: 60px; border-radius: 50%;
  border: 3px solid rgba(var(--color-accent-rgb), 0.2);
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-md); color: var(--color-accent);
  box-shadow: var(--shadow-sm);
}
.pcard__icon i, .pcard__icon svg { width: 24px; height: 24px; }
.pcard h3 { font-size: 1rem; margin-bottom: var(--space-sm); }
.pcard p { font-size: 0.88rem; color: var(--color-text-light); line-height: 1.6; margin: 0; }

@media (max-width: 860px) { .process-cards { grid-template-columns: 1fr 1fr; } }
@media (max-width: 500px) { .process-cards { grid-template-columns: 1fr; } }

/* ── FAQ Section ─────────────────────────────────────────────── */
.faq-section { background: var(--color-bg); position: relative; }
.faq-list { max-width: 800px; margin: 0 auto; display: flex; flex-direction: column; gap: var(--space-md); }
.faq-item { background: var(--color-bg-alt); border-radius: var(--radius-md); padding: var(--space-xl); box-shadow: var(--shadow-sm); transition: box-shadow var(--transition-base); }
.faq-item:hover { box-shadow: var(--shadow-md); }
.faq-item h3 { font-size: 1.1rem; margin-bottom: var(--space-sm); }
.faq-item .faq-answer { font-size: 0.95rem; line-height: 1.7; color: var(--color-text-light); }

/* ── Related Services ────────────────────────────────────────── */
.related-services { background: var(--color-bg-alt); }
.related-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-xl); }
@media (max-width: 768px) { .related-grid { grid-template-columns: 1fr; } }

/* ── CTA Banner ──────────────────────────────────────────────── */
.service-cta { background: var(--color-primary); text-align: center; position: relative; }
.service-cta::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at 30% 70%, rgba(var(--color-accent-rgb), 0.1) 0%, transparent 60%); pointer-events: none; }
.service-cta .container { position: relative; z-index: 1; max-width: 680px; }
.service-cta h2 { color: #fff; margin-bottom: var(--space-md); }
.service-cta .answer-block { color: rgba(255,255,255,0.85); font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--space-xl); }

/* ── Section Dividers ────────────────────────────────────────── */
.section-divider svg { display: block; width: 100%; }
.section-divider--bottom { position: absolute; bottom: 0; left: 0; right: 0; }
.section-divider--top { position: absolute; top: 0; left: 0; right: 0; }

.floating-accent { position: absolute; border-radius: 50%; background: rgba(var(--color-secondary-rgb), 0.04); pointer-events: none; z-index: 0; }
.float-animate { animation: floatBob 6s ease-in-out infinite; }
@keyframes floatBob { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }

.identity-sentence { font-weight: 600; color: var(--color-primary); }

/* ── Image Stack Enhancements ────────────────────────────────── */
.detail-image-stack .img-primary::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: var(--radius-lg);
  box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.06);
  pointer-events: none;
}

.detail-image-stack .img-secondary {
  transition: transform var(--transition-base);
}

.detail-image-stack:hover .img-secondary {
  transform: translate(-4px, -4px);
}

/* ── Structure Card Enhancements ─────────────────────────────── */
.structure-card__body {
  position: relative;
}

.structure-card__body::before {
  content: '';
  position: absolute;
  top: 0;
  left: var(--space-lg);
  right: var(--space-lg);
  height: 2px;
  background: linear-gradient(90deg, var(--color-accent), transparent);
  opacity: 0;
  transition: opacity var(--transition-base);
}

.structure-card:hover .structure-card__body::before {
  opacity: 1;
}

/* ── Materials Table Enhancements ────────────────────────────── */
.materials-table thead th {
  font-family: var(--font-heading);
}

.materials-table td:first-child {
  font-weight: 600;
  color: var(--color-primary);
}

.materials-table-wrap {
  border: 1px solid var(--color-border);
}

/* ── Process Card Enhancements ───────────────────────────────── */
.pcard {
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.pcard:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-md);
}

.pcard__icon {
  transition: transform var(--transition-base), border-color var(--transition-base);
}

.pcard:hover .pcard__icon {
  transform: scale(1.06);
  border-color: var(--color-accent);
}

/* ── FAQ Accent Border ───────────────────────────────────────── */
.faq-item {
  border-left: 3px solid transparent;
  transition: box-shadow var(--transition-base), border-color var(--transition-base);
}

.faq-item:hover {
  border-left-color: var(--color-accent);
}

/* ── Section Watermarks ──────────────────────────────────────── */
.structures-section .section-watermark,
.materials-section .section-watermark {
  position: absolute;
  top: var(--space-2xl);
  right: clamp(1rem, 4vw, 2rem);
  font-family: var(--font-heading);
  font-size: clamp(4rem, 8vw, 7rem);
  font-weight: 900;
  color: rgba(var(--color-primary-rgb), 0.025);
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

@media (max-width: 480px) {
  .hero--service .container { padding-top: calc(var(--navbar-height) + var(--space-2xl)); padding-bottom: var(--space-2xl); }
  .structures-grid { gap: var(--space-md); }
  .materials-table { font-size: 0.78rem; }
}
</style>


<!-- ════════════════════════════════════════════════════════════ HERO ════════ -->
<section class="hero hero--service">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a><span class="breadcrumb-sep" aria-hidden="true">/</span>
      <a href="/services/">Services</a><span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">Deck &amp; Outdoor Structures</span>
    </nav>
    <h1>Deck &amp; Outdoor Structures in <span class="text-accent">Bend, Oregon</span></h1>
    <p class="hero-answer"><?php echo htmlspecialchars($siteName); ?> builds custom decks, covered porches, pergolas, and timber-frame structures across Bend, Redmond, Sisters, and Central Oregon. Every outdoor structure is engineered for the region's snow loads, UV exposure, and freeze-thaw cycles — built for year-round use at elevation.</p>
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
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true"><path d="M0,60 L1440,60 L1440,0 C960,50 480,50 0,0 Z"/></svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ DETAIL ════════ -->
<section class="service-detail">
  <div class="floating-accent float-animate" style="width: 280px; height: 280px; top: -60px; left: -100px;" aria-hidden="true"></div>
  <div class="container">
    <div class="split-reverse">
      <div class="detail-image-stack reveal-left">
        <div class="img-primary">
          <img src="<?php echo htmlspecialchars($clientPhotos[23]); ?>" alt="Custom deck construction by Marty Mar Construction in Bend, Oregon" width="500" height="400" loading="lazy">
        </div>
        <div class="img-secondary">
          <img src="<?php echo htmlspecialchars($clientPhotos[24]); ?>" alt="Outdoor structure detail showing deck railing and finish work" width="250" height="200" loading="lazy">
        </div>
      </div>
      <div class="detail-text reveal-up">
        <span class="eyebrow-label">Outdoor Living</span>
        <h2>What Outdoor Structures Does <span class="text-accent">Marty Mar</span> Build in Bend?</h2>
        <p class="answer-block">Marty Mar Construction builds custom decks, covered porches, pergolas, shade structures, and timber-frame pavilions throughout Bend and Central Oregon. Every structure is engineered for Oregon snow loads, UV exposure at 3,600 feet, and freeze-thaw soil conditions — with footings, posts, and framing sized for the high desert.</p>

        <p class="identity-sentence"><?php echo htmlspecialchars($siteName); ?> is a licensed Oregon general contractor based in Bend, building decks and outdoor structures across Central Oregon since <?php echo $yearEstablished; ?>.</p>

        <p>Building a deck in Bend isn't the same as building one in Portland or Eugene. At 3,600 feet, you're dealing with 30-50 lb/sq ft ground snow loads, 250+ days of UV exposure that bleaches and degrades unprotected materials, and freeze-thaw soil cycling that heaves footings poured too shallow. A deck built to sea-level specs won't last five years here.</p>

        <p>We engineer every outdoor structure for your specific zone. Footings go below the local frost line. Framing is sized for actual snow loads, not minimums. We use composite decking or naturally rot-resistant species rated for UV exposure — and we build with stainless or coated fasteners that won't corrode and streak.</p>

        <p>Last updated: <?php echo date('F Y'); ?></p>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ STRUCTURES ════════ -->
<section class="structures-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true"><polygon points="0,0 1440,50 1440,0"/></svg>
  </div>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">What We Build</span>
      <h2>Which Outdoor Structure Is Right for Your <span class="text-accent">Bend Property</span>?</h2>
      <p class="answer-block">The right outdoor structure depends on your lot, your usage pattern, and Bend's weather. Open decks maximize sun exposure. Covered porches extend the usable season through rain and snow. Pergolas split the difference — shade in summer, open sky when you want it.</p>
    </div>
    <div class="structures-grid">
      <div class="structure-card card-tint-1 reveal-up reveal-delay-1">
        <div class="structure-card__img">
          <img src="<?php echo htmlspecialchars($clientPhotos[25]); ?>" alt="Custom composite deck with mountain view in Bend, Oregon" width="400" height="250" loading="lazy">
        </div>
        <div class="structure-card__body">
          <h3>Custom Decks</h3>
          <p>Ground-level, elevated, and multi-level composite or timber decks with railing systems, stairs, and integrated lighting. Engineered for Bend's snow loads.</p>
        </div>
      </div>
      <div class="structure-card card-tint-2 reveal-up reveal-delay-2">
        <div class="structure-card__img">
          <img src="<?php echo htmlspecialchars($clientPhotos[26]); ?>" alt="Covered porch construction project in Central Oregon" width="400" height="250" loading="lazy">
        </div>
        <div class="structure-card__body">
          <h3>Covered Porches</h3>
          <p>Roofed outdoor living spaces with sealed ceilings, integrated lighting, and structural posts rated for snow accumulation. Usable year-round in Bend.</p>
        </div>
      </div>
      <div class="structure-card card-tint-3 reveal-up reveal-delay-3">
        <div class="structure-card__img">
          <img src="<?php echo htmlspecialchars($clientPhotos[27]); ?>" alt="Pergola and shade structure built by Marty Mar Construction" width="400" height="250" loading="lazy">
        </div>
        <div class="structure-card__body">
          <h3>Pergolas &amp; Shade Structures</h3>
          <p>Open-beam or louvered shade structures for patios and outdoor dining. Optional retractable canopy and string-light wiring for evening use.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true"><path d="M0,50 L1440,50 L1440,0 Q720,55 0,0 Z"/></svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ MATERIALS ════════ -->
<section class="materials-section">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Material Guide</span>
      <h2>What Decking Material Works Best at <span class="text-accent">Bend's Elevation</span>?</h2>
      <p class="answer-block">The best decking material for Bend depends on your budget, maintenance tolerance, and aesthetic preference. Composite decking offers the best long-term value for Central Oregon's UV and freeze-thaw conditions. Cedar looks natural but needs annual care. Pressure-treated is the most affordable entry point.</p>
    </div>
    <div class="materials-table-wrap reveal-up">
      <table class="materials-table">
        <thead>
          <tr>
            <th>Material</th>
            <th>Cost / sq ft</th>
            <th>Lifespan</th>
            <th>Maintenance</th>
            <th>Bend Rating</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>Composite</strong> (Trex, TimberTech)</td>
            <td>$60 – $100</td>
            <td>25-50 years</td>
            <td>Wash annually</td>
            <td><span class="material-badge material-badge--best">Best</span></td>
          </tr>
          <tr>
            <td><strong>Cedar</strong></td>
            <td>$40 – $65</td>
            <td>15-25 years</td>
            <td>Seal every 1-2 years</td>
            <td><span class="material-badge material-badge--good">Good</span></td>
          </tr>
          <tr>
            <td><strong>Pressure-Treated Pine</strong></td>
            <td>$30 – $50</td>
            <td>10-15 years</td>
            <td>Seal every 1-2 years</td>
            <td><span class="material-badge material-badge--fair">Fair</span></td>
          </tr>
          <tr>
            <td><strong>Ipe Hardwood</strong></td>
            <td>$80 – $140</td>
            <td>40-75 years</td>
            <td>Oil annually or let silver</td>
            <td><span class="material-badge material-badge--best">Best</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ PROCESS ════════ -->
<section class="process-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true"><polygon points="0,50 720,0 1440,50"/></svg>
  </div>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Our Process</span>
      <h2>How Does Deck Construction <span class="text-accent">Work</span> With Marty Mar?</h2>
      <p class="answer-block">Our deck building process covers four stages: site assessment and design, permitting and material procurement, foundation and framing, and decking installation with final inspection. Most standard decks are completed in 1-3 weeks after permit approval.</p>
    </div>
    <div class="process-cards">
      <div class="pcard reveal-up reveal-delay-1">
        <div class="pcard__icon"><i data-lucide="ruler" aria-hidden="true"></i></div>
        <h3>Site &amp; Design</h3>
        <p>Assess lot slope, soil conditions, and access. Finalize design, material selection, and detailed estimate.</p>
      </div>
      <div class="pcard reveal-up reveal-delay-2">
        <div class="pcard__icon"><i data-lucide="file-text" aria-hidden="true"></i></div>
        <h3>Permits &amp; Materials</h3>
        <p>Pull Deschutes County permit, order decking and hardware, and schedule build date around material delivery.</p>
      </div>
      <div class="pcard reveal-up reveal-delay-3">
        <div class="pcard__icon"><i data-lucide="hard-hat" aria-hidden="true"></i></div>
        <h3>Foundation &amp; Framing</h3>
        <p>Dig and pour footings below frost line, set posts, install beams and joists — inspected before decking goes on.</p>
      </div>
      <div class="pcard reveal-up reveal-delay-4">
        <div class="pcard__icon"><i data-lucide="check-circle" aria-hidden="true"></i></div>
        <h3>Deck &amp; Finish</h3>
        <p>Install decking, railings, stairs, lighting, and final trim. County inspection and walkthrough to confirm every detail.</p>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ FAQ ════════ -->
<section class="faq-section">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Common Questions</span>
      <h2>What Do Homeowners Ask About <span class="text-accent">Deck Building</span> in Bend?</h2>
      <p class="answer-block">Homeowners considering a deck in Bend and Central Oregon typically ask about costs, materials, permits, snow load engineering, and build timelines. Below are the questions we hear most — with direct answers from our team.</p>
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
      <p class="answer-block">Beyond decks and outdoor structures, Marty Mar Construction handles new home construction, room additions, whole-home remodeling, and kitchen and bathroom renovations across Central Oregon.</p>
    </div>
    <div class="related-grid">
      <?php
      $relatedBullets = [
          'new-home-construction'  => ['Custom floor plans for your lot', 'Foundation-to-finish oversight', 'Snow-load rated framing'],
          'home-additions'         => ['Seamless match to existing structure', 'Second-story expansions', 'ADU and garage conversions'],
          'remodeling-renovations' => ['Whole-home transformations', 'Structural and cosmetic work', 'On-schedule, on-budget delivery'],
          'bathroom-remodeling'    => ['Walk-in showers and soaking tubs', 'Custom tile and vanity work', 'Full gut or targeted upgrades'],
          'kitchen-remodeling'     => ['Custom cabinetry and countertops', 'Layout and structural changes', 'Lighting and appliance planning'],
      ];
      $related = array_filter($services, fn($s) => $s['slug'] !== 'deck-outdoor-structures');
      $related = array_values($related);
      $picked = [$related[0], $related[1], $related[3]];
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
    <span class="eyebrow-label" style="color: var(--color-accent);">Build Your Outdoor Space</span>
    <h2>How Do You Get a Free Deck Building Estimate?</h2>
    <p class="answer-block">Call <?php echo $phone; ?> or fill out our online form. We'll visit your property, assess the site, discuss your design and material preferences, and deliver a detailed written estimate — no cost, no obligation.</p>
    <div style="display: flex; flex-wrap: wrap; gap: var(--space-md); justify-content: center;">
      <a href="/contact/" class="btn-primary"><i data-lucide="file-text" aria-hidden="true"></i> Request Free Estimate</a>
      <a href="tel:<?php echo $phonePlain; ?>" class="btn-secondary btn-secondary--light"><i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
