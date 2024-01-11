@extends('master')
@section('content')
<h1>Registrarse</h1>

<form method="POST" action="{{ route('validar') }}">
    {{--Esto crea un toquen porque laravel protege de atques xsl--}}
    @csrf

    <div>
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{old('name')}}">
        {{-- Si hay un error tendremos el mensaje --}}
        @if ($errors->has('name'))
        {{ $errors->first('name') }}
        @endif
    </div>
    
    <div>
        <label>Apellidos:</label>
        <input type="text" name="apellidos" value="{{old('apellidos')}}">
        {{-- Si hay un error tendremos el mensaje --}}
        @if ($errors->has('apellidos'))
        {{ $errors->first('apellidos') }}
        @endif
    </div>
    
    <div>
        <label>Direccion:</label>
        <input type="text" name="direccion" value="{{old('direccion')}}">
        {{-- Si hay un error tendremos el mensaje --}}
        @if ($errors->has('direccion'))
        {{ $errors->first('direccion') }}
        @endif
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{old('email')}}">
        {{-- Si hay un error tendremos el mensaje --}}
        @if ($errors->has('email'))
        {{ $errors->first('email') }}
        @endif
    </div>

    <div>
        <label>Telefono:</label>
        <input type="text" name="telefono" value="{{old('telefono')}}">
        {{-- Si hay un error tendremos el mensaje --}}
        @if ($errors->has('telefono'))
        {{ $errors->first('telefono') }}
        @endif
    </div>

    <div>
        <label>Contraseña:</label>
        <input type="password" name="password" value="{{old('password')}}">
        @if ($errors->has('password'))
        {{ $errors->first('password') }}
        @endif
    </div>
    
    <div>
        <label>Confirmar contraseña:</label>
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <label>Aficiones:</label><br>
    
        <input type="checkbox" name="aficiones[]" value="Deporte"> Deporte<br>
        <input type="checkbox" name="aficiones[]" value="Cine"> Cine<br>
        <input type="checkbox" name="aficiones[]" value="Lectura"> Lectura<br>
        <input type="checkbox" name="aficiones[]" value="Viajar"> Viajar<br>
        <input type="checkbox" name="aficiones[]" value="Otras"> Otras<br>
    
        {{-- Si hay un error, mostramos el mensaje --}}
        @error('aficiones')
            <p>{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <label>Estudios:</label><br>
    
        <input type="radio" name="estudios" value="no"> Sin estudios<br>
        <input type="radio" name="estudios" value="ESO"> Eso<br>
        <input type="radio" name="estudios" value="Bachillerato"> Bachillerato<br>
        <input type="radio" name="estudios" value="Ciclo Formativo"> Ciclo Formativo<br>
        <input type="radio" name="estudios" value="Universitarios"> Universitarios<br>
    
        {{-- Si hay un error, mostramos el mensaje --}}
        @error('estudios')
            <p>{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <label>Observaciones:</label>
        <textarea name="observaciones">{{ old('observaciones') }}</textarea>
    
        {{-- Si hay un error, mostramos el mensaje --}}
        @error('observaciones')
            <p>{{ $message }}</p>
        @enderror
    </div>
    

    <div>
        <input type="submit" value="enviar"> 
    </div>
        

</form>

@endsection
