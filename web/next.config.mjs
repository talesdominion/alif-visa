/** @type {import('next').NextConfig} */
const staticExport = process.env.STATIC_EXPORT === '1';

const nextConfig = {
  trailingSlash: true,
  images: { unoptimized: true },
  ...(staticExport ? { output: 'export' } : {}),
  // In production the account, dashboard, apply form, checkout and order
  // pages keep running on WordPress/WooCommerce. Point WP_SITE_URL at it
  // (for example https://app.alifvisa.com) and these paths are proxied.
  ...(!staticExport && process.env.WP_SITE_URL
    ? {
        async rewrites() {
          const wp = process.env.WP_SITE_URL;
          return [
            '/apply/:path*', '/dashboard/:path*', '/login/:path*', '/signup/:path*',
            '/checkout/:path*', '/cart/:path*', '/my-account/:path*', '/pay/:path*',
            '/wp-json/:path*', '/wp-content/:path*', '/wp-admin/:path*',
          ].map((source) => ({ source, destination: `${wp}${source}` }));
        },
      }
    : {}),
};

export default nextConfig;
