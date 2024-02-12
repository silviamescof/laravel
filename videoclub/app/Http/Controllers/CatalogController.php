<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class CatalogController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperar todas las películas desde la base de datos
        $movies = Movie::all();
    
        // Pasar los datos a la vista
        return view('catalog.index', compact('movies'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catalog/create');
    }
    public function validarPelicula(Request $request)
    {
            info('llega');
            $request->validate([
                'title' => 'required|max:255',
                'year' => 'required|max:255',
                'director' => 'required|max:255',
                'poster' => 'required|max:255',
                'rented' =>'boolean',
                'synopsis' => 'required|max:255'
            ]);
            info('valida');
        
            // Si la validación pasa, llegará a este punto y se agregará la película
            $pelicula = new Movie([
                'title' => $request->input('title'),
                'year' => $request->input('year'),
                'director' => $request->input('director'),
                'poster' => $request->input('poster'),
                'rented' => $request->input('rented', false),
                'synopsis' => $request->input('synopsis')
            ]);
        
            $pelicula->save();

        // Redirigir a la vista de creación con un mensaje de éxito
        return redirect()->route('show', $pelicula->id)->with('success', 'Película actualizada correctamente');
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
    public function show($id)
    {
        // Assuming Movie is the model representing the movies table
        $movie = Movie::find($id);
    
        // Verificar si la película fue encontrada
        if (!$movie) {
            abort(404); // Puedes personalizar esto según tu lógica
        }
    
        return view('catalog.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $pelicula = Movie::find($id);
        return view('catalog/edit',compact('pelicula'));
    }
    public function validarEdit(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'year' => 'required|max:255',
            'director' => 'required|max:255',
            'poster' => 'required|max:255',
            'rented' => 'boolean',
            'synopsis' => 'required|max:255'
        ]);
    
        // Obtén la instancia de la película que deseas actualizar
        $pelicula = Movie::find($request->input('id'));
    
        // Verifica si la película fue encontrada
        if (!$pelicula) {
            abort(404); // Puedes personalizar esto según tu lógica
        }
    
        // Actualiza los campos según los datos de la solicitud
        $pelicula->update([
            'title' => $request->input('title'),
            'year' => $request->input('year'),
            'director' => $request->input('director'),
            'poster' => $request->input('poster'),
            'rented' => $request->input('rented', false),
            'synopsis' => $request->input('synopsis')
        ]);
    
        // Redirigir a la vista de detalles con un mensaje de éxito
        return redirect()->route('show', $pelicula->id)->with('success', 'Película actualizada correctamente');
    }
    
    public function alquilar($id)
    {
       
        $pelicula = Movie::find($id);

        if (!$pelicula) {
            abort(404); // Puedes personalizar esto según tu lógica
        }
        $pelicula->update([
            'rented' => true
        ]);
    
        // Redirigir a la vista de detalles con un mensaje de éxito
        return redirect()->route('show', $pelicula->id)->with('success', 'Película actualizada correctamente');
    }

    public function entregar($id)
    {
       
        $pelicula = Movie::find($id);
        
        if (!$pelicula) {
            abort(404); // Puedes personalizar esto según tu lógica
        }
        $pelicula->update([
            'rented' => false
        ]);
    
        // Redirigir a la vista de detalles con un mensaje de éxito
        return redirect()->route('show', $pelicula->id)->with('success', 'Película actualizada correctamente');
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
    /*public function destroy(string $id)
    {
        //
    }*/
}
