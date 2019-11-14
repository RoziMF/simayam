@extends('layouts.template')

@section('content')

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Form Pengeluaran</h3>

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

    <form class="form-horizontal" method="post" action="{{ route('pengeluaranStore') }}">
      @csrf

            <div class="box-body">
              <div class="form-group">
                <label for="inputharga" class="col-sm-3 control-label">Uang Keluar</label>

                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="Masukkan Uang Keluar" name="uang_keluar">
                </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-6">
                  <textarea class="form-control" rows="3" placeholder="Masukkan Keterangan" name="keterangan"></textarea>
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
