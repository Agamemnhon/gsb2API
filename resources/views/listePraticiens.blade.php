@extends('layouts.master')
@section('content')
<div class="container">
    <div class="blanc">
        <h1> {{ $titre }}</h1>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>code_praticien</th>
                <th>nom</th>
                <th>prenom</th>
                <th style="width: 50px;">consulter</th>
            </tr>
        </thead>
        @foreach($praticiens as $praticien)
        <tr>   
            <td> {{ $praticien->code_praticien }} </td>
            <td> {{ $praticien->nom_praticien }} </td>
            <td> {{ $praticien->prenom_praticien }} </td>         
            <td style="text-align:center;"><a href="{{ url('/consulterPraticien')}}/{{ $praticien->id_praticien }}">
                <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Consulter"></span></a>
            </td>
                      
        </tr>
        @endforeach
        <BR> <BR>
    </table>
</div>
@stop