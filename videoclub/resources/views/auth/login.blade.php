@extends('master')
@section('content')
<h1>Registrarse</h1>

<form method="POST" action="{{ route('validalogin') }}">
    {{--Esto crea un toquen porque laravel protege de atques xsl--}}
    @csrf

    <div>
    <label>Nombre:</label>
    <input type="text" name="name" value="{{old('name')}}">
    {{-- Si hay un error tendremos el mensaje --}}
    @if ($errors->has('name'))
    {{ $errors->first('name') }}
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
    
    <button type="submit">
    <span>Registrarse</span>
    </button>

</form>
@endsection
