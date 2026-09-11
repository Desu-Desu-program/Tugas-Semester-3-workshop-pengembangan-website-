@extends('layout')

@push('styles')
    <link rel="stylesheet" href="custom.css">
@endpush

@section('title', 'Home Page')

@section('content')
    @include('header')
    
    <h1>Welcome to Home Page</h1>
    <p>Main content here...</p>
    
    @if($user->isAdmin())
        <p>Admin Panel</p>
    @elseif($user->isEditor())
        <p>Editor Panel</p>
    @else
        <p>User Panel</p>
    @endif

    @switch($status)
        @case('pending')
            <p>Order pening</p>
            @break
        @case('completed')
            <p>Order comlit</p>
            @break
        @default
            <p>Unknown Status :(</p>
    @endswitch

    @include('footer')
@endsection

@push('scripts')
    <script src="app.js"></script>
@endpush