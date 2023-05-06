@extends('layouts.dashboard.components.master')

{{-- @section('sidebar')
    @include('layouts.dashboard.admin.sidebar')
@endsection --}}

@section('navbar')
    @include('layouts.dashboard.guest.navbar')
@endsection

@section('elements')
    @yield('content')
@endsection

@section('categories')
    @yield('categories')
@endsection
