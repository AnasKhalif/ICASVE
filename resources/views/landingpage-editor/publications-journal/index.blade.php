@extends('layouts.app')
@section('title', 'publications journal')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">publications journal</h4>
                    <a href="{{ route('landing.publications-journal.create')}}" class="btn btn-sm btn-success" >New publications journal</a>
                </div>
                <p class="card-description">
                    List of publications journal
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>image type</th>
                                <th>image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publications_journals as $publications_journal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$publications_journal->image_type}}</td>
                                    <td><img src="{{ asset('storage/' . $publications_journal->image_path) }}" alt="gambar" class="img-fluid"></td>
                                    <td>
                                        <a href="{{ route('landing.publications-journal.edit', $publications_journal->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('landing.publications-journal.destroy', $publications_journal->id) }}" method="POST"
                                            style="display: inline-block;">
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
