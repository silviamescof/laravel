@extends('master')

@section('titulo','creacion')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@section('contenido')
    <form action="validate" method="post">
        <!-- Agrega el token CSRF si estás utilizando Laravel -->
        @csrf
        
        <label for="titulo">Título:</label>
        <br><input type="text" id="titulo" name="titulo" required><br><br>
        @error('titulo')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="autor">Autor:</label>
        <br><input type="text" id="autor" name="autor" required><br><br>
        @error('autor')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="editorial">Editorial:</label>
        <br><input type="text" id="editorial" name="editorial" required><br><br>
        @error('editorial')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="fecha_publicacion">Fecha de Publicación:</label>
        <br><input type="date" id="fecha_publicacion" name="fecha_publicacion" required><br><br>
        @error('fecha_publicacion')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="pais">País:</label>
        <br><input type="text" id="pais" name="pais" required><br><br>
        @error('pais')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="idioma">Idioma:</label>
        <br><input type="text" id="idioma" name="idioma" ><br><br>
        @error('idioma')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="isbn">ISBN:</label>
        <br><br><input type="text" id="isbn" name="isbn" required><br><br>
        @error('isbn')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <button type="submit">Guardar Libro</button>
    </form>
@endsection