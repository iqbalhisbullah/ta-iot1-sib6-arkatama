<?php

namespace App\Http\Controllers;
use App\Models\Datasensor;
use Illuminate\Http\Request;

class DatasensorController extends Controller
{

    public function index()
    {
        return Datasensor::all();
    }
    public function store(Request $request)
    {
        $datasensor = new Datasensor;
        $datasensor->sensor_id = $request->sensor_id;
        $datasensor->sensor_name = $request->sensor_name;
        $datasensor->value = $request->value;
        $datasensor->save();
        return response()->json([
            "message" => "Datasensor telah ditambahkan."
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
        $datasensor->sensor_id = is_null($request->sensor_id) ? $datasensor->sensor_id : $request->sensor_id;
        $datasensor->sensor_name = is_null($request->sensor_name) ? $datasensor->sensor_name : $request->sensor_name;
        $datasensor->value = is_null($request->value) ? $datasensor->value : $request->value;
        $datasensor->save();
        return response()->json([
            "message" => "Datasensor telah diupdate."
        ], 201);
    } else {
    return response() ->json([
        "message" => "Datasensor tidak ditemukan."
    ], 404);
    }
}
    public function destroy(string $id)
    {
        if (Datasensor::where('id', $id)->exists()) {
            $datasensor = Datasensor::find($id);
            $datasensor->delete();
            return response()->json([
                "message" => "Datasensor telah dihapus."
            ], 201);
        } else {
            return response()->json([
                "message" => "Datasensor tidak ditemukan."
            ], 404);
        }
    }
}
