<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
<h2>Hallo, {{ Auth::guard('staff')->user()->nama }}</h2>
            <a href="/dashboard"> My Dashboard</a></br></br>
        </li>
        <table class="table table-striped table-sm" border=1>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Tiket</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Harga</th>
            <th scope="col">Action</th>
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
                <a href="/dashboard/tickets/{{ $tiket->id }}" class="badge bg-info"><button>Detail</button></a>
                <a href="/dashboard/tickets/{{ $tiket->id }}/edit" class="badge bg-warning"><button>Edit</button></a>
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

</li>

</div>
</body>
</html>
