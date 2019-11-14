<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Pengeluaran;
use App\Penjualan;

class KeuanganController extends Controller
{
  public function index()
  {
    $penjualan = Penjualan::all();
    $pemesanan = Pemesanan::all();
    $pengeluaran = Pengeluaran::all();
    return view('keuangan', ['pemesanan' => $pemesanan, 'penjualan' => $penjualan, 'pengeluaran' => $pengeluaran]);
  }

  public function pengeluaranCreate()
  {
      return view('form_pengeluaran', [
        'pengeluaran' => new Pengeluaran(),
      ]);
  }

  public function pengeluaranStore(Request $request)
  {
    $messages = [
      'required' => ':attribute tidak boleh kosong!',
      'min' => ':attribute terlalu kecil!',
      'numeric' => ':attribute harus diisi angka!!!',
    ];

    $this->validate($request,[
          'uang_keluar'=>'required|numeric|min:1',
          'keterangan'=>'required'
      ],$messages);

      Pengeluaran::create([
        'uang_keluar' =>$request->uang_keluar,
        'keterangan' => $request->keterangan
      ]);

     return redirect('keuangan')->with('success', 'Data Pengeluaran telah ditambahkan');
  }






}
