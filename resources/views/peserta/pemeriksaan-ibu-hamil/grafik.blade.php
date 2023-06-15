@extends('peserta.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-8">
            <h4>Hasil Pertumbuhan Ibu Hamil</h4>
            <div class="card border-left-success">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Ibu Hamil</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="nama_lengkap"
                                name="nama_lengkap" value=": {{$ibuhamil['nama_lengkap']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="umur_kandungan" class="col-sm-2 col-form-label">Umur Kandungan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="umur_kandungan"
                                name="umur_kandungan" value=": {{$data_terbaru['umur_kandungan']}} Minggu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="jenis_kelamin"
                                name="jenis_kelamin" value=": {{$ibuhamil['jenis_kelamin']}}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="container">
                <div id="length_boys_0_2_years" style="height:500px;"></div>
                <div id="weight_boys_0_2_years" style="height:500px;"></div>
                <div id="head_boys_0_2_years" style="height:500px;"></div>
            </div> -->
            @if($hasil_pengukuran['status'] == "Underweight")
            <div id="grafik-underweight-ibu-hamil" style="height:500px;"></div>
            @elseif($hasil_pengukuran['status'] == "Normal")
            <div id="grafik-normal-ibu-hamil" style="height:500px;"></div>
            @elseif($hasil_pengukuran['status'] == "Overweight")
            <div id="grafik-overweight-ibu-hamil" style="height:500px;"></div>
            @elseif($hasil_pengukuran['status'] == "Obese")
            <div id="grafik-obese-ibu-hamil" style="height:500px;"></div>
            @endif
            <p class="text-center" style="color: #000">Berat badan yang disarankan
                <strong>({{$hasil_pengukuran['bb_minimal']}} kg -
                    {{$hasil_pengukuran['bb_maksimal']}}
                    kg)</strong>
            </p>
        </div>
        <div class="col-sm-4">
            <h4 class="text-center">Artikel</h4>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

<script>
var data_grafik = @json($berat_badan);
var tick_position = @json($tick_position);
var underweight = [
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1.44, 2.59],
    [1.88, 3.18],
    [2.32, 3.77],
    [2.76, 4.36],
    [3.2, 4.95],
    [3.64, 5.54],
    [4.08, 6.13],
    [4.52, 6.72],
    [4.96, 7.31],
    [5.4, 7.9],
    [5.84, 8.49],
    [6.28, 9.08],
    [6.72, 9.67],
    [7.16, 10.26],
    [7.6, 10.85],
    [8.04, 11.44],
    [8.48, 12.03],
    [8.92, 12.62],
    [9.36, 13.21],
    [9.8, 13.8],
    [10.24, 14.39],
    [10.68, 14.98],
    [11.12, 15.57],
    [11.56, 16.16],
    [12, 16.75],
    [12.44, 17.34],
    [12.88, 17.93],

];

Highcharts.chart('grafik-underweight-ibu-hamil', {

    title: {
        text: 'Grafik Perkembangan Ibu Hamil (Underweight)',
        align: 'left'
    },

    subtitle: {
        text: 'Source: ' +
            '<a href="https://www.yr.no/nb/historikk/graf/1-113585/Norge/Viken/Nesbyen/Nesbyen?q=2022-07"' +
            'target="_blank">YR</a>',
        align: 'left'
    },

    xAxis: {
        title: {
            text: 'Usia Kandungan (minggu)'
        },
        gridLineWidth: 1,
        tickPositions: tick_position,
    },

    yAxis: {
        title: {
            text: null
        }
    },

    tooltip: {
        formatter: function() {
            if (this.series.name == "Berat (kg)") {
                return "<b>Pertambahan Berat Badan Pasca Hamil</b><br>" + this.x + " minggu, " + this.y +
                    " kg";
            }
        }
    },

    plotOptions: {
        series: {
            pointStart: 0,
            connectNulls: true
        },
    },

    series: [{
            name: 'Underweight',
            data: underweight,
            type: 'arearange',
            lineWidth: 0,
            linkedTo: ':previous',
            color: Highcharts.getOptions().colors[0],
            fillOpacity: 0.3,
            zIndex: 0,
            marker: {
                enabled: false
            }
        },
        {
            name: 'Berat (kg)',
            data: data_grafik,
            type: 'arearange',
            lineWidth: 0,
            linkedTo: ':previous',
            color: Highcharts.getOptions().colors[0],
            fillOpacity: 0.3,
            zIndex: 0,
            marker: {
                enabled: false
            }
        }
    ]
});
</script>

<script>
var data_grafik = @json($berat_badan);
var tick_position = @json($tick_position);
var normalweight = [
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1.39, 2.52],
    [1.78, 3.04],
    [2.17, 3.56],
    [2.56, 4.08],
    [2.95, 4.6],
    [3.34, 5.12],
    [3.73, 5.64],
    [4.12, 6.16],
    [4.51, 6.68],
    [4.9, 7.2],
    [5.29, 7.72],
    [5.68, 8.24],
    [6.07, 8.76],
    [6.46, 9.28],
    [6.85, 9.8],
    [7.24, 10.32],
    [7.63, 10.84],
    [8.02, 11.36],
    [8.41, 11.88],
    [8.8, 12.4],
    [9.19, 12.92],
    [9.58, 13.44],
    [9.97, 13.96],
    [10.36, 14.48],
    [10.75, 15],
    [11.14, 15.52],
    [11.53, 16.04],
];

Highcharts.chart('grafik-normal-ibu-hamil', {

    title: {
        text: 'Grafik Perkembangan Ibu Hamil (Normal)',
        align: 'left'
    },

    subtitle: {
        text: 'Source: ' +
            '<a href="https://www.yr.no/nb/historikk/graf/1-113585/Norge/Viken/Nesbyen/Nesbyen?q=2022-07"' +
            'target="_blank">YR</a>',
        align: 'left'
    },

    xAxis: {
        title: {
            text: 'Usia Kandungan (minggu)'
        },
        gridLineWidth: 1,
        tickPositions: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24,
            25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40
        ],
    },

    yAxis: {
        title: {
            text: null
        }
    },

    tooltip: {
        formatter: function() {
            if (this.series.name == "Berat (kg)") {
                return "<b>Pertambahan Berat Badan Pasca Hamil</b><br>" + this.x + " minggu, " + this.y +
                    " kg";
            }
        }
    },

    plotOptions: {
        series: {
            pointStart: 0,
            connectNulls: true
        },
    },

    series: [{
        name: 'Normal',
        data: normalweight,
        type: 'arearange',
        lineWidth: 0,
        linkedTo: ':previous',
        color: "#FF3659",
        zIndex: 0,
        marker: {
            enabled: false,
        },
        enableMouseTracking: false
    }, {
        name: 'Berat (kg)',
        data: data_grafik,
        type: 'spline',
        lineWidth: 2,
        color: "#000fff",
        marker: {
            symbol: 'circle'
        }
    }]
});
</script>

<script>
var data_grafik = @json($berat_badan);
var tick_position = @json($tick_position);
var overweight = [
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1.23, 2.35],
    [1.46, 2.7],
    [1.69, 3.05],
    [1.92, 3.4],
    [2.15, 3.75],
    [2.38, 4.1],
    [2.61, 4.45],
    [2.84, 4.8],
    [3.07, 5.15],
    [3.3, 5.5],
    [3.53, 5.85],
    [3.76, 6.2],
    [3.99, 6.55],
    [4.22, 6.9],
    [4.45, 7.25],
    [4.68, 7.6],
    [4.91, 7.95],
    [5.14, 8.3],
    [5.37, 8.65],
    [5.6, 9],
    [5.83, 9.35],
    [6.06, 9.7],
    [6.29, 10.05],
    [6.52, 10.4],
    [6.75, 10.75],
    [6.98, 11.1],
    [7.21, 11.45],
];

Highcharts.chart('grafik-overweight-ibu-hamil', {

    title: {
        text: 'Grafik Perkembangan Ibu Hamil (Overweight)',
        align: 'left'
    },

    subtitle: {
        text: 'Source: ' +
            '<a href="https://www.yr.no/nb/historikk/graf/1-113585/Norge/Viken/Nesbyen/Nesbyen?q=2022-07"' +
            'target="_blank">YR</a>',
        align: 'left'
    },

    xAxis: {
        title: {
            text: 'Usia Kandungan (minggu)'
        },
        gridLineWidth: 1,
        tickPositions: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24,
            25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40
        ],
    },

    yAxis: {
        title: {
            text: null
        }
    },

    tooltip: {
        formatter: function() {
            if (this.series.name == "Berat (kg)") {
                return "<b>Pertambahan Berat Badan Pasca Hamil</b><br>" + this.x + " minggu, " + this.y +
                    " kg";
            }
        }
    },

    plotOptions: {
        series: {
            pointStart: 0,
            connectNulls: true
        },
    },

    series: [{
        name: 'Overweight',
        data: overweight,
        type: 'arearange',
        lineWidth: 0,
        linkedTo: ':previous',
        color: Highcharts.getOptions().colors[2],
        fillOpacity: 0.3,
        zIndex: 0,
        marker: {
            enabled: false
        }
    }, {
        name: 'Berat (kg)',
        data: data_grafik,
        type: 'arearange',
        lineWidth: 0,
        linkedTo: ':previous',
        color: Highcharts.getOptions().colors[2],
        fillOpacity: 0.3,
        zIndex: 0,
        marker: {
            enabled: false
        }
    }]
});
</script>

<script>
var data_grafik = @json($berat_badan);
var tick_position = @json($tick_position);

var obese = [
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1, 2],
    [1.17, 2.27],
    [1.34, 2.54],
    [1.51, 2.81],
    [1.68, 3.08],
    [1.85, 3.35],
    [2.02, 3.62],
    [2.19, 3.89],
    [2.36, 4.16],
    [2.53, 4.43],
    [2.7, 4.7],
    [2.87, 4.97],
    [3.04, 5.24],
    [3.21, 5.51],
    [3.38, 5.78],
    [3.55, 6.05],
    [3.72, 6.32],
    [3.89, 6.59],
    [4.06, 6.86],
    [4.23, 7.13],
    [4.4, 7.4],
    [4.57, 7.67],
    [4.74, 7.94],
    [4.91, 8.21],
    [5.08, 8.48],
    [5.25, 8.75],
    [5.42, 9.02],
    [5.59, 9.29],
];


Highcharts.chart('grafik-obese-ibu-hamil', {

    title: {
        text: 'Grafik Perkembangan Ibu Hamil (Obese)',
        align: 'left'
    },

    subtitle: {
        text: 'Source: ' +
            '<a href="https://www.yr.no/nb/historikk/graf/1-113585/Norge/Viken/Nesbyen/Nesbyen?q=2022-07"' +
            'target="_blank">YR</a>',
        align: 'left'
    },

    xAxis: {
        title: {
            text: 'Usia Kandungan (minggu)'
        },
        gridLineWidth: 1,
        tickPositions: tick_position,
    },

    yAxis: {
        title: {
            text: null
        }
    },

    tooltip: {
        formatter: function() {
            if (this.series.name == "Berat (kg)") {
                return "<b>Pertambahan Berat Badan Pasca Hamil</b><br>" + this.x + " minggu, " + this.y +
                    " kg";
            }
        }
    },

    plotOptions: {
        series: {
            pointStart: 0,
            connectNulls: true
        },
    },

    series: [{
        name: 'Obese',
        data: obese,
        type: 'arearange',
        lineWidth: 0,
        linkedTo: ':previous',
        color: "#000000",
        fillOpacity: 0.3,
        zIndex: 0,
        marker: {
            enabled: false
        }
    }, {
        name: 'Berat (kg)',
        data: data_grafik,
        type: 'arearange',
        lineWidth: 0,
        linkedTo: ':previous',
        color: "#000000",
        fillOpacity: 0.3,
        zIndex: 0,
        marker: {
            enabled: false
        }
    }]
});
</script>
@endsection