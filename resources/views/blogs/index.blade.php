<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('See every blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-3">
                <a href="{{ route('blogs.create') }}" class="bg-blue-500 rouded p-2 text-white block"> Create a new
                    blog</a>
                    <table border="1" cellpadding="10" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Author</th>
                                <th>Published</th>
                                <th>Use Global</th>
                                <th>Keywords</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Body</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ Str::words($blog->title, 5) }}</td>
                                <td>{{ Str::words($blog->slug, 5) }}</td>
                                <td>{{ $blog->author }}</td>
                                <td>{{ $blog->published ? 'Yes' : 'No' }}</td>
                                <td>{{ $blog->use_global ? 'Yes' : 'No' }}</td>
                                <td>{{ Str::words($blog->keywords, 5)}}</td>
                                <td>{{ Str::words($blog->discription, 5) }}</td>
                                <td><img src="{{ asset($blog->image) }}" alt="Blog Image" width="100"></td>
                                <td>{{ $blog->body }}</td>
                                <td>{{ $blog->created_at }}</td>
                                <td>{{ $blog->updated_at }}</td>
                                <td><a href="{{ route( 'blogs.edit' , ['blog' => $blog] ) }}" class="p-2 bg-blue-500 text-white">Edit blog</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
        </div>
    </div>
</x-app-layout>