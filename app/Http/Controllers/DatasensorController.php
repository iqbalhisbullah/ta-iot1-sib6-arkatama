<?php

namespace App\Http\Controllers;

use App\Models\Datasensor;
use Illuminate\Http\Request;

class DatasensorController extends Controller
{
    // Fungsi untuk mengirim notifikasi WhatsApp menggunakan Fonnte API
    public function sendWhatsAppNotification($message)
    {
        $token = 'gJhHn2xrezV!jMc9@A1V';
        $phone = '6285804317228';
        $url = 'https://api.fonnte.com/send';

        $data = [
            'target' => $phone,
            'message' => $message,
            'countryCode' => '62'
        ];

        $headers = [
            'Authorization: ' . $token
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function index()
    {
        // Ambil data dari database
        $dht11Datatemp = Datasensor::where('sensor_type', 'DHT11temp')->get();
        $dht11Datahumd = Datasensor::where('sensor_type', 'DHT11humd')->get();
        $mq5Data = Datasensor::where('sensor_type', 'MQ5')->get();
        $rainSensorData = Datasensor::where('sensor_type', 'RainSensor')->get();
        $title = 'Sensor Monitoring';

        // Cek apakah $mq5Data tidak kosong sebelum mencoba mengakses nilai terakhirnya
        if (!$mq5Data->isEmpty()) {
            $latestMQ5Data = $mq5Data->last();
            $latestMQ5Value = $latestMQ5Data->value;
            $latestMQ5Datetime = $latestMQ5Data->created_at; // Asumsikan kolom datetime bernama 'created_at'

            if ($latestMQ5Value > 300) {
                $message = "Gas Leak Detected!!!\nValue : $latestMQ5Value ppm\nDatetime : $latestMQ5Datetime";
                $this->sendWhatsAppNotification($message);
            }
        }

        // Kirim data ke view
        return view('pages.sensor', compact('dht11Datatemp', 'dht11Datahumd', 'mq5Data', 'rainSensorData', 'title'));
    }


    public function indexx()
    {
        return Datasensor::all();
    }

    public function store(Request $request)
    {
        // Log request data for debugging
        \Log::info('Request Data:', $request->all());

        // Validate data
        $data = $request->validate([
            '*.sensor_type' => 'required|string',
            '*.value' => 'required|numeric',
        ]);

        foreach ($data as $sensor) {
            // Log each sensor data for debugging
            \Log::info('Sensor Data:', $sensor);

            $datasensor = new Datasensor;
            $datasensor->sensor_type = $sensor['sensor_type'];
            $datasensor->value = $sensor['value'];
            $datasensor->save();
        }

        return response()->json([
            "message" => "Data sensor telah ditambahkan."
        ], 201);
    }

    public function show(string $id)
    {
        return Datasensor::find($id);
    }

    public function update(Request $request, string $id)
    {
        if (Datasensor::where('id', $id)->exists()) {
            $datasensor = Datasensor::find($id);
            $datasensor->sensor_type = is_null($request->sensor_type) ? $datasensor->sensor_type : $request->sensor_type;
            $datasensor->value = is_null($request->value) ? $datasensor->value : $request->value;
            $datasensor->save();
            return response()->json([
                "message" => "Data sensor telah diupdate."
            ], 201);
        } else {
            return response()->json([
                "message" => "Data sensor tidak ditemukan."
            ], 404);
        }
    }

    public function destroy(string $id)
    {
        if (Datasensor::where('id', $id)->exists()) {
            $datasensor = Datasensor::find($id);
            $datasensor->delete();
            return response()->json([
                "message" => "Data sensor telah dihapus."
            ], 201);
        } else {
            return response()->json([
                "message" => "Data sensor tidak ditemukan."
            ], 404);
        }
    }
}
