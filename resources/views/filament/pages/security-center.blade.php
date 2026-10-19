<x-filament-panels::page>
    <div class="grid gap-6 lg:grid-cols-2">
        {{-- Protection status --}}
        <x-filament::section heading="Protection status">
            <dl class="divide-y divide-gray-950/5 dark:divide-white/10">
                <div class="flex items-center justify-between py-2.5">
                    <dt class="text-sm">Cloudflare Turnstile (forms)</dt>
                    <dd>
                        @if ($this->protectionStatus['turnstile'])
                            <x-filament::badge color="success">Enabled</x-filament::badge>
                        @else
                            <x-filament::badge color="danger">Not configured</x-filament::badge>
                        @endif
                    </dd>
                </div>
                <div class="flex items-center justify-between py-2.5">
                    <dt class="text-sm">Honeypot (forms)</dt>
                    <dd>
                        @if ($this->protectionStatus['honeypot'])
                            <x-filament::badge color="success">Enabled</x-filament::badge>
                        @else
                            <x-filament::badge color="danger">Disabled</x-filament::badge>
                        @endif
                    </dd>
                </div>
                <div class="flex items-center justify-between py-2.5">
                    <dt class="text-sm">Debug mode off (production)</dt>
                    <dd>
                        @if ($this->protectionStatus['debug_off'])
                            <x-filament::badge color="success">Off</x-filament::badge>
                        @else
                            <x-filament::badge color="warning">On — set APP_DEBUG=false</x-filament::badge>
                        @endif
                    </dd>
                </div>
                <div class="flex items-center justify-between py-2.5">
                    <dt class="text-sm">HTTPS (APP_URL)</dt>
                    <dd>
                        @if ($this->protectionStatus['https'])
                            <x-filament::badge color="success">HTTPS</x-filament::badge>
                        @else
                            <x-filament::badge color="warning">HTTP</x-filament::badge>
                        @endif
                    </dd>
                </div>
            </dl>
        </x-filament::section>

        {{-- Users & access --}}
        <x-filament::section heading="Admin users" description="Each user enables MFA on their own profile — click your avatar → Profile, or use Set up MFA above.">
            <ul class="divide-y divide-gray-950/5 dark:divide-white/10">
                @foreach ($this->users as $user)
                    <li class="flex items-center justify-between gap-3 py-2.5">
                        <div class="min-w-0">
                            <a href="{{ \App\Filament\Resources\Users\UserResource::getUrl('edit', ['record' => $user]) }}"
                               class="truncate text-sm font-medium text-primary-600 hover:underline dark:text-primary-400">
                                {{ $user->name }}
                            </a>
                            <p class="truncate text-xs text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                        </div>
                        <div class="flex shrink-0 items-center gap-2">
                            <x-filament::badge :color="$user->role === \App\Enums\UserRole::Admin ? 'primary' : 'gray'">
                                {{ $user->role->getLabel() }}
                            </x-filament::badge>
                            @if ($user->getAppAuthenticationSecret() || $user->hasEmailAuthentication())
                                <x-filament::badge color="success">MFA on</x-filament::badge>
                            @else
                                <x-filament::badge color="warning">MFA off</x-filament::badge>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </x-filament::section>

        {{-- Submission stats --}}
        <x-filament::section heading="Form submissions">
            <dl class="grid gap-4 text-center sm:grid-cols-3">
                <div>
                    <dd class="text-2xl font-semibold">{{ $this->submissionStats['total'] }}</dd>
                    <dt class="text-xs text-gray-500 dark:text-gray-400">Total</dt>
                </div>
                <div>
                    <dd class="text-2xl font-semibold text-danger-600 dark:text-danger-400">{{ $this->submissionStats['spam'] }}</dd>
                    <dt class="text-xs text-gray-500 dark:text-gray-400">Spam flagged</dt>
                </div>
                <div>
                    <dd class="text-2xl font-semibold">{{ $this->submissionStats['today'] }}</dd>
                    <dt class="text-xs text-gray-500 dark:text-gray-400">Today</dt>
                </div>
            </dl>
        </x-filament::section>

        {{-- Recent submission IPs --}}
        <x-filament::section heading="Recent submission origins">
            <ul class="divide-y divide-gray-950/5 dark:divide-white/10">
                @forelse ($this->recentSubmissions as $submission)
                    <li class="flex items-center justify-between gap-3 py-2">
                        <div class="min-w-0">
                            <p class="truncate text-sm">{{ $submission->name }} <span class="text-gray-400">&middot;</span> {{ $submission->type->getLabel() }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $submission->created_at->diffForHumans() }}</p>
                        </div>
                        <code class="shrink-0 text-xs">{{ $submission->ip ?? '—' }}</code>
                    </li>
                @empty
                    <li class="py-2 text-sm text-gray-500">No submissions yet.</li>
                @endforelse
            </ul>
        </x-filament::section>

        {{-- Activity log --}}
        <x-filament::section heading="Recent activity" class="lg:col-span-2">
            <ul class="divide-y divide-gray-950/5 dark:divide-white/10">
                @forelse ($this->recentActivity as $entry)
                    <li class="flex flex-wrap items-center gap-x-3 gap-y-1 py-2 text-sm">
                        <span class="font-medium">{{ $entry->user?->name ?? 'Public' }}</span>
                        <x-filament::badge :color="match ($entry->action) { 'created' => 'success', 'updated' => 'warning', 'deleted' => 'danger', default => 'gray' }">
                            {{ $entry->action }}
                        </x-filament::badge>
                        <span class="text-gray-600 dark:text-gray-400">
                            {{ class_basename($entry->subject_type) }} — {{ $entry->subject_label }}
                        </span>
                        <span class="ml-auto text-xs text-gray-500">{{ $entry->created_at->diffForHumans() }}</span>
                    </li>
                @empty
                    <li class="py-2 text-sm text-gray-500">No activity recorded yet.</li>
                @endforelse
            </ul>
        </x-filament::section>
    </div>
</x-filament-panels::page>
