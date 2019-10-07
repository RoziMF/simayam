<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = ['name','tglpengambilan','kuantitas','harga'];
}
