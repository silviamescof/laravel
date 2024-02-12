@extends('master')
@section('content')
<form action="{{ route('validarEdit', ['id' => $pelicula->id]) }}" method="POST">
    @csrf
        <div class="row">
            <div class="col-2 col-12-small"></div>
            <div class="col-8 col-12-small">
                <table>
                    <tbody>
                        <input type="hidden" name="id" value="{{$pelicula->id}}">
                        <tr>
                            <td><h3>Título</h3></td>
                            <td><input type="text" name="title" id="tile" value="{{$pelicula->title}}"></td>
                            @if ($errors->has('title'))
                            <span class="error-message">{{ $errors->first('title') }}</span>
                        @endif
                        </tr>
                        <tr>
                            <td><h3>Año de Producción</h3></td>
                            <td><input type="text" name="year" id="year" value="{{$pelicula->year}}"></td>
                            @if ($errors->has('year'))
                                <p>{{ $errors->first('year') }}</p>
                            @endif
                        </tr>	
                        <tr>
                        <tr>
                            <td><h3>Director</h3></td>
                            <td>
                                <select name="director" id="director" value="{{$pelicula->director}}">
                                    <option value="1">Olga Osorio</option>
                                    <option value="2">Victor García León</option>
                                    <option value="3">Santiago Requejo</option>
                                    <option value="4">Julio Martí Zahonero</option>
                                </select></td>
                                @if ($errors->has('director'))
                                {{ $errors->first('director') }}
                            @endif
                        </tr>
                        <tr>
                            <td><h3>Cartel</h3></td>
                            <td><input type="text" name="poster" id="poster" value="{{$pelicula->poster}}"></td>
                            @if ($errors->has('poster'))
                                {{ $errors->first('poster') }}
                            @endif
                        </tr>
                        <tr>
                            <td><h3>Sinopsis</h3></td>
                            <td><textarea name="synopsis" value="{{$pelicula->synopsis}}"></textarea>
                            </td>
                            @if ($errors->has('synopsis'))
                                {{ $errors->first('synopsis') }}
                            @endif
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Enviar"></td>
                        </tr>
                    </tbody>			
                </table>
            </div>
        </div>
    </form>
@endsection