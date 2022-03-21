@section('titol')
   {{$planet->name}}    
@endsection

@section('links_de_capcelera')
    <a href="{{ route('planets.create') }}">Nou planeta</a>      
@endsection

@section('contingut')

<form action="{{ route('planets.update',$planet->id) }}" method="POST">
	    @csrf
	    <strong>Name:</strong>
	    <input type="text" name="name" value="{{ $planet->name }}">
	            
	    <input type="submit" value="Actualitzar">            
	   
	</form>

@endsection

@extends('layouts.panell')
