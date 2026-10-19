<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectLegacyUrls
{
    /**
     * 301-redirect legacy WordPress URLs to their Laravel equivalents and
     * 404 the WP machinery paths (feeds, xmlrpc, wp-admin…) that have no
     * replacement. Runs globally before routing, because URLs like
     * `/slug/` never match the `/{slug}` route and would otherwise 404.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->isMethod('GET') && ! $request->isMethod('HEAD')) {
            return $next($request);
        }

        $path = $request->getPathInfo();

        // WP machinery paths — no replacement exists, so 404 is correct.
        if (preg_match('#/feed/?$#i', $path)
            || preg_match('#^/(xmlrpc\.php|wp-json|wp-admin|wp-login\.php|wp-includes|wp-content/(?!uploads/))#i', $path)) {
            abort(404);
        }

        // Whitelisted WP uploads → local /images/. public/images/ is the
        // vetted whitelist, so file existence IS the whitelist check.
        if (preg_match('#^/wp-content/uploads/[^/]+/[^/]+/([^/?]+)$#i', $path, $matches)
            && file_exists(public_path('images/'.$matches[1]))) {
            return $this->redirect('/images/'.$matches[1], $request);
        }

        if ($path === '/index.php' || str_starts_with($path, '/index.php/')) {
            return $this->redirect(substr($path, strlen('/index.php')) ?: '/', $request);
        }

        if ($path === '/home') {
            return $this->redirect('/', $request);
        }

        if ($path !== '/' && str_ends_with($path, '/')) {
            return $this->redirect(rtrim($path, '/'), $request);
        }

        return $next($request);
    }

    /**
     * Build the redirect URL from $request->root() rather than the URL
     * generator: the generator's cached root is poisoned during boot
     * (Filament resolves asset() before TrustProxies applies forwarded
     * headers) and would emit the raw care.test origin behind the tunnel.
     */
    private function redirect(string $path, Request $request): Response
    {
        $query = $request->getQueryString();
        $target = rtrim(rtrim($request->root(), '/').$path, '/');

        return new RedirectResponse($target.($query !== null ? '?'.$query : ''), 301);
    }
}
