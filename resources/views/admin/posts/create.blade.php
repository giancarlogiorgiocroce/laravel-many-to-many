@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
