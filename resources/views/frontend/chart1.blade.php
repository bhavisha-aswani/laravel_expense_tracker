@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Expense Chart') }}</div>

                <div class="card-body" id="chart">
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
    var datas = <?php echo json_encode($datas)?>;
  var datasI = <?php echo json_encode($datasI)?>;
 

   Highcharts.chart('chart', {
  chart: {
    type: 'column'
  },
   title: {
            text: 'Expense of, 2020'
        },
        subtitle: {
            text: 'Source: self'
        },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },
  yAxis: {
    title: {
     text: 'Expense range'
    }
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      },
    series: {
                allowPointSelect: true
            },
      enableMouseTracking: true
    }
  },
   legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

  series: [{
    name: 'Income',
    data: datasI,
    color: 'green'
  }, {
    name: 'Expense',
    data: datas,
    color: 'red'
  }]
});
</script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
