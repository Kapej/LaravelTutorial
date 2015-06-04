@extends('master')

@section('header')
  @if(isset($breed))
    <a href="{{URL::to('/')}}">Powrót do podsumowania</a>
  @endif
  <h2>
    Wszystkie koty @if(isset($breed))rasy {{$breed}} @endif
    <a href="{{URL::to('cats/create')}}" 
       class="btn btn-primary pull-right">
      Dodaj nowego kota
    </a>
  </h2>
@stop

@section('content')
  @foreach($cats as $cat)
    <div class="cat">
      <a href="{{URL::to('cats/'.$cat->id)}}">
        <strong> {{$cat->name}} </strong> - {{$cat->breed->name}}
      </a>
    </div>
  @endforeach
@stop

