@extends("layout.app")
@section("main-container")
<div class="container-fluid">
    <nav class="navbar">
        <h2 class="navbar-brand">Hallo, {{ Auth::guard('staff')->user()->nama }}</h2>
    </nav>
    <a href="/dashboard" class="h2 text-decoration-none mb-2 pb-2"> My Dashboard</a>
    <table class="table table-striped table-sm mt-5">
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
                    <a href="/dashboard/tickets/{{ $tiket->id }}" class="btn badge bg-info">Detail</a>
                    <a href="/dashboard/tickets/{{ $tiket->id }}/edit" class="btn badge bg-warning">Edit</a>
                    <form action="/dashboard/tickets/{{ $tiket->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button onclick="return confirm('are you sure?')" class="btn badge bg-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table></br>

    <table class="table table-striped table-sm mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Tiket</th>
                <th scope="col">Nama Wisatawan</th>
                <th scope="col">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $pembelian as $p )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->ticket->nama_tiket }}</td>
                <td>{{ $p->nama_wisatawan }}</td>
                <td>{{ $p->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table></br>
    <a href="/dashboardStaff/pembeliantickets" class="btn btn-primary">Pembelian tiket</a><br><br>
    
    <form action="/logout" method="post">
        @csrf
        <button class ="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</button>
    </form>
</div>
@endsection