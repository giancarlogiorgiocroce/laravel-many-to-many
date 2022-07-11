@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

{{-- Title --}}
        <div class="form-group">
            <label for="title">Titolo del Post</label>
            <input type="text" value="{{old('title')}}"
                class="form-control @error('name') is-invalid @enderror"
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
                    class="form-control @error('name') is-invalid @enderror"
                    id="content" name="content"
                    placeholder="Scrivi qualcosa"
            >{{old('content')}}
            </textarea>
            @error('content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

{{-- Select per Category --}}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="categories">Categoria di giochi</label>
            </div>
            <select class="custom-select" id="categories" name="category_id">
                <option value="">Scegli di che tipo di gioco vuoi parlare</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @if ($category->id == old('category_id')) selected @endif>
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
                    @if (in_array($tag->id, old('tags', []))) checked @endif>

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
