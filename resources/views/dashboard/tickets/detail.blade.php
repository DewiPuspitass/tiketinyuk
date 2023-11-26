@extends("layout.app")
@section("main-container")
<div class="container">
    <nav class="navbar">
        <h1 class="navbar-brand">Detail tiket</h1>
    </nav>
    <div class="d-flex flex-direction-row">
    <p class="align-self-center pe-2">Nama Tiket : </p>
    <p class="w-25 p-2 border rounded">{{ $tickets->nama_tiket }}</p>
    </div>
    <div class="d-flex flex-direction-row">
    <p class="align-self-top pe-4">Deskripsi : </p>
    <p class="w-25 p-2 border rounded">{{ $tickets->deskripsi }}</p>
    </div>
    <div class="d-flex flex-direction-row">
    <p class="align-self-center pe-5">Harga : </p>
    <p class="w-25 p-2 border rounded">{{ $tickets->harga }}</p>
    </div>
    <a href="/dashboard" class="btn btn-primary">Kembali</a>
</div>
@endsection