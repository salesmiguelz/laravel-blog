<div class="post-card">
    <div class="container-fluid">
        <div class="img-container">
            <img src={{asset('storage/' . $img)}} alt="post image">
        </div>

        <div class="text-container">
            <h1 class="post-title">{{$title}}</h1>
            <p class="post-description">{{$description}}</p>
            <div class="post-actions-container">
                <div class="read-more-container">
                    <a href="">
                        Read More
                        <i class="bi bi-arrow-bar-right"></i>
                    </a>
                </div>
                

                
                <div class="methods-post-container">
                    <a class="btn btn-primary"href="{{route('posts.show', $id)}}">
                        <i class="bi bi-eye"></i>
                    </a>
                    @can('view', Auth::user(), $userId)
                    <a class="btn btn-success"href="{{route('posts.edit', $id)}}">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{route('posts.destroy', $id)}}" method="POST">
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