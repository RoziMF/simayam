<?php

namespace App\Http\Controllers;

use App\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = Stok::all();
        return view('stok', ['stok' => $stok]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('form_stok', [
        'stok' => new Stok(),
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
            'kandang'=>'required',
            'jmlayam'=>'required'
        ]);

        Stok::create([
          'kandang' => $request->kandang,
          'jmlayam' => $request->jmlayam,
          'keterangan' => $request->keterangan
        ]);

       return redirect('stok')->with('success', 'Data stok telah ditambahkan');
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
      $stok = Stok::findOrFail($id);
      return view('form_stok', ['stok' => $stok]);
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
      $stok = Stok::findOrFail($id);
      $stok->kandang = $request->input('kandang');
      $stok->jmlayam = $request->input('jmlayam');
      $stok->keterangan = $request->input('keterangan');
      $stok->save();
      return redirect('stok');
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
