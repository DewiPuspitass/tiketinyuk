<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    @auth
    <li>
        <h2>Hallo, {{ auth()->user()->nama }}</h2>
        <table border=1>
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
                        <a href="/dashboard/tickets/detail/{{ $tiket->id }}"><button>Detail</button></a>
                        <a href="/dashboard/tickets/edit/{{ $tiket->id }}"><button>Edit</button></a>
                        <form action="/dashboard/tickets/{{ $tiket->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('are you sure?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </br></br>
        
        <button><a href="/dashboard/tickets">Buat tiket baru</a></button></br></br>

        <table border=1>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $staffs as $staff )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $staff->nama }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->no_hp }}</td>
                    <td>
                        <a href="/dashboard/staff/edit/{{ $staff->id }}"><button>Edit</button></a>
                        <form action="/dashboard/staff/{{ $staff->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('are you sure?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </br></br>

        <button><a href="/dashboard/staff">Buat staff baru</a></button></br></br>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</button>
        </form>
    </li>
    
    @else
    <li>
        <a href="/login">login</a>
    </li>
    @endauth
</div>
</body>
</html>
