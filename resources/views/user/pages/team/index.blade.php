@extends('layouts.dashboard.user')
@section('title', 'Team List')
@section('breadcrumb')
    <li class="breadcrumb-item active">Team List</li>
@endsection
@section('content')
    <x-flash-message />

    <a href="{{ route('user.team.create') }}" class="btn">create team members</a>

    <form action="{{ URL::current() }}" method="get" class="row g-3 mt-3 mb-3">
        <div class="col-md-4">
            <input type="text" name="name" class="form-control" placeholder="Search by name"
                value="{{ request()->query('name') }}">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        <button type="reset" id="resetBtn" class="btn btn-danger mx-2">Reset</button>
    </form>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>
                        <a href="{{ route('user.team.edit', $member->id) }}" class="btn btn_sec">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('user.team.destroy', $member->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn_dan">Delete</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{ $members->links() }}
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
            window.location.href = "{{ route('user.team.index') }}";
        });
    </script>
@endpush
