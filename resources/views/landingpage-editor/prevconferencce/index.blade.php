@extends('layouts.app')
@section('title', 'prevconferencce')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">prev</h4>
                    <a href="{{ route('landing.prevconferencce.create') }}" class="btn btn-sm btn-success">New
                        prevconferencce</a>
                </div>
                <p class="card-description">
                    List of prevconferencce 
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>title</th>
                                <th>description</th>
                                <th>year</th>
                                <th>file_path</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publications_journals as $publications_journal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $publications_journal->image_type }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $publications_journal->image_path) }}"
                                            alt="gambar" class="img-fluid">
                                    </td>
                                    <td>
                                        <a href="{{ route('landing.publications-journal.edit', $publications_journal->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form
                                            action="{{ route('landing.publications-journal.destroy', $publications_journal->id) }}"
                                            method="POST" style="display: inline-block;">
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
