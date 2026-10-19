@extends('errors.layout')

@section('title', 'Too Many Requests | Harbourview Care Services')
@section('code', '429')
@section('heading', 'Slow down a moment')
@section('message', "You've made too many requests in a short time. Please wait a minute and try again — this helps us keep the site secure for everyone.")

@section('actions')
    <a href="javascript:location.reload()" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
        Try Again
    </a>
    <a href="{{ route('home') }}" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
        Back to Home
    </a>
@endsection
