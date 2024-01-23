@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-3">
                <div class="card mt-5 rounded-4 border-2 border-primary shadow">

                    {{-- Jika password atau username salah tampilkan alert javascript --}}
                    @if (session('error'))
                        <script>
                            alert("{{ session('error') }}");
                        </script>
                    @endif

                    <h3 class="text-center mt-4">
                        Registrasi Akun Baru
                    </h3>

                    <form action="{{ route('register.action') }}" method="POST" class="card-body">

                        @csrf

                        <div class="row">

                            <div class="col-6">
                                {{-- Hero Images --}}
                                <img src="{{ Storage::url('public/students/sign-up.webp') }}" class="rounded"
                                    style="object-fit: cover; width: 80%; height: 100%;">
                            </div>

                            <div class="col-6 mt-3 pe-5">

                                <div class="mb-3">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                                </div>
                                <div class="mb-3">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input class="form-control" type="username" name="username"
                                        value="{{ old('username') }}" />
                                </div>
                                <div class="mb-3">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" />
                                </div>
                                <div class="mb-3">
                                    <label>Password Confirmation<span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password_confirm" />
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary">Register</button>
                                    <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection