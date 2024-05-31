@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Card untuk Status Rain Sensor -->
        <div class="mb-6 col-md-6">
            <div class="iq-card Center">
                <h4 class="card-title">Rain Sensor Status</h4>
                <div class="iq-card-body">
                    <div id="rainSensorStatus" class="status-card"></div>
                </div>
            </div>
        </div>

        <!-- Card untuk Status Kebocoran Gas -->
        <div class="mb-6 col-md-6">
            <div class="iq-card Center">
                <h4 class="card-title">Gas Leak Status</h4>
                <div class="iq-card-body">
                    <div id="gasLeakStatus" class="status-card"></div>
                </div>
            </div>
        </div>

        <!-- Grafik untuk Data Sensor DHT11 -->
        <div class="mb-6 col-md-6">
            <div class="iq-card">
                <h4 class="card-title">DHT11 Sensor Data</h4>
                <div class="iq-card-body">
                    <canvas id="dht11CombinedChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Grafik untuk Data Sensor MQ5 -->
        <div class="mb-6 col-md-6">
            <div class="iq-card">
                <h4 class="card-title">MQ5 Sensor Data</h4>
                <div class="iq-card-body">
                    <canvas id="mq5Chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
>

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
$latestRainSensorValue = $rainSensorData->last()->value;
$rainSensorStatus = $latestRainSensorValue == 1 ? 'No Rain' : 'Raining';

// Data PHP untuk status kebocoran gas
$latestMQ5Value = $mq5Data->last()->value;
$gasLeakStatus = $latestMQ5Value > 300 ? 'Gas Leak Detected' : 'No Gas Leak';
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

    // Render grafik
    var dht11CombinedCtx = document.getElementById('dht11CombinedChart').getContext('2d');
    new Chart(dht11CombinedCtx, dht11CombinedConfig);

    var mq5Ctx = document.getElementById('mq5Chart').getContext('2d');
    new Chart(mq5Ctx, mq5Config);

    // Set rain sensor status
    document.getElementById('rainSensorStatus').innerText = <?php echo json_encode($rainSensorStatus); ?>;

    // Set gas leak status
    document.getElementById('gasLeakStatus').innerText = <?php echo json_encode($gasLeakStatus); ?>;
</script>

<style>
    .container {
        margin-top: 20px;
    }

    .iq-card {
        border: 1px solid #fdfdfd;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .iq-card-body {
        padding: 15px;
    }

    .card-title {
        margin: 15px;
        font-size: 25px;
        font-weight: bold;
        text-align: center;
    }

    .status-card {
        text-align: center;
        font-size: 28px;
        font-weight: bold;
        color: #000000;
        margin-top: 10px;
    }
</style>

@endsection
