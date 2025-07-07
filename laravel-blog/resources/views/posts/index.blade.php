@extends('layouts.blog')

@section('title', 'All Blog Posts')
@section('description', 'Browse all blog posts on our Laravel blog tutorial.')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">All Blog Posts</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($posts as $post)
                @livewire('blog-post-card', ['post' => $post], key($post->id))
            @empty
                <div class="col-span-3 text-center py-12">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No posts yet!</h3>
                    <p class="text-gray-600">Check back later for new content!</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
@endsection