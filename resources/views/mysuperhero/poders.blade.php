@section('titol')
   {{$superhero->heroname }}   
@endsection

@section('links_de_capcelera')
    <a href="{{ route('mysuperhero.create') }}">Nou heroi</a>      
@endsection

@section('contingut')

<h3>Poders de {{ $superhero->heroname }}</h3>



<section id="poders_herois"> 
        <table class="tabla">
    <tbody>
            <tr>
                <th>Nom</th>
                <th>Nivell</th>           
                <th>Accions</th>
            </tr>
       

            @foreach($superhero->superpowers as $power)
            <tr> 
                <form action="{{ route('mysuperhero.edit_superpower', [$superhero->id,$power]) }}" method="POST">
                @csrf
                <td>{{ $power->description }}</td>
                <td>
                <input type="number" id="level" name="level" min="0" max="10" value = "{{ $power->pivot->amount }}">    
                </td>
                <td>
                <input type="submit" value = "Actualitzar" ></input>           
	   
                </form>
                      
                    <a href="{{ route('mysuperhero.delete_superpower', [$superhero->id,$power]) }}">Esborrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('mysuperhero.add_superpower', [$superhero->id]) }}" method="POST">
    @csrf
    <select size=10 name="id_power">
    @foreach($superpowers as $power)
     <option value="{{ $power->id }}"> {{ $power->description }} </option>
  @endforeach
</select>
<br>
<input type="submit" value = "Afegir poder" ></input> 
</form>
</section>
@if (session('success'))
        {{ session('success') }}
            
    @endif

    @if (session('error'))           
        {{ session('error') }}            
    @endif

@endsection

@extends('layouts.panell')

