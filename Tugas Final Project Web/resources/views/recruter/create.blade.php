@extends('recruter.main')

@section('content')
<style>
    /* Add this style to your existing stylesheet or in a style tag within your HTML */


    /* Style for the form heading */
    h2 {
        color: #7d147d; /* Set text color for the heading */
        font-size: 2rem; /* Set font size for the heading */
        font-weight: bold; /* Make the heading bold */
        margin-bottom: 20px; /* Add some margin at the bottom of the heading */
    }

    /* Style for the form labels */
    .form-label {
        color: #5b2056; /* Set text color for the labels */
        font-weight: bold; /* Make the labels bold */
    }

    /* Style for the form inputs and selects */
    .form-control,
    .form-select {
        width: 100%; /* Make the inputs and selects take full width */
        margin-bottom: 15px; /* Add some margin at the bottom of the inputs and selects */
        padding: 10px; /* Add padding to the inputs and selects */
        border: 1px solid #ef97e9; /* Add a border with a color */
        border-radius: 5px; /* Optional: Add rounded corners to the inputs and selects */
    }

    /* Style for the form textarea */
    .form-control textarea {
        resize: vertical; /* Allow vertical resizing of the textarea */
    }

    /* Style for the form submit button */
    .btn-primary {
        background-color: #7d147d; /* Set background color for the button */
        color: #ffffff; /* Set text color for the button */
        padding: 10px 20px; /* Add padding to the button */
        border: none; /* Remove border from the button */
        border-radius: 5px; /* Optional: Add rounded corners to the button */
        cursor: pointer; /* Add a pointer cursor to the button */
        transition: background-color 0.3s; /* Add a smooth transition to the background color */
    }

    .btn-primary:hover {
        background-color: #5b2056; /* Change the background color on hover */
    }
</style>

<div class="container mt-5">
    <h2 class="mb-4">Job Post Form</h2>

    <form action="{{ route('recruter.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" required>
        </div>

        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" value="{{ old('posisi') }}" required>
        </div>

        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan Minimal</label>
            <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}" required>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select class="form-select" id="tipe" name="tipe" required>
                <option value="part time">Part Time</option>
                <option value="full time">Full Time</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="hpemail" class="form-label">Nomor HP/Email</label>
            <input type="text" class="form-control" id="hpemail" name="hpemail" value="{{ old('hpemail') }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" value="{{ old('deskripsi') }}" required></textarea>
        </div>

        <div class="mb-3">
            <label for="gaji" class="form-label">Gaji</label>
            <input type="number" class="form-control" id="gaji" name="gaji" value="{{ old('gaji') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>

@endsection