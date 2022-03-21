@section('titol')
    Els meus Super herois   
@endsection

@section('links_de_capcelera')
    <a href="{{ route('mysuperhero.create') }}">Nou heroi</a>      
@endsection






@section('contingut')

@if(Auth::user()->is_admin)
@include('mysuperhero.search')
<br>
    <table class="tabla">
    <tbody>
            <tr>
                <th>Real name</th>
                <th>Hero name</th>           
                <th>Gender</th>
                <th>Planet</th>
                <th>Actions</th>
            </tr>
       

            @foreach ($superheroes as $hero)
            <tr>
                <td>{{ $hero->realname }}</td>
                <td>{{ $hero->heroname }}</td>
                <td>{{ $hero->gender }}</td>
                <td>{{ $hero->planet->name }}</td>
                <td>                
                   <a href="{{ route('mysuperhero.edit',$hero->id) }}">Mostrar</a> 
                
                            
                   <a href="{{ route('mysuperhero.destroy',$hero->id) }}">Esborrar</a> 
                
                            
                   <a href="{{ route('mysuperhero.edit',$hero->id) }}">Actualitzar</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $superheroes->links('pagination::bootstrap-4') }}
    <div>
    @else
    @include('mysuperhero.search')
    <div id="cards">
    @foreach ($superheroes as $hero)
    <div id="card">
        <p id="identificador">{{$hero->id}}  <p>
        <h3>{{$hero->heroname}}  </h3>
        <p> {{$hero->realname}} </p>
        <div id="buto">
            <a href="{{ route('mysuperhero.edit',$hero->id) }}">Mostrar</a> 
        </div>       
    </div>  
    @endforeach
    </div>
    {{ $superheroes->links('pagination::bootstrap-4') }}
    @endif
   


    @if (session('success'))
        {{ session('success') }}
            
    @endif

    @if (session('error'))           
        {{ session('error') }}            
    @endif
</div>

@endsection

@extends('layouts.panell')

