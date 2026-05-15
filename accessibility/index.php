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

$pageTitle       = 'Accessibility | ' . $siteName;
$pageDescription = 'Accessibility statement for ' . $siteName . ' — our commitment to WCAG 2.1 AA compliance and digital accessibility.';
$canonicalUrl    = $siteUrl . '/accessibility/';
$currentPage     = 'legal';
$cssVersion      = '5.0';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Accessibility Statement",
  "url": "<?php echo $siteUrl; ?>/accessibility/",
  "description": "<?php echo htmlspecialchars($pageDescription); ?>",
  "publisher": {
    "@type": "Organization",
    "name": "<?php echo htmlspecialchars($companyName); ?>"
  },
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
      { "@type": "ListItem", "position": 2, "name": "Accessibility", "item": "<?php echo $siteUrl; ?>/accessibility/" }
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
      <span aria-current="page">Accessibility</span>
    </nav>
    <h1>Accessibility Statement</h1>
  </div>
</section>

<section class="legal-content">
  <div class="content-narrow">
    <p class="legal-updated"><strong>Last Updated:</strong> <?php echo $lastUpdated; ?></p>

    <h2>Our Commitment</h2>
    <p><?php echo htmlspecialchars($companyName); ?> is committed to ensuring digital accessibility for people with disabilities. We continually work to improve the user experience of our website and aim to conform to the Web Content Accessibility Guidelines (WCAG) 2.1 Level AA standards.</p>

    <h2>Accessibility Features</h2>
    <p>We have implemented the following accessibility features on our website:</p>
    <ul>
      <li><strong>Semantic HTML5 structure</strong> — proper use of headings, landmarks, lists, and structural elements for screen reader compatibility</li>
      <li><strong>Skip-to-content link</strong> — allows keyboard users to bypass navigation and jump directly to main content</li>
      <li><strong>ARIA labels and landmarks</strong> — descriptive labels on interactive elements and ARIA landmarks for navigation regions</li>
      <li><strong>Full keyboard navigation</strong> — all interactive elements are operable via keyboard</li>
      <li><strong>Visible focus indicators</strong> — clear visual focus outlines on all interactive elements when navigating with a keyboard</li>
      <li><strong>WCAG AA color contrast</strong> — minimum 4.5:1 contrast ratio for body text and 3:1 for large text</li>
      <li><strong>Descriptive alt text</strong> — all informational images include descriptive alternative text</li>
      <li><strong>Responsive zoom up to 200%</strong> — content remains usable and readable when zoomed to 200%</li>
      <li><strong><code>prefers-reduced-motion</code> media query</strong> — animations are disabled or reduced for users who prefer reduced motion</li>
      <li><strong>Form labels associated with inputs</strong> — all form fields have programmatically associated labels</li>
      <li><strong>Error messages programmatically linked to fields</strong> — form validation errors are announced to assistive technology</li>
    </ul>

    <h2>Known Limitations</h2>
    <p>Despite our best efforts, some areas of the website may not be fully accessible:</p>
    <ul>
      <li><strong>Third-party content:</strong> Embedded content such as Google Maps may not fully conform to WCAG 2.1 AA standards. We are working with third-party providers to address these limitations.</li>
    </ul>

    <h2>Feedback</h2>
    <p>We welcome your feedback on the accessibility of our website. If you encounter accessibility barriers or have suggestions for improvement, please contact us:</p>
    <ul>
      <li>Email: <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a></li>
      <li>Phone: <a href="tel:<?php echo htmlspecialchars($companyPhone); ?>"><?php echo htmlspecialchars($companyPhone); ?></a></li>
    </ul>
    <p>We aim to respond to accessibility feedback within 5 business days.</p>

    <h2>Enforcement</h2>
    <p>We recognize your rights under the Americans with Disabilities Act (ADA), Section 508 of the Rehabilitation Act, and applicable state accessibility laws. If you believe that your rights have been violated, you may file a complaint with the appropriate enforcement agency or contact us directly so we can address your concerns.</p>

    <p style="margin-top: var(--space-2xl); padding: var(--space-md); background: var(--color-bg-alt); border-radius: var(--radius-md); font-size: 0.85rem; color: var(--color-gray);"><em>This Accessibility Statement is provided as a general template. We recommend reviewing this document with a licensed <?php echo htmlspecialchars($companyState); ?> attorney before publication.</em></p>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
