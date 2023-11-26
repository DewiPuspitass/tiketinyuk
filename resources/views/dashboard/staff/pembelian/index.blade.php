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
        <form method="post" action="/dashboardStaff">
            @csrf
            <div>
                <label for="tiket">Tiket</label>
                <select name="tiket" id="tiket">
                    @foreach ( $tickets as $tiket)
                    @if(old('ticket_id') == $tiket->id)
                    <option value="{{ $tiket->id }}">{{ $tiket->nama_tiket }}</option>
                    @else
                    <option value="{{ $tiket->id }}">{{ $tiket->nama_tiket }}</option>
                    @endif
                    @endforeach
                </select>
            </div></br>

            <div class="">
                <label for="nama_wisatawan">Nama Wisatawan</label>
                <input type="text" class="@error('nama_wisatawan') is-invalid @enderror" id="nama_wisatawan" name="nama_wisatawan" required autofocus value="{{ old('nama_wisatawan') }}">
                @error('nama_wisatawan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <label for="">Harga Tiket</label>
            <div id="harga-tiket"></div><br>

            <button type="submit">Create Post</button>
        </form>
    </div>

<script>
 // Mendapatkan elemen select tiket
 const selectTiket = document.getElementById('tiket');
    // Mendapatkan elemen tempat untuk menampilkan harga
    const hargaTiket = document.getElementById('harga-tiket');

    // Event listener ketika pemilihan tiket berubah
    selectTiket.addEventListener('change', function() {
        const tiketId = selectTiket.value;
        fetch(`/dashboard/pembeliantickets/harga/${tiketId}`)
            .then(response => response.json())
            .then(data => {
                // Menampilkan harga tiket yang dipilih
                hargaTiket.innerHTML = `<p>Harga Tiket yang Dipilih: $${data.harga}</p>`;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
</body>
</html>