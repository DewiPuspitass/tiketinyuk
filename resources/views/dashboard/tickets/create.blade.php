@extends("layout.app")
@section("main-container")
<div class="container-fluid">
    <nav class="navbar">
        <h1 class="navbar-brand">Buat tiket</h2>
        <ul class="navbar-nav me-auto">
            <a class="nav-item nav-link mb-2" href="/dashboard">⬅ Kembali</a>
        </ul>
    </nav>
    <form action="/dashboard/tickets" method="post">
        @csrf
        <div class="">
            <label for="nama_tiket" class="form-label">Nama Tiket</label></br>
            <input type="text" name="nama_tiket" class="w-25 form-control rounded-top  @error('nama_tiket')is-invalid @enderror" id="nama_tiket" placeholder="" required value="{{ old('nama_tiket') }}">
            @error('nama_tiket')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="deskripsi" class="form-label">Deskripsi</label></br>
            <textarea name="deskripsi" id="deskripsi" class="w-25 form-control rounded-top  @error('deskripsi')is-invalid @enderror" id="" cols="30" rows="10" required value="{{ old('deskripsi') }}"></textarea>
            @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="harga" class="form-label">Harga</label></br>
            <input type="text" name="harga" class="w-25 form-control rounded-top  @error('harga')is-invalid @enderror" id="harga" placeholder="" required value="{{ old('harga') }}">
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="w-25 btn btn-lg btn-primary mt-4" type="submit">Buat Tiket</button>
    </form>
</div>
@endsection