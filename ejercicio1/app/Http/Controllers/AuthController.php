<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function validar(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'direccion' => 'required|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|max:255',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|max:255',
            'aficiones' => 'required|array|min:2',
            'estudios' => 'required',
            'observaciones' => 'max:255',
        ]);

        if ($validacion) {
            $registro = $request->all();
            $mensaje="Registro Válido\n\n";

            foreach ($registro as $key => $value) {
                $mensaje = $mensaje.' '.$key.' = '.(is_array($value) ? json_encode($value) : $value).'<br>';

            }
            // Utilizando print_r
            return  $mensaje;
        
            // O utilizando json_encode
            // return "Registro Válido\n\n" . json_encode($registro, JSON_PRETTY_PRINT);
        }
        
        
        
    }
}