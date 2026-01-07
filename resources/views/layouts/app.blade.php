@extends('adminlte::page')

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>

@section('content')
@yield('content')
@endsection