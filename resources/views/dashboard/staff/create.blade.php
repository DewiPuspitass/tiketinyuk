@extends("layout.app")
@section("main-container")
<div class="container-fluid">
    <nav class="navbar">
        <h1 class="navbar-brand">Buat akun staff</h1>
    </nav>
    <form action="/dashboard/staff" method="post">
        @csrf
        <div class="">
            <label for="nama" class="form-label">Nama</label></br>
            <input type="text" name="nama" class="w-25 form-control rounded-top  @error('nama')is-invalid @enderror" id="nama" placeholder="Nama" required value="{{ old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="email" class="form-label pt-3">Email</label></br>
            <input type="text" name="email" class="w-25 form-control rounded-top  @error('email')is-invalid @enderror" id="email" placeholder="email@gmail.com" required value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="no_hp" class="form-label pt-3">No HP</label></br>
            <input type="text" name="no_hp" class="w-25 form-control rounded-top  @error('no_hp')is-invalid @enderror" id="no_hp" placeholder="08xxxxxx" required value="{{ old('no_hp') }}">
            @error('no_hp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="password" class="form-label pt-3">Password</label></br>
            <input type="password" name="password" class="w-25 form-control rounded-bottom  @error('password')is-invalid @enderror" id="password" placeholder="Password" required>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="w-25  btn btn-lg btn-primary mt-3" type="submit">Buat akun staff</button>
    </form>
</div>
@endsection