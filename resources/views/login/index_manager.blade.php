@extends("layout.app")
@section("main-container")
<div class="container">
<h1>Login Manager</h1>
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="/login" method="post">
            @csrf
            <div class="">
                <label for="email" class="form-label mt-3">Email address</label></br>
                <input type="email" name="email" class="w-25 form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="">
                <label for="password" class="form-label mt-3">Password</label></br>
                <input type="password" name="password" class="w-25 form-control" id="password" placeholder="Password" required>
            </div>
            <button class="w-25 btn btn-lg btn-primary mt-3" type="submit">Login</button>
        </form>
        <small class="d-block text-center mt-3 w-25">Not registered?
            <a href="/register">Register Now!</a>
        </small>
</body>
</html>