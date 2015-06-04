@extends('master')

@section('header')
  <a href="{{URL::to('cats/'.$cat->id.'')}}"> &larr; Anuluj </a>
  <h2>
    @if($method == 'post') 
      Dodaj nowego kota
    @elseif($method == 'delete') 
      Usuń kota {{$cat->name}}?
    @else 
      Edytuj kota {{$cat->name}}
    @endif
  </h2>
@stop

@section('content')
  {{Form::model($cat, array('method' => $method, 'url' =>   
                            'cats/'.$cat->id))}}

  @unless($method == 'delete')
    <div class="form-group">
      {{Form::label('Imię')}} 
      {{Form::text('name')}}
    </div>

    <div class="form-group">
      {{Form::label('Data urodzenia')}}
      {{Form::text('date_of_birth')}}
    </div>

    <div class="form-group">
      {{Form::label('Rasa')}}
      {{Form::select('breed_id', $breed_options)}}
    </div>

    {{Form::submit("Zapisz", array("class"=>"btn btn-default"))}}
  @else
    {{Form::submit("Usuń", array("class"=>"btn btn-default"))}}
  @endif

  {{Form::close()}}
@stop
