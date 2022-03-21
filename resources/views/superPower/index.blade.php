@section('titol')
    Super poders   
@endsection

@section('links_de_capcelera')
    <a href="{{ route('superPower.create') }}">Nou poder</a>      
@endsection

@section('contingut')



    <table class="tabla">
    <tbody>
            <tr>
                <th>Id</th>
                <th>Descripció</th>           
                <th>Operacions</th>
            </tr>
       

            @foreach ($superPowers as $superpower)
            <tr>
                <td>{{ $superpower->id }}</td>
                <td>{{ $superpower->description }}</td>
               
                <td>                
                   <a href="{{ route('superPower.show',$superpower->id) }}">Mostrar</a> 
                
                            
                   <a href="{{ route('superPower.destroy',$superpower->id) }}">Esborrar</a> 
                
                            
                   <a href="{{ route('superPower.edit',$superpower->id) }}">Actualitzar</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    {{ $superPowers->links('pagination::bootstrap-4') }}

    @if (session('success'))
        {{ session('success') }}
            
    @endif

    @if (session('error'))           
        {{ session('error') }}            
    @endif
</div>

@endsection

@extends('layouts.panell')

