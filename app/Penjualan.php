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


    public function getDetailPenjualanCountAttribute($value)
    {
        $pcsCount = 0;
        foreach ($this->Penjualan as $data) {
            $pcsCount += $data->kuantitas;
        }

        return count($this->Penjualan).' item, '.$pcsCount.' pcs';
    }

    public static function getPeriode($request)
    {
        $array= array();
        $month = $request->from;
        $i = 0;
        while(date('Y-m', strtotime($month)) <= date('Y-m', strtotime($request->to))) {
            $array[$i] = $month;
            $month = date('Y-m', strtotime("+1 month", strtotime(date($month))));
            $i++;
        }

        return $array;
    }

    public static function getTotal($periode, $data)
    {
        $array = array();
        for($i=0; $i<count($periode); $i++) {
            for($j=0; $j<count($data); $j++) {
                if($periode[$i] == $data[$j]['periode']){
                    $array[$i] = intval($data[$j]['total']);
                    break;
                }else{
                    $array[$i] = 0;
                }
            }
        }
        return $array;
    }


    public static function getDataPenjualan($request)
    {
        $from = $request->from;
        $to = $request->to;

        $data = Penjualan::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as periode, sum(kuantitas) as total')
            ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') >= '$from' AND DATE_FORMAT(created_at, '%Y-%m') <= '$to'")
            ->groupBy('periode')
            ->get();

        return $data;
    }

    public static function getAllDataPenjualan()
    {
        $array = [];
        for($i = 0; $i < 12; $i++) {
            $array[$i] = '';
        }
        // $array[11] = '2018-02'; // diganti get month bulan sekarang
        $array[11] = date('Y-m');
        $i = 10;
        while($i >= 0) {
            $array[$i] = date('Y-m', strtotime("-1 month", strtotime(date($array[$i + 1]))));
            $i--;
        }

        $data = Penjualan::selectRaw('DATE_FORMAT(tanggal, "%Y-%m") as periode, sum(total) as total')
            ->whereRaw("DATE_FORMAT(tanggal, '%Y-%m') >= '$array[0]' AND DATE_FORMAT(tanggal, '%Y-%m') <= '$array[11]'")
            ->groupBy('periode')
            ->get();

        return ['periode' => $array, 'data' => $data];
    }
}
