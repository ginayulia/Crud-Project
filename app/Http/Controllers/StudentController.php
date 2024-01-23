<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

    // Method menampilkan Halaman Utama Data Mahasiswa
    public function index()
    {
        // Jika user belum login, maka redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Mengambil semua isi tabel dan tampilkan hanya 5 data per halaman
        $students = Student::latest()->paginate(5);

        // Mengirim data ke view index
        return view('students.index',compact('students'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // Method untuk menampilkan view form tambah data
    public function create()
    {
        return view('students.create');
    }

    // Method untuk insert data ke table
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            // Gambar wajib di isi dan harus berformat gambar (jpg, jpeg, png) dengan ukuran maksimal file 2MB
            'image'  => 'image|mimes:jpeg,png,jpg|max:2048',
            'nama'   => 'required|min:1', // Nama minimal 1 karakter
            'nim'    => 'required|max:8' // NIM maksimal 8 karakter
        ]);

        // Jika gambar diisi, maka upload gambar
        if ($request->hasFile('image')) {

            // Mengambil file yang diupload
            $uploaded_image = $request->file('image');

            // Mengambil extension file
            $extension = $uploaded_image->getClientOriginalExtension();

            // Membuat nama file random berikut extension
            $filename = md5(time()) . '.' . $extension;

            // Menyimpan gambar ke folder public/img
            $path = $uploaded_image->storeAs('public/students', $filename);

            // Insert data ke table students
            Student::create([
                'image' => $filename,
                'nama' => $request->nama,
                'nim' => $request->nim,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan
            ]);
        } else {
            // Jika gambar tidak diisi, insert data ke table students
            Student::create([
                'image' => 'default.png',
                'nama' => $request->nama,
                'nim' => $request->nim,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan
            ]);
        }

        // Redirect ke halaman Daftar Mahasiswa
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    // Method untuk menampilkan halaman edit data Mahasiswa
    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    // Method untuk update data ke table students
    public function update(Request $request, Student $student)
    {
        // Validasi Form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'      => 'required|min:5',
            'nim'       => 'required|max:8'
        ]);

        // Cek apakah user mengupload Foto baru, atau tidak.
        // Jika iya, maka :
        if ($request->hasFile('image')) {

            // Upload Foto Baru
            $image = $request->file('image');
            $image->storeAs('public/students', $image->hashName());

            // Hapus Foto Lama, jika foto lama tidak bernilai "default.png"
            if ($student->image != "default.png") {
                Storage::delete('public/students/' . $student->image);
            }

            // Update Data dengan Foto Baru
            $student->update([
                'image'     => $image->hashName(),
                'nama' => $request->nama,
                'nim' => $request->nim,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan
            ]);

        // Jika tidak mengupload Foto baru, maka :
        } else {

            //Update Data tanpa memperbarui Foto
            $student->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan
            ]);
        }

        // Redirect ke Halaman Daftar Mahasiswa
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    // Method untuk hapus data
    public function destroy(Student $student)
    {
        // Hapus Data Mahasiswa dari database
        $student->delete();

        // Hapus Foto dari folder
        // Jika foto memiliki nilai "default.jpg" maka tidak perlu dihapus
        if ($student->image != "pp.jpg") {
            Storage::delete('public/students/' . $student->image);
        }

        // Redirect
        return redirect()->route('students.index')->with('success','Data Mahasiswa Berhasil Dihapus');
    }
}