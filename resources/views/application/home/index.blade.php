@extends('layout.master', [
    'title' => 'Inicio',
    'type' => 'app',
])

@section('custom-scripts')
    <script src="{{ asset('assets/application/js/home.js') . '?t=' . time() }}"></script>
@endsection

@section('content')
@endsection
