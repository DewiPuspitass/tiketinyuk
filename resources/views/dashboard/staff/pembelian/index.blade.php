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
    <div class="">
        @foreach ( $tickets as $tiket)
        <form method="post" action="/dashboardStaff/hargatiket/{{$tiket->id}}">
            @csrf
            <div>
                <label for="tiket">Tiket</label>
                <select name="jenis_tiket" id="tiket">
                <option name = "" value="">Nama tiket</option>
                    @if(old('ticket_id') == $tiket->id)
                    <option name = "id_tiket" value="{{ $tiket->id }}">{{ $tiket->nama_tiket }}</option>
                    @else
                    <option name = "id_tiket" value="{{ $tiket->id }}">{{ $tiket->nama_tiket }}</option>
                    @endif
                    @endforeach
                </select>
            </div></br>

            <div class="">
                <label for="nama_wisatawan">Atas nama</label>
                <input type="text" class="@error('nama_wisatawan') is-invalid @enderror" placeholder="Nama wisatawan" id="nama_wisatawan" name="nama_wisatawan" required autofocus value="{{ old('nama_wisatawan') }}">
                @error('nama_wisatawan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <label for="">Jumlah</label>
            <input type="number" name="jumlah_tiket" placeholder="0" id="jumlah_tiket">

            <button type="submit">Checkout</button>
        </form>
    </div>
</body>
</html>