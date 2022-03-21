@section('titol')
   {{$superpower->description}}    
@endsection

@section('links_de_capcelera')
    <a href="{{ route('superPower.create') }}">Nou poder</a>      
@endsection

@section('contingut')

<form action="{{ route('superPower.update',$superpower->id) }}" method="POST">
	    @csrf
	    <strong>Description:</strong>
	    <input type="text" name="description" value="{{ $superpower->description }}">
	            
	    <input type="submit" value="Actualitzar">            
	   
	</form>

@endsection

@extends('layouts.panell')
