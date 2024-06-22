@extends('admin.layouts.app')

@section('content')

<div class = "admin-main-wrapper section-padding-top section-padding-bottom" >
    <!DOCTYPE html>

    <div class="container mt-5">
        <h3 class = "text-primary">Mentor Requests</h3>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Resume</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mentors as $mentor)
                        <tr>
                            <td>{{ $mentor->id }}</td>
                            <td>{{ $mentor->first_name }}</td>
                            <td>{{ $mentor->last_name }}</td>
                            <td>{{ $mentor->contact }}</td>
                            <td>{{ $mentor->email }}</td>
                            <td>{{ $mentor->status }}</td>
                            <td>
                                @if ($mentor->resume_url)
                                    <a href="{{ asset($mentor->resume_url) }}" target="_blank">View Resume</a>
                                @else
                                    No Resume
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.mentor.approve', $mentor->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning">Approve</button>
                                </form>
                                <form action="{{ route('admin.mentor.decline', $mentor->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Decline</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection