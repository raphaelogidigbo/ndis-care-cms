@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    <article class="mx-auto w-full max-w-4xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        @include('partials.breadcrumbs')
        <h1 class="font-display mb-8 mt-4 text-4xl font-semibold tracking-tight sm:text-5xl">{{ $page->title }}</h1>

        <div class="site-content">
            {{ \App\Support\ContentRenderer::render($page->content_html) }}
        </div>
    </article>
@endsection
