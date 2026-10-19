<form method="post" action="{{ route('referrals.store') }}" class="form_block space-y-6" aria-label="Participant referral form">
    @csrf
    @honeypot

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
            Please check the highlighted fields and try again.
        </div>
    @endif

    <fieldset>
        <legend class="font-display mb-4 text-xl font-semibold">Participant details</legend>
        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label for="ref-first-name" class="mb-1.5 block text-sm font-semibold">First name <span class="text-coral">*</span></label>
                <input type="text" id="ref-first-name" name="first_name" required autocomplete="given-name" value="{{ old('first_name') }}"
                       class="w-full rounded-xl border {{ $errors->has('first_name') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                @error('first_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="ref-last-name" class="mb-1.5 block text-sm font-semibold">Last name <span class="text-coral">*</span></label>
                <input type="text" id="ref-last-name" name="last_name" required autocomplete="family-name" value="{{ old('last_name') }}"
                       class="w-full rounded-xl border {{ $errors->has('last_name') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                @error('last_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="ref-dob" class="mb-1.5 block text-sm font-semibold">Date of birth</label>
                <input type="date" id="ref-dob" name="birth_date" autocomplete="bday" value="{{ old('birth_date') }}"
                       class="w-full rounded-xl border {{ $errors->has('birth_date') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                @error('birth_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="ref-sex" class="mb-1.5 block text-sm font-semibold">Sex</label>
                <select id="ref-sex" name="sex" class="w-full rounded-xl border border-sand bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                    <option value="">Prefer not to say</option>
                    @foreach (\App\Enums\Sex::cases() as $sex)
                        <option value="{{ $sex->value }}" @selected(old('sex') === $sex->value)>{{ $sex->getLabel() }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="ref-phone" class="mb-1.5 block text-sm font-semibold">Phone <span class="text-coral">*</span></label>
                <input type="tel" id="ref-phone" name="phone" required autocomplete="tel" value="{{ old('phone') }}"
                       class="w-full rounded-xl border {{ $errors->has('phone') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="ref-email" class="mb-1.5 block text-sm font-semibold">Email <span class="text-coral">*</span></label>
                <input type="email" id="ref-email" name="email" required autocomplete="email" value="{{ old('email') }}"
                       class="w-full rounded-xl border {{ $errors->has('email') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-5">
            <label for="ref-address" class="mb-1.5 block text-sm font-semibold">Address</label>
            <input type="text" id="ref-address" name="address" autocomplete="street-address" value="{{ old('address') }}"
                   class="w-full rounded-xl border {{ $errors->has('address') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
            @error('address')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </fieldset>

    <fieldset>
        <legend class="font-display mb-4 text-xl font-semibold">NDIS details</legend>
        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label for="ref-ndis" class="mb-1.5 block text-sm font-semibold">NDIS number</label>
                <input type="text" id="ref-ndis" name="ndis_number" inputmode="numeric" value="{{ old('ndis_number') }}"
                       class="w-full rounded-xl border {{ $errors->has('ndis_number') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                @error('ndis_number')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="ref-plan-mgmt" class="mb-1.5 block text-sm font-semibold">Plan management</label>
                <select id="ref-plan-mgmt" name="plan_management" class="w-full rounded-xl border border-sand bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                    <option value="">Select&hellip;</option>
                    @foreach (\App\Enums\PlanManagement::cases() as $option)
                        <option value="{{ $option->value }}" @selected(old('plan_management') === $option->value)>{{ $option->getLabel() }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="ref-plan-start" class="mb-1.5 block text-sm font-semibold">Plan start date</label>
                <input type="date" id="ref-plan-start" name="ndis_plan_start" value="{{ old('ndis_plan_start') }}"
                       class="w-full rounded-xl border {{ $errors->has('ndis_plan_start') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                @error('ndis_plan_start')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="ref-plan-end" class="mb-1.5 block text-sm font-semibold">Plan end date</label>
                <input type="date" id="ref-plan-end" name="ndis_plan_end" value="{{ old('ndis_plan_end') }}"
                       class="w-full rounded-xl border {{ $errors->has('ndis_plan_end') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                @error('ndis_plan_end')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend class="font-display mb-4 text-xl font-semibold">Referrer details</legend>
        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label for="ref-role" class="mb-1.5 block text-sm font-semibold">Your role</label>
                <select id="ref-role" name="referrer_role" class="w-full rounded-xl border border-sand bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                    <option value="">Select&hellip;</option>
                    @foreach (\App\Enums\ReferrerRole::cases() as $option)
                        <option value="{{ $option->value }}" @selected(old('referrer_role') === $option->value)>{{ $option->getLabel() }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="ref-name" class="mb-1.5 block text-sm font-semibold">Your name</label>
                <input type="text" id="ref-name" name="referrer_name" autocomplete="name" value="{{ old('referrer_name') }}"
                       class="w-full rounded-xl border {{ $errors->has('referrer_name') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                @error('referrer_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="ref-referrer-email" class="mb-1.5 block text-sm font-semibold">Your email</label>
                <input type="email" id="ref-referrer-email" name="referrer_email" value="{{ old('referrer_email') }}"
                       class="w-full rounded-xl border {{ $errors->has('referrer_email') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                @error('referrer_email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="ref-source" class="mb-1.5 block text-sm font-semibold">How did you hear about us?</label>
                <select id="ref-source" name="source" class="w-full rounded-xl border border-sand bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">
                    <option value="">Select&hellip;</option>
                    @foreach (\App\Enums\ReferralSource::cases() as $option)
                        <option value="{{ $option->value }}" @selected(old('source') === $option->value)>{{ $option->getLabel() }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mt-5">
            <label for="ref-notes" class="mb-1.5 block text-sm font-semibold">Support needs / notes</label>
            <textarea id="ref-notes" name="notes" rows="4"
                      class="w-full rounded-xl border {{ $errors->has('notes') ? 'border-red-400' : 'border-sand' }} bg-white px-4 py-3 text-sm focus:border-coral focus:outline-none focus:ring-2 focus:ring-coral/30">{{ old('notes') }}</textarea>
            @error('notes')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </fieldset>

    <x-turnstile />

    <div>
        <button type="submit" class="inline-flex items-center rounded-full bg-coral px-8 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
            Submit Referral
        </button>
        <p class="mt-3 text-xs leading-relaxed text-forest/60">
            By submitting this form you agree to our
            <a href="{{ route('page.show', 'privacy-policy') }}" class="font-semibold text-coral hover:text-coral-dark">Privacy Policy</a>
            and
            <a href="{{ route('page.show', 'terms-of-use') }}" class="font-semibold text-coral hover:text-coral-dark">Terms of Use</a>.
            Please do not include sensitive health information beyond what is needed for us to respond.
        </p>
    </div>
</form>
