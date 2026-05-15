<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-Level Setup ──────────────────────────────────────────
$pageTitle       = 'Contact Marty Mar Construction | Free Estimate | Bend, OR';
$pageDescription = 'Contact Marty Mar Construction Inc for a free project estimate in Bend, Redmond, Sisters, and Central Oregon. Call ' . $phone . ' or fill out our online form. Licensed general contractor since ' . $yearEstablished . '.';
$canonicalUrl    = $siteUrl . '/contact/';
$ogImage         = $clientPhotos[0];
$currentPage     = 'contact';
$cssVersion      = '5.0';

// ── Schema Markup ─────────────────────────────────────────────
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Contact'],
]);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<!-- BreadcrumbList Schema -->
<script type="application/ld+json">
<?php echo $breadcrumbSchema; ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════
     CONTACT PAGE — Marty Mar Construction Inc
     Phase 5: About, Contact & Utility Pages
     ═══════════════════════════════════════════════════════════ -->

<style>
/* ── Contact Hero ───────────────────────────────────────────── */
.contact-hero {
  position: relative;
  min-height: 40vh;
  display: flex;
  align-items: center;
  background: var(--color-primary);
}

.contact-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 30% 50%, rgba(var(--color-accent-rgb), 0.08) 0%, transparent 60%);
  pointer-events: none;
}

.contact-hero .container {
  position: relative;
  z-index: 1;
  padding-top: calc(var(--navbar-height) + var(--space-3xl));
  padding-bottom: var(--space-3xl);
  max-width: 800px;
  text-align: center;
}

.contact-hero .eyebrow-label { color: var(--color-accent); }

.contact-hero h1 {
  color: #fff;
  margin-bottom: var(--space-md);
}

.contact-hero h1 .text-accent {
  color: var(--color-accent);
  font-family: var(--font-accent);
  font-size: 1.1em;
}

.contact-hero-subtitle {
  color: rgba(255, 255, 255, 0.75);
  font-size: 1.1rem;
  line-height: 1.7;
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

/* ── Contact Body ───────────────────────────────────────────── */
.contact-body {
  background: var(--color-bg);
}

.contact-grid {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-3xl);
  align-items: start;
}

/* ── Contact Form ───────────────────────────────────────────── */
.contact-form-wrap {
  background: var(--color-bg);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  box-shadow: var(--shadow-md);
}

.contact-form-wrap h2 {
  font-size: 1.5rem;
  margin-bottom: var(--space-xs);
}

.contact-form-wrap .form-tagline {
  color: var(--color-text-light);
  font-size: 0.95rem;
  margin-bottom: var(--space-xl);
}

.contact-form .form-row {
  margin-bottom: var(--space-md);
  position: relative;
}

.contact-form .form-label {
  display: block;
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-text);
  margin-bottom: var(--space-xs);
}

.contact-form input,
.contact-form select,
.contact-form textarea {
  width: 100%;
  padding: var(--space-md);
  background: var(--color-bg-alt);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  color: var(--color-text);
  font-size: 1rem;
  transition: border-color var(--transition-base), box-shadow var(--transition-base);
}

.contact-form input:focus,
.contact-form select:focus,
.contact-form textarea:focus {
  outline: none;
  border-color: var(--color-accent);
  box-shadow: 0 0 0 3px rgba(var(--color-accent-rgb), 0.15);
}

.contact-form textarea { resize: vertical; min-height: 120px; }
.contact-form select { cursor: pointer; }

.contact-form .btn-block {
  width: 100%;
  margin-top: var(--space-md);
  padding: 1rem;
  font-size: 1rem;
}

/* ── Consent Fieldset ───────────────────────────────────────── */
.form-consent-fieldset {
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  padding: var(--space-md) var(--space-lg);
  margin: var(--space-xl) 0 var(--space-md);
  background: var(--color-bg-alt);
}

.form-consent-legend {
  font-size: 0.8rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  padding: 0 var(--space-sm);
  color: var(--color-gray);
}

.form-consent-item {
  display: flex;
  align-items: flex-start;
  gap: 0.75rem;
  padding: 0.75rem 0;
  cursor: pointer;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.form-consent-item:last-child { border-bottom: none; }

.consent-checkbox {
  flex-shrink: 0;
  margin-top: 0.2rem;
  width: 18px;
  height: 18px;
  cursor: pointer;
}

.consent-label {
  font-size: 0.85rem;
  line-height: 1.5;
  color: var(--color-text);
}

.consent-label strong { font-weight: 600; }
.consent-label a { color: var(--color-accent); text-decoration: underline; }
.required-star { color: #c0392b; }
.form-consent-required .consent-label { font-weight: 500; }

/* ── Contact Info Sidebar ───────────────────────────────────── */
.contact-info-wrap {
  position: sticky;
  top: calc(var(--navbar-height) + var(--space-xl));
}

.contact-info-card {
  background: var(--color-bg-alt);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  margin-bottom: var(--space-xl);
}

.contact-info-card h3 {
  font-size: 1.2rem;
  margin-bottom: var(--space-lg);
}

.info-item {
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  padding: var(--space-md) 0;
  border-bottom: 1px solid var(--color-border);
}

.info-item:last-child { border-bottom: none; }

.info-icon {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  color: var(--color-accent);
}

.info-icon i, .info-icon svg { width: 20px; height: 20px; }

.info-item h4 {
  font-size: 0.9rem;
  margin-bottom: var(--space-xs);
}

.info-item p, .info-item a {
  font-size: 0.92rem;
  color: var(--color-text-light);
  line-height: 1.55;
}

.info-item a:hover { color: var(--color-accent); }

/* ── Map Placeholder ────────────────────────────────────────── */
.map-card {
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-md);
  background: var(--color-bg-alt);
  aspect-ratio: 16 / 10;
}

.map-card iframe {
  width: 100%;
  height: 100%;
  border: 0;
  display: block;
}

/* ── Contact CTA ────────────────────────────────────────────── */
.contact-cta {
  background: var(--color-primary);
  text-align: center;
  position: relative;
}

.contact-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 70% 50%, rgba(var(--color-accent-rgb), 0.1) 0%, transparent 60%);
  pointer-events: none;
}

.contact-cta .container {
  position: relative;
  z-index: 1;
  max-width: 700px;
}

.contact-cta h2 { color: #fff; margin-bottom: var(--space-md); }
.contact-cta p { color: rgba(255, 255, 255, 0.8); font-size: 1.1rem; line-height: 1.7; margin-bottom: var(--space-xl); }

/* ── Responsive ─────────────────────────────────────────────── */
@media (max-width: 960px) {
  .contact-grid {
    grid-template-columns: 1fr;
    gap: var(--space-2xl);
  }
  .contact-info-wrap { position: static; }
}

@media (max-width: 768px) {
  .contact-hero { min-height: 35vh; }
  .contact-hero .container {
    padding-top: calc(var(--navbar-height) + var(--space-2xl));
  }
  .contact-form-wrap { padding: var(--space-xl); }
}

@media (max-width: 600px) {
  .form-consent-fieldset { padding: 0.75rem var(--space-md); }
  .consent-label { font-size: 0.8rem; }
}
</style>


<!-- ════════════════════════════════════════════════════════════
     CONTACT HERO
     ════════════════════════════════════════════════════════════ -->
<section class="contact-hero hero">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">Contact</span>
    </nav>
    <span class="eyebrow-label">Get In Touch</span>
    <h1>Start Your <span class="text-accent">Project</span> Today</h1>
    <p class="contact-hero-subtitle">Call <?php echo $phone; ?> or fill out the form below for a free, no-obligation estimate on your next construction project in Central Oregon.</p>
  </div>

  <div class="section-divider section-divider--bottom">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" fill="var(--color-bg)" aria-hidden="true">
      <path d="M0,50 C360,0 1080,0 1440,50 L1440,50 L0,50 Z"/>
    </svg>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     CONTACT FORM + INFO
     ════════════════════════════════════════════════════════════ -->
<section class="contact-body">
  <div class="container">
    <div class="contact-grid">

      <!-- Left: Form -->
      <div class="contact-form-wrap reveal-up">
        <h2>Request a Free Estimate</h2>
        <p class="form-tagline">Tell us about your project. We respond within one business day.</p>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="contact-form">
          <!-- Honeypot -->
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <!-- Hidden tracking -->
          <input type="hidden" name="_next" value="/thank-you">
          <input type="hidden" name="_consent_version" value="v2.1">
          <input type="hidden" name="_consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

          <div class="form-row">
            <label class="form-label" for="contact-name">Your Name <span class="required-star">*</span></label>
            <input type="text" name="name" id="contact-name" placeholder="Full name" required>
          </div>
          <div class="form-row">
            <label class="form-label" for="contact-phone">Phone Number <span class="required-star">*</span></label>
            <input type="tel" name="phone" id="contact-phone" placeholder="(541) 555-0123" required>
          </div>
          <div class="form-row">
            <label class="form-label" for="contact-email">Email Address <span class="required-star">*</span></label>
            <input type="email" name="email" id="contact-email" placeholder="your@email.com" required>
          </div>
          <div class="form-row">
            <label class="form-label" for="contact-service">Service Needed</label>
            <select name="service" id="contact-service">
              <option value="">Select a service</option>
              <?php foreach ($services as $svc): ?>
              <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
              <?php endforeach; ?>
              <option value="Other">Other / Not Sure</option>
            </select>
          </div>
          <div class="form-row">
            <label class="form-label" for="contact-message">Project Details</label>
            <textarea name="message" id="contact-message" rows="5" placeholder="Tell us about your project — scope, timeline, budget range, or any questions you have."></textarea>
          </div>

          <!-- ═══ SEPARATE CONSENT CHECKBOXES (TCPA 2025/2026 + Texas TCPA) ═══ -->
          <fieldset class="form-consent-fieldset">
            <legend class="form-consent-legend">Communication Consent</legend>

            <label class="form-consent-item">
              <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label">
                <strong>Email updates (optional):</strong> I agree to receive emails from
                <?php echo htmlspecialchars($siteName); ?> about my inquiry, services, promotions, and news. I understand I can unsubscribe anytime via the link in any email
                or by emailing <?php echo htmlspecialchars($contactEmail); ?>. Message frequency varies.
              </span>
            </label>

            <label class="form-consent-item">
              <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label">
                <strong>SMS/Text messages (optional):</strong> I agree to receive text messages from
                <?php echo htmlspecialchars($siteName); ?> at the phone number I provided. Message types may include appointment reminders, service updates, and promotional
                offers. Message frequency varies. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help.
                <strong>Consent is not a condition of purchase.</strong>
              </span>
            </label>

            <label class="form-consent-item form-consent-required">
              <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
              <span class="consent-label">
                I have read and agree to the
                <a href="/privacy-policy/">Privacy Policy</a>
                and
                <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span>
              </span>
            </label>
          </fieldset>

          <button type="submit" class="btn-primary btn-block">
            <i data-lucide="send" aria-hidden="true"></i> Send My Request
          </button>
        </form>
      </div>

      <!-- Right: Contact Info -->
      <div class="contact-info-wrap">
        <div class="contact-info-card reveal-right">
          <h3>Contact Information</h3>

          <div class="info-item">
            <div class="info-icon"><i data-lucide="phone" aria-hidden="true"></i></div>
            <div>
              <h4>Call Us</h4>
              <a href="tel:<?php echo $phonePlain; ?>"><?php echo $phone; ?></a>
            </div>
          </div>

          <div class="info-item">
            <div class="info-icon"><i data-lucide="mail" aria-hidden="true"></i></div>
            <div>
              <h4>Email</h4>
              <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
            </div>
          </div>

          <div class="info-item">
            <div class="info-icon"><i data-lucide="map-pin" aria-hidden="true"></i></div>
            <div>
              <h4>Location</h4>
              <p><?php echo $address['city']; ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></p>
            </div>
          </div>

          <div class="info-item">
            <div class="info-icon"><i data-lucide="clock" aria-hidden="true"></i></div>
            <div>
              <h4>Business Hours</h4>
              <p>Mon – Fri: 7:00 AM – 5:00 PM<br>Sat – Sun: By Appointment</p>
            </div>
          </div>

          <div class="info-item">
            <div class="info-icon"><i data-lucide="map" aria-hidden="true"></i></div>
            <div>
              <h4>Service Area</h4>
              <p>Bend, Redmond, Sisters, Sunriver, La Pine, Prineville, and surrounding Central Oregon communities.</p>
            </div>
          </div>
        </div>

        <!-- Map -->
        <div class="map-card reveal-right">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d91498.6844!2d-121.4!3d44.058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54b8c0ffa5d3d251%3A0x1088e7acc720d1b4!2sBend%2C%20OR!5e0!3m2!1sen!2sus!4v1" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Marty Mar Construction service area — Bend, Oregon"></iframe>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     CLOSING CTA
     ════════════════════════════════════════════════════════════ -->
<section class="contact-cta">
  <div class="container reveal-up">
    <span class="eyebrow-label" style="color: var(--color-accent);">Prefer to Talk?</span>
    <h2>Call Us Directly at <?php echo $phone; ?></h2>
    <p>Our team is available Monday through Friday, 7 AM to 5 PM. Same-day callbacks on all inquiries received before 3 PM.</p>
    <a href="tel:<?php echo $phonePlain; ?>" class="btn-primary">
      <i data-lucide="phone" aria-hidden="true"></i> Call <?php echo $phone; ?>
    </a>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
