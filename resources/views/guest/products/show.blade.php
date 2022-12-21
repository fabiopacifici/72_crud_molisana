@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="d-flex gap-4">
        <img src="{{$product->src}}" alt="{{$product->title}}">
        <div class="details">
            <h1>{{$product->title}}</h1>
            <p>{{$product->description}}</p>
            <div class="meta">
                <div class="cooking_time">
                    Cooking time: {{$product->cooking_time}}
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
