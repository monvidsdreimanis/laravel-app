@extends('dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">


    <a href="{{ route('posts.create') }}" class="bg-blue-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        jauns posts
    </a>

    <table class="border-collapse border border-slate-400 my-10">

        <thead>
            <tr class="sticky top-0 bg-blue-200">
                <th style="width:5%" class="border border-slate-300 p-2">ID</th>
                <th style="width:15%" class="border border-slate-300">Title</th>
                <th style="width:40%" class="border border-slate-300">Body</th>
                <th style="width:20%" class="border border-slate-300">Author name</th>
                <th style="width:10%" class="border border-slate-300">Comments</th>
                <th style="width:10%" class="border border-slate-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td class="border border-slate-300 text-center">{{ $post->id }}</td>
                <td class="border border-slate-300 p-2">{{ $post->title }}</td>
                <td class="border border-slate-300 p-2">{{ $post->body }}</td>
                <td class="border border-slate-300 p-2">{{ $post->author_name }}</td>
                <td class="border border-slate-300 p-2 text-center">{{ $post->comments()->count() }}</td>
                <td class="border border-slate-300 p-2 text-center">
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="text-blue-700 font-semibold hover:text-blue-500">
                        atvērt
                    </a><br>
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="text-blue-700 font-semibold hover:text-blue-500">
                        labot
                    </a><br>
                    <a onclick="return confirm('Do you want to delete?')" href="{{ route('posts.delete', ['post' => $post->id]) }}" class="text-red-700 hover:font-bold hover:text-red-500">


                        dzēst
                    </a>
                </td>
            </tr>
            @endforeach
        <tbody>
    </table>
</div>
@endsection

