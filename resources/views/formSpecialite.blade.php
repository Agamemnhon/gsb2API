@extends('layouts.master')
@section('content')

<div class="col-md-12 well well-sm">
    <div class="blanc">
        <center><h1>Praticien</h1></center>
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
    </div>
</div>
<div class="col-md-12 well well-sm">
    <center><h1>{{ $titre }}</h1></center>

    {!! Form::open(['url' => 'validerSpecialite']) !!}      
    <div class="form-horizontal">
        <input type="hidden" name="id_praticien" value="{{$praticien->id_praticien}}"/>
        <div class="form-group">
            <label class="col-md-3 control-label">Genre : </label>
            <div class="col-md-3">
                {{ Form::select('cbSpecialite', $specialites->pluck('lib_specialite', 'id_specialite'), (!empty($pivot) ? $pivot->id_specialite: null), 
                    ['class' => 'form-control', 'placeholder' => 'Sélectionner une spécialité', 'readonly' => $readonly ]) }}                
            </div>
            @error('cbSpecialite')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror             
        </div>
        <div class="form-group">
                <label class="col-md-3 control-label">Diplome : </label>
                <div class="col-md-3">
                    {{Form::text("diplome", old("diplome") ? old("diplome") : (!empty($pivot) ? $pivot->pivot->diplome : null),
                        [ "class" => "form-control", "placeholder" => "Saisir un diplome", "required", "autofocus"])
                    }}                     
                </div>
                @error('diplome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror              
        </div>
        <div class="form-group">
                <label class="col-md-3 control-label">Coef. Prescription </label>
                <div class="col-md-3">
                    {{Form::text("coef_prescription", old("coef_prescription") ? old("coef_prescription") : (!empty($pivot) ? $pivot->pivot->coef_prescription : null),
                        [ "class" => "form-control", "placeholder" => "Saisir un coefficient", "required", "autofocus"])
                    }}                     
                </div>
                @error('coef_prescription')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror              
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span> Valider</button>
                &nbsp;
                <button type="button" class="btn btn-default btn-primary" 
                        onclick="javascript: window.location = '{{ url('/') }}';">
                    <span class="glyphicon glyphicon-remove"></span> 
                    Annuler
                </button>
            </div>           
        </div>
        <div class="col-md-6 col-md-offset-3">
            @include('error')
        </div>
    </div>
    {!! Form::close() !!}
</div>

@stop