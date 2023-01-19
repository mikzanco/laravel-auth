@extends('layouts.app')

@section('title')
    | Admin
@endsection

@section('content')
<div class="container">
    <h1>Elenco dei progetti</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col"><a href="{{ route('admin.projects.orderby', ['id', 'direction'])}}">ID</a></th>
            <th scope="col"><a href="{{ route('admin.projects.orderby', ['id','direction'])}}">Nome</a></th>
            <th scope="col"><a href="{{ route('admin.projects.orderby', ['id', 'direction'])}}">Nome cliente</a></th>
            {{-- <th scope="col">Riasssunto</th> --}}
            <th scope="col">AZIONI</th>
            {{-- <th scope="col">cover_image</th> --}}
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <th  scope="row">{{$project->id}}</th>
                <td>{{$project->name}}</td>
                <td>{{$project->client_name}}</td>
                {{-- <td>{{$project->summary}}</td> --}}
                <td>
                    <a class="btn btn-success" href="{{route('admin.projects.show', $projects)}}"><i class="fa-solid fa-eye"></i>Show</a>
                    <a class="btn btn-warning" href=""><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                    <a class="btn btn-danger" href=""><i class="fa-solid fa-trash"></i>Delete</a>
                </td>
            </tr>
            @endforeach


        </tbody>

      </table>
      {{$projects->links()}}
</div>
@endsection
