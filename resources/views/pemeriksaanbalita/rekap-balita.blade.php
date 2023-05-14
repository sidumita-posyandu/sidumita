@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Balita</h2>
        </div>
    </div>
</div>

<div class="card shadow mt-2">
    <div class="card-header font-weight-bold text-success">
        Detail Balita
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="container">
                    <div class="row">
                        <h6>NIK :</h6>
                        <h6 class="ml-3">{{ $balita['nik'] }}</h6>
                    </div>
                    <div class="row">
                        <h6>Nama Balita : </h6>
                        <h6 class="ml-3">{{ $balita['nama_lengkap'] }}</h6>
                    </div>
                    <div class="row">
                        <h6>Jenis Kelamin : </h6>
                        <h6 class="ml-3">{{ $balita['jenis_kelamin'] }}</h6>
                    </div>
                    <div class="row">
                        <h6>Usia :</h6>
                        <h6 class="ml-3">{{ $umur['umur'] }} {{ $umur['format'] }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <h6>Tempat / Tanggal Lahir : </h6>
                    <h6 class="ml-3">{{ $balita['tempat_lahir'] }} / {{ $balita['tanggal_lahir'] }}</h6>
                </div>
                <div class="row">
                    <h6>Kepala Keluarga :</h6>
                    <h6 class="ml-3">{{ $balita['keluarga']['kepala_keluarga'] }}</h6>
                </div>
                <div class="row">
                    <h6>Golongan Darah :</h6>
                    <h6 class="ml-3">{{ $balita['golongan_darah'] }}</h6>
                </div>
                <div class="row">
                    <h6>Dusun :</h6>
                    <h6 class="ml-3">{{ $dusun['nama_dusun'] }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mt-2">
    <div class="card-header font-weight-bold text-success">
        Hasil Rekap Pemeriksaan
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="50px">No</th>
                <th>Usia Balita</th>
                <th>Tinggi Badan</th>
                <th>Berat Badan</th>
                <th>Lingkar Kepala</th>
                <th>Lingkar Lengan</th>
            </tr>
            @php $no = 1; @endphp
            @if(is_array($rekap) || is_object($rekap))
            @foreach ($rekap as $k => $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item['umur_balita'] }} Bulan</td>
                <td>{{ $item['tinggi_badan'] }}</td>
                <td>{{ $item['berat_badan'] }}</td>
                <td>{{ $item['lingkar_kepala'] }}</td>
                <td>{{ $item['lingkar_lengan'] }}</td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>

<div class="card shadow mt-3">
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-success" id="height-tab" data-toggle="tab" href="#height" role="tab"
                    aria-controls="height" aria-selected="true">Tinggi Badan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" id="weight-tab" data-toggle="tab" href="#weight" role="tab"
                    aria-controls="weight" aria-selected="false">Berat Badan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" id="head-tab" data-toggle="tab" href="#head" role="tab"
                    aria-controls="head" aria-selected="false">Lingkar Kepala</a>
            </li>
        </ul>
        @if($balita['jenis_kelamin'] == 'Laki-Laki')
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="height" role="tabpanel" aria-labelledby="height-tab">
                <div id="length_boys_0_2_years" style="height:500px;"></div>
            </div>
            <div class="tab-pane fade" id="weight" role="tabpanel" aria-labelledby="weight-tab">
                <div id="weight_boys_0_2_years" style="height:500px;"></div>
            </div>
            <div class="tab-pane fade" id="head" role="tabpanel" aria-labelledby="head-tab">
                <div id="head_boys_0_2_years" style="height:500px;"></div>
            </div>
        </div>
        @elseif($balita['jenis_kelamin'] == 'Perempuan')
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="height" role="tabpanel" aria-labelledby="height-tab">
                <div id="length_girls_0_2_years" style="height:500px;"></div>
            </div>
            <div class="tab-pane fade" id="weight" role="tabpanel" aria-labelledby="weight-tab">
                <div id="weight_girls_0_2_years" style="height:500px;"></div>
            </div>
            <div class="tab-pane fade" id="head" role="tabpanel" aria-labelledby="head-tab">
                <div id="head_girls_0_2_years" style="height:500px;"></div>
            </div>
        </div>
        @else
        <div>Grafik tidak dapat menampilkan data</div>
        @endif
    </div>
</div>
@endsection


@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>

<!-- length -->
<script>
var ltinggi0 = @json($ltinggi0);
var ltinggi1 = @json($ltinggi1);
var ltinggi2 = @json($ltinggi2);
var ltinggi3 = @json($ltinggi3);
var ltinggimin1 = @json($ltinggimin1);
var ltinggimin2 = @json($ltinggimin2);
var ltinggimin3 = @json($ltinggimin3);
var tinggi_balita = @json($tinggi_badan);
var thick_position = @json($thick_position);

Highcharts.chart('length_boys_0_2_years', {
        chart: {
            type: 'spline',
            marginRight: 20,
        },

        title: {
            text: 'Tinggi badan laki-laki (0-2 tahun) (z-scores)',
            align: 'left'
        },

        subtitle: {
            text: 'Source: <a href="https://www.who.int/tools/child-growth-standards/standards/length-length-for-age" target="_blank">WHO</a>',
            align: 'left'
        },

        yAxis: {
            title: {
                text: 'Tinggi badan (cm)'
            }
        },

        xAxis: {
            title: {
                text: 'Umur (bulan)'
            },
            gridLineWidth: 1,
            tickPositions: thick_position,
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 0,
                states: {
                    inactive: {
                        opacity: 1
                    }
                },
                connectNulls: true
            }
        },

        tooltip: {
            formatter: function() {
                if (this.series.name == "") {
                    return "<b>Balita</b><br>" + this.x + " bulan, " + this.y + " cm";
                }
            }
        },

        series: [{
                name: '0',
                data: ltinggi0,
                color: "#078743",
                showInLegend: false,
                marker: {
                    enabled: false,
                },
                enableMouseTracking: false
            }, {
                name: '-1',
                data: ltinggimin1,
                color: "#ffcc00",
                showInLegend: false,
                marker: {
                    enabled: false,
                },
                enableMouseTracking: false
            },
            {
                name: '-2',
                data: ltinggimin2,
                color: "#e81d36",
                showInLegend: false,
                marker: {
                    enabled: false,
                },
                enableMouseTracking: false
            },
            {
                name: '-3',
                data: ltinggimin3,
                color: "#000",
                showInLegend: false,
                marker: {
                    enabled: false,
                },
                enableMouseTracking: false
            },
            {
                name: '1',
                data: ltinggi1,
                color: "#ffcc00",
                showInLegend: false,
                marker: {
                    enabled: false,
                },
                enableMouseTracking: false
            },
            {
                name: '2',
                data: ltinggi2,
                color: "#e81d36",
                showInLegend: false,
                marker: {
                    enabled: false,
                },
                enableMouseTracking: false
            },
            {
                name: '3',
                data: ltinggi3,
                color: "#231f20",
                showInLegend: false,
                marker: {
                    enabled: false,
                },
                enableMouseTracking: false
            },
            {
                name: "",
                data: tinggi_balita,
                color: "#000fff",
                marker: {
                    symbol: 'circle'
                },
                showInLegend: false,
            },
        ],

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

    },
    function(chart) {
        const series = chart.series;
        series.forEach(series => {
            const lastPoint = series.data.length - 1
            const x = series.points[lastPoint].plotX + chart.plotLeft + 10;
            const y = series.points[lastPoint].plotY + chart.plotTop;
            const name = series.name;
            const color = series.color;
            renderLabel(chart, name, x, y, color);
        })
    }
);

function renderLabel(chart, name, x, y, color) {
    chart.renderer.text(name, x, y)
        .css({
            color: color
        })
        .add()
        .toFront();
}
</script>

<script>
var ptinggi0 = @json($ptinggi0);
var ptinggi1 = @json($ptinggi1);
var ptinggi2 = @json($ptinggi2);
var ptinggi3 = @json($ptinggi3);
var ptinggimin1 = @json($ptinggimin1);
var ptinggimin2 = @json($ptinggimin2);
var ptinggimin3 = @json($ptinggimin3);
var tinggi_balita = @json($tinggi_badan);
var thick_position = @json($thick_position);
Highcharts.chart('length_girls_0_2_years', {
    chart: {
        type: 'spline',
        marginRight: 20
    },

    title: {
        text: 'Tinggi badan perempuan (0-2 tahun) (z-scores)',
        align: 'left'
    },

    subtitle: {
        text: 'Source: <a href="https://www.who.int/tools/child-growth-standards/standards/length-length-for-age" target="_blank">WHO</a>',
        align: 'left'
    },

    yAxis: {
        title: {
            text: 'Tinggi badan (cm)'
        }
    },

    xAxis: {
        title: {
            text: 'Umur (bulan)'
        },
        gridLineWidth: 1,
        tickPositions: thick_position
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0,
            states: {
                inactive: {
                    opacity: 1
                }
            },
            connectNulls: true
        }
    },

    tooltip: {
        formatter: function() {
            if (this.series.name == "") {
                return "<b>Balita</b><br>" + this.x + " bulan, " + this.y + " cm";
            }
        }
    },

    series: [{
            name: '0',
            data: ptinggi0,
            color: "#078743",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        }, {
            name: '-1',
            data: ptinggimin1,
            color: "#ffcc00",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '-2',
            data: ptinggimin2,
            color: "#e81d36",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '-3',
            data: ptinggimin3,
            color: "#000",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '1',
            data: ptinggi1,
            color: "#ffcc00",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '2',
            data: ptinggi2,
            color: "#e81d36",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '3',
            data: ptinggi3,
            color: "#231f20",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: "",
            data: tinggi_balita,
            color: "#000fff",
            marker: {
                symbol: 'circle'
            },
            showInLegend: false,
        },
    ],

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

}, function(chart) {
    const series = chart.series;
    series.forEach(series => {
        const lastPoint = series.data.length - 1
        const x = series.points[lastPoint].plotX + chart.plotLeft + 10;
        const y = series.points[lastPoint].plotY + chart.plotTop;
        const name = series.name;
        const color = series.color;
        renderLabel(chart, name, x, y, color);
    })
});

function renderLabel(chart, name, x, y, color) {
    chart.renderer.text(name, x, y)
        .css({
            color: color
        })
        .add()
        .toFront();
}
</script>

<!-- Weight -->
<script>
var lberat0 = @json($lberat0);
var lberat1 = @json($lberat1);
var lberat2 = @json($lberat2);
var lberat3 = @json($lberat3);
var lberatmin1 = @json($lberatmin1);
var lberatmin2 = @json($lberatmin2);
var lberatmin3 = @json($lberatmin3);
var berat_balita = @json($berat_badan);
var thick_position = @json($thick_position);

Highcharts.chart('weight_boys_0_2_years', {
    chart: {
        type: 'spline',
        marginRight: 20,
    },

    title: {
        text: 'Berat badan laki-laki (0-2 tahun) (z-scores)',
        align: 'left'
    },

    subtitle: {
        text: 'Source: <a href="https://www.who.int/tools/child-growth-standards/standards/weight-length-for-age" target="_blank">WHO</a>',
        align: 'left'
    },

    yAxis: {
        title: {
            text: 'Berat Badan (kg)'
        }
    },

    xAxis: {
        title: {
            text: 'Umur (bulan)'
        },
        gridLineWidth: 1,
        tickPositions: thick_position
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0,
            states: {
                inactive: {
                    opacity: 1
                }
            },
            connectNulls: true
        }
    },

    tooltip: {
        formatter: function() {
            if (this.series.name == "") {
                return "<b>Balita</b><br>" + this.x + " bulan, " + this.y + " kg";
            }
        }
    },

    series: [{
            name: '0',
            data: lberat0,
            color: "#078743",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        }, {
            name: '-1',
            data: lberatmin1,
            color: "#ffcc00",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '-2',
            data: lberatmin2,
            color: "#e81d36",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '-3',
            data: lberatmin3,
            color: "#000",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '1',
            data: lberat1,
            color: "#ffcc00",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '2',
            data: lberat2,
            color: "#e81d36",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '3',
            data: lberat3,
            color: "#231f20",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: "",
            data: berat_balita,
            color: "#000fff",
            marker: {
                symbol: 'circle'
            },
            showInLegend: false,
        },
    ],

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

}, function(chart) {
    const series = chart.series;
    series.forEach(series => {
        const lastPoint = series.data.length - 1
        const x = series.points[lastPoint].plotX + chart.plotLeft + 10;
        const y = series.points[lastPoint].plotY + chart.plotTop;
        const name = series.name;
        const color = series.color;
        renderLabel(chart, name, x, y, color);
    })
});

function renderLabel(chart, name, x, y, color) {
    chart.renderer.text(name, x, y)
        .css({
            color: color
        })
        .add()
        .toFront();
}
</script>

<script>
var pberat0 = @json($pberat0);
var pberat1 = @json($pberat1);
var pberat2 = @json($pberat2);
var pberat3 = @json($pberat3);
var pberatmin1 = @json($pberatmin1);
var pberatmin2 = @json($pberatmin2);
var pberatmin3 = @json($pberatmin3);
var berat_balita = @json($berat_badan);
var thick_position = @json($thick_position);


Highcharts.chart('weight_girls_0_2_years', {
    chart: {
        type: 'spline',
        marginRight: 20,
    },

    title: {
        text: 'Berat badan perempuan (0-2 tahun) (z-scores)',
        align: 'left'
    },

    subtitle: {
        text: 'Source: <a href="https://www.who.int/tools/child-growth-standards/standards/weight-length-for-age" target="_blank">WHO</a>',
        align: 'left'
    },

    yAxis: {
        title: {
            text: 'Berat Badan (kg)'
        }
    },

    xAxis: {
        title: {
            text: 'Umur (bulan)'
        },
        gridLineWidth: 1,
        tickPositions: thick_position
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0,
            states: {
                inactive: {
                    opacity: 1
                }
            },
            connectNulls: true
        }
    },

    tooltip: {
        formatter: function() {
            if (this.series.name == "") {
                return "<b>Balita</b><br>" + this.x + " bulan, " + this.y + " kg";
            }

        }
    },

    series: [{
            name: '0',
            data: pberat0,
            color: "#078743",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        }, {
            name: '-1',
            data: pberatmin1,
            color: "#ffcc00",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '-2',
            data: pberatmin2,
            color: "#e81d36",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '-3',
            data: pberatmin3,
            color: "#000",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '1',
            data: pberat1,
            color: "#ffcc00",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '2',
            data: pberat2,
            color: "#e81d36",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '3',
            data: pberat3,
            color: "#231f20",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: "",
            data: berat_balita,
            color: "#000fff",
            marker: {
                symbol: 'circle'
            },
            showInLegend: false,
        },
    ],

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
            },
        }]
    }

}, function(chart) {
    const series = chart.series;
    series.forEach(series => {
        const lastPoint = series.data.length - 1
        const x = series.points[lastPoint].plotX + chart.plotLeft + 10;
        const y = series.points[lastPoint].plotY + chart.plotTop;
        const name = series.name;
        const color = series.color;
        renderLabel(chart, name, x, y, color);
    })
});

function renderLabel(chart, name, x, y, color) {
    chart.renderer.text(name, x, y)
        .css({
            color: color
        })
        .add()
        .toFront();
}
</script>

<script>
var pkepala0 = @json($pkepala0);
var pkepala1 = @json($pkepala1);
var pkepala2 = @json($pkepala2);
var pkepala3 = @json($pkepala3);
var pkepalamin1 = @json($pkepalamin1);
var pkepalamin2 = @json($pkepalamin2);
var pkepalamin3 = @json($pkepalamin3);
var kepala_balita = @json($lingkar_kepala);
var thick_position = @json($thick_position);


Highcharts.chart('head_girls_0_2_years', {
    chart: {
        type: 'spline',
        marginRight: 20,
    },

    title: {
        text: 'Lingkar kepala perempuan (0-2 tahun) (z-scores)',
        align: 'left'
    },

    subtitle: {
        text: 'Source: <a href="https://www.who.int/tools/child-growth-standards/standards/weight-length-for-age" target="_blank">WHO</a>',
        align: 'left'
    },

    yAxis: {
        title: {
            text: 'Ukuran Lingkar Kepala (cm)'
        }
    },

    xAxis: {
        title: {
            text: 'Umur (bulan)'
        },
        gridLineWidth: 1,
        tickPositions: thick_position
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0,
            states: {
                inactive: {
                    opacity: 1
                }
            },
            connectNulls: true
        }
    },

    tooltip: {
        formatter: function() {
            if (this.series.name == "") {
                return "<b>Balita</b><br>" + this.x + " bulan, " + this.y + " cm";
            }

        }
    },

    series: [{
            name: '0',
            data: pkepala0,
            color: "#078743",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        }, {
            name: '-1',
            data: pkepalamin1,
            color: "#ffcc00",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '-2',
            data: pkepalamin2,
            color: "#e81d36",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '-3',
            data: pkepalamin3,
            color: "#000",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '1',
            data: pkepala1,
            color: "#ffcc00",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '2',
            data: pkepala2,
            color: "#e81d36",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '3',
            data: pkepala3,
            color: "#231f20",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: "",
            data: kepala_balita,
            color: "#000fff",
            marker: {
                symbol: 'circle'
            },
            showInLegend: false,
        },
    ],

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

}, function(chart) {
    const series = chart.series;
    series.forEach(series => {
        const lastPoint = series.data.length - 1
        const x = series.points[lastPoint].plotX + chart.plotLeft + 10;
        const y = series.points[lastPoint].plotY + chart.plotTop;
        const name = series.name;
        const color = series.color;
        renderLabel(chart, name, x, y, color);
    })
});

function renderLabel(chart, name, x, y, color) {
    chart.renderer.text(name, x, y)
        .css({
            color: color
        })
        .add()
        .toFront();
}
</script>

<script>
var lkepala0 = @json($lkepala0);
var lkepala1 = @json($lkepala1);
var lkepala2 = @json($lkepala2);
var lkepala3 = @json($lkepala3);
var lkepalamin1 = @json($lkepalamin1);
var lkepalamin2 = @json($lkepalamin2);
var lkepalamin3 = @json($lkepalamin3);
var kepala_balita = @json($lingkar_kepala);
var thick_position = @json($thick_position);


Highcharts.chart('head_boys_0_2_years', {
    chart: {
        type: 'spline',
        marginRight: 20,
    },

    title: {
        text: 'Lingkar kepala perempuan (0-2 tahun) (z-scores)',
        align: 'left'
    },

    subtitle: {
        text: 'Source: <a href="https://www.who.int/tools/child-growth-standards/standards/weight-length-for-age" target="_blank">WHO</a>',
        align: 'left'
    },

    yAxis: {
        title: {
            text: 'Ukuran Lingkar Kepala (cm)'
        }
    },

    xAxis: {
        title: {
            text: 'Umur (bulan)'
        },
        gridLineWidth: 1,
        tickPositions: thick_position
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0,
            states: {
                inactive: {
                    opacity: 1
                }
            },
            connectNulls: true
        }
    },

    tooltip: {
        formatter: function() {
            if (this.series.name == "") {
                return "<b>Balita</b><br>" + this.x + " bulan, " + this.y + " cm";
            }

        }
    },

    series: [{
            name: '0',
            data: lkepala0,
            color: "#078743",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        }, {
            name: '-1',
            data: lkepalamin1,
            color: "#ffcc00",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '-2',
            data: lkepalamin2,
            color: "#e81d36",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '-3',
            data: lkepalamin3,
            color: "#000",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '1',
            data: lkepala1,
            color: "#ffcc00",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '2',
            data: lkepala2,
            color: "#e81d36",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: '3',
            data: lkepala3,
            color: "#231f20",
            showInLegend: false,
            marker: {
                enabled: false,
            },
            enableMouseTracking: false
        },
        {
            name: "",
            data: kepala_balita,
            color: "#000fff",
            marker: {
                symbol: 'circle'
            },
            showInLegend: false,
        },
    ],

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

}, function(chart) {
    const series = chart.series;
    series.forEach(series => {
        const lastPoint = series.data.length - 1
        const x = series.points[lastPoint].plotX + chart.plotLeft + 10;
        const y = series.points[lastPoint].plotY + chart.plotTop;
        const name = series.name;
        const color = series.color;
        renderLabel(chart, name, x, y, color);
    })
});

function renderLabel(chart, name, x, y, color) {
    chart.renderer.text(name, x, y)
        .css({
            color: color
        })
        .add()
        .toFront();
}
</script>
@endsection