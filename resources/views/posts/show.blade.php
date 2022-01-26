<x-main>
    <x-navbar/>
    <div class="posts-show-container">
       <h1>{{$post->title}}</h1>
       <img src="{{asset('storage/' . $post->img)}}" alt="Post image">
       <p>{{$post->body}}</p>
    </div>
</x-main>

