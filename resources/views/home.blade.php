@extends('layouts.master')
@section('content')
<div>
    <h1 class="bvn"> Bienvenue  @if($user) {{$user->email}}  @else sur GSB @endif ! </h1>
</div>
@stop