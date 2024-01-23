<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        User::truncate();

        // Akun milik Andika Tulus Pangestu
        DB::table('users')->insert([
            'name' => 'Andika Tulus Pangestu',
            'username' => 'andikatulusp',
            'password' => Hash::make('andika'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Akun milik Nafatul Adistianingrum
        DB::table('users')->insert([
            'name' => 'Nafatul Adistianingrum',
            'username' => 'nafatul',
            'password' => Hash::make('nafatul'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}