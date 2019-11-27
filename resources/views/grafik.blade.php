@extends('layouts.template')

@section('content')

<!-- <div id="app">
  <example-component></example-component>
</div> -->

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Grafik Peramalan</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>

  <div class="box-body">


          <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="box box-info">
                  {!! $line->html() !!}
                  <!-- /.box-body -->
                  <br>
                  {!! $err->html() !!}
                </div>
                <!-- /.box -->

  <!-- /.box-body -->
    </div>

  <!-- /.box-body -->
    </div>
</div>
<!-- <script>

</script> -->
{!! Charts::scripts() !!}
{!! $line->script() !!}
{!! $err->script() !!}
@endsection
