@extends('layouts.master')
@section('content')
<div class="container">
    <div class="blanc">
        <h1 style="text-align: center">{{ $titre }}</h1>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="text-align: center; width:50px ">code_praticien</th>
                <th>Nom Praticien</th>
                <th>Prenom Praticien</th>
            </tr>
        </thead>
        <tr>
            <td style="text-align: center"> {{ $praticien->code_praticien }} </td>
            <td> {{ $praticien->nom_praticien }} </td>
            <td> {{ $praticien->prenom_praticien }} </td>
        </tr>
        <BR> <BR>
    </table>
    <div class="blanc">
        <h1 style="text-align: center">Spécialité(s)</h1>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th >Spécialité : </th>
                <th>Diplôme : </th>
                <th>Coef. Prescription : </th>
                <th style="text-align:center">Modifier</th>
                <th style="text-align:center">Supprimer</th>
            </tr>
        </thead>
        @foreach($tablePivot as $pivot)
        <tr>
            <td> {{ $pivot->lib_specialite }} </td>
            <td> {{ $pivot->pivot->diplome }} </td>
            <td> {{ $pivot->pivot->coef_prescription }} </td>
            <td style="text-align:center"><a href="{{ url('/modifierSpecialite')}}/{{ $praticien->id_praticien }}/{{ $pivot->id_specialite }}">
                <span class="glyphicon glyphicon-search" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a>
            </td>
            <td style="text-align:center">
                <button class="btn btn-default btn-primary" data-toggle="tooltip" data-placement="top" title="Supprimer" 
                    onclick="javascript:if (confirm('Suppression confirmée ?'))
                        { window.location='{{ url('/supprimerSpecialite') }}/{{ $praticien->id_praticien }}/{{ $pivot->id_specialite }}';}"><span class="glyphicon glyphicon-remove">
                </button>
            </td>
        </tr>
        @endforeach
        <BR> <BR>
    </table>
    <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button onclick="{ window.location = '{{ url('/ajouterSpecialite') }}/{{ $praticien->id_praticien }}/0';}" type="add" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-plus-sign"></span> Ajouter une spécialité</button>
                </div>
            </div>
</div>
@stop
