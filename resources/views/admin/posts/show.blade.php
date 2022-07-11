@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><strong>{{ $post->title }}</strong></h5>
            <p class="card-text">"{{ $post->content }}"</p>
        </div>
            <ul class="list-group list-group-flush">
                @if ($post->category)
                    <li class="list-group-item">Categoria: {{ $post->category->name }}</li>
                @endif
                <li class="list-group-item">Orario di pubblicazione: {{ $post->created_at }}</li>
                <li class="list-group-item">Orario di ultima modifica: {{ $post->updated_at }}</li>
        </ul>
        <div class="card-body">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Torna ai posts</a>
            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-success">Modifica</a>
        </div>
    </div>

</div>
@endsection
