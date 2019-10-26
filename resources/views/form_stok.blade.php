@extends('layouts.template')

@section('content')

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Form Stok Ayam</h3>

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

    @if($stok->id > 0)
    <form class="form-horizontal" method="post" action="{{ route('stok.update', $stok->id) }}">
      @csrf
      @method('PUT')
    @else
    <form class="form-horizontal" method="post" action="{{ route('stok.store') }}">
      @csrf
    @endif
            <div class="box-body">
              <div class="form-group">
                <label for="inputNama" class="col-sm-3 control-label">Kandang</label>

                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{ $stok->kandang }}" name="kandang" placeholder="Kandang">
                </div>
              </div>

              <div class="form-group">
                <label for="inputjumlah" class="col-sm-3 control-label">Jumlah Ayam</label>

                <div class="col-sm-6">
                  <input type="text" class="form-control" value="{{ $stok->jmlayam }}" name="jmlayam" placeholder="Masukkan Jumlah Ayam">
                </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-6">
                  <textarea class="form-control" rows="3" value="{{ $stok->keterangan }}" placeholder="Masukkan Keterangan" name="keterangan"></textarea>
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
