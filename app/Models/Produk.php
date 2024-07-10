<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $guarded = ['id_produk'];
    protected $primaryKey = 'id_produk';
    public $timestamps = false;
}
