@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <!-- Grafik untuk Data Sensor DHT11 -->
        <div class="col-md-9 mb-9">
            <div class="iq-card">
                    <h4 class="card-title">Data Sensor DHT11</h4>
                <div class="iq-card-body">
                    <canvas id="dht11Chart"></canvas>
                </div>
            </div>
        </div>
    </div>
        <!-- Grafik untuk Data Sensor MQ5 -->
        <div class="col-md-9 mb-9">
            <div class="iq-card">
                    <h4 class="card-title">Data Sensor MQ5</h4>
                <div class="iq-card-body">
                    <canvas id="mq5Chart"></canvas>
                </div>
            </div>
        </div>
    </div>
        <!-- Grafik untuk Data Sensor Rain Sensor -->
        <div class="col-md-9 mb-9">
            <div class="iq-card">
                    <h4 class="card-title">Data Sensor Hujan</h4>
                <div class="iq-card-body">
                    <canvas id="rainSensorChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
// Data PHP untuk sensor DHT11
$dht11Labels = $dht11Data->map(function ($data) {
    return $data->created_at->format('H:i:s');
})->toArray();
$dht11Values = $dht11Data->pluck('value')->toArray();

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
    var dht11Config = {
        type: 'line',
        data: {
            labels: <?php echo json_encode($dht11Labels); ?>,
            datasets: [{
                label: 'Temperatur (°C)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                data: <?php echo json_encode($dht11Values); ?>,
                fill: false,
            }]
        },
        options: {
            // Konfigurasi grafik DHT11
        }
    };

    // Konfigurasi grafik MQ5
    var mq5Config = {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($mq5Labels); ?>,
            datasets: [{
                label: 'Konsentrasi Gas (ppm)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
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
        type: 'line',
        data: {
            labels: <?php echo json_encode($rainSensorLabels); ?>,
            datasets: [{
                label: 'Intensitas Hujan',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                data: <?php echo json_encode($rainSensorValues); ?>,
                fill: false,
            }]
        },
        options: {
            // Konfigurasi grafik Rain Sensor
        }
    };

    // Render grafik
    var dht11Ctx = document.getElementById('dht11Chart').getContext('2d');
    new Chart(dht11Ctx, dht11Config);

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
