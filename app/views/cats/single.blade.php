@extends('master')

@section('header')
  <a href="{{URL::to('/')}}">Powrót do podsumowania</a>
  <h2>
    {{$cat->name}}
  </h2>
    <a href="{{URL::to('cats/'.$cat->id.'/edit')}}">
      <span class="glyphicon glyphicon-edit"></span> Edytuj
    </a>
    <a href="{{URL::to('cats/'.$cat->id.'/delete')}}">
      <span class="glyphicon glyphicon-trash"></span> Usuń
    </a>
    Ostatnia edycja {{$cat->updated_at}}
@stop

@section('content')
  <p> Data urodzenia: {{$cat->date_of_birth}} </p>
  <p>
    @if($cat->breed)
      Rasa: 
      <a href="{{URL::to('cats/breeds/' . $cat->breed->name)}}">
        {{$cat->breed->name}}
      </a>
    @endif
  </p>
@stop
