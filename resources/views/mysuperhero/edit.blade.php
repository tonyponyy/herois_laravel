@section('titol')
{{ $superhero->heroname }}  
@endsection

@section('links_de_capcelera')
    <a href="{{ route('mysuperhero.create') }}">Nou heroi</a>      
@endsection

@section('contingut')

<form action="{{ route('mysuperhero.update',$superhero->id) }}" method="POST">
	    @csrf
	    <b>Nom:</b>
		<input type="text" name="heroname" value="{{ $superhero->heroname }}">
	    <br><b>Nom real:</b>
		<input type="text" name="realname" value="{{ $superhero->realname }}">
		<br><b>Genere:</b>
		
		<select name="gender">
			<option selected="{{ $superhero->gender }}">{{ ucfirst($superhero->gender) }}</option>
           
		   <?php if ($superhero->gender == 'male'){
			 echo '<option value="female">Female</option>';  
		   }else{
			 echo '<option value="male">Male</option> ';
		   }
		?>

		</select>
		<br><b>Planeta:</b>
		<select name="planet_id">
		<option selected value="{{ $superhero->planet_id }}">{{ $superhero->planet->name }}</option>
            @foreach($planets as $planet)
                <option value="{{ $planet->id }}">{{ $planet->name }}</option>        
            @endforeach    
				         
		</select>  
		

		<br>
		<input type="submit" value="Desar canvis">
		<a href="{{ route('mysuperhero.destroy',$superhero->id) }}">Esborrar</a>            
	    <a href="{{ route('mysuperhero.poders',$superhero->id) }}">Modificar poders de {{ $superhero->heroname }} </a>
	</form>

@endsection

@extends('layouts.panell')
