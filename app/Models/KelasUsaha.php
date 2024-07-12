<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelasUsaha extends Model
{
    public static function getall()
    {
        return [
            'Mikro',
            'Kecil',
            'Menengah'
        ];
    }
}
