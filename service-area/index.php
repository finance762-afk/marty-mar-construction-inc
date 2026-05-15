<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$pageTitle       = 'General Contractor in Bend & Central Oregon | ' . $siteName . ' Service Areas';
$pageDescription = $siteName . ' serves Bend, Redmond, Sisters, Sunriver, La Pine, Prineville, and surrounding Central Oregon communities. Licensed general contractor providing new construction, remodeling, and additions since ' . $yearEstablished . '.';
$canonicalUrl    = $siteUrl . '/service-area/';
$ogImage         = $clientPhotos[8];
$currentPage     = 'service-area';
$heroImagePreload = $clientPhotos[16];
$cssVersion      = '5.0';

// ── Schema Markup ─────────────────────────────────────────────
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Service Area'],
]);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<!-- BreadcrumbList Schema -->
<script type="application/ld+json">
<?php echo $breadcrumbSchema; ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     SERVICE AREA PAGE — Marty Mar Construction Inc
     Phase 6: Service Area Page
     ═══════════════════════════════════════════════════════════ -->

<style>
/* ── Service Area Hero ─────────────────────────────────────── */
.sa-hero {
  position: relative;
  min-height: 55vh;
  display: flex;
  align-items: center;
  background: var(--color-primary);
  overflow: hidden;
}

.sa-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url('<?php echo htmlspecialchars($heroImagePreload); ?>') center/cover no-repeat;
  z-index: 0;
}

.sa-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(160deg, rgba(var(--color-primary-rgb), 0.92) 0%, rgba(var(--color-primary-rgb), 0.7) 45%, rgba(var(--color-secondary-rgb), 0.85) 100%);
  z-index: 1;
}

.sa-hero .container {
  position: relative;
  z-index: 2;
  padding-top: calc(var(--navbar-height) + var(--space-3xl));
  padding-bottom: var(--space-3xl);
  max-width: 850px;
  text-align: center;
}

.sa-hero .eyebrow-label { color: var(--color-accent); }

.sa-hero h1 {
  color: #fff;
  margin-bottom: var(--space-md);
  text-wrap: balance;
}

.sa-hero h1 .text-accent {
  color: var(--color-accent);
  font-family: var(--font-accent);
  font-size: 1.1em;
}

.sa-hero-subtitle {
  color: rgba(255, 255, 255, 0.8);
  font-size: 1.15rem;
  line-height: 1.7;
  max-width: 62ch;
  margin: 0 auto;
}

.sa-hero-badges {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-sm);
  justify-content: center;
  margin-top: var(--space-xl);
}

.sa-hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(6px);
  border: 1px solid rgba(255, 255, 255, 0.15);
  padding: 0.45rem 1rem;
  border-radius: 100px;
  font-size: 0.85rem;
  color: rgba(255, 255, 255, 0.9);
}

.sa-hero-badge i, .sa-hero-badge svg {
  width: 16px;
  height: 16px;
  color: var(--color-accent);
}

/* ── Breadcrumb ────────────────────────────────────────────── */
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

/* ── Answer Block ──────────────────────────────────────────── */
.sa-answer-section {
  background: var(--color-bg);
  position: relative;
}

.sa-answer-section .section-number {
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

.sa-answer-grid {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr;
  gap: var(--space-3xl);
  align-items: start;
}

.sa-answer-content h2 {
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}

.sa-answer-content h2 .text-accent {
  color: var(--color-accent);
  font-family: var(--font-accent);
  font-size: 1.1em;
}

.sa-answer-content .answer-block {
  background: var(--color-card-tint-1);
  border-left: 4px solid var(--color-accent);
  border-radius: var(--radius-md);
  padding: var(--space-lg) var(--space-xl);
  margin-bottom: var(--space-xl);
}

.sa-answer-content .answer-block p {
  color: var(--color-text);
  font-size: 1.05rem;
  line-height: 1.7;
}

.sa-answer-content > p {
  color: var(--color-text-light);
  line-height: 1.75;
  margin-bottom: var(--space-lg);
  max-width: 58ch;
}

.sa-answer-image {
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
  position: relative;
}

.sa-answer-image::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: var(--radius-xl);
  box-shadow: inset 0 0 30px rgba(0, 0, 0, 0.08);
  pointer-events: none;
}

.sa-answer-image img {
  width: 100%;
  height: auto;
  display: block;
}

/* ── Areas Grid ────────────────────────────────────────────── */
.sa-areas-section {
  background: var(--color-bg-alt);
  position: relative;
}

.sa-areas-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-xl);
  margin-top: var(--space-2xl);
}

.sa-area-card {
  border-radius: var(--radius-lg);
  padding: var(--space-2xl) var(--space-xl);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  position: relative;
  overflow: hidden;
}

.sa-area-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-lg);
}

.sa-area-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 4px;
  height: 100%;
  background: var(--color-accent);
  border-radius: 2px 0 0 2px;
  opacity: 0;
  transition: opacity var(--transition-base);
}

.sa-area-card:hover::before {
  opacity: 1;
}

.sa-area-card-icon {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: var(--space-lg);
  color: var(--color-accent);
}

.sa-area-card-icon i, .sa-area-card-icon svg {
  width: 24px;
  height: 24px;
}

.sa-area-card h3 {
  font-size: 1.25rem;
  margin-bottom: var(--space-xs);
}

.sa-area-card .area-zip {
  font-family: var(--font-accent);
  color: var(--color-accent);
  font-size: 0.95rem;
  margin-bottom: var(--space-md);
  display: block;
}

.sa-area-card p {
  font-size: 0.92rem;
  color: var(--color-text-light);
  line-height: 1.65;
}

.sa-area-card--primary {
  border: 2px solid rgba(var(--color-accent-rgb), 0.3);
}

.sa-area-card--primary .area-primary-tag {
  display: inline-flex;
  align-items: center;
  gap: 0.3rem;
  background: rgba(var(--color-accent-rgb), 0.1);
  color: var(--color-accent);
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  padding: 0.3rem 0.65rem;
  border-radius: 100px;
  margin-bottom: var(--space-md);
}

.sa-area-card--primary .area-primary-tag i,
.sa-area-card--primary .area-primary-tag svg {
  width: 12px;
  height: 12px;
}

/* ── Map Section ───────────────────────────────────────────── */
.sa-map-section {
  background: var(--color-bg);
  position: relative;
}

.sa-map-section .section-number {
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

.sa-map-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: start;
}

.sa-map-frame {
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
  aspect-ratio: 4 / 3;
  background: var(--color-bg-alt);
}

.sa-map-frame iframe {
  width: 100%;
  height: 100%;
  border: 0;
  display: block;
}

.sa-map-content h2 {
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}

.sa-map-content h2 .text-accent {
  color: var(--color-accent);
  font-family: var(--font-accent);
  font-size: 1.1em;
}

.sa-map-content p {
  color: var(--color-text-light);
  line-height: 1.75;
  margin-bottom: var(--space-lg);
  max-width: 55ch;
}

.sa-radius-stat {
  display: flex;
  align-items: center;
  gap: var(--space-lg);
  background: var(--color-card-tint-3);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  margin-top: var(--space-xl);
}

.sa-radius-number {
  font-family: var(--font-heading);
  font-weight: 900;
  font-size: 3rem;
  line-height: 1;
  color: var(--color-accent);
}

.sa-radius-number span {
  font-size: 1rem;
  display: block;
  font-weight: 600;
  color: var(--color-text-light);
}

.sa-radius-text {
  font-size: 0.95rem;
  color: var(--color-text);
  line-height: 1.55;
}

/* ── Services Highlight ────────────────────────────────────── */
.sa-services-section {
  background: var(--color-bg-dark);
  position: relative;
}

.sa-services-list {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-2xl);
}

.sa-service-item {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  padding: var(--space-lg);
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.07);
  border-radius: var(--radius-md);
  transition: background var(--transition-base), border-color var(--transition-base);
}

.sa-service-item:hover {
  background: rgba(255, 255, 255, 0.07);
  border-color: rgba(var(--color-accent-rgb), 0.3);
}

.sa-service-icon {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  color: var(--color-accent);
}

.sa-service-icon i, .sa-service-icon svg {
  width: 22px;
  height: 22px;
}

.sa-service-text h3 {
  font-size: 1rem;
  color: #fff;
  margin-bottom: 0.15rem;
}

.sa-service-text p {
  font-size: 0.85rem;
  color: rgba(255, 255, 255, 0.6);
  line-height: 1.45;
}

.sa-service-text a {
  color: var(--color-accent);
  font-size: 0.85rem;
  font-weight: 600;
  display: inline-block;
  margin-top: var(--space-xs);
  transition: color var(--transition-base);
}

.sa-service-text a::after { content: ' \2192'; }
.sa-service-text a:hover { color: #fff; }

/* ── CTA Section ───────────────────────────────────────────── */
.sa-cta {
  background: linear-gradient(135deg, var(--color-primary) 0%, rgba(var(--color-secondary-rgb), 0.9) 100%);
  text-align: center;
  position: relative;
}

.sa-cta::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  pointer-events: none;
}

.sa-cta .container {
  position: relative;
  z-index: 1;
  max-width: 700px;
}

.sa-cta h2 { color: #fff; margin-bottom: var(--space-md); text-wrap: balance; }
.sa-cta p { color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; line-height: 1.7; margin-bottom: var(--space-xl); }

/* ── Section Dividers ──────────────────────────────────────── */
.divider-angle svg, .divider-curve svg { display: block; width: 100%; height: auto; }

/* ── Responsive ────────────────────────────────────────────── */
@media (max-width: 1080px) {
  .sa-areas-grid { grid-template-columns: repeat(2, 1fr); }
  .sa-services-list { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 960px) {
  .sa-answer-grid {
    grid-template-columns: 1fr;
    gap: var(--space-2xl);
  }
  .sa-answer-image { order: -1; max-width: 560px; margin: 0 auto; }
  .sa-map-grid {
    grid-template-columns: 1fr;
    gap: var(--space-2xl);
  }
  .sa-map-frame { max-width: 600px; margin: 0 auto; width: 100%; }
}

@media (max-width: 768px) {
  .sa-hero { min-height: 45vh; }
  .sa-hero .container {
    padding-top: calc(var(--navbar-height) + var(--space-2xl));
    padding-bottom: var(--space-2xl);
  }
  .sa-areas-grid { grid-template-columns: 1fr; max-width: 480px; margin-left: auto; margin-right: auto; }
  .sa-services-list { grid-template-columns: 1fr; max-width: 480px; margin-left: auto; margin-right: auto; }
  .sa-radius-stat { flex-direction: column; text-align: center; }
}

@media (max-width: 600px) {
  .sa-hero-badges { flex-direction: column; align-items: center; }
}
</style>


<!-- ════════════════════════════════════════════════════════════
     SERVICE AREA HERO
     ════════════════════════════════════════════════════════════ -->
<section class="sa-hero hero">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">Service Area</span>
    </nav>
    <span class="eyebrow-label">Where We Work</span>
    <h1>General Contractor in Bend & <span class="text-accent">Surrounding Communities</span></h1>
    <p class="sa-hero-subtitle"><?php echo htmlspecialchars($siteName); ?> is a licensed general contractor based in Bend, Oregon, serving homeowners across Central Oregon with new construction, additions, remodeling, and specialty builds since <?php echo $yearEstablished; ?>.</p>

    <div class="sa-hero-badges">
      <span class="sa-hero-badge"><i data-lucide="map-pin" aria-hidden="true"></i> 6 Communities Served</span>
      <span class="sa-hero-badge"><i data-lucide="ruler" aria-hidden="true"></i> 40-Mile Radius</span>
      <span class="sa-hero-badge"><i data-lucide="calendar" aria-hidden="true"></i> Since <?php echo $yearEstablished; ?></span>
    </div>
  </div>

  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <path d="M0,60 L1440,60 L1440,0 C960,50 480,50 0,0 Z"/>
    </svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     ANSWER BLOCK — AEO Content
     ════════════════════════════════════════════════════════════ -->
<section class="sa-answer-section">
  <span class="section-number" aria-hidden="true">01</span>

  <div class="container">
    <div class="sa-answer-grid">
      <div class="sa-answer-content reveal-left">
        <span class="eyebrow-label">Service Areas</span>
        <h2>What Areas Does <?php echo htmlspecialchars($siteName); ?> Serve in <span class="text-accent">Central Oregon</span>?</h2>

        <div class="answer-block">
          <p><?php echo htmlspecialchars($siteName); ?> serves Bend, Redmond, Sisters, Sunriver, La Pine, Prineville, and surrounding communities throughout Deschutes and Crook Counties. Most projects fall within a 40-mile radius of our Bend home base, covering the full Central Oregon high-desert corridor from the Cascades foothills east to Prineville.</p>
        </div>

        <p>Central Oregon's building landscape is unlike anywhere else in the Pacific Northwest. Volcanic pumice soil, 250+ days of sunshine paired with heavy winter snow loads, and freeze-thaw cycles that test every foundation. We've been building here since <?php echo $yearEstablished; ?> because we know the terrain, the county permitting processes in Deschutes and Crook Counties, and the engineering requirements that keep structures standing through high-desert winters.</p>
        <p>Whether you're building a custom home in NorthWest Crossing, adding a second story in Redmond's Dry Canyon neighborhood, or remodeling a cabin near Sunriver, our crew works within the specific code requirements and climate demands of each community we serve.</p>
      </div>

      <div class="sa-answer-image reveal-right">
        <img src="<?php echo htmlspecialchars($clientPhotos[8]); ?>" alt="Marty Mar Construction home project in Central Oregon" width="600" height="450" loading="lazy">
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     SERVICE AREAS GRID
     ════════════════════════════════════════════════════════════ -->
<section class="sa-areas-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <polygon points="0,50 1440,0 1440,50"/>
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Our Coverage</span>
      <h2>Communities We <span class="text-accent">Build In</span></h2>
      <span class="section-subtitle">Across Deschutes &amp; Crook Counties</span>
    </div>

    <div class="sa-areas-grid">

      <!-- Bend (Primary) -->
      <div class="sa-area-card sa-area-card--primary card-tint-1 reveal-up reveal-delay-1">
        <span class="area-primary-tag"><i data-lucide="star" aria-hidden="true"></i> Home Base</span>
        <div class="sa-area-card-icon"><i data-lucide="building-2" aria-hidden="true"></i></div>
        <h3>Bend, OR</h3>
        <span class="area-zip">97701 / 97702 / 97703</span>
        <p>Our home base and where the majority of our projects happen. From custom builds in NorthWest Crossing and Broken Top to kitchen remodels in the Old Mill District and bathroom upgrades in southeast Bend, we know every neighborhood, HOA requirement, and City of Bend permit process.</p>
      </div>

      <!-- Redmond -->
      <div class="sa-area-card card-tint-2 reveal-up reveal-delay-2">
        <div class="sa-area-card-icon"><i data-lucide="home" aria-hidden="true"></i></div>
        <h3>Redmond, OR</h3>
        <span class="area-zip">97756</span>
        <p>Just 16 miles north of Bend, Redmond is one of Central Oregon's fastest-growing cities. We handle new home construction near Eagle Crest, additions in Dry Canyon Ridge, and full remodels throughout Redmond's established neighborhoods and newer developments alike.</p>
      </div>

      <!-- Sisters -->
      <div class="sa-area-card card-tint-3 reveal-up reveal-delay-3">
        <div class="sa-area-card-icon"><i data-lucide="mountain" aria-hidden="true"></i></div>
        <h3>Sisters, OR</h3>
        <span class="area-zip">97759</span>
        <p>Sisters sits at the base of the Cascades with strict architectural standards that preserve its Western-frontier character. We build custom homes, ADUs, and additions that meet Sisters' design review requirements while handling the area's heavier snow loads and higher elevation conditions.</p>
      </div>

      <!-- Sunriver -->
      <div class="sa-area-card card-tint-1 reveal-up reveal-delay-1">
        <div class="sa-area-card-icon"><i data-lucide="trees" aria-hidden="true"></i></div>
        <h3>Sunriver, OR</h3>
        <span class="area-zip">97707</span>
        <p>Sunriver's resort-community HOA has specific construction guidelines, setback requirements, and architectural review processes. We've navigated Sunriver Owners Association approvals on dozens of deck builds, cabin remodels, and room additions throughout the community.</p>
      </div>

      <!-- La Pine -->
      <div class="sa-area-card card-tint-2 reveal-up reveal-delay-2">
        <div class="sa-area-card-icon"><i data-lucide="tree-pine" aria-hidden="true"></i></div>
        <h3>La Pine, OR</h3>
        <span class="area-zip">97739</span>
        <p>South of Sunriver along Highway 97, La Pine offers larger lots and rural acreage that attract homeowners looking for space. We build new custom homes on 1–5 acre parcels, handle well-and-septic construction coordination, and manage Deschutes County rural permitting from start to finish.</p>
      </div>

      <!-- Prineville -->
      <div class="sa-area-card card-tint-3 reveal-up reveal-delay-3">
        <div class="sa-area-card-icon"><i data-lucide="landmark" aria-hidden="true"></i></div>
        <h3>Prineville, OR</h3>
        <span class="area-zip">97754</span>
        <p>Prineville is Central Oregon's original county seat, and its mix of historic homes and new subdivisions near the Crooked River creates demand for both renovation expertise and new construction. We work within Crook County's permitting system and build to the area's specific seismic and climate requirements.</p>
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
     MAP + RADIUS INFO
     ════════════════════════════════════════════════════════════ -->
<section class="sa-map-section">
  <span class="section-number" aria-hidden="true">02</span>

  <div class="container">
    <div class="sa-map-grid">
      <div class="sa-map-frame reveal-left">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d364000!2d-121.55!3d44.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54b8c0ffa5d3d251%3A0x1088e7acc720d1b4!2sBend%2C%20OR!5e0!3m2!1sen!2sus!4v1" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Marty Mar Construction service area map — Central Oregon"></iframe>
      </div>

      <div class="sa-map-content reveal-right">
        <span class="eyebrow-label">Coverage Radius</span>
        <h2>Built for <span class="text-accent">Central Oregon's</span> Climate</h2>
        <p>Every structure we build is engineered for the high desert — volcanic pumice soil foundations, snow-load-rated framing, UV-resistant exterior finishes, and freeze-cycle-proof concrete work. We don't import plans from the valley. We build for this specific environment.</p>
        <p>Our 40-mile service radius from Bend covers all of Deschutes County and the western half of Crook County. If you're within driving distance of Bend, we can take your project.</p>

        <div class="sa-radius-stat">
          <div class="sa-radius-number" data-target="40" data-suffix="+">40+<span>mile radius</span></div>
          <div class="sa-radius-text">From Bend to Sisters, Sunriver to Prineville — we cover the full Central Oregon building corridor. Projects outside our standard radius considered on a case-by-case basis for larger builds.</div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     SERVICES AVAILABLE IN ALL AREAS
     ════════════════════════════════════════════════════════════ -->
<section class="sa-services-section">
  <div class="section-divider section-divider--top">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <path d="M0,0 L1440,0 L1440,50 C960,0 480,0 0,50 Z"/>
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label" style="color: var(--color-accent);">Available Everywhere We Serve</span>
      <h2 style="color: #fff;">Full Construction Services Across <span class="text-accent">Every Community</span></h2>
      <span class="section-subtitle" style="color: var(--color-accent);">Same crew, same standards, every jobsite</span>
    </div>

    <div class="sa-services-list">
      <?php foreach ($services as $i => $svc): ?>
      <div class="sa-service-item reveal-up reveal-delay-<?php echo ($i % 3) + 1; ?>">
        <div class="sa-service-icon"><i data-lucide="<?php echo htmlspecialchars($svc['icon']); ?>" aria-hidden="true"></i></div>
        <div class="sa-service-text">
          <h3><?php echo htmlspecialchars($svc['name']); ?></h3>
          <p><?php echo htmlspecialchars(substr($svc['description'], 0, 80)); ?>...</p>
          <a href="/services/<?php echo htmlspecialchars($svc['slug']); ?>/">Learn more</a>
        </div>
      </div>
      <?php endforeach; ?>
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
<section class="sa-cta">
  <div class="container reveal-up">
    <span class="eyebrow-label" style="color: var(--color-accent);">Start Your Project</span>
    <h2>Building in Central Oregon? Let's Talk.</h2>
    <p>Whether you're in Bend, Redmond, Sisters, or anywhere within our 40-mile radius, <?php echo htmlspecialchars($siteName); ?> delivers the same hands-on project management, transparent pricing, and climate-smart construction on every build. Call <?php echo $phone; ?> or request your free estimate.</p>
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

<!-- Last Updated: <?php echo date('F Y'); ?> -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
