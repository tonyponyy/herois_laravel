@section('titol')
   Nou poder  
@endsection

@section('links_de_capcelera')
    <a href="{{ route('superPower.create') }}">Nou poder</a>      
@endsection

@section('contingut')

<form action="{{ route('superPower.store') }}" method="POST">
	    @csrf
	       
	    <strong>Descripció:</strong>
	    <input type="text" name="description">
	            
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
