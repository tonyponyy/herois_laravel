@section('titol')
    Planetes   
@endsection

@section('links_de_capcelera')
    <a href="{{ route('planets.create') }}">Nou planeta</a>      
@endsection

@section('contingut')



    <table class="tabla">
    <tbody>
            <tr>
                <th>Id</th>
                <th>Name</th>           
                <th>Operacions</th>
            </tr>
       

            @foreach ($planets as $planet)
            <tr>
                <td>{{ $planet->id }}</td>
                <td>{{ $planet->name }}</td>
               
                <td>                
                   <a href="{{ route('planets.show',$planet->id) }}">Mostrar</a> 
                
                            
                   <a href="{{ route('planets.destroy',$planet->id) }}">Esborrar</a> 
                
                            
                   <a href="{{ route('planets.edit',$planet->id) }}">Actualitzar</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    {{ $planets->links('pagination::bootstrap-4') }}

    @if (session('success'))
        {{ session('success') }}
            
    @endif

    @if (session('error'))           
        {{ session('error') }}            
    @endif
</div>

@endsection

@extends('layouts.panell')

