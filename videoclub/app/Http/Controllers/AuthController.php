<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administradores;  // Asegúrate de utilizar el modelo correcto
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function validalogin(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'password' => 'required|confirmed'
        ]);

        Administradores::create([
            'usuario' => $request->name,
            'pass' => Hash::make($request->password)
        ]);

        if ($validatedData) {
            return "Registro Almacenado";
        }
    }
}
