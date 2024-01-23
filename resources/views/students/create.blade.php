@extends('students.layout')

@section('content')
    {{-- Header Halaman --}}
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h3 class="fw-bold">
                    Edit Data Mahasiswa
                </h3>
            </div>
            <div class="float-end mx-1">
                <a class="btn btn-secondary" href="{{ route('students.index') }}">Kembali</a>
            </div>
        </div>
    </div>

    {{-- Tampilkan Alert untuk Pesan Error --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Whoops!</strong> Ada yang salah dengan inputan Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Form untuk mengirim data ke Controller --}}
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- Form Input Data Mahasiswa --}}
            <div class="col-6">
                {{-- Input Nama --}}
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                </div>

                {{-- Input NIM --}}
                <div class="form-group mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM">
                </div>

                {{-- Input Kelas --}}
                <div class="form-group mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas">
                </div>

                {{-- Input Jurusan dengan Dropdown 5 jurusan --}}
                <div class="form-group mb-3 dropup">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select class="form-select dropup" id="jurusan" name="jurusan">
                        <option selected disabled>Pilih Jurusan</option>
                        <option value="Teknologi Komputer">Teknologi Komputer</option>
                        <option value="Sistem Informasi ">Sistem Informasi</option>
                        <option value="Sistem Informasi Akuntansi">Sistem Informasi Akuntansi</option>
                        <option value="Akuntansi">Akuntansi</option>
                    </select>
                </div>

            </div>

            {{-- Form Input FOTO --}}
            <div class="col-6">

                {{-- Upload Foto --}}
                <div class="form-group mb-3">
                    <label for="image" class="form-label">Foto Mahasiswa</label>
                    <input type="file" class="form-control" name="image">
                </div>

                {{-- Pesan Aturan mengisi Form  --}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title fw-bold">Perhatian</h5>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Disarankan memiliki rasio 3x4 </li>
                            <li>Ukuran file maksimal 2MB</li>
                            <li>Ekstensi file yang diizinkan adalah .jpg, .jpeg, .png</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Button Submit --}}
        <button type="submit" class="btn btn-primary mb-5 mt-1">Submit</button>
    </form>
@endsection