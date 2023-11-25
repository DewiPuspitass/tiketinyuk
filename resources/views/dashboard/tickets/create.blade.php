<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body{
            margin: 3rem;
            padding: 3rem;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <form action="/dashboard/tickets" method="post">
    @csrf
        <div class="">
            <label for="nama_tiket">Nama Tiket</label></br>
            <input type="text" name="nama_tiket" class="form-control rounded-top  @error('nama_tiket')is-invalid @enderror" id="nama_tiket" placeholder="" required value="{{ old('nama_tiket') }}"></br></br>
            @error('nama_tiket')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="deskripsi">deskripsi</label></br>
            <textarea name="deskripsi" id="deskripsi" class="form-control rounded-top  @error('deskripsi')is-invalid @enderror" id="" cols="30" rows="10" required value="{{ old('deskripsi') }}"></textarea></br></br>
            @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="harga">Harga</label></br>
            <input type="text" name="harga" class="form-control rounded-top  @error('harga')is-invalid @enderror" id="harga" placeholder="" required value="{{ old('harga') }}"></br></br>
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Buat Tiket</button>
        <button class="w-100 btn btn-lg btn-primary mt-3"><a href="/dashboard">kembali</a></button>
    </form>

    
</body>
</html>