@extends('master')
@section('content')

<div class="row">
    @foreach( $movies as $key => $pelicula )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center pelicula">
    <a href="{{ url('/catalog/show/' . $pelicula['id'] ) }}">
    <img
    src="{{ asset('img/' . $pelicula['poster']) }}" alt="{{ $pelicula['title'] }}" />
    <h4 style="min-height:45px;margin:5px 0 10px 0">
    {{$pelicula['title']}}
    </h4>
    </a>
    </div>
    @endforeach
    </div>
@endsection