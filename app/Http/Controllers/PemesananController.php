<?php

namespace App\Http\Controllers;

use Auth;
use App\Pemesanan;
use App\Harga;
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
      $harga = Harga::all();
      $pemesanan = Pemesanan::all();
      $pemesanan2 = Pemesanan::where('user_id', '=', $id)->get();
      return view('pemesanan', ['pemesanan' => $pemesanan, 'pemesanan2' => $pemesanan2, 'user' => $users, 'harga' => $harga]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('form_pemesanan', [
        'pemesanan' => new Pemesanan(),
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
      $this->validate($request,[
            'userID'=>'required',
            'alamat'=>'required',
            'kirim'=>'required',
            'qty'=>'required'
            // 'harga'=>'required'
        ]);

        Pemesanan::create([
          'user_id' => $request->userID,
          'alamat' => $request->alamat,
          'tglkirim' => $request->kirim,
          'kuantitas' => $request->qty
          // 'harga' =>$request->harga
        ]);

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
      $pemesanan->tglkirim = $request->input('kirim');
      $pemesanan->kuantitas = $request->input('qty');
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
