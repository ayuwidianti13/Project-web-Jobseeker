@extends('seeker.main')

@section('content')
<style>

    .mb-3 {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }

    .form-select {
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

    <div class="container mt-5">
        <h2 class="mb-4">Job Application Form</h2>

        <form action="{{ route('pelamar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="jobpost_id" value="{{ $jobpost_id }}">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>

            <div style="display: flex; gap: 10px;">
                <div style="flex: 1;">
                    <label for="kabkota" class="form-label">Kabupaten/Kota</label>
                    <input type="text" class="form-control" id="kabkota" name="kabkota" required>
                </div>

                <div style="flex: 1;">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="kodepos" class="form-label">Kode Pos</label>
                <input type="number" class="form-control" id="kodepos" name="kodepos" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="hp" class="form-label">Nomor HP</label>
                <input type="tel" class="form-control" id="hp" name="hp" required>
            </div>

            <div class="mb-3">
                <label for="gambarcv" class="form-label">Upload CV (PDF only)</label>
                <input type="file" class="form-control" id="gambarcv" name="gambarcv" accept=".pdf" required>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
        </form>
    </div>
@endsection
