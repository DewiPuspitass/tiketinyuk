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
    <h1>Login Manager</h1>
    @if(session()->has('success'))
        <div class="" role="alert">
            {{ session('success') }}
            <button type="button" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('loginError'))
        <div class="" role="alert">
            {{ session('loginError') }}
            <button type="button" aria-label="Close"></button>
        </div>
    @endif
    <form actio="/login" method="post">
        @csrf
        <div class="">
            <label for="email">Email address</label></br>
            <input type="email" name="email" class="@error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required></br></br>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <div class="">
            <label for="password">Password</label></br>
            <input type="password" name="password" class="" id="password" placeholder="Password" required></br></br>
        </div>
        
        <button type="submit">Login</button>
    </form>
    <small>Not registered?
        <a href="/register">Register Now!</a>
    </small>
</body>
</html>