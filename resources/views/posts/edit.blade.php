@extends('dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/posts/edit/{{$post->id}}" method="post">
        @csrf
        <div class="form-input">
            <label class="block text-gray-700 text-sm font-bold" for="title">
                Title:
            </label>

            <input type="text" name="title" value="{{ $post->title }}" id="title">
        </div>
        <div class="form-input">
            <label class="block text-gray-700 text-sm font-bold" for="body">
                Body:
            </label>

            {{-- <input type="text" name="body" value="{{ $post->body }}" id="body"> --}}
            <textarea style="width: 100%; max-width: 100%;" name="body" placeholder="Comment body" id="body">{{ $post->body }}</textarea>
        </div>
        <div class="form-input">
            <label class="block text-gray-700 text-sm font-bold" for="author">
                Author:
            </label>

            <input type="text" name="author_name" value="{{ $post->author_name }}" id="author">
        </div>
        <button type="submit" class="bg-blue-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 mt-2 border border-blue-500 hover:border-transparent rounded">
            labot ierakstu
        </button>

    </form>

</div>
@endsection

