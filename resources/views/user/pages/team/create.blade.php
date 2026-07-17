@extends('layouts.dashboard.user')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('user.team.index') }}">Team</a></li>
    <li class="breadcrumb-item">create</a></li>
@endsection
@section('title', 'create team member')
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif 

    <div class="container mt-4">
        <a href="{{ route('user.team.index') }}" class="btn btn-secondary mb-3">← Back to Team</a>

        <div class="card card-custom">
            <div class="card-header bg-primary text-white">
                <h4>Create New Team Member</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.team.store') }}" method="POST">
                    @csrf
                    @include('user.pages.team._form')
                    <button type="submit" class="btn btn-primary-custom">Save Team Member</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .btn-primary-custom {
            background-color: #ef16aa;
            border-color: #ef16aa;
        }

        .card-custom {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #ef16aa;
            border: 1px solid #ef16aa;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-control label {
            margin-bottom: 5px;
            display: block;
        }

        .form-control input,
        .form-control textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-control button {
            align-self: flex-start;
            cursor: pointer;
        }
    </style>
@endpush
