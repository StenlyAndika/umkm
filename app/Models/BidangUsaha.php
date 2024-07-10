<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BidangUsaha extends Model
{
    use HasFactory;
    protected $table = 'bidang_usaha';
    protected $guarded = ['id_bdng_ush'];
    protected $primaryKey = 'id_bdng_ush';
    public $timestamps = false;
}
