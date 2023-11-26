<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <div class="">
        <h1>Edit Tiket</h1>
    </div>
    
    <div>
        <form method="post" action="/dashboard/tickets/edit/{{ $tickets->id }}">
            @csrf
            @method('put')
            
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="">
                <label for="nama_tiket" class="">Nama Tiket</label>
                <input type="text" class="@error('nama_tiket') is-invalid @enderror" id="nama_tiket" name="nama_tiket" required autofocus value="{{ old('nama_tiket', $tickets->nama_tiket) }}">
                @error('nama_tiket')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div><br>
            
            <div class="">
                <label for="deskripsi" class="">Deskripsi</label>
                <input type="text" class="@error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required value="{{ old('deskripsi', $tickets->deskripsi) }}">
                @error('deskripsi')
                <div class=" invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div><br>
    
            <div class="">
                <label for="harga" class="">Harga</label>
                @error('harga')
                <p class="">{{ $message }}</p>
                @enderror
                <input id="harga" type="text" name="harga" value="{{ old('harga', $tickets->harga) }}">
            </div><br>
            <button type="submit" class="">Update Tiket</button>
        </form>
    </div>
</body>
</html>