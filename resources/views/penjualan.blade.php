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
    <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama Lengkap</th>
                  <th>Tanggal Pembelian</th>
                  <th>Tanggal Pengambilan</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Option</th>
                </tr>

                @foreach($penjualan as $key=>$value)
                <tr>
                  <td>{{$value->id}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->created_at}}</td>
                  <td>{{$value->tglpengambilan}}</td>
                  <td>{{$value->kuantitas}}</td>
                  <td>{{$value->harga}}</td>
                  <td><a href="{{ route('penjualan.edit', $value->id)}}" class="btn btn-warning">Edit</a></td>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>
    <!-- /.box-body -->

</section>



@endsection
