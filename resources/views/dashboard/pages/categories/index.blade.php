@extends('layout.dashboard')
@section('title', 'categories')
@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('breadcrumb')</li><a href="{{ route('dashboard.categories.index') }}">Categories</a>
@endsection
@section('content')
    {{--  @if (session('flashMessage'))
        <div class="alert alert-success">
            {{ session('flashMessage') }}
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif --}}
    <x-flash-message />

    <a href="{{ route('dashboard.categories.create') }}" class="btn">create categories</a>

    <form action="{{ URL::current() }}" method="get" class="row g-3 mt-3 mb-3">
        <div class="col-md-4">
            <input type="text" name="name" class="form-control" placeholder="Search by name" value="{{ request()->query('name') }}" >
        </div>
        <div class="col-md-3">
            <select name="status" class="form-control">
                <option value="">All Statuses</option>
                <option {{ request()->query('status') == 'active' ? 'selected' : '' }} value="active">Active</option>
                <option {{ request()->query('status') == 'inactive' ? 'selected' : '' }} value="inactive">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        <button type="reset" id="resetBtn" class="btn btn-danger mx-2">Reset</button>
    </form>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Products Count</th>
                <th>Description</th>
                <th>Status</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->products_count }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->status }}</td>
                    <td>
                        <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn_sec">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn_dan">Delete</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
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

@push('scripts')
    <script>
        document.getElementById('resetBtn').addEventListener('click', function() {
            window.location.href = "{{ route('dashboard.categories.index') }}";
        });
    </script>
    
@endpush
