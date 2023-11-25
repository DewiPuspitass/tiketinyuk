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
    <form action="/dashboard/staff" method="post">
    @csrf
        <div class="">
            <label for="nama">Nama</label></br>
            <input type="text" name="nama" class="@error('nama')is-invalid @enderror" id="nama" placeholder="Nama" required value="{{ old('nama') }}"></br></br>
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="email">Email</label></br>
            <input type="text" name="email" class="@error('email')is-invalid @enderror" id="email" placeholder="email@gmail.com" required value="{{ old('email') }}"></br></br>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="no_hp">No HP</label></br>
            <input type="text" name="no_hp" class="@error('no_hp')is-invalid @enderror" id="no_hp" placeholder="08xxxxxx" required value="{{ old('no_hp') }}"></br></br>
            @error('no_hp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="">
            <label for="password">Password</label></br>
            <input type="password" name="password" class="@error('password')is-invalid @enderror" id="password" placeholder="Password" required></br></br>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit">Buat akun staff</button>
    </form>
</body>
</html>