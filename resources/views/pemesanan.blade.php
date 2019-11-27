@extends('layouts.template')

@section('content')


<section class="content-header">
  <h1>
    Pemesanan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pemesanan</li>
  </ol>
</section>
<section class="content">
  <!-- /.box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Lihat Data Pemesanan</h3>

      @if(Auth::user()->type == '1')
      <div class="box-tools pull-right">
        <a href="{{ route('pemesanan.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle">Tambah Data</i></a>
      </div>
      @else

      @endif

      <div class="input-group input-group-sm hidden-xs pull-right" style="width: 200px; margin-right: 10px;">
        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
        <div class="input-group-btn">
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
      </div>

    </div>


    @if(Auth::user()->type == '1')
    <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nama Lengkap</th>
                  <th>Alamat</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Tanggal Pengiriman</th>
                  <th>Kuantitas</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th>Option</th>
                </tr>

                @foreach($pemesanan2 as $key=>$value)
                <tr>
                  <td>{{$value->user->name}}</td>
                  <td>{{$value->alamat}}</td>
                  <td>{{$value->created_at}}</td>
                  <td>{{$value->tglkirim}}</td>
                  <td>{{$value->kuantitas}}</td>
                  <td>@currency($value->harga)</td>
                  <td>@currency($value->kuantitas*$value->harga)</td>
                  <td><a href="{{ route('pemesanan.edit', $value->id)}}" class="btn btn-warning">Edit</a></td>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    @else
    <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nama Lengkap</th>
                  <th>Alamat</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Tanggal Pengiriman</th>
                  <th>Kuantitas</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th>Option</th>
                </tr>

                @foreach($pemesanan as $key=>$value)
                <tr>
                  <td>{{$value->user->name}}</td>
                  <td>{{$value->alamat}}</td>
                  <td>{{$value->created_at}}</td>
                  <td>{{$value->tglkirim}}</td>
                  <td>{{$value->kuantitas}}</td>
                  <td>@currency($value->harga)</td>
                  <td>@currency($value->kuantitas*$value->harga)</td>
                  <td><a href="{{ route('pemesanan.edit', $value->id)}}" class="btn btn-warning">Edit</a></td>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->

            <form class="form-horizontal" method="get" action="{{route('pdforder')}}">
              @csrf


                      <div class="form-group">
                        <label for="inputharga" class="col-xs-1 control-label">Dari</label>

                        <div class="col-sm-3">
                          <input type="date" class="form-control" name="dari">
                        </div>

                        <label for="inputharga" class="col-xs-1 control-label">Sampai</label>

                        <div class="col-sm-3">
                          <input type="date" class="form-control" name="sampai">
                        </div>

                        <button type="submit" class="btn btn-primary col-xs-1">CETAK</button>
                      </div>


                  </form>

          </div>
          <!-- /.box -->

        </div>



      </div>

      @endif

    </div>
    <!-- /.box-body -->

</section>



@endsection
