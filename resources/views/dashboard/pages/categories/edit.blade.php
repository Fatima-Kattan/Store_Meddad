@extends('layout.dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">categories</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.edit', $category->id) }}">{{ $category->name }}</a></li>
@endsection
@section('title', 'edit category')
@section('content')
<div class="container mt-4">
    <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary mb-3">← Back to Categories</a>
    
    <div class="card card-custom">
        <div class="card-header bg-primary text-white">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('dashboard.pages.categories._form')
                
                <button type="submit" class="btn btn-primary-custom">Update Category</button>
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
