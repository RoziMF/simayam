<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = ['user_id','nama','tglpengambilan','kuantitas','harga','kandang_id'];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function stok(){
      return $this->belongsTo('App\Stok');
    }
}
