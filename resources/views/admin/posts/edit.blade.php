@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

{{-- Title --}}
        <div class="form-group">
            <label for="title">Titolo del Post</label>
            <input type="text" value="{{old('title', $post->title)}}"
                class="form-control @error('title') is-invalid @enderror"
                id="title" name="title"
                placeholder="Scrivi qualcosa"
            >
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

{{-- Content --}}
        <div class="form-group">
            <label for="content">Contenuto del Post</label>
            <textarea type="text"
                    class="form-control @error('content') is-invalid @enderror"
                    id="content" name="content"
                    placeholder="Scrivi qualcosa"
            >{{old('content', $post->content)}}
            </textarea>
            @error('content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

{{-- Select per Category --}}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="category_id">Categoria di giochi</label>
            </div>
            <select class="custom-select"
                    id="category_id" name="category_id">
                <option value="">Scegli di che tipo di gioco vuoi parlare</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @if ($post->category && $category->id == old('category_id', $post->category->id)) selected @endif>
                            {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

{{-- Checks per Tags --}}
        <h5 class="mb-1 mt-4">Scegli dei tags per il tuo post!</h5>
        <div class="form-check mb-4">
            @foreach ($tags as $tag)
                <input class="form-check-input"
                    type="checkbox"
                    value="{{ $tag->id }}"
                    id="tag{{ $loop->iteration }}"
                    name="tags[]"
                    @if (!$errors->any() && $post->tags->contains($tag->id))
                        checked
                    @elseif (!$errors->any() && in_array($tag->id, old('tags', [])))
                        checked
                    @endif>

                <label class="form-check-label mr-5"
                    for="tag{{ $loop->iteration }}"
                    name="tags[]">
                    {{ $tag->name }}
                </label>
            @endforeach
        </div>

{{-- Submit --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
