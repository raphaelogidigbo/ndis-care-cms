<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Support\WpContentCleaner;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Nav order from the live site — the captured pages.json has menu_order 0
     * on every row, so order is declared here.
     *
     * @var array<string, int>
     */
    private const MENU_ORDER = [
        'home' => 1,
        'about-us' => 2,
        'services' => 3,
        'why-us' => 4,
        'referrals' => 5,
        'ndis' => 6,
        'resources' => 7,
        'faq' => 8,
        'careers' => 9,
        'feedback' => 10,
        'contact-us' => 11,
        'thank-you' => 12,
        'privacy-policy' => 13,
        'terms-of-use' => 14,
    ];

    /**
     * Slugs whose CF7 blocks become form slot markers.
     *
     * @var array<string, string>
     */
    private const FORM_MARKERS = [
        'contact-us' => 'contact',
        'referrals' => 'referral',
        'feedback' => 'feedback',
        'careers' => 'careers',
    ];

    public function run(): void
    {
        $cleaner = new WpContentCleaner;

        foreach ($this->entries() as $entry) {
            $slug = $entry['slug'];

            if (! array_key_exists($slug, self::MENU_ORDER)) {
                continue;
            }

            Page::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $entry['title'],
                    'content_html' => $cleaner->clean($entry['html'], self::FORM_MARKERS[$slug] ?? null),
                    'meta_title' => $entry['meta']['title'] ?? null,
                    'meta_description' => $entry['meta']['description'] ?? null,
                    'menu_order' => self::MENU_ORDER[$slug],
                    'is_published' => true,
                ],
            );
        }

        foreach ($this->legalPages() as $slug => $legalPage) {
            Page::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $legalPage['title'],
                    'content_html' => $legalPage['html'],
                    'meta_title' => $legalPage['meta_title'],
                    'meta_description' => $legalPage['meta_description'],
                    'menu_order' => self::MENU_ORDER[$slug],
                    'is_published' => true,
                ],
            );
        }
    }

    /**
     * Legal pages are authored directly (not captured from WordPress) and are
     * intentionally excluded from the main navigation — they are linked from
     * the footer instead.
     *
     * NOTE: placeholder legal copy — must be reviewed by the client/solicitor
     * before launch.
     *
     * @return array<string, array{title: string, html: string, meta_title: string, meta_description: string}>
     */
    private function legalPages(): array
    {
        return [
            'privacy-policy' => [
                'title' => 'Privacy Policy',
                'meta_title' => 'Privacy Policy',
                'meta_description' => 'How Harbourview Care Services collects, uses, stores and protects your personal information.',
                'html' => <<<'HTML'
<p><em>Last updated: January 2026. This policy is provided as a draft and should be reviewed to ensure it reflects Harbourview Care Services' practices.</em></p>
<p>Harbourview Care Services (ABN 12 345 678 901) is committed to protecting your privacy and handling your personal information in accordance with the Privacy Act 1988 (Cth) and the Australian Privacy Principles (APPs). This policy explains how we collect, use, store and protect the information you share with us when you use this website or our services.</p>
<p>We may update this policy from time to time by updating this page. We encourage you to check this page periodically to make sure you are happy with any changes.</p>
<h2>What information we collect</h2>
<p>Depending on how you interact with us, we may collect:</p>
<ul>
<li>Your name, contact details (phone, email, address) and date of birth</li>
<li>NDIS-related information, such as your NDIS number, plan details and support needs</li>
<li>Information about your health, disability or mental health needs that you choose to share with us (sensitive information)</li>
<li>Referral details provided by families, guardians, Support Coordinators or health professionals</li>
<li>Employment and application information when you apply for a role (e.g. resume, qualifications, referees)</li>
<li>Feedback, complaints and enquiries you submit</li>
<li>Basic technical information when you use this website (such as browser type and pages visited)</li>
</ul>
<h2>How we use your information</h2>
<p>We require this information to understand your needs and provide you with a better service. In particular, we use it to:</p>
<ul>
<li>Respond to enquiries, referrals and feedback</li>
<li>Assess and deliver appropriate NDIS support services</li>
<li>Meet our obligations as a registered NDIS provider</li>
<li>Process job applications and manage recruitment</li>
<li>Keep internal records and improve our services and this website</li>
</ul>
<h2>How we store and protect your information</h2>
<p>We are committed to ensuring that your information is secure. We take reasonable steps — physical, electronic and managerial — to protect personal information from misuse, loss, unauthorised access, modification or disclosure. Access is limited to team members who need it to perform their role, and we retain information only for as long as needed for the purpose it was collected, or as required by law.</p>
<h2>When we may disclose information</h2>
<p>We do not sell, distribute or lease your personal information to third parties. We may disclose information:</p>
<ul>
<li>To people involved in your care (such as your Support Coordinator or allied health professionals) with your consent</li>
<li>To the NDIS Quality and Safeguards Commission or other regulatory bodies where required</li>
<li>To service providers who support our operations, under appropriate confidentiality obligations</li>
<li>Where required or authorised by law</li>
</ul>
<h2>Cookies</h2>
<p>This website uses only the cookies it needs to function — such as session and security cookies that keep forms and logins working safely. We do not use advertising or tracking cookies. You can set your browser to decline cookies, though parts of the site may not work as intended if you do.</p>
<h2>Links to other websites</h2>
<p>Our website may contain links to other websites of interest, such as the NDIS. Once you use these links to leave our site, we do not have any control over that other website and cannot be responsible for the protection and privacy of any information you provide while visiting it. Please check the privacy statement of the website in question.</p>
<h2>Access and correction</h2>
<p>You may request access to the personal information we hold about you, or ask us to correct it if it is inaccurate, incomplete or out of date. To do so, contact us using the details below — we will promptly correct any information found to be incorrect.</p>
<h2>Complaints</h2>
<p>If you believe we have breached your privacy, please contact us first so we can try to resolve the issue. You can also contact:</p>
<ul>
<li>The NDIS Quality and Safeguards Commission on <a href="tel:1800035544">1800 035 544</a> or at <a href="https://www.ndiscommission.gov.au">www.ndiscommission.gov.au</a></li>
<li>The Office of the Australian Information Commissioner (OAIC) at <a href="https://www.oaic.gov.au">www.oaic.gov.au</a></li>
</ul>
<h2>Contact us</h2>
<p>Questions about this policy or your personal information can be directed to:</p>
<p>Harbourview Care Services<br>1 Example Street, Melbourne VIC 3000<br>Phone: (08) 9000 0000<br>Email: info@example.com</p>
HTML,
            ],
            'terms-of-use' => [
                'title' => 'Terms of Use',
                'meta_title' => 'Terms of Use',
                'meta_description' => 'The terms governing use of the Harbourview Care Services website.',
                'html' => <<<'HTML'
<p><em>Last updated: January 2026. These terms are provided as a draft and should be reviewed before launch.</em></p>
<h2>Introduction</h2>
<p>The Terms of Use of the Harbourview Care Services website include these Terms of Use, our <a href="/privacy-policy">Privacy Policy</a> and any other terms and conditions that appear in, or are linked to, this website.</p>
<p>By using this website you agree to be bound by these terms. If you do not agree, please do not use the site.</p>
<h2>Website content and access</h2>
<p>While Harbourview Care Services takes reasonable care in preparing and maintaining the information on this website, we do not warrant the accuracy, reliability, adequacy or completeness of the website content. Content may include technical inaccuracies or typographical errors, is subject to change at any time without notice, and may not be up to date at the time you view it.</p>
<p>It is your responsibility to contact us directly to confirm the accuracy and currency of any information you seek to rely on. We do not guarantee that access to this website will be uninterrupted, or that the website is free from viruses or anything else that may damage your computer or device.</p>
<h2>Information, not advice</h2>
<p>Content on this site is general in nature and does not constitute medical, legal or professional advice. Service availability and eligibility may vary — please contact us to discuss your circumstances.</p>
<h2>Limitation of liability</h2>
<p>To the maximum extent permitted by law, Harbourview Care Services excludes all liability for any loss or damage of any kind (including direct, indirect, incidental, special or consequential damages) arising out of, or in any way connected with, the website content and the use or performance of this website, except to the extent that the loss or damage is directly caused by our fraud or wilful misconduct.</p>
<h2>Intellectual property</h2>
<p>The materials displayed on this website — including text, information, photographs, illustrations, artwork, names, logos, trademarks and other graphic materials — are owned by or licensed to Harbourview Care Services and are protected by copyright and other intellectual property laws. You must not reproduce, retransmit, distribute, sell, publish or circulate any of this material to any third party without our express prior written consent.</p>
<h2>Submissions</h2>
<p>Material you send to us through this website (such as general comments or suggestions) is deemed to be non-confidential and non-proprietary unless indicated otherwise, and we may use it for any purpose without compensation to you.</p>
<p>Information submitted through our referral, feedback, careers and contact forms is handled in accordance with our <a href="/privacy-policy">Privacy Policy</a>.</p>
<h2>Third-party websites</h2>
<p>This website may contain links to websites operated by third parties (such as the NDIS). Unless otherwise indicated, Harbourview Care Services does not control, endorse or approve those websites or their content, and takes no responsibility for any aspect of them.</p>
<h2>Linking to this website</h2>
<p>If you wish to link to this website, please seek our approval first by emailing <a href="mailto:info@example.com">info@example.com</a> with the following information:</p>
<ul>
<li>The URL of the website you wish to link from</li>
<li>A brief description of your website</li>
<li>The reason you wish to establish the link</li>
</ul>
<p>If we approve your link, you must comply with any conditions we set. If the nature or content of your website changes significantly, please contact us again with an updated description.</p>
<h2>Interference with this website</h2>
<p>You must not attempt to change, add to, remove, deface, hack or otherwise interfere with this website or any material or content displayed on it, nor use automated means to submit forms or scrape content.</p>
<h2>Governing law</h2>
<p>These terms are governed by the laws of Western Australia.</p>
<h2>Contact us</h2>
<p>Questions about these terms can be directed to info@example.com or (08) 9000 0000.</p>
HTML,
            ],
        ];
    }

    /**
     * @return array<int, array{slug: string, title: string, html: string, meta: array<string, string|null>}>
     */
    private function entries(): array
    {
        return json_decode(
            file_get_contents(database_path('seeders/data/pages.json')),
            true,
            flags: JSON_THROW_ON_ERROR,
        );
    }
}
