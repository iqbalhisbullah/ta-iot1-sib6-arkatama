<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index()
    {
        return Notification::all();
    }
    public function store(Request $request)
    {
        $notification = new Notification;
        $notification->message = $request->message;
        $notification->save();
        return response()->json([
            "message" => "Notification telah ditambahkan."
        ], 201);
    }

    public function show(string $id)
    {
        return Notification::find($id);
    }

    public function update(Request $request, string $id)
    {
        if (Notification::where('id', $id)->exists()) {
        $notification = Notification::find($id);
        $notification->message = is_null($request->message) ? $datasensor->message : $request->message;
        $notification->save();
        return response()->json([
            "message" => "Notification telah diupdate."
        ], 201);
    } else {
    return response() ->json([
        "message" => "Notification tidak ditemukan."
    ], 404);
    }
}
    public function destroy(string $id)
    {
        if (Notification::where('id', $id)->exists()) {
            $notification = Notification::find($id);
            $notification->delete();
            return response()->json([
                "message" => "Notification telah dihapus."
            ], 201);
        } else {
            return response()->json([
                "message" => "Notification tidak ditemukan."
            ], 404);
        }
    }
}
