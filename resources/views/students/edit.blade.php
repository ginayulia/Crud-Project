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

    {{-- Form untuk mengirim data ke Controller --}}
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            {{-- Form Input Data Mahasiswa --}}
            <div class="col-6">
                {{-- Input Nama --}}
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $student->nama }}"
                        placeholder="Masukkan Nama">
                </div>

                {{-- Input NIM --}}
                <div class="form-group mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ $student->nim }}"
                        placeholder="Masukkan NIM">
                </div>

                {{-- Input Kelas --}}
                <div class="form-group mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $student->kelas }}"
                        placeholder="Masukkan Kelas">
                </div>

                {{-- Input Edit Jurusan dengan Dropdown --}}
                <div class="form-group mb-3 dropup">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select class="form-select dropup" id="jurusan" name="jurusan">
                        <option value="Teknologi Komputer" {{ $student->jurusan == 'Teknologi Komputer' ? 'selected' : '' }}>
                            Teknologi Komputer</option>
                        <option value="Sistem Informasi" {{ $student->jurusan == 'Sistem Informasi' ? 'selected' : '' }}>
                            Sistem Informasi</option>
                        <option value="Sistem Informasi Akuntansi" {{ $student->jurusan == 'Sistem Informasi Akuntansi' ? 'selected' : '' }}>
                            Sistem Informasi Akuntansi</option>
                        <option value="Akuntansi" {{ $student->jurusan == 'Akuntansi' ? 'selected' : '' }}>
                            Akuntansi</option>
                    </select>
                </div>

            </div>

            {{-- Form Input FOTO --}}
            <div class="col-6">
                {{-- Foto Lama --}}
                <div class="form-group mb-3">
                    <label for="image" class="form-label">Foto Lama</label>
                    <br>
                    <img src="{{ Storage::url('public/students/') . $student->image }}"
                        class="rounded img-thumbnail shadow-sm" style="object-fit: cover; width: 100px; height: 120px;">
                </div>

                {{-- Foto Baru --}}
                <div class="form-group mb-5">
                    <label for="image" class="form-label">Foto Baru</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
        </div>

        {{-- Button Submit --}}
        <button type="submit" class="btn btn-primary mb-5 mt-1">Submit</button>
    </form>
@endsection