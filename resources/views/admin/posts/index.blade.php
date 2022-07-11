@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row d-flex justify-content-between align-items-center">
        <h1 class="mb-4">Index della CRUDe</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-warning">Crea nuovo Post</a>
    </div>

    <div class="row">
        @if(session('cancelled'))
            <div class=" my-2 alert alert-danger" role="alert">
                {{ session('cancelled') }}
            </div>
        @endif
    </div>

    <table class="table">

        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Date</th>
            <th scope="col">Content</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->category ? $post->category->name : "Nessuna categoria" }}</td>

                <td>
                    @forelse ($post->tags as $tag)
                        <span class="badge bg-info">{{ $tag->name }}</span>
                    @empty
                        <span class="badge bg-secondary text-white">None</span>
                    @endforelse
                </td>

                <td class="d-flex">
                    <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-primary">Visualizza</a>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn mx-1 btn-success">Modifica</a>
                    <form action="{{ route('admin.posts.destroy', $post) }}"
                        method="POST"
                        onsubmit="return confirm('Sei sicuro di voler procedere all\'eliminazione')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Cancella</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row justify-content-center text-center">
        <div class="col-2">
            {{ $posts->links() }}
        </div>
    </div>

    <div>
        <h2 class="mb-4">Indice per categorie</h2>
        @foreach ($categories as $category)
            <h6>{{ $category->name }}</h6>
            <ul style="list-style:none;">
                @forelse ($category->posts as $post)
                    <li>
                        <a href="{{ route('admin.posts.show', $post) }}">
                                {{ $post->title }}
                        </a>
                    </li>
                @empty
                    <li>Questa categoria non ha post rilevanti</li>
                @endforelse
            </ul>
        @endforeach
    </div>

</div>
@endsection
