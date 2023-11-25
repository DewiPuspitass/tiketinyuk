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
<form actio="/login" method="post">
    @csrf
    <div class="">
        <label for="email" class="form-label">Email address</label></br>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror w-25" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required></br></br>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="">
        <label for="password" class="form-label">Password</label></br>
        <input type="password" name="password" class="form-control w-25" id="password" placeholder="Password" required></br></br>
    </div>
    <button class="w-25 btn btn-lg btn-primary" type="submit">Login</button>
</form>
<small class="d-block text-center mt-2 w-25">Not registered?
    <a href="/register">Register Now!</a>
</small>
</div>
@endsection