@extends('peserta.layouts.app')


@section('content')
<style>
.nav-tabs .nav-item .nav-link {
    color: #000;
}

.nav-tabs .nav-item .nav-link.active {
    color: #fff;
    background-color: #198754;
}
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-8">
            <h4>Hasil Pertumbuhan Balita</h4>
            <div class="card border-left-success">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Balita</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="nama_lengkap"
                                name="nama_lengkap" value=": {{$balita['nama_lengkap']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="umur" name="umur"
                                value=": {{$data_terbaru['umur_balita']}} Bulan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="jenis_kelamin"
                                name="jenis_kelamin" value=": {{$balita['jenis_kelamin']}}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="container">
                <div id="length_boys_0_2_years" style="height:500px;"></div>
                <div id="weight_boys_0_2_years" style="height:500px;"></div>
                <div id="head_boys_0_2_years" style="height:500px;"></div>
            </div> -->
            <ul class="nav nav-tabs my-3" id="pills-tab" role="tablist" style="ul.nav li.link a {color:#000;} ">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-length-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-length" type="button" role="tab" aria-controls="pills-length"
                        aria-selected="true">Tinggi Badan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-weight-tab" data-bs-toggle="pill" data-bs-target="#pills-weight"
                        type="button" role="tab" aria-controls="pills-weight" aria-selected="false">Berat Badan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-head-tab" data-bs-toggle="pill" data-bs-target="#pills-head"
                        type="button" role="tab" aria-controls="pills-head" aria-selected="false">Lingkar
                        Kepala</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-vaksin-tab" data-bs-toggle="pill" data-bs-target="#pills-vaksin"
                        type="button" role="tab" aria-controls="pills-vaksin" aria-selected="false">Imunisasi</button>
                </li>
            </ul>
            @if($balita['jenis_kelamin'] == 'Laki-Laki')
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-length" role="tabpanel"
                    aria-labelledby="pills-length-tab">
                    <div id="length_boys_0_2_years" style="length:500px;"></div>
                    <div class="status mb-5 text-center">
                        Pertumbuhan balita dalam status {{$hasil_tinggi_boys['status']}}
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-weight" role="tabpanel" aria-labelledby="pills-weight-tab">
                    <div id="weight_boys_0_2_years" style="length:500px;"></div>
                    <div class="status mb-5 text-center">
                        Pertumbuhan balita dalam status {{$hasil_berat_boys['status']}}
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-head" role="tabpanel" aria-labelledby="pills-head-tab">
                    <div id="head_boys_0_2_years" style="length:500px;"></div>
                    <div class="status mb-5 text-center">
                        Pertumbuhan balita dalam status {{$hasil_kepala_boys['status']}}
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-vaksin" role="tabpanel" aria-labelledby="pills-vaksin-tab">
                    <div id="vaksin" class="row">
                        <div class="col-sm-4">
                            <h6>Jenis Vaksin</h6>
                        </div>
                        <div class="col-sm-4">
                            <h6>Status</h6>
                        </div>
                        <div class="col-sm-4">
                            <h6>Tanggal Pemeriksaan</h6>
                        </div>
                        @foreach($vaksin as $imunisasi)
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext" id="vaksin" name="vaksin"
                                value="{{$imunisasi['vaksin']}}">
                        </div>
                        @if($imunisasi['status'] == "Sudah")
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext badge bg-secondary" id="vaksin"
                                name="vaksin"><span class="badge bg-success">{{$imunisasi['status']}}</span>
                            <input type="text" readonly class="form-control-plaintext badge bg-secondary" id="vaksin"
                                name="vaksin"><span class="badge bg-secondary">{{$imunisasi['tanggal_pemeriksaan']}}</span>
                        </div>
                        @elseif($imunisasi['status'] == "Kejar")
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext badge bg-secondary" id="vaksin"
                                name="vaksin"><span class="badge bg-danger">{{$imunisasi['status']}}</span>
                            <input type="text" readonly class="form-control-plaintext badge bg-secondary" id="vaksin"
                                name="vaksin"><span class="badge bg-secondary">{{$imunisasi['tanggal_pemeriksaan']}}</span>
                        </div>
                        @elseif($imunisasi['status'] == "Akan")
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext badge bg-secondary" id="vaksin"
                                name="vaksin"><span class="badge bg-warning">{{$imunisasi['status']}}</span>
                            <input type="text" readonly class="form-control-plaintext badge bg-secondary" id="vaksin"
                                name="vaksin"><span class="badge bg-secondary">{{$imunisasi['tanggal_pemeriksaan']}}</span>
                        </div>
                        @else
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext badge bg-secondary" id="vaksin"
                                name="vaksin"><span class="badge bg-danger">{{$imunisasi['status']}}</span>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @elseif($balita['jenis_kelamin'] == 'Perempuan')
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-length" role="tabpanel"
                    aria-labelledby="pills-length-tab">
                    <div id="length_girls_0_2_years" style="length:500px;"></div>
                    <div class="status mb-5 text-center">
                        Pertumbuhan balita dalam status {{$hasil_tinggi_girls['status']}}
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-weight" role="tabpanel" aria-labelledby="pills-weight-tab">
                    <div id="weight_girls_0_2_years" style="length:500px;"></div>
                    <div class="status mb-5 text-center">
                        Pertumbuhan balita dalam status {{$hasil_berat_girls['status']}}
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-head" role="tabpanel" aria-labelledby="pills-head-tab">
                    <div id="head_girls_0_2_years" style="length:500px;"></div>
                    <div class="status mb-5 text-center">
                        Pertumbuhan balita dalam status {{$hasil_kepala_girls['status']}}
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-vaksin" role="tabpanel" aria-labelledby="pills-vaksin-tab">
                    <div id="vaksin" class="row">
                        <div class="col-sm-6">
                            <h6>Jenis Vaksin</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6>Status</h6>
                        </div>
                        @foreach($vaksin as $imunisasi)
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext" id="vaksin" name="vaksin"
                                value="{{$imunisasi['vaksin']}}">
                        </div>
                        @if($imunisasi['status'] == "Sudah")
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext badge bg-secondary" id="vaksin"
                                name="vaksin"><span class="badge bg-success">{{$imunisasi['status']}}</span>
                        </div>
                        @else
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control-plaintext badge bg-secondary" id="vaksin"
                                name="vaksin"><span class="badge bg-danger">{{$imunisasi['status']}}</span>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @else
            <div>Grafik tidak dapat menampilkan data</div>
            @endif
        </div>
        <div class="col-sm-4">
            <h4 class="text-center">Artikel</h4>
        </div>
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