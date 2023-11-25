<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
<div class="">
    <h1>Edit Staff</h1>
</div>

<div>
    <form method="post" action="/dashboard/staff/edit/{{ $staff->id }}">
        @csrf
        @method('put')
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="">
            <label for="nama" class="">Nama</label>
            <input type="text" class=" @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $staff->nama) }}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div><br>
        <div class="">
            <label for="email" class="">Email</label>
            <input type="text" class="@error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $staff->email) }}">
            @error('email')
            <div class=" invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div><br>
        <div class="">
            <label for="no_hp" class="from-label">No Hp</label>
            @error('no_hp')
            <p class="">{{ $message }}</p>
            @enderror
            <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp', $staff->no_hp) }}">
            <trix-editor input="no_hp"></trix-editor>
        </div><br>

        <!-- <div class="">
            <label for="password" class="">Password</label>
            <input type="text" class="@error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password', $staff->password) }}">
            @error('password')
            <div class=" invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div><br> -->
        <button type="submit" class="">Update Data Staff</button>
    </form>
</div>
</body>
</html>