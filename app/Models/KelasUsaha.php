<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelasUsaha extends Model
{
    use HasFactory;
    protected $table = 'kelas_usaha';
    protected $guarded = ['id_kls_ush'];
    protected $primaryKey = 'id_kls_ush';
    public $timestamps = false;
}
