<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ukm extends Model
{
    use HasFactory;
    protected $table = 'ukm';
    protected $guarded = ['id_ukm'];
    protected $primaryKey = 'id_ukm';
    public $timestamps = false;
}
