@extends('errors.layout')

@section('title', 'Page Expired | Harbourview Care Services')
@section('code', '419')
@section('heading', 'Page expired')
@section('message', 'Your session expired while you were away — this usually happens when a form is left open too long. Go back, refresh the page, and try again.')

@section('actions')
    <a href="javascript:history.back()" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
        Go Back &amp; Retry
    </a>
    <a href="{{ route('home') }}" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
        Back to Home
    </a>
@endsection

@section('note', "Don't worry — nothing was lost.")
