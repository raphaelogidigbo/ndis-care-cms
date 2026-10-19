<form method="post" action="{{ route('careers.store') }}" enctype="multipart/form-data" class="form_block space-y-5" aria-label="Careers application form">
    @csrf
    @honeypot

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
            Please check the highlighted fields and try again.
        </div>
    @endif

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label for="careers-name" class="mb-1.5 block text-sm font-semibold">Full name <span class="text-coral">*</span></label>
            <input type="text" id="careers-name" name="name" required autocomplete="name" value="{{ old('name') }}"
                   class="w-full rounded-xl border {{ $errors->has('name') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="careers-phone" class="mb-1.5 block text-sm font-semibold">Phone <span class="text-coral">*</span></label>
            <input type="tel" id="careers-phone" name="phone" required autocomplete="tel" value="{{ old('phone') }}"
                   class="w-full rounded-xl border {{ $errors->has('phone') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
            @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div>
        <label for="careers-email" class="mb-1.5 block text-sm font-semibold">Email <span class="text-coral">*</span></label>
        <input type="email" id="careers-email" name="email" required autocomplete="email" value="{{ old('email') }}"
               class="w-full rounded-xl border {{ $errors->has('email') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="careers-role" class="mb-1.5 block text-sm font-semibold">Role you're interested in</label>
        <input type="text" id="careers-role" name="role" placeholder="e.g. Support Worker, Community Nurse" value="{{ old('role') }}"
               class="w-full rounded-xl border {{ $errors->has('role') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
        @error('role')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="careers-resume" class="mb-1.5 block text-sm font-semibold">Resume (PDF or DOCX, max 5MB)</label>
        <input type="file" id="careers-resume" name="resume" accept=".pdf,.doc,.docx"
               class="w-full rounded-xl border {{ $errors->has('resume') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm file:mr-4 file:rounded-full file:border-0 file:bg-sand file:px-4 file:py-2 file:text-sm file:font-semibold file:text-forest hover:file:bg-cream-dark focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
        @error('resume')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="careers-message" class="mb-1.5 block text-sm font-semibold">Tell us about yourself</label>
        <textarea id="careers-message" name="message" rows="5"
                  class="w-full rounded-xl border {{ $errors->has('message') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">{{ old('message') }}</textarea>
        @error('message')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <x-turnstile />
    <div>
        <button type="submit" class="inline-flex items-center rounded-full bg-coral px-8 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
            Submit Application
        </button>
        <p class="mt-3 text-xs leading-relaxed text-forest/60">
            By submitting this form you agree to our
            <a href="{{ route('page.show', 'privacy-policy') }}" class="font-semibold text-coral hover:text-coral-dark">Privacy Policy</a>.
            Application details are used only for recruitment purposes.
        </p>
    </div>
</form>
