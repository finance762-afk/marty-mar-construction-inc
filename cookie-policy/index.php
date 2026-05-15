<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$companyName       = $siteName;
$companyEntityType = $entityType;
$companyState      = $stateOfFormation;
$companyEmail      = $contactEmail;
$companyPhone      = $contactPhone;
$companyAddress    = $businessAddress;
$lastUpdated       = 'May 15, 2026';

$pageTitle       = 'Cookie Policy | ' . $siteName;
$pageDescription = 'Cookie Policy for ' . $siteName . ' — what cookies we use and how to control them.';
$canonicalUrl    = $siteUrl . '/cookie-policy/';
$currentPage     = 'legal';
$cssVersion      = '5.0';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Cookie Policy",
  "url": "<?php echo $siteUrl; ?>/cookie-policy/",
  "description": "<?php echo htmlspecialchars($pageDescription); ?>",
  "publisher": {
    "@type": "Organization",
    "name": "<?php echo htmlspecialchars($companyName); ?>"
  },
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
      { "@type": "ListItem", "position": 2, "name": "Cookie Policy", "item": "<?php echo $siteUrl; ?>/cookie-policy/" }
    ]
  }
}
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<style>
.legal-hero {
  background: var(--color-primary);
  padding: calc(var(--navbar-height) + var(--space-3xl)) 0 var(--space-2xl);
  text-align: center;
  min-height: 40vh;
  display: flex;
  align-items: center;
}
.legal-hero h1 { color: #fff; margin-bottom: var(--space-sm); }
.legal-hero .breadcrumb {
  display: flex;
  gap: var(--space-sm);
  align-items: center;
  font-size: 0.85rem;
  color: rgba(255,255,255,0.6);
  margin-bottom: var(--space-xl);
  justify-content: center;
}
.legal-hero .breadcrumb a { color: rgba(255,255,255,0.7); }
.legal-hero .breadcrumb a:hover { color: var(--color-accent); }
.legal-hero .breadcrumb-sep { color: rgba(255,255,255,0.4); }

.legal-content { background: var(--color-bg); }
.legal-content .content-narrow h2 {
  font-size: 1.35rem;
  margin-top: var(--space-2xl);
  margin-bottom: var(--space-md);
  padding-bottom: var(--space-sm);
  border-bottom: 2px solid rgba(var(--color-accent-rgb), 0.2);
}
.legal-content .content-narrow h3 {
  font-size: 1.1rem;
  margin-top: var(--space-xl);
  margin-bottom: var(--space-sm);
}
.legal-content .content-narrow p {
  margin-bottom: var(--space-md);
  color: var(--color-text-light);
}
.legal-content .content-narrow ul {
  margin-bottom: var(--space-md);
  padding-left: var(--space-xl);
  list-style: disc;
}
.legal-content .content-narrow ul li {
  margin-bottom: var(--space-sm);
  color: var(--color-text-light);
  line-height: 1.65;
}
.legal-content .content-narrow a {
  color: var(--color-accent);
  text-decoration: underline;
}
.legal-updated {
  font-size: 0.9rem;
  color: var(--color-gray);
  margin-bottom: var(--space-xl);
  padding: var(--space-md);
  background: var(--color-bg-alt);
  border-radius: var(--radius-md);
}
.cookie-table {
  width: 100%;
  border-collapse: collapse;
  margin: var(--space-md) 0 var(--space-xl);
  font-size: 0.9rem;
}
.cookie-table th,
.cookie-table td {
  padding: var(--space-sm) var(--space-md);
  text-align: left;
  border-bottom: 1px solid var(--color-border);
  color: var(--color-text-light);
}
.cookie-table th {
  background: var(--color-bg-alt);
  font-weight: 700;
  color: var(--color-text);
  font-size: 0.85rem;
  text-transform: uppercase;
  letter-spacing: 0.04em;
}
.cookie-table tr:last-child td { border-bottom: none; }
</style>

<section class="legal-hero hero">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">Cookie Policy</span>
    </nav>
    <h1>Cookie Policy</h1>
  </div>
</section>

<section class="legal-content">
  <div class="content-narrow">
    <p class="legal-updated"><strong>Last Updated:</strong> <?php echo $lastUpdated; ?></p>

    <p><?php echo htmlspecialchars($companyName); ?> ("we," "us," or "our") uses cookies and similar technologies on our website. This Cookie Policy explains what cookies are, what cookies we use, and how you can control them.</p>

    <h2>What Are Cookies</h2>
    <p>Cookies are small text files stored on your device when you visit a website. They help websites remember your preferences and understand how you interact with the site.</p>

    <h2>Strictly Necessary Cookies</h2>
    <p>These cookies are essential for the website to function and cannot be disabled.</p>
    <table class="cookie-table">
      <thead>
        <tr><th>Cookie</th><th>Provider</th><th>Purpose</th><th>Duration</th></tr>
      </thead>
      <tbody>
        <tr><td>PHPSESSID</td><td>This website</td><td>PHP session management</td><td>Session</td></tr>
      </tbody>
    </table>

    <h2>Analytics Cookies</h2>
    <p>These cookies help us understand how visitors interact with our website by collecting anonymous usage data.</p>
    <table class="cookie-table">
      <thead>
        <tr><th>Cookie</th><th>Provider</th><th>Purpose</th><th>Duration</th></tr>
      </thead>
      <tbody>
        <tr><td>_ga</td><td>Google Analytics 4</td><td>Distinguishes unique users</td><td>2 years</td></tr>
        <tr><td>_ga_&lt;container-id&gt;</td><td>Google Analytics 4</td><td>Maintains session state</td><td>2 years</td></tr>
      </tbody>
    </table>
    <p>You can opt out of Google Analytics by installing the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analytics Opt-out Browser Add-on</a>.</p>

    <h2>Functional Cookies &amp; Third-Party Resources</h2>
    <p>The following third-party resources may set cookies or collect data to provide functionality on our website:</p>
    <table class="cookie-table">
      <thead>
        <tr><th>Resource</th><th>Provider</th><th>Purpose</th></tr>
      </thead>
      <tbody>
        <tr><td>Google Fonts (fonts.googleapis.com, fonts.gstatic.com)</td><td>Google LLC</td><td>Typography — loads web fonts for consistent display</td></tr>
        <tr><td>Google Maps (maps.googleapis.com)</td><td>Google LLC</td><td>Embedded map for location display</td></tr>
        <tr><td>Lucide Icons CDN (cdn.jsdelivr.net/npm/lucide)</td><td>jsDelivr / Lucide</td><td>Iconography — loads SVG icons</td></tr>
        <tr><td>Swiper CDN (cdn.jsdelivr.net/npm/swiper)</td><td>jsDelivr / Swiper</td><td>UI functionality — carousel/slider component</td></tr>
      </tbody>
    </table>

    <h2>How to Control Cookies</h2>
    <p>You can control and delete cookies through your browser settings. Most browsers allow you to:</p>
    <ul>
      <li>View what cookies are stored and delete them individually</li>
      <li>Block third-party cookies</li>
      <li>Block cookies from specific sites</li>
      <li>Block all cookies</li>
      <li>Delete all cookies when you close your browser</li>
    </ul>
    <p>Please note that blocking certain cookies may affect the functionality of our website.</p>

    <h2>Do Not Track / Global Privacy Control</h2>
    <p>We honor the Global Privacy Control (GPC) signal. When we detect a GPC signal from your browser, we treat it as a valid opt-out request for the sale or sharing of your personal information.</p>

    <h3 id="ccpa-cookie-rights">California Residents</h3>
    <p>For more information about your privacy rights under the CCPA/CPRA, including your right to opt out of the sale or sharing of personal information, please see our <a href="/privacy-policy/#ccpa-rights">Privacy Policy — California Residents section</a>.</p>

    <h2>Changes to This Cookie Policy</h2>
    <p>We may update this Cookie Policy from time to time. Changes will be posted on this page with an updated "Last Updated" date.</p>

    <h2>Contact Us</h2>
    <p>If you have questions about our use of cookies, contact us:</p>
    <ul>
      <li><strong><?php echo htmlspecialchars($companyName); ?></strong></li>
      <li>Email: <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a></li>
      <li>Phone: <a href="tel:<?php echo htmlspecialchars($companyPhone); ?>"><?php echo htmlspecialchars($companyPhone); ?></a></li>
    </ul>

    <p style="margin-top: var(--space-2xl); padding: var(--space-md); background: var(--color-bg-alt); border-radius: var(--radius-md); font-size: 0.85rem; color: var(--color-gray);"><em>This Cookie Policy is provided as a general template. We recommend reviewing this document with a licensed <?php echo htmlspecialchars($companyState); ?> attorney before publication.</em></p>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
