<?php

namespace App\Http\Controllers;
use App\Models\Dataaktuator;
use Illuminate\Http\Request;

class DataaktuatorController extends Controller
{

    public function index()
    {
        return Dataaktuator::all();
    }
    public function store(Request $request)
    {
        $dataaktuator = new Dataaktuator;
        $dataaktuator->aktuator_id = $request->aktuator_id;
        $dataaktuator->aktuator_name = $request->aktuator_name;
        $dataaktuator->value = $request->value;
        $dataaktuator->save();
        return response()->json([
            "message" => "Data aktuator telah ditambahkan."
        ], 201);
    }

    public function show(string $id)
    {
        return Dataaktuator::find($id);
    }

    public function update(Request $request, string $id)
    {
        if (Dataaktuator::where('id', $id)->exists()) {
        $dataaktuator = Dataaktuator::find($id);
        $dataaktuator->aktuator_id = is_null($request->aktuator_id) ? $dataaktuator->aktuator_id : $request->aktuator_id;
        $dataaktuator->aktuator_name = is_null($request->aktuator_name) ? $dataaktuator->aktuator_name : $request->aktuator_name;
        $dataaktuator->value = is_null($request->value) ? $dataaktuator->value : $request->value;
        $dataaktuator->save();
        return response()->json([
            "message" => "Data aktuator telah diupdate."
        ], 201);
    } else {
    return response() ->json([
        "message" => "Data aktuator tidak ditemukan."
    ], 404);
    }
}
    public function destroy(string $id)
    {
        if (Dataaktuator::where('id', $id)->exists()) {
            $dataaktuator = Dataaktuator::find($id);
            $dataaktuator->delete();
            return response()->json([
                "message" => "Data aktuator telah dihapus."
            ], 201);
        } else {
            return response()->json([
                "message" => "Data aktuator tidak ditemukan."
            ], 404);
        }
    }
}
