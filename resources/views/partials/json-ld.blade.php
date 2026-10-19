@php
    $jsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => 'Harbourview Care Services',
        'description' => 'Registered NDIS provider delivering person-centred disability and mental health support services in Melbourne, WA.',
        'url' => route('home'),
        'telephone' => '+61890000000',
        'email' => 'info@example.com',
        'image' => asset('images/stock-hero-conversation.jpg'),
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => '34 Melbourne Road',
            'addressLocality' => 'Melbourne',
            'addressRegion' => 'WA',
            'postalCode' => '6106',
            'addressCountry' => 'AU',
        ],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'opens' => '09:00',
            'closes' => '17:00',
        ],
        'sameAs' => [
            'https://www.facebook.com/harbourviewcare',
            'https://www.instagram.com/harbourviewcare',
            'https://www.linkedin.com/company/harbourview-care-services',
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES) !!}</script>
