<x-main>
    <x-navbar/>
    <div class="posts-index-button">
        <a href="{{route('posts.create')}}">Write a post!</a>
    </div>
    <div class="posts-index-container">
        @foreach($posts as $post)
            <x-post :title="$post->title" :description="$post->description" :body="$post->body" />
        @endforeach
    </div>
</x-main>

