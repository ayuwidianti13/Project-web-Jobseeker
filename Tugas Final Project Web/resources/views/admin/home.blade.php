@extends('admin.main')

@section('content')
<style>
    .card {
    border: 1px solid #ddd; /* Add a border to the card */
    border-radius: 10px; /* Optional: Add border-radius for a rounded appearance */
    transition: transform 0.3s; /* Add a smooth transition effect on hover */
}

.card:hover {
    transform: scale(1.05); /* Enlarge the card slightly on hover */
}

.card-img-top {
    object-fit: cover; /* Make sure the image covers the entire card */
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-body-custom {
    padding: 1.25rem;
}

.rent-price {
    font-size: 1.25rem;
}

.list-unstyled {
    padding: 0;
    list-style: none;
}

.list-style-group {
    padding: 0;
}

/* Optional: Customize the button */
.btn-primary {
    background-color: #7d147d;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    text-decoration: none;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #5b2056;
}
</style>
    <div class="row">
        <section class="py-5">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 justify-content-center">
                    @foreach ($jobposts as $jobpost)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ Storage::url($jobpost->gambar) }}"
                                    alt="{{ $jobpost->nama_perusahaan }}" width="200" height="200" />
                                <!-- Product details-->
                                <div class="card-body card-body-custom pt-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $jobpost->nama_perusahaan }}</h5>
                                        <!-- Product price-->
                                        <div class="rent-price mb-3">
                                            <span class="text-primary">Rp
                                                {{ number_format($jobpost->gaji, 0, ',', '.') }}/</span>month
                                        </div>
                                        <ul class="list-unstyled list-style-group">
                                            <li class="border-bottom p-2 d-flex justify-content-between">
                                                <span>Posisi</span>
                                                <span style="font-weight: 600">{{ $jobpost->posisi }}</span>
                                            </li>
                                            <li class="border-bottom p-2 d-flex justify-content-between">
                                                <span>Tipe Pekerjaan</span>
                                                <span style="font-weight: 600">{{ $jobpost->tipe }}</span>
                                            </li>
                                            <li class="border-bottom p-2 d-flex justify-content-between">
                                                <span>Minimal Pendidikan</span>
                                                <span style="font-weight: 600">{{ $jobpost->pendidikan }}</span>
                                            </li>
                                            <li>
                                                <a class="btn btn-sm btn-primary mt-3" href="{{ route('admin.detail', ['jobpostId' => $jobpost->id]) }}">Detail</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
