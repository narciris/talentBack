<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function saludo()
    {
        return response()->json(['status' =>'success', 'message'=> 'Bienvenido al sistema']);
    }
}
