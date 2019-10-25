@extends('layouts.template')

@section('content')

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Form Data Penjualan</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
             @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
    @endif

    @if($penjualan->id > 0)
    <form class="form-horizontal" method="post" action="{{ route('penjualan.update', $penjualan->id) }}">
      @csrf
      @method('PUT')
    @else
    <form class="form-horizontal" method="post" action="{{ route('penjualan.store') }}">
      @csrf
    @endif
            <div class="box-body">
              <div class="form-group">
                <label for="inputNama" class="col-sm-3 control-label">Nama Lengkap</label>

                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{ $penjualan->nama }}" name="nama" placeholder="nama">
                </div>
              </div>

              <div class="form-group">
                <label for="tanggalPengambilan" class="col-sm-3 control-label">Tanggal Pengambilan</label>

                <div class="col-sm-6">
                  <input type="date" class="form-control" value="{{ $penjualan->tglpengambilan }}" name="tgl_ambil" placeholder="Tanggal">
                </div>
              </div>

              <div class="form-group">
                <label for="inputjumlah" class="col-sm-3 control-label">Kuantitas</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{ $penjualan->kuantitas }}" name="kuantitas" placeholder="Kuantitas">
                </div>
              </div>

          @if($penjualan->id > 0)
              <div class="form-group">
                <label for="inputharga" class="col-sm-3 control-label">Harga</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{ $penjualan->harga }}" name="harga" placeholder="Harga">
                </div>
              </div>
          @else
          <div class="form-group">
            <label for="inputharga" class="col-sm-3 control-label">Harga</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" value="{{ $harga[0]->harga }}" name="harga" placeholder="Harga" readonly>
            </div>
          </div>
          @endif

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
