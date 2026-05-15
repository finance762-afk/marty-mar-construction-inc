<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'bathroom-remodeling') { $currentService = $svc; break; }
}

$pageTitle       = 'Bathroom Remodeling Bend OR | Bathroom Renovation | ' . $siteName;
$pageDescription = 'Marty Mar Construction remodels bathrooms in Bend, Redmond, Sisters, and Central Oregon. Custom tile, walk-in showers, soaking tubs, and floating vanities. Licensed since ' . $yearEstablished . '. Call ' . $phone . '.';
$canonicalUrl    = $siteUrl . '/services/bathroom-remodeling/';
$ogImage         = $currentService['image'];
$currentPage     = 'services';
$heroImagePreload = $currentService['image'];
$cssVersion      = '4.1';

// ── Page FAQs ─────────────────────────────────────────────────
$pageFaqs = [
    ['q' => 'How much does a bathroom remodel cost in Bend, Oregon?', 'a' => 'Bathroom remodel costs in Bend range from $12,000-$25,000 for a cosmetic update (fixtures, paint, vanity) to $25,000-$60,000 for a full gut renovation with custom tile, new plumbing, and layout changes. Master bath remodels with high-end finishes can exceed $75,000.'],
    ['q' => 'How long does a bathroom remodel take in Central Oregon?', 'a' => 'Most bathroom remodels in Bend take 2-4 weeks for a standard renovation and 4-6 weeks for a full gut-and-rebuild with structural changes. Material lead times (custom tile, specialty fixtures) can add 2-3 weeks — we order materials before demo starts to minimize delays.'],
    ['q' => 'Can you convert a bathtub to a walk-in shower?', 'a' => 'Yes — tub-to-shower conversions are one of our most requested projects. We handle the plumbing relocation, waterproofing, custom tile work, glass enclosure installation, and drain reconfiguration. Most conversions take 2-3 weeks from demo to completion.'],
    ['q' => 'Do you handle bathroom plumbing and electrical?', 'a' => 'Yes. We coordinate all plumbing and electrical work through licensed subcontractors under our general contractor license. Fixture relocations, new circuits for heated floors, exhaust fan upgrades, and supply line rerouting are all part of what we manage.'],
    ['q' => 'What waterproofing methods do you use in shower remodels?', 'a' => 'We use Kerdi membrane or RedGard liquid waterproofing on all shower walls and floors, with pre-formed curb systems and sealed niches. Proper waterproofing is critical in Bend\'s dry climate — humidity differences between heated bathrooms and cold exterior walls cause condensation that destroys inadequately sealed assemblies.'],
];

// ── Schema Markup ─────────────────────────────────────────────
$serviceSchema    = generateServiceSchema($currentService);
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Services', 'url' => '/services/'],
    ['name' => 'Bathroom Remodeling'],
]);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     BATHROOM REMODELING — Service Page
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
  background: linear-gradient(155deg, rgba(var(--color-primary-rgb), 0.91) 0%, rgba(var(--color-primary-rgb), 0.64) 50%, rgba(var(--color-primary-rgb), 0.83) 100%);
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
.service-detail .split-layout {
  display: grid; grid-template-columns: 0.85fr 1.15fr; gap: var(--space-3xl); align-items: center;
}
.detail-image { border-radius: var(--radius-lg); overflow: hidden; }
.detail-image img { width: 100%; height: auto; object-fit: cover; }
.detail-image::after { content: ''; position: absolute; inset: 0; border-radius: var(--radius-lg); box-shadow: inset 0 0 0 1px rgba(0,0,0,0.06); pointer-events: none; }
.service-detail .detail-text h2 { margin-bottom: var(--space-md); }
.service-detail .detail-text .answer-block { font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--space-lg); }
.service-detail .detail-text p { margin-bottom: var(--space-lg); max-width: var(--content-width); line-height: 1.7; }

@media (max-width: 860px) {
  .service-detail .split-layout { grid-template-columns: 1fr; gap: var(--space-xl); }
}

/* ── Features Bento Grid ─────────────────────────────────────── */
.features-section { background: var(--color-bg-alt); position: relative; }

.bento-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-template-rows: auto auto;
  gap: var(--space-lg);
}

.bento-card {
  background: var(--color-bg); border-radius: var(--radius-md); padding: var(--space-xl);
  box-shadow: var(--shadow-sm); transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.bento-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
.bento-card--wide { grid-column: span 2; }

.bento-card__icon {
  width: 48px; height: 48px; border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.1);
  display: flex; align-items: center; justify-content: center;
  margin-bottom: var(--space-md); color: var(--color-accent);
}
.bento-card__icon i, .bento-card__icon svg { width: 22px; height: 22px; }
.bento-card h3 { font-size: 1.05rem; margin-bottom: var(--space-sm); }
.bento-card p { font-size: 0.9rem; color: var(--color-text-light); line-height: 1.6; margin: 0; }

@media (max-width: 768px) {
  .bento-grid { grid-template-columns: 1fr; }
  .bento-card--wide { grid-column: span 1; }
}

/* ── Process Section ─────────────────────────────────────────── */
.process-section { background: var(--color-bg); position: relative; }

.process-flow {
  display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-lg);
  position: relative;
}

.process-flow::before {
  content: ''; position: absolute; top: 28px; left: 12%; right: 12%;
  height: 2px; background: linear-gradient(90deg, var(--color-accent), rgba(var(--color-accent-rgb), 0.15));
}

.flow-step { text-align: center; position: relative; z-index: 1; }

.flow-step__dot {
  width: 56px; height: 56px; border-radius: 50%; background: var(--color-bg);
  border: 3px solid var(--color-accent); display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-md); color: var(--color-accent); box-shadow: var(--shadow-md);
}
.flow-step__dot i, .flow-step__dot svg { width: 22px; height: 22px; }
.flow-step h3 { font-size: 0.95rem; margin-bottom: var(--space-xs); }
.flow-step p { font-size: 0.85rem; color: var(--color-text-light); line-height: 1.6; max-width: 200px; margin: 0 auto; }

@media (max-width: 860px) {
  .process-flow { grid-template-columns: 1fr 1fr; gap: var(--space-2xl) var(--space-lg); }
  .process-flow::before { display: none; }
}
@media (max-width: 500px) { .process-flow { grid-template-columns: 1fr; } }

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
.service-cta::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at 40% 60%, rgba(var(--color-accent-rgb), 0.1) 0%, transparent 60%); pointer-events: none; }
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

/* ── Split Layout Enhancements ───────────────────────────────── */
.service-detail .split-layout .detail-image {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
}

.service-detail .split-layout .detail-image::before {
  content: '';
  position: absolute;
  top: -6px;
  left: -6px;
  right: auto;
  bottom: auto;
  width: 60px;
  height: 60px;
  border-top: 3px solid var(--color-accent);
  border-left: 3px solid var(--color-accent);
  border-radius: var(--radius-sm) 0 0 0;
  z-index: 2;
  pointer-events: none;
}

/* ── Bento Card Enhancements ─────────────────────────────────── */
.bento-card {
  border-left: 3px solid transparent;
  transition: transform var(--transition-base), box-shadow var(--transition-base), border-color var(--transition-base);
}

.bento-card:hover {
  border-left-color: var(--color-accent);
}

.bento-card--wide .bento-card__icon {
  width: 54px;
  height: 54px;
}

.bento-card--wide h3 {
  font-size: 1.15rem;
}

.bento-card--wide p {
  font-size: 0.95rem;
}

/* ── Flow Step Enhancements ──────────────────────────────────── */
.flow-step__dot {
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.flow-step:hover .flow-step__dot {
  transform: scale(1.08);
  box-shadow: var(--shadow-lg);
}

.flow-step h3 {
  transition: color var(--transition-base);
}

.flow-step:hover h3 {
  color: var(--color-accent);
}

/* ── Watermark Numbers ───────────────────────────────────────── */
.features-section .section-number {
  position: absolute;
  top: var(--space-xl);
  right: clamp(1rem, 4vw, 2rem);
  font-family: var(--font-heading);
  font-size: clamp(4rem, 8vw, 7rem);
  font-weight: 900;
  color: rgba(var(--color-primary-rgb), 0.025);
  line-height: 1;
  pointer-events: none;
}

/* ── FAQ Hover Accent ────────────────────────────────────────── */
.faq-item {
  border-left: 3px solid transparent;
  transition: box-shadow var(--transition-base), border-color var(--transition-base);
}

.faq-item:hover {
  border-left-color: var(--color-accent);
}

/* ── Hero Noise Texture ──────────────────────────────────────── */
.hero--service .container::after {
  content: '';
  position: fixed;
  inset: 0;
  opacity: 0.03;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
  pointer-events: none;
  z-index: 0;
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
  .bento-grid { gap: var(--space-md); }
  .faq-item { padding: var(--space-lg); }
}
</style>


<!-- ════════════════════════════════════════════════════════════ HERO ════════ -->
<section class="hero hero--service">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a><span class="breadcrumb-sep" aria-hidden="true">/</span>
      <a href="/services/">Services</a><span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">Bathroom Remodeling</span>
    </nav>
    <h1>Bathroom Remodeling in <span class="text-accent">Bend, Oregon</span></h1>
    <p class="hero-answer"><?php echo htmlspecialchars($siteName); ?> transforms bathrooms across Bend, Redmond, Sisters, and Central Oregon with custom tile work, walk-in showers, soaking tubs, floating vanities, and updated plumbing. We handle full gut-and-rebuild renovations or targeted upgrades — master baths, guest baths, and powder rooms.</p>
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
  <div class="floating-accent float-animate" style="width: 240px; height: 240px; top: -50px; right: -80px;" aria-hidden="true"></div>
  <div class="container">
    <div class="split-layout">
      <div class="detail-image reveal-left">
        <img src="<?php echo htmlspecialchars($clientPhotos[21]); ?>" alt="Bathroom remodeling project by Marty Mar Construction in Bend, Oregon showing custom tile and fixtures" width="500" height="600" loading="lazy">
      </div>
      <div class="detail-text reveal-up">
        <span class="eyebrow-label">Bathroom Renovation</span>
        <h2>What's Included in a <span class="text-accent">Bathroom Remodel</span> With Marty Mar?</h2>
        <p class="answer-block">A bathroom remodel with Marty Mar Construction includes demolition, plumbing and electrical updates, waterproofing, custom tile installation, fixture mounting, vanity and countertop installation, lighting, ventilation, and final finishes. We manage every trade and inspection from start to certificate of completion.</p>

        <p class="identity-sentence"><?php echo htmlspecialchars($siteName); ?> is a licensed Oregon general contractor based in Bend, remodeling bathrooms across Central Oregon since <?php echo $yearEstablished; ?>.</p>

        <p>Bathroom remodeling in Central Oregon demands proper waterproofing and moisture management. The humidity differential between a heated shower enclosure and Bend's dry, cold exterior air creates condensation pressure that destroys poorly sealed wall assemblies. Every shower we build gets a full Kerdi membrane or RedGard system — no shortcuts, no skipped niches, no exposed backer board seams.</p>

        <p>We handle everything from a straightforward tub-to-shower conversion in a guest bath to a complete master suite gut renovation with heated floors, double vanities, and a freestanding soaking tub. Our tile crew handles large-format porcelain, natural stone, mosaic accent walls, and linear drain installations — materials that require precision setting to look right and last.</p>

        <p>Last updated: <?php echo date('F Y'); ?></p>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ FEATURES BENTO ════════ -->
<section class="features-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true"><polygon points="0,0 1440,50 1440,0"/></svg>
  </div>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">What We Build</span>
      <h2>What Bathroom Features Are Most Popular in <span class="text-accent">Bend Homes</span>?</h2>
      <p class="answer-block">The most requested bathroom features in Bend include walk-in showers with frameless glass, heated tile floors, floating vanities with quartz countertops, freestanding soaking tubs, and linear drain systems. Below are the upgrades homeowners across Central Oregon choose most.</p>
    </div>
    <div class="bento-grid">
      <div class="bento-card bento-card--wide card-tint-1 reveal-up reveal-delay-1">
        <div class="bento-card__icon"><i data-lucide="droplets" aria-hidden="true"></i></div>
        <h3>Walk-In Showers</h3>
        <p>Curbless or low-threshold entry, large-format tile, frameless glass enclosure, linear drain, and full Kerdi waterproofing. The most requested bathroom upgrade in Bend.</p>
      </div>
      <div class="bento-card card-tint-2 reveal-up reveal-delay-2">
        <div class="bento-card__icon"><i data-lucide="thermometer" aria-hidden="true"></i></div>
        <h3>Heated Floors</h3>
        <p>Electric radiant floor mats under tile — warm feet on Bend's cold mornings, dedicated circuit, programmable thermostat.</p>
      </div>
      <div class="bento-card card-tint-3 reveal-up reveal-delay-3">
        <div class="bento-card__icon"><i data-lucide="square" aria-hidden="true"></i></div>
        <h3>Floating Vanities</h3>
        <p>Wall-mounted vanities with quartz or stone countertops, undermount sinks, and soft-close drawers. Opens floor space visually.</p>
      </div>
      <div class="bento-card card-tint-3 reveal-scale reveal-delay-1">
        <div class="bento-card__icon"><i data-lucide="bath" aria-hidden="true"></i></div>
        <h3>Soaking Tubs</h3>
        <p>Freestanding acrylic or cast iron tubs as a master bath focal point, with floor-mounted filler and proper drain placement.</p>
      </div>
      <div class="bento-card bento-card--wide card-tint-1 reveal-scale reveal-delay-2">
        <div class="bento-card__icon"><i data-lucide="grid-3x3" aria-hidden="true"></i></div>
        <h3>Custom Tile Work</h3>
        <p>Large-format porcelain, natural stone, herringbone patterns, subway with accent bands, mosaic feature walls, and shower niches with contrasting tile. Our tile crew handles precision cuts and patterns that demand experience.</p>
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
      <h2>How Does a Bathroom Remodel <span class="text-accent">Work</span> With Marty Mar?</h2>
      <p class="answer-block">Our bathroom remodel process covers four stages: design and material selection, controlled demolition, construction and tile installation, and fixture mounting with final walkthrough. Most bathroom remodels are completed in 2-4 weeks with weekly progress updates.</p>
    </div>
    <div class="process-flow">
      <div class="flow-step reveal-up reveal-delay-1">
        <div class="flow-step__dot"><i data-lucide="ruler" aria-hidden="true"></i></div>
        <h3>Design &amp; Materials</h3>
        <p>Measure, select tile, fixtures, and vanity. Finalize scope and order materials before demo.</p>
      </div>
      <div class="flow-step reveal-up reveal-delay-2">
        <div class="flow-step__dot"><i data-lucide="hammer" aria-hidden="true"></i></div>
        <h3>Demolition</h3>
        <p>Controlled tear-out, plumbing assessment, structural check, and prep for new waterproofing.</p>
      </div>
      <div class="flow-step reveal-up reveal-delay-3">
        <div class="flow-step__dot"><i data-lucide="wrench" aria-hidden="true"></i></div>
        <h3>Build &amp; Tile</h3>
        <p>Waterproofing, backer board, tile install, plumbing rough-in, electrical, and heated floor mats.</p>
      </div>
      <div class="flow-step reveal-up reveal-delay-4">
        <div class="flow-step__dot"><i data-lucide="check-circle" aria-hidden="true"></i></div>
        <h3>Fixtures &amp; Finish</h3>
        <p>Vanity mount, mirror, lighting, hardware, caulking, final inspection, and walkthrough.</p>
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
      <h2>What Do Homeowners Ask About <span class="text-accent">Bathroom Remodeling</span> in Bend?</h2>
      <p class="answer-block">Homeowners in Bend and Central Oregon typically ask about costs, timelines, tub-to-shower conversions, plumbing work, and waterproofing methods. Below are the questions we hear most — with direct answers from our team.</p>
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
      <p class="answer-block">Beyond bathroom remodeling, Marty Mar Construction handles kitchen renovations, whole-home remodeling, new construction, room additions, and custom deck building across Central Oregon.</p>
    </div>
    <div class="related-grid">
      <?php
      $relatedBullets = [
          'new-home-construction'  => ['Custom floor plans for your lot', 'Foundation-to-finish oversight', 'Snow-load rated framing'],
          'home-additions'         => ['Seamless match to existing structure', 'Second-story expansions', 'ADU and garage conversions'],
          'remodeling-renovations' => ['Whole-home transformations', 'Structural and cosmetic work', 'On-schedule, on-budget delivery'],
          'kitchen-remodeling'     => ['Custom cabinetry and countertops', 'Layout and structural changes', 'Lighting and appliance planning'],
          'deck-outdoor-structures'=> ['Composite and timber options', 'Engineered for Oregon snow loads', 'Pergolas, porches, and shade structures'],
      ];
      $related = array_filter($services, fn($s) => $s['slug'] !== 'bathroom-remodeling');
      $related = array_values($related);
      $picked = [$related[2], $related[3], $related[4]];
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
    <h2>How Do You Get a Free Bathroom Remodeling Estimate?</h2>
    <p class="answer-block">Call <?php echo $phone; ?> or fill out our online form. We'll visit your home, measure the space, discuss your vision and budget, and deliver a detailed written estimate — no cost, no obligation.</p>
    <div style="display: flex; flex-wrap: wrap; gap: var(--space-md); justify-content: center;">
      <a href="/contact/" class="btn-primary"><i data-lucide="file-text" aria-hidden="true"></i> Request Free Estimate</a>
      <a href="tel:<?php echo $phonePlain; ?>" class="btn-secondary btn-secondary--light"><i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
