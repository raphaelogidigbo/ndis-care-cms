@extends('errors.layout')

@section('title', 'Maintenance | Harbourview Care Services')
@section('code', '503')
@section('heading', "We'll be right back")
@section('message', "We're performing a quick update to serve you better. The site will be back shortly — for urgent enquiries, call us anytime during business hours.")

@section('actions')
    <a href="tel:0890000000" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
        Call (08) 9000 0000
    </a>
    <a href="mailto:info@example.com" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
        Email Us
    </a>
@endsection

@section('note', 'Back online shortly.')
