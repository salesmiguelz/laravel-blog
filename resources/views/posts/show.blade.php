<x-main>
    <x-navbar/>
    <div class="posts-show-container">
       <h1>{{$post->title}}</h1>

       <figure class="figure">
        <img src="{{asset('storage/' . $post->img)}}" alt="Post image" class="figure-img img-fluid">
        <figcaption class="figure-caption" style="margin-top: -30px">
            @foreach($post->categories as $category)
            <span class="btn" style="background-color: {{$category->color}}; color: white; margin-right: 10px">{{$category->name}}</span>
           @endforeach
        </figcaption>
      </figure>
       <p>{{$post->body}}</p>
    </div>
</x-main>

