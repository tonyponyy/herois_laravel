@section('titol')
    Crear heroi  
@endsection

@section('links_de_capcelera')
    <a href="{{ route('mysuperhero.create') }}">Nou heroi</a>      
@endsection

@section('contingut')

<form action="{{ route('mysuperhero.store') }}" method="POST">
	    @csrf
	    <b>Nom:</b>
		<input type="text" name="heroname" >
	    <br><b>Nom real:</b>
		<input type="text" name="realname"">
		<br><b>Genere:</b>
		
		<select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
		</select>
		<br><b>Planeta:</b>
		<select name="planet_id">
            @foreach($planets as $planet)
                <option value="{{ $planet->id }}">{{ $planet->name }}</option>        
            @endforeach            
		</select>  
		

		<br><input type="submit" value="Crear">            
	   
	</form>

@endsection

@extends('layouts.panell')
