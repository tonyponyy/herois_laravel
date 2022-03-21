@section('titol')
   Nou planeta   
@endsection

@section('links_de_capcelera')
    <a href="{{ route('planets.create') }}">Nou planeta</a>      
@endsection

@section('contingut')

<form action="{{ route('planets.store') }}" method="POST">
	    @csrf
	       
	    <strong>Name:</strong>
	    <input type="text" name="name">
	            
	    <input type="submit" value="desar">     
	   
	</form>
</div>

<div>
@if ($errors->any())
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>    
@endif


@endsection

@extends('layouts.panell')
