@extends('layouts.app')

@section('content')
<h2 class="m-3">Lista dei Tipi</h2>

<ul>
    @foreach ($types as $type)
    <li class="m-2">
        <div class="d-flex">
            <a href="{{route('admin.types.show', $type)}}">
                <span><strong>{{$type['title']}}</strong></span>
            </a>
            <a href="{{route('admin.types.edit', $type)}}">
                <button class="btn btn-outline-primary ms-4">Edit</button>
            </a>
            <form action="{{route('admin.types.destroy', $type)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger ms-4">Delete</button>
            </form>
        </div>
    </li>
    @endforeach
</ul>

<a href="{{route('admin.types.create')}}">Inserisci un nuovo tipo</a>
@endsection