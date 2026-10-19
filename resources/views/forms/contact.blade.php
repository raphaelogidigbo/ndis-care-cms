<form method="post" action="{{ route('contact.store') }}" class="form_block space-y-5" aria-label="Contact form">
    @csrf
    @honeypot

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
            Please check the highlighted fields and try again.
        </div>
    @endif

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label for="contact-name" class="mb-1.5 block text-sm font-semibold">Full name <span class="text-coral">*</span></label>
            <input type="text" id="contact-name" name="name" required autocomplete="name" value="{{ old('name') }}"
                   class="w-full rounded-xl border {{ $errors->has('name') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="contact-phone" class="mb-1.5 block text-sm font-semibold">Phone</label>
            <input type="tel" id="contact-phone" name="phone" autocomplete="tel" value="{{ old('phone') }}"
                   class="w-full rounded-xl border {{ $errors->has('phone') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
            @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div>
        <label for="contact-email" class="mb-1.5 block text-sm font-semibold">Email <span class="text-coral">*</span></label>
        <input type="email" id="contact-email" name="email" required autocomplete="email" value="{{ old('email') }}"
               class="w-full rounded-xl border {{ $errors->has('email') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="contact-message" class="mb-1.5 block text-sm font-semibold">Message <span class="text-coral">*</span></label>
        <textarea id="contact-message" name="message" rows="5" required
                  class="w-full rounded-xl border {{ $errors->has('message') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">{{ old('message') }}</textarea>
        @error('message')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <x-turnstile />
    <div>
        <button type="submit" class="inline-flex items-center rounded-full bg-coral px-8 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
            Send Message
        </button>
        <p class="mt-3 text-xs leading-relaxed text-forest/60">
            By submitting this form you agree to our
            <a href="{{ route('page.show', 'privacy-policy') }}" class="font-semibold text-coral hover:text-coral-dark">Privacy Policy</a>.
        </p>
    </div>
</form>
