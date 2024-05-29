<?php

namespace App\Http\Controllers;
use App\Models\Datasensor;
use Illuminate\Http\Request;

class DatasensorController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $dht11Data = Datasensor::where('sensor_type', 'DHT11')->get();
        $mq5Data = Datasensor::where('sensor_type', 'MQ5')->get();
        $rainSensorData = Datasensor::where('sensor_type', 'RainSensor')->get();
        $title = 'Sensor Monitoring';

        // Kirim data ke view
        return view('pages.sensor', compact('dht11Data', 'mq5Data', 'rainSensorData', 'title'));
    }


    public function indexx()
    {
        return Datasensor::all();
    }
    public function store(Request $request)
    {
        $datasensor = new Datasensor;
        $datasensor->sensor_type = $request->sensor_type;
        $datasensor->value = $request->value;
        $datasensor->save();
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
    return response() ->json([
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
