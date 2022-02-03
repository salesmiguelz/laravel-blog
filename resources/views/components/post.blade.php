<div class="post-card">
    <div class="container-fluid">
        <div class="img-container">
            <img src={{asset('storage/' . $post->img)}} alt="post image">
        </div>

        <div class="text-container">
            <h1 class="post-title">{{$post->title}}</h1>
            <p class="post-description">{{$post->description}}</p>
            <div class="author-container">
                <p>Written by: <b>{{$post->user->name}}</b></p>
            </div>
            <div class="post-actions-container">
               
                <div class="read-more-container">
                    <a href="">
                        Read More
                        <i class="bi bi-arrow-bar-right"></i>
                    </a>

                </div>

                
                
                <div class="methods-post-container">
                        <a class="btn btn-primary"href="{{route('posts.show', $post->id)}}">
                            <i class="bi bi-eye"></i>
                        </a>
                    
                    @can('update', $post)
                        <a class="btn btn-success"href="{{route('posts.edit', $post->id)}}">
                            <i class="bi bi-pencil"></i>
                        </a>
                    @endcan

                    @can('destroy', $post)
                    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                        @csrf
                        
                        @method('DELETE')
                        <button class="btn btn-danger"type="submit">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                    @endcan
                </div>

            </div>
        </div>
       
    </div>
</div>