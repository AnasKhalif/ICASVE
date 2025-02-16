@extends('layouts.app')

@section('title', 'Participants')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Participants</h5>
                        <p class="card-text fw-bold fs-4">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Uploaded Abstracts</h5>
                        <p class="card-text fw-bold fs-4">{{ $usersWithAbstracts }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">Participants</h4>

                    <a href="{{ route('admin.participant.create') }}" class="btn btn-sm btn-success">
                        New Register Participants
                    </a>
                </div>
                <form action="{{ route('admin.participant.index') }}" method="GET" class="d-flex mb-4">
                    <input type="text" name="search" id="searchInput" class="form-control form-control-sm me-2"
                        placeholder="Search by name..." value="{{ request('search') }}">
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Institution</th>
                                <th>Registration Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="participantTable">
                            @forelse ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->institution }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->display_name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.participant.show', $user->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="fa fa-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('admin.participant.edit', $user->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.participant.destroy', $user->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let delayTimer;

            $('#searchInput').on('keyup', function() {
                clearTimeout(delayTimer);
                let search = $(this).val();

                delayTimer = setTimeout(() => {
                    $.ajax({
                        url: "{{ route('admin.participant.index') }}",
                        type: "GET",
                        data: {
                            search: search
                        },
                        success: function(response) {
                            let rows = '';

                            if (response.users.length > 0) {
                                response.users.forEach((user, index) => {
                                    let roles = user.roles.map(role => role
                                        .display_name).join(', ');
                                    rows += `
                                    <tr>
                                        <td>${index + 1}</td>
                                        <td>${user.name}</td>
                                        <td>${user.email}</td>
                                        <td>${user.institution}</td>
                                        <td>${roles}</td>
                                        <td>
                                            <a href="/admin/participant/${user.id}" class="btn btn-sm btn-info">
                                                <i class="fa fa-eye"></i> Detail
                                            </a>
                                            <a href="/admin/participant/${user.id}/edit" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <form action="/admin/participant/${user.id}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                `;
                                });
                            } else {
                                rows =
                                    `<tr><td colspan="6" class="text-center">No users found</td></tr>`;
                            }

                            $('#participantTable').html(rows);
                            $('.pagination')
                                .hide();
                        },
                        error: function() {
                            $('#participantTable').html(
                                `<tr><td colspan="6" class="text-center text-danger">Error fetching data</td></tr>`
                            );
                        }
                    });
                }, 300);
            });
        });
    </script>


@endsection
