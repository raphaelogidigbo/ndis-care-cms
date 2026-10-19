@if (config('services.turnstile.site_key'))
    <div>
        <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}" data-theme="light" data-size="flexible"></div>
        @error('cf-turnstile-response')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    @once
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    @endonce
@endif
