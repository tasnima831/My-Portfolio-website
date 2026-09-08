# Deploy the portfolio to Vercel

The site stays a Laravel application. Vercel serves static assets and runs PHP for pages and the contact endpoint. This repository pins community runtime `vercel-php@0.8.0` (PHP 8.4) and Node 22. The runtime installs production Composer dependencies; the Composer `vercel` hook verifies platform requirements and discovers Laravel packages.

## What changed and why

- `api/index.php` creates temporary Laravel storage under `/tmp` because the deployed application is read-only.
- `vercel.json` builds assets, configures PHP, routes requests, and sets production defaults.
- `scripts/vercel-assets.mjs` copies public assets into `dist`, excluding PHP and development files. Laravel's Vite manifest remains in `public/build` inside the function bundle.
- `.vercelignore` excludes local credentials, dependencies, generated caches, and local storage from uploads.
- Redis stores encrypted sessions and shared contact rate limits. File/array caching would not enforce limits consistently across functions. Redis is required by this configuration; no SQL database or migrations are required.
- Vercel proxy headers are trusted only in the Vercel environment, allowing HTTPS URLs and visitor IP rate limits.
- SMTP sends synchronously with a 15-second socket timeout. No persistent queue worker is required.

## Accounts and free plans

Use Vercel Hobby only for eligible personal, non-commercial use within its limits. Create an Upstash Redis database on the **Free** plan, not Pay as You Go. Use your SMTP provider's existing allowance or a free email plan; Vercel does not supply an email account. A custom domain purchase is optional; you can use the assigned `vercel.app` address.

Sources: [Vercel Hobby](https://vercel.com/docs/plans/hobby), [Upstash Redis pricing](https://upstash.com/pricing/redis), [PHP runtime](https://github.com/vercel-community/php).

## Environment variables

In Vercel Project Settings → Environment Variables, enter the following for Production. Use separate Redis prefixes and mail credentials if enabling Preview deployments. Do not upload your local `.env` or paste secrets into Git.

| Variable | Value |
| --- | --- |
| `APP_NAME` | Your portfolio name |
| `APP_KEY` | Generate locally using `php artisan key:generate --show`; keep the same key across deployments |
| `APP_URL` | `https://your-project.vercel.app` or your final HTTPS domain, without a trailing slash |
| `PORTFOLIO_CONTACT_EMAIL` | Your receiving inbox |
| `PORTFOLIO_CONTACT_PHONE` | Optional public contact phone |
| `REDIS_HOST` | `tls://` followed by the Redis hostname (no HTTPS or REST URL) |
| `REDIS_PORT` | Provider's Redis port, usually `6379` |
| `REDIS_USERNAME` | Provider's username, usually `default` |
| `REDIS_PASSWORD` | Provider's Redis password |
| `REDIS_PREFIX` | `portfolio-production-` (use a different prefix for previews) |
| `MAIL_HOST` | SMTP hostname |
| `MAIL_PORT` | Provider's SMTP port, usually `587` |
| `MAIL_SCHEME` | `smtp` for STARTTLS on 587, or `smtps` for implicit TLS on 465 |
| `MAIL_USERNAME` | SMTP username |
| `MAIL_PASSWORD` | SMTP password or provider-issued app password |
| `MAIL_FROM_ADDRESS` | Sender address authorized by the SMTP provider |
| `MAIL_FROM_NAME` | Your name |

Use Redis TCP/TLS credentials, not the Upstash REST token. Leave `REDIS_URL`, `MAIL_URL`, and `SESSION_DOMAIN` unset to avoid overriding the values above. Production defaults (Redis sessions/cache, database 0, encrypted secure sessions, stderr logs, synchronous queue, disabled debug) are in `vercel.json`. Do not override them with the local `.env.example` defaults.

## Deploy

1. Push the prepared project to your personal Git repository.
2. Import it in Vercel using the Hobby plan. Select **Other** as the framework and the repository root as the root directory. Use Node **22.x**.
3. Keep the checked-in build settings: `npm ci`, `npm run build:vercel`, and output directory `dist`. Do not select the Vite framework preset: this is a Laravel application.
4. Add the environment variables above and deploy. If the final hostname differs from your initial `APP_URL`, update it and redeploy.
5. Check `/`, `/about-me`, a project detail page, `/robots.txt`, `/sitemap.xml`, images, and CSS. Unknown project URLs should return 404.
6. Submit one real contact message and confirm it arrives, including the message body and visitor Reply-To. Check spam as well. A success response means SMTP accepted the message, not guaranteed inbox delivery.
7. Follow [the SEO launch checklist](seo-launch.md).

Do not run `artisan migrate`, start a queue worker, or cache local production configuration for upload. Environment changes require a new deployment. Vercel's Linux PHP runtime and real SMTP/Redis connectivity must be verified on the first deployment; local tests cannot prove those integrations.

## Where form data goes

The visitor sends data to Laravel, which validates it and sends it through your SMTP provider to `PORTFOLIO_CONTACT_EMAIL`. There is no permanent submissions table or automatic email retry. Redis holds expiring session data (including form input on errors) and rate-limit counters; it is not an inquiry archive. The inbox is the lasting copy of accepted mail.

## Troubleshooting

- Redis errors: check the TLS hostname, password, database 0, and free-plan allowance. Redis availability is required for sessions.
- HTTP 419: reload the page, ensure cookies are enabled, and check HTTPS, stable `APP_KEY`, and Redis connectivity.
- Email failure: check SMTP credentials, verified sender and provider limits; review Vercel function logs. The form preserves input and reports failure.
- Build failure: inspect Composer platform checks and the pinned Node/runtime settings.
- `dist must be empty`: local builds require a clean output directory; Vercel uses a clean checkout. Do not commit `dist`.

Local verification: `npm run build:vercel` and `php artisan test`. Mail delivery is mocked in the automated tests; no real message is sent by those tests.
