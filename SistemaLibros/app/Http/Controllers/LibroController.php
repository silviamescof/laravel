<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create/createLibro');
    }
    /**
     * Validate the form for creating a new resource.
     */
    public function validateForm(Request $request)
    {
        try {
            $request->validate([
                'titulo' => 'string|max:255|required',
                'autor' => 'string|max:255|required',
                'editorial' => 'string|max:255|required',
                'fecha_publicacion' => 'string|max:255|required',
                'pais' => 'string|max:255|required',
                'idioma' => 'string|max:255|required',
                'isbn' => 'string|max:255|required'
            ]);
            
            // Lógica para guardar el libro en la base de datos
    
            // Crear un nuevo libro con los datos validados
        Libro::create([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor'),
            'editorial' => $request->input('editorial'),
            'fecha_publicacion' => $request->input('fecha_publicacion'),
            'pais' => $request->input('pais'),
            'idioma' => $request->input('idioma'),
            'isbn' => $request->input('isbn'),
        ]);

        // Puedes redirigir a alguna vista o ruta después de guardar el libro
        return redirect('create')->with('success', 'Libro guardado exitosamente');

        } catch (ValidationException $e) {
            // En caso de error de validación, redirige de vuelta al formulario con los errores
            return redirect('create')
                ->withErrors($e->errors())
                ->withInput(); // Mantener los datos del formulario en la sesión para repoblar los campos
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('show/showLibro');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
