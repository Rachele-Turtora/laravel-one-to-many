@extends('layouts.app')

@section('content')
<h2 class="m-3">Lista dei progetti</h2>

<ul>
    @foreach ($projects as $project)
    <li class="m-2">
        <div class="d-flex">
            <a href="{{route('admin.projects.show',$project)}}">
                <span><strong>{{$project['title']}}</strong></span>
            </a>
            <a href="{{route('admin.projects.edit', $project)}}">
                <button class="btn btn-outline-primary ms-4">Edit</button>
            </a>
            <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger ms-4">Delete</button>
            </form>
        </div>
    </li>
    @endforeach
</ul>

<a href="{{route('admin.projects.create')}}">Inserisci un nuovo progetto</a>
@endsection