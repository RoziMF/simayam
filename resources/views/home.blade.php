@extends('layouts.template')

@section('content')

@if(Auth::user()->type == '1')
<section class="content-header">
  <h1>
    Dashboard Customer
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Title</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      Dashboard Customer
    </div>
    <!-- /.box-body -->

  </div>
  <!-- /.box -->

</section>

@elseif (Auth::user()->type == '2')
<section class="content-header">
  <h1>
    Dashboard Karyawan
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Title</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      Dashboard Karyawan
    </div>
    <!-- /.box-body -->

  </div>
  <!-- /.box -->

</section>

@else
<section class="content-header">
  <h1>
    Dashboard Admin
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Title</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      Dashboard Admin
    </div>
    <!-- /.box-body -->

  </div>
  <!-- /.box -->

</section>

@endif

@endsection
