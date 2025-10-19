<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function saludo()
    {
        return response()->json(['status' =>'success', 'message'=> 'Bienvenido al sistema']);
    }

    public function findUser(int $id)
    {
        return response()->json(['status'=> 'suscces','message'=> " usuario con id {$id} encontrado",'data'=> " id: {$id}"],200);
    }
}
