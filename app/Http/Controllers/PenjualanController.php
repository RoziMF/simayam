<?php

namespace App\Http\Controllers;

use App\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $penjualan = Penjualan::all();
      return view('penjualan', ['penjualan' => $penjualan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form_penjualan', [
          'penjualan' => new Penjualan(),
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
            'nama'=>'required',
            'ambil'=>'required',
            'qty'=>'required'
        ]);

        Penjualan::create([
      		'name' => $request->nama,
      		'tglpengambilan' => $request->ambil,
          'jumlah' => $request->qty
      	]);

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
        $penjualan = Penjualan::findOrFail($id);
        return view('form_penjualan', ['penjualan' => $penjualan]);
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
        $penjualan->name = $request->input('nama');
        $penjualan->tglpengambilan = $request->input('ambil');
        $penjualan->jumlah = $request->input('qty');
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
