<?php

namespace App\Http\Controllers;

use App\Models\Led;
use Illuminate\Http\Request;

class LedController extends Controller
{
    function index()
    {
        $leds = Led::all(); // select * from led order by name asc
        $title = 'Led Control';
        dd($leds);
        return view('pages.led', compact('leds', 'title'));
    }


    function store(Request $request)
    {
        // membuat validasi
        $validated = $request->validate([
            'name' => [
                'required',
                'max:255',
                'min:3'
            ],
            'pin' => [
                'required',
                'numeric',
            ],
        ]);
    }

        public function indexx()
        {
            return Led::all();
        }
        public function storee(Request $request)
        {
            $leds = new Led;
            $leds->name = $request->name;
            $leds->pin = $request->pin;
            $leds->status = $request->status;
            $leds->save();
            return response()->json([
                "message" => "User telah ditambahkan."
            ], 201);
        }

        public function show(string $id)
        {
            return Led::find($id);
        }

        public function update(Request $request, string $id)
        {
            if (Led::where('id', $id)->exists()) {
            $leds = Led::find($id);
            $leds->name = is_null($request->name) ? $leds->sensor_id : $request->sensor_id;
            $leds->pin = is_null($request->pin) ? $leds->pin : $request->pin;
            $leds->status = is_null($request->status) ? $leds->status : $request->status;
            $leds->save();
            return response()->json([
                "message" => "User telah diupdate."
            ], 201);
        } else {
        return response() ->json([
            "message" => "User tidak ditemukan."
        ], 404);
        }
    }
        public function destroy(string $id)
        {
            if (Led::where('id', $id)->exists()) {
                $leds = Led::find($id);
                $leds->delete();
                return response()->json([
                    "message" => "User telah dihapus."
                ], 201);
            } else {
                return response()->json([
                    "message" => "User tidak ditemukan."
                ], 404);
            }
        }
}

