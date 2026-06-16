<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$pageTitle       = 'General Contractor in Eugene & Lane County, OR | ' . $siteName . ' Service Areas';
$pageDescription = $siteName . ' serves Eugene, Springfield, Cottage Grove, Junction City, Veneta, Creswell, and surrounding Lane County communities. Licensed general contractor providing new construction, remodeling, and additions since ' . $yearEstablished . '.';
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
    <h1>General Contractor in Eugene & <span class="text-accent">Lane County, Oregon</span></h1>
    <p class="sa-hero-subtitle"><?php echo htmlspecialchars($siteName); ?> is a licensed general contractor based in Eugene, Oregon, serving homeowners across the southern Willamette Valley with new construction, additions, remodeling, and specialty builds since <?php echo $yearEstablished; ?>.</p>

    <div class="sa-hero-badges">
      <span class="sa-hero-badge"><i data-lucide="map-pin" aria-hidden="true"></i> 6 Communities Served</span>
      <span class="sa-hero-badge"><i data-lucide="ruler" aria-hidden="true"></i> 30-Mile Radius</span>
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
        <h2>What Areas Does <?php echo htmlspecialchars($siteName); ?> Serve in <span class="text-accent">Lane County</span>?</h2>

        <div class="answer-block">
          <p><?php echo htmlspecialchars($siteName); ?> serves Eugene, Springfield, Cottage Grove, Junction City, Veneta, Creswell, and surrounding communities throughout Lane County. Most projects fall within a 30-mile radius of our Eugene home base, covering the southern Willamette Valley from the Coast Range foothills east to Springfield and the McKenzie River corridor.</p>
        </div>

        <p>The Willamette Valley's building landscape presents unique challenges that demand local expertise. Heavy annual rainfall, clay-rich valley soils, seismic considerations along the Cascadia Subduction Zone, and moisture management requirements that test every envelope and foundation. We've been building here since <?php echo $yearEstablished; ?> because we know the terrain, Lane County's permitting processes, and the engineering requirements that keep structures sound through wet Pacific Northwest winters.</p>
        <p>Whether you're building a custom home in Eugene's South Hills, adding a second story in Springfield's Thurston neighborhood, or remodeling a mid-century ranch in the River Road area, our crew works within the specific code requirements and climate demands of each community we serve.</p>
      </div>

      <div class="sa-answer-image reveal-right">
        <img src="<?php echo htmlspecialchars($clientPhotos[8]); ?>" alt="Marty Mar Construction home project in Eugene, Oregon" width="600" height="450" loading="lazy">
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
      <span class="section-subtitle">Across Lane County &amp; the Willamette Valley</span>
    </div>

    <div class="sa-areas-grid">

      <!-- Eugene (Primary) -->
      <div class="sa-area-card sa-area-card--primary card-tint-1 reveal-up reveal-delay-1">
        <span class="area-primary-tag"><i data-lucide="star" aria-hidden="true"></i> Home Base</span>
        <div class="sa-area-card-icon"><i data-lucide="building-2" aria-hidden="true"></i></div>
        <h3>Eugene, OR</h3>
        <span class="area-zip">97401 / 97402 / 97403 / 97404 / 97405</span>
        <p>Our home base and where the majority of our projects happen. From custom builds in the South Hills and Cal Young to kitchen remodels in the Friendly neighborhood and whole-home renovations in Whiteaker and River Road, we know every neighborhood, HOA requirement, and City of Eugene permit process.</p>
      </div>

      <!-- Springfield -->
      <div class="sa-area-card card-tint-2 reveal-up reveal-delay-2">
        <div class="sa-area-card-icon"><i data-lucide="home" aria-hidden="true"></i></div>
        <h3>Springfield, OR</h3>
        <span class="area-zip">97477 / 97478</span>
        <p>Directly east of Eugene across the Willamette River, Springfield is Lane County's second-largest city. We handle new home construction in the Gateway area, additions in Thurston, and full remodels throughout Springfield's established neighborhoods near the McKenzie River corridor.</p>
      </div>

      <!-- Cottage Grove -->
      <div class="sa-area-card card-tint-3 reveal-up reveal-delay-3">
        <div class="sa-area-card-icon"><i data-lucide="trees" aria-hidden="true"></i></div>
        <h3>Cottage Grove, OR</h3>
        <span class="area-zip">97424</span>
        <p>About 20 miles south of Eugene along I-5, Cottage Grove is known for its covered bridges and historic downtown. We build custom homes, ADUs, and additions that respect the town's character while meeting modern energy codes. The area's mix of older Craftsman homes and newer developments keeps our crews busy year-round.</p>
      </div>

      <!-- Junction City -->
      <div class="sa-area-card card-tint-1 reveal-up reveal-delay-1">
        <div class="sa-area-card-icon"><i data-lucide="landmark" aria-hidden="true"></i></div>
        <h3>Junction City, OR</h3>
        <span class="area-zip">97448</span>
        <p>North of Eugene along Highway 99, Junction City offers a small-town feel with easy access to the Eugene metro area. We handle new construction on the larger rural parcels surrounding town, farmhouse remodels, and residential additions for families drawn to Junction City's Scandinavian heritage community and quieter pace of life.</p>
      </div>

      <!-- Veneta -->
      <div class="sa-area-card card-tint-2 reveal-up reveal-delay-2">
        <div class="sa-area-card-icon"><i data-lucide="mountain" aria-hidden="true"></i></div>
        <h3>Veneta, OR</h3>
        <span class="area-zip">97487</span>
        <p>West of Eugene near the Fern Ridge Reservoir, Veneta attracts homeowners looking for more space at lower price points. We build new custom homes on acreage lots, manage Lane County rural permitting, and handle remodels in Veneta's growing residential areas near the Coast Range foothills.</p>
      </div>

      <!-- Creswell -->
      <div class="sa-area-card card-tint-3 reveal-up reveal-delay-3">
        <div class="sa-area-card-icon"><i data-lucide="tree-pine" aria-hidden="true"></i></div>
        <h3>Creswell, OR</h3>
        <span class="area-zip">97426</span>
        <p>Situated along I-5 between Eugene and Cottage Grove, Creswell is one of the fastest-growing small cities in Lane County. We build in both the newer subdivisions east of the freeway and the established neighborhoods near downtown, handling everything from ground-up construction to kitchen and bathroom remodels.</p>
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d180000!2d-123.0868!3d44.0521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54c119b0ac501919%3A0x57ec61894a43894d!2sEugene%2C%20OR!5e0!3m2!1sen!2sus!4v1" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Marty Mar Construction service area map — Eugene and Lane County, Oregon"></iframe>
      </div>

      <div class="sa-map-content reveal-right">
        <span class="eyebrow-label">Coverage Radius</span>
        <h2>Built for the <span class="text-accent">Willamette Valley's</span> Climate</h2>
        <p>Every structure we build is engineered for western Oregon's wet climate — moisture-managed wall assemblies, rain-screen siding details, proper drainage and foundation waterproofing on clay-rich valley soils, and energy-efficient envelopes designed for 45+ inches of annual rainfall. We build for this specific environment.</p>
        <p>Our 30-mile service radius from Eugene covers all of Lane County's population centers. If you're within driving distance of Eugene, we can take your project.</p>

        <div class="sa-radius-stat">
          <div class="sa-radius-number" data-target="30" data-suffix="+">30+<span>mile radius</span></div>
          <div class="sa-radius-text">From Eugene to Springfield, Cottage Grove to Junction City — we cover the full southern Willamette Valley building corridor. Projects outside our standard radius considered on a case-by-case basis for larger builds.</div>
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
    <h2>Building in the Eugene Area? Let's Talk.</h2>
    <p>Whether you're in Eugene, Springfield, Cottage Grove, or anywhere within our 30-mile radius, <?php echo htmlspecialchars($siteName); ?> delivers the same hands-on project management, transparent pricing, and climate-smart construction on every build. Call <?php echo $phone; ?> or request your free estimate.</p>
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
