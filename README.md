# ndis-care-cms

A production content-management platform for a disability-care provider, rebuilt from a compromised WordPress site into **Laravel 13 + Filament 5** — with a security-hardened admin, structured referral/careers workflows, and a bespoke WordPress-to-Blade migration layer.

> Client details have been replaced with the fictional **Harbourview Care Services**; all seeded content is synthetic.

## Features

- **Filament 5 admin panel** — Pages, Services, Referrals, SDA listings, Job Listings, Testimonials, and Form Submissions as first-class resources with role-based access (`admin`/`staff`)
- **Referral workflow** — public referral form → triageable `FormSubmission`/`Referral` records with statuses and admin views
- **Careers pipeline** — job listings + application form with résumé upload to private storage
- **SDA listings** — Specialist Disability Accommodation properties with design categories and statuses
- **Security hardening** — MFA columns on users, activity audit log (`ActivityLog` + `LogsActivity` concern), honeypot spam protection, `X-Robots-Tag: noindex` on `/admin/*`, a `SecurityCenter` admin page
- **SEO plumbing** — per-page meta, `spatie/laravel-sitemap`, JSON-LD, legacy-URL redirect middleware
- **Transactional email** — Resend-backed submission confirmations and notifications
- **Feature-tested** — admin access, form submissions, referral/testimonial workflows, legacy redirects, SEO, seeders

## The interesting part: the WP migration layer

The original site was a hacked WordPress install. Rather than paste content by hand, captured WP pages are seeded through `database/seeders/data/pages.json` and sanitized at seed time:

```
pages.json → WpContentCleaner → <!-- form:* --> slot markers → ContentRenderer → Blade form partials
```

- `App\Support\WpContentCleaner` (DOM-based) strips legacy Contact Form 7 markup into `<!-- form:contact|referral|feedback|careers -->` comments, removes dead upload references, unwraps heading `<strong>`s, and drops legacy CTA blocks
- `App\Support\ContentRenderer` swaps those markers for real `resources/views/forms/*.blade.php` partials at render time, and parses seeded Bootstrap accordion markup for the FAQ page
- `scripts/capture-wp.php` — the one-shot content-capture utility used for the migration

The same pipeline makes editors' HTML safe to store raw while keeping forms in version-controlled Blade.

## Stack

PHP 8.4 · Laravel 13 · Filament 5 · SQLite/MySQL · Tailwind (custom design tokens) · Resend · spatie/laravel-honeypot + laravel-sitemap · PHPUnit

## Setup

```bash
composer install
cp .env.example .env && php artisan key:generate
php artisan migrate --seed      # seeds synthetic demo pages/services
npm install && npm run build
php artisan serve
```

Admin panel at `/admin` (create a user via `php artisan make:filament-user`).

## Notes

- `public/images/` is intentionally empty in this snapshot — asset licensing is per-client
- Seeded pages/services/testimonials/SDA listings are synthetic and safe to reshuffle freely
