@extends('layouts.master')
@section('content')

<div class="col-md-12 well well-sm">
    <center><h1>Choix d'un Nom</h1></center>
    {!! Form::open(['url' => 'listerPraticiensNom']) !!}      
        <div class="form-horizontal">   
            <div class="form-group">
                <label class="col-md-3 control-label">Nom : </label>
                <div class="col-md-3">
                    {{Form::text("nom", old("nom") ? old("nom") : (!empty($praticien) ? $praticien->nom_praticien : null),
                        [ "class" => "form-control", "placeholder" => "Saisir un nom", "required", "autofocus"])
                    }}                     
                </div>
                @error('nom')
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
            @if(session()->has('error'))
                    <div class="alert alert-danger">{!! session('error') !!}</div>
            @endif
        </div>
    {!! Form::close() !!}
</div>

@stop