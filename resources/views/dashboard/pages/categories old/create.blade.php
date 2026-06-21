@extends('layout.dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">categories</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.create') }}">create</a></li>
@endsection
@section('title', 'create category')
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif 

    <div class="container mt-4">
        <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">← Back to Categories</a>

        <div class="card card-custom">
            <div class="card-header bg-primary text-white">
                <h4>Create New Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter Category Name">
                            {{--  @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif --}}
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Enter Category Description"
                            rows="4"></textarea>
                            @if ($errors->has('description'))
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            @endif
                    </div>

                    <button type="submit" class="btn btn-primary-custom">Save Category</button>
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
