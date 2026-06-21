

@extends('layout.dashboard')
@section('title','categories')
@section('breadcrumb',)
    <li class="breadcrumb-item active">@yield('breadcrumb')</li><a href="{{ route('categories.index') }}">Categories</a>
@endsection
@section('content')
    <a href="{{ route('categories.create') }}" class="btn">create categories</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn_sec">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn_dan">Delete</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('styles')
    <style>
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    td,
    th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .btn_sec {
        background-color: #a01ac5
    }

    .btn_dan {
        background-color: rgb(212, 50, 50);
        border: 1px solid rgb(212, 50, 50);
        cursor: pointer;
    }
</style>
@endpush