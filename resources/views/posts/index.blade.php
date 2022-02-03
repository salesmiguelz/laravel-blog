<x-main>
    <x-navbar/>
    <div class="posts-index-container">
        @if(!$posts->isEmpty())
            @foreach($posts as $post)
                {{-- <x-post :id="$post->id" :title="$post->title" :description="$post->description" :userId="$post->user_id" :img="$post->img" :author="$post->user->name" :post="$post" :canUpdate="Auth::user()->can('update', $post)"/ :canDelete="Auth::user()->can('update', $post)"> --}}

                <x-post :post="$post"/>
            @endforeach
        @else
            <h1>There are no posts to be shown here!</h1>
        @endif
        
    </div>
</x-main>

