@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Questa è la dashboard di {{ Auth::user()->name }}</h1>
</div>
@endsection
