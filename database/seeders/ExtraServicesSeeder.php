<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ExtraServicesSeeder extends Seeder
{
    /**
     * Services added after the WordPress migration, authored directly (no
     * WpContentCleaner pass). Rendered by bespoke blades — remove by
     * unpublishing/deleting the records or dropping this seeder.
     *
     * @var array<int, array{slug: string, title: string, excerpt: string, card_image: string, icon: string, meta_title: string, meta_description: string, html: string}>
     */
    private const SERVICES = [
        [
            'slug' => 'assist-personal-activities-high',
            'title' => 'Assist Personal Activities (High Intensity)',
            'excerpt' => 'Skilled, trained support for complex personal care needs — delivered safely, respectfully and with dignity in your own home.',
            'card_image' => 'Community-Nursing-Care-md-4.png',
            'icon' => '/images/serv-icon07.png',
            'meta_title' => 'High Intensity Personal Activities Support',
            'meta_description' => 'Trained, competency-assessed support for complex personal care needs including enteral feeding, catheter care and medication management — delivered by Harbourview Care Services in Melbourne, WA.',
            'html' => <<<'HTML'
<div class="inner_section py-4 py-sm-5">
<div class="container">
<div class="inner_text_sec text-center">
<h2 class="inner_bg_title mb-3">Complex Care, Delivered with <strong>Dignity</strong></h2>
<p class="common_paragraph">High intensity personal activities are supports for participants with more complex health and care needs — tasks that require additional training, clinical oversight and careful, consistent delivery.</p>
<p class="common_paragraph">At Harbourview Care Services, our high intensity supports are provided by workers who are trained and assessed against the NDIS High Intensity Support Skills Descriptors, so every task is performed safely and in line with your care plan.</p>
</div>
</div>
</div>
<div class="inner_section py-4 py-sm-5 sec_bg_color">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="inner_img_sec"><img src="/images/Community-Nursing-Care-lg-3.png" alt="A nurse providing complex care support in a participant's home"></div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="inner_text_sec pt-4 pt-md-0">
<h3 class="inner_bg_title mb-3">What We <strong>Support</strong></h3>
<p class="common_paragraph mb-3">Depending on your individual needs and NDIS plan, high intensity support can include:</p>
<ul class="inner_list mb-3">
<li>Enteral (PEG) feeding and mealtime management</li>
<li>Tracheostomy and ventilator support</li>
<li>Complex bowel care and catheter care</li>
<li>Subcutaneous injections and medication administration</li>
<li>Diabetes management and monitoring</li>
<li>Severe dysphagia support</li>
<li>Wound and pressure care</li>
<li>Seizure management support</li>
</ul>
<p class="common_paragraph mb-0">Every support is delivered to a documented care plan, reviewed regularly with you and your health team.</p>
</div>
</div>
</div>
</div>
</div>
<div class="inner_section py-4 py-sm-5">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 order-md-2">
<div class="inner_img_sec"><img src="/images/stock-pexels-tima-6609516.jpg" alt="A participant with high support needs receiving assistance"></div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="inner_text_sec pt-4 pt-md-0">
<h3 class="inner_bg_title mb-3">Trained &amp; Supported <strong>Workers</strong></h3>
<p class="common_paragraph mb-3">High intensity tasks are only ever performed by workers who have been specifically trained and assessed as competent for that task — with oversight from qualified nursing staff.</p>
<p class="common_paragraph mb-3">We match you with consistent, familiar workers wherever possible, so your care is delivered by people who understand your routines, preferences and communication style.</p>
<p class="common_paragraph mb-0">Your dignity, comfort and choice guide everything we do.</p>
</div>
</div>
</div>
</div>
</div>
<div class="inner_section py-4 py-sm-5 sec_bg_color">
<div class="container">
<div class="inner_text_sec text-center">
<h4 class="inner_bg_title mb-3">Funded Through Your <strong>NDIS Plan</strong></h4>
<p class="common_paragraph">High intensity personal activities are typically funded under Core Supports. If you are unsure whether this support is included in your plan, our team can help you understand your funding and prepare for your next plan review.</p>
</div>
</div>
</div>
HTML,
        ],
        [
            'slug' => 'specialist-disability-accommodation',
            'title' => 'Specialist Disability Accommodation',
            'excerpt' => 'Purpose-built and accessible homes for NDIS participants with very high support needs — designed for independence, safety and comfort.',
            'card_image' => 'stock-house-exterior.jpg',
            'icon' => '/images/serv-icon08.png',
            'meta_title' => 'Specialist Disability Accommodation (SDA) in Melbourne',
            'meta_description' => 'Accessible SDA homes in Melbourne for NDIS participants with extreme functional impairment or very high support needs — across all NDIS design categories.',
            'html' => <<<'HTML'
<div class="inner_section py-4 py-sm-5">
<div class="container">
<div class="inner_text_sec text-center">
<h2 class="inner_bg_title mb-3">Homes Designed Around <strong>You</strong></h2>
<p class="common_paragraph">Specialist Disability Accommodation (SDA) is housing purpose-built for NDIS participants with extreme functional impairment or very high support needs — homes where the design itself makes daily life easier, safer and more independent.</p>
<p class="common_paragraph">At Harbourview Care Services, our SDA homes are professionally managed and tailored to each resident — because a home should fit your life, not the other way around.</p>
</div>
</div>
</div>
<div class="inner_section py-4 py-sm-5 sec_bg_color">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="inner_img_sec"><img src="/images/Shared-Living-Support-ndis-2.png" alt="Participants sharing daily life in an accessible SDA home"></div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="inner_text_sec pt-4 pt-md-0">
<h3 class="inner_bg_title mb-3">NDIS Design <strong>Categories</strong></h3>
<p class="common_paragraph mb-3">SDA homes are built to the NDIS SDA Design Standard, across four categories:</p>
<ul class="inner_list mb-3">
<li><strong>Improved Liveability</strong> — enhanced design for sensory, intellectual or cognitive needs</li>
<li><strong>Fully Accessible</strong> — step-free, wheelchair-friendly homes for significant physical impairment</li>
<li><strong>Robust</strong> — durable, low-maintenance homes built for resilience and safety</li>
<li><strong>High Physical Support</strong> — homes with provisions for ceiling hoists, assistive technology and on-site overnight support</li>
</ul>
<p class="common_paragraph mb-0">Your NDIS plan will identify which design category and building type you are funded for.</p>
</div>
</div>
</div>
</div>
</div>
<div class="inner_section py-4 py-sm-5">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 order-md-2">
<div class="inner_img_sec"><img src="/images/stock-wheelchair-kitchen.jpg" alt="An accessible kitchen designed for wheelchair users"></div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="inner_text_sec pt-4 pt-md-0">
<h3 class="inner_bg_title mb-3">Built for <strong>Independence</strong></h3>
<p class="common_paragraph mb-3">Our homes are designed so you can do more for yourself, with features such as:</p>
<ul class="inner_list mb-3">
<li>Step-free entries and widened doorways and hallways</li>
<li>Accessible kitchens, bathrooms and laundries</li>
<li>Open-plan living areas with easy circulation space</li>
<li>Provision for assistive technology and smart-home controls</li>
<li>Safety features including emergency systems and secure outdoor areas</li>
</ul>
<p class="common_paragraph mb-0">Every detail supports independence, privacy and comfort.</p>
</div>
</div>
</div>
</div>
</div>
<div class="inner_section py-4 py-sm-5 sec_bg_color">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="inner_img_sec"><img src="/images/Shared-Living-Support-ndis-7.png" alt="A support worker assisting a resident at home"></div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="inner_text_sec pt-4 pt-md-0">
<h3 class="inner_bg_title mb-3">Eligibility &amp; <strong>Costs</strong></h3>
<p class="common_paragraph mb-3">SDA is funded through your NDIS plan for participants whose needs cannot be met by standard housing, even with modifications or assistive technology.</p>
<p class="common_paragraph mb-3">Residents contribute a reasonable rent contribution — similar to a quarter of the Disability Support Pension plus Commonwealth Rent Assistance — while day-to-day supports such as Supported Independent Living are funded separately in your plan.</p>
<p class="common_paragraph mb-0">Not sure if you qualify? We can help you understand your options and talk to your Support Coordinator.</p>
</div>
</div>
</div>
</div>
</div>
HTML,
        ],
    ];

    public function run(): void
    {
        foreach (self::SERVICES as $index => $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                [
                    'title' => $service['title'],
                    'excerpt' => $service['excerpt'],
                    'card_image' => $service['card_image'],
                    'icon' => $service['icon'],
                    'content_html' => $service['html'],
                    'meta_title' => $service['meta_title'],
                    'meta_description' => $service['meta_description'],
                    'sort_order' => 10 + $index,
                    'is_published' => true,
                ],
            );
        }
    }
}
