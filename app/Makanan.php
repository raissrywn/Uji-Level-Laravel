<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $primaryKey = 'id_makanan';

    protected $fillable = [
        'nama_makanan', 'harga', 'stok', 'foto'
    ];
}
