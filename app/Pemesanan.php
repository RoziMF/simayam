<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
  protected $fillable = ['user_id','alamat','tglkirim','kuantitas','harga'];

  public function user(){
    return $this->belongsTo('App\User');
  }
}
