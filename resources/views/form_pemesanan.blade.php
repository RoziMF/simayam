@extends('layouts.template')

@section('content')

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Form Data Pemesanan</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    @if($pemesanan->id > 0)
    <form class="form-horizontal" method="post" action="{{ route('pemesanan.update', $pemesanan->id) }}">
      @csrf
      @method('PUT')
    @else
    <form class="form-horizontal" method="post" action="{{ route('pemesanan.store') }}">
      @csrf
    @endif
            <div class="box-body">
              <input type="hidden" class="form-control" value="{{ Auth::user()->id }}" name="userID">
              <div class="form-group">
                <label for="inputNama" class="col-sm-3 control-label">Alamat</label>

                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{ $pemesanan->alamat }}" name="alamat" placeholder="Masukkan Alamat">
                </div>
              </div>
              <div class="form-group">
                <label for="tanggalPengambilan" class="col-sm-3 control-label">Tanggal Pengiriman</label>

                <div class="col-sm-6">
                  <input type="date" class="form-control" value="{{ $pemesanan->tglkirim }}" name="kirim" placeholder="Tanggal">
                </div>
              </div>
              <div class="form-group">
                <label for="inputjumlah" class="col-sm-3 control-label">Kuantitas</label>

                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{ $pemesanan->kuantitas }}" name="qty" placeholder="Kuantitas">
                </div>
              </div>
              <div class="form-group">
                <label for="inputharga" class="col-sm-3 control-label">Harga</label>

                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{ $pemesanan->harga }}" name="harga">
                </div>
              </div>

            <!-- /.box-body -->
            <div class="box-footer col-sm-offset-7 col-sm-2">
              <button type="submit" class="btn btn-info pull-right">Simpan</button>
            </div>
            <!-- /.box-footer -->
            </div>
          </form>

  <!-- /.box-body -->
</div>
</div>

@endsection
