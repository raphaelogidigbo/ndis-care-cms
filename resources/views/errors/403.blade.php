@extends('errors.layout')

@section('title', 'Access Denied | Harbourview Care Services')
@section('code', '403')
@section('heading', 'Access denied')
@section('message', "Sorry, you don't have permission to access this page. If you think this is a mistake, please get in touch.")

@section('actions')
    <a href="{{ route('home') }}" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
        Back to Home
    </a>
    <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
        Contact Us
    </a>
@endsection
