@extends('layouts.template')

@section('content')


<section class="content-header">
  <h1>
    Penjualan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Penjualan</li>
  </ol>
</section>
<section class="content">
  <!-- /.box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Lihat Data Penjualan</h3>

      <div class="box-tools pull-right">
        <a href="{{ route('penjualan.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle">Tambah Data</i></a>
      </div>

      <div class="input-group input-group-sm hidden-xs pull-right" style="width: 200px; margin-right: 10px;">
        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

        <div class="input-group-btn">
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
      </div>

    </div>

    @if(Auth::user()->type == '2')
    <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nama Karyawan</th>
                  <th>Nama Customer</th>
                  <th>Tanggal Pembelian</th>
                  <th>Tanggal Pengambilan</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th>Option</th>
                </tr>

                @foreach($penjualan2 as $key=>$value)
                <tr>
                  <td>{{$value->user->name}}</td>
                  <td>{{$value->nama}}</td>
                  <td>{{$value->created_at}}</td>
                  <td>{{$value->tglpengambilan}}</td>
                  <td>{{$value->kuantitas}}</td>
                  <td>@currency($value->harga)</td>
                  <td>@currency($value->kuantitas*$value->harga)</td>
                  <td><a href="{{ route('penjualan.edit', $value->id)}}" class="btn btn-warning">Edit</a></td>
                @endforeach
              </table>
              <br>

              <form class="form-horizontal" method="get" action="{{route('pdf')}}">
                @csrf


                        <div class="form-group">
                          <label for="inputharga" class="col-sm-1 control-label">Dari</label>

                          <div class="col-sm-3">
                            <input type="date" class="form-control" name="dari">
                          </div>

                          <label for="inputharga" class="col-sm-1 control-label">Sampai</label>

                          <div class="col-sm-3">
                            <input type="date" class="form-control" name="sampai">
                          </div>

                          <button type="submit" class="btn btn-primary col-sm-1">CETAK</button>
                        </div>

                    </form>
              <!-- <a href="{{route('pdf')}}" class="pull-right btn btn-primary">CETAK</a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      @elseif(Auth::user()->type == '3')
      <div class="box-body">
        <div class="row">
          <div class="col-xs-12">
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>Nama Karyawan</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Pembelian</th>
                    <th>Tanggal Pengambilan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                    <th>Option</th>
                  </tr>

                  @foreach($penjualan as $key=>$value)
                  <tr>
                    <td>{{$value->user->name}}</td>
                    <td>{{$value->nama}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->tglpengambilan}}</td>
                    <td>{{$value->kuantitas}}</td>
                    <td>@currency($value->harga)</td>
                    <td>@currency($value->kuantitas*$value->harga)</td>
                    <td><a href="{{ route('penjualan.edit', $value->id)}}" class="btn btn-warning">Edit</a></td>
                  @endforeach
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>

      @else

      @endif

    </div>
    <!-- /.box-body -->

</section>



@endsection
