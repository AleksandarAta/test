<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('See every blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($blogs as $blog )

                            @endforeach
                            <td>{{$blog->id}}</td>
                            <td>{{$blog->Title}}</td>
                            <td>{{$blog->author}}</td>
                            <td>text</td>
                            <td>Yes</td>
                            <td>No</td>
                            <td>seo, blog, tips</td>
                            <td>This is a brief description of the blog post.</td>
                            <td><img src="path/to/image.jpg" alt="Blog Image" width="100"></td>
                            <td>This is the body of the blog post, containing full content.</td>
                            <td>2025-03-31 12:00:00</td>
                            <td>2025-03-31 12:00:00</td>
                        </tr>
                        <!-- Additional rows can go here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>