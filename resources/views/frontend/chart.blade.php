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
 

    Highcharts.chart('chart', {
        title: {
            text: 'Expense of, 2020'
        },
        subtitle: {
            text: 'Source: self'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Expense range'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Expense',
            data: datas
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
