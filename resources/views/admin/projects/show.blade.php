@extends('layouts.app')

@section('content')

@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="m-3">
    <h2>{{$project['title']}}</h2>
    @if ($project->cover_img)
    <img src="{{asset('storage/' . $project->cover_img)}}" alt="">
    @endif
    <p>{{$project['description']}}</p>
</div>
@endsection