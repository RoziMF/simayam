@extends('layouts.template')

@section('content')


<section class="content-header">
  <h1>
    Laporan Keuangan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Keuangan</li>
  </ol>
</section>
<section class="content">
  <!-- /.box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Laporan Uang Masuk</h3>

    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-xs-6">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Uang Masuk (Penjualan)</th>
                  <th>Tanggal</th>
                </tr>

                @foreach($penjualan as $key=>$value)
                <tr>
                  <td>@currency($value->kuantitas*$value->harga)</td>
                  <td>{{$value->updated_at}}</td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="col-xs-6">
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>Uang Masuk (Pemesanan)</th>
                    <th>Tanggal</th>
                  </tr>

                  @foreach($pemesanan as $key=>$value)
                  <tr>
                    <td>@currency($value->kuantitas*$value->harga)</td>
                    <td>{{ $value->updated_at }}</td>
                  </tr>
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


    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Laporan Uang Keluar</h3>
        @if(Auth::user()->type == '1')

        @else
        <div class="box-tools pull-right">
          <a href="{{ route('pengeluaranCreate') }}" class="btn btn-warning"><i class="fa fa-plus-circle">Tambah Pengeluaran</i></a>
        </div>

        @endif

      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-xs-12">
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>Uang Keluar</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                  </tr>

                  @foreach($pengeluaran as $key=>$value)
                  <tr>
                    <td>@currency($value->uang_keluar)</td>
                    <td>{{$value->updated_at}}</td>
                    <td>{{$value->keterangan}}</td>
                  </tr>
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
