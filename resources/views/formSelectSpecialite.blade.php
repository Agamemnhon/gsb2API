@extends('layouts.master')
@section('content')

<div class="col-md-12 well well-sm">
    <center><h1>Choix d'une Spécialité</h1></center>
    {!! Form::open(['url' => 'listerPraticiensSpecialite']) !!}      
    <div class="form-horizontal">    
        <div class="form-group">
            <label class="col-md-3 control-label">Spécialité : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbSpecialite' required>
                    <OPTION VALUE=0>Sélectionner une spécialité</option>
                    @foreach ($specialites as $specialite)
                    <option value="{{$specialite->id_specialite}}">  {{ $specialite->lib_specialite}} </option>       
                    @endforeach
                </select>
            </div>
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
            @if(session()->has('error'))
                    <div class="alert alert-danger">{!! session('error') !!}</div>
            @endif
        </div>
    </div>
    {!! Form::close() !!}
</div>

@stop