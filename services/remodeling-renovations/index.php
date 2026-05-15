<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'remodeling-renovations') { $currentService = $svc; break; }
}

$pageTitle       = 'Home Remodeling Bend OR | Renovation Contractor | ' . $siteName;
$pageDescription = 'Marty Mar Construction remodels homes in Bend, Redmond, Sisters, and Central Oregon. From single-room refreshes to whole-home renovations. Licensed since ' . $yearEstablished . '. Call ' . $phone . '.';
$canonicalUrl    = $siteUrl . '/services/remodeling-renovations/';
$ogImage         = $currentService['image'];
$currentPage     = 'services';
$heroImagePreload = $currentService['image'];
$cssVersion      = '4.1';

// ── Page FAQs ─────────────────────────────────────────────────
$pageFaqs = [
    ['q' => 'How much does a home remodel cost in Bend, Oregon?', 'a' => 'Home remodeling costs in Bend vary widely by scope. Minor cosmetic updates run $15,000-$40,000, mid-range remodels $50,000-$150,000, and whole-home renovations $150,000-$400,000+. We provide a detailed written estimate after a site visit and scope discussion.'],
    ['q' => 'How long does a full home renovation take in Central Oregon?', 'a' => 'Single-room remodels typically take 3-6 weeks. Multi-room renovations run 8-16 weeks. Whole-home gut-and-rebuild projects average 4-8 months depending on scope, structural changes, and permitting. We set a detailed schedule before work begins.'],
    ['q' => 'Do I need to move out during a whole-home remodel?', 'a' => 'It depends on the scope. For whole-home renovations involving structural changes, electrical rewiring, or plumbing rerouting, we recommend relocating temporarily. For single-room or phased remodels, most homeowners stay in place. We plan around your living situation.'],
    ['q' => 'Does Marty Mar Construction handle structural changes?', 'a' => 'Yes. We handle load-bearing wall removal, floor plan reconfiguration, foundation modifications, and roofline changes. All structural work is engineered and permitted through Deschutes County with inspections at every stage.'],
    ['q' => 'Can you remodel older homes in Bend without losing their character?', 'a' => 'Absolutely. Many Bend homes from the 1970s-1990s have solid bones but dated finishes and inefficient layouts. We preserve architectural details worth keeping while modernizing systems, insulation, and living spaces for today\'s standards.'],
    ['q' => 'Are you licensed and insured for remodeling work in Oregon?', 'a' => 'Yes. Marty Mar Construction Inc is fully licensed as a general contractor in Oregon with general liability insurance and workers\' compensation coverage. License documentation and insurance certificates are available on request.'],
];

// ── Schema Markup ─────────────────────────────────────────────
$serviceSchema    = generateServiceSchema($currentService);
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Services', 'url' => '/services/'],
    ['name' => 'Remodeling & Renovations'],
]);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     REMODELING & RENOVATIONS — Service Page
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
  background: linear-gradient(170deg, rgba(var(--color-primary-rgb), 0.93) 0%, rgba(var(--color-primary-rgb), 0.66) 55%, rgba(var(--color-primary-rgb), 0.84) 100%);
  z-index: 1;
}

.hero--service .container {
  position: relative; z-index: 2; text-align: center; max-width: 800px;
  padding-top: calc(var(--navbar-height) + var(--space-3xl)); padding-bottom: var(--space-3xl);
}

.hero--service .breadcrumb {
  display: flex; justify-content: center; gap: var(--space-sm);
  font-size: 0.85rem; color: rgba(255, 255, 255, 0.6); margin-bottom: var(--space-xl);
}
.hero--service .breadcrumb a { color: rgba(255, 255, 255, 0.7); transition: color var(--transition-base); }
.hero--service .breadcrumb a:hover { color: var(--color-accent); }
.hero--service .breadcrumb-sep { margin: 0 var(--space-xs); }
.hero--service h1 { font-size: var(--fs-h1); color: #fff; margin-bottom: var(--space-md); line-height: 1.05; }
.hero--service .hero-answer { color: rgba(255, 255, 255, 0.85); font-size: 1.15rem; line-height: 1.7; max-width: 60ch; margin: 0 auto var(--space-xl); }
.hero--service .hero-ctas { display: flex; flex-wrap: wrap; gap: var(--space-md); justify-content: center; }
.hero--service .hero-trust { display: flex; flex-wrap: wrap; justify-content: center; gap: var(--space-lg); margin-top: var(--space-xl); font-size: 0.85rem; color: rgba(255, 255, 255, 0.7); }
.hero--service .hero-trust span { display: flex; align-items: center; gap: var(--space-xs); }
.hero--service .hero-trust i, .hero--service .hero-trust svg { width: 16px; height: 16px; color: var(--color-accent); }

/* ── Asymmetric Content Grid ─────────────────────────────────── */
.service-detail { background: var(--color-bg); position: relative; }

.service-detail .content-asym {
  display: grid;
  grid-template-columns: 1.3fr 0.7fr;
  gap: var(--space-3xl);
  align-items: start;
}

.service-detail .content-text h2 { margin-bottom: var(--space-md); }
.service-detail .content-text .answer-block { font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--space-lg); }
.service-detail .content-text p { margin-bottom: var(--space-lg); max-width: var(--content-width); line-height: 1.7; }

.content-sidebar {
  display: flex;
  flex-direction: column;
  gap: var(--space-xl);
}

.content-sidebar .sidebar-image {
  border-radius: var(--radius-lg);
  overflow: hidden;
}

.content-sidebar .sidebar-image img { width: 100%; height: auto; object-fit: cover; }

.sidebar-stats {
  background: var(--color-bg-alt);
  border-radius: var(--radius-md);
  padding: var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
}

.sidebar-stat {
  display: flex;
  align-items: center;
  gap: var(--space-md);
}

.sidebar-stat__number {
  font-family: var(--font-heading);
  font-size: 1.8rem;
  font-weight: 800;
  color: var(--color-accent);
  line-height: 1;
  min-width: 60px;
}

.sidebar-stat__text {
  font-size: 0.9rem;
  color: var(--color-text-light);
  line-height: 1.4;
}

@media (max-width: 860px) {
  .service-detail .content-asym { grid-template-columns: 1fr; gap: var(--space-xl); }
}

/* ── Scope Cards ─────────────────────────────────────────────── */
.scope-section { background: var(--color-bg-alt); position: relative; }

.scope-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
}

.scope-card {
  background: var(--color-bg);
  border-radius: var(--radius-md);
  padding: var(--space-2xl) var(--space-xl);
  border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.scope-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }

.scope-card h3 { font-size: 1.1rem; margin-bottom: var(--space-sm); }
.scope-card .scope-range { font-family: var(--font-heading); font-size: 1.3rem; color: var(--color-accent); font-weight: 700; margin-bottom: var(--space-sm); }
.scope-card p { font-size: 0.9rem; color: var(--color-text-light); line-height: 1.6; margin-bottom: var(--space-md); }
.scope-card ul { display: flex; flex-direction: column; gap: var(--space-xs); }
.scope-card ul li { font-size: 0.88rem; color: var(--color-text); padding-left: 1.25rem; position: relative; }
.scope-card ul li::before { content: "•"; color: var(--color-accent); font-weight: 700; position: absolute; left: 0.25rem; }

@media (max-width: 768px) { .scope-grid { grid-template-columns: 1fr; } }

/* ── Process Section ─────────────────────────────────────────── */
.process-section { background: var(--color-bg); position: relative; }

.process-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-lg);
  counter-reset: step;
}

.step-item { text-align: center; counter-increment: step; }

.step-item::before {
  content: counter(step);
  display: flex;
  width: 64px; height: 64px;
  border-radius: 50%;
  border: 3px solid rgba(var(--color-accent-rgb), 0.2);
  background: var(--color-bg-alt);
  align-items: center; justify-content: center;
  font-family: var(--font-heading); font-size: 1.4rem; font-weight: 800; color: var(--color-accent);
  margin: 0 auto var(--space-md);
  box-shadow: var(--shadow-sm);
}

.step-item h3 { font-size: 1rem; margin-bottom: var(--space-sm); }
.step-item p { font-size: 0.88rem; color: var(--color-text-light); line-height: 1.6; max-width: 220px; margin: 0 auto; }

@media (max-width: 860px) { .process-steps { grid-template-columns: 1fr 1fr; } }
@media (max-width: 500px) { .process-steps { grid-template-columns: 1fr; } }

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
.service-cta::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at 50% 80%, rgba(var(--color-accent-rgb), 0.1) 0%, transparent 60%); pointer-events: none; }
.service-cta .container { position: relative; z-index: 1; max-width: 680px; }
.service-cta h2 { color: #fff; margin-bottom: var(--space-md); }
.service-cta .answer-block { color: rgba(255, 255, 255, 0.85); font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--space-xl); }

/* ── Section Dividers ────────────────────────────────────────── */
.section-divider svg { display: block; width: 100%; }
.section-divider--bottom { position: absolute; bottom: 0; left: 0; right: 0; }
.section-divider--top { position: absolute; top: 0; left: 0; right: 0; }

.floating-accent { position: absolute; border-radius: 50%; background: rgba(var(--color-accent-rgb), 0.04); pointer-events: none; z-index: 0; }
.float-animate { animation: floatDrift 7s ease-in-out infinite; }
@keyframes floatDrift { 0%, 100% { transform: translate(0, 0); } 50% { transform: translate(8px, -12px); } }

.identity-sentence { font-weight: 600; color: var(--color-primary); }

@media (max-width: 480px) {
  .hero--service .container { padding-top: calc(var(--navbar-height) + var(--space-2xl)); padding-bottom: var(--space-2xl); }
}
</style>


<!-- ════════════════════════════════════════════════════════════ HERO ════════ -->
<section class="hero hero--service">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a><span class="breadcrumb-sep" aria-hidden="true">/</span>
      <a href="/services/">Services</a><span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">Remodeling &amp; Renovations</span>
    </nav>
    <h1>Home Remodeling in <span class="text-accent">Bend, Oregon</span></h1>
    <p class="hero-answer"><?php echo htmlspecialchars($siteName); ?> remodels homes across Bend, Redmond, Sisters, and Central Oregon — from single-room refreshes to whole-home transformations. We handle structural changes, finish work, flooring, cabinetry, and everything in between with licensed tradespeople and transparent pricing.</p>
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
  <div class="floating-accent float-animate" style="width: 280px; height: 280px; bottom: -60px; right: -100px;" aria-hidden="true"></div>
  <div class="container">
    <div class="content-asym">
      <div class="content-text reveal-up">
        <span class="eyebrow-label">Transform Your Home</span>
        <h2>What Remodeling Services Does <span class="text-accent">Marty Mar</span> Offer in Bend?</h2>
        <p class="answer-block">Marty Mar Construction offers complete home remodeling services in Bend and Central Oregon — including single-room refreshes, multi-room renovations, whole-home gut-and-rebuild projects, structural modifications, and cosmetic finish upgrades. Every project is managed directly by Marty with a written scope and schedule.</p>

        <p class="identity-sentence"><?php echo htmlspecialchars($siteName); ?> is a licensed Oregon general contractor based in Bend, delivering home remodeling and renovation services across Central Oregon since <?php echo $yearEstablished; ?>.</p>

        <p>A remodel is only as good as the plan behind it. Before we swing a hammer, we walk your home to understand its bones — structural framing, load paths, plumbing routing, and electrical capacity. That assessment drives the scope of work, catches hidden problems early, and keeps the project from ballooning once walls are open.</p>

        <p>Central Oregon homes face conditions that generic remodeling guides don't cover. Bend's freeze-thaw cycling cracks rigid materials in bathrooms and entryways. UV exposure at 3,600 feet degrades cheap flooring near south-facing windows within a few years. We specify materials and installation methods that handle these conditions, not just what looks good in a showroom.</p>

        <p>Whether you're updating a 1980s ranch in the Old Farm District or modernizing a lodge-style home near Mt. Bachelor, we tailor each remodel to your home's architecture, your budget, and your daily routine.</p>

        <p>Last updated: <?php echo date('F Y'); ?></p>
      </div>
      <div class="content-sidebar reveal-right">
        <div class="sidebar-image">
          <img src="<?php echo htmlspecialchars($clientPhotos[9]); ?>" alt="Home renovation project by Marty Mar Construction in Bend, Oregon" width="500" height="400" loading="lazy">
        </div>
        <div class="sidebar-stats">
          <div class="sidebar-stat">
            <div class="sidebar-stat__number" data-target="<?php echo $yearsInBusiness; ?>">0</div>
            <div class="sidebar-stat__text">Years remodeling homes in Central Oregon</div>
          </div>
          <div class="sidebar-stat">
            <div class="sidebar-stat__number">6</div>
            <div class="sidebar-stat__text">Cities served across Deschutes &amp; Crook counties</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ SCOPE ════════ -->
<section class="scope-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true"><polygon points="0,0 1440,50 1440,0"/></svg>
  </div>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Scope Options</span>
      <h2>How Much Does a Home Remodel <span class="text-accent">Cost in Bend</span>?</h2>
      <p class="answer-block">Home remodeling costs in the Bend area range from $15,000 for cosmetic updates to $400,000+ for whole-home renovations. The three scope levels below cover most projects we build — each includes a detailed written estimate before any work begins.</p>
    </div>
    <div class="scope-grid">
      <div class="scope-card card-tint-1 reveal-up reveal-delay-1">
        <h3>Cosmetic Refresh</h3>
        <div class="scope-range">$15K – $40K</div>
        <p>Surface-level updates that transform the look without moving walls.</p>
        <ul>
          <li>Paint, flooring, lighting</li>
          <li>Fixture and hardware swaps</li>
          <li>Cabinet refinishing</li>
          <li>2-4 week timeline</li>
        </ul>
      </div>
      <div class="scope-card card-tint-2 reveal-up reveal-delay-2">
        <h3>Mid-Range Renovation</h3>
        <div class="scope-range">$50K – $150K</div>
        <p>Layout changes, new finishes, and system upgrades in targeted rooms.</p>
        <ul>
          <li>Wall removal or reconfiguration</li>
          <li>New cabinetry and countertops</li>
          <li>Plumbing and electrical updates</li>
          <li>6-12 week timeline</li>
        </ul>
      </div>
      <div class="scope-card card-tint-3 reveal-up reveal-delay-3">
        <h3>Whole-Home Transformation</h3>
        <div class="scope-range">$150K – $400K+</div>
        <p>Complete gut-and-rebuild with structural changes and full system replacement.</p>
        <ul>
          <li>Floor plan reconfiguration</li>
          <li>New HVAC, plumbing, electrical</li>
          <li>Insulation and energy upgrades</li>
          <li>4-8 month timeline</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true"><path d="M0,50 L1440,50 L1440,0 Q720,60 0,0 Z"/></svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ PROCESS ════════ -->
<section class="process-section">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Our Process</span>
      <h2>How Does the Remodeling <span class="text-accent">Process Work</span> With Marty Mar?</h2>
      <p class="answer-block">Our remodeling process follows four stages: scope assessment, design and permitting, demolition and construction, and final finishes with walkthrough. You communicate directly with Marty at every stage — no rotating project managers, no phone trees.</p>
    </div>
    <div class="process-steps">
      <div class="step-item reveal-up reveal-delay-1">
        <h3>Scope &amp; Assessment</h3>
        <p>Walk your home, evaluate structure and systems, define the scope, and deliver a written estimate.</p>
      </div>
      <div class="step-item reveal-up reveal-delay-2">
        <h3>Design &amp; Permits</h3>
        <p>Finalize plans, select materials and finishes, pull permits through Deschutes County.</p>
      </div>
      <div class="step-item reveal-up reveal-delay-3">
        <h3>Demo &amp; Build</h3>
        <p>Controlled demolition, structural work, mechanical rough-ins, insulation, and drywall — inspected at every stage.</p>
      </div>
      <div class="step-item reveal-up reveal-delay-4">
        <h3>Finishes &amp; Walkthrough</h3>
        <p>Flooring, paint, fixtures, trim, final inspection, and a walkthrough to confirm every detail.</p>
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
      <h2>What Do Homeowners Ask About <span class="text-accent">Remodeling</span> in Bend?</h2>
      <p class="answer-block">Homeowners considering a remodel in Bend and Central Oregon typically ask about costs, timelines, living arrangements during construction, and structural changes. Below are the questions we hear most — with honest, direct answers.</p>
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
      <p class="answer-block">Beyond remodeling, Marty Mar Construction handles new home construction, room additions, kitchen and bathroom renovations, and custom deck building across Central Oregon. Every service includes licensed tradespeople and transparent pricing.</p>
    </div>
    <div class="related-grid">
      <?php
      $relatedBullets = [
          'new-home-construction'  => ['Custom floor plans for your lot', 'Foundation-to-finish oversight', 'Snow-load rated framing'],
          'home-additions'         => ['Seamless match to existing structure', 'Second-story expansions', 'ADU and garage conversions'],
          'bathroom-remodeling'    => ['Walk-in showers and soaking tubs', 'Custom tile and vanity work', 'Full gut or targeted upgrades'],
          'kitchen-remodeling'     => ['Custom cabinetry and countertops', 'Layout and structural changes', 'Lighting and appliance planning'],
          'deck-outdoor-structures'=> ['Composite and timber options', 'Engineered for Oregon snow loads', 'Pergolas, porches, and shade structures'],
      ];
      $related = array_filter($services, fn($s) => $s['slug'] !== 'remodeling-renovations');
      $related = array_values($related);
      $picked = [$related[0], $related[2], $related[4]];
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
    <span class="eyebrow-label" style="color: var(--color-accent);">Transform Your Home</span>
    <h2>How Do You Get a Free Remodeling Estimate?</h2>
    <p class="answer-block">Call <?php echo $phone; ?> or fill out our online form. We'll schedule a walkthrough of your home, discuss your vision and budget, and deliver a detailed written estimate — no cost, no obligation, no pressure.</p>
    <div style="display: flex; flex-wrap: wrap; gap: var(--space-md); justify-content: center;">
      <a href="/contact/" class="btn-primary"><i data-lucide="file-text" aria-hidden="true"></i> Request Free Estimate</a>
      <a href="tel:<?php echo $phonePlain; ?>" class="btn-secondary btn-secondary--light"><i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
