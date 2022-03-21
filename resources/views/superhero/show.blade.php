@section('titol')
   {{$superhero->heroname }}   
@endsection

@section('links_de_capcelera')
    <a href="{{ route('superhero.create') }}">Nou heroi</a> 
    <a href="{{ route('superhero.poders',$superhero->id) }}">Poders de {{ $superhero->heroname }} </a>   
         
@endsection

@section('contingut')

<b>Nom :  </b>{{ $superhero->heroname }}
<br>
<b>Nom real: </b>{{ $superhero->realname }}
<br>
<b>Planeta: </b>{{ $superhero->planet->name}}
<br>
<b>Genere: </b>{{ $superhero->gender}}
<br><br>
        <b>Poders:</b>
        <ul>
        @foreach($superhero->superpowers as $power)
            <li>
            {{ $power->description }} -
            {{ $power->pivot->amount }}
            </li>
        @endforeach
        </ul>

@endsection

@extends('layouts.panell')

