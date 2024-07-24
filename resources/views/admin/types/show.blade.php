@extends('layouts.app')

@section('content')

@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="m-3">
    <h2>{{$type->title}}</h2>
    <div class="img-container">
        @if ($type->cover_img)
        <img src="{{asset('storage/' . $type->cover_img)}}" alt="">
        @endif
    </div>
    <p><strong>Description: </strong>{{$type->description}}</p>
</div>
@endsection