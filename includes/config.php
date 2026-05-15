<?php
// ============================================================
// includes/config.php — Marty Mar Construction Inc
// Page One Insights Build System — Standard Tier
// ============================================================

// ── Identity ─────────────────────────────────────────────────
$slug        = 'marty-mar-construction-inc';
$clientSlug  = $slug;
$siteName    = 'Marty Mar Construction Inc';
$tagline     = 'Central Oregon\'s General Contractor Since 2007';
$ownerName   = 'Marty Mar';
$industry    = 'general_contractor';
$tier        = 'standard';

// ── Contact ───────────────────────────────────────────────────
$phone          = '(541) 554-8181';
$phonePlain     = '5415548181';
$phoneSecondary = '';
$email          = 'info@martymarconstructioninc.com';
$contactEmail   = $email;
$contactPhone   = $phone;

// ── Address ───────────────────────────────────────────────────
$address = [
    'street' => '',
    'city'   => 'Bend',
    'state'  => 'OR',
    'zip'    => '97701',
];
$businessAddress = $address;

// ── Domain & URLs ─────────────────────────────────────────────
// No production_domain — using preview URL
$domain  = 'marty-mar-construction-inc.pageone.cloud';
$siteUrl = 'https://' . $domain;
// $canonicalUrl is NOT set here — each page sets its own before including head.php

// ── Analytics & Verification ──────────────────────────────────
$googleAnalyticsId = 'G-XXXXXXXXXX';
$gscVerification   = '';

// ── Business Details ──────────────────────────────────────────
$yearEstablished = 2007;
$yearsInBusiness = intval(date('Y')) - 2007;
$entityType       = 'Corporation';
$stateOfFormation = 'Oregon';

// ── Logo ──────────────────────────────────────────────────────
$logoUrl    = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/marty-mar-construction-inc/logo/1778860821756-41iwq3-MARTY_LOGO.jpg';
$faviconUrl = '/assets/images/favicon.png';

// ── Brand Colors ──────────────────────────────────────────────
// Logo is black & white circular badge — palette: charcoal primary, safety orange accent
$colors = [
    'primary'   => '#1c1f24',   // deep charcoal
    'secondary' => '#2d5016',   // forest green (Pacific NW)
    'accent'    => '#d96520',   // safety orange / craftsman amber
];

// ── SEO ───────────────────────────────────────────────────────
$primaryKeyword    = 'general contractor Bend OR';
$secondaryKeywords = [
    'construction company Bend Oregon',
    'general contractor Bend Oregon',
    'home builder Bend OR',
    'new home construction Bend OR',
    'home remodeling Bend Oregon',
    'bathroom remodel Bend OR',
    'kitchen remodeling Bend Oregon',
    'deck builder Bend OR',
    'home additions Bend Oregon',
    'contractor near Bend OR',
    'construction Redmond Oregon',
    'general contractor Central Oregon',
];

// ── Services ──────────────────────────────────────────────────
$services = [
    [
        'name'        => 'New Home Construction',
        'slug'        => 'new-home-construction',
        'description' => 'Full custom home construction from foundation to finish. We build new single-family homes across Central Oregon, managing every phase — framing, roofing, mechanical, and interior — with licensed tradespeople and hands-on oversight.',
        'keywords'    => [
            'new home construction Bend OR',
            'custom home builder Bend Oregon',
            'build new house Bend OR',
            'home builder near me Bend',
            'custom homes Central Oregon',
        ],
        'image'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/marty-mar-construction-inc/photos/1778860982357-ubm5do-641437517_122104619199262704_1682165859110000150_n.jpg',
        'icon'        => 'home',
    ],
    [
        'name'        => 'Home Additions',
        'slug'        => 'home-additions',
        'description' => 'Need more space? We design and build room additions, second-story expansions, and accessory structures that tie seamlessly into your existing home — matching materials, rooflines, and interior finishes.',
        'keywords'    => [
            'home additions Bend Oregon',
            'room addition contractor Bend OR',
            'second story addition Bend',
            'house expansion Central Oregon',
            'add bedroom Bend OR',
        ],
        'image'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/marty-mar-construction-inc/photos/1778860950545-7ze15j-639883447_122104619223262704_1584417455874598961_n.jpg',
        'icon'        => 'building-2',
    ],
    [
        'name'        => 'Remodeling & Renovations',
        'slug'        => 'remodeling-renovations',
        'description' => 'From single-room refreshes to whole-home transformations, our remodeling crew handles structural changes, finish work, flooring, and everything in between — on schedule and within your budget.',
        'keywords'    => [
            'home remodeling Bend Oregon',
            'home renovation contractor Bend OR',
            'remodeling company Bend Oregon',
            'house renovation Bend OR',
            'general remodeling Central Oregon',
        ],
        'image'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/marty-mar-construction-inc/photos/1778860960786-ahkw94-642320821_122105087187262704_8280704753595649872_n.jpg',
        'icon'        => 'hammer',
    ],
    [
        'name'        => 'Bathroom Remodeling',
        'slug'        => 'bathroom-remodeling',
        'description' => 'Transform your bathroom with custom tile work, walk-in showers, soaking tubs, floating vanities, and updated plumbing. We handle full gut-and-rebuild or targeted upgrades — master baths, guest baths, and powder rooms.',
        'keywords'    => [
            'bathroom remodel Bend OR',
            'bathroom renovation Bend Oregon',
            'tile shower remodel Bend OR',
            'master bath upgrade Bend',
            'bathroom contractor Central Oregon',
        ],
        'image'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/marty-mar-construction-inc/photos/1778860973717-n65yo0-629564984_122096303907262704_4092186127556615464_n.jpg',
        'icon'        => 'bath',
    ],
    [
        'name'        => 'Kitchen Remodeling',
        'slug'        => 'kitchen-remodeling',
        'description' => 'Update your kitchen with new cabinetry, countertops, appliance cutouts, lighting, and layout changes. Whether you want a cosmetic refresh or a full structural rebuild, we do it right the first time.',
        'keywords'    => [
            'kitchen remodel Bend OR',
            'kitchen renovation Bend Oregon',
            'custom kitchen Bend OR',
            'kitchen contractor Central Oregon',
            'cabinet installation Bend OR',
        ],
        'image'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/marty-mar-construction-inc/photos/1778860956266-b8llqh-678998195_122115100209262704_438394711220212323_n.jpg',
        'icon'        => 'utensils',
    ],
    [
        'name'        => 'Deck & Outdoor Structures',
        'slug'        => 'deck-outdoor-structures',
        'description' => 'Extend your living space outdoors with custom decks, covered porches, pergolas, and timber-frame structures built for Central Oregon\'s climate — engineered for snow loads, UV exposure, and year-round use.',
        'keywords'    => [
            'deck builder Bend OR',
            'deck construction Bend Oregon',
            'covered porch Bend OR',
            'pergola builder Central Oregon',
            'outdoor structure contractor Bend',
        ],
        'image'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/marty-mar-construction-inc/photos/1778860975667-mmvi02-630624886_122096307141262704_460531819733276418_n.jpg',
        'icon'        => 'layout-grid',
    ],
];

// ── Service Areas ─────────────────────────────────────────────
$serviceAreas = [
    [
        'city'    => 'Bend',
        'state'   => 'OR',
        'zip'     => '97701',
        'primary' => true,
        'slug'    => 'bend-or',
    ],
    [
        'city'    => 'Redmond',
        'state'   => 'OR',
        'zip'     => '97756',
        'primary' => false,
        'slug'    => 'redmond-or',
    ],
    [
        'city'    => 'Sisters',
        'state'   => 'OR',
        'zip'     => '97759',
        'primary' => false,
        'slug'    => 'sisters-or',
    ],
    [
        'city'    => 'Sunriver',
        'state'   => 'OR',
        'zip'     => '97707',
        'primary' => false,
        'slug'    => 'sunriver-or',
    ],
    [
        'city'    => 'La Pine',
        'state'   => 'OR',
        'zip'     => '97739',
        'primary' => false,
        'slug'    => 'la-pine-or',
    ],
    [
        'city'    => 'Prineville',
        'state'   => 'OR',
        'zip'     => '97754',
        'primary' => false,
        'slug'    => 'prineville-or',
    ],
];

// ── Social Links ──────────────────────────────────────────────
$socialLinks = [
    'facebook'  => 'https://www.facebook.com/profile.php?id=100083175929993',
    'instagram' => 'https://www.instagram.com/martymarconstruction/',
];

// ── Lead Form ─────────────────────────────────────────────────
$formAction = 'https://db.pageone.cloud/functions/v1/leads/marty-mar-construction-inc';

// ── Content / USPs ────────────────────────────────────────────
$usps = [
    'Licensed & Insured in Oregon',
    'Serving Central Oregon Since 2007',
    'Free Project Estimates',
    'Residential & Commercial',
];

$differentiators = [
    'Licensed general contractor with ' . $yearsInBusiness . '+ years building across Central Oregon',
    'Full-service: new construction, additions, remodeling, and specialty trades under one roof',
    'Hands-on project management — no subcontractor runaround, direct communication throughout',
    'Built for Oregon\'s climate: snow-load framing, freeze-cycle foundations, UV-resistant finishes',
    'Transparent pricing and honest timelines — no surprise change orders',
];

$faqs = [
    [
        'q' => 'What areas do you serve in Central Oregon?',
        'a' => 'We serve Bend, Redmond, Sisters, Sunriver, La Pine, Prineville, and surrounding communities throughout Central Oregon. Most of our work is within a 40-mile radius of Bend.',
    ],
    [
        'q' => 'Are you licensed and insured in Oregon?',
        'a' => 'Yes — Marty Mar Construction Inc is fully licensed as a general contractor in Oregon and carries general liability and workers\' compensation insurance. License details available on request.',
    ],
    [
        'q' => 'How do I get a free estimate?',
        'a' => 'Call us at (541) 554-8181 or fill out our online estimate form. We\'ll schedule a site visit, assess the scope, and provide a written estimate — no pressure, no obligation.',
    ],
    [
        'q' => 'How long does a typical remodel take?',
        'a' => 'Scope varies widely. A bathroom remodel typically runs 2–4 weeks; a kitchen 4–8 weeks. New home construction averages 6–12 months depending on size and complexity. We set a detailed schedule before work begins.',
    ],
    [
        'q' => 'Do you handle permits?',
        'a' => 'Yes. We pull all required building permits through Deschutes County, the City of Bend, or the applicable jurisdiction and coordinate inspections from start to final sign-off.',
    ],
];

// ── Client Photos (CMS Storage URLs) ──────────────────────────
// 30 photos available from client-assets storage
$photoBase = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/marty-mar-construction-inc/photos/';
$clientPhotos = [
    $photoBase . '1778860950545-7ze15j-639883447_122104619223262704_1584417455874598961_n.jpg',
    $photoBase . '1778860951906-k4k3f1-653971655_122108991891262704_3196853683439316827_n.jpg',
    $photoBase . '1778860953197-djju18-654721467_122108991903262704_5050811052237874053_n.jpg',
    $photoBase . '1778860954283-jzibrv-670632691_122113144995262704_7638902117472654251_n.jpg',
    $photoBase . '1778860955236-j4ejbb-678381290_122115099711262704_6001566772478083152_n.jpg',
    $photoBase . '1778860956266-b8llqh-678998195_122115100209262704_438394711220212323_n.jpg',
    $photoBase . '1778860957438-f6byd8-678233613_122115100665262704_4430800195625207479_n.jpg',
    $photoBase . '1778860958626-lfw602-680552915_122115467307262704_4713724562677138125_n.jpg',
    $photoBase . '1778860959676-2prinv-656698239_122109595875262704_1092633662051859019_n.jpg',
    $photoBase . '1778860960786-ahkw94-642320821_122105087187262704_8280704753595649872_n.jpg',
    $photoBase . '1778860961785-xp4n7j-680226992_122115467295262704_709719999075968407_n.jpg',
    $photoBase . '1778860962906-w7u4m7-680179390_122115467319262704_4439094281590841888_n.jpg',
    $photoBase . '1778860964026-kca0it-685005159_122115930357262704_7735477858159856205_n.jpg',
    $photoBase . '1778860965136-it2sds-685102052_122115930369262704_8640229203175107624_n.jpg',
    $photoBase . '1778860966167-ox2z4z-685440984_122115930387262704_6317045035787254808_n.jpg',
    $photoBase . '1778860967256-wh05bi-684824864_122115930393262704_5088517447378144638_n.jpg',
    $photoBase . '1778860968346-fru6s0-682437206_122115930405262704_6365879609931992028_n.jpg',
    $photoBase . '1778860969497-guki85-688038496_122116319031262704_1182196957276148939_n.jpg',
    $photoBase . '1778860970566-twler5-685829883_122116319001262704_1558314228296441877_n.jpg',
    $photoBase . '1778860971597-dlz1sr-686376988_122116318983262704_759774899935129856_n.jpg',
    $photoBase . '1778860972697-8ow0gy-685421414_122116319043262704_8110363128789190504_n.jpg',
    $photoBase . '1778860973717-n65yo0-629564984_122096303907262704_4092186127556615464_n.jpg',
    $photoBase . '1778860974667-x0dmzg-627973062_122096307063262704_2318798605030557776_n.jpg',
    $photoBase . '1778860975667-mmvi02-630624886_122096307141262704_460531819733276418_n.jpg',
    $photoBase . '1778860976727-717o8a-628095398_122096313699262704_3032322135422503531_n.jpg',
    $photoBase . '1778860977767-xflag0-627738855_122096313741262704_6287728863912086332_n.jpg',
    $photoBase . '1778860978857-nji108-628366567_122096318181262704_8573920518404899943_n.jpg',
    $photoBase . '1778860979907-w6207a-630888528_122096318259262704_1680584066592947224_n.jpg',
    $photoBase . '1778860981091-1jytf2-630056469_122096318247262704_6464366204438959726_n.jpg',
    $photoBase . '1778860982357-ubm5do-641437517_122104619199262704_1682165859110000150_n.jpg',
];
