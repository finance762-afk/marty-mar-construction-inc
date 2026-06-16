<?php
// ============================================================
// includes/head.php — Marty Mar Construction Inc
// Page One Insights Build System
// ============================================================
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// Defaults for page-level variables (set before including head.php)
$pageTitle       = $pageTitle       ?? $siteName . ' | General Contractor in ' . $address['city'] . ', ' . $address['state'];
$pageDescription = $pageDescription ?? $siteName . ' builds, remodels, and renovates homes across the Eugene area and Lane County. Licensed general contractor serving ' . $address['city'] . ', Springfield, Cottage Grove, and surrounding communities since ' . $yearEstablished . '.';
$canonicalUrl    = $canonicalUrl    ?? $siteUrl . '/';
$currentPage     = $currentPage     ?? 'home';
$noindex         = $noindex         ?? false;
$ogImage         = $ogImage         ?? $clientPhotos[0] ?? $logoUrl;
$heroImagePreload = $heroImagePreload ?? null;
$cssVersion      = $cssVersion      ?? '1.0';
$useSwiper       = $useSwiper       ?? false;
$useTilt         = $useTilt         ?? false;
$useTyped        = $useTyped        ?? false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary SEO -->
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>">
    <?php if ($noindex): ?>
    <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogImage); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName); ?>">
    <meta property="og:locale" content="en_US">

    <!-- Preconnect / DNS Prefetch -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://db.pageone.cloud">

    <!-- Google Fonts: Bricolage Grotesque (heading) + Source Sans 3 (body) + Caveat (accent) -->
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400..800&family=Source+Sans+3:wght@400..700&family=Caveat:wght@400;700&display=swap" rel="stylesheet">

    <!-- Hero Image Preload -->
    <?php if ($heroImagePreload): ?>
    <link rel="preload" as="image" href="<?php echo htmlspecialchars($heroImagePreload); ?>">
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo htmlspecialchars($faviconUrl); ?>">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>">

    <!-- Conditional CDN Libraries -->
    <?php if ($useSwiper): ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <?php endif; ?>

    <!-- Google Analytics (replace G-XXXXXXXXXX with actual ID post-launch) -->
    <?php if ($googleAnalyticsId && $googleAnalyticsId !== 'G-XXXXXXXXXX'): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars($googleAnalyticsId); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo htmlspecialchars($googleAnalyticsId); ?>');
    </script>
    <?php endif; ?>

    <!-- Google Search Console Verification -->
    <?php if (!empty($gscVerification)): ?>
    <meta name="google-site-verification" content="<?php echo htmlspecialchars($gscVerification); ?>">
    <?php endif; ?>

    <!-- LocalBusiness Schema (homepage only) -->
    <?php if ($currentPage === 'home'): ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "GeneralContractor",
      "@id": "<?php echo $siteUrl; ?>/#organization",
      "name": "<?php echo htmlspecialchars($siteName); ?>",
      "url": "<?php echo $siteUrl; ?>",
      "logo": "<?php echo htmlspecialchars($logoUrl); ?>",
      "image": "<?php echo htmlspecialchars($clientPhotos[0] ?? $logoUrl); ?>",
      "description": "<?php echo htmlspecialchars($siteName); ?> is a licensed general contractor serving <?php echo $address['city']; ?>, <?php echo $address['state']; ?>, and Lane County since <?php echo $yearEstablished; ?>. We specialize in new home construction, additions, remodeling, kitchen and bathroom renovations, and custom deck building.",
      "telephone": "<?php echo $phone; ?>",
      "email": "<?php echo $email; ?>",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "<?php echo $address['city']; ?>",
        "addressRegion": "<?php echo $address['state']; ?>",
        "postalCode": "<?php echo $address['zip']; ?>",
        "addressCountry": "US"
      },
      "areaServed": [
        <?php foreach ($serviceAreas as $i => $area): ?>
        {
          "@type": "City",
          "name": "<?php echo $area['city']; ?>",
          "addressRegion": "<?php echo $area['state']; ?>"
        }<?php echo ($i < count($serviceAreas) - 1) ? ',' : ''; ?>

        <?php endforeach; ?>
      ],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Construction Services",
        "itemListElement": [
          <?php foreach ($services as $i => $svc): ?>
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "<?php echo htmlspecialchars($svc['name']); ?>",
              "description": "<?php echo htmlspecialchars($svc['description']); ?>",
              "url": "<?php echo $siteUrl; ?>/services/<?php echo $svc['slug']; ?>/"
            }
          }<?php echo ($i < count($services) - 1) ? ',' : ''; ?>

          <?php endforeach; ?>
        ]
      },
      "foundingDate": "<?php echo $yearEstablished; ?>",
      "sameAs": [
        <?php
        $socialUrls = array_values(array_filter($socialLinks));
        foreach ($socialUrls as $i => $url):
        ?>
        "<?php echo htmlspecialchars($url); ?>"<?php echo ($i < count($socialUrls) - 1) ? ',' : ''; ?>

        <?php endforeach; ?>
      ],
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.9",
        "reviewCount": "47",
        "bestRating": "5"
      }
    }
    </script>
    <?php endif; ?>
</head>
<body>
