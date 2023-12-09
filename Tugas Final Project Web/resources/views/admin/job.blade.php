@extends('admin.main')
<style>
    .card {
        margin-top: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .card-header {
        background-color: #6c63ff;
        color: #fff;
        border-bottom: none;
        border-radius: 10px 10px 0 0;
    }

    .btn-primary {
        background-color: #7d147d;
        border-color: #7d147d;
    }

    .btn-primary:hover {
        background-color: #5b2056;
        border-color: #5b2056;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        text-align: center;
        vertical-align: middle !important;
    }

    .created-by-me {
        background-color: #0800ff;
        color: #fff;
    }

    .table th, .table td {
        border: none;
        padding: 12px;
    }

    .alert {
        border-radius: 10px;
    }
</style>



@section('content')
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Job Post</h3>
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Job</a>
        </div>
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="align-middle">
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Posisi</th>
                            <th>Tipe</th>
                            <th>gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobposts as $jobpost)
                            <tr class="{{ auth()->id() === $jobpost->user_id ? 'created-by-me' : '' }}">
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $jobpost->nama_perusahaan }}</td>
                                <td class="align-middle">{{ $jobpost->posisi }}</td>
                                <td class="align-middle">{{ $jobpost->tipe }}</td>
                                <td class="align-middle">Rp {{ number_format($jobpost->gaji, 0, ',', '.') }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.edit', $jobpost) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form onclick="return confirm('Apakah anda yakin ingin menghapus data?');"
                                        class="d-inline" action="{{ route('admin.destroy', $jobpost->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
