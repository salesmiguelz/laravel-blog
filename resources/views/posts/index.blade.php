<x-main>
    <x-navbar/>
    <div class="posts-index-container">
        @if(!$posts->isEmpty())
            @foreach($posts as $post)
                <x-post :id="$post->id" :title="$post->title" :description="$post->description" :userId="$post->user_id" :img="$post->img" />
            @endforeach
        @else
            <h1>There are no posts to be shown here!</h1>
        @endif
        
    </div>
</x-main>

