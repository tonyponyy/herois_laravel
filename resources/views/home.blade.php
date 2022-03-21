@section('titol')
    Benvingut   
@endsection

@section('links_de_capcelera')


@endsection

@section('contingut')

@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Benvingut!') }}


@endsection

@extends('layouts.panell')


