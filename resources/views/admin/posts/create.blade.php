@extends('layouts.app')

@section('content')

<div class="container mb-5">
    <h1 class="py-5">Create a new Post</h1>
    <form action="{{route('posts.store')}}" method="post" class="card p-3">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="la pasta piú buona" aria-describedby="titleHlper">
            <small id="titleHlper" class="text-muted">Add the post title here</small>
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Product Image</label>
            <input type="text" name="cover" id="cover" class="form-control" placeholder="Linguine corte" aria-describedby="coverHlper">
            <small id="coverHlper" class="text-muted">Add the product cover here</small>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

@endsection
