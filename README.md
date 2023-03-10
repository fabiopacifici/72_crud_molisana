# CRUD Parte 1

What we need

- Model (Post)
- Resource Controller (PostController)
- Migration create_posts_table
- Seeder PostSeeder

## Generate files

```php

php artisan make:model -a Post

```

## CRUD - Index (show all resources - posts)

Define the route

```php
Route::get('admin/posts', [PostController::class, 'index'])->name('posts.index');
```

Implement the index method

```php
public function index()
    {
        //dd(Post::all());
        $posts = Post::orderByDesc('id')->get();
        return view('admin.posts.index', compact('posts'));
    }

```

Create the view

```php

       <div class="table-responsive-md">
            <table class="table table-striped
            table-hover
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse($posts as $post)
                    <tr class="table-primary">
                        <td scope="row">{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td><img width="80" src="{{$post->cover}}" alt="{{$post->title}}"></td>
                        <td class="d-flex flex-column gap-2">
                            <a href='#' class="btn btn-primary view">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </a>
                            <a href='#' class="btn btn-secondary edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                            <a href='#' class="btn btn-danger delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr class="table-primary">
                        <td scope="row">Sorry no records to show</td>
                    </tr>
                    @endforelse
                    <img src='https://picsum.photos/400/200' alt='' />
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>


```

## CRUD - Show (show single post)

route

```php
Route::get('admin/posts/{post}', [PostController::class, 'show'])->name('posts.show');

```

method

```php
 public function show(Product $product)
    {
        //
        return view('admin.products.show', compact('product'));
    }
```

markup (no loops here)

```php
<div class="container py-5">
    <div class="d-flex gap-4">
        <img src="{{$post->cover}}" alt="{{$post->title}}">
        <div class="details">
            <h1>{{$post->title}}</h1>
            <p>{{$post->content}}</p>
        </div>
    </div>
</div>

```

## CRUD - Create (show a form)

Route

```php
Route::get('admin/posts/create', [PostController::class, 'create'])->name('posts.create');

```

metodo nel controller

```php
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

```

Markup

```php
<form action="{{route('posts.store')}}" method="post" class="card p-3">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="la pasta pi?? buona" aria-describedby="titleHlper">
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
```

## CRUD - Store (save the post)

route

```php
Route::post('admin/posts', [PostController::class, 'store'])->name('posts.store');

```

method

```php
public function store(StorePostRequest $request)
    {
        //dd($request->all());

        // VALIDATE ALL DATA

        // SAVE
        $data = [
            'title' => $request['title'],
            'cover' => $request['cover'],
            'content' => $request['content'],
        ];
        //dd($data);
        Post::create($data);
        //REDIRECT
        return redirect()->route('posts.index');
    }
```

NOTA: Ricorda di settare su true il valore di authorze dentro la form request StorePostRequest

```php
    public function authorize()
    {
        return true;
    }
```
