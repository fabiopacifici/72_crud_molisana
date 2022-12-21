@extends('layouts.app')

@section('content')

<div class="container mb-5">
    <h1 class="py-5">Update product: {{$product->title}}</h1>
    <form action="{{route('products.update', $product->id)}}" method="post" class="card p-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Linguine corte" aria-describedby="titleHlper" value="{{$product->title}}">
            <small id="titleHlper" class="text-muted">Add the product title here</small>
        </div>
        <div class="d-flex">
            <div class="image_preview">
                <img width="100" src="{{$product->src}}" alt="">
            </div>
            <div class="mb-3">
                <label for="src" class="form-label">Product Image</label>
                <input type="text" name="src" id="src" class="form-control" placeholder="Linguine corte" aria-describedby="srcHlper" value="{{$product->src}}">
                <small id="srcHlper" class="text-muted">Add the product src here</small>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="4">{{$product->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" name="type" id="type" class="form-control" placeholder="Linguine corte" aria-describedby="typeHlper" value="{{$product->type}}">
            <small id="typeHlper" class="text-muted">Add the product type here</small>
        </div>
        <div class="mb-3">
            <label for="cooking_time" class="form-label">Cooking Time</label>
            <input type="text" name="cooking_time" id="cooking_time" class="form-control" placeholder="Linguine corte" aria-describedby="cooking_timeHlper" value="{{$product->cooking_time}}">
            <small id="cooking_timeHlper" class="text-muted">Add the product cooking_time here</small>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Product weight</label>
            <input type="text" name="weight" id="weight" class="form-control" placeholder="Linguine corte" aria-describedby="weightHlper" value="{{$product->weight}}">
            <small id="weightHlper" class="text-muted">Add the product weight here</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

@endsection
