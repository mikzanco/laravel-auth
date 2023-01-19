@extends('layouts.app')

@section('title')
    | Admin
@endsection

@section('content')
<div class="container">
    <h1>Elenco dei progetti</h1>

    <form action="{{route('admin.projects.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
    </div>
    <div class="mb-3">
        <label for="client_name" class="form-label">Nome del cliente</label>
        <input type="text" class="form-control" id="client_name" name="client_name" placeholder="client_name" value="{{old('client_name')}}">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Immagine</label>
        <input type="text" class="form-control" id="image" name="image" placeholder="image" value="{{old('image')}}">
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Immagine</label>
        <textarea class="form-control" id="text" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success" >Invio</button>

    </form>
</div>
@endsection
