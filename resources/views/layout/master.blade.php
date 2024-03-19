@props([
    'title' => null,
    'type' => 'auth',
    'breadcrumbs' => [],
    'yearRelease' => config('app.year_release'),
])

@php
    $yearFooter = date('Y') != $yearRelease ? $yearRelease . ' - ' . date('Y') : $yearRelease;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>
        @empty($title)
            {{ config('app.name') }}
        @else
            {{ $title }} | {{ config('app.name') }}
        @endempty
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    @include('layout.partials.plugins._init-styles')
</head>

@if ($type == 'auth')
    @include('layout.partials._auth')
@else
    @include('layout.partials._application')
@endif

<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

@include('layout.partials.plugins._init-scripts')

<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>

<script src="{{ asset('assets/js/custom/sweet-alerts.js') . '?t=' . time() }}"></script>
<script src="{{ asset('assets/js/custom/axios-request.js') . '?t=' . time() }}"></script>
<script src="{{ asset('assets/js/custom/datatable.js') . '?t=' . time() }}"></script>

@yield('custom-scripts')

</html>
