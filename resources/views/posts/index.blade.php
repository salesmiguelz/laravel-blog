<x-main>
    <x-navbar/>
    {{$errors}}
    <div class="posts-index-button">
        <a href="{{route('posts.create')}}">Write a post!</a>
    </div>
    <div class="posts-index-container">
        @if(!$posts->isEmpty())
            @foreach($posts as $post)
                <x-post :id="$post->id" :title="$post->title" :description="$post->description" :body="$post->body" :userId="$post->user_id" :imgPath="$post->img" />
            @endforeach
        @else
            <h1>This user has no posts!</h1>
        @endif
        
    </div>
</x-main>

