@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="container">
    <div class="p-3 bg-white rounded shadow-sm">
        <h1 class="h3 mb-3">Users</h1>
        <p>This is the paragraph of the dashboard. Welcome to your LaravelBook-style UI.</p>

        @if($users->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
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
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ optional($user->department)->name ?? 'N/A' }}</td>
                        <td>
                            @if($user->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary me-1">
                           <i class="bi bi-pencil-square"></i> Edit
                            </a>
                             <a href="#" class="btn btn-sm btn-outline-danger"
                             onclick="return confirm('Are you sure you want to delete this user?')">
                              <i class="bi bi-trash"></i> Delete
                            </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-warning">No users found.</div>
        @endif
    </div>
</div>
@endsection
