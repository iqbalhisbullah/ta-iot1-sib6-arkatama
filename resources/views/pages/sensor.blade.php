@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Grafik untuk Data Sensor DHT11 -->
        <div class="col-md-9 mb-9">
            <div class="iq-card">
                <h4 class="card-title">DHT11 Sensor Combined Data</h4>
                <div class="iq-card-body">
                    <canvas id="dht11CombinedChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Grafik untuk Data Sensor MQ5 -->
        <div class="col-md-9 mb-9">
            <div class="iq-card">
                <h4 class="card-title">MQ5 Sensor Data</h4>
                <div class="iq-card-body">
                    <canvas id="mq5Chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Grafik untuk Data Sensor Rain Sensor -->
        <div class="col-md-9 mb-9">
            <div class="iq-card">
                <h4 class="card-title">Rain Sensor Data</h4>
                <div class="iq-card-body">
                    <canvas id="rainSensorChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
// Combine DHT11 temperature and humidity data into one array
$dht11CombinedData = [];
foreach ($dht11Datatemp as $index => $data) {
    $dht11CombinedData[] = [
        'label' => 'Temperature (°C)',
        'value' => $data->value,
        'humidity' => $dht11Datahumd[$index]->value,
        'time' => $data->created_at->format('H:i:s')
    ];
}

// Extract labels and values for the combined data
$dht11CombinedLabels = array_map(function ($data) {
    return $data['time'];
}, $dht11CombinedData);

$dht11CombinedValues = array_map(function ($data) {
    return $data['value'];
}, $dht11CombinedData);

$dht11CombinedHumidity = array_map(function ($data) {
    return $data['humidity'];
}, $dht11CombinedData);



// Data PHP untuk sensor MQ5
$mq5Labels = $mq5Data->map(function ($data) {
    return $data->created_at->format('H:i:s');
})->toArray();
$mq5Values = $mq5Data->pluck('value')->toArray();

// Data PHP untuk sensor Rain Sensor
$rainSensorLabels = $rainSensorData->map(function ($data) {
    return $data->created_at->format('H:i:s');
})->toArray();
$rainSensorValues = $rainSensorData->pluck('value')->toArray();
?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var dht11CombinedConfig = {
    type: 'line',
    data: {
        labels: <?php echo json_encode($dht11CombinedLabels); ?>,
        datasets: [{
            label: 'Temperature (°C)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            data: <?php echo json_encode($dht11CombinedValues); ?>,
            fill: false,
            yAxisID: 'temperature-y-axis'
        }, {
            label: 'Humidity (%)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            data: <?php echo json_encode($dht11CombinedHumidity); ?>,
            fill: false,
            yAxisID: 'humidity-y-axis'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                id: 'temperature-y-axis',
                type: 'linear',
                position: 'left',
                scaleLabel: {
                    display: true,
                    labelString: 'Temperature (°C)'
                }
            }, {
                id: 'humidity-y-axis',
                type: 'linear',
                position: 'right',
                scaleLabel: {
                    display: true,
                    labelString: 'Humidity (%)'
                }
            }]
        }
    }
};

    // Konfigurasi grafik MQ5
    var mq5Config = {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($mq5Labels); ?>,
            datasets: [{
                label: 'Konsentrasi Gas (ppm)',
                backgroundColor: 'rgba(255, 0, 0, 0.2)',
                borderColor: 'rgba(255, 0, 0, 1)',
                data: <?php echo json_encode($mq5Values); ?>,
                fill: false,
            }]
        },
        options: {
            // Konfigurasi grafik MQ5
        }
    };

    // Konfigurasi grafik Rain Sensor
    var rainSensorConfig = {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($rainSensorLabels); ?>,
            datasets: [{
                label: 'Intensitas Hujan',
                backgroundColor: 'rgba(0, 0, 0, 0.2)',
                borderColor: 'rgba(0, 0, 0, 1)',
                data: <?php echo json_encode($rainSensorValues); ?>,
                fill: false,
            }]
        },
        options: {
            // Konfigurasi grafik Rain Sensor
        }
    };

    // Render grafik
    var dht11CombinedCtx = document.getElementById('dht11CombinedChart').getContext('2d');
    new Chart(dht11CombinedCtx, dht11CombinedConfig);

    var mq5Ctx = document.getElementById('mq5Chart').getContext('2d');
    new Chart(mq5Ctx, mq5Config);

    var rainSensorCtx = document.getElementById('rainSensorChart').getContext('2d');
    new Chart(rainSensorCtx, rainSensorConfig);
</script>

<style>
    .container {
        margin-top: 20px;
    }

    .iq-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .iq-card-body {
        padding: 15px;
    }

    .card-title {
        margin: 15px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }
</style>

@endsection
