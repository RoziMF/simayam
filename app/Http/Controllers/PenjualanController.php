<?php

namespace App\Http\Controllers;

use Auth;
use App\Penjualan;
use App\Stok;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function pdf(Request $request)
     {
      $id = Auth::id();
      $dari = $request->dari;
      $sampai = $request->sampai;

     	$penjualan = Penjualan::where('user_id', '=', $id)
      ->where('created_at', '>=', $dari, 'and', '<=', $sampai)
      ->get();
      $users = Auth::user();

     	$pdf = PDF::loadview('penjualan_pdf', ['penjualan'=>$penjualan, 'users' => $users]);
     	return $pdf->stream();
     }

    public function index()
    {
      $id = Auth::id();
      $users = \App\User::all();
      $penjualan = Penjualan::all();
      $penjualan2 = Penjualan::where('user_id', '=', $id)->get();
      return view('penjualan', ['penjualan' => $penjualan, 'penjualan2' => $penjualan2, 'user' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kandang = \App\Stok::all();
        $harga = DB::table('hargas')->select('harga')->get();
        return view('form_penjualan', [
          'penjualan' => new Penjualan(),
          'harga' => $harga,
          'kandang' => $kandang,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $messages = [
        'required' => ':attribute tidak boleh kosong!',
        'min' => ':attribute terlalu kecil!',
        'numeric' => ':attribute harus diisi angka!!!',
      ];

      $this->validate($request,[
            'userID'=>'required',
            'kandangID'=>'required',
            'nama'=>'required',
            'tgl_ambil'=>'required',
            'kuantitas'=>'required|min:1|numeric',
            'harga'=>'required|min:1|numeric'
        ],$messages);

        Penjualan::create([
          'user_id' => $request->userID,
      		'nama' => $request->nama,
      		'tglpengambilan' => $request->tgl_ambil,
          'kuantitas' => $request->kuantitas,
          'harga' =>$request->harga,
          'kandang_id' => $request->kandangID
      	]);

        $stok = Stok::findOrFail($request->kandangID);
        $stok->jmlayam = $stok->jmlayam - $request->kuantitas;
        $stok->save();

       return redirect('penjualan')->with('success', 'Data penjualan telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kandang = \App\Stok::all();
        $penjualan = Penjualan::findOrFail($id);
        return view('form_penjualan', ['penjualan' => $penjualan,'kandang'=>$kandang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->kandang_id = $request->input('kandangID');
        $penjualan->nama = $request->input('nama');
        $penjualan->tglpengambilan = $request->input('tgl_ambil');
        $penjualan->kuantitas = $request->input('kuantitas');
        $penjualan->harga = $request->input('harga');
        $penjualan->save();
        return redirect('penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }






    // public function route()
    // {
    //     return view('penjualan');
    // }

    // public function penjualan()
    // {
    //     $penjualan=\App\Penjualan::all();
    //     return view('penjualan',compact('penjualans'));
    // }
}
