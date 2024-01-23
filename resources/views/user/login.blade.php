@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 pt-3">
                <div class="card mt-5 rounded-4 border-2 border-primary shadow">

                    {{-- Jika password atau username salah tampilkan alert --}}
                    @if (session('error'))
                        <script>
                            alert("{{ session('error') }}");
                        </script>

                    {{-- Jika sukses register --}}
                    @elseif (session('success'))
                        <script>
                            alert("{{ session('success') }}");
                        </script>
                    @endif


                    <form action="{{ route('login.action') }}" method="POST" class="card-body p-lg-5">

                        @csrf

                        <div class="text-center mb-4">
                            <img src="{{ Storage::url('public/students/logoweb.jpg') }}" class="rounded"
                                style="object-fit: cover; width: 100px; height: 100px;">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="Username" type="username" name="username"
                                placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="password" name="password" placeholder="Masukan Password" />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5 mb-5 w-100">Login</button>
                        </div>

                        <div class="form-text text-center mb-2 text-dark">Belum Punya Akun? <a
                                href="{{ route('register') }}" class="text-dark fw-bold">Daftar Sekarang</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection