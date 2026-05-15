<?php
// ============================================================
// includes/functions.php — Marty Mar Construction Inc
// Page One Insights Build System — Helper Functions
// ============================================================

/**
 * Check if the current page matches the given page identifier.
 * Used for aria-current="page" on nav links.
 */
function isActivePage($page) {
    global $currentPage;
    return (isset($currentPage) && $currentPage === $page);
}

/**
 * Format a raw phone number for display: (541) 554-8181
 */
function formatPhone($phone) {
    $digits = preg_replace('/\D/', '', $phone);
    if (strlen($digits) === 10) {
        return '(' . substr($digits, 0, 3) . ') ' . substr($digits, 3, 3) . '-' . substr($digits, 6);
    }
    if (strlen($digits) === 11 && $digits[0] === '1') {
        return '(' . substr($digits, 1, 3) . ') ' . substr($digits, 4, 3) . '-' . substr($digits, 7);
    }
    return $phone;
}

/**
 * Generate a URL-safe slug from a service name.
 */
function getServiceSlug($name) {
    $slug = strtolower(trim($name));
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    return $slug;
}

/**
 * Generate a URL-safe slug from a city name + state.
 */
function getAreaSlug($city, $state = '') {
    $text = trim($city);
    if ($state) {
        $text .= ' ' . $state;
    }
    $slug = strtolower($text);
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    return $slug;
}

/**
 * Generate JSON-LD Service schema for an individual service page.
 */
function generateServiceSchema($service) {
    global $siteName, $siteUrl, $phone, $address;

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service['name'],
        'description' => $service['description'],
        'url' => $siteUrl . '/services/' . $service['slug'] . '/',
        'provider' => [
            '@type' => 'GeneralContractor',
            '@id' => $siteUrl . '/#organization',
            'name' => $siteName,
            'telephone' => $phone,
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => $address['city'],
            'addressRegion' => $address['state'],
        ],
    ];

    return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

/**
 * Generate JSON-LD FAQPage schema from an array of Q&A pairs.
 */
function generateFAQSchema($faqs) {
    $items = [];
    foreach ($faqs as $faq) {
        $items[] = [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a'],
            ],
        ];
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $items,
    ];

    return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

/**
 * Generate basic meta tags for a page.
 * Returns an HTML string of meta/link tags.
 */
function generateMetaTags($title, $description, $canonical) {
    $html  = '<title>' . htmlspecialchars($title) . '</title>' . "\n";
    $html .= '    <meta name="description" content="' . htmlspecialchars($description) . '">' . "\n";
    $html .= '    <link rel="canonical" href="' . htmlspecialchars($canonical) . '">' . "\n";
    return $html;
}

/**
 * Generate BreadcrumbList JSON-LD for inner pages.
 */
function generateBreadcrumbSchema($items) {
    global $siteUrl;
    $list = [];
    $position = 1;
    foreach ($items as $item) {
        $entry = [
            '@type' => 'ListItem',
            'position' => $position,
            'name' => $item['name'],
        ];
        if (isset($item['url'])) {
            $entry['item'] = $siteUrl . $item['url'];
        }
        $list[] = $entry;
        $position++;
    }

    return json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $list,
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}
