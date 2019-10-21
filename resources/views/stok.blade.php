@extends('layouts.template')

@section('content')


<section class="content-header">
  <h1>
    Stok Ayam
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Stok</li>
  </ol>
</section>
<section class="content">
  <!-- /.box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Lihat Stok Tersedia</h3>

      @if(Auth::user()->type == '3')
      <div class="box-tools pull-right">
        <a href="{{ route('stok.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle">Tambah Data</i></a>
      </div>
      @else

      @endif

    </div>


    <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Kandang</th>
                  <th>Jumlah Ayam</th>
                  <th>Keterangan</th>
                  <th>Option</th>
                </tr>

                @foreach($stok as $key=>$value)
                <tr>
                  <td>{{$value->kandang}}</td>
                  <td>{{$value->jmlayam}}</td>
                  <td>{{$value->keterangan}}</td>
                  <td><a href="{{ route('stok.edit', $value->id)}}" class="btn btn-warning">Edit</a></td>
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
