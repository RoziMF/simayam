@extends('layouts.template')

@section('content')

<!-- <div id="app">
  <example-component></example-component>
</div> -->

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Hitung Peramalan Penjualan</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <form class="form-horizontal" method="post" action="{{ route('peramalan.store') }}">
      @csrf

            <div class="box-body" >
              <div class="row col-sm-12">

              <div class="form-group">
                <label for="inputharga" class="col-sm-2 control-label">Periode Awal</label>

                <div class="col-sm-3">
                  <input type="text" class="form-control" name="from" placeholder="YYYY-MM">
                </div>

                <label for="inputharga" class="col-sm-2 control-label">Periode Akhir</label>

                <div class="col-sm-3">
                  <input type="text" class="form-control" name="to" placeholder="YYYY-MM">
                </div>

                <button type="submit" class="btn btn-info pull-right">Hitung Peramalan</button>
              </div>

              </div>

            <!-- /.box-body -->

            <!-- /.box-footer -->
            </div>
          </form>

  <!-- /.box-body -->
    </div>
</div>



<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Hitung Peramalan Pemesanan</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <form class="form-horizontal" method="post" action="{{ route('peramalan0.store') }}">
      @csrf

            <div class="box-body row col-sm-12" >
              <!-- <div class="row col-sm-12"> -->

              <div class="form-group">
                <label for="inputharga" class="col-sm-2 control-label">Periode Awal</label>

                <div class="col-sm-3">
                  <input type="text" class="form-control" name="from" placeholder="YYYY-MM">
                </div>

                <label for="inputharga" class="col-sm-2 control-label">Periode Akhir</label>

                <div class="col-sm-3">
                  <input type="text" class="form-control" name="to" placeholder="YYYY-MM">
                </div>

                <button type="submit" class="btn btn-info pull-right">Hitung Peramalan</button>
              </div>

              <!-- </div> -->

            <!-- /.box-body -->

            <!-- /.box-footer -->
            </div>
          </form>

  <!-- /.box-body -->
    </div>
</div>

@endsection
