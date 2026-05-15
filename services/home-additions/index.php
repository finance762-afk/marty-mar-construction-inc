<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$currentService = null;
foreach ($services as $svc) {
    if ($svc['slug'] === 'home-additions') { $currentService = $svc; break; }
}

$pageTitle       = 'Home Additions Bend OR | Room Addition Contractor | ' . $siteName;
$pageDescription = 'Marty Mar Construction builds room additions, second-story expansions, and ADU conversions in Bend, Redmond, and Central Oregon. Licensed contractor since ' . $yearEstablished . '. Call ' . $phone . ' for a free estimate.';
$canonicalUrl    = $siteUrl . '/services/home-additions/';
$ogImage         = $currentService['image'];
$currentPage     = 'services';
$heroImagePreload = $currentService['image'];
$cssVersion      = '4.1';

// ── Page FAQs ─────────────────────────────────────────────────
$pageFaqs = [
    ['q' => 'How much does a home addition cost in Bend, Oregon?', 'a' => 'Home additions in Bend typically cost $200-$400+ per square foot depending on the scope, finishes, and structural complexity. A 400 sq ft bedroom addition generally runs $80,000-$160,000. We provide a detailed written estimate after assessing your home and project requirements.'],
    ['q' => 'Do I need a permit for a room addition in Deschutes County?', 'a' => 'Yes. Any structural addition in Deschutes County requires a building permit, plan review, and multiple inspections. Marty Mar Construction handles all permitting through the County or City of Bend, including structural engineering, setback calculations, and inspection coordination.'],
    ['q' => 'How long does a home addition take to build in Central Oregon?', 'a' => 'Most room additions in Bend take 8-16 weeks from permit approval to completion, depending on size and complexity. Second-story additions typically take 12-20 weeks. Winter weather at elevation can add 2-4 weeks to exterior phases — we plan for that upfront.'],
    ['q' => 'Can you match the addition to my existing home exterior?', 'a' => 'Yes — that is a core part of what we do. We match siding materials, rooflines, trim profiles, window styles, and paint colors so the addition looks like it was part of the original build. Inside, we match flooring, baseboards, and ceiling heights for a seamless transition.'],
    ['q' => 'What types of home additions do you build?', 'a' => 'We build single-room bedroom or office additions, second-story expansions, bump-outs for kitchens and bathrooms, garage conversions, attached ADUs (accessory dwelling units), and sunroom enclosures. Each project is designed to fit your home\'s footprint and Deschutes County zoning requirements.'],
];

// ── Schema Markup ─────────────────────────────────────────────
$serviceSchema    = generateServiceSchema($currentService);
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Services', 'url' => '/services/'],
    ['name' => 'Home Additions'],
]);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     HOME ADDITIONS — Service Page
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
  background: linear-gradient(145deg, rgba(var(--color-primary-rgb), 0.9) 0%, rgba(var(--color-primary-rgb), 0.65) 50%, rgba(var(--color-primary-rgb), 0.82) 100%);
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

.hero--service .breadcrumb a { color: rgba(255, 255, 255, 0.7); transition: color var(--transition-base); }
.hero--service .breadcrumb a:hover { color: var(--color-accent); }
.hero--service .breadcrumb-sep { margin: 0 var(--space-xs); }

.hero--service h1 { font-size: var(--fs-h1); color: #fff; margin-bottom: var(--space-md); line-height: 1.05; }

.hero--service .hero-answer {
  color: rgba(255, 255, 255, 0.85);
  font-size: 1.15rem;
  line-height: 1.7;
  max-width: 60ch;
  margin: 0 auto var(--space-xl);
}

.hero--service .hero-ctas { display: flex; flex-wrap: wrap; gap: var(--space-md); justify-content: center; }

.hero--service .hero-trust {
  display: flex; flex-wrap: wrap; justify-content: center; gap: var(--space-lg);
  margin-top: var(--space-xl); font-size: 0.85rem; color: rgba(255, 255, 255, 0.7);
}

.hero--service .hero-trust span { display: flex; align-items: center; gap: var(--space-xs); }
.hero--service .hero-trust i, .hero--service .hero-trust svg { width: 16px; height: 16px; color: var(--color-accent); }

/* ── Split Content Section ───────────────────────────────────── */
.service-split {
  background: var(--color-bg);
  position: relative;
}

.service-split .split-grid {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-3xl);
  align-items: center;
}

.service-split .split-grid--reverse {
  grid-template-columns: 0.9fr 1.1fr;
}

.service-split .split-grid--reverse .split-image { order: -1; }

.service-split .split-text h2 { margin-bottom: var(--space-md); }
.service-split .split-text .answer-block { font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--space-lg); }
.service-split .split-text p { margin-bottom: var(--space-lg); max-width: var(--content-width); line-height: 1.7; }

.split-image {
  border-radius: var(--radius-lg);
  overflow: hidden;
  position: relative;
}

.split-image img { width: 100%; height: auto; object-fit: cover; display: block; }

.split-image::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: var(--radius-lg);
  box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.06);
  pointer-events: none;
}

@media (max-width: 860px) {
  .service-split .split-grid,
  .service-split .split-grid--reverse { grid-template-columns: 1fr; gap: var(--space-xl); }
  .service-split .split-grid--reverse .split-image { order: 0; }
}

/* ── Addition Types Grid ─────────────────────────────────────── */
.types-section { background: var(--color-bg-alt); position: relative; }

.types-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
  max-width: 1000px;
  margin: 0 auto;
}

.type-card {
  background: var(--color-bg);
  border-radius: var(--radius-md);
  padding: var(--space-xl);
  text-align: center;
  box-shadow: var(--shadow-sm);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.type-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }

.type-card__icon {
  width: 56px; height: 56px; border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.1);
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-md);
  color: var(--color-accent);
}

.type-card__icon i, .type-card__icon svg { width: 24px; height: 24px; }
.type-card h3 { font-size: 1.05rem; margin-bottom: var(--space-sm); }
.type-card p { font-size: 0.9rem; color: var(--color-text-light); line-height: 1.6; margin: 0; }

@media (max-width: 768px) { .types-grid { grid-template-columns: 1fr; } }

/* ── Process Steps ───────────────────────────────────────────── */
.process-section { background: var(--color-bg); position: relative; }

.process-cards {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-lg);
}

.process-card {
  text-align: center;
  padding: var(--space-xl) var(--space-md);
  background: var(--color-bg-alt);
  border-radius: var(--radius-md);
  position: relative;
}

.process-card__num {
  font-family: var(--font-heading);
  font-size: 2.5rem;
  font-weight: 900;
  color: rgba(var(--color-accent-rgb), 0.15);
  line-height: 1;
  margin-bottom: var(--space-sm);
}

.process-card h3 { font-size: 1rem; margin-bottom: var(--space-sm); }
.process-card p { font-size: 0.88rem; color: var(--color-text-light); line-height: 1.6; margin: 0; }

@media (max-width: 860px) { .process-cards { grid-template-columns: 1fr 1fr; } }
@media (max-width: 500px) { .process-cards { grid-template-columns: 1fr; } }

/* ── FAQ Section ─────────────────────────────────────────────── */
.faq-section { background: var(--color-bg-alt); position: relative; }

.faq-list {
  max-width: 800px; margin: 0 auto;
  display: flex; flex-direction: column; gap: var(--space-md);
}

.faq-item {
  background: var(--color-bg); border-radius: var(--radius-md);
  padding: var(--space-xl); box-shadow: var(--shadow-sm);
  transition: box-shadow var(--transition-base);
}

.faq-item:hover { box-shadow: var(--shadow-md); }
.faq-item h3 { font-size: 1.1rem; margin-bottom: var(--space-sm); }
.faq-item .faq-answer { font-size: 0.95rem; line-height: 1.7; color: var(--color-text-light); }

/* ── Related Services ────────────────────────────────────────── */
.related-services { background: var(--color-bg); }
.related-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-xl); }
@media (max-width: 768px) { .related-grid { grid-template-columns: 1fr; } }

/* ── CTA Banner ──────────────────────────────────────────────── */
.service-cta {
  background: var(--color-primary); text-align: center; position: relative;
}
.service-cta::before {
  content: ''; position: absolute; inset: 0;
  background: radial-gradient(ellipse at 70% 50%, rgba(var(--color-accent-rgb), 0.1) 0%, transparent 60%);
  pointer-events: none;
}
.service-cta .container { position: relative; z-index: 1; max-width: 680px; }
.service-cta h2 { color: #fff; margin-bottom: var(--space-md); }
.service-cta .answer-block { color: rgba(255, 255, 255, 0.85); font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--space-xl); }

/* ── Section Dividers ────────────────────────────────────────── */
.section-divider svg { display: block; width: 100%; }
.section-divider--bottom { position: absolute; bottom: 0; left: 0; right: 0; }
.section-divider--top { position: absolute; top: 0; left: 0; right: 0; }

/* ── Floating Accent ─────────────────────────────────────────── */
.floating-accent {
  position: absolute; border-radius: 50%;
  background: rgba(var(--color-secondary-rgb), 0.04);
  pointer-events: none; z-index: 0;
}
.float-animate-slow { animation: floatSlow 8s ease-in-out infinite; }
@keyframes floatSlow {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-10px) rotate(2deg); }
}

.identity-sentence { font-weight: 600; color: var(--color-primary); }

@media (max-width: 480px) {
  .hero--service .container {
    padding-top: calc(var(--navbar-height) + var(--space-2xl));
    padding-bottom: var(--space-2xl);
  }
}
</style>


<!-- ════════════════════════════════════════════════════════════ HERO ════════ -->
<section class="hero hero--service">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a><span class="breadcrumb-sep" aria-hidden="true">/</span>
      <a href="/services/">Services</a><span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">Home Additions</span>
    </nav>
    <h1>Home Additions in <span class="text-accent">Bend, Oregon</span></h1>
    <p class="hero-answer"><?php echo htmlspecialchars($siteName); ?> designs and builds room additions, second-story expansions, and accessory dwelling units for homeowners across Bend, Redmond, Sisters, and Central Oregon. We match new construction to your existing home's materials, rooflines, and interior finishes — so the addition looks like it was always there.</p>
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


<!-- ════════════════════════════════════════════════════════════ DETAIL ════════ -->
<section class="service-split">
  <div class="floating-accent float-animate-slow" style="width: 250px; height: 250px; top: -60px; left: -80px;" aria-hidden="true"></div>
  <div class="container">
    <div class="split-grid">
      <div class="split-text reveal-up">
        <span class="eyebrow-label">Expand Your Space</span>
        <h2>What Types of <span class="text-accent">Home Additions</span> Does Marty Mar Build?</h2>
        <p class="answer-block">Marty Mar Construction builds bedroom additions, second-story expansions, bump-outs, garage conversions, attached ADUs, and sunroom enclosures throughout Bend and Central Oregon. Each addition is structurally integrated with your existing home and designed to meet current Deschutes County building codes.</p>

        <p class="identity-sentence"><?php echo htmlspecialchars($siteName); ?> is a licensed Oregon general contractor based in Bend, building room additions and home expansions across Central Oregon since <?php echo $yearEstablished; ?>.</p>

        <p>Adding square footage to an existing home in Bend demands more precision than building from scratch. Your new addition has to tie into the existing roof structure, match siding profiles that may no longer be standard stock, and connect to plumbing and electrical systems that were designed for a smaller footprint. Get any of that wrong and you end up with a visible seam — inside and out — that drops your home's value instead of raising it.</p>

        <p>We start every addition project with a structural assessment of your existing home. We evaluate foundation capacity, framing condition, roof tie-in angles, and utility routing before drawing a single line. That upfront work means fewer surprises during construction and a finished product that looks intentional, not bolted on.</p>

        <p>Last updated: <?php echo date('F Y'); ?></p>
      </div>
      <div class="split-image reveal-right">
        <img src="<?php echo htmlspecialchars($clientPhotos[0]); ?>" alt="Home addition construction project by Marty Mar Construction in Bend, Oregon" width="600" height="500" loading="lazy">
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ TYPES ════════ -->
<section class="types-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <polygon points="0,0 1440,50 1440,0"/>
    </svg>
  </div>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Addition Types</span>
      <h2>Which Addition Type Is Right for Your <span class="text-accent">Bend Home</span>?</h2>
      <p class="answer-block">The right addition type depends on your lot size, zoning setbacks, existing foundation, and how you plan to use the new space. Single-story additions are fastest and most affordable; second-story additions maximize square footage without expanding your footprint; ADUs create independent living quarters.</p>
    </div>
    <div class="types-grid">
      <div class="type-card card-tint-1 reveal-up reveal-delay-1">
        <div class="type-card__icon"><i data-lucide="bed" aria-hidden="true"></i></div>
        <h3>Room Additions</h3>
        <p>Bedrooms, offices, family rooms — ground-level expansions that tie into your existing foundation and roofline. 8-12 weeks typical.</p>
      </div>
      <div class="type-card card-tint-2 reveal-up reveal-delay-2">
        <div class="type-card__icon"><i data-lucide="layers" aria-hidden="true"></i></div>
        <h3>Second-Story Expansions</h3>
        <p>Add living space above without expanding your lot footprint. Requires structural reinforcement of existing framing and foundation.</p>
      </div>
      <div class="type-card card-tint-3 reveal-up reveal-delay-3">
        <div class="type-card__icon"><i data-lucide="house" aria-hidden="true"></i></div>
        <h3>ADUs &amp; Garage Conversions</h3>
        <p>Accessory dwelling units for rental income, aging parents, or home offices. Garage conversions are the most cost-effective option per square foot.</p>
      </div>
    </div>
  </div>
  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <path d="M0,50 L1440,50 L1440,0 Q720,60 0,0 Z"/>
    </svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ PROCESS ════════ -->
<section class="process-section">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Our Process</span>
      <h2>How Does the Home Addition <span class="text-accent">Process Work</span> in Bend?</h2>
      <p class="answer-block">Our home addition process follows four stages: structural assessment and design, permitting through Deschutes County, construction with weekly progress updates, and final inspection with walkthrough. Direct communication with Marty at every stage — no middlemen.</p>
    </div>
    <div class="process-cards">
      <div class="process-card reveal-up reveal-delay-1">
        <div class="process-card__num">01</div>
        <h3>Assessment &amp; Design</h3>
        <p>Evaluate your home's structure, foundation, and utilities. Review plans, confirm setbacks, and finalize the scope and budget.</p>
      </div>
      <div class="process-card reveal-up reveal-delay-2">
        <div class="process-card__num">02</div>
        <h3>Permits &amp; Engineering</h3>
        <p>Pull Deschutes County building permits, submit structural engineering, and coordinate plan review with the building department.</p>
      </div>
      <div class="process-card reveal-up reveal-delay-3">
        <div class="process-card__num">03</div>
        <h3>Construction</h3>
        <p>Foundation, framing, roofing, mechanical rough-ins, insulation, drywall, and exterior finish — with weekly progress updates.</p>
      </div>
      <div class="process-card reveal-up reveal-delay-4">
        <div class="process-card__num">04</div>
        <h3>Finish &amp; Inspection</h3>
        <p>Interior finishes, flooring, paint, fixtures, final county inspection, and a walkthrough to confirm everything meets your expectations.</p>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════ FAQ ════════ -->
<section class="faq-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <polygon points="0,50 720,0 1440,50"/>
    </svg>
  </div>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Common Questions</span>
      <h2>What Do Homeowners Ask About <span class="text-accent">Room Additions</span> in Bend?</h2>
      <p class="answer-block">Homeowners considering a room addition in Bend typically ask about costs, permits, timelines, and whether the addition will match their existing home. Below are the questions we hear most — with direct answers from our team.</p>
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
      <p class="answer-block">Beyond home additions, Marty Mar Construction handles new home construction, whole-home remodeling, kitchen and bathroom renovations, and custom deck building across Central Oregon. Every project includes direct communication and transparent pricing.</p>
    </div>
    <div class="related-grid">
      <?php
      $relatedBullets = [
          'new-home-construction'  => ['Custom floor plans for your lot', 'Foundation-to-finish oversight', 'Snow-load rated framing'],
          'remodeling-renovations' => ['Whole-home transformations', 'Structural and cosmetic work', 'On-schedule, on-budget delivery'],
          'bathroom-remodeling'    => ['Walk-in showers and soaking tubs', 'Custom tile and vanity work', 'Full gut or targeted upgrades'],
          'kitchen-remodeling'     => ['Custom cabinetry and countertops', 'Layout and structural changes', 'Lighting and appliance planning'],
          'deck-outdoor-structures'=> ['Composite and timber options', 'Engineered for Oregon snow loads', 'Pergolas, porches, and shade structures'],
      ];
      $related = array_filter($services, fn($s) => $s['slug'] !== 'home-additions');
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
    <span class="eyebrow-label" style="color: var(--color-accent);">Expand Your Home</span>
    <h2>How Do You Get a Free Home Addition Estimate?</h2>
    <p class="answer-block">Call <?php echo $phone; ?> or fill out our online form. We'll schedule a site visit to assess your home's structure, review your addition plans, and deliver a detailed written estimate — no cost, no obligation.</p>
    <div style="display: flex; flex-wrap: wrap; gap: var(--space-md); justify-content: center;">
      <a href="/contact/" class="btn-primary"><i data-lucide="file-text" aria-hidden="true"></i> Request Free Estimate</a>
      <a href="tel:<?php echo $phonePlain; ?>" class="btn-secondary btn-secondary--light"><i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
