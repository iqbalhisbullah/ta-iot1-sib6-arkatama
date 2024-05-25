<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        $users = User::orderBy('name')->get();
        $data['users'] = $users;
        $data['title'] = 'User'; // Tambahkan variabel $title

        return view('pages.user', $data);
    }
}

