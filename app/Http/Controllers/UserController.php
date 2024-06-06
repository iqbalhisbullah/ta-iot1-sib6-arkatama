<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = User::orderBy('name')->get();
        $data['users'] = $users;
        $data['title'] = 'User'; // Tambahkan variabel $title

        return view('pages.user', $data);
    }


    public function indexx()
    {
        return User::all();
    }
    public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();
        return response()->json([
            "message" => "User telah ditambahkan."
        ], 201);
    }

    public function show(string $id)
    {
        return User::find($id);
    }

    public function update(Request $request, string $id)
    {
        if (User::where('id', $id)->exists()) {
            $users = User::find($id);
            $users->name = is_null($request->name) ? $users->sensor_id : $request->sensor_id;
            $users->email = is_null($request->email) ? $users->email : $request->email;
            $users->password = is_null($request->password) ? $users->password : $request->password;
            $users->save();
            return response()->json([
                "message" => "User telah diupdate."
            ], 201);
        } else {
            return response()->json([
                "message" => "User tidak ditemukan."
            ], 404);
        }
    }
    public function destroy(string $id)
    {
        if (User::where('id', $id)->exists()) {
            $users = User::find($id);
            $users->delete();
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
