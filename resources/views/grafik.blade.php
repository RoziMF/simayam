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
                  <div class="box-header with-border">
                    <h3 class="box-title">Line Chart</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body" style="height:400px">
                    <div>
                      <canvas id="lineChart2"></canvas>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->

  <!-- /.box-body -->
    </div>

  <!-- /.box-body -->
    </div>
</div>
<!-- <script>

</script> -->

@endsection

@section('script')

//CHAAARTTT
        //
        // var url = "{{url('peramalan/store')}}";
        // var labels = new Array();
        // var peramalan = new Array();
        // var aktual = new Array();
        // var alpha = new Array();
        // $(document).ready(function(){
        //   $.get(url, function(response){
        //     response.forEach(function(data){
        //         labels.push(data.periode);
        //         peramalan.push(data.peramalan);
        //         aktual.push(data.aktual);
        //         alpha.push(data.alpha);
        //     });
        //     var ctx = document.getElementById("lineChart").getContext('2d');
        //     var ctx = document.getElementById("lineChart2").getContext('2d');
        //         var myChart = new Chart(ctx, {
        //           type: 'line',
        //           data: {
        //               labels:labels,
        //               datasets: [{
        //                 label: 'peramalan',
        //                 borderColor: '#13ce66',
        //                 pointBackgroundColor: 'white',
        //                 borderWidth: 2,
        //                 pointBorderColor: '#13ce66',
        //                 backgroundColor: 'transparent',
        //                 data: peramalan
        //               },
        //               {
        //                 label: 'aktual',
        //                 borderColor: '#13ce66',
        //                 pointBackgroundColor: 'white',
        //                 borderWidth: 2,
        //                 pointBorderColor: '#13ce66',
        //                 backgroundColor: 'transparent',
        //                 data: aktual
        //               }]
        //           },
        //               options: {
        //                   scales: {
        //                       yAxes: [{
        //                           ticks: {
        //                               beginAtZero: true
        //                           },
        //                           gridLines: {
        //                               display: true
        //                           }
        //                       }],
        //                       xAxes: [{
        //                           gridLines: {
        //                               display: false
        //                           }
        //                       }]
        //                   },
        //                   bodyFontFamily: 'Circular Family',
        //                   footerFontFamily: 'Circular Family',
        //                   legend: {
        //                       display: false
        //                   },
        //                   responsive: true,
        //                   maintainAspectRatio: false
        //               }
        //           });
        //         });
        //       });
        //
        //
        //

        


        var chartdata = {
          type: 'line',
          data: {
            labels: @json($p),
            datasets: [
            {
              label: 'peramalan',
              borderColor: '#13ce66',
              pointBackgroundColor: 'white',
              borderWidth: 2,
              pointBorderColor: '#13ce66',
              backgroundColor: 'transparent',
              data: @json($forcast)
            },
            {
              label: 'aktual',
              borderColor: '#13ce66',
              borderWidth: 2,
              pointBackgroundColor: 'white',
              pointBorderColor: '#5eeeee',
              backgroundColor: 'transparent',
              data: @json($aktual)
            }
            ]
          },
          options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                    gridLines: {
                        display: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            },
            bodyFontFamily: 'Circular Family',
            footerFontFamily: 'Circular Family',
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false
          }
        }

        var ctx = document.getElementById('lineChart2').getContext('2d');
        new Chart(ctx, chartdata);

@endsection
