@extends('errors.layout')

@section('title', 'Page Not Found | Harbourview Care Services')
@section('code', '404')
@section('heading', 'Page not found')
@section('message', "The page you're looking for doesn't exist or may have moved. Let's get you back on track.")

@section('actions')
    <a href="{{ route('home') }}" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
        Back to Home
    </a>
    <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
        Contact Us
    </a>
@endsection
