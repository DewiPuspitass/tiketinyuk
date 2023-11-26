@extends("layout.app")
@section("main-container")
<div class="container-fluid">
    <!-- enctype = agar bisa menangani 2 hal. yg pertama berbentuk text = request. yg kedua jika berbentuk file = request file -->
    <form method="post" action="/dashboardStaff">
        @csrf
        <div>
            <label for="tiket" class="form-label">Tiket</label>
            <select name="tiket" id="tiket" class="form-select w-25">
                @foreach ( $tickets as $tiket)
                @if(old('ticket_id') == $tiket->id)
                <option value="{{ $tiket->id }}">{{ $tiket->nama_tiket }}</option>
                @else
                <option value="{{ $tiket->id }}">{{ $tiket->nama_tiket }}</option>
                @endif
                @endforeach
            </select>
        </div></br>
        <div class="">
            <label for="nama_wisatawan" form="form-label">Nama Wisatawan</label>
            <input type="text" class=" w-25 form-control @error('nama_wisatawan') is-invalid @enderror" id="nama_wisatawan" name="nama_wisatawan" required autofocus value="{{ old('nama_wisatawan') }}">
            @error('nama_wisatawan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div><br>

        <label for="">Harga Tiket</label>
        <div id="harga-tiket"></div>
        <input type="text" class=" w-25 form-control">
    </form>
    <button type="submit" class="btn btn-primary mt-3">Create Post</button>
</div>
@endsection