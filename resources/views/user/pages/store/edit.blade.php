@extends('layouts.dashboard.user')

@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
    
        <a href="{{ route('user.dashboard') }}" class="btn btn-primary mb-3">User Dashboard</a>

        <form action="{{ route('user.store.update') }}" method="POST">
            @csrf
            @method('PUT')
            @include('dashboard.pages.store._form')

            <button type="submit" class="btn btn-success">Update Store</button>
        </form>
    </div>
@endsection
