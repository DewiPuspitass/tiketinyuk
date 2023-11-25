<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <h2>Hallo, {{ Auth::guard('staff')->user()->nama }}</h2>
    <table class="table table-striped table-sm" border=1>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Tiket</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $tickets as $tiket )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tiket->nama_tiket }}</td>
                <td>{{ $tiket->deskripsi }}</td>
                <td>{{ $tiket->harga }}</td>
                <td>
                    <a href="/dashboard/tickets/{{ $tiket->id }}"><button>Detail</button></a>
                    <a href="/dashboard/tickets/{{ $tiket->id }}/edit"><button>Edit</button></a>
                    <form action="/dashboard/tickets/{{ $tiket->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button onclick="return confirm('are you sure?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table></br>
    
    <button><a href="/dashboard/pembeliantickets">Pembelian tiket</a></button></br></br>
    
    <form action="/logout" method="post">
        @csrf
        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</button>
    </form>
</body>
</html>
