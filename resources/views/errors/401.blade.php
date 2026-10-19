@extends('errors.layout')

@section('title', 'Unauthorised | Harbourview Care Services')
@section('code', '401')
@section('heading', 'Login required')
@section('message', 'You need to be signed in to view this page. If you were trying to reach the admin area, please log in first.')

@section('actions')
    <a href="{{ route('home') }}" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
        Back to Home
    </a>
    <a href="{{ url('/admin') }}" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
        Admin Login
    </a>
@endsection
