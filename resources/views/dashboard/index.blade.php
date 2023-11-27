@extends("layout.app")
@section("main-container")
<div class="container-fluid">
    @auth
    <nav class="navbar">
        <h2 class="nav navbar-brand">Hallo, {{ auth()->user()->nama }}</h2>
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
                    <a href="/dashboard/tickets/detail/{{ $tiket->id }}" class="btn btn-primary badge bg-info">Detail</a>
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
    </table>
    </br></br>
    <div class="container-fluid d-flex flex-direction-row w-100 justify-content-end align0-content-end">
        <a href="/dashboard/tickets" class="btn btn-primary">Buat tiket baru</a>
        <div class="p-2"></div>
        <a href="/dashboard/staff" class="btn btn-secondary">Buat staff baru</a>
        <div class="p-2"></div>
        <form action="/logout" method="post">
            @csrf
            <button class ="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</button>
        </form>
    </div>
    @else
    <li>
        <a href="/login">login</a>
    </li>
    @endauth
</div>
@endsection