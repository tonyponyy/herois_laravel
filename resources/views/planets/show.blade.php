@section('titol')
   {{$planet->name}}    
@endsection

@section('links_de_capcelera')
    <a href="{{ route('planets.create') }}">Nou planeta</a>      
@endsection

@section('contingut')

<b>Nom: </b>{{ $planet->name }}
<br>
<b>Herois:</b>
<ul>
     @foreach($planet->superheroes as $super)
          <li>{{ $super->heroname }}</li>
     @endforeach
</ul>



@endsection

@extends('layouts.panell')
