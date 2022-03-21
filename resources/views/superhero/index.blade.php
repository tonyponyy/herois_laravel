@section('titol')
    Super herois   
@endsection

@section('links_de_capcelera')
    <a href="{{ route('superhero.create') }}">Nou heroi</a>      
@endsection

@section('contingut')
@include('superhero.search')
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
                   <a href="{{ route('superhero.show',$hero->id) }}">Mostrar</a> 
                
                            
                   <a href="{{ route('superhero.destroy',$hero->id) }}">Esborrar</a> 
                
                            
                   <a href="{{ route('superhero.edit',$hero->id) }}">Actualitzar</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $superheroes->links('pagination::bootstrap-4') }}
    <div>
   


    @if (session('success'))
        {{ session('success') }}
            
    @endif

    @if (session('error'))           
        {{ session('error') }}            
    @endif
</div>

@endsection

@extends('layouts.panell')

