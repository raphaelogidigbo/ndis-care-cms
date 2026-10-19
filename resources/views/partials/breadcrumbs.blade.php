@php($dark = $dark ?? false)
<nav aria-label="Breadcrumb">
    <ol class="flex flex-wrap items-center gap-2 text-sm {{ $dark ? 'text-cream/70' : 'text-forest/60' }}">
        <li><a href="{{ route('home') }}" class="{{ $dark ? 'hover:text-white' : 'hover:text-forest' }}">Home</a></li>
        <li aria-hidden="true">/</li>
        <li class="font-medium {{ $dark ? 'text-cream' : 'text-forest' }}" aria-current="page">{{ $page->title }}</li>
    </ol>
</nav>
