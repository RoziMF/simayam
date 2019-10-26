<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $fillable = ['kandang','jmlayam','keterangan'];

    public function pesan(){
    	return $this->hasMany('App\Pemesanan');
    }

    public function jual(){
    	return $this->hasMany('App\Penjualan');
    }
}
