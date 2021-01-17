<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
   protected $fillable = [
       'nama_donatur',
       'jumlah',
       'tgl_donasi'
   ];
}