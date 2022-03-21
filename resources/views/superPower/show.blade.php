@section('titol')
   {{$superpower->description}}    
@endsection

@section('links_de_capcelera')
<a href="{{ route('superPower.create') }}">Nou poder</a>        
@endsection

@section('contingut')

<b>Nom: </b>{{ $superpower->description }}
<br><br>
<b>Superherois amb aquest poder:</b>
<ul>
   @foreach($superpower->superheroes as $superhero)
     	<li>
            {{ $superhero->heroname }} 
            </li>
   @endforeach
</ul>

@endsection

@extends('layouts.panell')
