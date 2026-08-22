<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Search Engine Indexing
    |--------------------------------------------------------------------------
    |
    | Keep this disabled on local, staging and temporary preview domains.
    | Enable it only when the final production domain is ready for indexing.
    |
    */

    'indexing_enabled' => env(
        'SEO_INDEXING_ENABLED',
        false
    ),

    /*
    |--------------------------------------------------------------------------
    | Site Name
    |--------------------------------------------------------------------------
    |
    | A shorter brand name is used in search-result titles so that important
    | keywords are not pushed out by the full legal company name.
    |
    */

    'site_name' => 'Blue Pearl Logistics',

    /*
    |--------------------------------------------------------------------------
    | Static Page SEO
    |--------------------------------------------------------------------------
    */

    'pages' => [
        'home' => [
            'title' => 'Customs Clearance & Logistics in Kenya',
            'description' => 'Blue Pearl Logistics provides customs clearance, air and sea freight forwarding, container handling, warehousing, cargo transport and vehicle importation support in Kenya.',
        ],

        'about' => [
            'title' => 'About Blue Pearl Logistics',
            'description' => 'Learn about Blue Pearl Logistics Limited and our approach to customs clearance, freight forwarding, cargo handling, warehousing, transport and vehicle importation in Kenya.',
        ],

        'services' => [
            'title' => 'Logistics Services in Kenya',
            'description' => 'Explore customs clearance, air and sea freight forwarding, port and CFS handling, warehousing, project cargo, transport and vehicle importation services in Kenya.',
        ],

        'faq' => [
            'title' => 'Customs Clearance & Logistics FAQs',
            'description' => 'Find answers to common questions about customs clearance, freight forwarding, container handling, vehicle importation, cargo transport and logistics services in Kenya.',
        ],

        'quote' => [
            'title' => 'Request a Logistics Quote in Kenya',
            'description' => 'Request a quote for customs clearance, freight forwarding, container handling, warehousing, cargo transport, project cargo or vehicle importation support in Kenya.',
        ],

        'contact' => [
            'title' => 'Contact Blue Pearl Logistics',
            'description' => 'Contact Blue Pearl Logistics Limited for customs clearance, freight forwarding, cargo handling, warehousing, transport and vehicle importation enquiries in Kenya.',
        ],
    ],
];
