<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemilik extends Model
{
    use HasFactory;
    protected $table = 'pemilik';
    protected $fillable = ['nik', 'nama', 'tempat_lahir', 'tgl_lahir', 'jekel', 'alamat', 'umur', 'jabatan'];
    protected $primaryKey = 'nik';
    public $timestamps = false;
}
