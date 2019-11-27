@extends('layouts.template')

@section('content')


<section class="content-header">
  <h1>
    Harga
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Harga</li>
  </ol>
</section>
<section class="content">
  <!-- /.box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Lihat Harga Saat Ini</h3>

    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Harga</th>
                  <th>Option</th>
                </tr>

                @foreach($harga as $key=>$value)
                <tr>
                  <td>@currency($value->harga)</td>
                  <td><a href="{{ route('harga.edit', $value->id)}}" class="btn btn-warning">Edit</a></td>
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
