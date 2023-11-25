<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h4>Nama Tiket : {{ $tickets->nama_tiket }}</h4>
    <h4>Deskripsi : {{ $tickets->deskripsi }}</h4>
    <h4>Harga : {{ $tickets->harga }}</h4>
    <button><a href="/dashboard">Kembali</a></button></br></br>

</div>
</body>
</html>
