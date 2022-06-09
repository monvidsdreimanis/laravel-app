@extends('dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body}}</p>


    @if ($post->comments->count() > 0)
    <p> Comment count: {{ $post->comments()->count() }}
        <table class="border-collapse border border-slate-400 my-10" width=100% style="margin:0">
            <thead>
                <th class="border border-slate-300 p-2" width="20%">author</th>
                <th class="border border-slate-300 p-2">comment</th>
            </thead>
            @foreach($post->comments as $comment)
            <tr>
                <td class="border border-slate-300 p-2">{{ $comment->author }}</td>
                <td class="border border-slate-300 p-2">{{ $comment->body }}</td>
            </tr>
            @endforeach
        </table>


        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                        <span class="font-medium">Uzmanību!</span> {{ $error }}
                    </li>



                    @endforeach
                </ul>
            </div>

        </div>
        @endif

        <form action="/comments/store" method="POST">
            @csrf
            <div class="form-input">
                <label class="block text-gray-700 text-sm font-bold" for="author">
                    Author:
                </label>
                <input type="text" placeholder="Author name" name="author" id="author">
            </div>
            <div class="form-input">
                <label class="block text-gray-700 text-sm font-bold" for="body">
                    Comment:
                </label>

                <textarea style="width: 100%; max-width: 100%;" name="body" placeholder="Comment body" id="body"></textarea>
            </div>
            <input type="hidden" value={{ $post->id }} name="commentable_id">
            <input type="hidden" value={{ get_class($post) }} name="commentable_type">
            <button type="submit" class="bg-blue-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                pievienot komentāru
            </button>
        </form>
</div>
@endsection

