@extends('layouts.app')

@section('title', 'Setting Icasve')

@section('content')
<div class="container mt-4 card p-4">
    <h4 class="mb-3">Pengaturan Tahun Aktif</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('landing.setting.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="year" class="form-label">Pilih Tahun Aktif</label>
            <select name="year" id="year" class="form-select">
                @foreach ($years as $year)
                    <option value="{{ $year->year }}" {{ $activeYear && $activeYear->year == $year->year ? 'selected' : '' }}>
                        {{ $year->year }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
