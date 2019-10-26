<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
  protected $fillable = ['user_id','alamat','tglkirim','kuantitas','harga','kandang_id'];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function stok(){
    return $this->belongsTo('App\Stok');
  }
}
