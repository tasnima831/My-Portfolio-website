# SEO launch

For Vercel serverless hosting, follow [the Vercel deployment guide](vercel-deployment.md). Do not upload a locally generated configuration cache; use Vercel environment variables and redeploy after changes.

- Set `APP_URL` to the final public HTTPS origin (without a trailing slash), `APP_ENV=production`, and `APP_DEBUG=false` in your hosting environment. Run `php artisan config:cache` after changes. Canonical URLs, social images, robots.txt and the sitemap use APP_URL.
- Serve Laravel through its public directory. Route missing files to public/index.php, including /robots.txt and /sitemap.xml; do not override these endpoints with hosting defaults.
- Redirect alternate hostnames and HTTP to your preferred HTTPS domain at your host. Keep staging environments private.
- Verify the domain in Google Search Console, submit /sitemap.xml, and inspect the homepage, /about-me and each project URL. Check structured data with Google's Rich Results Test. Eligibility does not guarantee rich results.
- Measure the deployed site in PageSpeed Insights on mobile and desktop. The animated preloader deliberately delays homepage visibility; consider removing it if real-world loading metrics are poor.
- Keep project case studies accurate and specific: your contribution, implementation decisions, screenshots, and outcomes you can substantiate. Add new projects in config/portfolio.php; their pages and sitemap entries are generated automatically.
- Review indexing, search queries and Core Web Vitals in Search Console after launch. Rankings and indexing are not guaranteed by metadata or a sitemap.

Reference: https://developers.google.com/search/docs/fundamentals/get-started-developers
