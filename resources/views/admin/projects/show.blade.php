@extends('layouts.app')

@section('content')

@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="m-3">
    <h2>{{$project['title']}}</h2>
    <p><strong>Creato da: </strong>{{$project->user?->name ?: "Utente sconosciuto"}}</p>
    <p><strong>Tipo: </strong>{{$project->type?->title ?: "Undefined"}}</p>
    @if ($project->cover_img)
    <img src="{{asset('storage/' . $project->cover_img)}}" alt="">
    @endif
    <p><strong>Descrizione: </strong>{{$project['description']}}</p>
</div>
@endsection