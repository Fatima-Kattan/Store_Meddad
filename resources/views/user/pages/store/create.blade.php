@extends('layouts.dashboard.user')

@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
    
        <a href="{{ route('user.dashboard') }}" class="btn btn-primary mb-3">User Dashboard</a>

        <form action="{{ route('user.store.store') }}" method="POST">
            @csrf
            @method('POST')
            @include('user.pages.store._form')
            <button type="submit" class="btn btn-success">Create Store</button>
        </form>
    </div>
@endsection
