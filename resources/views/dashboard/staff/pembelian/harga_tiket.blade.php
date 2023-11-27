<!DOCTYPE html>
<html>
<head>
    <title>Cetak Tiket</title>
</head>
<body>
    <h1>Hasil Tiket</h1>

    <form action="/dashboardStaff/cetak-tiket" method="post">
        @csrf
        <!-- <p>Nama Wisatawan: {{$nama_wisatawan}}</p> -->
        <input type="text" id="nama_wisatawan" name="nama_wisatawan" required autofocus value="{{$nama_wisatawan}}" readonly>
        <input type="text" id="jenis_tiket" name="jenis_tiket" required autofocus value="{{$jenisTiket}}" readonly>
        <p>Jumlah Tiket: {{$jumlahTiket}}</p>
        <input type="text" id="jumlah_tiket" name="jumlah_tiket" required autofocus value="{{$jumlahTiket}}" readonly>
        <input type="text" id="harga" name="harga" required autofocus value="{{$harga}}" readonly>
        <input type="text" id="total_harga" name="total_harga" required autofocus value="{{$totalHarga}}" readonly>
        <input type="text" id="total_harga" name="total_harga" required autofocus value="{{$totalHarga}}" readonly>
        <select name="jenis_pembayaran" id="tiket">
            <option name = "" value="">Metode Pembayaran</option>
            <option value="qris">Qris</option>
            <option value="cash">Cash</option>
        </select>
        <button type="submit">Cetak tiket</button>
    </form>

    <a href="/dashboardStaff/pembeliantickets">Kembali</a>

</body>
</html>
