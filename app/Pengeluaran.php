<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $guarded = []; 
    
    protected $fillabel = [
        'item',
        'jumlah',
        'tanggal',
        'bukti'
    ];
}
