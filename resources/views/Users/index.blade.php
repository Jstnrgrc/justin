@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="container-fluid">
    <div class="p-4 bg-white rounded-3 shadow-sm">
        <h1 class="h3 mb-3 fw-semibold">Users</h1>
        <p class="text-muted">Welcome to your LaravelBook-style UI. Here's a clean overview of your user data.</p>

        @if($users->count())
        <div class="table-responsive">
            <table class="table table-hover table-borderless align-middle text-center w-100">
                <thead class="table-light">
                    <tr class="text-uppercase text-muted small">
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ ucwords($user->full_name) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ optional($user->department)->name ?? 'N/A' }}</td>
                        <td>
                            @if($user->stat == 1)
                            <span class="badge bg-success-subtle text-success">Active</span>
                            @elseif($user->stat == 0)
                            <span class="badge bg-secondary-subtle text-secondary">Inactive</span>
                            @else
                            <span class="badge bg-warning-subtle text-warning">Unknown</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('users.edit', $user->id) }}" method="GET" class="d-inline">
                                @csrf
                                <div class="d-flex justify-content-center gap-2">
                                <button type="submit" class="btn btn-outline-primary px-3 me-2">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </button>
                            </form>
                
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button href="#" class="btn btn-outline-danger px-3"
                                    onclick="return confirm('Are you sure you want to delete this user?')">

                                    <i class="bi bi-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-warning text-center">No users found.</div>
        @endif
    </div>
</div>
@endsection
