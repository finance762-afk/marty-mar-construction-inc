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

$pageTitle       = 'Terms of Service | ' . $siteName;
$pageDescription = 'Terms of Service for ' . $siteName . ' — terms governing your use of our website and services in Eugene, OR and the Eugene area.';
$canonicalUrl    = $siteUrl . '/terms/';
$currentPage     = 'legal';
$cssVersion      = '5.0';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Terms of Service",
  "url": "<?php echo $siteUrl; ?>/terms/",
  "description": "<?php echo htmlspecialchars($pageDescription); ?>",
  "publisher": {
    "@type": "Organization",
    "name": "<?php echo htmlspecialchars($companyName); ?>"
  },
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
      { "@type": "ListItem", "position": 2, "name": "Terms of Service", "item": "<?php echo $siteUrl; ?>/terms/" }
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
</style>

<section class="legal-hero hero">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span aria-current="page">Terms of Service</span>
    </nav>
    <h1>Terms of Service</h1>
  </div>
</section>

<section class="legal-content">
  <div class="content-narrow">
    <p class="legal-updated"><strong>Last Updated:</strong> <?php echo $lastUpdated; ?></p>

    <h2>Acceptance of Terms</h2>
    <p>These Terms of Service ("Terms") constitute a legally binding agreement between you ("you" or "user") and <?php echo htmlspecialchars($companyName); ?>, a <?php echo htmlspecialchars($companyEntityType); ?> formed in the State of <?php echo htmlspecialchars($companyState); ?> ("Company," "we," "us," or "our"). By accessing or using our website, you agree to be bound by these Terms. If you do not agree, do not use our website.</p>

    <h2>Description of Services</h2>
    <p><?php echo htmlspecialchars($companyName); ?> provides professional construction services as described on this website, including new home construction, home additions, remodeling, kitchen and bathroom renovations, and deck building in the Eugene area. The specific services available, service areas, and pricing are subject to change without notice. Descriptions of services on this website are for informational purposes and do not constitute a binding offer.</p>

    <h2>Use of This Website</h2>
    <p>You agree to use this website only for lawful purposes. You may not:</p>
    <ul>
      <li>Use the website in any way that violates applicable federal, state, or local laws</li>
      <li>Attempt to gain unauthorized access to any portion of the website or its systems</li>
      <li>Use automated tools to scrape, crawl, or extract data from the website without written permission</li>
      <li>Transmit any material that is defamatory, obscene, threatening, or that constitutes harassment</li>
      <li>Interfere with or disrupt the website's infrastructure or other users' access</li>
    </ul>

    <h2>Intellectual Property</h2>
    <p>All content on this website — including text, graphics, logos, images, photographs, and software — is the property of <?php echo htmlspecialchars($companyName); ?> or its content suppliers and is protected by United States and international copyright, trademark, and other intellectual property laws. You may not reproduce, distribute, modify, or create derivative works from any content without our prior written consent.</p>

    <h2>User Submissions</h2>
    <p>When you submit information through our contact forms, request-a-quote forms, or review platforms, you represent that:</p>
    <ul>
      <li>The information you provide is accurate and complete</li>
      <li>You have the right to submit the information</li>
      <li>Your submission does not violate any third-party rights</li>
    </ul>
    <p>By submitting content, you grant <?php echo htmlspecialchars($companyName); ?> a non-exclusive, royalty-free, perpetual license to use, display, and reproduce such content in connection with our business operations, including marketing and testimonials.</p>

    <h2>Estimates and Pricing</h2>
    <p>Any estimates, quotes, or pricing information provided through this website or in response to inquiries are for informational purposes only and do not constitute binding offers. Final pricing is determined after a site assessment, inspection, or detailed consultation and may differ from initial estimates based on actual conditions, scope of work, materials required, and other factors.</p>

    <h2>Service Disclaimers</h2>
    <p>This website and all services are provided on an "AS IS" and "AS AVAILABLE" basis without warranties of any kind, either express or implied, including but not limited to implied warranties of merchantability, fitness for a particular purpose, and non-infringement. We do not warrant that the website will be uninterrupted, error-free, or free of viruses or other harmful components.</p>

    <h2>Limitation of Liability</h2>
    <p>To the fullest extent permitted by applicable law, <?php echo htmlspecialchars($companyName); ?> shall not be liable for any indirect, incidental, special, consequential, or punitive damages, including but not limited to loss of profits, data, or use, arising out of or in connection with your use of this website or our services. Our total liability for any claim arising out of or relating to these Terms or our services shall not exceed the total amount you have paid to us in the twelve (12) months preceding the claim. Some states do not allow the exclusion or limitation of certain damages, so the above limitations may not apply to you.</p>

    <h2>Indemnification</h2>
    <p>You agree to indemnify, defend, and hold harmless <?php echo htmlspecialchars($companyName); ?>, its officers, directors, employees, agents, and affiliates from and against any claims, liabilities, damages, judgments, awards, losses, costs, or expenses (including reasonable attorneys' fees) arising out of or relating to your violation of these Terms or your use of the website.</p>

    <h2>Governing Law</h2>
    <p>These Terms are governed by the laws of the State of <?php echo htmlspecialchars($companyState); ?>, without regard to conflict of laws principles. Any dispute arising out of or relating to these Terms shall be resolved in the state or federal courts located in <?php echo htmlspecialchars($companyState); ?>.</p>

    <h2>Changes to These Terms</h2>
    <p>We reserve the right to update or modify these Terms at any time. Changes will be posted on this page with an updated "Last Updated" date. Your continued use of the website after changes constitutes acceptance of the revised Terms.</p>

    <h2>Severability</h2>
    <p>If any provision of these Terms is held to be invalid or unenforceable, the remaining provisions shall continue in full force and effect.</p>

    <h2>Entire Agreement</h2>
    <p>These Terms, together with our <a href="/privacy-policy/">Privacy Policy</a> and <a href="/cookie-policy/">Cookie Policy</a>, constitute the entire agreement between you and <?php echo htmlspecialchars($companyName); ?> regarding your use of this website.</p>

    <h2>Contact Us</h2>
    <p>If you have questions about these Terms of Service, contact us:</p>
    <ul>
      <li><strong><?php echo htmlspecialchars($companyName); ?></strong></li>
      <li>Email: <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a></li>
      <li>Phone: <a href="tel:<?php echo htmlspecialchars($companyPhone); ?>"><?php echo htmlspecialchars($companyPhone); ?></a></li>
      <li>Address: <?php echo $companyAddress['city']; ?>, <?php echo $companyAddress['state']; ?> <?php echo $companyAddress['zip']; ?></li>
    </ul>

    <p style="margin-top: var(--space-2xl); padding: var(--space-md); background: var(--color-bg-alt); border-radius: var(--radius-md); font-size: 0.85rem; color: var(--color-gray);"><em>These Terms of Service are provided as a general template. We recommend reviewing this document with a licensed <?php echo htmlspecialchars($companyState); ?> attorney before publication.</em></p>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
