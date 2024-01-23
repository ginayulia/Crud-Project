<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel dan field
    //fillable untuk mendeskripsikan variabel 
    protected $fillable = [
        'image','nama','nim', 'kelas','jurusan'
    ];
}