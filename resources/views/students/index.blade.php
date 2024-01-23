@extends('students.layout')

@section('content')
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h3 class="fw-bold">
                    Data Mahasiswa
                </h3>
            </div>
            <div class="float-end mx-1">
                <a class="btn btn-danger" href="{{ route('logout') }}">
                    <i class="bi bi-box-arrow-left"></i> Logout
                </a>
            </div>
            <div class="float-end mx-1">
                <a class="btn btn-primary" href="{{ route('students.create') }}">Tambah Data</a>
            </div>
        </div>
    </div>

    {{-- Tampilkan Alert untuk Pesan sukses --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    {{-- Jika Gagal --}}
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif

    {{-- Tabel Daftar Data Mahasiswa --}}
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th width="280px">Action</th>
        </tr>

        {{-- Looping dan ambil semua Data Mahasiswa --}}
        @foreach ($students as $student)
            <tr>
                {{-- Lakukan Looping untuk No.Urut --}}
                <td class="py-3 text-center">{{ ++$i }}</td>

               

                {{-- Tampilkan Data Mahasiwa --}}
                <td class="py-3">{{ $student->nama }}</td>
                <td class="py-3">{{ $student->nim }}</td>
                <td class="py-3">{{ $student->kelas }}</td>
                <td class="py-3">{{ $student->jurusan }}</td>

                {{-- Tombol Aksi --}}
                <td class="py-3">

                    {{-- Buat Form untuk mengirim aksi DELETE ke Controller --}}
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">

                        {{-- Button untuk menampilkan Modal Detail Data Mahasiswa --}}
                        <a href="javascript:void(0)" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#show-student{{ $student->id }}">Detail</a>

                        {{-- Edit Data Mahasiswa --}}
                        <a class="btn btn-secondary" href="{{ route('students.edit', $student->id) }}">Edit</a>

                        {{-- Hapus Data Mahasiswa dengan directive Method DELETE --}}
                        @csrf
                        @method('DELETE')

                        {{-- Konfirmasi sebelum Hapus --}}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    <div class="row text-center">
        {{-- Jika tidak ada data tampilkan pesan tidak ada data yang ditampilkan --}}
        @if ($students->count() == 0)
            <div class="col-md-12">
                <h5 class="text-secondary my-4">Tidak ada data yang bisa ditampilkan</h5>
            </div>
        @endif

        {{-- Tombol Pagination --}}
        <div class="col-md-12">
            {{ $students->links('pagination::bootstrap-5') }}
        </div>

    </div>

    {{-- Modal untuk menampilkan Detail Data Mahasiswa --}}
    @foreach ($students as $student)
        <div class="modal fade" id="show-student{{ $student->id }}" tabindex="-1" aria-labelledby="show-student{{ $student->id }}"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

                {{-- Modal Content --}}
                <div class="modal-content shadow-lg border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="show-student{{ $student->id }}">Detail Data Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        
                            <div class="col-md-8">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $student->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIM</th>
                                        <td>{{ $student->nim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <td>{{ $student->kelas }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jurusan</th>
                                        <td>{{ $student->jurusan }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection