<x-main>
    <x-navbar/>
    <div class="posts-index-container">
        @if(!$posts->isEmpty())
            @foreach($posts as $post)
                <x-post :post="$post"/>
            @endforeach
        @else
            <h1 style="margin-top: 30px; color:white">There are no posts to be shown here!</h1>
        @endif
        
    </div>
</x-main>

