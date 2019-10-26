<?php

namespace App\Http\Controllers;

use Auth;
use App\Pemesanan;
use App\Harga;
use App\Stok;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::id();
      $users = \App\User::all();
      $pemesanan = Pemesanan::all();
      $pemesanan2 = Pemesanan::where('user_id', '=', $id)->get();
      return view('pemesanan', ['pemesanan' => $pemesanan, 'pemesanan2' => $pemesanan2, 'user' => $users]);
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
      return view('form_pemesanan', [
        'pemesanan' => new Pemesanan(),
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
            'alamat'=>'required',
            'tgl_kirim'=>'required',
            'kuantitas'=>'required|numeric|min:1',
            'harga'=>'required|numeric|min:1'
        ],$messages);

        Pemesanan::create([
          'user_id' => $request->userID,
          'alamat' => $request->alamat,
          'tglkirim' => $request->tgl_kirim,
          'kuantitas' => $request->kuantitas,
          'harga' =>$request->harga,
          'kandang_id' => $request->kandangID
        ]);

        $stok = Stok::findOrFail($request->kandangID);
        $stok->jmlayam = $stok->jmlayam - $request->kuantitas;
        $stok->save();

       return redirect('pemesanan')->with('success', 'Data pemesanan telah ditambahkan');
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
      $pemesanan = Pemesanan::findOrFail($id);
      return view('form_pemesanan', ['pemesanan' => $pemesanan]);
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
      $pemesanan = Pemesanan::findOrFail($id);
      $pemesanan->alamat = $request->input('alamat');
      $pemesanan->tglkirim = $request->input('tgl_kirim');
      $pemesanan->kuantitas = $request->input('kuantitas');
      $pemesanan->harga = $request->input('harga');
      $pemesanan->save();
      return redirect('pemesanan');
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
}
