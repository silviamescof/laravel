@extends('master')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('img/' . $movie['poster']) }}" class="img-fluid" alt="{{ $movie['title'] }}">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $movie['title'] }}</h2>
                    <p class="card-text"><strong>Year:</strong> {{ $movie['year'] }}</p>
                    <p class="card-text"><strong>Director:</strong> {{ $movie['director'] }}</p>
                    <p class="card-text"><strong>Synopsis:</strong> {{ $movie['synopsis'] }}</p>
                    <!-- Add other details as needed -->

                    <a href="{{ url('/catalog') }}" class="btn btn-primary">< Volver al catalogo</a>
                    <a href="{{ route('edit', ['id' => $movie->id]) }}" class="btn btn-primary">Editar pelicula</a>
                    @if($movie->rented)
                        <a href="{{ route('entregar', ['id' => $movie->id]) }}" class="btn btn-danger">Devolver pelicula</a>
                    @else
                        <a href="{{ route('alquilar', ['id' => $movie->id]) }}" class="btn btn-success">Alquilar pelicula</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
