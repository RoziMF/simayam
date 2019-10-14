<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = ['nama','tglpengambilan','kuantitas','harga'];
}
