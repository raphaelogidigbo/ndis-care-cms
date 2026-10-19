@extends('errors.layout')

@section('title', 'Server Error | Harbourview Care Services')
@section('code', '500')
@section('heading', 'Something went wrong')
@section('message', "Something went wrong on our end — it's not you. Our team has been notified. Please try again in a moment, or call us if it's urgent.")

@section('actions')
    <a href="javascript:location.reload()" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
        Try Again
    </a>
    <a href="tel:0890000000" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
        Call (08) 9000 0000
    </a>
@endsection
