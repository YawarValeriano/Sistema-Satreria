@extends('layouts.main')

@section('contenido')
<section class="content-header">
    <h1>Dashboard</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$in1->total}}</h3>
                    <p>Ordenes Pendientes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{url('pendiente')}}" class="small-box-footer">Ir a Pendientes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    @switch($in2->mes)
                        @case("Jan")
                            <h3>Enero</h3>
                            @break
                        @case("Feb")
                            <h3>Febrero</h3>
                            @break
                        @case("Mar")
                            <h3>Marzo</h3>
                            @break
                        @case("Apr")
                            <h3>Abril</h3>
                            @break
                        @case("May")
                            <h3>Mayo</h3>
                            @break
                        @case("Jun")
                            <h3>Junio</h3>
                            @break
                        @case("Jul")
                            <h3>Julio</h3>
                            @break
                        @case("Aug")
                            <h3>Agosto</h3>
                            @break
                        @case("Sep")
                            <h3>Septiembre</h3>
                            @break
                        @case("Oct")
                            <h3>Octubre</h3>
                            @break
                        @case("Nov")
                            <h3>Noviembre</h3>
                            @break
                        @case("Dec")
                            <h3>Diciembre</h3>
                            @break
                    @endswitch
                    <p>Mayor cantidad de pedidos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-calendar"></i>
                </div>
                <a href="{{url('orden')}}" class="small-box-footer">Ir a órdenes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$in3->clientes}}</h3>
                    <p>Total de clientes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('cliente')}}" class="small-box-footer">Ir a clientes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$in4->total}}</h3>
                    <p>Trabajos entregados este mes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-checkmark-circle"></i>
                </div>
                <div href="#" class="small-box-footer">Mes anterior: {{$in4_1->total}}</div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="box box-info">
                <div class="box-body">
                    <div id="torta1" style="margin: 0 auto"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="box box-warning">
                <div class="box-body">
                    <div id="barras1" style="margin: 0 auto"></div>
                </div>
            </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="box box-success">
                <div class="box-body">
                    <div id="ganancia1" style="margin: 0 auto"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div id="sastres" style="margin: 0 auto"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    Highcharts.setOptions({
        colors: ['#ff4040', '#66cccc', '#088da5', '#022a31', '#014351']
    });
    Highcharts.chart('torta1', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Confecciones y Arreglos hasta la fecha'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Trabajos',
            colorByPoint: true,
            data: [{
                name: 'Confecciones',
                y: {{$graf1[0]->total}}
            },{
               name: 'Arreglos',
                y: {{$graf1[1]->total}} 
            }]
        }]
    });
</script>
<script>
    var conf=[0,0,0,0,0,0,0,0,0,0,0,0];
    var arr=[0,0,0,0,0,0,0,0,0,0,0,0];
    <?php foreach ($graf2 as $g2): ?>
        <?php if ($g2->flag_tipo == 0): ?>
            conf[{{$g2->mes}}-1]={{$g2->total}};
        <?php else: ?>
            arr[{{$g2->mes}}-1]={{$g2->total}};
        <?php endif ?>
    <?php endforeach ?>
Highcharts.chart('barras1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Confecciones y arreglos por mes'
    },
    xAxis: {
        categories: [
            'Ene',
            'Feb',
            'Mar',
            'Abr',
            'May',
            'Jun',
            'Jul',
            'Ago',
            'Sep',
            'Oct',
            'Nov',
            'Dic'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Trabajos'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}:  </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Confecciones',
        data: conf
    }, {
        name: 'Arreglos',
        data: arr
    }]
});
</script>
<script>
    var conf=[0,0,0,0,0,0,0,0,0,0,0,0];
    var arr=[0,0,0,0,0,0,0,0,0,0,0,0];
    <?php foreach ($graf3 as $g3): ?>
        <?php if ($g3->flag_tipo == 0): ?>
            conf[{{$g3->mes}}-1]={{$g3->total}};
        <?php else: ?>
            arr[{{$g3->mes}}-1]={{$g3->total}};
        <?php endif ?>
    <?php endforeach ?>
Highcharts.chart('ganancia1', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Ingresos mensuales Confecciones y Arreglos'
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
        title: {
            text: 'Ganancia en Bs.'
        },
        labels: {
            formatter: function () {
                return this.value + ' Bs.';
            }
        }
    },
    tooltip: {
        pointFormat: 'Total de ingresos por {series.name} de prendas: <b>{point.y:,.0f} Bs.</b><br/>{x.label}'
    },
    plotOptions: {
        area: {
            marker: {
                enabled: false,
                symbol: 'circle',
                radius: 2,
                states: {
                    hover: {
                        enabled: true
                    }
                }
            }
        }
    },
    series: [{
        name: 'Confecciones',
        data: conf
    }, {
        name: 'Arreglos',
        data: arr
    }]
});
</script>
<script>
Highcharts.chart('sastres', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Sastre<br> con mas <br>pedidos',
        align: 'center',
        verticalAlign: 'middle',
        y: 40
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        }
    },
    series: [{
        type: 'pie',
        name: 'Total Ventas',
        innerSize: '60%',
        data: [
        <?php foreach ($graf4 as $g4): ?>
            {
                name: '{{$g4->usuario}}',
                y: {{$g4->total}}
            },
        <?php endforeach ?>
        ]
    }]
});
</script>
@endsection