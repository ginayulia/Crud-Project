<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Student::truncate();

        // Mahasiswa Satu
        DB::table('students')->insert([
            'image' => 'default.png',
            'nama' => 'Andika Tulus Pangestu',
            'nim' => '12210940',
            'kelas' => '13.3A.35',
            'jurusan' => 'Sistem Informasi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Mahasiswa Dua
        DB::table('students')->insert([
            'image' => 'default.png',
            'nama' => 'Nafatul Adistianingrum',
            'nim' => '12211361',
            'kelas' => '13.3C.35',
            'jurusan' => 'Sistem Informasi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Mahasiswa Tiga
        DB::table('students')->insert([
            'image' => 'default.png',
            'nama' => 'Leonardo Di Caprio',
            'nim' => '12218976',
            'kelas' => '13.3D.35',
            'jurusan' => 'Multimedia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Mahasiswa Empat
        DB::table('students')->insert([
            'image' => 'default.png',
            'nama' => 'Jan Vertonghen',
            'nim' => '12210987',
            'kelas' => '13.4A.25',
            'jurusan' => 'Olahraga',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Mahasiswa Lima
        DB::table('students')->insert([
            'image' => 'default.png',
            'nama' => 'Dani Pedrosa',
            'nim' => '12215679',
            'kelas' => '13.4C.35',
            'jurusan' => 'Otomotif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Mahasiswa Enam
        DB::table('students')->insert([
            'image' => 'default.png',
            'nama' => 'Nazril Ilham',
            'nim' => '12213476',
            'kelas' => '13.2A.37',
            'jurusan' => 'Seni Musik',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}