@extends('layouts.app')

@section('title')
    | Progetto :{{$project->name}}
@endsection

@section('content')
<div class="container">
    <h1>{{$project->name}}</h1>
    <img src="{{$project->cover_image}}" alt="{{$project->name}}">
    <p>{{$project->text}}</p>

</div>
@endsection
