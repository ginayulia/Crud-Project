@extends('app')
@section('content')
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-light shadow mx-4 mt-2 p-3">
        <div class="container-fluid">
            {{-- Image Brand --}}
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ Storage::url('public/students/logoweb.jpg') }}" alt="UBSI TEGAL" width="60px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav nav-tabs me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Information</a>
                    </li>
                </ul>
                @guest
                    <a class="btn btn-primary me-2" href="{{ route('login') }}">Login</a>
                    {{-- <a class="btn btn-secondary" href="{{ route('register') }}">Register</a> --}}
                @endguest
            </div>
        </div>
    </nav>

    <div class="hero-container" id="hero-sec">
        <div class="container-fluid ">
            <div class="row d-flex">
                <div class="col align-middle">
                    <div class="px-2 py-2">
                        <img src="{{ Storage::url('public/students/home.png') }}" class="ms-4 mt-2" alt="Hero-Images" width="75%">
                    </div>
                </div>
                <div class="col">
                    <div class="px-5 py-5 mt-5">
                        <div class="px-2 py-2 align-middle">
                            {{-- CTA Brand --}}
                            <h1 class="text-primary fw-bold">Selamat Datang </h1><h2 class="fw-bold">
                            <span class="text-dark">Di Website MyStudents (Pendataan Siswa)</span>
                            </h2>
                            <hr style="width: 200px">
                            <p>
                                Website ini mengenai seputar Data Mahasiswa Di UBSI TEGAL <br>Universitas Bina Sarana Informatika Tegal.
                            </p>
                        </div>
                        <div class="px-2 py-2">
                            <a href="{{ route('register') }}">
                            <button type="button" class="btn btn-outline-primary">Daftar Akun Sekarang</button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="footer">
            <!-- Footer -->
            <footer class="mt-auto bg-primary text-white">
                <!-- Grid container -->
                <div class="container-lg p-1 col-md-6">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-lg-8 col-md-6 mb-6 mb-md-0">
                            <h6>Alamat</h6>
        
                            <p>
                                Jl.Sipelem No.22, (Depan Mall Rita),Tegal Barat
                            </p>
                        </div>

                        <!--Grid column-->
        
                        <!--Grid column-->
                        <div class="col-lg-0 col-md-3 mb-2 mb-md-0 ">
                            <h6>Contact Us</h6>
                            <p><i class="fa fa-envelope-o mr-3"></i> Telp.(0283)325114</p>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </div>
                <!-- Grid container -->
        
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2022 Copyright:
                    <a class="text-white" href="">Universitas Bina Sarana Informatika</a>
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </section>
    @endsection