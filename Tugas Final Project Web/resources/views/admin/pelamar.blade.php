@extends('admin.main')

@section('content')
<style>
    .card {
        margin-top: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .card-header {
        background-color: #6c63ff;
        color: #fff;
        border-radius: 10px 10px 0 0;
    }

    .btn-sm {
        margin: 2px;
    }

    .table {
        margin-top: 20px;
    }

    .table th, .table td {
        text-align: center;
    }

    .btn-success, .btn-danger {
        margin-right: 5px;
    }

    .btn-success:hover, .btn-danger:hover {
        filter: brightness(90%);
    }
</style>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Pelamar</h3>
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
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Kab / Kota</th>
                        <th>Provinsi</th>
                        <th>Email</th>
                        <th>Hp</th>
                        <th>CV</th>
                        <th>Nama Perusahaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($profiles as $profile)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $profile->nama }}</td>
                            <td>{{ $profile->tanggal_lahir }}</td>
                            <td>{{ $profile->jenis_kelamin }}</td>
                            <td>{{ $profile->alamat }}</td>
                            <td>{{ $profile->kabkota }}</td>
                            <td>{{ $profile->provinsi }}</td>
                            <td>{{ $profile->email }}</td>
                            <td>{{ $profile->hp }}</td>
                            <td>
                                <a href="{{ Storage::url($profile->gambarcv) }}" download>
                                    <button type="button" class="btn btn-primary btn-sm">Download CV</button>
                                </a>
                            </td>
                            <td>{{ $profile->jobpost->nama_perusahaan }}</td>
                            <td>
                                @if ($profile->status !== 'disetujui' && $profile->status !== 'ditolak')
                                    <form action="{{ route('admin.profile.approve', $profile->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                    </form>
                                
                                    <form action="{{ route('admin.profile.reject', $profile->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                    </form>
                                @else
                                    <button class="btn btn-success btn-sm" disabled>Setujui</button>
                                    <button class="btn btn-danger btn-sm" disabled>Tolak</button>
                                @endif
                                
                                <form onclick="return confirm('Apakah anda yakin ingin menghapus profile ini?');" class="d-inline" action="{{ route('admin.profile.destroy', $profile->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
