@section('titol')
   {{$superhero->heroname }}   
@endsection

@section('links_de_capcelera')
    <a href="{{ route('superhero.create') }}">Nou heroi</a>      
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
                <form action="{{ route('superhero.edit_superpower', [$superhero->id,$power]) }}" method="POST">
                @csrf
                <td>{{ $power->description }}</td>
                <td>
                <input type="number" id="level" name="level" min="0" max="10" value = "{{ $power->pivot->amount }}">    
                </td>
                <td>
                <button type="submit" >Actualitzar</button>           
	   
                </form>
                      
                    <a href="{{ route('superhero.delete_superpower', [$superhero->id,$power]) }}">Esborrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('superhero.add_superpower', [$superhero->id]) }}" method="POST">
    @csrf
    <select size=10 name="id_power">
    @foreach($superpowers as $power)
     <option value="{{ $power->id }}"> {{ $power->description }} </option>
  @endforeach
</select>
<br>
<button type="submit" >Afegir poder</button> 
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

